import axios from 'axios';

export default {
  state: {
    notifications: []
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
    }
  },
  actions: {
    async getNotifications({ commit }, payload) {
      const idOfLastNotification = payload ? payload : null;
      console.log(idOfLastNotification);

      if (typeof payload == 'undefined') {
        data.test = '2';
      }

      //TODO: eğer ilk get isteği ise, notifications state temizle !
      const { data } = (await axios.get(`user/notifications${idOfLastNotification ? 'lastId' + idOfLastNotification : ''}`)).data;
      console.log(data);
      commit('setNotification', data);
    },
    async deleteNotification({ commit }, payload) {
      await axios.delete(`user/notifications/${payload}`);
      commit('removeNotification', payload);
    }
  },
  getters: {},
  namespaced: true
};
