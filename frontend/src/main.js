import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import i18n from './localization/index';
import '@lottiefiles/lottie-player';
import helpers from './helpers';
import notify from './notify';

import { VuelidatePlugin } from '@vuelidate/core';

//Global component ??
//Vue.component('PopupWindow', PopupWindow) // global registration - can be used anywhere

//import useVuelidate from '@vuelidate/core';

const app = createApp(App)
  .use(store)
  .use(router)
  .use(VuelidatePlugin)
  .use(i18n);

app.config.globalProperties.$helpers = helpers;
app.config.globalProperties.$notify = notify;
app.config.globalProperties.handle = helpers.handle;

app.mount('#app');
