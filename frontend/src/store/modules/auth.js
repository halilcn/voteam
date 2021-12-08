import axios from 'axios';
import router from '../../router/index';
import helpers from '../../helpers';

const LOCAL_STORAGE_USER = 'user';

export default {
  state: {
    user: JSON.parse(localStorage.getItem(LOCAL_STORAGE_USER)) ?? null
  },
  mutations: {
    setUser(state, payload) {
      localStorage.setItem(LOCAL_STORAGE_USER, JSON.stringify(payload));
      state.user = payload;
    },
    setUserSettings(state, payload) {
      state.user.name = payload.name;
      state.user.image = payload.image;
      localStorage.setItem(LOCAL_STORAGE_USER, JSON.stringify(state.user));
    },
    removeUser(state) {
      localStorage.removeItem(LOCAL_STORAGE_USER);
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
    async updateUserSettings({ dispatch, commit }, payload) {
      if (payload.image instanceof File) {
        //TODO: vote-images name değiştirilecek.user-images yapılacak
        const { secure_url } = await dispatch(
          'cloudinary/postImage',
          {
            file: payload.image,
            folder: 'vote-images'
          },
          { root: true });

        payload.image = secure_url;
      }

      await axios.put('user/settings', payload);
      commit('setUserSettings', payload);
    }
  },
  namespaced: true
};
