import axios from 'axios';

export default {
  state: {},
  mutations: {},
  actions: {
    async postVoteImage(_, payload) {
      console.log(payload);

      const formData = new FormData();
      formData.append('file', payload);

      const res = await axios.post('file', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });
      console.log(res);
    }
  },
  getters: {},
  namespaced: true
};
