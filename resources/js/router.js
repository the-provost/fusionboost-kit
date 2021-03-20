
import Vue from 'vue';
import VueRouter from 'vue-router';
// import Gate from "./Gate";
// Vue.prototype.$gate = new Gate(window.user);

Vue.use(VueRouter);
window.Vue = require('vue');



// router.beforeEach((to, from, next) => {
//     //  Redirect if not authenticated on secured routes
//     if (to.matched.some(m => m.meta.requiresAuth)) {
//       if (!store.getters['auth/isAuthenticated']) {
//         return next('/login')
//       }
//     }
  
//     if (to.matched.some(m => m.meta.redirectIfAuthenticated) && store.getters['auth/isAuthenticated']) {
//       return next('/admin/dashboard')
//     }
  
//     return next()
//   })


const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    linkActiveClass: 'active'
  });

  export default router;