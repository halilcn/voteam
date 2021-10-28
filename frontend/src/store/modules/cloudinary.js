import axios from 'axios';

export default {
  state: {},
  mutations: {},
  actions: {
    async postImage(_, payload) {
      const formData = new FormData();
      formData.append('file', payload.file);
      formData.append('folder', payload.folder);

      const res = await axios.post('file', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });

      return res.data;

    }
  },
  getters: {},
  namespaced: true
};
