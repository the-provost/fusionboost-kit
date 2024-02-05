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
<body class="sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed sidebar-mini-md sidebar-mini-xs layout-footer-fixed text-sm" id="app" style="height: auto;">
  
  
  
  <!-- Vue App-->
 
  <app-component></app-component>
  

<!-- ./Vue App -->

<!-- REQUIRED SCRIPTS -->

@auth
<script>
    window.user = @json(auth()->user()) ;
</script>
@endauth

<!-- app.js  add all js there -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

<script src="https://kit.fontawesome.com/ad66c9c2be.js" crossorigin="anonymous"></script>
<script>


</script>
</body>
</html>
