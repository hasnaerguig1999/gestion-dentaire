import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Rendez-vous',
    name: 'Rendez-vous',
    component: () => import('../views/RdvView.vue')
  },
  {
    path: '/Dashboard',
    name: 'Dashboard',
    component: () => import('../views/DashboardView.vue')
  },
  {
    path: '/ClientPage',
    name: 'ClientPage',
    component: () => import('../views/ClientPageView.vue')
  },
  {
    path: '/Registre',
    name: 'Registre',
    component: () => import('../views/RegistreView.vue')
  },
  {
    path: '/Login',
    name: 'Login',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/LoginView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
