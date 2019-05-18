<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserAccount extends Model
{
    use Notifiable;
    //


    public function users()
    {

        return $this->belongsToMany(User::class);
    }
}
