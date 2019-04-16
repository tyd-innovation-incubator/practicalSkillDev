<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function post()
  {

   return view('user.post',compact('post'));

  }

  public function training(Training $training){

    return view('user.training',compact('training'));
  }
}
