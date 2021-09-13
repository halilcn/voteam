import tr from './langs/tr';
import en from './langs/en';
import helpers from '../helpers';
import { createI18n } from 'vue-i18n/dist/vue-i18n.esm-bundler.js';

const messages = {
  tr,
  en
};

const i18n = createI18n({
  locale: helpers.getLanguage(),
  messages
});

export default i18n;
