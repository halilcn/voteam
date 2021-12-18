import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getNotificationsOfTeam({ getters }) {
      const data = (await axios.get(`teams/${getters.teamId}/notifications`));
      return data;
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
