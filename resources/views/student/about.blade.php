@extends('layouts.app')

@section('title', 'Học Sinh')

@section('dropdown-student')

@endsection

@push('header')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/studentabout.css') }}">
<link href='https://fonts.googleapis.com/css?family=Finger Paint' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
<style>
    main {
      font-size: 1.4rem;
    }
    .input-group-text {
      height: 100%;
    }
</style>
@endpush

@section('content')
<div class="container d-flex">
  <div id="form" class="container">
    <div class="row form-group">
      <div style="font-family: 'Finger Paint'">
        HappyStudy <span style="font-family: 'Mulish';
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 30px;
        
        color: #6246EA;">Student</span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4">
        <div class="avatar-wrapper">
            <img class="profile-pic" src="{{ asset('images/user.svg') }}" />
            <input class="file-upload" type="file" accept="image/*"/>
        </div>
    </div>
      <form class="needs-validation row" novalidate action="{{ route('student.user.update')}}" id="newUserForm" method="POST" onsubmit="setTimeout(function(){window.location.reload();},10);">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id"
                      value="{{ $user->id }}">
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="firstName" class="col-md-4 col-form-label text-md-right">First name</label>
              <input type="text" class="col-md-6 form-control" id="firstName" name="first_name"
                  value="{{ $user->first_name }}">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="lastName" class="col-md-4 col-form-label text-md-right">Last name</label>
              <input type="text" class="form-control" id="lastName" name="last_name"
                  value="{{ $user->last_name }}">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-right">
                  Email
              </label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  </div>
                  <input type="email" class="col-md-6 form-control" name="email" id="email"
                      placeholder="you@example.com" value="{{ $user->email }}">
                  <div class="invalid-feedback">Please enter a valid email address.
                  </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="address" class="col-md-4 col-form-label text-md-right">
                  Address
              </label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  </div>
                  <input type="text" class="form-control" id="address" name="address"
                      value="{{ $user->address }}">
                  <div class="invalid-feedback">Please enter your address.
                  </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
              <div class=" input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" ><i class="fa fa-school"></i></span>
    
                  </div>
                  <select id="school_id" name="school_id" class=" form-control">
                      @foreach ($schools as $school)
                      @if ($school->id == $user->school_id)
                      <option data-schoolid="{{ $school->id }}" value="{{ $school->id }}" selected>{!! $school->name !!}</option>
                      @else
                      <option data-schoolid="{{ $school->id }}" value="{{ $school->id }}">{!! $school->name !!}</option>
                      @endif
                      @endforeach
                  </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="grade" class="col-md-4 col-form-label text-md-right">Grade</label>
              <div class=" input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-snowflake" aria-hidden="true"></i></span>
    
                  </div>
                  <input class=" form-control" id="grade_id" name="grade_id" required type=" text" list="grades"
                      value="{{ $user->grade_id }}" autocomplete="off" />
                  <datalist id="grades">
                      @foreach ($grades as $grade)
                      <option>{{ $grade->id }}</option>
                      @endforeach
                  </datalist>
                  </select>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-3">
              <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
              <div class=" input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
    
                  </div>
                  <input type="text" class="form-control" id="telephone" name="telephone"
                      value="{{ $user->telephone }}">
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6">
              <label for="birthdate" class="col-md-4 col-form-label text-md-right">
                  Birthdate
                  <span class="text-muted">(mm-dd-yy)</span>
              </label>
              <input type="date" class=" form-control" id="birthdate" name="birthdate"
                  value="{{ $user->birthdate }}">
              <div class="invalid-feedback">birthdate required.
              </div>
            </div>
          <div class="row form-group">
            <div class="col-md-6 center-block d-flex justify-content-center" style="align: center">
              <button class="save-button fw-bold" type="submit"
                          name="submit-btn" style="background: #6246EA; border-radius: 6px; padding:10px; width: 120px; margin: 10px auto; color: white">Save</button>
            </div>
          </div>
        </form>
    </div>
    </div>
  </div>
  
  <div id="img">
    <img class = "main-image" src="{{ asset('images/sample.png') }}" />
  </div>
</div>
@endsection
