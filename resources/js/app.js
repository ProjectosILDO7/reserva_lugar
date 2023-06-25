import { createApp } from 'vue';

import App from '../js/App.vue';
import router from './router'
import store from '../js/store'
import Notifications from '@kyvg/vue3-notification'

import carregar from '../js/components/preloading/preloading-carregando.vue' 
import btn_loading from '../js/components/preloading/btn-preloading-black.vue' 
import preloading from '../js/components/preloading/preloading-simples.vue' 

import VueNumberFormat from 'vue-number-format'
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import JsonExcel from "vue-json-excel3"
import {Tabs, Tab} from 'vue3-tabs-component';
import VueSweetalert2 from 'vue-sweetalert2';
import VueApexCharts from "vue3-apexcharts";
import 'sweetalert2/dist/sweetalert2.min.css';
//import Select2 from "vue3-select2-component"

// import ProxyPay from 'proxypay-api'
// const P = new ProxyPay({
//       apikey: ""
// })

import 'animate.css';
window.url='/'
const app = createApp(App)
      app.use(store)
      app.use(VueSidebarMenu)
      app.use(router)
      app.use(Notifications)
      app.component("downloadExcel", JsonExcel)
      app.component('tabs', Tabs)
      app.component('tab', Tab)
      //app.component('Select2', Select2)
      app.use(VueNumberFormat, {prefix:'', isInteger: true})
      app.use(VueSweetalert2)
      app.use(VueApexCharts);
      app.mount('#app');
      

// store.dispatch('chacklogin')
//       .then(()=>router.push({name:'admin.home'}))
 