<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class ConnectionController extends Controller
{
    public function ConnectionView()
    {
       $myConnections =  User::where('sponsorname', Auth::user()->name)->get();
        return view('Pages.Connection')->with('myConnections', $myConnections);
    }
}
