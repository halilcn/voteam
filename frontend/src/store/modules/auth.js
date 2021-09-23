import axios from 'axios';

export default {
  state: {
    user: null
  },
  mutations: {
    setUser(state, payload) {
      localStorage.setItem('user', JSON.stringify(payload));
      state.user = payload;
    },
    removeUser(state) {
      localStorage.removeItem('user');
      state.user = {};
    }
  },
  actions: {
    async postLogin({ commit }, payload) {
      await axios.post('login', payload);
      await commit('setUser', { name: 'halil', token: 212313 });
    }
  },
  getters: {
    checkAuth(state) {
      return !!state.user;
    }
  }
};
