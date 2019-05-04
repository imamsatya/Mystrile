<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
	<title>Mystrile</title>
	<link rel="shortcut icon" href="{{ asset('MystrileV1_1.png') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preload" as="image" href="MystrileV1_1.png" width="40px" height="40px" alt="" srcset="">
<!--===============================================================================================-->	
	{{-- <link rel="icon" type="image/png" href="{{asset('Login_v2/images/icons/favicon.ico')}}"/> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v2/css/main.css')}}">
<!--===============================================================================================-->

<style>
		#a {
			width: 100wh;
			height: 90vh;
			color: #fff;
			background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
			background-size: 400% 400%;
			-webkit-animation: Gradient 15s ease infinite;
			-moz-animation: Gradient 15s ease infinite;
			animation: Gradient 15s ease infinite;
		}
		
		@-webkit-keyframes Gradient {
			0% {
				background-position: 0% 50%
			}
			50% {
				background-position: 100% 50%
			}
			100% {
				background-position: 0% 50%
			}
		}
		
		@-moz-keyframes Gradient {
			0% {
				background-position: 0% 50%
			}
			50% {
				background-position: 100% 50%
			}
			100% {
				background-position: 0% 50%
			}
		}
		
		@keyframes Gradient {
			0% {
				background-position: 0% 50%
			}
			50% {
				background-position: 100% 50%
			}
			100% {
				background-position: 0% 50%
			}
		}
		
		h1,
		h6 {
			font-family: 'Open Sans';
			font-weight: 300;
			text-align: center;
			position: absolute;
			top: 45%;
			right: 0;
			left: 0;
		}
</style>
		
</head>
<body>
	{{-- <div id="a"> --}}
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" method="POST" action="{{route('login.post')}}">
						{{ csrf_field() }}
						<span class="login100-form-title p-b-26" style="color:#D81B60;">
							 {{-- {{config('app.name')}} --}}
							 Mystrile
						</span>
						<span class="login100-form-title p-b-48">
							<img src="{{ asset('MystrileV1_1.png') }}" alt="" sizes="" srcset="" width="100px" height="100px">
							
						</span>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
							<input class="input100" type="text" name="email">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="pass">
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									Login
								</button>
							</div>
						</div>

					
					</form>
				</div>
			</div>
		</div>
	
		
		<div id="dropDownSelect1"></div>
		<footer-c></footer-c>
	{{-- </div> --}}
	
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('Login_v2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('Login_v2/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v2/js/main.js')}}"></script>

</body>



</html>