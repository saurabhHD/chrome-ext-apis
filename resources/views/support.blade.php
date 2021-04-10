@extends('template.default')


@section('page-title')
Support

@endsection()


@section('opration-title')

Upload Background Images
@endsection()

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Select Extention</label>
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
	<div class="form-group">
		<label class="">FAQ/how to Url</label>
		<input type="url" name="faq_url" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Privacy Policy Url</label>
		<input type="url" name="privacy_policy_url" class="form-control">
	</div>
	<div class="form-group">
		<label class="">FAQ/how to Url</label>
		<input type="url" name="faq_url" class="form-control">
	</div>
	<div class="form-group">
		<label class="">On Install Redirect Url</label>
		<input type="url" name="install_url" class="form-control">
	</div>
	
	<div class="form-group">
		<label class="">On Uninstall Redirect Url</label>
		<input type="url" name="uninstall_url" class="form-control">
	</div>
	<div class="form-group">
		<label class="">EULA Url</label>
		<input type="url" name="eula_url" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Donate Url</label>
		<input type="url" name="donate_url" class="form-control">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg" type="submit">Submit</button>
</form>
</div>
<div class="p-3">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection()