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
      payload.sort((a, b) => {
        return a.is_voted - b.is_voted;
      });

      state.votes.active = payload;
    },
    setNextDateVotes(state, payload) {
      state.votes.nextDate = payload;
    }
  },
  actions: {
    async getVotes({ commit, getters }) {
      const { data } = (await axios.get(`teams/${getters.teamId}/votes`)).data;
      commit('setActiveVotes', data.active);
      commit('setNextDateVotes', data.next_date);
    },
    async postVote({ dispatch, getters }, payload) {
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

      await axios.post(`teams/${getters.teamId}/votes`, helpers.convertAllKeysToSnakeCase(vote));
    },
    async postVoteImage({ dispatch }, payload) {
      const { secure_url } = await dispatch(
        'cloudinary/postImage',
        {
          file: payload,
          folder: 'vote-resources'
        },
        { root: true });

      return secure_url;
    },
    async checkHasPowerTypeVote({ getters }) {
      const { data } = await axios.get(`teams/${getters.teamId}/vote-types/power/check-vote`);
      return data;
    },
    async checkForStorePowerTypeVote({ getters }) {
      const { data } = await axios.get(`teams/${getters.teamId}/vote-types/power/check-store`);
      return data;
    },
    async checkTimeForPostPowerTypeVote({ getters }) {
      const { data } = await axios.get(`teams/${getters.teamId}/vote-types/power/check-time`);
      return data;
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
