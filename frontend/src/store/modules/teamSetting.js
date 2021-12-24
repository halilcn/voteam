import axios from 'axios';
import router from '../../router/index';

export default {
  state: {},
  mutations: {},
  actions: {
    async getSettings({ getters }) {
      const { data } = (await axios.get(`teams/${getters.teamId}/settings`)).data;
      return data;
    },
    async updateSettings({ getters, dispatch }, payload) {
      if (payload.image instanceof File) {
        //TODO: vote-images name değiştirilecek.team-images yapılacak
        const { secure_url } = await dispatch(
          'cloudinary/postImage',
          {
            file: payload.image,
            folder: 'vote-images'
          },
          { root: true });

        payload.image = secure_url;
      }

      await axios.put(`teams/${getters.teamId}/settings`, payload);
    }
  },
  getters: {
    teamId() {
      return router.currentRoute.value.params.teamId;
    }
  },
  namespaced: true
};
