require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('images-component', require('./components/ImagesComponent.vue').default);
Vue.component('home-component', require('./views/HomeComponent.vue').default);

const app = new Vue({
    el: '#app',
});