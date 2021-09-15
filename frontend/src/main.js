import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import i18n from './localization/index';
import '@lottiefiles/lottie-player';
import helpers from './helpers';

//Global component ??
//Vue.component('PopupWindow', PopupWindow) // global registration - can be used anywhere

const app = createApp(App)
  .use(store)
  .use(router)
  .use(i18n);

app.config.globalProperties.$helpers = helpers;

app.mount('#app');
