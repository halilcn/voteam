import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue')
  },
  {
    path: '/prices',
    name: 'Prices',
    component: () => import('../views/Prices.vue')
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
    path: '/user-actions',
    name: 'UserActions',
    component: () => import('../views/UserActions.vue'),
    redirect: { name: 'Login' },
    children: [
      {
        path: 'login',
        name: 'Login',
        component: () => import('../components/user-actions/Login.vue')
      },
      {
        path: 'register',
        name: 'Register',
        component: () => import('../components/user-actions/Register.vue')
      },
      {
        path: 'forgot-password',
        name: 'ForgotPassword',
        component: () => import('../components/user-actions/ForgotPassword.vue')
      }
    ]
  },
  {
    path: '/',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue'),
    children: [
      {
        path: '/team/:teamId/home',
        name: 'TeamDashboardHome',
        component: () => import('../components/dashboard/team/Home')
      },
      {
        path: '/team/:teamId/settings',
        name: 'TeamDashboardSettings',
        component: () => import('../components/dashboard/team/Settings')
      }
    ]
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
