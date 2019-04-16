<?php
namespace App\Repositories\Stakeholder;

use App\Models\Stakeholder\CompanyCorrection;
use App\Models\Stakeholder\CompanyService;
use App\Notifications\Stakeholder\CompanyCorrectionNotification;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyCorrectionRepository extends BaseRepository
{
    const MODEL = CompanyCorrection::class;

    public function __construct()
    {

    }

    /*create*/
    public function create(array $input, Model $company)
    {
        return  DB::transaction(function () use ($company, $input) {
            $correction = $this->query()->create([
                'company_id' => $company->id,
                'user_id' => access()->id(),
                'correction' => $input['correction'],

            ]);
//            $user = $company->users()->where('isregister',1)->first();
//            $user->notify(new CompanyCorrectionNotification($company));
            return $correction;
        });

    }

    /*Update*/
    public function update(array $input, Model $correction)
    {
        return DB::transaction(function () use ($correction, $input) {
            $correction->update([
                'correction' => $input['correction'],
            ]);

            return $correction;
        });
    }

    /**
     * Resubmit registration after corrections have been resolved
     */
    public function resubmitRegistration(Model $company_correction)
    {
        return DB::transaction(function () use ($company_correction) {
        $company = $company_correction->company;
        $company_correction->update([
            'iscorrected' => 1
        ]);
        /*Update validation flag of the company*/
        if($company->companyCorrections()->where('iscorrected', 0)->count())
        {
            //still has pending
        }else{
            $company->update([
                'isvalidated' =>0
            ]);
        }
            return $company_correction;
        });
    }



}