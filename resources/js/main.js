// main.js
import { createApp } from 'vue';
import App from './App.vue'; // Your main App component
import router from './router.js'; // Ensure router is defined correctly

const app = createApp(App);
app.use(router);
app.mount('#app');
