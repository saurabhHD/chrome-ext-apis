@extends('template.default')


@section('page-title')
Delete & Update  Shortcuts

@endsection()


@section('opration-title')

Upload Background Images
@endsection()

@section('form-box')
<div class="mb-2">
<div class="delete-shortcut-box"></div>
</div>
<div class="p-3 notice d-none">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Delete Successfull please reload page</p>
	
</div>
</div>
@endsection


@section('custom-js')

	<script>
		

$(document).ready(function(){
			$.ajax({
				type : 'get',
				url : '/api/shortcuts/',
				data : {
					_token : $("body").attr('token')
				},
				beforeSend : function(){
					$(".delete-shortcut-box").html('Loading...');
				},
				success : function(response){
						$(".delete-shortcut-box").html('');
					var data = response.data;
					console.log(response.data[0].title);
					var i;
					for(i=0;i<data.length;i++)
					{
						
						var opt = '<div class="col-12"><form class="delete-shortcut-form" id="'+data[i].id+'">@csrf<div class="row my-3 py-2 shadow-sm rounded-lg"> <div class="col-1 text-center pt-2">'+data[i].s_number+'</div>  				<div class="col-3"><input type="text" name="name" class="form-control outline-none shortcut-name-input" value="'+data[i].title+'" required></div>						<div class="col-3"><input type="url" name="url" class="form-control outline-none shortcut-url-input" value="'+data[i].url+'" required></div>  				<div class="col-2">  					<button class="btn btn-danger delete-shortcut-btn" id="'+data[i].id+'" type="submit" sk="delete"><i class="fa fa-trash" ></i>  Delete</button>  				</div>  				<div class="col-3">  					<button class="btn btn-primary update-shortcut-btn" id="'+data[i].id+'" type="submit" sk="update"><i class="fa fa-edit"></i> Update</button>  				</div>  			</form></div>';
						$(".delete-shortcut-box").append(opt);
					}
					delete_shortcut();
				},
				error : function(response){
					console.log(response);
				}
			});

			
			
		});
			

			function delete_shortcut(){
	//submit or rename data 
	$(".delete-shortcut-form").each(function(){
		$(this).on('submit', function(e){
			var submiter = e.originalEvent.submitter;
		e.preventDefault();
		
		var id =  $(this).attr('id');
		var delete_btn = this.getElementsByClassName('delete-shortcut-btn');
		var update_btn = this.getElementsByClassName('update-shortcut-btn');
		var parent = this.parentElement;
		var input = this.getElementsByClassName("shortcut-name-input");
		var input = $(input).val();
		var input_two = this.getElementsByClassName("shortcut-url-input");
		var input_two = $(input_two).val();
		if($(submiter).attr('sk') == $(delete_btn).attr('sk'))
		{
			// delete ext code
			$.ajax({
			type : 'delete',
			url : 'api/shortcuts/'+id,
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
			url : 'api/shortcuts/'+id,
			data : {
				_token : $("body").attr('token'),
				title : input,
				url : input_two

			},
			beforeSend : function(){
				  $(update_btn).html('Updating...');
				  $(update_btn).attr('disabled', true);
			},
			success : function(response){
				$(update_btn).attr('disabled', false);
				$(update_btn).html('<i class="fa fa-edit"></i> Update');
			},
			error : function(response){
				alert('something went wrong !');
				$(update_btn).html('Update');
				$(update_btn).attr('disabled', false);
			}
			});
		}
		
	});
	});
}
	

	</script>

@endsection