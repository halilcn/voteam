import errors from './errors';
import customErrors from './custom-errors';
import notifyMessages from './notify-messages';

export default {
  general: {
    userActions: {
      register: 'Kayıt Ol',
      login: 'Giriş Yap',
      rememberPassword: 'Şifren mi unuttun ?'
    },
    input: {
      email: 'E-mail',
      password: 'Şifre',
      newPassword: 'Yeni Şifre',
      repeatNewPassword: 'Yeni Şifre Tekrar',
      nameAndSurname: 'Ad ve Soyad'
    },
    others: {
      termsOfService: 'Hizmet Koşulları'
    }
  },
  home: {
    topHeader: {
      links: {
        home: 'Anasayfa',
        pricing: 'Fiyatlar',
        about: 'Hakkında'
      }
    },
    content: {}
  },
  pricing: {
    title: {
      first: 'Ömür boyu tamamen',
      second: 'ücretsiz'
    }
  },
  userActions: {
    helpfulLinks: {
      home: 'Home',
      pricing: 'Pricing',
      about: 'About'
    }
  },
  login: {
    infoText: 'Hoşgeldin!',
    loginButton: 'Giriş Yap',
    wrongEmailOrPassword: 'E-mail ya da şifre yanlış'
  },
  register: {
    infoText: 'Takım oluşturmak veya takımlara katılmak için kayıt olmak gerekir.',
    registerButton: 'Hesap Oluştur',
    sendCodeButton: 'Kod Gönder',
    resendCodeButton: 'Tekrar Kod Gönder',
    codeSent: 'Kod gönderildi. Gelen kodu aşağıya yazınız.',
    termsOfServiceText: 'kabul edilmiş sayılır.'
  },
  footer: {
    text: '© Copyright 2021. Tüm hakları saklıdır.'
  },
  dashboard: {
    members: {
      invitation: {
        isUserAlreadyMember: 'Bu kullanıcı zaten üye'
      }
    }
  },
  errors,
  customErrors,
  notifyMessages
};
