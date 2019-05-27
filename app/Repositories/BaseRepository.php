<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }

    public function all()
    {
        return call_user_func(static::MODEL.'::all');
    }

    /**
<<<<<<< HEAD
     * @param array $input
     * @return mixed
     * Regex column search
     */
    public function regexColumnSearch(array $input)
    {
        $return = $this->query();
        if (count($input)) {
            $sql = $this->regexFormatColumn($input)['sql'];
            $keyword = $this->regexFormatColumn($input)['keyword'];
            $return = $this->query()->whereRaw($sql, $keyword);
        }
        return $return;
    }

    /**
     * @param array $input
     * @return array
     * Regex format according to drive used
     */
    public function regexFormatColumn(array $input)
    {
        $keyword = [];
        $sql = "";
        if (count($input)) {
            switch (DB::getDriverName()) {
                case 'pgsql':
                    foreach ($input as $key => $value) {
                        $sql .= " cast({$key} as text) ~* ? or";
                        $keyword[] = $value;
                    }
                    break;
                default:
                    foreach ($input as $key => $value) {
                        $value = strtolower($value);
                        $sql .= " LOWER({$key}) REGEXP  ? or";
                        $keyword[] = $value;
                    }
            }
            $sql = substr($sql, 0, -2);
            $sql = "( {$sql} )";
        }
        return ['sql' => $sql, 'keyword' => $keyword];
    }
    /**
=======
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
     * Check if phone number is unique
     * @param $phone_formatted
     * @param $phone_column_name
     * @param $action_type
<<<<<<< HEAD
     * @param null $object_id => primary key of the model
=======
     * @param null $object_id
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
     * @throws GeneralException
     */
    public function checkIfPhoneIsUnique($phone_formatted,$phone_column_name, $action_type,$object_id = null)
    {
        $return = 0;
        if ($action_type == 1){
            /*on insert*/
            $return = $this->query()->where($phone_column_name, $phone_formatted)->count();
        }else{
            /*on edit*/
            $return = $this->query()->where('id','<>', $object_id)->where($phone_column_name, $phone_formatted)->count();
        }
        /*Check outcome */
        if ($return == 0)
        {
            //is unique
        }else{
            /*Phone is taken: throw exception*/
            throw new GeneralException(__('exceptions.general.taken', ['key' => __('label.phone') ]));
        }
    }

    /**
     * Check if user is the owner (the one created) - when opening profiles/dashboard
     */
    public function checkIfUserIsOwner(Model $model)
    {
        $user = access()->user();
        if ($user->id != $model->user_id)
        {
            throw new GeneralException(__('exceptions.general.owner_restriction'));
        }
    }

    /**
     * Check if company (user belong to company) is the owner (the one created) - when opening profiles/dashboard
     */
    public function checkIfCompanyIsOwner(Model $model)
    {
        $user = access()->user();
        $company = $user->getCompanyAdministeredByUser();
        if(count($company)){
            if ($company->id != $model->company_id){
                throw new GeneralException(__('exceptions.general.owner_restriction'));
            }
        }else{
            throw new GeneralException(__('exceptions.general.owner_restriction'));
        }

    }

    /**
     * Check if company (user belong to company) or user  is the owner (the one created) - when opening profiles/dashboard
     */
    public function checkIfCompanyOrUserIsOwner(Model $model)
    {
        $user = access()->user();

        if (count($model->company_id)){
            $this->checkIfCompanyIsOwner($model);
        }else{
            /*Check if model is owned by user */
            $this->checkIfUserIsOwner($model);
        }
    }

    /**
     * Check if admin is Owner
     */
    public function checkIfAdminIsOwner()
    {
        $user = access()->user();
        if ($user->user_account_type != 1){
            throw new GeneralException(__('exceptions.general.admin_restriction'));
        }
    }

    /**
     * @param $param1
     * @param $param2
     * @throws GeneralException
     * Check if owner by comparing parameters
     */
    public function checkIfIsOwnerGeneral($param1, $param2)
    {
        try {
            if ($param1 == $param2) {
                //ok
            } else {
                //not owner
                throw new GeneralException(__('exceptions.general.owner_restriction'));
            }

        } catch (\Exception $exception) {
            throw new GeneralException(__('exceptions.general.owner_restriction'));
        }
    }



    /**
     * Check if User account type is Owner
     * @filter user accounts allowed for access action
     */
    public function checkIfUserAccountIsOwner(array $filter)
    {
        /*If not allowed to access throw exception*/
        if (!access()->allowUserAccount($filter)){
            throw new GeneralException(__('exceptions.general.account_restriction'));
        }
    }


    /**
     * @param Model $company_corrected
     * @throws \App\Exceptions\GeneralException
     * Check if user administer the company
     */
    public function checkIfUserAdministerCompany(Model $company)
    {
        $user= access()->user();
        $company_administered = $user->getCompanyAdministeredByUser();
        $this->checkIfIsOwnerGeneral($company_administered->id, $company->id);

    }


    /**
     * @param Model $company
     * Check if can open company document files i.e. company owner and administrator
     */
    public function checkIfAdminOrCompanyOwner(Model $company)
    {
        $user = access()->user();
        $company_administered = $user->getCompanyAdministeredByUser();
        /*Check and allow only administrator / owner of the company to open documents*/
        if( $company_administered->id == $company->id || $user->user_account_type == 1) {
            return true;
        }else{
            throw new GeneralException(__('exceptions.general.owner_restriction'));
        }

    }


}

