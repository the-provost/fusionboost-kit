<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Authentication | Login Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])

	</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            @if ($errors->has('email'))
                                <br>
                                <span class="invalid-feedback " role="alert">
								<strong>{{ $errors->first('email') }}</strong>
								</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            @if ($errors->has('password'))
                                <br>
                                <span class="invalid-feedback " role="alert">
								<strong>{{ $errors->first('password') }}</strong>
								</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary {{ old('remember') ? 'checked' : '' }}">
                            <input id="remember" type="checkbox"> <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Sign In') }}</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p><a class="btn btn-block btn-primary" href="#"><i class="fab fa-facebook mr-2"></i> Sign in using Facebook</a> <a class="btn btn-block btn-danger" href="#"><i class="fab fa-google-plus mr-2"></i> Sign in using Google+</a>
            </div>
            @if (Route::has('password.request'))
                <p class="mb-1"><a href="{{ route('password.request') }}">I forgot my password</a></p>
            @endif
            <p class="mb-0"><a class="text-center" href="{{ route('register') }}">Register a new membership</a></p>
            <br><br>
            <a href="{{ route('terms') }}" style="text-decoration: none !important;">Terms of use &nbsp; | &nbsp;</a>
            <a href="{{ route('terms') }}" style="text-decoration: none !important;">Privacy policy</a>
        </div>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/9d179d39b9.js" crossorigin="anonymous"></script>
</html>

