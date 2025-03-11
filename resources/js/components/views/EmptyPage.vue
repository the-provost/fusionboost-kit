<template>
    <div class="content-wrapper" style="height: 100% !important;">
      <!-- Content Header -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ pageTitle }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link to="/home">Home</router-link>
                </li>
                <li class="breadcrumb-item active">{{ pageTitle }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="content" style="height: 100% !important;">
        <div class="container-fluid">
          <!-- Page Actions -->
          <div class="row mb-3">
            <div class="col-md-12">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-primary"
                  @click="openModal">
                  <i class="fas fa-plus mr-1"></i> Add New
                </button>
              </div>
            </div>
          </div>

          <!-- Main Content Area -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Content Title</h3>
                  <div class="card-tools">
                    <!-- Add card tools/buttons here -->
                  </div>
                </div>
                <div class="card-body">
                  <!-- Main content goes here -->
                  <p>Your content here</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Using BaseModalComponent -->
      <base-modal-component
        ref="modalRef"
        modal-id="mainModal"
        :title="modalTitle"
        :loading="loading"
        @confirm="handleSubmit"
        @close="handleClose">
        <form @submit.prevent="handleSubmit">
          <div class="mb-3">
            <label for="exampleInput" class="form-label">Example Input</label>
            <input type="text" class="form-control" id="exampleInput">
          </div>
        </form>
      </base-modal-component>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { useRoute } from 'vue-router';
  import { useDarkMode } from '../../darkModePlugin';

  const route = useRoute();
  const darkMode = useDarkMode();
  const modalRef = ref(null);
  const pageTitle = ref(route.meta.title || 'Page Title');
  const modalTitle = ref('Add New Item');
  const loading = ref(false);

  const openModal = () => {
    if (modalRef.value) {
      modalRef.value.show();
    }
  };

  const handleClose = () => {
    console.log('Modal closed');
  };

  const handleSubmit = async () => {
    try {
      loading.value = true;
      await new Promise(resolve => setTimeout(resolve, 1000));
      modalRef.value.close();
    } catch (error) {
      console.error('Error:', error);
    } finally {
      loading.value = false;
    }
  };
  </script>

  <style scoped>
  .content-wrapper {
    background-color: #f4f6f9;
    color: #1f2d3d;
  }

  .dark-mode .content-wrapper {
    background-color: #343a40;
    color: #fff;
  }

  .card {
    background-color: #ffffff;
    color: #1f2d3d;
  }

  .dark-mode .card {
    background-color: #454d55;
    color: #fff;
  }

  .dark-mode .card-header {
    background-color: rgba(0, 0, 0, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .breadcrumb-item a {
    color: #007bff;
  }

  .dark-mode .breadcrumb-item a {
    color: #fff;
  }

  .dark-mode .breadcrumb-item.active {
    color: rgba(255, 255, 255, 0.8);
  }
  </style>
