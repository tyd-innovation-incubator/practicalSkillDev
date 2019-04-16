<?php

namespace App\Repositories\Stakeholder;

use App\Exceptions\GeneralException;
use App\Jobs\Notifications\SendSms;
use App\Models\Stakeholder\Company;
use App\Notifications\Auth\UserNeedsConfirmation;
use App\Notifications\Stakeholder\CompanyCompleteVerificationNotification;
use App\Notifications\Stakeholder\CompanyDeclineRegistration;
use App\Notifications\Stakeholder\CompanyRejectForCorrectionNotification;
use App\Notifications\Stakeholder\CreatedCompanyNotification;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CountryRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Repositories\Sysdef\RegionRepository;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Propaganistas\LaravelPhone\PhoneNumber;

class CompanyRepository extends BaseRepository
{

    use AttachmentHandler, FileHandler;

    const MODEL = Company::class;

    protected $country;
    protected $region;
    protected $documents;
    protected $base = null;

    public function __construct()
    {
        $this->country = new CountryRepository();
        $this->region = new RegionRepository();
        $this->documents = new DocumentRepository();
        $this->base = $this->real(company_dir() . DIRECTORY_SEPARATOR);
        if (!$this->base) {
            throw new GeneralException('Base directory does not exist');
        }
    }

    public function getWithPagination()
    {
        $query = $this->query()->paginate(sysdef()->name('pagination_high'));
        return $query;
    }

    public function getCvWithPagination($code_value){
        $query = $this->query()->whereHas('logisticServices', function ($q) use($code_value) {
            $q->where('logistic_service_cv_id', $code_value);
        })->paginate(sysdef()->name('pagination_high'));
        return $query;
    }

    /*Save/ store company registration information*/
    public function store($input)
    {
        $countries = new CountryRepository();
        $regions = new RegionRepository();
        $company = DB::transaction(function () use ($input, $countries, $regions) {
            $phone = PhoneNumber::make($input['phone'], $input['country'])->formatE164();
            $telephone = isset($input['telephone']) ?  PhoneNumber::make($input['telephone'], $input['country'])->formatE164() : $input['telephone'];
            $this->checkPhoneIsUnique($input,1, null );
            $company = $this->query()->create([
                'islocal' => $input['locality_check'],
                'name' => $input['name'],
                'email' => $input['email'],
                'box' => $input['box'],
                'phone' => $phone,
                'telephone' => $telephone,
                'fax' => $input['fax'],
                'country_id' => $countries->getCountryByCode($input['country'])->id,
                'region_id' => (array_key_exists('region' , $input)) ? $input['region'] : null,
                'province' => $input['city'],
                'web' => $input['web'],
                'tin' => $input['tin'],
                'about' => $input['about'],
                'physical_address' => $input['physical_address'],
            ]);

            /*Attach user and company*/
            $this->attachUser($company);
            /*Attach associations*/
            $this->attachAssociations($company, $input);

            /*For service Provider*/
            if (array_key_exists('service_types', $input)){
                /*Attach services*/
                $this->attachServiceTypes($company, $input);
                $this->attachCapacities($company, $input);
            }
            /*Attach logo*/
            $document_logo_id = $this->documents->getCompanyLogoDocumentId();
            $this->attachCompanyDocument($company,$document_logo_id, 'logo' );

            /* Send registration email */
            $user = $company->users()->where('isregister',1)->first();
            $user->notify(new CreatedCompanyNotification($company));

            /*attach alert*/
            alert()->store($company, [
                'user_id' => $company->users()->where('isadmin', 1)->first()->id,
                'type_cv_id' => 209,
                'data' => __('strings.email.alert.alerts.stakeholder.company.company_posted_', ['company' => $company->name]),
            ]);

            /* Send registration SMS */
            SendSms::dispatch($user, trans("strings.sms.company_registration",['company' => $company->name]));

            return $company;
        });
        return $company;
    }





