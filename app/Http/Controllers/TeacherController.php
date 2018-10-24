<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class TeacherController extends Controller
{
    // all teacher here...
    public function allteacher(){
        $allteacher = DB::table('teacher_tbl')
                    ->get();
        $manage_teacher = view('admin.allteacher')
                    ->with('all_teacher_info',$allteacher);
        return view('layout')
            ->with('allteacher', $manage_teacher); 
    }
    // add teacher here...
    public function addteacher(){
        return view('admin.addteacher');
    }
     // teacher insert here...
    public function save_teacher(Request $request){
        $data = array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_phone'] = $request->teacher_phone;
        $data['teacher_address'] = $request->teacher_address;
        $data['teacher_department'] = $request->teacher_department;
        $image = $request->file('teacher_image');

        if($image){
            $image_name = str_random(20);
            $ext        = strtolower($image->getClientOriginalExtension());
            $image_full_name =  $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url   = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if($success){
                $data['teacher_image'] = $image_url;
                    DB::table('teacher_tbl')->insert($data);
                    Session::put('message','Teacher Added Succesfully!!');
                    return Redirect::to('/addteacher');
            }
        }

        $data['image'] = $image_url;
            DB::table('teacher_tbl')->insert($data);
            Session::put('message','Teacher Added Succesfully!!');
            return Redirect::to('/addteacher');

            DB::table('teacher_tbl')->insert($data);
            Session::put('message','Teacher Added Succesfully!!');
            return Redirect::to('/addteacher');
    
    }
     // teacher delete here...
     public function teacher_delete($teacher_id){
        DB::table('teacher_tbl')
              ->where('teacher_id',$teacher_id)
              ->delete();
        Session::put('message','Teacher Delete Succesfully!!');      
        return Redirect::to('/allteacher');  
    }

}
