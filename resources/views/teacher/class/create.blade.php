@extends('layouts.app')

@section('title', '- Tạo lớp học')
@push('header')

    <link href="{{ asset('css/pages/class.create.css') }}" rel="stylesheet">

@endpush
@section('content')

<div class="container">
    <div class="align-content-center">
        <div>
            <p class="row-1">Create new/Edit class</p>
            <form action="{{ route('teacher.class.store')}}" method="POST" class="form ">
                @csrf
                <label for="class-name ">Class name</label><input name="class-name" class="class-name" type="text "><br>
                <label for="password">Password</label><input class="Password "name="password" type="password "><br>
                <label for="class ">Class</label>
                <select name="class-grade">
                    <option value="10 " selected>10</option>
                    <option value="11 ">11</option>
                    <option value="12 ">12</option>
                </select><br>
                <label for="class-information ">Class description</label><input class="class-information"name="class-info" id="class-info" ype="text "><br>
                <div class="button-div">
                    <button class="cancel" type="cancel">Cancel</button>
                    <button class="create-new-class " type="submit ">Create new class</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
