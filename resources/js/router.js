import { createRouter, createWebHistory } from 'vue-router';


// Import your Vue components
import ExampleComponent from './components/ExampleComponent.vue';
import EmptyPage from './components/EmptyPage.vue';
import Home from './components/Home.vue';
// Import any other components or views

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
