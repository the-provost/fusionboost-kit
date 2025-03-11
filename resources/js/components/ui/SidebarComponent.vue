<template>
    <aside :class="sidebarClasses">
      <!-- Brand Logo -->
      <router-link
        to="/home"
        class="brand-link text-black navbar-white navbar-light logo shadow-none border-bottom-0 text-sm d-flex align-items-center"
      >
        <img
          :src="logoImage"
          alt="Logo"
          class="brand-image"
          :style="brandImageStyle"
        >
        <img
          :src="currentWordmark"
          alt="Logo"
          class="brand-text"
          :style="brandTextStyle"
        >
      </router-link>

      <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              :src="userAvatar"
              class="img-circle elevation-2"
              alt="User Image"
              @error="handleAvatarError"
            >
          </div>
          <div class="info">
            <router-link to="/profile" class="d-block">{{ userName }}</router-link>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-flat nav-child-indent nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <sidebar-menu-item
              v-for="(item, index) in menuItems"
              :key="`menu-item-${index}`"
              :item="item"
              :active-route="route.path"
              @click="handleItemClick"
            />
          </ul>
        </nav>
      </div>
    </aside>
  </template>

  <script setup>
  import { computed, ref, onMounted } from 'vue';
  import { useRoute } from 'vue-router';
  import { useDarkMode } from '../../darkModePlugin';
  import logoImage from '../../assets/greydesk-logo.png';
  import wordmarkBlack from '../../assets/greydesk-wordmark-black.png';
  import wordmarkWhite from '../../assets/greydesk-wordmark-black.png'; // Fixed the import
  import userDefaultAvatar from '../../assets/avatars/svg/001-man.svg';
  import { getUserMenu } from '../../config/menu';
  import SidebarMenuItem from './SidebarMenuItem.vue';

  const route = useRoute();
  const darkMode = useDarkMode();

  // Constants for styles
  const brandImageStyle = {
    maxHeight: '33px',
    maxWidth: '33px',
    opacity: '1'
  };

  const brandTextStyle = {
    maxHeight: '30px',
    paddingLeft: '10%'
  };

  // User data handling
  const user = computed(() => window.user || {
    user_type: 'default',
    first_name: 'John',
    last_name: 'Doe',
    avatar: null
  });

  const userName = computed(() => {
    if (user.value.first_name && user.value.last_name) {
      return `${user.value.first_name} ${user.value.last_name}`;
    }
    return user.value.first_name || 'John Doe';
  });

  const userAvatar = ref(user.value.avatar || userDefaultAvatar);

  // Handle avatar load error
  const handleAvatarError = () => {
    userAvatar.value = userDefaultAvatar;
  };

  // Menu and theme computeds
  const menuItems = computed(() => getUserMenu(user.value.user_type));

  const currentWordmark = computed(() =>
    darkMode.value ? wordmarkWhite : wordmarkBlack
  );

  const sidebarClasses = computed(() => ({
    'main-sidebar': true,
    'shadow-none': true,
    'sidebar-dark-primary': darkMode.value,
    'sidebar-light-primary': !darkMode.value,
    'elevation-4': true,
    'border-none': true,
    'border-bottom-0': true,
  }));

  // Event handlers
  const handleItemClick = (item) => {
    console.log('Menu item clicked:', item.title);
    // Add your click handling logic here
  };

  // Lifecycle hooks
  onMounted(() => {
    // Any initialization logic can go here
  });
  </script>

  <style scoped>
  .brand-link {
    height: 46.9px !important;
    padding: 0.8125rem 0.5rem !important;
    display: flex;
    align-items: center;
  }

  .brand-text {
    transition: margin-left .3s linear, opacity .3s linear, visibility .3s linear;
  }

  [class*='sidebar-collapse'] .brand-text {
    margin-left: -10px !important;
    opacity: 0;
    visibility: hidden;
  }

  .nav-sidebar .nav-item > .nav-link {
    margin-bottom: .2rem;
  }

  /* Active state styles */
  .nav-sidebar .nav-link.active {
    background-color: rgba(0, 0, 0, 0.9) !important;
    color: #fff !important;
  }

  /* Hover state styles */
  .nav-sidebar .nav-link:hover:not(.active) {
    background-color: #8B0000 !important;
    color: #fff !important;
  }

  /* Nested menu items */
  .nav-treeview > .nav-item > .nav-link.active {
    background-color: rgba(0, 0, 0, 0.7) !important;
  }

  .nav-treeview > .nav-item > .nav-link:hover:not(.active) {
    background-color: rgba(139, 0, 0, 0.8) !important;
    color: #fff !important;
  }

  /* Dark mode specific styles */
  :deep(.dark-mode) {
    .nav-sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.1) !important;
    }

    .nav-sidebar .nav-link:hover:not(.active) {
      background-color: rgba(139, 0, 0, 0.9) !important;
    }
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .brand-link {
      padding: 0.5rem !important;
    }

    .brand-text {
      font-size: 0.9rem;
    }
  }
  </style>
