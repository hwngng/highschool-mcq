@extends('layouts.app')

@section('title', '- Quản lý câu hỏi')

@section('header')
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
		extensions: ["tex2jax.js"],
		tex2jax: {inlineMath: [["$","$"], ["\\(","\\)"]]},
	});
</script>
<script type="text/javascript" src="{{ asset('js/mathjax/tex-chtml.js') }}"></script>
{{-- <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_CHTML"></script> --}}

<style>
    div.scrollable {
        max-height: 10em;
        margin: 0;
        padding: 0;
        overflow: auto;
	}
    .order-header {
        width: 3%;
    }
    .question-header {
        width: 82%;
    }
    .grade-header {
        width: 5%
    }
    .action-header {
        width: 10%;
    }
    strong {
        font-weight: normal;
    }
    

</style>
@endsection

@section('content')
<div class="container">
    <div class="mt-4 mb-3 row">
        <div class="col">
            <a class="float-end" style="background-color: #2FD43F; border-radius: 6px; color: #2B2C34; font-weight: bold; padding: 18px 30px;" href="{{  route('teacher.question.create') }}" target="_blank">
                <i class="fas fa-plus"></i> Add question 
            </a>
        </div>
    </div>
    <div class="align-content-center">
        

        <table class="table ">
            <thead style="background: #D1D1E9;">
                <tr>
                    <th class="order-header">No</th>
                    <th class="question-header">Question</th>
                    <th class="subject-header">Subject</th>
                    <th class="grade-header">Grade</th>
                    <th class="action-header">Operation</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @isset($questions)
                @foreach ($questions as $question)
                <tr id="q-{{ $question->id }}">
                    <td class="order" >{{ $i++ }}</td>

                    <td class="scrollable">
                        Q: {!! htmlspecialchars_decode($question->content) !!}
                        <ul>
                        @php
                            $noOfChoices = count($question->choices);
					    @endphp
                        @for ($i = 0; $i < $noOfChoices; $i++)
                            @php
                                $choice = $question->choices->find($i);
                            @endphp
                            <div style="display: flex;">
                                <p style="height: 100%; margin-bottom: 0px;">{{ chr(ord('A')+$i) . '.' }} {{ isset($choice) ? htmlspecialchars_decode($choice->content) : '' }}</p>

                            @if (isset($choice) && $choice->is_solution == 1)
                                <img src="{{ asset('images/check.svg') }}" style="margin-left: 10px;" alt="">
                            @endif
                            </div>
                        @endfor
                        </ul>
                    </td>
                    <td>
                        @if($question->subject_id == 1)
                            Math
                        @elseif($question->subject_id == 2)
                            Physics
                        @elseif($question->subject_id == 3)
                            Chemistry
                        @elseif($question->subject_id == 4)
                            Biology
                        @else
                            English
                        @endif
                    </td>
                    <td>{{ $question->grade_id }}</td>

                    <td>
                        <a class="" href="{{ route('teacher.question.edit', $question->id) }}" target="_blank" style="margin-right: 10px;">
                            <img src="{{ asset('images/edit.svg') }}" alt="">
                        </a>
                        <a class="" onclick="deleteQuestion(event, {{ $question->id }})" style="cursor: pointer;">
                            <img src="{{ asset('images/cancel.svg') }}" alt="">
                        </a>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('end')
    <script>
        function deleteQuestion (e, questionId) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ route('teacher.question.destroy', '') }}" + '/' + questionId,
                success: function (response) {
                    if (response['return_code'] == 0) {
                        $('#q-' + questionId).animate("fast").animate({
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
                    }
                }
            });
        }
    </script>
@endpush
