@extends('layouts.app')

@section('content')
<br>
<div class="container pt-500">
    <br>
        <div class="card login-card pt-100">
            <div class="row no-gutters">
                <div class="col-md-5">
                <img src="{{ asset('images/bg/1.png') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                        <img src="{{ asset('images/logo/logo_only_full.png') }}" alt="logo" class="logo">
                        &nbsp;
                        <!-- <img src="{{ asset('images/logo/textlogo_full.png') }}" alt="logo" class="logo"> -->
                        <!-- <span><h3>Nordis</h3></span> -->
                        </div>
                        <p class="login-card-description">Sign into your account</p>
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h3>{{ $error }}</h3>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="mobile" class="sr-only">Mobile</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                        </form>
                        <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use</a>|
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
