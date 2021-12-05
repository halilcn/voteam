import axios from 'axios';

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
    removeNotification(state, payload) {
      state.notifications = state.notifications.filter(({ id }) => id !== payload);
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
    async getNotifications({ commit }, payload) {
      const createdAtOfLastNotification = payload ? `?createdAtOfLastNotification=${payload}` : '';

      if (typeof payload == 'undefined') commit('removeAllNotifications');

      const { data } = (await axios.get(`user/notifications${createdAtOfLastNotification}`)).data;
      commit('setNotification', data);
      commit('setHasMoreNotifications', data.length);
    },
    async deleteNotification({ commit }, payload) {
      await axios.delete(`user/notifications/${payload}`);
      commit('removeNotification', payload);
    }
  },
  getters: {},
  namespaced: true
};
