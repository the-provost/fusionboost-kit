<template>
    <div class="content-wrapper pl-3 pr-3 pb-3 pt-3 mb-2" style="height: inherit; width: inherit; min-height: 345px;">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Set up OAuth2.0</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">{{ $route.meta.title }}</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="col-md-12 center center-block" align="center">
          <div class="row">
            <div class="col-md-11">
              <passport-clients></passport-clients>
            </div>
            <br>
            <div class="col-md-11">
              <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
            <br>
            <div class="col-md-11">
              <passport-authorized-clients></passport-authorized-clients>
            </div>
          </div>
        </div>
      </section>
    </div>
  </template>
  
  <script>
import PersonalAccessTokens from '../passport/PersonalAccessTokens.vue';

  </script>
  
  <style scoped>
  .action-link {
    cursor: pointer;
  }
  </style>
  