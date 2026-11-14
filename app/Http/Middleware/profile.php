<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class profile
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
         if(auth::check() && Auth::user()->isProfile == '0'){
            return $next($request);
         }
         else {
            return \Redirect::route('users', array(Auth::user()->id));
         }
    }
}
