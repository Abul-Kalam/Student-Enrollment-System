<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MBAController extends Controller
{
    public function mba(){
        $mbastudent = DB::table('student_tbl')
                    ->where(['student_department'=>5])
                    ->get();
        $manage_student = view('admin.mba')
                    ->with('mba_student_info',$mbastudent);
        return view('layout')
            ->with('mba', $manage_student);
        //return view('admin.mba');
    }
}
