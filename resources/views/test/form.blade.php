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
		div.scrollable {
			max-height: 10em;
			margin: 0;
			padding: 0;
			overflow: auto;
		}
		.order-header {
			width: 3%;
		}
		.action-header {
			width: 10%;
		}
		.content-header {
			width: 82%
		}
		.grade-header {
			width: 5%;
		}
		.select-header-modal {
			width: 14%;
		}
		.question-header-modal {
			width: 81%;
		}
		.grade-header-modal {
			width: 5%
		}
		.modal-dialog{
			overflow-y: initial !important
		}
		.modal-body{
			height: 80vh;
			overflow-y: auto;
		}
		strong {
			font-weight: normal;
		}
		select {
			border: 1px solid #D1D1E9;
			border-radius: 8px;
			padding: 10px;
			outline: none;
			background-color: white;
		}
		
	</style>
@endpush

<h4 class="fw-bold my-5">
	@if ($action == 'create')
		Create test
	@else
		Edit test
	@endif
</h4>

<form method="post" action="{{ $action == 'create' ? route('teacher.test.store', [], false) : route('teacher.test.update', [], false) }}" id="test">
	@csrf
	<div class="form-group my-4">
	  <h5 class="fw-bold">Title</h5>
	  <input type="text" name="name" id="name" class="form-control" placeholder="Đề thi THPT Quốc gia..." value="{{ isset($test) ? $test->name : '' }}">
	</div>
	<div class="form-group my-4">
	  <h5 class="fw-bold">Test code</h5>
	  <input type="text" name="test_code" id="test_code" class="form-control" placeholder="Mã đề thi" value="{{ isset($test) ? $test->name : '' }}">
	</div>
	<div class="form-group my-4">
	  <h5 class="fw-bold">Description</h5>
	  <textarea name="description" id="description" class="form-control" placeholder="Đề thi thử THPT Quốc gia cho khối 12 trường THPT Chu Văn An...">{{ isset($test) ? $test->description : '' }}</textarea>
	</div>
	<div class="d-flex justify-content-between my-4">
		<div class="form-group">
			<label for="grade_id" class="fw-bold pe-3">Grade</label>
			<select name="grade_id" id="grade">
				@foreach ($grades as $grade)
					<option value="{{ $grade->id }}" {{ isset($test) && $test->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->id }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="grade_id" class="fw-bold pe-3">Duration</label>
			<select name="duration" id="duration">
				@foreach ($durations as $duration)
					<option value="{{ $duration }}" {{ isset($test) && $test->duration == $duration ? 'selected' : '' }}>{{ $duration }}</option>
				@endforeach
			</select>
			<label for="duration" class="font-weight-bold"> minutes</label>
		</div>
		<div class="form-group">
			
			<label for="no_of_questions" class="fw-bold pe-3"># question</label>
			<select name="no_of_questions" id="quantity">
				@foreach ($quantity as $amount)
					<option value="{{ $amount }}" {{ isset($test) && $test->no_of_questions == $amount ? 'selected' : '' }}>{{ $amount }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			
			<label for="subject" class="fw-bold pe-3">Subject</label>
			<select name="subject_id" id="subject">
				<option value="1">Math</option>
				<option value="2">Physics</option>
				<option value="3">Chemistry</option>
				<option value="4">Biology</option>
				<option value="5">English</option>
			</select>
		</div>
	</div>

	<div class="form-group my-4">
		<h5 class="fw-bold">Questions list</h5>
		<table class="table table-hover" id="questions">
			<thead>
				<tr>
					<th class="order-header">No</th>
					<th class="action-header">Operation</th>
					<th class="content-header">Content</th>
					<th class="grade-header">Grade</th>
				</tr>
			</thead>
			<tbody>
				@if ($action == 'edit')
					@php
						$i = 0;
					@endphp
					@foreach ($test->questions as $question)
					<tr>
						<td class="order">{{ $i+1 }}</td>
						<td>
							<a class="picker text-success" href="javascript:void(0)" data-toggle="tooltip" title="Choose question"><i class="fas fa-crosshairs"></i></a>
							<a class="clear text-danger" href="javascript:void(0)" data-toggle="tooltip" title="Remove question"><i class="fas fa-times-circle ml-1"></i></a>
						</td>
						<td>
							<input type="hidden" name="question_ids[${i}]" class="question-id" value="{{ $question->id }}">
							<div class="content scrollable">
								{!! htmlspecialchars_decode($question->content) !!}
							</div>
						</td>
						<td class="grade">
							{{ $question->grade_id }}
						</td>
					</tr>
					@php
						++$i;
					@endphp
					@endforeach	
				@endif
			</tbody>
		</table>
	</div>

	<div class="form-group my-3 d-flex justify-content-around">

		<a style="background-color: #D1D1E9; border-radius: 6px; border: none; color: #2B2C34; padding: 18px 50px; font-weight: bold;" href="{{ route('teacher.test.list') }}">Cancel</a>
		<button type="submit" class="" style="background-color: #6246EA; border-radius: 6px; border: none; color: white; padding: 15px 50px; font-weight: bold;">
			@if ($action == 'create')
				Create test
			@else
				Edit test
			@endif
		</button>
	</div>
</form>

<!-- <div class="modal fade" id="question-detail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Question detail</h5>
            </div>
            <div class="modal-body">
				<div class="question-wrapper">
					<label>Question</label>
					<div class="content">
					</div>
				</div>
				<div class="choices-wrapper">
					<label>Option</label>
					<div class="choices">
						<ul class="list-group">
							
						</ul>
					</div>
				</div>
				<div class="solution-wrapper">
					<label>Solution</label>
					<div class="solution">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="fw-bold" style="background: #D1D1E9; border-radius: 6px; padding: 10px 17px; color: black; outline: none; border: none;" data-dismiss="modal" id="close-detail-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="question-picker" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-xl">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Pick question</h5>
		</div>
		<div class="modal-body">
			<input type="hidden" id="selected-row" value="">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="select-header-modal">No.<h>
						<th class="order-header-modal"></th>
						<th class="question-header-modal">Question</th>
						<th class="grade-header-modal">Grade</th>
					</tr>
				</thead>
				<tbody>
					@php
					$i = 1
					@endphp
					@isset($questions)
					@foreach ($questions as $question)
					<tr class="question-row">
						<td class="text-center">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="question_id" value="{{ $question->id }}">
								<label >{{ $i++ }}</label>
							</div>
						</td>
						{{-- <td class="order" >{{ $i++ }}</td> --}}
						<td class="content scrollable">{!! htmlspecialchars_decode($question->content) !!}</td>
						<td class="grade">{{ $question->grade_id }}</td>
					</tr>
					@endforeach
					@endisset
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="fw-bold" style="background: #D1D1E9; border-radius: 6px; padding: 10px 17px; color: black; outline: none; border: none;" data-dismiss="modal" id="close-qpicker-modal">Cancel</button>
		  <button type="button" class="fw-bold" style="color: white; background: #6246EA; border-radius: 6px; padding: 10px; outline: none; border: none;" id="choose">Confirm</button>
		</div>
	  </div>
	</div>
</div>




@push('end')
<script>
	$(document).ready(function () {
		let quantity = $('#quantity');
		let qpicker = $('#question-picker');
		let testForm = $('#test');
		// let qdetail = $('#question-detail');

		let closeQpickerModalButton = $('#close-qpicker-modal');
		// let closeDetailModalButton = $('#close-detail-modal');
		quantity.on('change', function (e) {
			let qty = parseInt($(this).val());

			let questions = '';
			for (let i = 0; i < qty; ++i) {
				questions += `<tr>
									<td class="order">${i+1}</td>
									<td>
										<a class="picker text-success" href="javascript:void(0)" data-toggle="tooltip" title="Pick question"><i class="fas fa-crosshairs"></i></a>
										<a class="clear text-danger" href="javascript:void(0)" data-toggle="tooltip" title="Remove question"><i class="fas fa-times-circle ml-1"></i></a>
									</td>
									<td>
										<input type="hidden" name="question_ids[${i}]" class="question-id" value="">
										<div class="content scrollable">
										</div>
									</td>
									<td class="grade">
									</td>
								</tr>
							`;
			}

			$("#questions>tbody").html(questions);

			testForm.find('.picker').on('click', function (e) {
				e.preventDefault();

				let row = $(this).parent().parent();
				let rowOrder = row.find('.order').text();
				qpicker.find('#selected-row').val(rowOrder);
				qpicker.find('input[name="question_id"]:checked').prop('checked', false);

				qpicker.modal('show');
			});

			// testForm.find('.info').on('click', function (e) {
			// 	e.preventDefault();
			// 	qdetail.modal('show');
			// });

			testForm.find('.clear').on('click', function (e) {
				e.preventDefault();

				let row = $(this).parent().parent();
				row.find('.content').html('');
				row.find('.grade').html('');
			});

			testForm.find('.info').on('click', function (e) { 
				e.preventDefault();

				let row = $(this).parent().parent();

				let question_id = row.find('.question-id').val();
				if (question_id) {
					$.ajax({
						type: "get",
						url: "{{ route('teacher.question.get', '', false) }}" + '/' + question_id,
						dataType: "json",
						success: function (response) {
							console.log(response);
							if (response['return_code']) {
								let jqcontent = qdetail.find('.modal-body');
								jqcontent.find('.content').html(response['question']['content']);
								let strChoices = '';
								response['question']['choices'].forEach(choice => {
									strChoices += `<li class="list-group-item">${choice['content']}</li>\n`;
								});
								jqcontent.find('.choices>ul').html(strChoices);
								jqcontent.find('.solution').html(response['question']['solution']);

								qdetail.modal('show');
							}
						}
					});
				}
				
			});
		});

		@if ($action == 'create')
			quantity.trigger('change');
		@endif


		testForm.submit(function (e) {
			e.preventDefault();

			let form_url = $(this).attr("action");
			let form_method = $(this).attr("method");
			var form_data = $(this).serialize();

			$.ajax({
				type: form_method,
				url: form_url,
				data: form_data,
				success: function (response) {
					if (response['return_code'] == '0') {
						@if ($action == 'create')
						if (!confirm("Successfully add new test!\nWould you like to continue to create new test?")) {
							close();
						} else {
							window.location.reload();
						}
						@else
							console.log('ok');
						@endif
					} else {
						alert("Failed to create new test\nPlease press Ctrl + F5 to create test again");
					}
				}
			});
		});

		qpicker.find('#choose').on('click', function (e) {
			let rowOrder = parseInt(qpicker.find('#selected-row').val());
			let selectedRadio = qpicker.find('input[name="question_id"]:checked')
			let selectedRow = selectedRadio.parent().parent().parent();
			let selectedQuestion = selectedRadio.val();

			let curRow = testForm.find(`#questions>tbody>tr:eq(${rowOrder-1})`);
			$(curRow).find('.question-id').val(selectedQuestion);
			$(curRow).find('.content').html(selectedRow.find('.content').html());
			$(curRow).find('.grade').text(selectedRow.find('.grade').text());

			qpicker.modal('hide');
		});

		qpicker.find('.question-row').on('click', function (e) {
			$(this).find('input[type="radio"]').prop('checked', true);
		});
		
		closeQpickerModalButton.on('click', function(e) {
			qpicker.modal('hide');
		});

		closeDetailModalButton.on('click', function(e) {
			qdetail.modal('hide');
		});


	});

</script>
@endpush
