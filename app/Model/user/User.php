<?php

namespace App\Model\user;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TijmenWierenga\LaravelChargebee\Billable;
use TijmenWierenga\LaravelChargebee\HandlesWebhooks;

class User extends Authenticatable
{
    use Notifiable;
        use Billable, HandlesWebhooks;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function PersonalDetail(){
      return $this->hasOne('App\PersonalDetail');
    }
}
