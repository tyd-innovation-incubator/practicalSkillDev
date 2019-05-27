<?php

namespace App\Http\Controllers\Admin;
use App\Model\admin\admin;
use App\Model\admin\role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $users = admin::all();
      return view('admin.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = role::all();

        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
           'name' => 'required|max:255',
           'email' => 'required|email|max:255|unique:admins',
           'password' => 'required|min:6|confirmed',
           'phone' => 'required|numeric'


         ]);
//password encryption
          $request['password'] = bcrypt('password');
         $users = admin::create($request->all());
           $users->roles()->sync($request->role);
         return redirect(route('user.index'));

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = admin::find($id);
      $roles = role::all();

      return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric'
      ]);

      $request->status? : $request['status']=0;
      $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
      admin::find($id)->roles()->sync($request->role);
      return redirect(route('user.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();

        return redirect()->back();
    }
}
