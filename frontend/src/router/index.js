import { createRouter, createWebHistory } from 'vue-router';
import store from '../store';
import constants from '../store/constants';

const checkAuth = () => {
  return !!store.state.auth.user;
};

const checkMobilePermission = () => {
  return window.screen.width > constants.MAX_WIDTH_PERMISSION;
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
    path: '/teams/:teamId',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue'),
    beforeEnter: (to, from, next) => {
      if (!checkAuth()) next({ name: 'Home' });

      store.dispatch('activeTeam/checkTeamUser', to.params.teamId)
        .then(res => {
          if (!res) next({ name: 'TeamsList' });
        })
        .finally(() => {
          next();
        });

      if (!checkMobilePermission()) next({ name: 'MobileWarning' });
    },
    children: [
      {
        path: 'home',
        name: 'TeamDashboardHome',
        component: () => import('../components/dashboard/team/home/Home')
      },
      {
        path: 'members',
        name: 'TeamDashboardMembers',
        component: () => import('../components/dashboard/team/members/Members')
      },
      {
        path: 'settings',
        name: 'TeamDashboardSettings',
        component: () => import('../components/dashboard/team/settings/Settings')
      },
      {
        path: 'notifications',
        name: 'TeamDashboardNotifications',
        component: () => import('../components/dashboard/team/members/Notifications')
      }
    ]
  },
  {
    path: '/team-join/user-invitation/:invitationKey',
    name: 'TeamUserInvitation',
    component: () => import('../views/TeamUserInvitation.vue')
  },
  {
    path: '/404',
    name: 'NoPage',
    component: () => import('../views/NoPage')
  },
  {
    path: '/mobile-warning',
    name: 'MobileWarning',
    component: () => import('../views/MobileWarning')
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
