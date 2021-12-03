import axios from 'axios';
import router from '../../router/index';
import helpers from '../../helpers';

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
    async postLogin({ commit, dispatch }, payload) {
      const { data } = await axios.post('login', payload);
      commit('setUser', data);
      await dispatch('updateUserLanguage', helpers.getLanguage());
      await window.location.reload();
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
    },
    async updateUserLanguage({ state }, payload) {
      if (state.user != null) {
        await axios.put('user/language', { language: payload }, {
          headers: {
            Authorization: `Bearer ${state.user.token}`
          }
        });
      }
    },
    async updateUserSettings({ dispatch }, payload) {
      if (payload.image instanceof File) {
        const { secure_url } = await dispatch(
          'cloudinary/postImage',
          {
            file: payload.image,
            folder: 'user-images'
          },
          { root: true });
        console.log(secure_url);

        payload.image = secure_url;
      }

      const res = await axios.put('user/settings', payload);
      console.log(res);
    }
  },
  namespaced: true
};
