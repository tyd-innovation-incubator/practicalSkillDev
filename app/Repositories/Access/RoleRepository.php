<?php

namespace App\Repositories\Access;

use App\Models\Auth\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository
{
    const MODEL = Role::class;

    public function getPublic()
    {
        return $this->query()->select(['id', 'name'])->where("isadministrative", 0)->orderBy("id", "asc")->get();
    }

    /*Get Administrative roles for select*/
    public function getAdministrativeRolesForSelect()
    {
        return $this->query()->select(['id', 'name'])->where("isadministrative", 1)->orderBy("id", "asc")->get()->pluck("name", "id");;
    }


    /*Get roles for datatable*/
    public function getRolesForDataTable()
    {
        return $this->query();
    }


    /**
     * @param array $input
     * @return mixed
     * Store new role
     */
    public function store(array $input)
    {
        return  DB :: transaction(function() use ($input){
            $role = $this->query()->create([
                'id' => $this->getNextId(),
                'name' => $input['name'],
                'description' => $input['description'],
                'isfree' => 1,
                'isadministrative' => 1,
            ]);
            return $role;
        });
    }



    /*Update Role and Permissions */
    public function update(array $input, Model $role)
    {
        return  DB :: transaction(function() use ($input, $role){
            $this->updateRole($input, $role);
            $this->updateRolePermissions($input, $role);

            /*Auto sync the changes for non - administrative roles*/
            if($role->isadministrative == 0){
                $this->autoSyncPermissionRole();
            }

            return $role;
        });

    }


    /*Update role info to Role table*/
    public function updateRole(array $input, Model $role)
    {
        return  DB :: transaction(function() use ($input, $role){
            $role->update([
                'name' => $input['name'],
                'description' => $input['description'],

            ]);
            return $role;
        });
    }


    /*Update sync permissions with role*/
    public function updateRolePermissions(array $input, Model $role)
    {
        return  DB :: transaction(function() use ($input, $role){
            $permissions = [];

            foreach ($input as $key => $value) {
                if (strpos($key, 'permission') !== false) {
                    $permission_id = substr($key, 10);
                    array_push($permissions, $permission_id);
                }
            };

            $role->permissions()->sync($permissions);

            return $role;
        });
    }


    /*Get The max id*/
    public function getMaxId()
    {
        return $this->query()->max('id');
    }

    /*Get the next id to be used on the new entry*/
    public function getNextId()
    {
        return $this->getMaxId() + 1;
    }

    /*Auto sync Role with permissions for Free -> Business -> Premium */
    public function autoSyncPermissionRole()
    {
        $this->autoSyncFreeRole();
        $this->autoSyncBusinessRole();
        $this->autoSyncPremiumRole();
    }

    /*Auto sync all permissions of Guest mode into Free Role i.e. Guest -> Free*/
    public function autoSyncFreeRole()
    {
        $guest = $this->find(1);
        $free_role = $this->find(2);
        $guest_permissions = $guest->permissions()->pluck("permissions.id")->all();
        $free_role->permissions()->syncWithoutDetaching($guest_permissions);
    }

    /*Auto sync all permissions of free mode into Business Role i.e. Free -> Business*/
    public function autoSyncBusinessRole()
    {
        $free_role = $this->find(2);
        $business = $this->find(3);
        $free_permissions = $free_role->permissions()->pluck("permissions.id")->all();
        $business->permissions()->syncWithoutDetaching($free_permissions);
    }
    /*Auto sync all permissions of Business mode into Premium Role i.e. Business -> Premium*/
    public function autoSyncPremiumRole()
    {
        $business = $this->find(3);
        $premium = $this->find(4);
        $business_permissions = $business->permissions()->pluck("permissions.id")->all();
        $premium->permissions()->syncWithoutDetaching($business_permissions);
    }
}
