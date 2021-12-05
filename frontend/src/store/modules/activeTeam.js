import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getTeamInfo({ getters }) {
      const { data } = await axios.get(`teams/${getters.teamId}/info`);
      return data.data;
    },
    async getTeamSettings({ getters }) {
      console.log('settings get çalıştı !');
      console.log(await axios.get(`teams/${getters.teamId}/settings`));
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
