<template>
  <div class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start</p>
          <form @submit.prevent="login">
            <div class="input-group mb-3">
              <input class="form-control" type="email" v-model="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input class="form-control" type="password" v-model="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input id="remember" type="checkbox"> <label for="remember">Remember Me</label>
                </div>
              </div>
              <div class="col-4">
                <button class="btn btn-primary btn-block" type="submit">Sign In</button>
              </div>
            </div>
          </form>
          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p><a class="btn btn-block btn-primary" href="#"><i class="fab fa-facebook mr-2"></i> Sign in using Facebook</a> <a class="btn btn-block btn-danger" href="#"><i class="fab fa-google-plus mr-2"></i> Sign in using Google+</a>
          </div>
          <p class="mb-1"><a href="#">I forgot my password</a></p>
          <p class="mb-0"><a class="text-center" href="#">Register a new membership</a></p>
          <br><br>
          <a href="#" style="text-decoration: none !important;">Terms of use &nbsp; | &nbsp;</a>
          <a href="#" style="text-decoration: none !important;">Privacy policy</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
  data() {
      return {
          email: '',
          password: '',
          error: null,
      };
  },
  methods: {
      async login() {
          this.error = null; // Clear previous errors
          try {
              // Use Inertia to send the POST request for login
              await Inertia.post('/api/app/login', {
                  email: this.email,
                  password: this.password,
              });
          } catch (error) {
              // Handle network or other errors
              this.error = 'An error occurred during login. Please try again.';
          }
      },
  },
  mounted() {
    document.body.classList.add('hold-transition', 'login-page');
  },
};
</script>