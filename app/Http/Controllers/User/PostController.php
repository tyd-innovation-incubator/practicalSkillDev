<?php

namespace App\Http\Controllers\User;
use App\Model\user\Training;
use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function post(post $post)
  {

   return view('user.post',compact('post'));

  }

  public function training(Training $training){

    return view('user.training',compact('training'));
  }
}
