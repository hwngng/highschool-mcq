@extends('layouts.app')

@section('title', '- Đăng nhập')

@push('header')
<link rel="stylesheet" href="{{ asset('css/pages/login.css') }}">
<link href='https://fonts.googleapis.com/css?family=Finger Paint' rel='stylesheet'>
@endpush

@section('content')
<div class="container">
        <div class="main-image">
            <img src="{{ asset('images/sample.png') }}" />
        </div>
        
        <div class="col-md-8">
            <div class="login-frame medi p-5">
                <div class="col-md-5"><div class = "happystudy" style="font-family: 'Finger Paint'">HappyStudy</div></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password <span style="color: red;">*</span></label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <a class="textarea" href="javascript:void(0)">Forgot Password?</a>
                    {{-- @if (Route::has('registerExpert')) --}}
                    <div class="form-group row">
                        <div class = "sentence-register" style="
                        position: relative;
                        height: 23px;
                        left: 6.25%;
                        right: 18.54%;
                        top: calc(55% - 23px/2 + 100px);
                        font-style: normal;
                        font-weight: bold;
                        font-size: 18px;
                        line-height: 23px;
                        ">Don't have any account yet?<a class="textarea register" href="{{ route('register') }}">Register now!</a></div>
                    </div>
                    {{-- @endif --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Log in
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
