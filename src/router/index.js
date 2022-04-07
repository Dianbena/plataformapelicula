import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CrearPelicula from '../components/CrearPelicula.vue'
import ListarPelicula from '../components/ListarPelicula.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },

  {
    path: '/crearpelicula',
    name: 'CrearPelicula',
    component: CrearPelicula
  },
  {
    path: '/listarpelicula',
    name: 'ListarPelicula',
    component: ListarPelicula
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
