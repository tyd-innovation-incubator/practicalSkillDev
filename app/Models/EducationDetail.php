<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 5/23/19
 * Time: 6:31 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{



    protected $guarded = [];







    public function user()
    {
        return $this->belongsTo(User::class);
    }
}