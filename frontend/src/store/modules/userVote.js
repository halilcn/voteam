import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getVote({ getters }, payload) {
      const { data } = (await axios.get(`teams/${getters.teamId}/votes/${payload}`)).data;
      return data;
    },
    async postAnswerVote(_, payload) {
      await axios.post(`votes/${payload.voteId}/voted-users`, payload);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
