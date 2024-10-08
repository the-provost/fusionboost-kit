// router.js
import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Pages/Login.vue'; // Adjust the path accordingly
import Register from './components/Pages/Register.vue';
import Home from './components/Pages/Home.vue'; // Adjust the path accordingly

const routes = [
    {
        path: '/home',
        name: 'Home',
        component: Home,
    },
    {
        path: '/api/app/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/api/app/register',
        name: 'Register',
        component: Register,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
