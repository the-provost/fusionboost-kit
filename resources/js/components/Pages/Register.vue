<template>
  <div class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
          <form @submit.prevent="validateForm">
            <div class="input-group mb-3">
              <input type="text" class="form-control" v-model="first_name" placeholder="Enter First Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.first_name" class="text-danger">{{ errors.first_name }}</div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" v-model="last_name" placeholder="Enter Last Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.last_name" class="text-danger">{{ errors.last_name }}</div>

            <div class="input-group mb-3">
              <input type="email" class="form-control" v-model="email" placeholder="Enter Email Address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" v-model="phone" placeholder="Enter Phone Number" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-phone"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" v-model="password" placeholder="Enter New Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>

            <div class="input-group mb-3">
              <input class="form-control" placeholder="Retype Your Password" type="password" v-model="confirm_password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
            </div>
            <div v-if="errors.confirm_password" class="text-danger">{{ errors.confirm_password }}</div>

            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input id="agreeTerms" name="terms" type="checkbox" v-model="agreeTerms" required>
                  <label for="agreeTerms">I agree to the <a href="#">terms</a></label>
                </div>
              </div>
              <div v-if="errors.agreeTerms" class="text-danger">{{ errors.agreeTerms }}</div>
              <div class="col-4">
                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
              </div>
            </div>
          </form>
          <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a class="btn btn-block btn-primary" href="#"><i class="fab fa-facebook mr-2"></i> Sign up using Facebook</a>
            <a class="btn btn-block btn-danger" href="#"><i class="fab fa-google-plus mr-2"></i> Sign up using Google+</a>
          </div>
          <a class="text-center" href="#">I already have a membership</a>
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
import '@fortawesome/fontawesome-free/css/all.min.css';

export default {
  data() {
    return {
      first_name: '',
      last_name: '',
      email: '',
      phone: '',
      password: '',
      confirm_password: '',
      agreeTerms: false,
      errors: {},
      serverError: null,
    };
  },
  methods: {
    validateForm() {
      this.errors = {};

      if (!this.first_name.trim()) {
        this.errors.first_name = 'First name is required';
      }

      if (!this.last_name.trim()) {
        this.errors.last_name = 'Last name is required';
      }

      if (!this.email.trim()) {
        this.errors.email = 'Email is required';
      } else if (!this.isValidEmail(this.email)) {
        this.errors.email = 'Invalid email format';
      }

      if (!this.phone.trim()) {
        this.errors.phone = 'Phone number is required';
      } else if (!this.isValidPhone(this.phone)) {
        this.errors.phone = 'Invalid phone number format';
      }

      if (!this.password) {
        this.errors.password = 'Password is required';
      } else if (this.password.length < 8) {
        this.errors.password = 'Password must be at least 8 characters long';
      }

      if (this.password !== this.confirm_password) {
        this.errors.confirm_password = 'Passwords do not match';
      }

      if (!this.agreeTerms) {
        this.errors.agreeTerms = 'You must agree to the terms';
      }

      if (Object.keys(this.errors).length === 0) {
        this.register();
      }
    },
    isValidEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    },
    isValidPhone(phone) {
      const re = /^\d{10}$/;  // Assumes a 10-digit phone number
      return re.test(phone);
    },
    async register() {
      this.serverError = null;
      try {
        await Inertia.post('/api/app/register', {
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          phone: this.phone,
          password: this.password,
          confirm_password: this.confirm_password,
        });
      } catch (error) {
        this.serverError = 'An error occurred during registration. Please try again.';
      }
    },
  },
  mounted() {
    document.body.classList.add('hold-transition', 'register-page');
  },
};
</script>