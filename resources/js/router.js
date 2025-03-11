// router/index.js
import { createRouter, createWebHistory } from 'vue-router';

// Import core/layout components
import EmptyPage from './components/views/EmptyPage.vue';
import Home from './components/views/Home.vue';
import Passport from './components/views/Passport.vue';
import ExampleComponent from './components/views/ExampleComponent.vue';

// Define routes
const routes = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'home',
    component: Home,
    meta: {
      title: 'Dashboard',
      requiresAuth: true
    }
  },
  {
    path: '/tasks',
    name: 'tasks',
    meta: {
      title: 'Tasks',
      requiresAuth: true
    },
    // children: [
    //   {
    //     path: '',
    //     name: 'tasks.index',
    //     component: () => import('./components/views/task/List.vue'),
    //     meta: {
    //       title: 'All Tasks',
    //       preserveQuery: true
    //     },
    //     props: (route) => ({
    //       view: route.query.view || 'board',
    //       searchQuery: route.query.search || '',
    //       selectedProjectType: route.query.project_type || '',
    //       selectedProject: route.query.project || '',
    //       selectedStatus: route.query.status || '',
    //       selectedMilestone: route.query.milestone || '',
    //       selectedStaffId: route.query.staff || '',
    //       fromDate: route.query.from_date || '',
    //       toDate: route.query.to_date || '',
    //       activeQuickFilters: route.query.quick_filters ?
    //         route.query.quick_filters.split(',') : []
    //     })
    //   },
    //   {
    //     path: ':taskId',
    //     name: 'tasks.show',
    //     component: () => import('./components/views/task/Show.vue'),
    //     props: true,
    //     meta: {
    //       title: 'Task Details'
    //     }
    //   },
    //   {
    //     path: 'project/:projectId',
    //     name: 'tasks.project',
    //     component: () => import('./components/views/task/List.vue'),
    //     meta: {
    //       title: 'Project Tasks',
    //       preserveQuery: true
    //     },
    //     props: (route) => ({
    //       projectId: route.params.projectId,
    //       view: route.query.view || 'board',
    //       searchQuery: route.query.search || '',
    //       selectedStatus: route.query.status || '',
    //       selectedMilestone: route.query.milestone || '',
    //       selectedStaffId: route.query.staff || '',
    //       fromDate: route.query.from_date || '',
    //       toDate: route.query.to_date || '',
    //       activeQuickFilters: route.query.quick_filters ?
    //         route.query.quick_filters.split(',') : [],
    //       timestamp: Date.now()
    //     })
    //   }
    // ]
  },

  // Authentication & User Routes
  {
    path: '/passport',
    name: 'passport',
    component: Passport,
    meta: {
      title: 'App Passport',
      requiresAuth: false
    }
  },

  // Example/Development Routes
  {
    path: '/page',
    name: 'empty.page',
    component: EmptyPage,
    meta: {
      title: 'Page Name | Section Name',
      requiresAuth: true
    }
  },
  {
    path: '/empty-canvas',
    name: 'example',
    component: ExampleComponent,
    meta: {
      title: 'Example',
      requiresAuth: true
    }
  },

  // Catch-all/404 Route
  {
    path: '/:pathMatch(.*)*',
    name: 'not-found',
    component: EmptyPage,
    meta: {
      title: '404 Not Found',
      requiresAuth: false
    }
  }
];

// Create router instance
const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
    scrollBehavior(to, from, savedPosition) {
      // Restore scroll position for back/forward navigation
      if (savedPosition) {
        return savedPosition;
      }
      // Scroll to top for new navigation
      return { top: 0 };
    }
  });

// Navigation Guards

router.beforeEach((to, from, next) => {
  // Update document title
  document.title = to.meta.title ? `${to.meta.title} | Greydesk PMO` : 'Greydesk PMO';

  // Remove the preserveQuery logic and let the component handle query params
  next();
});

  router.onError((error) => {
    console.error('Router navigation error:', error);

    // Specific handling for DataCloneError
    if (error.name === 'DataCloneError') {
      // Attempt to navigate using window location as a fallback
      window.location.href = router.currentRoute.value.fullPath;
    }

    // Existing chunk loading error handling
    if (error.message.includes('Failed to fetch dynamically imported module')) {
      window.location.reload();
    }
  });

export default router;
