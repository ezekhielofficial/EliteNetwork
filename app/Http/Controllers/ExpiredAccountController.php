<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\ValidActivationCode;
use Auth;
use Illuminate\Support\Facades\DB;
class ExpiredAccountController extends Controller
{
    //
    
    public function expired()
    {
        return view('auth.accountexpired');
    }

    

    public function postActivate(Request $request)
    {
        

        $request->validate([
            'activatecode'=>['required','min:10','max:10', 'unique:users',new ValidActivationCode],
            
          ]);



          $find = User::where('sponsorname',Auth::user()->sponsorname)->count();
          if($find == 1)
          {
            
            $request->user()->update([
                'activatecode' => $request->get('activatecode'),
                'mlmid'=> '1',
            ]);
            User::where('name', Auth::user()->sponsorname)->update(['cash' => '500']) ;
            
          }
          else
          {
              //if 2,4,6 add 1000
              //if 1,3,5 add 500
              //if 6789 add 1000
              //if %5 add 500?
            $lastmlmid = User::where('sponsorname',Auth::user()->sponsorname);
            $lol = $lastmlmid->max('mlmid');
            ++$lol;
            $request->user()->update([
            'activatecode' => $request->get('activatecode'),
            'mlmid'=> $lol,
                                     ]);
        }
         
        
        return redirect('/dashboard')->with('success', 'Account successfully Activated');

    }
}
