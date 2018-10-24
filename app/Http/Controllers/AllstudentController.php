<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();


class AllstudentController extends Controller
{
    public function allstudent(){
        //return view('admin.allstudent');
        $allstudent = DB::table('student_tbl')
                    ->get();
        $manage_student = view('admin.allstudent')
                    ->with('all_student_info',$allstudent);
        return view('layout')
            ->with('allstudent', $manage_student); 
    }
    // delete student
    public function studentdelete($student_id){
       DB::table('student_tbl')
              ->where('student_id',$student_id)
              ->delete();
        Session::put('message','Student Delete Succesfully!!');      
        return Redirect::to('/allstudent');      
    }
    // student profile view
     public function student_view($student_id){
        $student_description_view = DB::table('student_tbl')
                         ->select('*')
                         ->where('student_id',$student_id)
                         ->first();
           /* echo "</pre>";
            print_r( $student_description_view);
            echo "</pre>";
           */
          $student_description_manage = view('admin.view')
                    ->with('student_description_profile',$student_description_view);
        return view('layout')
            ->with('view', $student_description_manage); 
     }

     // student edit
     public function student_edit($student_id){
        $student_description_edit = DB::table('student_tbl')
                         ->select('*')
                         ->where('student_id',$student_id)
                         ->first();
            /*echo "</pre>";
            print_r( $student_description_edit);
            echo "</pre>";
            */
           
          $student_description_manage = view('admin.student_edit')
                    ->with('student_description_edit',$student_description_edit);
          return view('layout')
               ->with('student_edit', $student_description_manage);
         
     }
     
     // student update
     public function update_student(Request $request,$student_id){
        $data = array();
        $data['student_name'] = $request->student_name;
        $data['student_roll'] = $request->student_roll;
        $data['student_fathername'] = $request->student_fathername;
        $data['student_mothername'] = $request->student_mothername;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_adress'] = $request->student_adress;
        $data['student_password'] = $request->student_password;
        $data['student_admissionyear'] = $request->student_admissionyear;
        
       /* echo "</pre>";
        print_r($data);
        echo "</pre>";
        */
        DB::table('student_tbl')
              ->where('student_id',$student_id)
              ->update($data);
        Session::put('message','Student Update Successfully!!');
        return Redirect::to('/allstudent');      
         
        
     }  
    
}
 