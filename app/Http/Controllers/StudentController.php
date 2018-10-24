<?php

namespace App\Http\Controllers;
 use App\Http\Controllers\Identity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();

class StudentController extends Controller
{
    // student login deshboard here...
    public function student_login_dashboard(Request $request){
        $email    = $request->student_email;
        $password =md5($request->student_password);
        $result   = DB::table('student_tbl')
        ->where('student_email',$email)
        ->where('student_password',$password)
        ->first();
 
       /* echo "</pre>";
        var_dump($result);
        */
       if($result){
           Session::put('student_email',$request->student_email);
           Session::put('student_id',$request->student_id);
           return Redirect::to('/student_dashboard');
         
       }
       else{
         Session::put('exception','Email or Password Invalid');  
         return Redirect::to('/');
      }
     }
    
     // student dashboard here...
     public function student_dashboard(){
        $data['data'] = DB::table('student_tbl')
                     
                      ->get();
        //  echo "</pre>";
        //      var_dump($data);
        // echo "</pre>";
           

                if(count($data) > 0){
                    return view('student.dashboard',$data);
                }  
                else{
                    return view('student.dashboard');
                }  
     }

     // student profile here...
    public function studentprofile(){
        // $student_id = Session::get('student_id');
        //  $student_profile = DB::table('student_tbl')
                       
        //                 ->select('*')
        //               ->first();
        // // echo "</pre>";
        // // print_r($student_profile);
        // // echo "</pre>";
               
            
        //       $student_description_manage = view('student.student_pro')
        //                 ->with('student_description_view',$student_profile);
        //     return view('student.student_layout')
        //         ->with('student_pro', $student_description_manage); 
             
        $data['data'] = DB::table('student_tbl')
                     
        ->get();
//  echo "</pre>";
//      var_dump($data);
// echo "</pre>";


  if(count($data) > 0){
      return view('student.student_pro',$data);
  }  
  else{
      return view('student.student_pro');
  }  

       
     }
     // logout here...
     public function studentlogout(){
        Session::put('student_name',null);
        Session::put('student_id',null);
        return Redirect::to('/');
    }

    // student setting part here...
    public function studentsetting(){
        // // $student_id = Session::get('student_id');
        // // $student_description_setting = DB::table('student_tbl')
        // //                  ->select('*')
        // //                  ->where('student_id',$student_id)
        // //                  ->first();
        // //     /*echo "</pre>";
        // //     print_r( $student_description_edit);
        // //     echo "</pre>";
        // //     */
           
        // //   $student_description_manage = view('student.student_setting')
        // //             ->with('student_description_edit',$student_description_setting);
        // //   return view('student.student_layout')
        // //        ->with('student_setting', $student_description_manage);
        // return view('student.student_setting');
        // $student_id = Session::get('student_id');
        $data['data'] = DB::table('student_tbl')
                     
                      ->get();
        //  echo "</pre>";
        //      var_dump($data);
        // echo "</pre>";
           

                if(count($data) > 0){
                    return view('student.student_setting',$data);
                }  
                else{
                    return view('student.student_setting');
                }  

               

    }
    // update student here...
    public function updatestudent(Request $request, $student_id){
        $data = array();
        $data['student_phone'] = $request->student_phone;
        $data['student_adress'] = $request->student_adress;
        $data['student_password'] = $request->student_password;
      
        echo "</pre>";
        print_r($data);
        echo "</pre>";
        
        DB::table('student_tbl')
              ->where('student_id',$student_id)
              ->update($data);
        Session::put('message','Student Update Successfully!!');
        return Redirect::to('/student_setting');    
         
        // // $data['data'] = DB::table('student_tbl')
        // //               ->get();
        

//         $data['data'] = DB::table('student_tbl')
                     
//                     ->get()
//                     ->update();
// //  echo "</pre>";
// //      var_dump($data);
// // echo "</pre>";


  
     }  
    
    
}
