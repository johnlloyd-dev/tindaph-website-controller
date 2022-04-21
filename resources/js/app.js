/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
 import routes from './routes';

 Vue.use(VueRouter);

 import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

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
