<?php

namespace App\Http\Controllers;

use App\Model\user\PersonalDetail;
use Illuminate\Http\Request;
use Auth;


class PersonalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get all the nerds
        $personal_details = PersonalDetail::all();

        // load the view and pass the nerds
        return view('pages.personaldata.index')
            ->with('personal_details', $personal_details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.personaldata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
           'firstname' => 'required',
           'middlename' => 'required',
           'lastname' => 'required',
           'gender' => 'required',
           'nationality' => 'required',
           'district_of_birth' => 'required',
           'date_of_birth' => 'required',
           'marital_status' => 'required',
       ]);

       PersonalDetail::create([
        'firstname' => request('firstname'),
         'lastname' => request('lastname'),
         'middlename' => request('middlename'),
         'gender' => request('gender'),
         'nationality' => request('nationality'),
         'date_of_birth' => request('date_of_birth'),
         'district_of_birth' => request('district_of_birth'),
         'marital_status' => request('marital_status'),
         'user_id' => auth()->id()


       ]);
       $personalDetail = new PersonalDetail;
       $personalDetail ->save();
       return redirect()->route('pages.personaldata.index')
                       ->with('success','Personal Details created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalDetail  $personalDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalDetail  $personalDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalDetail  $personalDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalDetail  $personalDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalDetail $personalDetail)
    {
        //
    }
}
