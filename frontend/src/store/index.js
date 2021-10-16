import { createStore } from 'vuex';
import auth from './modules/auth';
import team from './modules/team';
import vote from './modules/vote';
import axios from 'axios';
import constants from './constants';

axios.defaults.baseURL = constants.BACKEND_BASE_URL;
axios.defaults.headers.common['Content-type'] = 'application/json;';
axios.defaults.headers.common['Authorization'] = `Bearer ${auth.state.user?.token}`;
axios.defaults.timeout = 120000;

export default createStore({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    auth,
    team,
    vote
  }
});
