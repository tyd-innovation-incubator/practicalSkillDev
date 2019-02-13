<?php

namespace App\Http\Controllers;
use App\Model\user\post;
use App\Model\user\Training;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = post::where('status',1)->paginate(3);
    return view('home',compact('posts'));
    }

}
