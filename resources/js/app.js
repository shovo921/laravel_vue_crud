import  Vue from 'vue';
require('./bootstrap');

 Vue.component('home', require('./components/home.vue').default);

// // import plugin
// import VueToastr from "vue-toastr";
// // use plugin
// Vue.use(VueToastr);
// import Toaster from 'v-toaster';
 
// // You need a specific loader for CSS files like https://github.com/webpack/css-loader
// import 'v-toaster/dist/v-toaster.css';
 
// // optional set default imeout, the default is 10000 (10 seconds).
// Vue.use(Toaster, {timeout: 5000})

import Toasted from 'vue-toasted';
  
Vue.config.productionTip = false
Vue.use(Toasted, {
  duration: 5000
})

const app = new Vue({
    el: '#app'
})
