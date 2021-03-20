<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Teamforce') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    

</head>
<body>
    <div id="app" class="app d-flex content-center min-vh-100 container"> <!-- flex-row align-items-center -->
        <div class="container">
            <div class="justify-content-center">
            	<h1 style="margin-top: 2%;">Terms & Conditions</h1>
            	<h4>Version: {{ $terms->id }}</h4>
            	<h5>Updated at: {{ $terms->created_at }}</h5> 
                {!! $terms->terms !!}
                <br>
                <br>
            	<a style="margin-bottom: 2%;" class="btn btn-secondary" href="{{'register'}}">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>