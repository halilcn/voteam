import axios from 'axios';
import router from '../../router/index';
import helpers from '../../helpers';

const LOCAL_STORAGE_USER = 'user';
const LOCAL_STORAGE_NEW_USER = 'new_user_status';

export default {
  state: {
    user: JSON.parse(localStorage.getItem(LOCAL_STORAGE_USER)) ?? null,
    newUserStatus: localStorage.getItem(LOCAL_STORAGE_NEW_USER) ?? false
  },
  mutations: {
    setUser(state, payload) {
      localStorage.setItem(LOCAL_STORAGE_USER, JSON.stringify(payload));
      state.user = payload;
    },
    setUserSettings(state, payload) {
      state.user.name = payload.name;
      state.user.image = payload.image;
      state.user.utc = payload.utc;
      localStorage.setItem(LOCAL_STORAGE_USER, JSON.stringify(state.user));
    },
    removeUser(state) {
      localStorage.removeItem(LOCAL_STORAGE_USER);
      state.user = null;
    },
    setNewUserStatus(state) {
      localStorage.setItem(LOCAL_STORAGE_NEW_USER, 'true');
      state.newUser = true;
    },
    removeNewUserStatus(state) {
      localStorage.removeItem(LOCAL_STORAGE_NEW_USER);
      state.newUser = false;
    }
  },
  actions: {
    async postLogin({ commit, dispatch }, payload) {
      const { data } = await axios.post('login', payload);
      commit('setUser', data);
      await dispatch('updateUserLanguage', helpers.getLanguage());
      await window.location.reload();
    },
    async postRegister({ dispatch, commit }, payload) {
      await axios.post('register', payload);
      const { email, password } = payload.user;
      commit('setNewUserStatus');
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
