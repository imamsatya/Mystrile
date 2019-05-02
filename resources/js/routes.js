import Vue from 'vue'
import VueRouter from 'vue-router'
import Beranda from './components/BerandaComponent.vue'
import Login from './components/Auth/Login.vue'
import Feed from './components/Auth/Feed.vue'
Vue.use(VueRouter)

const router = new VueRouter({
    routes:[
        {
            path: "/login4",
            component: Login,
            meta: {
                forVisitors: true,
            }
        },
        {
            path: "/feed",
            component: Feed,
            meta:{
                forAuth: true,
            }
        }
    ], 
    mode: 'history'
})

export default router