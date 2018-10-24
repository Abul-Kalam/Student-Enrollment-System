<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// logout here...
Route::get('/logout','AdminController@logout');
Route::get('/student_logout','StudentController@studentlogout');

// student login here...
Route::get('/', function () {
    return view('student_login');

});
// admin login here..
Route::get('/backend', function () {
    return view('admin.admin_login');

});
// login here..
Route::post('/studentlogin','StudentController@student_login_dashboard');
Route::get('/student_dashboard','StudentController@student_dashboard');


Route::post('/adminlogin','AdminController@login_dashboard');
Route::get('/admin_dashboard','AdminController@admin_dashboard');


Route::get('/student_profile','StudentController@studentprofile');
Route::get('/viewprofile','AdminController@viewprofile');



Route::get('/setting','AdminController@setting');
Route::get('/student_setting','StudentController@studentsetting');

// student here...
Route::get('/addstudent','AddstudentController@addstudent');
Route::post('/save_student','AddstudentController@savestudent');
Route::get('/student_delete/{student_id}','AllstudentController@studentdelete');
Route::get('/student_view/{student_id}','AllstudentController@student_view');
Route::get('/student_edit/{student_id}','AllstudentController@student_edit');
Route::post('/update_student/{student_id}','AllstudentController@update_student');

Route::post('/student_update_own/{student_id}','StudentController@updatestudent');
// All page here....
Route::get('/allstudent','AllstudentController@allstudent');
Route::get('/tution','TutionController@tution');
Route::get('/cse','CSEController@cse');
Route::get('/eee','EEEController@eee');
Route::get('/ece','ECEController@ece');
Route::get('/bba','BBAController@bba');
Route::get('/mba','MBAController@mba');
// teacher page here...
Route::get('/addteacher','TeacherController@addteacher');
Route::post('/save_teacher','TeacherController@save_teacher');
Route::get('/allteacher','TeacherController@allteacher');
Route::get('/teacher_delete/{teacher_id}','TeacherController@teacher_delete');
