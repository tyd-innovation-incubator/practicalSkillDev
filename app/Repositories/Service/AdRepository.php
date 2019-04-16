<?php

namespace App\Repositories\Service;

use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Service\Ad;
use App\Notifications\AdsExpiredNotification;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Scopes\IsactiveScope;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdRepository extends BaseRepository
{
    use AttachmentHandler, FileHandler;

    const MODEL = Ad::class;

    protected $base = null;
    protected $documents;

    /**
     * AdRepository constructor.
     * @throws \App\Exceptions\GeneralException
     */
    public function __construct()
    {
        $this->base = $this->real(ads_dir() . DIRECTORY_SEPARATOR);
        if (!$this->base) {
            throw new GeneralException('Base directory does not exist');
        }
    }

    public function getByLocation($location_cv_id){
        return $this->query()
            ->where('code_value_id', $location_cv_id)
            ->where('isapproved', 1)
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_high'));
    }

    /**
     * Store the ad
     * @param $input
     * @param $invoice
     * @return mixed
     */
    public function store($input){
        //get the period number (in months)
        $month = code_value()->find($input['period'])->name;

        //get ad_charges instance
        $charge = new AdChargeRepository();
        $ad_charges = $charge->find($input['package']);

        $user = access()->user();
        $company = $user->getCompanyAdministeredByUser();

        return  DB::transaction(function() use ($input, $user, $company, $month, $ad_charges) {
            $ad = $this->query()->create([
                'user_id' => $user->id,
                'company_id' => count($company) ? $company->id : null,
                'title' => '',
                'description' => '',
                'ad_charge_id' => $input['package'],
                'duration' => $month,
                'url' => $input['url'],
                'code_value_id' => $ad_charges->code_value_id,
                'payment_period_cv_id' => $input['period'],
                'charge_amount' => $input['charge_amount'],
            ]);
            //upload files
            $this->uploadFile($ad,'file');
            return $ad;
        });
    }

    /**
     * User updates his advertisement
     * @param $input
     * @param $ad
     * @return mixed
     */
    public function update($input, $ad){
        return  DB::transaction(function() use ($input, $ad){
            //return isapproved to 0
            $ad->update([
                'url' =>$input['url'],
                'isapproved' => 0,
                'iscorrected' => 1,
            ]);
            //set all corrections to 1 (corrected)
            $ad->corrections()->update([
                'iscorrected' => 1,
            ]);
            //Upload files
            $this->uploadFile($ad, 'file');




            return $ad;
        });


    }

    /**
     * @param $ad
     */
    public function destroy($ad){
        DB :: transaction(function() use ($ad){
            $documents = new DocumentRepository();
            $document_id = $documents->getAdImageDocumentId();
            /*if file exists detach*/
            $this->unlinkAdFile($ad, $document_id);
            $ad->delete();
        });
    }

    /**
     * Get adverts by user
     * @param $user
     * @return mixed
     */
    public function getAdvertsByUserForDataTable($user)
    {
        return $this->query()
            ->orderBy('id', 'desc')
            ->where('user_id', $user->id);
    }

    /**
     * @param $isapproved
     * @return mixed
     */
    public function getAdvertisementsByStatusForAdminDatatable($isapproved){
        return $this->query()
            ->where('isapproved', $isapproved)
            ->whereHas('invoice', function ($q) {
                $q->where('ispaid', 1);
            })
            ->orderBy('id', 'desc');
    }

    public function getAdvertisementsByScopeForAdminDatatable($scope){
        return $this->query()
            ->where('isactive', $scope)
            ->orderBy('id', 'desc')
            ->withoutGlobalScope(IsactiveScope::class);
    }

    /**
     * change the value of isapproved
     * @param $ad
     * @param $isapproved
     * @return mixed
     */
    public function setStatus($ad, $isapproved){
        return  DB::transaction(function() use ($ad, $isapproved) {
            if($isapproved == 1){
                return $ad->update([
                    'start_date' => Carbon::now(),
                    'isapproved' => $isapproved,
                ]);
            } else {
                return $ad->update([
                    'isapproved' => $isapproved,
                ]);
            }
        });
    }

    public function setScopeByDuration(){
        DB::transaction(function () {
            $now = Carbon::now();
            $ads = $this->query()
                ->select('isactive', 'start_date', 'duration')
                ->where('isapproved', 1)
                ->where('isactive', 1)
                ->get();
            foreach ($ads as $ad) {
                $start_date = Carbon::parse($ad->start_date);
                $start_date->addMonths($ad->duration);

                if ($now > $start_date) {
                    $ad->update([
                        'isactive' => 0,
                    ]);
                    $user = User::find($ad->user_id);
                    $user->notify(new AdsExpiredNotification($ad));
                    alert()->store($ad, [
                        'user_id' => $ad->user_id,
                        'type_cv_id' => 209,
                        'data' => __('strings.email.ad.expired'),
                    ]);
                }
            }
        });
    }

    public function uploadFile(Model $ad, $file_key_name)
    {
        DB::transaction(function () use ($ad, $file_key_name) {
            $documents = new DocumentRepository();
            $document_id = $documents->getAdImageDocumentId();
            /*Attach to document pivot table*/
            if (request()->hasFile($file_key_name)) {
                $file = request()->file($file_key_name);
                if ($file->isValid()) {
                    /*Check if already attached - if exist detach*/
                    $this->unlinkAdFile($ad, $document_id);
                    /*Save into pivot table*/
                    $ad->documents()->syncWithoutDetaching([$document_id => [
                        'name' => $file->getClientOriginalName(),
                        'description' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]]);
                }
                $uploadedDocument = count($ad->documents()->where('document_id', $document_id)->first()) ? $ad->documents()->where('document_id',$document_id)->first()->pivot : null ;
                $path = $this->base . DIRECTORY_SEPARATOR . $ad->id . DIRECTORY_SEPARATOR . $document_id ;
                /*Unlink if exist*/
                if (count($uploadedDocument)) {
                    $file_path = $ad->adImageFileDir($uploadedDocument->id);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                /*Save Document*/
                $this->saveDocument($ad, $file_key_name, $path, $uploadedDocument);
            } else {
                return false;
            }
        });

    }

    /**
     * Detach/unlink Legislation attachment and attachment from directory
     */
    public function unlinkAdFile(Model $ad, $document_id)
    {
        $uploadedDocument = $ad->documents()->where('document_id', $document_id)->first() ;

        if (count($uploadedDocument)){
            /*Detach attachment from dir*/
            $file_path = $ad->adImageFileDir($uploadedDocument->pivot->id);

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    /**
     * @param $ad
     * @return mixed
     */
    public function attachViews($ad){
        return DB::transaction(function () use ($ad) {
            return $ad->update([
                'views' => $ad->getUniqueViews(),
            ]);
        });
    }

    /**
     * @param $location_cv_id
     * @return mixed
     */
    public function getRandomBannerByLocation($location_cv_id){
        return $this->query()
            ->where('code_value_id', $location_cv_id)
            ->where('isapproved', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $location_cv_id
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function getRandomPremiumTopBanner($location_cv_id){

        $ads = $this->getRandomBannerByLocation($location_cv_id);

        $numbers = array();

        foreach($ads as $ad){
            $numbers[] = $ad->id;
        }

        shuffle($numbers);

        $id = array_shift($numbers);

        return ad()->find($id);
    }
}
