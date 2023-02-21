require('./bootstrap');
require('../sass/app.scss')
import Vue from 'vue'
import 'bootstrap'
import BootstrapVue from 'bootstrap-vue';

window.Vue = require('vue');
Vue.use(BootstrapVue);

// router
import router from './route.js';
window.router = router;
window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
}).$mount('#app');