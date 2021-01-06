
import Vue from 'Vue';
import VueRouter from 'vue-router';

 Vue.use(VueRouter);
import home from '../components/header.vue'
import home2 from '../components/home.vue'

const routes = new VueRouter({
mode:'history',
route: [
    {
        path:'/',
        component: home,
    },
    {
        path:'/home',
        component: home2,
        name: home-2,
    },
  
  
]
});

export default routes;
