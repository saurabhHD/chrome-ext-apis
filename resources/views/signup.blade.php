@extends('default')

@section('title')

Admin SignUp 
@endsection()


@section('content')

	<div class="container p-3">
		<div class="row shadow-lg rounded-lg" style="border-left:5px solid #7D97F4;margin-top: 20px;">
			<div class="col-md-6">
				<img src="images/login-logo.jpg" width="480">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 p-4">
				<h3 class="text-center mt-4 mb-3" style="color: #7D97F4">Admin Signup !</h3>
				<form class="signup-form" method="post" action="user/signup">
					@csrf
					<div class="form-group" style="margin-top: 70px;">
						<input type="text" name="name" class="form-control  rounded-lg" placeholder="FULL NAME">
					</div>
					<div class="form-group mt-4">
						<input type="email" name="username" class="form-control  rounded-lg" placeholder="ENTER YOUR EMAIL">
					</div>
					<div class="form-group mt-4">
						<input type="password" name="password" class="form-control  rounded-lg password" placeholder="CREATE PASSWORD">
						<i class="fa fa-eye float-right text-dark hover show-password-btn" style="position: relative;top: -28px;right: 10px;"></i>
					</div>
					<div class="form-group mt-4">
						<input type="password" name="con-password" class="form-control  rounded-lg password" placeholder="CONFORM PASSWORD">
						<i class="fa fa-eye float-right hover text-dark show-password-btn" style="position: relative;top: -28px;right: 10px;"></i>
					</div>
					<div class="form-group mt-4">
						
						<button class="btn px-3 font-weight-bold my-btn signup-btn" type="submit" style="float: right">&nbsp;Signup !</button>
					</div>
				</form>
				<div style="clear:left;margin-top: 100px;">
					<p>If you have already an account please click here to <a href="/login" class="text-decoration-none"> Login !</a></p>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
@endsection

@section('custom-js')

<script>
	$(document).ready(function(){
		show_password();
		submit_form();
	});

	// show password

	function show_password(){
			$(".show-password-btn").each(function(){
				$(this).click(function(){
					$(".password").attr('type','text');
					$(".show-password-btn").removeClass('text-dark');
					$(".show-password-btn").addClass('text-danger');

					if($(".password").attr('type') == "text")
					{
						$(this).click(function()
							{
								$(".password").attr('type','password');
								$(".show-password-btn").removeClass('text-danger');
								$(".show-password-btn").addClass('text-dark');
								show_password();
							});
					}
					else
					{
						show_password();
					}
					
				});
			});


	}

	// end show password

	// regester user

	function submit_form()
	{
		$(".signup-form").on('submit', function(e){
			e.preventDefault();
			$.ajax({
				type : 'post',
				url : 'user/signup',
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				beforeSend : function()
				{
					$('.signup-btn').html('Processing...');
				},
				success : function(response)
				{
					$('.signup-btn').html('Signup');
					if(response.notice == "success")
					{
						window.location = '/dashboard';
					}
					else
					{
						alert(response.notice);
					}
					console.log(response);
				},
				error : function(error)
				{
					$('.signup-btn').html('Signup');
					alert("password and conform password must be same");
					console.log(error);
				}
			});
		});
	}

	// end regester user
</script>

@endsection