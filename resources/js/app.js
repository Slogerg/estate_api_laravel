/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import Vue from 'vue';
import VueRouter from 'vue-router';
//

// import { createApp } from 'vue';
// import App from './components/App.vue'
// createApp(App).mount("#app")

import { createApp } from 'vue';
import { UploadMedia, UpdateMedia } from 'vue-media-upload';
require('./bootstrap');
// const router = new VueRouter({
//     mode: 'history',
//     // routes: routes
// });
let app=createApp({})

app.component('upload-media' , UploadMedia);
app.component('update-media' , UpdateMedia);

app.component('building', require('./components/Building.vue').default);
app.component('create-building', require('./components/CreateBuilding.vue').default);
app.component('edit-building', require('./components/EditBuilding.vue').default);
app.mount("#app")
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('building', require('./components/Building.vue').default);
// Vue.component('create-building', require('./components/CreateBuilding.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// const app = new Vue({
//     el: '#app',
//     // router: router,
// });
