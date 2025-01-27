@extends('template.default')


@section('page-title')
Create Shortcut

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('form-box')
<div class="mb-2">
<form class="p-3 create-shortcut-form" action="api/shortcuts" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group ">
		<label class="">Select Shortcut Position</label>
		<select class="form-control" name="s_number" type="number" required>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
		</select>
	</div>
	
	<div class="form-group">
		<label class="">Title</label>
		<input type="text" name="title" class="form-control" required>
	</div>
	<div class="form-group">
		<label class="">Url</label>
		<input type="url" name="url" class="form-control" required>
	</div>
	<div class="form-group">
		<label class="">Thubmnail</label>
		<input type="file" accept='image/*' name="image_path" class="form-control" required>
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg create-shortcut-btn" type="submit">Create</button>
</form>
</div>
<div class="p-3 notice d-none">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Shortcut Created Successfully</p>
	
</div>
</div>
@endsection

@section('custom-js')
<script>
	$(document).ready(function(){
		$(".create-shortcut-form").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				type : "post",
				url : "api/shortcuts",
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function(){
					$(".create-shortcut-btn").html("Uploading...");
					$(".create-shortcut-btn").attr('disabled', true);
				},
				success : function(response)
				{
					$(".create-shortcut-btn").html("Create");
					$(".notice").removeClass("d-none");
					$(".create-shortcut-btn").attr('disabled', false);
					setTimeout(function(){
						$(".notice").addClass("d-none");
					},1500);
					
				},
				error : function(error)
				{
					$(".create-shortcut-btn").attr('disabled', false);
					$(".create-shortcut-btn").html("Create");
					alert('Already created go to the delete section fist delete shortcut then create again');
				}
			});
		});
	});
</script>
@endsection