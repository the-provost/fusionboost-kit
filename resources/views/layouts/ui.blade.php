<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>MonolithSPA | Greymore Tech</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body id="body" class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed shadow-none layout-footer-fixed">
<div class="wrapper" id="app">
  

  <!-- Navbar -->
  @include( 'layouts.navbar' )
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar shadow-none sidebar-dark-primary elevation-4 border-none border-bottom-0">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link text-black navbar-white logo shadow-none border-none">
      {{-- <img src="images/icons/greymorelogo.png" alt="Small Logo Logo" class="brand-image img-circle" style="opacity: 100"> --}}
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Monolith</b>SPA Scaffold</span>
   
      {{-- <span class="brand-text font-weight-light"><img src="images/icons/greypass_small.png" alt="Oraganization Text Logo" class="brand-image"
        style="opacity: 1"></span> --}}
    </a>

    <!-- Sidebar -->
    @include( 'layouts.sidebar' )
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<vue-progress-bar></vue-progress-bar>

<router-view>
        {{-- vue components here --}}
</router-view>
  <!-- /.content-wrapper -->


@auth
<script>
    window.user = @json(auth()->user()) ;
</script>
@endauth


  <!-- Main Footer -->
  <footer class="main-footer shadow-none border-none border-top-0 accent-navy">
  <img src="images/icons/greymorelogosmall.png" alt="Greymore Logo" class="brand-image img-circle"
  style="opacity: 1">
{{-- <span><img src="images/icons/greypass_small.png" alt="Greypass Logo" class="brand-image"style="opacity: 1"></span> --}}
    <strong>&nbsp|&nbsp By <a href="http://www.greymore.tech" target="_blank"> Greymore Tech</a></strong>
<div class="float-right d-none d-sm-inline">
        Vestibulum. Accommodare. Vincere.
        </div>
</footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    @include( 'layouts.controlsidebar' )
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{-- app.js  add all js there --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://kit.fontawesome.com/ad66c9c2be.js" crossorigin="anonymous"></script>
<script>

function onClickToggleDark() {
  var element, name, arr;
  element = document.getElementById("body");
  name = "dark-mode";
  arr = element.className.split(" ");
  if (arr.indexOf(name) == -1) {
    element.className += " " + name;
  }
} 

function onClickToggleWhite() {
  var element = document.getElementById("body");
  element.className = element.className.replace(/\bdark-mode\b/g, "");
}
</script>
</body>
</html>
