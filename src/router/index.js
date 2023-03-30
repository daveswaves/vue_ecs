import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '@/views/DashboardView.vue'

const routes = [
   {
      path: '/',
      name: 'Dashboard',
      component: Dashboard,
      // meta: {requiresAuth: true},
   },{
      path: '/Login',
      name: 'Login',
      component: () => import('@/views/LoginView.vue'),
   },{
      path: '/Pending',
      name: 'Pending',
      // meta: {requiresAuth: true},
      component: () => import('@/views/PendingView.vue'),
   },{
      path: '/Resends',
      name: 'Resends',
      // meta: {requiresAuth: true},
      component: () => import('@/views/ResendsView.vue'),
   },{
      path: '/Returns',
      name: 'Returns',
      // meta: {requiresAuth: true},
      component: () => import('@/views/ReturnsView.vue'),
   },{
      path: '/Refunds',
      name: 'Refunds',
      // meta: {requiresAuth: true},
      component: () => import('@/views/RefundsView.vue'),
   },{
      path: '/Claims',
      name: 'Claims',
      // meta: {requiresAuth: true},
      component: () => import('@/views/ClaimsView.vue'),
   },{
      path: '/Admin',
      name: 'Admin',
      // meta: {requiresAuth: true},
      component: () => import('@/views/AdminView.vue'),
   },
]

const router = createRouter({
   history: createWebHistory(import.meta.env.BASE_URL),
   routes
 })

export default router
