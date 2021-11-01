import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import i18n from './localization/index';
import '@lottiefiles/lottie-player';
import helpers from './helpers';
import notify from './others/notify';
import dayjs from './others/dayjs';
import vClickOutside from 'click-outside-vue3';
import { VuelidatePlugin } from '@vuelidate/core';

const app = createApp(App)
  .use(store)
  .use(router)
  .use(VuelidatePlugin)
  .use(i18n);

app.config.globalProperties.$dayjs = dayjs;
app.config.globalProperties.$helpers = helpers;
app.config.globalProperties.$notify = notify;
app.config.globalProperties.handle = helpers.handle;

app.directive('clickOutside', vClickOutside.directive);

app.mount('#app');
