const Home = () => import('./components/Home.vue')
const Contacto = () => import('./components/Contacto.vue')
const Mostrar = () => import('./components/blog/Mostrar.vue')
const Editar = () => import('./components/blog/Editar.vue')
const Crear = () => import('./components/blog/Crear.vue')
import {createWebHistory, createRouter} from 'vue-router'

const routes = [
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'contacto',
        path:'/contact',
        component:Contacto
    },
    {
        name:'mostrar',
        path:'/blogs',
        component:Mostrar
    },
    {
        name:'crear',
        path:'/crear',
        component:Crear
    },
    {
        name:'editar',
        path:'/editar',
        component:Editar
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router