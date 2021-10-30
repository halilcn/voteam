import axios from 'axios';
import helpers from '../../helpers';
import router from '../../router/index';
import constants from '../constants';

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
    async postVote({ dispatch }, payload) {
      const vote = payload;

      if (vote.type === constants.VOTE_TYPES.MULTIPLE) {
        await vote.options.map(async option => {
          if (option.type === constants.VOTE_OPTIONS_TYPES.IMAGE) {
            option.path = await dispatch('postVoteImage', option.path);
          }
        });
      }

      //TODO: Created olduktan sonra state'e eklenmesi ?
      const { data } = await axios.post(`teams/${router.currentRoute.value.params.teamId}/votes`, helpers.convertAllKeysToSnakeCase(vote));
      console.log(data);
    },
    async postVoteImage({ dispatch }, payload) {
      const { secure_url } = await dispatch(
        'cloudinary/postImage',
        {
          file: payload,
          folder: 'vote-images'
        },
        { root: true });

      return secure_url;
    }
  },
  getters: {},
  namespaced: true
};
