import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getUsersOfTeam({ getters }) {
      console.log(await axios.get(`teams/${getters.teamId}/users`));
    },
    async postUserInvitation({ getters }, payload) {
      console.log(payload);
      console.log(await (axios.post(`teams/${getters.teamId}/invitations`, payload)));
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
