<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>FusionBoost | Laravel+Vue Scaffold</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  @vite(['resources/js/app.js'])
 

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="dark-mode layout-navbar-fixed sidebar-collapse footer-fixed layout-fixed sidebar-mini-xs sidebar-mini-md sidebar-mini accent-primary text-sm layout-footer-fixed footer-fixed" style="height: auto;">
<div class="wrapper" id="app">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
  

  <!-- Navbar -->
  <!-- @include( 'layouts.navbar' ) -->
  <!-- /.navbar -->

 

    <!-- Sidebar -->
    <!-- @include( 'layouts.sidebar' ) -->
    <!-- /.sidebar -->
  
  
  <!-- Content Wrapper. Contains page content -->
 
  <app-component></app-component>
  </div>
  
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer shadow-none border-none border-top-0 accent-navy">
  <img src="images/icons/greymorelogosmall.png" alt="Greymore Logo" class="brand-image img-circle"
  style="opacity: 1">
{{-- <span><img src="images/icons/greypass_small.png" alt="Greypass Logo" class="brand-image"style="opacity: 1"></span> --}}
    <strong>&nbsp|&nbsp By <a href="http://www.greymore.tech" target="_blank"> Company Name here</a></strong>
<div class="float-right d-none d-sm-inline">
        Company Tagline here.
        </div>
</footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    @include( 'layouts.controlsidebar' )
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@auth
<script>
    window.user = @json(auth()->user()) ;
</script>
@endauth

{{-- app.js  add all js there --}}
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

<script src="https://kit.fontawesome.com/ad66c9c2be.js" crossorigin="anonymous"></script>
<script>


</script>
</body>
</html>
