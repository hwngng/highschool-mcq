@extends('layouts.app')

@section('title', '-Lớp')

@push('header')

    <link href="{{ asset('css/pages/class.detail.css') }}" rel="stylesheet">

@endpush

@section('content')
    <div class="container my-2">
        <div class="d-flex" style="align-items: baseline;">
            <h3 class="category-header pb-4">{{ $apiResult->class->name }}</h3>

            @can('be-teacher')
                <div class="ms-auto dropdown ">
                    <button class="btn dropdown-toggle class_action-btn" type="button" id="menu-class-gv"
                        data-bs-toggle="dropdown" aria-expanded="false" style="padding: 10px;">
                        Class action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="menu-class-gv">
                        <li>
                            <a class="dropdown-item" href="{{ route('teacher.class.edit') }}">Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('teacher.test.create') }}" style="color: #2FD43F;">Assign
                                new
                                exam</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('teacher.class.create') }}" style="color: #DD3444;">Delete
                                class</a>
                        </li>
                        @yield('dropdown-teacher')
                    </ul>
                </div>
            @endcan
            @can('be-student')
                <a class="btn btn-danger ms-auto" href="{{ route('student.class.leave', $apiResult->class->id) }}">Leave
                    class</a>
            @endcan

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
                <table class="table table-hover table-responsive-md pt-2">
                    <thead class="thead-custom">
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
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($apiResult->members as $member)
                                @if (Gate::check('be-student') || $member->id != Auth::id())
                                    <tr id="m-{{ $member->id }}">
                                        <td scope="row">{{ $count++ }}</td>
                                        <td>{{ $member->username }}</td>
                                        <td>{{ $apiResult->class->grade_id }}</td>
                                        <td>{{ $member->last_name }} {{ $member->first_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->join_at }}</td>
                                        @can('be-teacher')
                                            <td scope="col">
                                                <a style="color: #DD3444;font-size: 18px"
                                                    onclick="kickMember(event,{{ $apiResult->class->id }},{{ $member->id }})">
                                                    <i class="far fa-times-circle"></i>
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="exam_list" role="tabpanel" aria-labelledby="exam_list-tab">
                <table class="table table-hover table-responsive-md pt-2">
                    <thead class="thead-custom">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Started at</th>
                            @can('be-student')
                                <th scope="col">Score</th>
                            @endcan
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($apiResult->tests))
                            @foreach ($apiResult->tests as $test)
                                <tr id="t-{{ $test->id }}">
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->p_created_by->last_name }} {{ $test->p_created_by->first_name }}
                                    </td>
                                    <td>{{ $test->p_start_at }}</td>
                                    @can('be-student')
                                        <td>{{ $test->score }}</td>
                                        <td scope="col" style="">
                                            <a d="" class="px-2"
                                                style="color:#2FD43F;font-size: 18px">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('be-teacher')
                                        <td scope="col" style="">
                                            <a href="" class="px-2" style="color: #DD3444;font-size: 18px">
                                                <i class="far fa-times-circle" onclick="deleteTest(event, {{ $test->id }})"></i>
                                            </a>
                                            <a href="{{ route('teacher.test.edit', $test->id) }}" class="px-2" style="color: 18px;font-size: 18px">
                                                <i class="fa fa-edit"></i>
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

@push('end')
    <script>
        let kickMember = function(event, id, memberId) {
            $.ajax({
                type: "get",
                url: "{{ route('teacher.class.kick', '') }}" + '/' + id + '/' + memberId,
                success: function(response) {
                    console.log('ok');
                    $('#m-' + memberId).remove();
                }
            });
        }

        function deleteTest (e, testId) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ route('teacher.test.destroy', '') }}" + '/' + testId,
                success: function (response) {
                    if (response['return_code'] == 0) {
                        $('#t-' + testId).animate("fast").animate({
                            opacity : "hide"
                        }, "slow", function () {
                            let nextRows = $(this).nextAll();
                            let order = parseInt($(this).children('td.order').text());
                            for (let i = 0; i < nextRows.length; ++i) {
                                $(nextRows[i]).children('td.order').text(order);
                                ++order;
                            }
                        });
                    } else {
                        alert("Something wrong, please press Ctrl + F5");
						console.log(response['return_code']);
                    }
                }
            });
        }
    </script>
@endpush
