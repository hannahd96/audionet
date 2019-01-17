
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);
//comment
import SongsIndex from './components/songs/SongsIndex.vue';

const routes = [
    {
        path: '/',
        components: {
            songsIndex: SongsIndex
        }
    }
];

const router = new VueRouter({
    routes: routes
});

const app = new Vue({
    router: router
}).$mount('#app');
