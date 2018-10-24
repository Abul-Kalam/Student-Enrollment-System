
 @foreach( $data as $value)

@endforeach
@extends('student.student_layout')
@section('content')

               <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                      
                          <h2 class="card-title">Update Your Profile</h2>
                          <p class="alert-success" style="font-size:20px; color:white background:#149278">
                             <?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                             ?>
                          </p>
                          <form class="forms-sample" method="post" action="{{ URL::to('/student_update_own/'.$value->student_id) }}">
                            {{ csrf_field() }}
                           
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Phone</label>
                                  <input type="text" class="form-control p-input" name="student_phone" value="{{ $value->student_phone }}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Student Adress</label>
                                  <input type="text" class="form-control p-input" name="student_adress"  value="{{ $value->student_adress }}">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Passwords</label>
                                  <input type="password" class="form-control p-input" name="student_password"  value="{{ $value->student_password }}">
                              </div>     
                              <button type="submit" class="btn btn-success btn-block">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
@endsection