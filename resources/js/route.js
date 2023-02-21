import Vue from 'vue'
import VueRouter from 'vue-router'
import vue from '../../routes/vue';
import home from './routes/vue';

Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    scrollBehavior: (to, from, savedPosition) => ({ y: 0 }), 
    routes: [
        ...vue,
    ],
});