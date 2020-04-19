require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import { routes }  from './index';
import { Form, HasError, AlertError } from 'vform';


window.Form = Form;

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'hash',
    routes
})

const app = new Vue({
    el: '#app',
    router
});

