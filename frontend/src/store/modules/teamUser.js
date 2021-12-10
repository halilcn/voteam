import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getUsersOfTeam({ getters }) {
      const { data } = (await axios.get(`teams/${getters.teamId}/users`)).data;
      return data;
    },
    async postUserInvitation({ getters }, payload) {
      await axios.post(`teams/${getters.teamId}/invitations`, payload);
    },
    async deleteUserOfTeam({ getters }, payload) {
      console.log(await axios.delete(`teams/${getters.teamId}/users/${payload}`));
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
