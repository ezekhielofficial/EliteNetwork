<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\ValidActivationCode;

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
        $request->user()->update([
            'activatecode' => $request->get('activatecode')
            
        ]);
        return redirect('/dashboard')->with('success', 'Account successfully Activated');

    }
}
