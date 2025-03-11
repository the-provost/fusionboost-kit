@extends('layouts.app')

@section('content')
<div class="hold-transition login-page dark-mode">
    <div class="login-box">
        <div class="logo-wrapper text-center">
            <h1><b>Fusion</b>Boost</h1>
        </div>

        <div class="card">
            <div class="card-header text-center">
                <p>{{ __('Confirm Password') }}</p>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <p class="text-center mb-3">{{ __('Please confirm your password before continuing.') }}</p>

                <form method="POST" action="{{ route('user/confirm-password') }}">
                    @csrf

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

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-1">
                        <a href="#!">Forgot password?</a>
                    </p>
                    <p class="mb-0">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                </div>

                <div class="text-center mt-4 small">
                    <a href="#!">Terms of use</a> &nbsp;|&nbsp;
                    <a href="#!">Privacy policy</a>
                </div>
            </div>
        </div>
    </div>
</div>

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

    .invalid-feedback {
        display: block;
    }

    .small {
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .login-box, .register-box {
            width: 90%;
        }
    }
</style>
@endsection
