<?php

namespace App\Repositories\Access;

use App\Jobs\Notifications\SendSms;
use App\Models\Auth\Staff;
use App\Models\Auth\User;
use App\Models\Stakeholder\Company;
use App\Notifications\Auth\ActivateUserAccountNotification;
use App\Notifications\Auth\DeactivateUserAccountNotification;
use App\Notifications\Auth\UserNeedsConfirmation;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CountryRepository;
use Illuminate\Database\Eloquent\Model;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

class UserRepository extends BaseRepository
{
    const MODEL = User::class;

    protected $staffs;

    public function __construct()
    {
        $this->staffs = new StaffRepository();
    }


    public function create(array $input)
    {
        return DB::transaction(function () use ($input) {
            /*Save user info to user table*/
            $user = $this->saveUser($input);

            //Register user account type
//            $user->userAccounts()->attach($input['user_account_cv_id']);
            $this->attachAccounts($user, $input);

            //Attach Premium Role, to be changed to Free Role when become live //TODO: SHOULD BASE ON ACCOUNT TYPE
            $user->attachRole(2);

            /*Attach Permissions based on roles attached*/
            $this->attachRolePermissions($user);

            $this->registrationNotification($user);

            return $user;
        });


    }

    /**
     * @param Model $user
     * Send registration notification via email
     */
    public function registrationNotification(Model $user)
    {
        /* Send confirmation email */
        $user->notify(new UserNeedsConfirmation());

        /* Send Welcome SMS */
        SendSms::dispatch($user, trans("strings.sms.registered"));
    }


    /**
     * @param array $input
     * @return mixed
     * @throws GeneralException
     */
    public function saveUser(array $input)
    {
        $countries = new CountryRepository();
        $data = ['email' => $input['email'], 'phone' => PhoneNumber::make($input['phone'], $input['country'])->formatE164()];
        $this->checkIfPhoneIsUnique($data['phone'], 'phone', 1, null);
        $user = DB::transaction(function () use ($input, $data,$countries) {
            $input['confirmation_code'] = md5(uniqid(mt_rand(), true));
            $input['password'] = bcrypt($input['password']);
            $user = $this->query()->create([
                'name' => $input['name'],
                'othernames' => $input['othernames'],
                'phone' => $data['phone'],
                'email' => $input['email'],
                'password' => $input['password'],
                'confirmation_code' => $input['confirmation_code'],
                'country_id' => $countries->getCountryByCode($input['country'])->id,
                'region_id' => array_key_exists('region', $input) ? $input['region'] : null,
                'province' => array_key_exists('province', $input) ? $input['province'] : null,
            ]);
            return $user;
        });

        return $user;
    }


    /*Attach accounts when registering user */
    public function attachAccounts(Model $user, array $input){
        /*Re sync*/
        $account_array = [];
        foreach ($input as $key => $value) {
            switch ($key)  {
                case 'user_account_cv_id':
                    $account_array = $value;
                    break;
            }
        }
        /*Remove Forum user if Service provider and cargo owner exist in array*/
        if ((in_array('2', $account_array) || in_array('3', $account_array)) && in_array('4', $account_array)){
            $pos = array_search('4', $account_array);
            unset($account_array[$pos]);
        }
        $user->userAccounts()->sync($account_array);
    }



    /* Update user information */
    public function update(array $input, Model $user)
    {
        return DB::transaction(function () use ($input,$user) {
            /*Update user info to user table*/
            $user = $this->updateUser($input, $user);
            $this->attachAccounts($user, $input);
            return $user;
        });
    }

    /**
     * @param array $input
     * @param Model $user
     * @return mixed
     * Update user info to user table
     */
    public function updateUser(array $input, Model $user){
        $countries = new CountryRepository();
        $data = ['phone' => PhoneNumber::make($input['phone'], $input['country'])->formatE164()];
        $this->checkIfPhoneIsUnique($data['phone'], 'phone', 2, $user->id);
        return DB::transaction(function () use ($input, $data,$countries,$user) {
            $user->update([
                'name' => $input['name'],
                'othernames' => $input['othernames'],
                'phone' => $data['phone'],
                'country_id' => $countries->getCountryByCode($input['country'])->id,
                'region_id' => array_key_exists('region', $input) ? $input['region'] : null,
                'province' => array_key_exists('province', $input) ? $input['province'] : null
            ]);

            return $user;
        });

    }


    /*Create company user: Add new user for the company */
    public function createCompanyUser(array $input, Company $company)
    {
        return DB::transaction(function () use ($input, $company) {
            $user = $this->saveUser($input);
            //Register user account type
            $this->attachAccounts($user, $input);

            $admin_user= access()->user();
            //update Attachment: inherit attributes from admin user of the company
            /*Role*/
            $role = $admin_user->roles()->first();
            $user->roles()->sync($role->id);
            /*company*/
            $company->users()->attach($user->id);
            /**/

            /*notification*/
            $this->registrationNotification($user);
            return $user;
        });
    }

