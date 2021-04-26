@extends('template.default')


@section('page-title')
Edit Support

@endsection


@section('form-box')
<div class="mb-2">
<form class="p-3 edit-ext-form">
	@csrf
	<div class="form-group">
		<label class="">Feedback url</label>
		<input type="url" name="feedback" class="form-control feedback">
	</div>
	<div class="form-group">
		<label class="">Support</label>
		<input type="url" name="support" class="form-control support">
	</div>
	<div class="form-group">
		<label class="">FAQ/how to Url</label>
		<input type="url" name="faq" class="form-control faq">
	</div>
	<div class="form-group">
		<label class="">Privacy Policy Url</label>
		<input type="url" name="privacy" class="form-control privacy">
	</div>
	
	<div class="form-group">
		<label class="">On Install Redirect Url</label>
		<input type="url" name="install" class="form-control install">
	</div>
	
	<div class="form-group">
		<label class="">On Uninstall Redirect Url</label>
		<input type="url" name="uninstall" class="form-control uninstall">
	</div>
	<div class="form-group">
		<label class="">EULA Url</label>
		<input type="url" name="eula" class="form-control eula">
	</div>
	<div class="form-group">
		<label class="">Donate Url</label>
		<input type="url" name="donate" class="form-control donate">
	</div>
	<button class="btn my-btn float-right px-4 shadow-lg edit-support-btn" type="submit">Update</button>
</form>
</div>

@endsection

@section('custom-js')



<script>
	$(document).ready(function(){
		$.ajax({
				type : 'get',
				url : 'api/support/',
				success : function(response)
				{
					var data = response.data[0];
					$(".feedback").val(data.feedback);
					$(".faq").val(data.faq);
					$(".privacy").val(data.privacy);
					$(".install").val(data.install);
					$(".uninstall").val(data.uninstall);
					$(".eula").val(data.eula);
					$(".donate").val(data.donate);
					$(".support").val(data.support);
					$(".edit-ext-form").attr('id',data.id);
					// update code strat

					$(".edit-ext-form").on("submit", function(e){
						e.preventDefault();
						
						var id = $(this).attr('id');
						$.ajax({
							type : 'put',
							url : 'api/support/'+id,
							data : {
								feedback : $(".feedback").val(),
								faq : $(".faq").val(),
								privacy : $(".privacy").val(),
								install : $(".install").val(),
								uninstall : $(".uninstall").val(),
								eula : $(".eula").val(),
								donate : $(".donate").val(),
								support : $(".support").val()
							},
							beforeSend : function(){
								$(".edit-support-btn").html("Loading...");
								$(".edit-support-btn").attr('disabled', true);
							},
							success : function(response)
							{
								$(".edit-support-btn").attr('disabled', false);
								$(".edit-support-btn").html("Update");
								alert('success !');
							},
							error : function(response)
							{
								console.log(response);
								$(".edit-support-btn").attr('disabled', false);
								$(".edit-support-btn").html("Update");
								alert('something went wrong !');
							}
						});
					});

				},
				error : function(response){
					console.log(response);
				}
			});
	});
</script>

@endsection