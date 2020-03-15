<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>login Form</title>
		<link rel="stylesheet" href="{{ asset('/assets/login/fonts/fontawesom5.7/css/all.min.css')}}" >
		<link rel="stylesheet" href="{{ asset('/assets/login/fonts/simple-line-icons/style.css')}}" >
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/login/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/login/css/style.css')}}">
	</head>
	<body>
		<div id="particles-js">
			<div class="container ">
				<div class="row">
					<div class="col m-auto loginbox">
						<img src="{{asset('/assets/login/image/cpbit.png')}}" class="avatar">
						<form class="login-form" action="{{route('login.dashboard')}}" method="post">
							@csrf
							<div class="txtb">
								<input type="text" class="form-control form-control-pass" name="name">
								<span data-placeholder="Username"></span>
							</div>
							<div class="txtb">
								<!-- <input type="password"  name="password" id="password"> -->
								<div class="input-group" id="show_hide_password">
									<input class="form-control form-control-pass" type="password" name="password">
									<span data-placeholder="Password"></span>
									<div class="input-group-addon">
										<a ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
									</div>
								</div>
								
							</div>
							<!-- <div class="form-group">
									<select  name="">
											<option value="">Select One</option>
											<option value="">Admin</option>
											<option value="">User</option>
									</select>
							</div> -->
							
							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn">
									Login
									</button>
								</div>
							</div>
						</form>
						<p class="text-center mt-5 text-light">Already Have an Account? <a class="text-warning" href="" >Sign Up</a></p>
						
					</div>
				</div>
			</div>
			</div>
			
			<script type="text/javascript" src="{{ asset('/assets/login/js/jquery.js')}}"></script>
			<script type="text/javascript" src="{{asset('/assets/login/js/bootstrap.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('/assets/login/js/particles.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('/assets/login/js/custom.js')}}"></script>
			<script type="text/javascript" src="{{asset('/assets/login/js/index.js')}}"></script>
			<script type="text/javascript">
				// start image preview
				var loadFile = function(event) {
				var reader = new FileReader();
				reader.onload = function(){
				var output = document.getElementById('output');
				output.src = reader.result;
				};
				reader.readAsDataURL(event.target.files[0]);
				};
				// end image load
			$(document).ready(function() {
					$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_password input').attr("type") == "text"){
			$('#show_hide_password input').attr('type', 'password');
			$('#show_hide_password i').addClass( "fa-eye-slash" );
			$('#show_hide_password i').removeClass( "fa-eye" );
			}else if($('#show_hide_password input').attr("type") == "password"){
			$('#show_hide_password input').attr('type', 'text');
			$('#show_hide_password i').removeClass( "fa-eye-slash" );
			$('#show_hide_password i').addClass( "fa-eye" );
			}
			});
			});
			</script>
		</body>
	</html>