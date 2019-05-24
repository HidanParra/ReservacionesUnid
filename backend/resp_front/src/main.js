import Vue from 'vue'
import App from './App.vue'
import store from './store'
import Axios from 'axios';
import VueRouter from 'vue-router';
import {
  routes
} from './router/routes';
import {
  index
} from './components/index';

Vue.prototype.$http = Axios;
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}

// Router
Vue.use(VueRouter);
const router = new VueRouter({
  routes,
  linkActiveClass: 'open active',
  scrollBehavior: () => ({
    y: 0
  }),
  mode: 'hash'
});
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next()
      return
    }
    next('/auth/login')
  } else {
    next()
  }
})

new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App),
  components: {
    App
  }
})