    /**
     * @param $id
     * @param array $input
     * @return mixed
     */
    public function updateInformation($id, array $input)
    {
        $company = $this->find($id);
        $countries = new CountryRepository();
        $regions = new RegionRepository();
        return  DB::transaction(function () use ($company, $input, $countries, $regions) {
            $phone = PhoneNumber::make($input['phone'], $input['country'])->formatE164();
            $telephone = isset($input['telephone']) ?  PhoneNumber::make($input['telephone'], $input['country'])->formatE164() : $input['telephone'];
            $this->checkPhoneIsUnique($input,2, $company );
            $company->update([
                'islocal' => ($company->isvalidated == 1) ? $company->islocal : $input['locality_check'],
                'name' => ($company->isvalidated == 1) ? $company->name : $input['name'],
                'email' => $input['email'],
                'box' => $input['box'],
                'phone' => $phone,
                'telephone' => $telephone,
                'fax' => $input['fax'],
                'country_id' => $countries->getCountryByCode($input['country'])->id,
                'region_id' => (array_key_exists('region' , $input)) ? $input['region'] : null,
                'province' => $input['city'],
                'web' => $input['web'],
                'tin' => ($company->isvalidated == 1) ? $company->tin : $input['tin'],
                'about' => $input['about'],
                'physical_address' => $input['physical_address'],
            ]);

            /*Attach associations*/
            $this->attachAssociations($company, $input);

            /*Attach logo*/
            $document_logo_id = $this->documents->getCompanyLogoDocumentId();
            $this->attachCompanyDocument($company,$document_logo_id, 'logo' );


            return $company;
        });
    }

    /**
     * @param Company $company
     * Approve registration
     */
    public function approveRegistration(Company $company)
    {

        $company->update(['isvalidated'=> 1, 'validation_date' => Carbon::now(), 'validated_by' => access()->id()]);

        /*Send notification*/
        //TODO: Send email and sms notifications for complete verification
        $user = $company->users()->where('isregister',1)->first();

        /*Send Email notification*/
        $user->notify(new CompanyCompleteVerificationNotification($company));

        /*Send SmS notification*/
        SendSms::dispatch($user, trans("strings.sms.company_verification",['company' => $company->name]));


        /*attach alert*/
        alert()->store($company, [
            'user_id' => $company->users()->where('isadmin', 1)->first()->id,
            'type_cv_id' => 209,
            'data' => __('strings.email.alert.alerts.stakeholder.company.company_approved', ['company' => $company->name]),
        ]);

    }


    /**
     * @param Company $company
     * reassess company
     */
    public function reassessRegistration(Company $company)
    {
        $company->update([
            'isvalidated'=> 0,
            'validation_date' => Carbon::now(),
            'validated_by' => access()->id()]);
    }



    /**
     * @param Model $company
     * Reject company registration for correction
     * set isvalidated flag to 2
     */
    public function rejectForCorrection(Model $company)
    {
        $company->update([
            'isvalidated' => 2
        ]);
        /*Send notification*/
        //TODO: Send email and sms notifications for reject for correction
        $user = $company->users()->where('isregister',1)->first();

        /*Sending Email Notiication*/
        $user->notify(new CompanyRejectForCorrectionNotification($company));

        /*Send sms */
        SendSms::dispatch($user, trans("strings.sms.reject_company",['company' => $company->name]));


        /*attach alert*/
        //TODO: Remove alert (+ In all functions) after node js is complete
        alert()->store($company, [
            'user_id' => $company->users()->where('isadmin', 1)->first()->id,
            'type_cv_id' => 209,
            'data' => __('strings.email.alert.alerts.stakeholder.company.company_rejected', ['company' => $company->name]),
        ]);
    }

    /**
     * @param Model $company
     * Decline company registration
     */
    public function declineRegistration(Model $company, array $input)
    {
        $company->update([
            'isvalidated' => 3,
            'decline_reason' => $input['reason'],
            'validated_by' => access()->id(),
            'validation_date' => Carbon::now()
        ]);
        /*Send notification*/
        //TODO: Send email and sms notifications for decline registration

        $user = $company->users()->where('isregister',1)->first();
        /*Sending Email Notification*/
        $user->notify(new CompanyDeclineRegistration($company));

        /*Sending Sm S notification*/
        SendSms::dispatch($user, trans("strings.sms.decline_company_registration",['company' => $company->name]));

        /*attach alert*/
        alert()->store($company, [
            'user_id' => $company->users()->where('isadmin', 1)->first()->id,
            'type_cv_id' => 209,
            'data' => __('strings.email.alert.alerts.stakeholder.company.company_declined', ['company' => $company->name]),
        ]);
    }




