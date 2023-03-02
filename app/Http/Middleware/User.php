<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->is_admin == 0 && (Auth::user()->status == 1 || Auth::user()->status == 2 || Auth::user()->status == 0)) {
            return $next($request);
        }
        if (Auth::user()->is_admin == 0) {
            return abort(403);
        }else{
            return redirect()->route('logout');
        }


    }
}
