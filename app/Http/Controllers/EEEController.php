<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EEEController extends Controller
{
    public function eee(){
        $eeestudent = DB::table('student_tbl')
        ->where(['student_department'=>2])
        ->get();
        $manage_student = view('admin.eee')
                ->with('eee_student_info',$eeestudent);
        return view('layout')
        ->with('eee', $manage_student);
        //return view('admin.eee');
    }
}
