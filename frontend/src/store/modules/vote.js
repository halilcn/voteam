import axios from 'axios';
import helpers from '../../helpers';
import router from '../../router/index';
import constants from '../constants';

export default {
  state: {
    votes: {
      active: [],
      nextDate: []
    }
  },
  mutations: {
    setActiveVotes(state, payload) {
      // TODO: is_voted olanları en sona alma ?
      state.votes.active = payload;
      console.log(payload);
    },
    setNextDateVotes(state, payload) {
      state.votes.nextDate = payload;
      console.log(payload);
    }
  },
  actions: {
    async getVotes({ commit }) {
      // TODO: data wrap delete ?
      const { data } = await axios.get(`teams/${router.currentRoute.value.params.teamId}/votes`);
      commit('setActiveVotes', data.data.active);
      commit('setNextDateVotes', data.data.next_date);
    },
    async postVote({ dispatch }, payload) {
      const vote = payload;

      if (vote.type === constants.VOTE_TYPES.MULTIPLE) {
        await Promise.all(
          vote.options.map(async option => {
            if (option.type === constants.VOTE_OPTIONS_TYPES.IMAGE) {
              option.path = await dispatch('postVoteImage', option.path);
            }
          })
        );
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
