// Import Vue 3 core library
import { createApp } from 'vue';

// Import router instance
import router from './router.js'; // Make sure you have your router defined in router.js

// Import global styles and configurations
import './bootstrap.js';
import '../scss/app.scss'

// Import your Vue components
import AppComponent from './components/App.vue';
import { provideDarkMode } from './darkModePlugin';

import { Form, HasError, AlertError } from 'vform'; // Assuming you're still using these components
import vSelect from "vue-select";
import swal from 'sweetalert2'; // Import SweetAlert2 for notifications
import moment from 'moment'; // Import Moment.js for date formatting
import 'vue-select/dist/vue-select.css';
import axiosPlugin from './axios';


const app = createApp(AppComponent).provide('darkMode', provideDarkMode);

// Register global components
app.component("v-select", vSelect); // Register vSelect component globally
app.component(HasError.name, HasError); // Register HasError component globally
app.component(AlertError.name, AlertError); // Register AlertError component globally
//common ui components
import NavbarComponent from './components/ui/NavbarComponent.vue';
import SidebarComponent from './components/ui/SidebarComponent.vue';
import FooterComponent from './components/ui/FooterComponent.vue';
import ControlSidebarComponent from './components/ui/ControlSidebarComponent.vue';

// Register global components
app.component("navbar-component", NavbarComponent); // Register NavbarComponent globally
app.component("sidebar-component", SidebarComponent); // Register SidebarComponent globally
app.component("footer-component", FooterComponent); // Register FooterComponent globally
app.component("control-sidebar-component", ControlSidebarComponent); // Register ControlSidebarComponent globally


// Use the Axios plugin
app.use(axiosPlugin);


// Use Vue Router if you're using it
app.use(router);

// Use vform if you're using it
app.config.globalProperties.$Form = Form; // Make vform accessible globally

// Register swal globally
app.config.globalProperties.$swal = swal;

// Register moment globally
app.config.globalProperties.$moment = moment;

// Mount the app
app.mount('#app');