    /**
     * @param array $input
     * @param Model $company
     * @throws GeneralException
     * Check if phone and telephone is unique
     * @action_type i.e. 1 + when inserting, 2 => when updating
     */
    public function checkPhoneIsUnique(array $input, $action_type, Model $company = null)
    {
        $phone = PhoneNumber::make($input['phone'], $input['country'])->formatE164();
        $this->checkIfPhoneIsUnique($phone, 'phone', $action_type, ($company == null) ? null : $company->id);
        $telephone = isset($input['telephone']) ?  PhoneNumber::make($input['telephone'], $input['country'])->formatE164() : $input['telephone'];
        if(count($telephone)){
            $this->checkIfPhoneIsUnique($telephone, 'telephone', $action_type, ($company == null) ? null : $company->id);
        }

    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function updateService($id, $input)
    {
        $company = $this->find($id);
        return  DB::transaction(function () use ($company, $input) {
            /*Attach services*/
            $this->attachServiceTypes($company, $input);
            $this->attachCapacities($company, $input);

            return $company;
        });
    }

    /*Attach user to the company */
    public function attachUser(Model $company)
    {
        $user = access()->user();
        $company->users()->attach([$user->id =>  ['isadmin' => 1, 'isregister' => 1]]);
    }

    /*Attach logistic associations to the company*/
    public function attachAssociations(Model $company, $input)
    {
        $associations = new AssociationRepository();
        /*Re sync*/
        $association_array = [];
        foreach ($input as $key => $value) {
            switch ($key)  {
                case 'associations':
                    $association_array = $value;
                    /*loop on association array*/
                    foreach($association_array as $association_cv_id){
                        $reg_no = $input['association_reg'. $association_cv_id];
                                     $member_active = ($associations->checkIfCompanyIsActiveMember($association_cv_id, $reg_no) == true) ? 1 : 0;
                        $company->logisticAssociations()->syncWithoutDetaching([$association_cv_id => ['external_reference' => $reg_no, 'member_active' => $member_active]]);

                    }
                    break;
            }
        }

    }

    /*Attach services types to the company*/
    public function attachServiceTypes(Model $company, $input)
    {
        $service_type_array = [];
        $description = null;
        foreach ($input as $key => $value) {
            switch ($key)  {
                case 'service_types':
                    $service_type_array = $value;
                    foreach($value as $service_key => $service_value){
                        $description = 'description'. $service_value;
                        $company->logisticServices()->syncWithoutDetaching([$service_value => ['description' => $input[$description]]]);
                    }
                    break;
            }
        }
        $company->logisticServices()->sync($service_type_array);
    }

    /*Attach services capacities to the company*/
    public function attachCapacities(Model $company, $input)
    {
        /*Re sync*/
        $capacity_array = [];
        foreach ($input as $key => $value) {
            switch ($key)  {
                case 'category_of_carriages':
                    $capacity_array=   array_merge($capacity_array, $value);
                    break;
                case 'transportation_specificity':
                    $capacity_array= array_merge($capacity_array, $value);
                    break;
                case 'warehouse_facilities':
                    $capacity_array= array_merge($capacity_array, $value);
                    break;
                case 'insurance_services':
                    $capacity_array= array_merge($capacity_array, $value);
                    break;
            }
        }
        $company->logisticCapacities()->sync($capacity_array);
    }

    /**
     * @param Model $company
     * @param $document_id => document id which is going to be attached i.e. logo, Tin
     * @param $file_key_name => name of input on the create request
     * Attach company document files i.e. tin, logo, certificates.
     */
    public function attachCompanyDocument(Model $company, $document_id, $file_key_name)
    {
        DB::transaction(function () use ($company, $file_key_name, $document_id) {
            /*Attach to document pivot table*/
            if (request()->hasFile($file_key_name)) {
                $file = request()->file($file_key_name);
                if ($file->isValid()) {
                    /*Check if already attached - if exist detach*/
                    $this->unlinkCompanyAttachmentFile($company, $document_id);
                    /*Save into pivot table*/
                    $company->documents()->syncWithoutDetaching([$document_id => [
                        'name' => $file->getClientOriginalName(),
                        'description' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]]);
                }
                $path = $this->base . DIRECTORY_SEPARATOR . $company->id . DIRECTORY_SEPARATOR . $document_id;
                $uploadedDocument = count($company->documents()->where('document_id', $document_id)->first()) ? $company->documents()->where('document_id',$document_id)->first()->pivot : null ;
                /*Unlink if exist*/
                if (count($uploadedDocument)) {
                    $file_path = $company->companyAttachmentFile($document_id);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                /*Save Document*/
                $this->saveDocument($company, $file_key_name, $path, $uploadedDocument);
            } else {
                return false;
            }
        });

    }

    /* Detach/unlink company attachment and attachment from directory*/
    public function unlinkCompanyAttachmentFile(Model $company, $document_id)
    {
        if (count($company->documents()->where('document_id', $document_id)->first())){
            /*Detach attachment from dir*/
            $file_path = $company->companyAttachmentFile($document_id);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    /**
     * @param Model $company
     * @param $input
     * Attach company legal documents i.e TIN, certificates/
     */
    public function attachCompanyLegalDocuments(Model $company, $input)
    {
        foreach ($input as $key => $value) {
            if (strpos($key, 'document_file') !== false) {
                $document_id = substr($key, 13);
                $key_file_name = 'document_file'.$document_id;
                $this->attachCompanyDocument($company, $document_id, $key_file_name);
            }
        };

    }




    /* Get all codes of company capacities*/
    public function getCapacitiesCodes($id)
    {
        $company = $this->find($id);
        $codes = [];
        $code_values = [];
        foreach($company->logisticCapacities as $capacity){
            array_push($codes, $capacity->code_id);
            array_push($code_values, $capacity->id);
        }
        return ['codes'=> $codes, 'code_values' => $code_values];
    }


    /*Get all companies administered by use for DataTable */
    public function getCompaniesAdministeredByUser($user)
    {
        return $this->query()->whereHas('users', function ($query) use ($user){
            $query->where('user_id', $user->id);
        });
    }

    /*Get All companies for admin -DataTable*/
    public function getAllCompaniesForAdminForDataTable(){
        return $this->query();
    }

    /*Get all companies pending for verification of registration*/
    public function getPendingForVerificationForDataTable(){
        return $this->query()->where('isvalidated', 0)->has('documents')->orderBy('id', 'asc');
    }

    /*Get all companies pending for corrections during registration*/
    public function getPendingCorrectionsForForDataTable(){
        return $this->query()->where('isvalidated', 2)->orderBy('id', 'asc');
    }

    /*Get all companies ceclined*/
    public function getDeclinedCompaniesForDataTable(){
        return $this->query()->where('isvalidated', 3)->orderBy('id', 'asc');
    }

    /*Get all proposals by company for dataTable*/
    public function getProposalsByCompanyForDataTable($id)
    {
        $company = $this->find($id);
        return $company->tenderApplications()->orderBy('id');
    }



    /*Get all Tenders by company for dataTable*/
    public function getTendersByCompanyForDataTable($id)
    {
        $company = $this->find($id);
        return $company->tenders()->orderBy('id');

    }


    /*Get all Service Offers by company for dataTable*/
    public function getServiceOffersByCompanyForDataTable($id)
    {
        $company = $this->find($id);
        return $company->offers()->orderBy('id');
    }

    /*Get all Tenders by company for dataTable*/
    public function getAdvertsByCompanyForDataTable($id)
    {
        $company = $this->find($id);
        return $company->ads()->orderBy('id');
    }

    public function setRating($id, $rating){
        DB::transaction(function () use ($id, $rating) {
            $query = $this->find($id);
            $query->rating = $rating;
            $query->update();
        });
    }
}
