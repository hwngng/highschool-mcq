@extends('layouts.app')
@section('title', '- Danh sách lớp')
@push('header')
<link href="{{ asset('css/pages/class.index.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/class.detail.css') }}" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
@can('be-student')
<div id="overlay" class="text-center modal-dialog-centered" style="display: none">
    <form action="" method="post" id="join-class-form" class="form text-center"
        style="font-weight: bold; background-color: white">
        <div class="d-flex p-3" style="align-items: baseline;">
            <h3 class="category-header pb-4">Fill the form to join to a class</h3>
            <button type="button" class="ms-auto btn" class="px-2" id="cancel-assign"
                style="color: #DD3444;font-size: 18px">
                <i class="far fa-times-circle"></i>
            </button>
        </div>
        <input type="text" name="id" aria-label="" class="form-control mb-3" placeholder="your class id here" required
            style="width: 50%;display: inline-block;">
        <input type="text" name="code" aria-label="" class="form-control mb-3" placeholder="your class code here" required
            style="width: 50%;display: inline-block;">
        <div class="text-center mb-3 pb-3">
            <button type="submit" class="btn btn-primary" style="display: inline-block">Join</button>
        </div>
    </form>
</div>
@endcan
<div class="container">
    <div class="row-1">
        <h2 class="content-name">My Classes</h2>
        @can('be-teacher')
        <a href="{{ route('teacher.class.create') }}" class="create-class-btn">
            Create new class
        </a>
        @endcan
        @can('be-student')
        <button class="create-class-btn btn " id="join-popup">
            Join a class
        </button>
        @endcan
    </div>
    <div class="user-section">
        <div class="user-icon" alt="user-icon"></div>
        <div class="user-name"></div>
    </div>
    <div class="row">
        @foreach ($classes as $class)
        <div class="column">
        @can('be-teacher')
        <a href="{{ route('teacher.class.detail', $class->id) }}">

        @endcan
        @can('be-student')
        <a href="{{ route('student.class.detail', $class->id) }}">
        @endcan
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#join-popup').click(function(e) {
            e.preventDefault();
            $("#overlay").fadeIn();
        })
        $('#cancel-assign').click(function(e) {
            e.preventDefault();
            $("#overlay").fadeOut();
        })
        $("#join-class-form").submit(function(e) {
            e.preventDefault();
            let data = $("#join-class-form").serializeArray();
            data.push({
                name: "memberId",
                value: '{{Auth::id()}}'
            })
            $.ajax({
                type: "post",
                url: "{{ route('student.class.join') }}",
                data: $.param(data),
                success: function(response) {
                    console.log(response);
                    if (response.return_code == 1 ||response.return_code == 2) {
                        alert(response.return_msg);
                    } else {
                        window.location.href = response;
                    }
                }
            });
        });
    })

</script>
@endpush
