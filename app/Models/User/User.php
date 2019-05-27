<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 4/13/19
 * Time: 1:22 PM
 */

namespace App\Models\User;


use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class User extends  Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}