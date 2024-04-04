<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check() && Auth::user()->is_admin == 1){
        //     return $next($request);
        // }
        return $next($request);  
    }
}
