import axios from 'axios';

export default {
  state: {
    votes: {}
    /*
    * votes:{
    * active:[],
    * nextDate:[]
    * }*/
  },
  mutations: {
    setVotes(state, payload) {
      state.votes = payload;
    }
  },
  actions: {
    async getVotes() {
      console.log(await axios.get('teams/17/votes'));
    }
  },
  getters: {},
  namespaced: true
};
