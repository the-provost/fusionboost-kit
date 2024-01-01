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
				<div class="col-md-6 text-center mb-2 mt-2">
					{{-- <h2 class="heading-section">Login</h2> --}}
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Register</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="{{ route('register') }}" method="POST" class="signin-form">
                                @csrf
			      		<div class="form-group mb-3">

                            <label class="label" for="first_name">First Name</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="Enter First Name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="last_name">Last Name</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Enter Last Name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		            </div>

                    <div class="form-group mb-3">
		            	<label class="label" for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		            </div>


                    <div class="form-group mb-3">
		            	<label class="label" for="phone">Phone</label>
                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		            </div>

                    <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		            </div>

                    <div class="form-group mb-3">
		            	<label class="label" for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
		            </div>


		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Sign Up') }}</button>
		            </div>
		            <br>
                    <a href="{{ route('terms') }}">Terms of use &nbsp; | &nbsp;</a>
                        <a href="{{ route('terms') }}">Privacy policy</a>
		          </form>
		        </div>

                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-first">
                    <div class="text w-100">
                        <h2>Hello there!</h2>
                        <p>Already have an account?</p>
                        <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Sign In</a>
                        <br>
                        
                    </div>
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

