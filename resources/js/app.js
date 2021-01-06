
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/header.vue'

import Home from'./components/ExampleComponent.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home1',
            name: 'home',
            component: Home
        },
        {
            path: '/',
            name: 'app',
            component: App
        },
      
    ],
});

const app = new Vue({
    el: '#app',
   
    router,
});