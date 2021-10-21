import axios from 'axios';
import helpers from '../../helpers';

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
      console.log(await axios.get('teams/7082780722/votes'));
    },
    async postVote(_, payload) {
      //vote multiple image var ise, cdn'e kaydedilir !
      const vote = await axios.post(`teams/7082780722/votes`, helpers.convertAllKeys(payload));
      console.log(vote.data);
    }
  },
  getters: {},
  namespaced: true
};
