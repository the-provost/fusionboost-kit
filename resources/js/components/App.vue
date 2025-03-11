<template>
    <div
      class="wrapper" style="height: 100% !important;">
      <!-- Preloader -->
      <div
        class="preloader flex-column justify-content-center align-items-center">
        <img
          class="animation__shake"
          :src="logoImage"
          alt="App Logo"
          height="60"
          width="60">
      </div>

       <!-- <vue-progress-bar></vue-progress-bar> -->
    <!-- sidebar -->
    <sidebar-component></sidebar-component>
    <!-- /.sidebar -->
    <!-- navbar -->
    <navbar-component></navbar-component>
    <!-- /.navbar -->
    <!-- control-sidebar -->
    <control-sidebar-component></control-sidebar-component>
  <!-- /.control-sidebar -->
<router-view>
</router-view>
<!-- footer -->
<footer-component></footer-component>
    <!-- /.footer -->
    </div>
  </template>

  <script setup>
  import { ref, onMounted, onBeforeUnmount, provide } from 'vue';
  import { useRouter } from 'vue-router';
  import { useToast } from 'vue-toastification';
  import { useDarkMode } from '../darkModePlugin';
  import logoImage from '../assets/greydesk-logo.png';

  // Components are imported and registered in main.js
  // import AsideComponent from './components/Aside.vue';
  // import NavbarComponent from './components/Navbar.vue';
  // import FooterComponent from './components/Footer.vue';
  // import ControlSidebarComponent from './components/ControlSidebar.vue';

  // State
  const isLoading = ref(true);
  const isDarkMode = useDarkMode();
  const sidebar = ref(null);

  // Router
  const router = useRouter();

  // Methods
  const toggleSidebar = () => {
    if (sidebar.value) {
      sidebar.value.toggle();
    }
  };

  const initializeApp = async () => {
    try {
      // Add any initialization logic here
      await checkAuth();
      await loadUserPreferences();
    } catch (error) {
      console.error('App initialization error:', error);
    } finally {
      isLoading.value = false;
    }
  };

  const checkAuth = async () => {
    // Add your authentication check logic here
  };

  const loadUserPreferences = async () => {
    // Load user preferences, theme settings, etc.
  };

  // Route guard
  router.beforeEach((to, from, next) => {
    isLoading.value = true;
    next();
  });

  router.afterEach(() => {
    isLoading.value = false;
  });

  // Provide app-wide properties
  provide('isDarkMode', isDarkMode);
  provide('toggleSidebar', toggleSidebar);

  // Lifecycle hooks
  onMounted(() => {
    initializeApp();

    // Handle browser back button
    window.addEventListener('popstate', handlePopState);
  });

  onBeforeUnmount(() => {
    window.removeEventListener('popstate', handlePopState);
  });

  const handlePopState = () => {
    // Handle browser navigation
  };
  </script>
