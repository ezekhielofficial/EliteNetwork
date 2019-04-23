<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\ActivationCode;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
   
       if( $user->isAdmin == 1)
       {
           return redirect('/admin');
       }
        return view('dashboard')
        ->with('User_code', $user->activationcode );
    }
    public function admin()
    {
        return view('Admin');
    }
    public function accessdenied()
    {
        return view('Pages.AccessDenied');
    }
}
