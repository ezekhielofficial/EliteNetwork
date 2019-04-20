<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\ActivationCode;
use Auth;
use App\User;
class ActivationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ActivationCodes = ActivationCode::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        foreach($ActivationCodes as $time)
        {
            $sasd = $time->created_at;
            $expTime = $sasd->addMonths(6);
        }
      

        


        
    
        return view('ActivationCodePage.ActivationCodeIndex')->with('ActivationCodes',$ActivationCodes)->with('expTime', $expTime)->with('usercode', $user->activationcode);
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $random = Str::random(4).date('Hsi');
        return view('ActivationCodePage.ActivationCodeCreate')->with('random',$random);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ActivationCode'=>'required',
            
          ]);
          $AC = new ActivationCode([
            'ActivationCode' => $request->get('ActivationCode'),
            'User_id'=> Auth::user()->id,
            
          ]);
          $AC->save();
          return redirect('/ActivationCode')->with('success', 'ActivationCode has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = ActivationCode::find($id);
        $share->delete();
   
        return redirect('/ActivationCode')->with('success', 'Activation Code has been deleted Successfully');
    }
}
