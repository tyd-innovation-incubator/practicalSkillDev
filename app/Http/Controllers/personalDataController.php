<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\userpersonal_details;

class personalDataController extends Controller
{
    //

public function  index(){

  // get all the nerds
  $personal_details = personal_details::all();

  // load the view and pass the nerds
  return view('pages.personaldata.index')
      ->with('personal_details', $personal_details);

  }

  public function create(array $data)
  {


           // store
           return personal_details::create([
               'firstname' => $data['firstname'],
               'middlename' => $data['middlename'],
               'lastname' => $data['lastname'],
               'gender' => $data['gender'],
               'nationality' => $data['nationality'],
               'district_of_birth' => $data['district_of_birth'],
               'date_of_birth' => $data['date_of_birth'],
               'marital_status' => $data['marital_status'],
           ]);


           // redirect
           Session::flash('message', 'Successfully add Personal Details!');
           return Redirect::to('personal_details');
       }





}
