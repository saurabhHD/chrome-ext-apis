

$(document).ready(function(){
	$.ajax({
		type : 'get',
		url : '/api/extention/',
		data : {
			_token : $("body").attr('token')
		},
		beforeSend : function(){
			var loading_option = "<option class='loading-option'>Loading...</option>";
			$(".ext-option").append(loading_option);
		},
		success : function(response){
			$(".loading-option").remove();
			var data = response.data;
			var i;
			for(i=0;i<data.length;i++)
			{
				
				var opt = "<option class='ext-val' value='"+data[i].id+"'>"+data[i].ext_name+"</option>";
				$(".ext-option").append(opt);
			}
		},
		error : function(response){
			console.log(response);
		}
	});

	
	
});