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
        $codesearch = ActivationCode::where('ActivationCode', 'LIKE', $userac)->first();
        $expdate = $codesearch->created_at->addMinutes(2);
        $created_date = $codesearch->created_at;

    if (Carbon::now()->diffInMonths($created_date) >= 6)
    {     
            return redirect('/ActivateAccount/ActivationCode');
    }

        return $next($request);
    }
}
