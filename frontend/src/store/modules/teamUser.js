import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getUsersOfTeam({ getters }) {
      console.log(await axios.get(`teams/${getters.teamId}/users`));
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
