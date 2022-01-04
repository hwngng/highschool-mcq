@extends('layouts.app')

@section('title', 'Test ready')

@push('header')
@endpush

@section('content')
<div class="container">
    <div class="align-content-center">
        <div class="h3">{{ $test->name }}</div>
        <div class="test-desc">
            <p>
                <table class="table-borderless">
                    <tbody>
                        <tr>
                            <td>Numer of questions: </td>
                            <td>{{ $test->no_of_questions }}</td>
                        </tr>
                        <tr>
                            <td>Created at: </td>
                            <td>{{ $test->created_at->format("F j, Y, g:i a") }}</td>
                        </tr>
                        <tr>
                            <td>Duration: </td>
                            <td>{{ $test->duration }} minutes</td>
                        </tr>
                        <tr>
                            <td>Type: </td>
                            <td>{{ $test->testType ? $test->testType->name : "N/A" }}</td>
                        </tr>
                    </tbody>
                </table>
            </p>
            <a class="btn btn-primary" href=" {{ route('student.test.start', $test->id) }}">Start</a>
        </div>
    </div>
</div>
@endsection
