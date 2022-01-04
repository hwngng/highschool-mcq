@extends('layouts.app')

@section('title', '- Đăng ký')

@push('header')
<link rel="stylesheet" href="{{ asset('css/pages/register.css') }}">
<link href='https://fonts.googleapis.com/css?family=Finger Paint' rel='stylesheet'>
@endpush

@section('content')
<div class="container">
    <div class="col-md-8 ms-auto text-center">
        <img src="{{ asset('images/sample.png') }}" />
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Đăng ký') }}</div> --}}
                <div class="card-header">                    
                    <div class="col-md-5">
                        <div class = "happystudy" style="font-family: 'Finger Paint'">
                            HappyStudy <span style="font-family: 'Mulish';
                            font-style: normal;
                            font-weight: bold;
                            font-size: 24px;
                            line-height: 30px;
                            
                            color: #6246EA;">Student</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- username --}}
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="username" type="username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">Password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">Confirm Password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name"
                                class="col-md-4 col-form-label text-md-right">First name <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">Email <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade_id"
                                class="col-md-4 col-form-label text-md-right">Grade <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="grade_id" type="number" min="10" max="12" value="10"
                                    class="form-control @error('grade_id') is-invalid @enderror" name="grade_id"
                                    value="{{ old('grade_id') }}" required autocomplete="grade_id">

                                @error('grade_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
