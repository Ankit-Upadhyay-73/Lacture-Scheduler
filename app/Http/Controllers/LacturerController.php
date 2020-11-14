<?php

namespace App\Http\Controllers;
use App\Models\Lacture;
use Illuminate\Http\Request;
use App\Models\Lacturer;
class LacturerController extends Controller
{
    //
    public function login(Request $request)
    {
        $email =  request('email');
        $pass = request('password');
        $identity = Lacturer::where('Email',$email)->get();
        foreach($identity as $iden)
        {
            if(\Hash::check($pass,$iden->password))
                return redirect('/lacturer/showLactures/'.$email);
        }      
        return \Redirect::back()->withErrors('Credentials Mismatch');
    }

    public function showLacture($email)
    {
        $lacture =  Lacture::select('coursename','lacturedate','coursebatch')->where('lacturer',$email)->get();
        $lctname = [];
        $lctdate = [];
        $lctbatch = [];
        $i=0;
        foreach($lacture as $lac)
        {
            $lctname[$i] = $lac->coursename;
            $lctdate[$i] = $lac->lacturedate;
            $lctbatch[$i] = $lac->coursebatch;
            $i++;
        }
        return view('lacturer.showLactures')->with('lct',array($lctname,$lctbatch,$lctdate));
    }
}
