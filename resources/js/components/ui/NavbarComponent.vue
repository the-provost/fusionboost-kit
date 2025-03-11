<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 text-sm">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true">
            <b>Access Portal</b>
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pr-3">
      <!-- Notifications Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" @click="toggleNotifications">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge" v-if="unreadNotifications">{{ unreadNotifications }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
             :class="{ 'show': notificationsOpen }"
             style="left: inherit; right: 0px;">
          <span class="dropdown-item">{{ totalNotifications }} Notifications</span>
          <div class="dropdown-divider"></div>

          <!-- Notification Items -->
          <template v-if="notifications.length">
  <a v-for="(notification, index) in notifications"
     :key="index"
     href="#"
     class="dropdown-item">
    <span class="notification-content">
      <i :class="notification.icon"></i>
      {{ notification.message }}
    </span>
    <span class="text-muted text-sm">{{ notification.timeAgo }}</span>
  </a>
  <div class="dropdown-divider"></div>
</template>

          <template v-else>
            <a href="#" class="dropdown-item">
              <i class="fas fa-info-circle mr-2"></i> No new notifications
            </a>
            <div class="dropdown-divider"></div>
          </template>

          <a href="#" class="dropdown-item">See All Notifications</a>
        </div>
      </li>

      <!-- Fullscreen Button -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" @click.prevent="toggleFullScreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

        <!-- Login and Register Links -->
        <li class="nav-item" v-if="!isLoggedIn">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item" v-if="!isLoggedIn && canRegister">
          <a class="nav-link" href="/register">Register</a>
        </li>

        <!-- User Dropdown -->
        <li class="nav-item dropdown" v-if="isLoggedIn">
            <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle btn bg-gray"
            href="#"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            @click="toggleDropdown"
            data-toggle="dropdown">
            <i class="fas fa-user-tie mr-1"></i>{{ user.first_name }}<span class="caret"></span>
          </a>
          <div
            class="dropdown-menu dropdown-menu-end"
            :class="{ 'show': dropdownOpen }"
            aria-labelledby="navbarDropdown"
            style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: auto; right: 0px;">
            <a class="dropdown-item" @click.prevent="toggleDarkMode">
              <i class="fas fa-adjust"> </i> Switch Display Mode
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" @click="logout">
              <i class="fas fa-sign-out-alt"> </i> Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
  </template>

  <script>
  import { computed, ref, onMounted } from 'vue';
  import { useRouter } from 'vue-router';
  import { toggleDarkMode } from '../../darkModePlugin';
  import axios from 'axios';

  // Set CSRF token
  axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  export default {
    name: 'Navbar',

    data() {
      return {
        user: window.user || { first_name: '' },
        canRegister: true,
        dropdownOpen: false,
        notificationsOpen: false,
        notifications: [
            {
            icon: 'fas fa-users mr-2',
            message: 'New user registered',
            timeAgo: '3 mins'
            },
            {
            icon: 'fas fa-exclamation-triangle mr-2',
             message: 'System alert',
            timeAgo: '12 hours'
            }
        ],
        isFullScreen: false
    };
  },



    computed: {
      isLoggedIn() {
        return this.user.first_name !== '';
      },
      unreadNotifications() {
        return this.notifications.length;
      },
      totalNotifications() {
        return this.notifications.length;
      }
    },

    methods: {
      async logout() {
        try {
          await axios.post('/logout');
          window.location.href = '/login';
        } catch (error) {
          console.error('Logout failed:', error);
        }
      },

      toggleDropdown() {
        this.dropdownOpen = !this.dropdownOpen;
      },

      toggleDarkMode() {
        toggleDarkMode();
      },

      handleGlobalClick(event) {
    // Get the notification dropdown and button elements.
    const notificationDropdown = this.$el.querySelector('.dropdown-menu-lg');
    const notificationButton = this.$el.querySelector('.nav-link[data-toggle="dropdown"]');
    const userDropdown = this.$el.querySelector('.dropdown-menu-end');
    const userButton = this.$el.querySelector('#navbarDropdown');

    // Check if click is outside both dropdowns
    if (
      (!notificationDropdown?.contains(event.target) && event.target !== notificationButton) &&
      (!userDropdown?.contains(event.target) && event.target !== userButton)
    ) {
      this.notificationsOpen = false;
      this.dropdownOpen = false;
    }
  },

  toggleNotifications(event) {
    event.stopPropagation(); // Stop event from bubbling
    this.notificationsOpen = !this.notificationsOpen;
    this.dropdownOpen = false; // Close user dropdown
  },

  toggleDropdown(event) {
    event.stopPropagation(); // Stop event from bubbling
    this.dropdownOpen = !this.dropdownOpen;
    this.notificationsOpen = false; // Close notifications
  },

    toggleFullScreen() {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
        this.isFullScreen = true;
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
          this.isFullScreen = false;
        }
      }
    },
    },

    mounted() {
        // Use a single handler for all click-outside events
        window.addEventListener('click', this.handleGlobalClick);
    },

    beforeUnmount() {
        window.removeEventListener('click', this.handleGlobalClick);
    },
  };
  </script>

