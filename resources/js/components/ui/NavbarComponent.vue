<template>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-none border-bottom-0 shadow-none">
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
          class="dropdown-menu dropdown-menu-end" 
          aria-labelledby="navbarDropdown" 
          v-if="dropdownOpen"
        >
          <a class="dropdown-item" @click.prevent="onClickToggleDark">
            Theme
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-secondary active">
                <input type="checkbox" name="dark" id="dark-mode" autocomplete="off"> Dark
              </label>
              <label class="btn btn-info">
                <input type="radio" name="dark" id="light-mode" autocomplete="off" checked> Light
              </label>
            </div>
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
    onClickToggleDark() {
      // Implement your dark mode toggling logic here
      var element = document.body;
      var name = "dark-mode";
      var arr = element.className.split(" ");
      if (arr.indexOf(name) === -1) {
        element.className += " " + name;
      }
    },
    onClickToggleWhite() {
      // Implement your light mode toggling logic here
      var element = document.body;
      element.className = element.className.replace(/\bdark-mode\b/g, "");
    },
    logout() {
      // Implement your logout logic here
      document.getElementById('logout-form').submit();
    }
  }
};
</script>
