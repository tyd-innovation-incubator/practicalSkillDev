<?php
namespace App\Repositories\Stakeholder;

use App\Models\Stakeholder\CompanyService;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class ReminderRepository extends BaseRepository
{


    public function __construct()
    {

    }

    public function reminders(){
        $alert_count = 0;
        $company_registration = $this->companyRegistration();
        $tender_reminders = $this->tenderReminders();
        if($company_registration['alert_count'] == 1 || $tender_reminders['alert_count']){
            $alert_count = 1;
        }
        return ['alert_count' => $alert_count, 'company_registration' => $company_registration, 'tender_reminders' => $tender_reminders];
    }




    /**
     * -----Start-------REGISTRATION --------
     */
    public function companyRegistration()
    {
        $user = access()->user();
        $user_account_type = $user->user_account_type;
        $company_administered = $user->getCompanyAdministeredByUser();
        $company_registration = null;
        $company_validation = null;
        $company_correction = null;
        $company_service = null;
        $company_document = null;
        $alert_count = 0;
        if(count($company_administered)){
            /*Remind on Validation if pending*/
            if($company_administered->isvalidated != 1){
                /*check if has attached documents*/
                if($company_administered->documents()->where('document_group_id', 1)->count() == 0){
                    $company_document = __('alert.stakeholder.reminder.company_document') . '<a href="' . route('stakeholder.company.edit_legal_documents', $company_administered->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' . trans('label.crud.add') . '"></i>'.' '. trans('label.crud.add').'</a> ';
                }else{
                    $company_validation  =  __('alert.stakeholder.reminder.company_validation');
                }

                /*Company has pending corrections during registration /validation*/
                if($company_administered->companyCorrections()->where('iscorrected', 0)->count() > 0){
                    $company_correction  =  __('alert.stakeholder.reminder.company_correction'). '<a href="' . route('stakeholder.company.profile', $company_administered->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' . trans('label.stakeholder.company_profile') . '"></i>'.' '. trans('label.stakeholder.company_profile').'</a> ';
                }

                $alert_count = 1;
            }
            /*Company registered for service provider - check if has company services*/
            if($user_account_type == 2 && $company_administered->logisticServices()->count() == 0){
                $company_service = __('alert.stakeholder.reminder.company_service');
                $alert_count = 1;
            }
        }else{
            /*If Service provider - Prompt to register company information*/
            if($user_account_type == 2){
                $company_registration  = __('alert.stakeholder.reminder.company_registration') . '<a href="' . route('stakeholder.company.create') . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' . trans('label.register') . '"></i>'.' '. trans('label.register').'</a> ';
                $alert_count = 1;
            }
        }
        return ['alert_count' => $alert_count,  'company_validation' => $company_validation, 'company_registration' => $company_registration, 'company_correction' => $company_correction,'company_service' => $company_service , 'company_document' => $company_document];
    }

    /*-----End--------Registration-----------*/



    /**
     * --Start ---- BUSINESS REMINDERS-----------
     */

    /*Tender reminders*/
    public function tenderReminders()
    {
        $user = access()->user();
        $user_account_type = $user->user_account_type;
        $company_administered = $user->getCompanyAdministeredByUser();
        $tenders_pending_award = null;
        $tenders_pending_complete = null;
        $alert_count = 0;
        $today = Carbon::now();
        if(count($company_administered)){
            /*check if there is tender past deadline and not awarded For COMPANIES (service providers)*/
            $tender_award_pendings = $company_administered->tenders()->where('isclosed', 0)->whereDate('expire_date', '<', $today);
            if(($tender_award_pendings->count() > 0)){
                $tenders_array = [];
                foreach($tender_award_pendings->get() as $tender_pending){
                    array_push($tenders_array,   '<a href="' . route('tender.profile', $tender_pending->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' .   truncateString($tender_pending->name, 50) . '"></i>'.' '.   truncateString($tender_pending->name, 50).'</a> ' );
                }
                $tenders_pendings_links    = implode(", ", $tenders_array);
                $tenders_pending_award = __('alert.stakeholder.reminder.tender_pending_award') . ' ' . $tenders_pendings_links;
                $alert_count = 1;
            }

            /*check if there is tender past service end date and not completed For Companies*/
            $tender_complete_pendings = $company_administered->tenders()->where('isclosed', 0)->whereDate('to_date', '<', $today);
            if(($tender_complete_pendings->count() > 0)){
                $tenders_array = [];
                foreach($tender_complete_pendings->get() as $tender_pending){
                    array_push($tenders_array,   '<a href="' . route('tender.profile', $tender_pending->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' .   truncateString($tender_pending->name, 50) . '"></i>'.' '.   truncateString($tender_pending->name, 50).'</a> ' );
                }
                $tenders_pendings_links    = implode(", ", $tenders_array);
                $tenders_pending_complete = __('alert.stakeholder.reminder.tender_pending_complete') . ' ' . $tenders_pendings_links;
                $alert_count = 1;
            }

        }else{
            /*check if there is tender past deadline and not awarded - USERS (Cargo owners)*/
            $tender_award_pendings = $user->tenders()->where('isclosed', 0)->whereDate('expire_date', '<', $today);
            if(($tender_award_pendings->count() > 0)){
                $tenders_array = [];
                foreach($tender_award_pendings->get() as $tender_pending){
                    array_push($tenders_array,   '<a href="' . route('tender.profile', $tender_pending->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' .   truncateString($tender_pending->name, 50) . '"></i>'.' '.   truncateString($tender_pending->name, 50).'</a> ' );
                }
                $tenders_pendings_links    = implode(", ", $tenders_array);
                $tenders_pending_award = __('alert.stakeholder.reminder.tender_pending_award') . ' ' . $tenders_pendings_links;
                $alert_count = 1;
            }

            /*check if there is tender past service end date and not completed - USERS*/
            $tender_complete_pendings = $user->tenders()->where('isclosed', 0)->whereDate('to_date', '<', $today);
            if(($tender_complete_pendings->count() > 0)){
                $tenders_array = [];
                foreach($tender_complete_pendings->get() as $tender_pending){
                    array_push($tenders_array,   '<a href="' . route('tender.profile', $tender_pending->uuid) . '"" ><i class="icon fa fa-add" data-toggle="tooltip" data-placement="top" title="' .   truncateString($tender_pending->name, 50) . '"></i>'.' '.   truncateString($tender_pending->name, 50).'</a> ' );
                }
                $tenders_pendings_links    = implode(", ", $tenders_array);
                $tenders_pending_complete= __('alert.stakeholder.reminder.tender_pending_complete') . ' ' . $tenders_pendings_links;
                $alert_count = 1;
            }
        }

        return ['alert_count' => $alert_count, 'tenders_pending_award' => $tenders_pending_award, 'tenders_pending_complete' => $tenders_pending_complete];
    }


    /*---End ------Business-----------*/

}