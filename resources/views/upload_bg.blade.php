@extends('template.default')


@section('page-title')
Upload Background Images

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('custom-js')
	<script src="lang/js/load-ext.js"></script>
	<script src="lang/js/manage-bg.js"></script>
@endsection

@section('form-box')
<div class="mb-2">
<form class="p-3 upload-bg-form" enctype="multipart/form-data" action="/api/background-image" method="post">
	@csrf
	<div class="form-group">
		<label class="">Extention Name</label>
		<select class="form-control ext-option" name="ext_id">
			
		</select>
	</div>
	<div class="form-group">
		<label class="">Select Images</label>
		<input type="file" accept="image/*" name="image_path[]" class="form-control" multiple>
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg upload-bg-btn" type="submit">Upload</button>
</form>
</div>
<div class="p-3 notice d-none">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection