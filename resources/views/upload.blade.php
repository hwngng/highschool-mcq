@extends('layouts.app')

@section('content')
<div class="container">
	<form method="post" action="{{ route('upload.store') }}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="file" name="file" accept=".doc, .docx, .odt"/>	
		<button class="btn btn-primary" style="margin-top: 5px"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Upload</button>
	</form>

	<div>
		{!! $content ?? ''  !!}
	</div>
</div>
@endsection
