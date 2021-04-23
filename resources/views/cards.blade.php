@extends('template.default')

@section('page-title')

Manage Cards
@endsection

@section('form-box')

<form class="p-4 upload-card-form">
	@csrf
	<div class="form-group mb-3">
		<label>Target URL</label>
		<input type="url" name="url" class="form-control" placeholder="https://unlockdream.com">
	</div>
	<div class="form-group mb-3">
		<label>Tumbnail</label>
		<input type="file" name="image_path" class="form-control" placeholder="https://unlockdream.com">
	</div>
	<div class="form-group p-5">
		<button type="submit" class="btn my-btn float-right px-3 upload-card-btn">Upload</button>
	</div>
</form>
<hr>
<div class="card-box">

</div>
@endsection

@section('custom-js')
<script>
	$(document).ready(function(){
		upload_card();
		load_card();
	});

	function upload_card()
	{
		$(".upload-card-form").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				type : "post",
				url : "api/cards",
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function()
				{
					$(".upload-card-btn").html('Uploading...');
				},
				success : function(response)
				{
					$(".upload-card-btn").html('Upload');
					console.log(response);
					load_card();
				},
				error : function(error){
					console.log(error);
					$(".upload-card-btn").html('Upload');
				}
			});
		});
	}


	function load_card(){
		$.ajax({
			type : "get",
			url : "api/cards/",
			data : {
				_token : $("body").attr("token")
			},
			success : function(response)
			{
				$(".card-box").html('<div class="p-3 shadow-lg text-center"><img src="storage/'+response.data[0].image_path+'" width="60%" id="'+response.data[0].id+'"><br><br><button class="btn btn-danger delete-card-btn" id="'+response.data[0].id+'"><i class="fa fa-trash"><i> Delete</button></div>');
				console.log(response.data[0].image_path);
				delete_card();
			},
			error : function(error){
				console.log(error);
			}
		});
	}

	function delete_card()
	{
		$(".delete-card-btn").click(function(){
			var id = $(this).attr("id");
			var parent = this.parentElement;
			$.ajax({
				type : "delete",
				url : "api/cards/"+id,
				data : {
					_token : $("body").attr("token")
				},
				beforeSend : function()
				{
					$(".delete-card-btn").html("Deleting..");
				},
				success : function(response)
				{
					console.log(response);
					$(parent).remove();
				},
				error : function(error)
				{
					console.log(error);
				}
			});
		});
	}
</script>

@endsection