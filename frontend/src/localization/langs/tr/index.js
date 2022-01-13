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
        howWork: 'Nasıl Çalışır ?',
        about: 'Hakkında'
      }
    },
    content: {
      itemOne: {
        title: 'yeni nesil oylama sağlar.',
        info: 'takımdaki kararları demokratik şekilde almayı sağlar. İş, okul ya da herhangi bir sebep için demokratik kararlar alan bir takım arıyorsanız voteam tam sizin içindir.',
        createTeamBtn: 'Takım Oluştur'
      },
      itemTwo: {
        title: 'Oylar gizlidir ve farklı güçlerdedir.',
        info: ' Herhangi bir tipte oylama başlatıldığında, takımdaki herkesin verdiği oy gizli ve farklı güçtedir.' +
          'Oy güçleri her üyeye takım arkadaşları tarafından dağıtılır. Dağıtılan bu güçleri takım lideri dahil hiç kimse göremez.' +
          'voteam üyelerin oylarını ve oy güçlerini belirli algoritmalardan geçirerek oylamayı sonuçlandırır.'
      },
      itemThree: {
        title: 'Takım bütünlüğünü sağlar.',
        info: 'voteam üyeler arasındaki güç belirsizliklerini ortadan kaldırarak, işinize odaklanmanızı sağlar.'
      }
    }
  },
  pricing: {
    title: {
      first: 'Ömür boyu tamamen',
      second: 'ücretsiz'
    }
  },
  userActions: {
    helpfulLinks: {
      home: 'Anasayfa',
      howWork: 'Nasıl Çalışır ?',
      about: 'Hakkında'
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
    resendCodeButton: 'Tekrar Gönder',
    codeSent: 'Kod gönderildi. Gelen kodu aşağıya yazınız.',
    termsOfServiceText: 'kabul edilmiş sayılır.'
  },
  forgotPassword: {
    infoText: 'E-mail adresini girerek şifreni değiştirebilirsin.',
    sendCodeButton: 'Şifre Sıfırla',
    wrongEmail: 'Bu e-mail hesabıyla kayıtlı kullanıcı yok',
    sentCodeInfo: ' Şifre sıfırlamak için e-mail gönderildi. 2 saat sonra şifre sıfırlama linki otomatik olarak silinir.'
  },
  footer: {
    text: '© Copyright 2022. Tüm hakları saklıdır.'
  },
  teams: {
    actions: {
      buttons: {
        createTeam: 'Takım Oluştur',
        joinTeam: 'Takıma Katıl',
        signOut: 'Çıkış Yap'
      }
    },
    list: {
      teamCode: 'Takım Kodu',
      membersCount: 'Üye Sayısı',
      noTeams: 'Şuan hiç takımın yok. Takım oluşturabilir ya da takımlara katılabilirsin.'
    }

  },
  dashboard: {
    members: {
      invitation: {
        isUserAlreadyMember: 'Bu kullanıcı zaten üye'
      }
    }
  },
  popups: {
    createTeam: {
      title: 'Takım Oluştur',
      content: {
        teamName: 'Takım Adı',
        info: 'Oluşturduğun takıma lider olarak atanırsın.',
        create: 'Oluştur'
      }
    },
    joinTeam: {
      title: 'Takıma Katıl',
      content: {
        info: 'Takıma katılmak için takımın kodu gerekir.',
        join: 'Katıl',
        wrongCode: 'Girilen kod yanlış ya da bu takıma daha önce katıldın.',
        joinedTeam: 'Takıma katıldın !'
      }

    },
    welcomeUser: {
      title: 'İlk Bakış',
      content: {
        welcome: 'voteam"e hoşgeldin !',
        firstStep: 'İster kendi takım ismini girerek takım oluştur, ister takım koduyla takıma katıl.',
        invitationInfo:'Eğer daha önce takım daveti atıldıysa e-mail adresini kontrol etmeyi unutma.'
      }
    }
  },
  errors,
  customErrors,
  notifyMessages
};
