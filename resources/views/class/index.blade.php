@extends('layouts.app')
@section('title', '- Danh sách lớp')
@push('header')
    <link href="{{ asset('css/pages/class.index.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row-1">
            <h2 class="content-name">My Classes</h2>
            @can('be-teacher')
                <a href="{{ route('teacher.class.create') }}" class="create-class-btn">
                    Create new class
                </a>
            @endcan
        </div>
        <div class="user-section">
            <div class="user-icon" alt="user-icon"></div>
            <div class="user-name"></div>
        </div>
        <div class="row">
            @foreach ($classes as $class)
                <div class="column">
                    <a href="{{ route('teacher.class.detail', $class->id) }}">
                        <div class="card">
                            <p class="content-text" id="shool-name">{{ $class->name }}</p>
                            <div class="quantity">
                                <p class="content-text" id="num-stud">students: {{ $class->numOfMembers }}</p><br />
                                <p class="content-text" id="num-exam">exams: {{ $class->numOfExams }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('end')
@endpush
