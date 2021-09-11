import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

/*import VueI18n from 'vue-i18n'
import messages from './localization'

createApp.use(VueI18n)

//locale store state'ten çek !!
const i18n = new VueI18n({
  locale: 'tr',
  fallbackLocale: 'tr',
  messages
})*/

createApp(App)
  .use(store)
  .use(router)
  // .use(i18n)
  .mount('#app')
