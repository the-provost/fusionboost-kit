<template>
    <div class="content-wrapper">
      <!-- Content Header -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">OAuth2.0 Management</h1>
              <small class="text-muted">Manage your API clients and tokens</small>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link to="/home">Home</router-link>
                </li>
                <li class="breadcrumb-item active">{{ route.meta.title }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="content">
        <div class="container-fluid">
          <!-- OAuth Clients Section -->
          <div class="row mb-4">
            <div class="col-12">

                  <passport-clients></passport-clients>

            </div>
          </div>

          <!-- Personal Access Tokens Section -->
          <div class="row mb-4">
            <div class="col-12">

                  <passport-personal-access-tokens></passport-personal-access-tokens>

            </div>
          </div>

          <!-- Authorized Clients Section -->
          <div class="row">
            <div class="col-12">

                  <passport-authorized-clients></passport-authorized-clients>

            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { useRoute } from 'vue-router';
  import { onMounted } from 'vue';

  // Components are registered globally in app.js
  // import PersonalAccessTokens from '../passport/PersonalAccessTokens.vue';
  // import PassportClients from '../passport/PassportClients.vue';
  // import PassportAuthorizedClients from '../passport/PassportAuthorizedClients.vue';

  const route = useRoute();

  onMounted(() => {
    document.title = 'OAuth Management - ' + import.meta.env.VITE_APP_NAME;
  });
  </script>

  <style scoped>
  .content-wrapper {
    min-height: calc(100vh - 114px);
    padding: 1rem;
  }

  .card {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    margin-bottom: 1rem;
  }

  .card-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
    background-color: rgba(0,0,0,.03);
  }

  .card-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 400;
  }

  .action-link {
    cursor: pointer;
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
  }

  .action-link:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  .text-muted {
    font-size: 0.875rem;
  }

  /* Loading state styles */
  .loading {
    opacity: 0.7;
    pointer-events: none;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .card-body {
      padding: 1rem;
    }

    .content-wrapper {
      padding: 0.5rem;
    }
  }
  </style>
