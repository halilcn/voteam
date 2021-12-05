import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async checkTeamUser({ getters }, payload) {
      const { team_has_user } = (await axios.get(`teams/${payload ?? getters.teamId}/check-user`)).data;
      return team_has_user;
    },
    async getTeamInfo({ getters }) {
      const { data } = await axios.get(`teams/${getters.teamId}/info`);
      return data.data;
    },
    async getTeamSettings({ getters }) {
      console.log('settings get çalıştı !');
      console.log(await axios.get(`teams/${getters.teamId}/settings`).data);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
