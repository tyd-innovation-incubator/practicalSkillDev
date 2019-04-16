<?php

namespace App\Http\Controllers\User;



use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function Home()
    {
      $posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(6);

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
