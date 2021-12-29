@extends('layouts.app')

@section('title', '- Trang chủ')

@section('content')
    <div class="container mt-2">
        <div class="row ">
            <div class="col-lg-6">
                <h3 class="header-text pb-4">HappyStudy!</h3>
                <p class="pb-4" style="font-size:1.2em">Are you ready for your college entrance exam?<br> Test your
                    knowledge right now with many Multiple choice
                    questions from our experts and enroll into classes to get the latest and private exams </p>
                <span class="category-header">
                    Join with us!
                </span>
                <div class="mt-3">
                    <a class="btn primary-button" href="{{ route('login') }}">Get started</a>
                </div>
            </div>
            <div class="col-lg-6 ms-auto text-center">
                <img src="{{ asset('images/sample.png') }}" />
            </div>
        </div>
        <hr class="">
    </div>
    <div class="container mt-2">
        <div class="d-flex" style="justify-content: space-between;align-items: baseline;">
            <h3 class="category-header pb-4">Popular exams</h3>
            <a class="btn secondary-button" href="{{ route('login') }}">View all</a>
        </div>
        <div class="d-flex flex-wrap justify-content-xl-center">
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;">
                <div class="card-body">
                    <h5 class="card-title">Exam name</h5>
                    <p class="instruction-text pt-5">Grade: 12</p>
                </div>
            </div>
        </div>
        <hr class="">
    </div>
    <div class="container mt-2">
        <div class="d-flex" style="justify-content: space-between;align-items: baseline;">
            <h3 class="category-header pb-4">Subjects</h3>
            <a class="btn secondary-button" href="{{ route('login') }}">View all</a>
        </div>
        <div class="d-flex flex-wrap justify-content-xl-center">
            <div class="card" style="width:100px;height:150px;background-color: #E45858">
                <div class="card-body">
                    <h5 class="card-title">Math</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #D1E9DD">
                <div class="card-body">
                    <h5 class="card-title">Science</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #BCBCF1">
                <div class="card-body">
                    <h5 class="card-title">Physics</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: rgba(248, 236, 135, 0.53);">
                <div class="card-body">
                    <h5 class="card-title">Literature</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #D1D1E9">
                <div class="card-body">
                    <h5 class="card-title">Chemistry</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #EAC1E3">
                <div class="card-body">
                    <h5 class="card-title">History</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #7094F1">
                <div class="card-body">
                    <h5 class="card-title">English</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
            <div class="card" style="width:100px;height:150px;background-color: #DADADA">
                <div class="card-body">
                    <h5 class="card-title">IT</h5>
                    <p class="instruction-text pt-5">10 exams</p>
                </div>
            </div>
        </div>
        <hr class="">
    </div>
    <div class="container mt-2">
        <div class="d-flex" style="justify-content: space-between;align-items: baseline;">
            <h3 class="category-header pb-4">Experts</h3>
            <a class="btn secondary-button" href="{{ route('login') }}">View all</a>
        </div>
        <div class="d-flex flex-wrap justify-content-xl-center">
            <div class="card" style="width:200px;height:200px;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/sample_avatar.png') }}" width="90px" height="90px" />
                        <div class="text-center">
                            <h5 class="card-title ms-auto" style="font-size: 14px">Exam name</h5>
                            <p class="instruction-text pt-1">Grade: 12</p>
                        </div>
                    </div>
                    <ul class="pt-3">
                        <li class="instruction-text">
                            Graduated Oxford University
                        </li>
                        <li class="instruction-text">
                            Math, Science
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" style="width:200px;height:200px;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/sample_avatar.png') }}" width="90px" height="90px" />
                        <div class="text-center">
                            <h5 class="card-title ms-auto" style="font-size: 14px">Exam name</h5>
                            <p class="instruction-text pt-1">Grade: 12</p>
                        </div>
                    </div>
                    <ul class="pt-3">
                        <li class="instruction-text">
                            Graduated Oxford University
                        </li>
                        <li class="instruction-text">
                            Math, Science
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" style="width:200px;height:200px;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/sample_avatar.png') }}" width="90px" height="90px" />
                        <div class="text-center">
                            <h5 class="card-title ms-auto" style="font-size: 14px">Exam name</h5>
                            <p class="instruction-text pt-1">Grade: 12</p>
                        </div>
                    </div>
                    <ul class="pt-3">
                        <li class="instruction-text">
                            Graduated Oxford University
                        </li>
                        <li class="instruction-text">
                            Math, Science
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
