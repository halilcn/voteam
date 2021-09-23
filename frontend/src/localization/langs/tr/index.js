import errors from './errors';
import customErrors from './custom-errors';

export default {
  general:{
    userActions: {
      register: 'Kayıt Ol',
      login: 'Giriş Yap'
    },
  },
  homePage: {
    topHeader: {
      links: {
        home: 'Anasayfa',
        pricing: 'Fiyatlar',
        about: 'Hakkında'
      }
    }
  },
  footer: {
    text: '© Copyright 2021. Tüm hakları saklıdır.'
  },
  errors,
  customErrors
};
