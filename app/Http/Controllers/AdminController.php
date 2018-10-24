<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();

class AdminController extends Controller
{   
    // logout here..
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/backend');
    }
     
   
    // admin dashboard here...
    public function admin_dashboard(){
        return view('admin.dashboard');
    }
    // view profile here..
    public function viewprofile(){
        return view('admin.view');
    }
    // setting here..
    public function setting(){
        return view('admin.setting');
    }
    //  adminlogin dashboard here...
    public function login_dashboard (Request  $request){
      // return view('/admin.dashboard');
       $email    = $request->admin_email;
       $password =md5($request->admin_password);
        $result   = DB::table('admin_tbl')
        ->where('admin_email',$email)
        ->where('admin_password',$password)
        ->first();

        // echo "</pre>";
        // print_r($result);
        // echo "</pre>";
       
      if($result){
          Session::put('admin_email',$request->admin_email);
          Session::put('admin_id',$request->admin_id);
           return Redirect::to('/admin_dashboard');
         
            }
            else{
            Session::put('exception','Email or Password Invalid');  
            return Redirect::to('/backend');
            }
    }
    /* student profile view here...
    public function studentprofile(){
        $student_id = Session::get('student_id');
        $student_profile = DB::table('student_tbl')
        ->select('*')
        ->where('student_id',$student_id)
        ->first();
        echo "</pre>";
        print_r($student_profile);
        echo "</pre>";
      
       $student_description_manage = view('student.student_view')
        ->with('student_description_profile',$student_profile);
        return view('layout')
        ->with('student_view', $student_description_manage); 
       // return view('student.student_profile');
       
    }*/
}
