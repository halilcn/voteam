import axios from 'axios';
import router from '../../router/index';

export default {
  state: {
    user: JSON.parse(localStorage.getItem('user')) ?? null
  },
  mutations: {
    setUser(state, payload) {
      localStorage.setItem('user', JSON.stringify(payload));
      state.user = payload;
    },
    removeUser(state) {
      localStorage.removeItem('user');
      state.user = null;
    }
  },
  actions: {
    async postLogin({ commit }, payload) {
      const { data } = await axios.post('login', payload);
      commit('setUser', data);
      await router.push({ name: 'TeamsList' });
    },
    async postRegister({ dispatch }, payload) {
      await axios.post('register', payload);
      const { email, password } = payload.user;
      await dispatch('postLogin', { email, password });
    },
    async postRegisterEmail(_, payload) {
      const { data } = await axios.post('register/email/send', { email: payload });
      return data.key;
    },
    async postLogout({ commit }) {
      await axios.post('logout');
      commit('removeUser');
      await router.push({ name: 'Home' });
    }
  },
  namespaced: true
};
