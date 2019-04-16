<?php

namespace App\Http\Controllers\User;


use App\Models\Systdef\Country;
use App\Models\User\Post;
use App\Models\User\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    public  function  __construct()
    {

    }

    public function index()
    {

        $user_accounts = UserAccount::whereIn("id", [2, 3, 4])->pluck('name','id');
      $posts = Post::where('status',1)->paginate(3);
        return view('welcome')
            ->with('user_accounts',$user_accounts)
            ->with('posts',$posts);
    }
}