    /*Create system user */
    public function createSystemUser(array $input)
    {
        $user = DB::transaction(function () use ($input) {
            $user = $this->saveUser($input);
            //Register user account type
            $this->attachAccounts($user, $input);
            /*Save Staff Attribute*/
            $this->staffs->create($input, $user);

            /*Role*/
            $this->attachRoles($input, $user);

            /*Permissions*/
            $this->attachRolePermissions($user);
            /**/

            /*notification*/
            $this->registrationNotification($user);
            return $user;
        });
        return $user;
    }



    /* Update system user information */
    public function updateSystemUser(array $input, Model $user)
    {
        return DB::transaction(function () use ($input, $user) {
            /*Start update user*/
            $this->updateUser($input, $user);
            /*end updating user table*/

            /*Update Staff information*/
            $staff = $user->staff;
            $this->staffs->update($input, $staff);

            /*Role*/
            $this->attachRoles($input, $user);

            /*Permissions*/
            $this->attachRolePermissions($user);
            /**/
            return $user;
        });

    }


    /**
     * @param array $input
     * @param Model $user
     * Attach roles to user from the form submitted
     */
    public function attachRoles(array $input, Model $user){
        $role_array = [];
        foreach ($input as $key => $value) {
            switch ($key)  {
                case 'roles':
                    $role_array = $value;
                    break;
            }
        }
        $user->roles()->sync($role_array);

    }

    /**
     * @param Model $user
     * Attach permissions based on roles attached to the user
     */
    public function attachRolePermissions(Model $user)
    {
        $array = [];
        $permissions = [];
        $roles = $user->roles;
        foreach($roles as $role){
            $array = $role->permissions()->pluck("permissions.id")->all();
//            $array = $permissions;
            $permissions = array_merge($array, $permissions);
        }

        $user->permissions()->sync($permissions);

    }


    /**
     * @param array $input
     * @return mixed
     * Change Password of contact person /portal user.
     */
    public function changePassword(array $input, User $user)
    {
        $user->update(['password' => bcrypt($input['password'])]);
        return $user;
    }



    /**
     * @param $token
     * @return mixed
     */
    public function findByConfirmationToken($token)
    {
        return $this->query()->where('confirmation_code', $token)->first();
    }

    public function confirmAccount($token)
    {
        $user = $this->findByConfirmationToken($token);

        if ($user->confirmed == 'true') {
            throw new GeneralException(__('exceptions.auth.confirmation.already_confirmed'));
        }

        if ($user->confirmation_code == $token) {
            $user->confirmed = 't';
            $user->save();
            return access()->login($user);
        }
        throw new GeneralException(trans('exceptions.auth.confirmation.mismatch'));
    }

    public function getName($id){
        $user = $this->query()->select('name')->where('id',$id)->first()->name;
        return $user;
    }


    /*Get System User for admin datatable*/
    public function getAllSystemUsersForDataTable($user){
        $system_user = $user->whereHas('userAccounts', function ($q) {
            $q->where('user_account_cv_id', 1);
        })->withoutGlobalScopes();
        return $system_user;
    }


    /*Get Portal User for admin datatable*/
    public function getAllPortalUsersForDataTable($user){
        $system_user = $user->whereHas('userAccounts', function ($q) {
            $q->where('user_account_cv_id', '<>', 1);
        })->withoutGlobalScopes();
        return $system_user;
    }

    /*deactivate a company User*/
    public  function  deactivateCompanyUser($id){
        $user =  User::find($id);
        return   DB::transaction(function () use ($user) {
            $user->update([
                'isactive'=>0,
            ]);
            return $user;
        });
    }

    /**
     * set the user status, either active or inactive
     * @param $user
     * @param $status
     * @return mixed
     */
    public  function  setUserStatus($user, $status){
        return   DB::transaction(function () use ($user, $status) {
            if($status == 1) {
                //ACTIVATED
                //send sms to user
                if (isset($user->phone)) {
                    SendSms::dispatch($user, trans('alert.stakeholder.company.sms.activated', ['name' => $user->name]));
                }
                //send email to user
                //@TODO add a general email function with template support
                $user->notify(new ActivateUserAccountNotification());
            }else{
                //DEACTIVATED
                //send sms to user
                if (isset($user->phone)) {
                    SendSms::dispatch($user, trans('alert.stakeholder.company.sms.deactivated', ['name' => $user->name]));
                }
                //send email to user
                //@TODO add a general email function with template support
                $user->notify(new DeactivateUserAccountNotification());
            }

            /*update isactive*/
                 $user->update([
                'isactive' => $status
            ]);

            return $user;
        });
    }

    /**
     *
     */
    public function deactivateUser()
    {

    }
}
