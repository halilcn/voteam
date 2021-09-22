import axios from 'axios';

export default {
  state: {
    user: {}
  },
  mutations: {
    setUser(state, payload) {
      state.user = payload;
    }
  },
  actions: {
    async postLogin(_, payload) {
      const res = await axios.post('login', payload);
      console.log(res);
      return res;
    }
  },
  modules: {}
};
