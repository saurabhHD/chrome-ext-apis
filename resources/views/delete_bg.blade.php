@extends('template.default')


@section('page-title')
Delete Background images

@endsection


@section('opration-title')

Delete Background Images
@endsection

@section('form-box')
<div class="mb-2">
<form class="p-3">
	<div class="form-group">
		<label class="">Extention Name</label>
		<select class="form-control ext-option" name="ext_name">
			<option>Select extention</option>
		</select>
	</div>
	
</form>

<div class="images-box">
	
</div>
</div>

@endsection


@section('custom-js')
<script src="lang/js/load-ext.js"></script>
<script>
	$(document).ready(function(){
		$(".ext-option").on("input", function(){
			var ext_id = $(this).val();
			$.ajax({
				type : 'get',
				url : 'api/background-image/'+ext_id,
				beforeSend : function(){
					$(".images-box").html("");
				},
				success : function(response){
					var data = response.data;
					var i;
					for(i=0;i<data.length;i++)
					{
						 var pic = "<div class='shadow-lg text-center w-100 mb-5'><img src='storage/"+data[i].image_path+"'  width='100%' ><br><br><i class='fa fa-trash fa-2x text-center hover text-danger delete-bg-btn' id='"+data[i].id+"' pic_name='"+data[i].image_path+"'></i><br><br></div>";
						 $(".images-box").append(pic);
					}
					// start delete code
					$(".delete-bg-btn").each(function(){
						$(this).click(function(){
							var delete_bg_btn = this;
							var img_id = $(this).attr('id');
							var name = $(this).attr('pic_name');
							var item = this.parentElement;
							$.ajax({
								type : 'delete',
								url : 'api/background-image/'+img_id,
								data : {
										_token : $("body").attr('token'),
									},
								beforeSend : function()
								{
									$(delete_bg_btn).html('Deleting...');
									$(delete_bg_btn).attr("disabled", true);
								},
								success : function(response)
								{
									
									$(item).remove();
									console.log(response);
								},
								error : function(response){
									$(delete_bg_btn).attr("disabled", false);
									alert("something went wrong");
									
								}
							});
						});
					});
				},
				error : function(response)
				{
					console.log(response);
				}
			});
		});


		

	});

</script>

@endsection