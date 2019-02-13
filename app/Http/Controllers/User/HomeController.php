<?php

namespace App\Http\Controllers\User;
use App\Model\user\post;
use App\Model\user\Training;
use App\Model\user\tag;
use App\Model\user\Apply;

use App\Model\user\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function Home()
    {
      $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(6);

    return view('user.skills',compact('posts'));
    }

    public function training()
    {

    }

    public function tag(tag $tag){
           $posts = $tag->posts();
           return view('user.skills',compact('posts'));

    }

    public function category(category $category){
       $posts = $category->posts();
       return view('user.skills',compact('posts'));
    }

    public function apply(apply $apply){
      return redirect::to()->withInput();
      return all();
    }
      
}
