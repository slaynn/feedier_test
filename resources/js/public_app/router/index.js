import {createWebHistory, createRouter} from "vue-router";
import NewFeedback from "../component/NewFeedback.vue";
import Login from "../component/Login.vue";


const routes = [
    {
        path: '/',
        name: 'home',
    },
    {
        path: '/newFeedback',
        name: 'newFeedback',
        component: NewFeedback,
        meta: {
            requiresAuth:true
        },
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            requiresAuth:false
        },
    },

]
const router = createRouter({
    history: createWebHistory(),
    mode: 'hash',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('token') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            next()
        }
    }
     else {
        next()
    }
})
export default router;

