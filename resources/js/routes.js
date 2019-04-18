import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/Auth/Login.vue'
Vue.use(VueRouter)

const router = new VueRouter({
    routes:[
        {
            path: "/login",
            component: Login,
            meta: {
                forVisitors: true,
            }
        },
        {
            // path: "/home"
        }
    ]
})

export default router