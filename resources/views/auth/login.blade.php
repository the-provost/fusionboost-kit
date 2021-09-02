<!doctype html>
<html lang="en">
  <head>
  	<title>Authentication | Login Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('portal/css/style.css') }}" >

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					{{-- <h2 class="heading-section">Login</h2> --}}
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to MonolithSPA</h2>
								<p>Don't have an account?</p>
								<a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="{{ route('login') }}" Method="POST" class="signin-form">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              <span class="focus-input100"></span>
							{{-- <span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span> --}}
							@if ($errors->has('email'))
								<br>
								<span class="invalid-feedback " role="alert">
								<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
                        <input class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        {{-- <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span> --}}
                        @if ($errors->has('password'))
                            <br>
                            <span class="invalid-feedback" role="alert">                                        
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Sign In') }}</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									  <span class="checkmark"></span>
										</label>
									</div>
                                    @if (Route::has('password.request'))
									<div class="w-50 text-md-right">
										<a href="{{ route('password.request') }}">Forgot Password?</a>
									</div>
                                    @endif
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	
    <script src="{{ URL::asset('portal/js/jquery.min.js') }}"></script> 
    <script src="{{ URL::asset('portal/js/popper.js') }}"></script>
	<script src="{{ URL::asset('portal/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('portal/js/main.js') }}"></script>


	</body>
</html>

