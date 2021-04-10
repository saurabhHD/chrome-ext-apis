@extends('template.default')


@section('page-title')
Delete Game

@endsection()


@section('opration-title')

Upload Background Images
@endsection()

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Select game</label>
		<select class="form-control" name="ext_name">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
		</select>
	</div>
	
	<button class="btn my-btn float-right px-4 shadow-lg" type="submit">Delete</button>
</form>
</div>
<div class="p-3">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection()