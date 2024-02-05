<template>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true">
          <b><h5>Access Portal</h5></b>
        </a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
          <i class="fas fa-user-tie"></i>&nbsp; {{ user.first_name }}<span class="caret"></span>
        </a>
        <div 
          class="dropdown-menu show dropdown-menu-end" style="right: 0; left: auto;" 
          aria-labelledby="navbarDropdown" 
          v-if="dropdownOpen"
        >
          <a class="dropdown-item">
            <button class="btn btn-secondary" @click.prevent="toggleDarkMode">Switch Display Mode</button>
          </a>
          <a class="dropdown-item" href="/logout" @click.prevent="logout">
            <i class="fas fa-lock"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
</template>

<script>
import { computed, ref, onMounted } from 'vue';
import { toggleDarkMode } from '../../darkModePlugin';

export default {
  data() {
    return {
      user: window.user ? window.user : { first_name: '' },
      canRegister: true, // You can set this based on your application's logic
      dropdownOpen: false // Flag to track if the dropdown is open or closed
    };
  },
  computed: {
    isLoggedIn() {
      return this.user.first_name !== '';
    }
  },
  methods: {
    toggleDropdown() {
      this.dropdownOpen = !this.dropdownOpen; // Toggle the dropdown state
    },
    toggleDarkMode(){
       // Toggle the dark mode globally
       toggleDarkMode();
    },
    onClickToggleLight() {
      // Implement your light mode toggling logic here
      toggleDarkMode(); // Toggling back to light mode using the same function
    },
    logout() {
      // Implement your logout logic here
      document.getElementById('logout-form').submit();
    },
    closeDropdownOnClickOutside(event) {
      // Check if the clicked element is inside the dropdown
      if (!this.$el.contains(event.target)) {
        // Clicked outside the dropdown, close it
        this.dropdownOpen = false;
      }
    }
  },
  mounted() {
    // Add click event listener to detect clicks outside the dropdown
    window.addEventListener('click', this.closeDropdownOnClickOutside);
  },
  beforeUnmount() {
    // Remove click event listener when component is unmounted
    window.removeEventListener('click', this.closeDropdownOnClickOutside);
  }
};
</script>
