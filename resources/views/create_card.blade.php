@extends('template.default')


@section('page-title')
Create card

@endsection()


@section('opration-title')

Upload Background Images
@endsection()

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Select Images</label>
		<input type="file" name="images" class="form-control">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg" type="submit">Upload</button>
</form>
</div>
<div class="p-3">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection()