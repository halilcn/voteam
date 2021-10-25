//import axios from 'axios';

/*var cloudinary = require('cloudinary/cloudinary').v2;

cloudinary.config({
  cloud_name: 'voteam',
  api_key: '319662467781978',
  api_secret: 'eZBhHBYknlMseB3pYEQzT6grJFE'
});
*/
export default {
  state: {},
  mutations: {},
  actions: {
    async postVoteImage(_, payload) {
      console.log(payload);
      console.log('cloudinary');
      return 'test.png';

      /* cloudinary.uploader.upload(payload, (err, result) => { // content is the name of the image input on the front end form
         console.log(err);
         console.log(result);
       });*/

      /*const data = new FormData();
      // data.append('cloud_name', 'test');
      //data.append('upload_preset', 'ml_default');
      //data.append('api_key', '319662467781978');
      // data.append('signature', 'ml_default');
      data.append('file', payload);

      await axios.post(`https://api.cloudinary.com/v1_1/voteam/image/upload?api_key=319662467781978`, {
        body: data
      }, {
        headers: {
          'content-type': 'multipart/form-data',
          'Access-Control-Allow-Origin': '*'
        }
      })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });*/

    }
  },
  getters: {},
  namespaced: true
};
