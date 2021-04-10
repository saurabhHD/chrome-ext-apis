@extends('template.default')


@section('page-title')
Add Game

@endsection()


@section('opration-title')

Upload Background Images
@endsection()

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Thubmnail</label>
		<input type="file" name="images" class="form-control">
	</div>
	
	<div class="form-group">
		<label class="">Url</label>
		<input type="url" name="url" class="form-control">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg" type="submit">Add Game</button>
</form>
</div>
<div class="p-3">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection()