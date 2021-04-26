@extends('default')

@section('title')

Admin Login !
@endsection

@section('content')
<div class="container p-3">
		<div class="row shadow-lg rounded-lg" style="border-left:5px solid #7D97F4;margin-top: 70px;">
			<div class="col-md-6">
				<img src="images/login-logo.jpg" width="480">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 p-4">
				<h3 class="text-center mt-4 mb-3" style="color: #7D97F4">Admin Login !</h3>
				<form class="" method='post' action="user/login">
					@csrf
					<div class="form-group" style="margin-top: 70px;">
						<input type="text" name="username" class="form-control  rounded-lg" placeholder="Username">
					</div>
					<div class="form-group mt-4">
						<input type="password" name="password" class="form-control  rounded-lg" placeholder="Password">
					</div>
					<div class="form-group mt-4">
						<p class="text-primary float-left"><a href="#" class="text-decoration-none">Forget password ?</a></p>
						<button class="btn text-light px-3 font-weight-bold my-btn" type="submit" style="float: right"><i class="fa fa-lock"></i> &nbsp;Login !</button>
					</div>
				</form>
				<div style="clear:left;margin-top: 100px;">
					<p>If you don't have an account please click here to <a href="/signup" class="text-decoration-none"> SingUp !</a></p>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

@endsection