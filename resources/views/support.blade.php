@extends('template.default')


@section('page-title')
Support

@endsection


@section('opration-title')

Upload Background Images
@endsection

@section('form-box')
<div class="p-3 d-none notice">
<div class="alert alert-success mt-5 shadow-lg mb-5">
	<p class="text-center">Congrates ! </p>
	<p class="text-center">Upload Successfull</p>
	
</div>
</div>
<div class="mb-2">
<form class="p-3 support-form" action="api/support" method="post">
	<div class="form-group">
		<label class="">Feedback Url</label>
		<input type="url" name="feedback" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Support</label>
		<input type="url" name="support" class="form-control">
	</div>
	<div class="form-group">
		<label class="">FAQ/how to Url</label>
		<input type="url" name="faq" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Privacy Policy Url</label>
		<input type="url" name="privacy" class="form-control">
	</div>
	
	<div class="form-group">
		<label class="">On Install Redirect Url</label>
		<input type="url" name="install" class="form-control">
	</div>
	
	<div class="form-group">
		<label class="">On Uninstall Redirect Url</label>
		<input type="url" name="uninstall" class="form-control">
	</div>
	<div class="form-group">
		<label class="">EULA Url</label>
		<input type="url" name="eula" class="form-control">
	</div>
	<div class="form-group">
		<label class="">Donate Url</label>
		<input type="url" name="donate" class="form-control">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg support-fom-btn" type="submit">Submit</button>
</form>
</div>

@endsection

@section('custom-js')


	<script>
		$(document).ready(function(){
			$(".support-form").on("submit", function(e){
				e.preventDefault();
				$.ajax({
					type : 'post',
					url : "api/support",
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					beforeSend : function(){
						$(".support-fom-btn").html("Uploading...");
						$(".support-fom-btn").attr('disabled', true);
					},
					success : function(response)
					{
						console.log(response);
						$(".support-fom-btn").attr('disabled', false);
						$(".support-fom-btn").html("Submit");
						$(".notice").removeClass('d-none');
						setTimeout(function(){
							$(".notice").addClass('d-none');
						},1500);
						
					},
					error : function(response)
					{
						console.log(response);
						$(".support-fom-btn").attr('disabled', false);
						$(".support-fom-btn").html("Submit");
						alert("you already created support option for this extention go to edit support section to change something");
					}
				});
			});
		});
	</script>
@endsection