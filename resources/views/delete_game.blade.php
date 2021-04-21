@extends('template.default')


@section('page-title')
Delete Game

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('form-box')
<div class="mb-2">
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
		$.ajax({
			type : 'get',
			url : 'api/game',
			success : function(response){
				$(".game-box").html('');
				var data = response.data;
				var i;
				for(i=0;i<data.length;i++)
				{
				

				
					var option = '<div class="col-12 "><form class="edit-game-form" id="'+data[i].id+'">@csrf<div class="row my-3 py-2 shadow-sm rounded-lg"> <div class="col-2 text-center pt-2">'+data[i].id+' <img src="storage/'+data[i].image_path+'" width="30" ></div><div class="col-3"><input type="text" name="title" class="form-control outline-none game-title-input" value="'+data[i].title+'"></div>  				<div class="col-3"><input type="url" name="url" class="form-control outline-none game-url-input" value="'+data[i].url+'"></div>  				<div class="col-2">  					<button class="btn btn-danger delete-game-btn" id="'+data[i].id+'" type="submit" sk="delete"><i class="fa fa-trash" ></i>  Delete</button>  				</div>  				<div class="col-2">  					<button class="btn btn-primary update-game-btn" id="'+data[i].id+'" type="submit" sk="update"><i class="fa fa-edit"></i>Update</button>  				</div>  			</form></div>';
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
	});


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
			url : 'api/game/'+id,
			data : {
				_token : $("body").attr('token')
			},
			beforeSend : function(){
				  $(delete_btn).html('Deleteing...');
			},
			success : function(response){
				$(parent).remove();
				$(delete_btn).html('Delete');
			},
			error : function(response){
				alert('something went wrong !');
				$(delete_btn).html('Delete');
			}
			});
		}
		else if($(submiter).attr('sk') == $(update_btn).attr('sk'))
		{
			$.ajax({
			type : 'put',
			url : 'api/game/'+id,
			data : {
				_token : $("body").attr('token'),
				url : input_url,
				title : input_title

			},
			beforeSend : function(){
				  $(update_btn).html('Updating...');
			},
			success : function(response){
				
				$(update_btn).html('<i class="fa fa-edit"></i>Update');
			},
			error : function(response){
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