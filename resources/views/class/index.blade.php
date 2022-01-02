@extends('layouts.app')

@section('title', '- Danh sách lớp')

@push('header')
<link href="{{ asset('css/pages/class.index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <h2>My Classes</h2>
    </div>
    <div>
        <button class="">
            Create new class
        </button>
    </div>
    <div class="user-section">
        <div class="user-icon" alt="user-icon"></div>
        <div class="user-name"></div>
    </div>
    <div class="row">
        @foreach ($classes as $class)
        <div class="column">
            <div class="card">
                <p>{{$class->school->name}}</p>
                <p>{{$class->numOfMembers}}</p>
                <p>{{$class->numOfExams}}</p>
            </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection

@section('end')
    <script>
    </script>
@endsection
