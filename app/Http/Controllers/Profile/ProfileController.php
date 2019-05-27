<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Access\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //


    public function __construct()
    {

        $this->users = new UserRepository();
    }

    public function educationDetails($user)
    {
        $user = User::find(2);
        return view('profiles.includes.edit_education_details')
            ->with('user',$user);
    }

    public function storeEducationDetails(Request $request,$id)
    {
    $this->users->storeEducationDetails($id);
        dd($users);
        $user = User::find($id);

        dd($request);



    }
}
