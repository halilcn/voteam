import { createRouter, createWebHistory } from 'vue-router';
import store from '../store';

const checkAuth = () => {
  return !!store.state.auth.user;
};

const guest = (to, from, next) => {
  if (!checkAuth()) next();
  next({ name: 'TeamsList' });
};

const auth = (to, from, next) => {
  if (checkAuth()) next();
  next({ name: 'Home' });
};

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
    beforeEnter: guest
  },
  {
    path: '/prices',
    name: 'Prices',
    component: () => import('../views/Prices.vue'),
    beforeEnter: guest
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue'),
    beforeEnter: guest
  },
  {
    path: '/user-actions',
    name: 'UserActions',
    component: () => import('../views/UserActions.vue'),
    beforeEnter: guest,
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
    path: '/teams',
    name: 'TeamsList',
    component: () => import('../views/Teams.vue'),
    beforeEnter: auth
  },
  {
    path: '/',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue'),
    beforeEnter: auth,
    children: [
      {
        path: '/teams/:teamId/home',
        name: 'TeamDashboardHome',
        component: () => import('../components/dashboard/team/Home')
      },
      {
        path: '/teams/:teamId/settings',
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
