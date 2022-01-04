<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trắc Nghiệm Toán @yield('title')</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    @stack('header')
</head>

<body class="pt-5 mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="alert alert-success fade text-center fixed-top" role="alert" id="message">
        </div>
        <div class="container ">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('favicon.ico') }}" width="50px" height="50px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent" style="flex-grow: 0">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item ">
                            <a class="btn secondary-button" href="{{ route('register') }}">Sign up</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item" style="padding-left: 10px;">
                                <a class="btn primary-button" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    @else
                        @can('be-admin')
                            <li class="nav-item dropdown mx-3">
                                <button class="btn secondary-button dropdown-toggle" type="button" id="menu-admin"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="menu-admin">
                                    @yield('dropdown-admin')
                                </ul>
                            </li>
                            @yield('dropdown-admin')
                        @endcan
                        @can('be-teacher')
                            <li class="nav-item dropdown mx-3">
                                <button class="btn secondary-button dropdown-toggle" type="button" id="menu-giaovien"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Teacher
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="menu-giaovien">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teacher.class.list') }}">Classes
                                            management</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teacher.test.list') }}">Tests
                                            management</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teacher.question.list') }}">Questions
                                            management</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teacher.result.list') }}">Results</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('teacher.about', Auth::user()->id) }}">Teacher profile</a>
                                    </li>
                                    @yield('dropdown-teacher')
                                </ul>
                            </li>
                        @endcan

                        @can('be-student')
                            <li class="nav-item dropdown mx-3">
                                <button class="btn secondary-button dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Student
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('student.index') }}">Test list</a>

                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('student.result.list', Auth::user()->id) }}">Scores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('student.about', Auth::user()->id) }}">Student profile</a>
                                    </li>
                                    @yield('dropdown-student')
                                </ul>
                            </li>
                        @endcan

                        <li class="nav-item dropdown mx-3" style="padding-left: 10px">
                            <button class="btn primary-button dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <<<<<<< HEAD=======>>>>>>> efccbfe5f3b6d5cb281ac8fc47180cc9ef037f65
        <nav class="navbar navbar-expand-lg sub-nav d-none d-lg-block" style="line-height: calc(50px - 1rem);">
            <div class="container">

                <ul class="navbar-nav w-100" style="justify-content: space-between">
                    <li class="nav-item sub-nav-item">
                        <a class=" active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class=" " aria-current="page" href="{{ url('/') }}">Exams</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class="" aria-current="page" href="{{ url('/') }}">Grades</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class="" aria-current="page" href="{{ url('/') }}">Subjects</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class="" aria-current="page" href="{{ url('/') }}">Classes</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class="" aria-current="page" href="{{ url('/') }}">Experts</a>
                    </li>
                    <li class="nav-item sub-nav-item">
                        <a class="" aria-current="page" href="{{ url('/') }}">About us</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
        </main>
        <footer>
            <div class="container d-flex">
                <p class="flex-grow-1">
                    Copyright © 2021 HappyStudy
                </p>
                <a class="px-2" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="px-2" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="px-2" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </footer>
</body>
@stack('end')

</html>
