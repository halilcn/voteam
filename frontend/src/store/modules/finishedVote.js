import axios from 'axios';
import router from '../../router/index';

export default {
  state: {
    finishedVotes: [],
    hasMoreFinishedVotes: false,
    finishedVotesCount: 0
  },
  mutations: {
    setFinishedVotes(state, payload) {
      state.finishedVotes = [...state.finishedVotes, ...payload];
    },
    clearFinishedVotes(state) {
      state.finishedVotes = [];
    },
    setFinishedVotesCount(state, payload) {
      state.finishedVotesCount += payload;
    },
    setHasMoreFinishedVotes(state, payload) {
      const FINISHED_VOTE_LIMIT = 12;
      state.hasMoreNotifications = FINISHED_VOTE_LIMIT % payload === 0;
    }
  },
  actions: {
    async getFinishedVotes({ getters, commit, state }, payload = undefined) {
      let totalFinishedVoteCount = '';
      if (typeof payload === 'undefined') commit('clearFinishedVotes');

      if (typeof payload !== 'undefined') totalFinishedVoteCount = `?totalFinishedVoteCount=${state.finishedVotesCount}`;

      const { data } = (await axios.get(`teams/${getters.teamId}/finished-votes${totalFinishedVoteCount}`)).data;

      commit('setFinishedVotes', data);
      commit('setFinishedVotesCount', data.length);
      commit('setHasMoreFinishedVotes', data.length);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
