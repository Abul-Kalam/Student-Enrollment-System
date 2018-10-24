@extends('layout')
@section('content')

<div class="card">
            <div class="card-body">
              <h2 class="card-title">Data table</h2>
              <p class="alert-success" style="font-size:20px; color:white background:#149278">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
              </p>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>T._Name</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Image</th>
                          <th>Department</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all_teacher_info as $v_teacher)
                      <tr>
                          <td>{{$v_teacher->teacher_name}}</td>
                          <td>{{$v_teacher->teacher_phone}}</td>
                          <td>{{$v_teacher->teacher_address}}</td>
                          <td><img src="{{URL::to($v_teacher->teacher_image)}}" height="50" width="60" style="border-radius: 50%";></td>
                          <td>
                              @if($v_teacher->teacher_department==1)
                                 <span class="label label-success">{{'CSE'}}</span>
                              @elseif($v_teacher->teacher_department==2) 
                              <span class="label label-success">{{'EEE'}}</span>
                              @elseif($v_teacher->teacher_department==3) 
                              <span class="label label-success">{{'ECE'}}</span>  
                              @elseif($v_teacher->teacher_department==4) 
                              <span class="label label-success">{{'BBA'}}</span>  
                              @elseif($v_teacher->teacher_department==5) 
                              <span class="label label-success">{{'MBA'}}</span>
                              @else
                              <span class="label label-success">{{'Undefined'}}</span>
                              @endif    
                          </td>
                          <td>
                            <a href="{{URL::to('/teacher_delete/'.$v_teacher->teacher_id)}}" id="delete"><button class="btn btn-outline-danger">
                            Delete</button></a>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

@endsection