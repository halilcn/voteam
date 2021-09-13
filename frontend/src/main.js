import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import i18n from './localization/index';

createApp(App)
  .use(store)
  .use(router)
  .use(i18n)
  .mount('#app');
