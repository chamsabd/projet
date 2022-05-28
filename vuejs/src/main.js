import Vue from 'vue'
import App from './App.vue'
//import router from "../../trash/router";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import store from './store';

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import axios from 'axios'
import VueAxios from 'vue-axios'
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";
import router from './router'

Vue.use(VueAxios, axios)


// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.config.productionTip = false

new Vue({
 router,
store,

 render: h => h(App)
}).$mount('#app')
