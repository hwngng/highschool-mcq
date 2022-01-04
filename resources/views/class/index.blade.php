@extends('layouts.app') @section('title', '- Danh sách lớp') @push('header')
<link href="{{ asset('css/pages/class.index.css') }}" rel="stylesheet"> @endpush @section('content')
<div class="row-1">
    <h2 class="content-name">My Classes</h2>
    <button class="create-class-btn">
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
            <p class="content-text" id="shool-name">{{$class->school->name}}</p>
            <div class="quantity">
                <p class="content-text" id="num-stud">students: {{$class->numOfMembers}}</p><br />
                <p class="content-text" id="num-exam">exams: {{$class->numOfExams}}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endsection @section( 'end')
    <script>
    </script>
    @endsection