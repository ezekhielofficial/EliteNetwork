<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\ActivationCode;
class ConnectionController extends Controller
{
    public function ConnectionView()
    {
       $myConnections =  User::where('sponsorname', Auth::user()->name)->get();



       if(Auth::user()->isAdmin == 1)
       {
        return view('Pages.Connection')->with('myConnections', $myConnections);
       }
      else
      {
        return view('Pages.UserConnection')->with('myConnections', $myConnections);
      }
       
    }

}
