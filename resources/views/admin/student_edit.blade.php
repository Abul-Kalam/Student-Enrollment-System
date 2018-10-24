@extends('layout')
@section('content')

               <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                      
                          <h2 class="card-title">Add Student</h2>
                          <p class="alert-success" style="font-size:20px; color:white background:#149278">
                             <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                             ?>
                          </p>
                          <form class="forms-sample" method="post" action="{{URL::to('/update_student',$student_description_edit->student_id)}}">
                            {{ csrf_field() }}
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Student Name</label>
                                  <input type="text" class="form-control p-input" name="student_name" aria-describedby="emailHelp" value="{{($student_description_edit->student_name)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Roll</label>
                                  <input type="text" class="form-control p-input" name="student_roll" value="{{($student_description_edit->student_roll)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Father's Name</label>
                                  <input type="text" class="form-control p-input" name="student_fathername" value="{{($student_description_edit->student_fathername)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Mother's Name</label>
                                  <input type="text" class="form-control p-input" name="student_mothername" value="{{($student_description_edit->student_mothername)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Email</label>
                                  <input type="email" class="form-control p-input" name="student_email" value="{{($student_description_edit->student_email)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Phone</label>
                                  <input type="text" class="form-control p-input" name="student_phone" value="{{($student_description_edit->student_phone)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Adress</label>
                                  <input type="text" class="form-control p-input" name="student_adress" value="{{($student_description_edit->student_adress)}}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Passwords</label>
                                  <input type="password" class="form-control p-input" name="student_password" value="{{($student_description_edit->student_password)}}">
                              </div>     
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Admission Year</label>
                                  <input type="date" class="form-control p-input" name="student_admissionyear"value="{{($student_description_edit->student_admissionyear)}}">
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
@endsection