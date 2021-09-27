import axios from 'axios';

export default {
  state: {
    user: localStorage.getItem('user') || null
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
      await commit('setUser', data);
    },
    postRegister() {

    },
    async postRegisterEmail(_, payload) {
      const { data } = await axios.post('register/email/send', { email: payload });
      console.log(data);
    },
    async postLogout({ commit }) {
      await axios.post('logout');
      await commit('removeUser');
    }
  },
  getters: {
    checkAuth(state) {
      return !!state.user;
    }
  }
};
