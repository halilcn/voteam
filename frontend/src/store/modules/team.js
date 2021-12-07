import axios from 'axios';
import router from '../../router/index';

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
      commit('setTeam', data);
    },
    async postCreateTeam({ commit }, payload) {
      const { data } = await axios.post('teams', payload);
      commit('setTeam', data);
    },
    async postJoinTeam({ commit }, payload) {
      const { data } = await axios.post('team/join/team-code', payload);
      commit('setTeam', data);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
