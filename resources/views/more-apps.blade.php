@extends('template.default')


@section('page-title')
Manage More Apps

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('form-box')
<div class="mb-5">
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
	<div class="form-group">
		<label class="">Category</label>
		<input type="text" name="category" class="form-control" required>
	</div>
	
	<button class="btn my-btn float-right px-4 mb-3 shadow-lg add-game-btn" type="submit">Add App</button>
</form>
</div>
<div class="p-3 d-none notice">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
<hr>
<div class="mb-2 mt-4">
<div class="game-box w-100 text-center">
	Loading...
<br>
<p>No item here</p>
</div>
</div>
<div class="p-3">
</div>
@endsection


@section('custom-js')

<script>
	$(document).ready(function(){
        oldApps();
		$(".add-game-form").on("submit", function(e){
			e.preventDefault();
			$.ajax({
				type : "post",
				url : "api/more-app",
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
					oldApps();
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

function oldApps(){
    $.ajax({
			type : 'get',
			url : 'api/more-app',
			success : function(response){
				$(".game-box").html('');
				var data = response.data;
				var i;
				for(i=0;i<data.length;i++)
				{
				

				
					var option = '<div class="col-12 "><form class="edit-game-form" id="'+data[i].id+'">@csrf<div class="row my-3 py-2 shadow-sm rounded-lg"> <div class="col-2 text-center pt-2"> <img src="storage/'+data[i].image_path+'" width="30" ></div><div class="col-3"><input type="text" name="title" class="form-control outline-none game-title-input" value="'+data[i].title+'"></div>  				<div class="col-3"><input type="url" name="url" class="form-control outline-none game-url-input" value="'+data[i].url+'"></div>  				<div class="col-2">  					<button class="btn btn-danger delete-game-btn" id="'+data[i].id+'" type="submit" sk="delete"><i class="fa fa-trash" ></i>  Delete</button>  				</div>  				<div class="col-2">  					<button class="btn btn-primary update-game-btn" id="'+data[i].id+'" type="submit" sk="update"><i class="fa fa-edit"></i>Update</button>  				</div>  			</form></div>';
					$(".game-box").append(option);
				}

				// delete game code 

				delete_game();
			},
			error : function(error)
			{
				console.log(error);
			}
		});
}

function delete_game(){
	//submit or rename data 
	$(".edit-game-form").each(function(){
		$(this).on('submit', function(e){
			var submiter = e.originalEvent.submitter;
		e.preventDefault();
		
		var id =  $(this).attr('id');
		var delete_btn = this.getElementsByClassName('delete-game-btn');
		var update_btn = this.getElementsByClassName('update-game-btn');
		var parent = this.parentElement;
		var input_url = this.getElementsByClassName("game-url-input");
		var input_url = $(input_url).val();
		var input_title = this.getElementsByClassName("game-title-input");
		var input_title = $(input_title).val();
		if($(submiter).attr('sk') == $(delete_btn).attr('sk'))
		{
			// delete ext code
			$.ajax({
			type : 'delete',
			url : 'api/more-app/'+id,
			data : {
				_token : $("body").attr('token')
			},
			beforeSend : function(){
				  $(delete_btn).html('Deleteing...');
				   $(delete_btn).attr("disabled", true);
			},
			success : function(response){
				$(parent).remove();
				$(delete_btn).html('Delete');
				$(delete_btn).attr("disabled", false);
			},
			error : function(response){
				alert('something went wrong !');
				$(delete_btn).html('Delete');
				$(delete_btn).attr("disabled", false);
			}
			});
		}
		else if($(submiter).attr('sk') == $(update_btn).attr('sk'))
		{
			$.ajax({
			type : 'put',
			url : 'api/more-app/'+id,
			data : {
				_token : $("body").attr('token'),
				url : input_url,
				title : input_title

			},
			beforeSend : function(){
				  $(update_btn).html('Updating...');
				  $(update_btn).attr("disabled", true);
			},
			success : function(response){
				$(update_btn).attr("disabled", false);
				$(update_btn).html('<i class="fa fa-edit"></i>Update');
			},
			error : function(response){
				$(update_btn).attr("disabled", false);
				alert('something went wrong !');
				$(update_btn).html('Update');
				console.log(response);
			}
			});
		}
		
	});
	});
	
}
</script>

@endsection