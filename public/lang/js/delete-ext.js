$(document).ready(function(){
	//submit or rename data 
	$(".delete-ext-form").on('submit', function(e){
		e.preventDefault();
		var id =  $(".ext-option").val();
		
		$.ajax({
			type : 'delete',
			url : 'http://127.0.0.1:8000/api/extention/'+id,
			data : {
				_token : $("body").attr('token')
			},
			beforeSend : function(){
				  $(".delete-ext-btn").html('Deleteing...');
			},
			success : function(response){
				$(".notice").removeClass("d-none");
				$(".delete-ext-btn").html('Delete');
			},
			error : function(response){
				alert('something went wrong !');
				$(".delete-ext-btn").html('Delete');
			}
		});
	});
});