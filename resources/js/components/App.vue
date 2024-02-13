<template>
    <div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" :src=loaderImagePath alt="AdminLTELogo" height="60" width="60">
</div>
    <!-- <vue-progress-bar></vue-progress-bar> -->
    <!-- sidebar -->
    <sidebar-component></sidebar-component>
    <!-- /.sidebar -->
    <!-- navbar -->
    <navbar-component></navbar-component>
    <!-- /.navbar -->
    <!-- footer -->
    <footer-component></footer-component>
    <!-- /.footer -->
    <!-- control-sidebar -->
    <control-sidebar-component></control-sidebar-component>
  <!-- /.control-sidebar -->
<router-view>
</router-view>
</div>
<!-- /.content-wrapper -->
</template>
<script setup>
const loaderImagePath = '../../public/images/AdminLTELogo.png';
</script>
<style lang="scss" scoped></style>