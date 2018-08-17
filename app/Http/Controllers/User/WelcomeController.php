<?php

namespace App\Http\Controllers\User;
use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {

      $posts = post::where('status',1)->paginate(3);
        return view('welcome',compact('posts'));
    }
}
