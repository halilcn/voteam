import axios from 'axios';

export default {
  state: {
    teams: []
  },
  mutations: {},
  actions: {
    // ??
    async postCreateTeam() {
      console.log(await axios.post('teams'));
    }
  },
  getters: {}
};
