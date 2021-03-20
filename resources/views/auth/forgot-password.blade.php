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
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <h1>{{ $error }}</h1>
                        @endforeach
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="card-body">
                        <div class="brand-wrapper">
                        <img src="{{ asset('images/logo/logo_only_small.png') }}" alt="logo" class="logo">
                        &nbsp;
                        <!-- <img src="{{ asset('images/logo/textlogo_full.png') }}" alt="logo" class="logo"> -->
                        <h3>Nordis</h3>
                        </div>
                        <p class="login-card-description">Reset Password</p>
                        @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status')}}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="reset" id="reset" class="btn btn-block login-btn mb-4" type="submit" value="RESET">
                        </form>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a><br>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
