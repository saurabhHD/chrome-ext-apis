@extends('template.default')


@section('page-title')
Create Extention

@endsection


@section('opration-title')

Create Extention
@endsection


@section('form-box')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#create-ext-tab" role="tab" >Create</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#edit-ext-tab" role="tab">Edit</a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane fade show active" id="create-ext-tab" role="tabpanel">
  	<div class="mb-2">
	<form class="p-3 create-ext-form" method="post" action="/api/extention">
		@csrf
		<div class="form-group mb-5">
			<label class="">Extention Name</label>
			<input type="text" name="ext_name" class="form-control ext-name">
		</div>
		<div class="form-group mb-5 d-none">
			<label class="">Extention Name</label>
			<input type="text" name="ext_key" class="form-control" value="dhjgajhgja">
		</div>
		<button class="btn my-btn float-right px-4 shadow-lg create-ext-btn" type="submit">Genrate Api</button>
	</form>
	</div>
	<div class="p-3 notice d-none">
	<div class="alert alert-success mt-5 shadow-lg mb-5">
		<p class="text-center">Congrates ! api's genrated </p>
		<p class="text-center">Copy these api's and insert into chrome extention </p>
		<p class="api-one"></p>
		<p class="api-two"></p>
		<p class="api-three"></p>
		<p class="api-four"></p>
		<p class="api-five"></p>
		</div>
	</div>

  </div>
  <div class="tab-pane fade" id="edit-ext-tab" role="tabpanel">
  		<br>
  	<div class="row px-1 edit-ext-box">
  		
  	</div>
  </div>
</div>



@endsection

@section('custom-js')


<script>

	$(document).ready(function(){
	$.ajax({
		type : 'get',
		url : '/api/extention/',
		data : {
			_token : $("body").attr('token')
		},
		beforeSend : function(){
			var loading_option = "<i class='fa fa-spin'><i>";
			//$(".edit-ext-box").html(loading_option);
		},
		success : function(response){
			$(".loading-option").remove();
			var data = response.data;
			var i;
			for(i=0;i<data.length;i++)
			{
				
				
				$(".edit-ext-box").append('<div class="col-12 "><form class="edit-ext-form" id="'+data[i].id+'">@csrf<div class="row my-3 py-2 shadow-sm rounded-lg"> <div class="col-1 text-center pt-2">'+data[i].id+'</div>  				<div class="col-7"><input type="text" name="name" class="form-control outline-none ext-name-input" value="'+data[i].ext_name+'"></div>  				<div class="col-2">  					<button class="btn btn-danger delete-ext-btn" id="'+data[i].id+'" type="submit" sk="delete"><i class="fa fa-trash" ></i>  Delete</button>  				</div>  				<div class="col-2">  					<button class="btn btn-primary update-ext-btn" id="'+data[i].id+'" type="submit" sk="update"><i class="fa fa-edit"></i> Update</button>  				</div>  			</form></div>');
			}
			delete_ext();
		},
		error : function(response){
			console.log(response);
		}
	});
	});


	function delete_ext(){
	//submit or rename data 
	$(".edit-ext-form").each(function(){
		$(this).on('submit', function(e){
			var submiter = e.originalEvent.submitter;
		e.preventDefault();
		
		var id =  $(this).attr('id');
		var delete_btn = this.getElementsByClassName('delete-ext-btn');
		var update_btn = this.getElementsByClassName('update-ext-btn');
		var parent = this.parentElement;
		var input = this.getElementsByClassName("ext-name-input");
		var input = $(input).val();
		if($(submiter).attr('sk') == $(delete_btn).attr('sk'))
		{
			// delete ext code
			$.ajax({
			type : 'delete',
			url : 'api/extention/'+id,
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
			url : 'api/extention/'+id,
			data : {
				_token : $("body").attr('token'),
				ext_name : input

			},
			beforeSend : function(){
				  $(update_btn).html('Updating...');
			},
			success : function(response){
				
				$(update_btn).html('<i class="fa fa-edit"></i> Update');
			},
			error : function(response){
				alert('something went wrong !');
				$(update_btn).html('Update');
			}
			});
		}
		
	});
	});
	
}

</script>
<script>
	$(document).ready(function(){
		$('.create-ext-form').on("submit", function(e){
			e.preventDefault();
			$.ajax({
				type : 'post',
				url : 'api/extention',
				data : {
					_token : $("body").attr('token'),
					ext_name : $(".ext-name").val()
				},
				beforeSend : function(response){
					$(".create-ext-btn").html("Loading...");
				},
				success : function(response){
					$(".notice").removeClass("d-none");

					$(".create-ext-btn").html("Genrate Api");
					$(".api-one").html(response.data.one);
					$(".api-two").html(response.data.two);
					$(".api-three").html(response.data.three);
					$(".api-four").html(response.data.four);
					$(".api-five").html(response.data.five);
				},
				error : function(response){
					$(".create-ext-btn").html("Genrate Api");
					alert(response.responseText);
				}
			});
		});
	});
</script>

@endsection