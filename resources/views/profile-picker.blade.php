@extends('layouts.basic-navbar')

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
                        <p class="login-card-description">What profile would you like to log into?</p>
                        <!-- DashboardRendering -->
                        {{ Auth::user()->first_name }} 
                            @can('isAdmin')
                            <div class="btn btn-block login-btn blackbutton mb-4">
                                <a href="/home/admin" style="color: white !important; text-align:left !important;"><h5>System Administrator</h5></a>
                            </div>
                            @endcan
                            @can('isGreyManager')
                            <div class="btn btn-block blackbutton login-btn mb-4">
                                <a href="/home/greyman" style="color: white !important; text-align:left !important;"><h5>Greymore Manager</h5></a>
                            </div>
                            @endcan
                            @can('isAuctionManager')
                            <div class="btn btn-block blackbutton login-btn mb-4">
                                <a href="/home/auction-manager" style="color: white !important; text-align:left !important;"><h5>Auctioneer</h5></a>
                            </div>
                            @endcan
                            @can('isBuyer')
                            <div class="btn btn-block blackbutton login-btn mb-4">
                                <a href="/home/buyer" style="color: white !important; text-align:left !important;"><h5>Buyer</h5></a>
                            </div>
                            @endcan
                            @can('isSeller')
                            <div class="btn btn-block blackbutton login-btn mb-4">
                                <a href="/home/seller" style="color: white !important; text-align:left !important;"><h5>Seller</h5></a>
                            </div>
                            @endcan
                            
                        
                        <nav class="login-card-footer-nav">
                            <a href="#!">Terms of use.</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
            @auth
<script>
    window.user = @json(auth()->user()) ;
</script>
@endauth
        </div>
@endsection
