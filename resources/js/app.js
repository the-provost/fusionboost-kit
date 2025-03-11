// Import Vue core and plugins
import { createApp } from 'vue';
import router from './router.js';
import axiosPlugin from './axios';

// Import base styles and configurations
import '../js/bootstrap.js';
import '../scss/app.scss';

// Import components
import AppComponent from './components/App.vue';
import BaseModalComponent from './components/ui/BaseModalComponent.vue';
import NavbarComponent from './components/ui/NavbarComponent.vue';
import SidebarComponent from './components/ui/SidebarComponent.vue';
import FooterComponent from './components/ui/FooterComponent.vue';
import ControlSidebarComponent from './components/ui/ControlSidebarComponent.vue';

// Import passport components
import PassportClients from './components/passport/Clients.vue';
import PassportAuthorizedClients from './components/passport/AuthorizedClients.vue';
import PassportPersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';

// Import third-party libraries and styles
import { Form, HasError, AlertError } from 'vform';
import vSelect from "vue-select";
import 'vue-select/dist/vue-select.css';
import swal from 'sweetalert2';
import moment from 'moment';

// Import custom plugins and utilities
import { initializeDarkMode, provideDarkMode } from './darkModePlugin';
import { initParticles } from './particles.js';

import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

// Initialize dark mode
initializeDarkMode();

// Initialize particles on DOM load
document.addEventListener('DOMContentLoaded', () => {
    initParticles();
});

// Create Vue application instance
const app = createApp(AppComponent);

// Provide dark mode context
app.provide('darkMode', provideDarkMode);

// Register common UI components
app.component("v-select", vSelect);
app.component(HasError.name, HasError);
app.component(AlertError.name, AlertError);
app.component("navbar-component", NavbarComponent);
app.component("sidebar-component", SidebarComponent);
app.component("footer-component", FooterComponent);
app.component("control-sidebar-component", ControlSidebarComponent);
app.component('base-modal-component', BaseModalComponent);

// Register Passport components
app.component("passport-clients", PassportClients);
app.component("passport-authorized-clients", PassportAuthorizedClients);
app.component("passport-personal-access-tokens", PassportPersonalAccessTokens);

// Use plugins
app.use(router);
app.use(axiosPlugin);

app.use(Toast, {
    position: 'top-right',
    timeout: 3000,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
  })

// Register global properties
app.config.globalProperties.$Form = Form;
app.config.globalProperties.$swal = swal;
app.config.globalProperties.$moment = moment;

// Mount the application
app.mount('#app');

// Export the app instance if needed
export default app;
