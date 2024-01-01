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
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="brand-wrapper">
                        <img src="{{ asset('images/logo/logo_only_small.png') }}" alt="logo" class="logo">
                        &nbsp;
                        <!-- <img src="{{ asset('images/logo/textlogo_full.png') }}" alt="logo" class="logo"> -->
                        <h3>Nordis</h3>
                        </div>
                        <p class="login-card-description">
                        {{ __('Before proceeding, please check your email for a verification link. You will recieve a verification email within the next 10 minutes.') }}
                        {{ __('If you do not receive the email') }},    
                        A verification link has been sent to the email address you entered. Please check your mail and click on the link in the mail to complete your verification process</p>
                        @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status')}}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                           
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="{{ __('click here to request another') }}">
                        </form>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
