<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
//=======
//
//   switch ($guard) {
//     case 'admin':
//      if(Auth::guard($guard)->check()){
//        return redirect('/admin');
//      }
//       break;
//
//     default:
//
//       if (Auth::guard($guard)->check()) {
//           return redirect('/home');
//       }
//       break;
//   }
//
//>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4

        return $next($request);
    }
}
