<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | FusionBoost</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        :root {
            --red-primary: #b80000;
            --red-glow: #8B000033;
        }

        .login-page, .register-page {
            height: 100vh;
        }

        .login-box, .register-box {
            width: 400px;
        }

        .card {
            background-color: #222;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #333;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background-color: #444;
            border-color: var(--red-primary);
            box-shadow: 0 0 0 0.2rem rgba(184, 0, 0, 0.25);
        }

        .input-group-text {
            background-color: #444;
            border: none;
            color: #999;
        }

        .btn-primary {
            background-color: var(--red-primary);
            border-color: var(--red-primary);
        }

        .btn-primary:hover {
            background-color: #e81010;
            border-color: #e81010;
        }

        a {
            color: var(--red-primary);
        }

        a:hover {
            color: #e81010;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .icheck-primary > input:first-child:checked + label::before,
        .icheck-primary > input:first-child:checked + input[type="hidden"] + label::before {
            background-color: var(--red-primary);
            border-color: var(--red-primary);
        }

        .invalid-feedback {
            display: block;
        }

        @media (max-width: 768px) {
            .login-box, .register-box {
                width: 90%;
            }
        }
    </style>
</head>
<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <div class="logo-wrapper">
            <h1><b>Fusion</b>Boost</h1>
        </div>

        <div class="card">
            <div class="card-header text-center">
                <p>Welcome back! Please login to continue.</p>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                                name="password"
                                id="password"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="text-center mt-3">
                        <p class="mb-0">
                            Don't have an account?
                            <a href="{{ route('register') }}">Register</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
