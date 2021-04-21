@extends('default')

@section('title')

Admin SignUp 
@endsection()


@section('content')

	<div class="container p-3">
		<div class="row shadow-lg rounded-lg" style="border-left:5px solid #7D97F4;margin-top: 70px;">
			<div class="col-md-6">
				<img src="images/login-logo.jpg" width="480">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 p-4">
				<h3 class="text-center mt-4 mb-3" style="color: #7D97F4">Admin Signup !</h3>
				<form class="" method="post" action="user/signup">
					@csrf
					<div class="form-group" style="margin-top: 70px;">
						<input type="text" name="username" class="form-control  rounded-lg" placeholder="Enter Email">
					</div>
					<div class="form-group mt-4">
						<input type="password" name="password" class="form-control  rounded-lg" placeholder="Create Password">
					</div>
					<div class="form-group mt-4">
						<input type="password" name="con-password" class="form-control  rounded-lg" placeholder="Conform Password">
					</div>
					<div class="form-group mt-4">
						
						<button class="btn px-3 font-weight-bold my-btn" type="submit" style="float: right">&nbsp;Signup !</button>
					</div>
				</form>
				<div style="clear:left;margin-top: 100px;">
					<p>If you have already an account please click here to <a href="/login" class="text-decoration-none"> Login !</a></p>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
@endsection()