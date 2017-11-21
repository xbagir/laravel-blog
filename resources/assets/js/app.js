
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import routes from './routes';

import VeeValidate from 'vee-validate';

Vue.use(VueRouter);
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('dashboard-sidebar', require('./components/SidebarComponent.vue'));

const router = new VueRouter({
    mode: 'history',
    base: '/admin/dashboard/',
    routes: routes
});

const app = new Vue({
    router
}).$mount('#app');
