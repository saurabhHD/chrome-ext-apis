@extends('template.default')


@section('page-title')
Add Game

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('form-box')
<div class="mb-2">
<form class="p-3 add-game-form" method="post" action="api/game" enctype="multipart/form-data">
	@csrf
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
		<input type="file" name="image_path" class="form-control" required>
	</div>
	
	
	<button class="btn my-btn float-right px-4 shadow-lg add-game-btn" type="submit">Add Game</button>
</form>
</div>
<div class="p-3 d-none notice">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
@endsection


@section('custom-js')

<script>
	$(document).ready(function(){
		$(".add-game-form").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				type : "post",
				url : "api/game",
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function(){
					$(".add-game-btn").html('Uploading...');
					$(".add-game-btn").attr("disabled", true);
				},
				success : function(response)
				{
					$(".add-game-btn").attr("disabled", false);
					$(".add-game-btn").html('Add Game');
					$(".notice").removeClass('d-none');
					setTimeout(function(){
						$(".notice").addClass('d-none');
					},1500);
					
				},
				error : function(error)
				{
					$(".add-game-btn").attr("disabled", false);
					$(".add-game-btn").html('Add Game');
					alert('something went wrong')
				}
			});
		});
	});
</script>

@endsection