import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getSettings({ getters }) {
      const { data } = (await axios.get(`teams/${getters.teamId}/settings`)).data;
      return data;
    },
    async updateSettings({ getters }, payload) {
      console.log(payload);
      await axios.post(`teams/${getters.teamId}/settings`, payload);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
