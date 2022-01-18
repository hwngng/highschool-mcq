@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="page-title text-center" style="color: white">You are not in this class</h3>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-8 offset-md-5">
                            <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
