@extends('template.default')


@section('page-title')
Edit Extention

@endsection()


@section('opration-title')

Create Extention
@endsection()

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Extention Name</label>
		<select class="form-control" name="ext_name">
			<option>Option1</option>
			<option>Option1</option>
		</select>
	</div>
	<div class="form-group">
		<label>Rename</label>
		<input type="text" name="re_name" class="form-control">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg" type="submit">Change</button>
</form>
</div>
<div class="p-3">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! api's genrated </p>
	<p>http://127.0.0.1:8000/create/api/v1/random</p>
	<p>http://127.0.0.1:8000/create/api/v1/random</p>
	<p>http://127.0.0.1:8000/create/api/v1/random</p>
</div>
</div>
@endsection()