$(document).ready(function(){
	$(".upload-bg-form").on("submit", function(e){
		e.preventDefault();
		$.ajax({
			type : "post",
			url : "api/background-image",
			data : new FormData(this),
			processData : false,
			contentType : false,
			cache : false,
			beforeSend : function(){
				$(".upload-bg-btn").html("Uploading...");
			},
			success : function(response){
				console.log(response);
				$(".upload-bg-btn").html("Upload");
				$(".notice").removeClass('d-none');
				setTimeout(function(){
					$(".notice").addClass('d-none');
				},1000);
			},
			error : function(response){
				$(".upload-bg-btn").html("Upload");
					console.log(response);
			}	
		});
	});
}); 