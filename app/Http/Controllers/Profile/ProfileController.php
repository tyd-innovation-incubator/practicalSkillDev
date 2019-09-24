<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\EducationDetail;
use App\Models\User;
use App\Repositories\Access\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    protected $users;


    public function __construct()
    {

        $this->users = new UserRepository();
    }

    public function educationDetails($uuid)
    {

        $user = User::where('uuid',$uuid)->get()->first();

        return view('profiles.includes.edit_education_details')
            ->with('user',$user);
    }

    public function storeEducationDetails(Request $request,$uuid)
    {
        $input = $request->all();

//        $user_education_details = $this->users->storeEducationDetails($input,$uuid);
        $user = User::where('uuid',$uuid)->get()->first();


        $user_education_details = EducationDetail::create(
            [
                'user_id' => $user->id,
                'degree_name' => $input['degree_name'],
                'university_name' => $input['university_name'],
                'qualification' => $input['qualification'],
                'start_date' => $input['start_date'],
                'end_date' => $input['end_date']
            ]
        );


        return redirect()->back();

    }
}
