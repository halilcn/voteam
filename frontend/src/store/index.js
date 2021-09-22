import { createStore } from 'vuex';
import auth from './modules/auth';
import axios from 'axios';
import constants from './constants';

axios.defaults.baseURL = constants.BACKEND_BASE_URL;
axios.defaults.headers.common['Content-type'] = 'application/json;';
axios.defaults.headers.common['Authorization'] = 'asd';
axios.defaults.timeout = 1000;

export default createStore({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    auth
  }
});
