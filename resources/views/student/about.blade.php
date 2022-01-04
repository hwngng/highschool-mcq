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
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <img class = "main-image" src="{{ asset('images/sample.png') }}" />
    </div>
    <div class="row">
        <div class = "happystudy" style="font-family: 'Finger Paint'">
            HappyStudy <span style="font-family: 'Mulish';
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 30px;
            
            color: #6246EA;">Student</span>
        </div>
    </div>
    {{-- <div class="container-fluid"> --}}
        <form class="needs-validation row" novalidate action="{{route('admin.user.update') }}" id="newUserForm"
            method="POST">
            @csrf
            {{-- <div class="row"> --}}
                
                {{-- Main info field --}}
                <div class="info">
                    {{-- AVATAR field --}}
                <div class="form-group row">
                    
                    <div class="avatar col-md-4 order-md-2 mb-4" style="position: relative">
                        
                        <h4 class="d-flex justify-content-center align-items-center mb-3">
                            <span class="badge badge-secondary badge-pill"> Avatar</span>
                        </h4>
                        <div class="avatar-wrapper">
                            <img class="profile-pic" src="{{ asset('images/user.svg') }}" />
                            <input class="file-upload" type="file" accept="image/*"/>
                        </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">First name</label>
                            <input type="text" class="col-md-6 form-control" id="firstName" name="first_name"
                                value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"
                                value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                Email
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="you@example.com" value="{{ $user->email }}">
                                <div class="invalid-feedback">Please enter a valid email address.
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-right">
                            Address
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                            </div>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $user->address }}">
                            <div class="invalid-feedback">Please enter your address.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                            <div class=" input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-school"></i></span>

                                </div>
                                <input class=" form-control" id="school" name="school" required type=" text"
                                    list="schools" @foreach ($schools as $school) @if ($school->id ==
                                $user->school_id)
                                value="{{ $school->name }}"
                                @endif
                                @endforeach

                                />
                                <datalist id="schools">
                                    @foreach ($schools as $school)
                                    <option data-schoolid="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </datalist>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="grade" class="col-md-4 col-form-label text-md-right">Grade</label>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-snowflake" aria-hidden="true"></i></span>

                            </div>
                            <input class=" form-control" id="grade" name="school" required type=" text" list="grades"
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
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>

                            </div>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                value="{{ $user->telephone }}">
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-right">
                            Birthdate
                            <span class="text-muted">(mm-dd-yy)</span>
                        </label>
                        <input type="date" class=" form-control" id="birthdate" name="birthdate"
                            value="{{ $user->birthdate }}">
                        <div class="invalid-feedback">birthdate required.
                        </div>
                    </div>

                </div>

                <hr class="mb-4">


                <button class="btn btn-primary btn-lg btn-block save-button" type="submit"
                    name="submit-btn">Save</button>
        </form>
    {{-- </div> --}}


</div>
@endsection




{{-- @push('end')
<script src="{{ asset('js/avatar-upload.js') }}"></script>

<script>
    $(".info").click(function() {

    let input = $(`<input type="text"
                    class="form-control"
                    id="telephone"
                    name="telephone">`,
                    {
                    val: $(this).text(),
                    }
                );
    $(this).replaceWith(input);
    input.select();
});


</script>
@endpush --}}
