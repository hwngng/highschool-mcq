@extends('layouts.app')

@section('title', '-Lớp')

@push('header')

    <link href="{{ asset('css/pages/class.detail.css') }}" rel="stylesheet">

@endpush

@section('content')
    <div class="container my-2">
        <div class="d-flex" style="justify-content: space-between;align-items: baseline;">
            <h3 class="category-header pb-4">{{$apiResult->class->name}}</h3>
            <a class="btn btn-danger" href="{{ route('login') }}">Leave class</a>
        </div>
        <ul class="nav nav-tabs" id="classTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active header_title-text" id="student_list-tab" data-bs-toggle="tab"
                    data-bs-target="#student_list" type="button" role="tab" aria-controls="student_list"
                    aria-selected="true">Student list</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link header_title-text" id="exam_list-tab" data-bs-toggle="tab"
                    data-bs-target="#exam_list" type="button" role="tab" aria-controls="exam_list"
                    aria-selected="false">Exam list</button>
            </li>
        </ul>
        <div class="tab-content" id="classTabContent">
            <div class="tab-pane fade show active" id="student_list" role="tabpanel" aria-labelledby="student_list-tab">
                <table class="table table-hover table-responsive-md mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Join at</th>
                            @can('be-teacher')
                                <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($apiResult->members))
                            @foreach ($apiResult->members as $member)

                                <tr>
                                    <th scope="row">{{ $loop->index +1}}</th>
                                    <td>{{$member->username}}</td>
                                    <td>{{$apiResult->class->grade_id}}</td>
                                    <td>{{$member->last_name}} {{$member->first_name}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->join_at}}</td>
                                    @can('be-teacher')
                                        <td scope="col">
                                            <a href="">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="cancel_24px">
                                                        <path id="icon/navigation/cancel_24px" fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M12 2C6.47 2 2 6.47 2 12C2 17.53 6.47 22 12 22C17.53 22 22 17.53 22 12C22 6.47 17.53 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12 10.59L15.59 7L17 8.41L13.41 12L17 15.59L15.59 17L12 13.41L8.41 17L7 15.59L10.59 12L7 8.41L8.41 7L12 10.59Z"
                                                            fill="#DD3444" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="exam_list" role="tabpanel" aria-labelledby="exam_list-tab">
                <table class="table table-hover table-responsive-md mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Started at</th>
                            @can('be-student')
                            <th scope="col">Score</th>
                            @endcan
                            @can('be-teacher')
                                <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($apiResult->tests))
                            @foreach ($apiResult->tests as $test)

                                <tr>
                                    <th scope="row">{{ $loop->index +1}}</th>
                                    <td>{{$test->name}}</td>
                                    <td>{{$test->p_created_by->last_name}} {{$test->p_created_by->first_name}}</td>
                                    <td>{{$test->p_start_at}}</td>
                                    <td>{{$test->score}}</td>
                                    @can('be-teacher')
                                        <td scope="col">
                                            <a href="">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="cancel_24px">
                                                        <path id="icon/navigation/cancel_24px" fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M12 2C6.47 2 2 6.47 2 12C2 17.53 6.47 22 12 22C17.53 22 22 17.53 22 12C22 6.47 17.53 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12 10.59L15.59 7L17 8.41L13.41 12L17 15.59L15.59 17L12 13.41L8.41 17L7 15.59L10.59 12L7 8.41L8.41 7L12 10.59Z"
                                                            fill="#DD3444" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('end')
    <script>
    </script>
@endsection
