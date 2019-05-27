<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //


    public function __construct()
    {

    }

    public function educationDetails($user)
    {
        $user = User::find(2);
        return view('profiles.includes.edit_education_details')
            ->with('user',$user);
    }

    public function storeEducationDetails(Request $request,$id)
    {
        $user = User::find($id);




        dd($user);
    }
}
