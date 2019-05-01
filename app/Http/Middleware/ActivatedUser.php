<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class ActivatedUser
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
        if (Auth::user()->activatecode == null && Auth::user()->isAdmin == null ) {
        
        return redirect('/ActivateAccount/ActivationCode');
    }
    

    return $next($request);
        
    }
}
