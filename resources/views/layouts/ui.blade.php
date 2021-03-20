<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  {{-- Favicon --}}
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/icons/favicon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/icons/favicon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icons/favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icons/favicon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/icons/favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/icons/favicon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icons/favicon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/icons/favicon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icons/favicon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/icons/favicon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/icons/favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href='assets/icons/favicon/manifest.json'>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('assets/icons/favicon/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  @if(Auth::user()->id != null)
		<meta name="user-id" content="{{ Auth::user()->id }}">
		<meta name="user-email" content="{{ Auth::user()->email }}">
		<meta name="user-fname" content="{{ Auth::user()->first_name }}">
		<meta name="user-lname" content="{{ Auth::user()->last_name }}">
		<meta name="user-phone" content="{{ Auth::user()->mobile }}">
	@endif

  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Nordis | HR Aggregation for businesses</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="user-id" content="{{ Auth::user()->id }}">
	<meta name="user-email" content="{{ Auth::user()->email }}">
	<meta name="user-fname" content="{{ Auth::user()->first_name }}">
	<meta name="user-lname" content="{{ Auth::user()->last_name }}">
	<meta name="user-phone" content="{{ Auth::user()->mobile }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css " rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" defer></script>
</head>

<body class="hold-transition layout-fixed layout-footer-fixed sidebar-mini layout-navbar-fixed accent-primary shadow-none border-none">
<!-- Site wrapper  layout-footer-fixed -->
<div class="wrapper" id="app">

    <!-- Navbar -->

    @if(isset(Auth::user()->id))
	@can('isGreyManager')
    @include('layouts.navbar.greyman')
    @endcan
    @can('isAdmin')
    @include('layouts.navbar.admin')
    @endcan
    @can('isUser')
    @include('layouts.navbar.user')
    @endcan
	@endif
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-teal elevation-4 shadow-none border-none"> {{-- sidebar-no-expand --}}
    <!-- Brand Logo -->
    <a href="/home" class="brand-link navbar-white">
      <img src="{{ asset('images/logo/logo_only_full.png') }}" alt="Nordis Logo" class="brand-image img-circle"
           style="opacity: 1">
      <span class="brand-text">
        <img src="{{ asset('images/logo/logo_nav.png') }}" alt="Nordis Logo" class="" style="opacity: 1">
      </span>
    </a>

<!-- Sidebar -->
@if(isset(Auth::user()->id))
	@can('isGreyManager')
    @include('layouts.sidebar.greyman')
    @endcan
    @can('isAdmin')
    @include('layouts.sidebar.admin')
    @endcan
    @can('isUser')
    @include('layouts.sidebar.user')
    @endcan
	@endif
  

   
<!-- /.sidebar -->

</aside>

  <!-- Content Wrapper. Contains page content -->

<vue-progress-bar></vue-progress-bar>

    <router-view>
            {{-- vue components here --}}
    </router-view>

<!-- /.content-wrapper -->

<footer class="main-footer shadow-none border-none accent-indigo">
  <!-- <img src="assets/icons/cardamomauction.png" alt="CardamomAuction.com Logo" class="brand-image img-circle" style="opacity: 1"> -->
<span>
  <!-- <img src="assets/icons/teamforce.png" alt="TeamForce Logo" class=""style="opacity: 1"> -->
  <strong>Nordis &nbsp;|&nbsp; Powered By <a href="http://www.greymore.tech"> Greymore Tech</a></strong>
</span>
    
<div class="float-right d-none d-sm-inline">
        Nordis
        </div>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
     {{-- achievements in control sidebar here --}}
     include( 'layouts.controlsidebar.controlsidebar' )
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@auth
<script>
    window.user = @json(auth()->user()) ;
</script>
@endauth


{{-- app.js  add all js there --}}
<script src="/js/app.js"></script>
<script src="https://kit.fontawesome.com/ad66c9c2be.js" crossorigin="anonymous"></script>
</body>

</html>
