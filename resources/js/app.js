import  Vue from 'vue';
require('./bootstrap');

 Vue.component('home', require('./components/home.vue').default);

// import plugin
import VueToastr from "vue-toastr";
// use plugin
Vue.use(VueToastr);

const app = new Vue({
    el: '#app'
})