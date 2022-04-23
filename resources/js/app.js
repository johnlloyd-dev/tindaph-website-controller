require('./bootstrap');

import VueRouter from 'vue-router';
import routes from './routes';

 Vue.use(VueRouter);

import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('dashboard-component', require('./components/pages/Dashboard.vue').default);
Vue.component('banner-component', require('./components/pages/Banner.vue').default);
Vue.component('store-component', require('./components/pages/Store.vue').default);
Vue.component('sidebar-component', require('./components/Sidebar.vue').default);
Vue.component('testimonials-component', require('./components/pages/Testimonials.vue').default);
Vue.component('faqs-component', require('./components/pages/FAQs.vue').default);
Vue.component('navbar-component', require('./components/Navbar.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('not-found-component', require('./components/pages/NotFound.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
