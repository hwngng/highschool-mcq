@push('header')
<style>
input[type=checkbox] {
	width: 25px;
	height: 25px;
}

.choices .choice {
	align-items: center;
}
</style>
@endpush

<h4 class="fw-bold my-5">
	@if ($action == 'create')
		Create question
	@else
		Edit question
	@endif
</h4>


<form method="POST" action="{{ $action == 'create' ? route('teacher.question.store', [], false) : route('teacher.question.update', [], false) }}" id="form" class="row">
    @csrf

	<div class="d-flex justify-content-between">
		<div class="form-group my-3">
			<label for="grade_id" class="fw-bold" style="margin-top: 20px; margin-right: 20px">Grade <span style="color: red;">*</span></label>
			<select name="grade_id" id="grade" style="border: 1px solid #D1D1E9; border-radius: 8px; outline: none; padding: 5px 10px; background-color: white;">
				@foreach ($grades as $grade)
					<option value="{{ $grade->id }}" {{ isset($question) && $question->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->id }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group my-3">
			<label for="subject_id" class="fw-bold" style="margin-top: 20px; margin-right: 20px">Subject <span style="color: red;">*</span></label>
			<select name="subject_id" id="subject_id" style="border: 1px solid #D1D1E9; border-radius: 8px; outline: none; padding: 5px 10px; background-color: white;">
				<option value="1">Math</option>
				<option value="2">Physics</option>
				<option value="3">Chemistry</option>
				<option value="4">Biology</option>
				<option value="5">English</option>
			</select>
		</div>
	</div>
 
	<input type="hidden" name="id" value="{{ $question->id ?? ''}}">
	<div class="form-group my-3">
		<!-- <label for="content" class="font-weight-bold">Nội dung câu hỏi:</label>
		<textarea class="form-control" name="content" id="content">{{ isset($question->content) ? htmlspecialchars_decode($question->content) : '' }}</textarea> -->

		<h6 class="fw-bold">Details <span style="color: red;">*</span></h6>
		<textarea name="content" id="content" rows="8" class="form-control p-3" style="border: 1px solid #D1D1E9; border-radius: 8px; outline: none; resize: none; width: 100%;" required>
			{{ isset($question->content) ? htmlspecialchars_decode($question->content) : '' }}
		</textarea>
	</div>

	
	
	<div class="form-group my-3 container">
		<div class="choices">
		@php
			$noOfChoices = $action == 'create' ? 1 : count($question->choices);
		@endphp
		@if ($action == 'create' || isset($question->choices) && count($question->choices) > 0)
			@for ($i = 0; $i < $noOfChoices; $i++)
				<div class="choice row mb-3">
					@php
						if ($action != 'create')
						{
							$choice = $question->choices->find($i);
						}
					@endphp
					<div class="d-inline-flex align-items-center col-10">
						<label for="A" class="fw-bold me-3">{{ chr(ord('A')+$i) . '.' }} </label>
						<textarea name="choices[{{ $i }}][content]" id="{{ chr(ord('A')+$i) }}" class="form-control">{{ isset($choice) ? htmlspecialchars_decode($choice->content) : '' }}</textarea>
					</div>
					
					<!-- <label class="form-check-label solution col-2"> -->
						<input type="checkbox" class="form-check-input col-1 solution" name="choices[{{ $i }}][sol]" value="1" {{ isset($choice) && $choice->is_solution == 1 ? 'checked' : ''}}>
						<label for="choices[{{ $i }}][sol]" class="col-1"> Answer</label>
					<!-- </label> -->
				</div>
	
			@endfor
		@endif
		</div>
	</div>

	<div class="form-group my-3">
		<button type="button" class="add-choice my-3" style="background: #D1D1E9; border-radius: 6px; border: none; color: black; padding: 18px;">Add option <i class="fa fa-plus"></i></button>
	</div>

	<div class="form-group my-3">
		<h6 class="fw-bold">Answer explaination <span style="color: red;">*</span></h6>
		<textarea class="form-control" name="solution" id="solution">{{ isset($question->solution) ? htmlspecialchars_decode($question->solution) : '' }}</textarea>
	</div>

	

	<div class="form-group my-3 d-flex justify-content-around">

		<a style="background-color: #D1D1E9; border-radius: 6px; border: none; color: #2B2C34; padding: 18px 50px; font-weight: bold;" href="{{ route('teacher.question.list') }}">Cancel</a>
		<button type="submit" class="" style="background-color: #6246EA; border-radius: 6px; border: none; color: white; padding: 18px 50px; font-weight: bold;">
			@if ($action == 'create')
				Create question
			@else
				Edit question
			@endif
		</button>
	</div>
</form>

@push('end')
<script src="https://cdn.ckeditor.com/4.12.0/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        customConfig: '/js/ckeditor/config.js',
        extraPlugins: 'ckeditor_wiris'
	});

	CKEDITOR.replace('solution', {
        customConfig: '/js/ckeditor/config.js',
        extraPlugins: 'ckeditor_wiris'
	});

	var curChoice = 65;
	var noOfChoice = {{ $noOfChoices }};
	for (let i = 0; i < noOfChoice; ++i) {
		CKEDITOR.replace(String.fromCharCode(curChoice + i), {
			customConfig: '/js/ckeditor/config_basic.js',
			extraPlugins: 'ckeditor_wiris',
		});
	}
	curChoice += noOfChoice-1;
    $(document).ready(function () {

        $('.add-choice').on('click', function () {
			let c = String.fromCharCode(++curChoice);
            $('.choices').append(`<div class="choice row mb-3" name="choice">
	            <div class="d-inline-flex align-items-center col-10">
					<label for="${c}" class="fw-bold me-3">${c}. </label>
					<textarea name="choices[${curChoice-65}][content]" id="${c}" class="form-control"></textarea>
				</div>
				
				
					<input type="checkbox" class="form-check-input col-1" name="choices[${curChoice-65}][sol]" value="1">
					<label for="choices[${curChoice-65}][sol]" class="col-1"> Answer</label>
				
			</div>`);

			CKEDITOR.replace(c, {
				customConfig: '/js/ckeditor/config_basic.js',
				extraPlugins: 'ckeditor_wiris',
			});
        });

		$('#form').submit(function (e) {
			e.preventDefault();

			let form_url = $(this).attr("action");
			let form_method = $(this).attr("method");

			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].updateElement();
			};
			var form_data = $(this).serialize();
			$.ajax({
				type: form_method,
				url: form_url,
				data: form_data,
				success: function (response) {
					if (response['return_code'] == '0') {
						@if ($action == 'create')
							if (!confirm("Thêm câu hỏi thành công!\nBạn có muốn tiếp tục tạo câu hỏi?")) {
								close();
							} else {
								window.location.reload();
							}
						@else
							close();
						@endif
					} else {
						@if ($action == 'create')
							alert("Thêm câu hỏi thất bại.\nVui lòng thử lại hoặc ấn Ctrl + F5 rồi tạo lại câu hỏi.");
						@else
							alert("Cập nhật câu hỏi thất bại.\nVui lòng thử lại hoặc ấn Ctrl + F5 rồi tạo lại câu hỏi.");
						@endif
					}
				}
			});
		})
    });
</script>
@endpush
