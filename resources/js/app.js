import { createApp } from 'vue';
import router from './router.js';
import AppComponent from './components/App.vue';
import 'admin-lte/dist/css/adminlte.min.css';
import 'admin-lte/dist/js/adminlte.min.js';
import '@fortawesome/fontawesome-free/css/all.min.css';
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';

const app = createApp(AppComponent);
app.use(router);
app.mount('#app');
