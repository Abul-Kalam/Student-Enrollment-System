
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

<div class="row user-profile">
            <div class="col-lg-12 side-left">
              <div class="card mb-4">
                <div class="card-body avatar">
                  <h2 class="card-title">Info</h2>
                  <img src="{{URL::to($student_description_profile->student_image)}}" alt="">
                  <p class="name">{{strtoupper($student_description_profile->student_name)}}</p>
                  <p class="designation">- {{$student_description_profile->student_roll}}  -</p>
                  <a class="email" href="#">{{$student_description_profile->student_email}}</a>
                  <a class="number" href="#">{{$student_description_profile->student_phone}}</a>
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
                      <span>{{$student_description_profile->student_fathername}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Mother Name:</i>
                      <span>{{$student_description_profile->student_mothername}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Address:</i>
                      <span>{{$student_description_profile->student_adress}}</span>
                    </a>
                    <a class="website">
                      <i class="icon-globe icon">Department:</i>
                      <span>{{convert_department($student_description_profile->student_department)}}</span>
                    </a>
                    <a class="website" >
                      <i class="icon-globe icon">Admission Year:</i>
                      <span>{{$student_description_profile->student_admissionyear}}</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
            

@endsection