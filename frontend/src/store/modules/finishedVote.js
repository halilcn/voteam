import axios from 'axios';
import router from '../../router/index';

export default {
  state: {
    teams: []
  },
  mutations: {},
  actions: {
    async getFinishedVotes({ getters }) {
      console.log(await axios.get(`teams/${getters.teamId}/finished-votes`));
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
