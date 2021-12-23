import { createStore } from 'vuex';
import auth from './modules/auth';
import team from './modules/team';
import teamUser from './modules/teamUser';
import teamNotification from './modules/teamNotification';
import teamSetting from './modules/teamSetting';
import vote from './modules/vote';
import userVote from './modules/userVote';
import cloudinary from './modules/cloudinary';
import userNotification from './modules/userNotification';
import activeTeam from './modules/activeTeam';
import axios from 'axios';
import constants from './constants';

axios.defaults.baseURL = constants.BACKEND_BASE_URL;
axios.defaults.headers.common['Authorization'] = `Bearer ${auth.state.user?.token}`;
axios.defaults.timeout = 120000;

export default createStore({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    auth,
    team,
    teamNotification,
    teamSetting,
    teamUser,
    activeTeam,
    vote,
    userVote,
    userNotification,
    cloudinary
  }
});
