// Import Vue 3 core library
import { createApp } from 'vue';

// Import router instance
import router from './router.js'; // Make sure you have your router defined in router.js

// Import global styles and configurations
import './bootstrap.js';

// Import your Vue components
import AppComponent from './components/App.vue';
import { Form, HasError, AlertError } from 'vform'; // Assuming you're still using these components
import vSelect from "vue-select";
import swal from 'sweetalert2'; // Import SweetAlert2 for notifications
import moment from 'moment'; // Import Moment.js for date formatting
import 'vue-select/dist/vue-select.css';

// Create Vue app instance
const app = createApp(AppComponent);

// Register global components
app.component("v-select", vSelect); // Register vSelect component globally
app.component(HasError.name, HasError); // Register HasError component globally
app.component(AlertError.name, AlertError); // Register AlertError component globally

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
