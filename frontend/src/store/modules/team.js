import axios from 'axios';

export default {
  state: {
    teams: []
  },
  mutations: {
    setTeam(state, payload) {
      if (payload instanceof Array) {
        payload.forEach(item => {state.teams.push(item);});
        return;
      }
      state.teams.push(payload);
    }
  },
  actions: {
    async getTeams({ commit }) {
      const { data } = await axios.get('teams');
      console.log(data);
      commit('setTeam', data);
    },
    async postCreateTeam({ commit }, payload) {
      const { data } = await axios.post('teams', payload);
      await commit('setTeam', data);
    }
  },
  getters: {}
};