<style scoped>
.dropdown-menu {
  min-width: 200px;
}

.dropdown-item {
  padding: 0.5rem 1rem;
  cursor: pointer;
}

.dropdown-item:hover {
  background-color: #fa9c9c;
}

.nav-link {
  cursor: pointer;
}

/* For the right-side nav items specifically */
.navbar-nav.ml-auto .nav-item {
  margin: 0 0.5rem;
}

.caret {
  margin-left: 5px;
}

.navbar-badge {
  font-size: .75rem;
  padding: 4px 5px;
  position: absolute;
  right: -5px;
  top: -5px;
}

.dropdown-menu-lg {
  max-width: 300px;
  min-width: 280px;
  padding: 0;
}

.dropdown-menu-lg .dropdown-item {
  padding: .5rem 1rem;
}

/* Light mode styles */
.dropdown-item .text-muted {
  color: #6c757d !important;  /* Grey color for light mode */
}

/* Dark mode styles */
:deep(.dark-mode) .dropdown-item .text-muted {
  color: #adb5bd !important;  /* Lighter grey color for dark mode */
}

.dropdown-item {
  color: #212529;  /* Dark text for light mode */
  display: flex;
  /* justify-content: space-between; */
  align-items: center;
  gap: 0.5rem;
}

.dropdown-item .notification-content {
  flex-grow: 1;
}

/* Dark mode styles */
:deep(.dark-mode) .dropdown-menu {
  background-color: #343a40;
  border: none;
}

:deep(.dark-mode) .dropdown-item {
  color: #fff;
}

:deep(.dark-mode) .dropdown-item:hover {
  background-color: #4b545c;
  color: #fff;
}

:deep(.dark-mode) .dropdown-header {
  background-color: #343a40;
  border: none;
  color: #fff;
}

:deep(.dark-mode) .dropdown-footer {
  background-color: #343a40;
  border: none;
  color: #fff;
}

:deep(.dark-mode) .dropdown-footer:hover {
  background-color: #4b545c;
  color: #fff;
}

:deep(.dark-mode) .dropdown-divider {
    border-color: #4b545c;
}

:deep(.dark-mode) .text-muted {
  color: #adb5bd !important;
}

.dropdown-header {
  background-color: #fff;
  border: none;
  color: #6c757d;
  font-size: .875rem;
  padding: .5rem 1rem;
}

.dropdown-footer {
  background-color: #fff;
  border: none;
  color: #6c757d;
  font-size: .875rem;
  padding: .5rem 1rem;
  text-align: center;
}

.dropdown-footer:hover {
  background-color: #f8f9fa;
  color: #000;
}

/* Dark mode styles */
:deep(.dark-mode) .dropdown-menu {
  background-color: #343a40;
  border: none;
}

:deep(.dark-mode) .dropdown-item {
  color: #fff;
}

:deep(.dark-mode) .dropdown-item:hover {
  background-color: #4b545c;
  color: #fff;
}

:deep(.dark-mode) .dropdown-header,
:deep(.dark-mode) .dropdown-item.dropdown-header,
:deep(.dark-mode) .dropdown-item.dropdown-footer {
  background-color: #343a40;
  border: none;
  color: #fff;
}

:deep(.dark-mode) .dropdown-footer {
  background-color: #343a40;
  border: none;
}

:deep(.dark-mode) .dropdown-divider {
    border: none;
}

:deep(.dark-mode) .text-muted {
  color: #adb5bd !important;
}

/* Override specific items */
:deep(.dark-mode) .dropdown-item.dropdown-header,
:deep(.dark-mode) .dropdown-item.dropdown-footer {
  color: #fff !important;
  background-color: #343a40 !important;
}

:deep(.dark-mode) .dropdown-item.dropdown-header:hover,
:deep(.dark-mode) .dropdown-item.dropdown-footer:hover {
  background-color: #4b545c !important;
}
</style>
