import axios from 'axios';

export default {
  state: {},
  mutations: {},
  actions: {
    async postImage(_, payload) {
      const data = new FormData();
      // data.append('cloud_name', 'test');
      data.append('upload_preset', 'ml_default');
      data.append('file', payload);

      await axios.post('https://api.cloudinary.com/v1_1/dbaeatlkx/image/upload', {
        body: data
      })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  getters: {},
  namespaced: true
};
