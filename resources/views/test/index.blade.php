@extends('layouts.app')

@section('title', '- Đề thi')

@push('header')
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
		.order-header {
			width: 3%
		}
		.title-header {
			width: 15%;
		}
		.grade-header {
			width: 5%;
		}
		.no-question-header {
			width: 10%
		}
		.duration-header {
			width: 18%
		}
		.created-by-header {
			width: 12%
		}
		.created-at-header {
			width: 10%
		}
		.description-header {
			width: 17%
		}
		.action-header {
			width: 10%;
		}
	</style>
@endpush

@section('content')
	<div class="container">
		<div class="mt-4 mb-3 row">
			<div class="col">
				<a class="float-end" style="background-color: #2FD43F; border-radius: 6px; color: #2B2C34; font-weight: bold; padding: 18px 30px;" href="{{  route('teacher.test.create') }}" target="_blank">
					Add new test <i class="fas fa-plus"></i>
				</a>
			</div>
		</div>
		<div class="align-content-center">
			
			<div class="">
				<table class="table table-bordered w-auto" style="font-size: 15px;">
					
				    <thead style="background: #D1D1E9;">
				        <tr class="">
				            <th class="order-header">No</th>
				            <th class="title-header">Title</th>
							<th class="title-header" style="width: 15px;">Subject</th>
				            <th class="grade-header">Grade</th>
				            <th class="no-question-header"># questions</th>
				            <th class="duration-header" style="width: 10px;">Duration</th>
				            <th class="created-by-header">Author</th>
				            <th class="created-at-header">Created at</th>
				            <th class="description-header">Description</th>
				            <th class="action-header" style="width: 15px;">Operation</th>
				        </tr>
				    </thead>
				    <tbody>
				        @php
				        $i = 1
				        @endphp
				        @isset($tests)
				        @foreach ($tests as $test)
						

				        <tr id="{{ $test->id }}" class="">
				            <td class="order">{{ $i++ }}</td>
				            <td>{{ $test->name }}</td>
							<td>
								@if($test->subject_id == 1)
									{{ 'Math' }}
								@elseif($test->subject_id == 2)
									
									{{ 'Physics' }}

								@elseif($test->subject_id == 3)
									{{ 'Chemistry' }}
								@elseif($test->subject_id == 4)		
									{{ 'Biology' }}
								@else 
									{{ 'English' }}
								@endif
							</td>
				            <td>{{ $test->grade_id }}</td>
				            <td>{{ $test->no_of_questions }}</td>
				            <td>{{ $test->duration }}</td>
				            <td>{{ $test->createdBy->username }}</td>
				            <td>{{ $test->created_at }}</td>
				            <td>{{ $test->description }}</td>
				            <td>
				                <a  href="{{ route('teacher.test.edit', $test->id) }}" target="_blank" style="margin-right: 10px;">
									<img src="{{ asset('images/edit.svg') }}" alt="edit">
								</a>
				                <a style="cursor: pointer;" onclick="deleteTest(event, {{ $test->id }})">
									<img src="{{ asset('images/cancel.svg') }}" alt="delete">
								</a>
				            </td>
				        </tr>
				        @endforeach
				        @endisset
				    </tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('end')
<script>
        function deleteTest (e, testId) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ route('teacher.test.destroy', '') }}" + '/' + questionId,
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
@endsection