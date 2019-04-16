<?php

namespace App\Repositories\Access;

use App\Models\Auth\Permission;
use App\Repositories\BaseRepository;


class PermissionRepository extends BaseRepository
{
    const  MODEL = Permission::class;

    /*Get all permissions*/
    public  function  getAll()
    {
        return $this->query()->orderBy('display_name')->get();

    }

    /*Get permissions available for portal users except administrators*/
    public function getPermissionsForPortalUser()
    {
        return $this->query()->where('isadmin',0)->orderBy('display_name')->get();
    }

}
