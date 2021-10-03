import axios from 'axios';

export default {
  state: {
    teams: []
  },
  mutations: {
    setTeam(state, payload) {
      if (payload instanceof Array) {
        state.teams = payload;
        return;
      }
      state.teams.unshift(payload);
    }
  },
  actions: {
    async getTeams({ commit }) {
      const { data } = await axios.get('teams');
      await commit('setTeam', data);
    },
    async postCreateTeam({ commit }, payload) {
      const { data } = await axios.post('teams', payload);
      await commit('setTeam', data);
    }
  },
  getters: {},
  namespaced: true
};
