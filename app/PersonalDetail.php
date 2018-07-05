<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
      public function user(){
        return $this->belongsTo('App\User');
      }

    protected $fillable = [
        'firstname', 'middlename', 'lastname','gender','nationality','district_of_birth','date_of_birth','marital_status','user_id'
    ];
}
