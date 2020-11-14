<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Lacture;
use App\Models\Lacturer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
        // $admin = new Admin();
        // $admin->email = 'admin@gmail.com';
        // $admin->password = \Hash::make('admin');
        // $val =  $admin->save();
        $email = request('email');
        $pass = request('password');
        $admin =  Admin::all('email','password')->first();
        if($admin->email==$email && \Hash::check($pass,$admin->password))
            return redirect('admin/course');
        else
            return \Redirect::back()->withErrors('Credentials Mismatch');
    }

    public function addCourse(Request $request)
    {
        $course = new Course();
        $course->name =  $request->input('coursename');
        $course->courseLevel =  $request->input('courselevel');
        $course->courseDescription = $request->input('coursedescription');
        $course->courseImage = $request->input('courseimg');
        $course->save();
        return redirect()->back()->with('msg','Course Added successfully');
    }

    public function addLacture(Request $request)
    {
        $mail  =$request->input('lacturermail');
        $date = $request->input('lacturedate');
        $isAlreadyAlloted = Lacture::where([['lacturer',$mail],['lacturedate',$date]])->get();
        if(sizeOf($isAlreadyAlloted)!=0)
            return redirect()->back()->withErrors('Lacturer Already Alloted On same date');
        $lacture   = new Lacture();
        $lacture->coursename = $request->input('coursename');
        $lacture->coursebatch = $request->input('coursebatch');
        $lacture->lacturer =$request->input('lacturermail');
        $lacture->lacturedate = $request->input('lacturedate');
        $lacture->save();
        return redirect()->back()->with('msg','Lacture Added successfully');
    }

    public function addLacturer(Request $request)
    {
        $isAlreadyExists =  Lacturer::where('Email',$request->input('lacturermail'))->get();
        $em =  $request->input('lacturermail');
        foreach($isAlreadyExists as $already)
        {
            if($em == $already->Email)
            {
                return \Redirect::back()->withErrors('Lacturer Already Exists');
            }
        }
        $lacturer = new Lacturer();
        $lacturer->email = $request->input('lacturermail');
        $lacturer->password = \Hash::make($request->input('lacturerpass'));
        $lacturer->save();
        return redirect()->back()->with('msg','Lacturer Added successfully');
    }   

    public function lacture()
    {

        $lacturer =  Lacturer::select('email')->get();
        $course = Course::select('name')->get();
        $vLacturer = [];
        $vCourse = [];
        $i=0;
        foreach($lacturer as $val)
           {
                $vLacturer[$i] = $val->email;
                $i++;
           }
        $i=0;
        foreach($course as $val)
           {
                $vCourse[$i] = $val->name;
                $i++;
           } 
        
        return view('admin.addLacture')->with(['lacturer'=>$vLacturer,'courses'=>$vCourse]);
    }
}
