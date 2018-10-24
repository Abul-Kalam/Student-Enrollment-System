
@php
 function convert_department($value){
       $values =[
          1=>"CSE",
          2=>"EEE",
          3=>"ECE",
          4=>"BBA",
          5=>"MBA",
       ];

       return $values[$value];
 }
@endphp
@extends('layout')
@section('content')

@foreach($data as $value)
@endforeach

<div class="row user-profile">
            <div class="col-lg-12 side-left">
              <div class="card mb-4">
                <div class="card-body avatar">
                  <h2 class="card-title">Info</h2>
                  <img src="{{URL::to($value->student_image)}}" alt="">
                  <p class="name">{{strtoupper($value->student_name)}}</p>
                  <p class="designation">- {{$value->student_roll}}  -</p>
                  <a class="email" href="#">{{$value->student_email}}</a>
                  <a class="number" href="#">{{$value->student_phone}}</a>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body overview">
                  <ul class="achivements">
                    <h2 style="font-family:cursive; color:maroon; font_weight:bolder;">Northern University Bangladesh(NUB)</h2>
                  </ul>
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p>The total information of this student are given below.</p>
                  </div>
                  <div class="info-links">
                    <a class="website" >
                      <i class="icon-globe icon">Father Name:</i>
                      <span>{{$value->student_fathername}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Mother Name:</i>
                      <span>{{$value->student_mothername}}</span>
                    </a>
                    <a class="website">
                      <i class="icon-globe icon">Address:</i>
                      <span>{{$value->student_adress}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Department:</i>
                      <span>{{convert_department($value->student_department)}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Admission Year:</i>
                      <span>{{$value->student_admissionyear}}</span>
                    </a>
                  
                  </div>
                </div>
              </div>
            </div>
        </div>
            

@endsection