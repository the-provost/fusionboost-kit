<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>AdminLTE 3 | Registration Page</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
	</head>


<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="Enter First Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Enter Last Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter Phone Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Retype Your Password" type="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="agreeTerms" name="terms" type="checkbox" value="agree"> <label for="agreeTerms">I agree to the <a href="{{ route('terms') }}">terms</a></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Sign Up') }}</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
                <p>- OR -</p><a class="btn btn-block btn-primary" href="#"><i class="fab fa-facebook mr-2"></i> Sign up using Facebook</a> <a class="btn btn-block btn-danger" href="#"><i class="fab fa-google-plus mr-2"></i> Sign up using Google+</a>
            </div>
            <a class="text-center" href="{{ route('login') }}">I already have a membership</a>
            <br><br>
            <a href="{{ route('terms') }}" style="text-decoration: none !important;">Terms of use &nbsp; | &nbsp;</a>
            <a href="{{ route('terms') }}" style="text-decoration: none !important;">Privacy policy</a>
        </div>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/9d179d39b9.js" crossorigin="anonymous"></script>


</html>
 -->
