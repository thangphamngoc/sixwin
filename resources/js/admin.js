require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
// import { Form, HasError, AlertError } from 'vform';

Vue.use(VueRouter);

export const routes = [
    { name: 'signIn', props: true, path: '/', component: require('./components/admin/signIn.vue').default },
    // { name: 'test', props: true, path: '/hu', component: require('./components/admin/test.vue').default },
];

const router = new VueRouter({
    // hash:false,
    mode: 'hash',
    routes
});

const app = new Vue({
    el: '#app',
    router
});



