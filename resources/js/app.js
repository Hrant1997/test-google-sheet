require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import App from './components/App.vue'

Vue.use(VueRouter)

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('app', App);

const router = new VueRouter({
  routes
})


const app = new Vue({
  el: '#app',
  router
});