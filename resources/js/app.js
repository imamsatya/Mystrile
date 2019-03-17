import Vue from 'vue'

import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'
import 'material-icons/iconfont/material-icons.css'
Vue.use(Vuesax)

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

import Vuecidity from 'vuecidity'
import 'vuecidity/dist/lib/vuecidity.min.css'
Vue.use(Vuecidity)

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
Vue.use(VueMaterial)


import VueSweetalert2 from 'vue-sweetalert2'; 
Vue.use(VueSweetalert2);

window.axios = require('axios');


//CRUD 
import { store } from './store/store'

// import BootstrapVue from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// Vue.use(BootstrapVue)


//UI
import Drawer from './components/UI/Drawer.vue'



import Footer from './components/FooterComponent.vue'

import Home from './components/HomeComponent.vue'
import Beranda from './components/BerandaComponent.vue'
    import HargaBarang from './components/Beranda/HargaBarang.vue'
    import SewaAlat from './components/Beranda/SewaAlat.vue'
    import JasaKonstruksi from './components/Beranda/JasaKonstruksi.vue'


//Create
import HargaBarangCreate from './components/Create/HargaBarangCreate.vue'
import JasaKonstruksiCreate from './components/Create/JasaKonstruksiCreate.vue'
import SewaAlatCreate from './components/Create/SewaAlatCreate.vue'
import AtributCreate from './components/Create/AtributCreate.vue'


/**
 * 
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap')

window.Vue = require('vue')
// window.Vue = Vue

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//UI
window.Vue.component('drawer-c', Drawer)



Vue.component('example-component', require('./components/ExampleComponent.vue').default)

window.Vue.component('footer-c', Footer)

window.Vue.component('home-c', Home)
window.Vue.component('beranda-c', Beranda)
    window.Vue.component('hargabarang-c', HargaBarang)
    window.Vue.component('sewaalat-c', SewaAlat)
    window.Vue.component('jasakonstruksi-c', JasaKonstruksi)



//create
    window.Vue.component('hargabarangcreate-c', HargaBarangCreate)
    window.Vue.component('jasakonstruksicreate-c', JasaKonstruksiCreate)
    window.Vue.component('sewaalatcreate-c', SewaAlatCreate)
    window.Vue.component('atribut-c', AtributCreate)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App),
        components: {
            App
        }
    
});
