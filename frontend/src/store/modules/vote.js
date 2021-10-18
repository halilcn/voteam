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
    },
    async postVote(_, payload) {
      console.log(payload);
      const vote = await axios.post('teams/17/votes', payload);
      console.log(vote.data);
    }
  },
  getters: {},
  namespaced: true
};
