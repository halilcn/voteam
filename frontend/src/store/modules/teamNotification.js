import axios from 'axios';
import router from '../../router/index';

export default {
  state: {
    notifications: [],
    hasMoreNotifications: false
  },
  mutations: {
    setNotification(state, payload) {
      if (payload instanceof Array) {
        payload.forEach(notification => {
          state.notifications.push(notification);
        });
        return;
      }

      state.notifications.push(payload);
    },
    removeAllNotifications(state) {
      state.notifications = [];
    },
    setHasMoreNotifications(state, payload) {
      const NOTIFICATION_LIMIT = 7;
      state.hasMoreNotifications = NOTIFICATION_LIMIT % payload === 0;
    }
  },
  actions: {
    async getNotificationsOfTeam({ commit, getters }, payload = undefined) {
      const idOfLastNotification = payload ? `?idOfLastNotification=${payload}` : '';

      if (typeof payload == 'undefined') commit('removeAllNotifications');

      const { data } = (await axios.get(`teams/${getters.teamId}/notifications${idOfLastNotification}`)).data;
      commit('setNotification', data);
      commit('setHasMoreNotifications', data.length);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
