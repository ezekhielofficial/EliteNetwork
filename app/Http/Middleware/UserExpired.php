<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use App\ActivationCode;
class UserExpired
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
      
        
        $userac = Auth::user()->activatecode;
       
      
        
        if ( $userac == null && Auth::user()->isAdmin != null)
        {
            return $next($request);
        }
        $codesearch = ActivationCode::where('ActivationCode', 'LIKE', $userac)->first();
        $created_date = $codesearch->created_at;
        

    if (Auth::user()->isAdmin != null || Carbon::now()->diffInMonths($created_date) >= 6 )
    {     
            return redirect('/ActivateAccount/ActivationCode');
    }

    return $next($request);
        
    }
}
