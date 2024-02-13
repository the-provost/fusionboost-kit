import { createRouter, createWebHistory } from 'vue-router';


// Import your Vue components
import ExampleComponent from './components/views/ExampleComponent.vue';
import EmptyPage from './components/views/EmptyPage.vue';
import Home from './components/views/Home.vue';
import Passport from './components/views/Passport.vue';
// Import any other components or views
import NavbarComponent from './components/ui/NavbarComponent.vue';
import SidebarComponent from './components/ui/SidebarComponent.vue';
// Create the router
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/home',
      component: Home
    },
    {
      path: '/page',
      meta: { title: 'Page Name | Section Name' },
      component: EmptyPage,
      name: 'Page Name | Section Name'
    },
    {
      path: '/passport',
      meta: { title: 'App Passport | FusionBoost' },
      component: Passport,
      name: 'App Passport | FusionBoost'
    },
    // Add more routes as needed
    {
      path: '/EmptyCanvas',
      component: ExampleComponent
    },
    {
      path: '/:pathMatch(.*)*', // Catch-all route
      component: EmptyPage
    }
  ],
  linkActiveClass: 'active'
});

export default router;
