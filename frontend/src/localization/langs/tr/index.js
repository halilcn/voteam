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
    general: {
      vote: {
        types: {
          multipleVote: 'Çoklu Oylama',
          acceptRefuseVote: 'Kabul/Red Oylaması',
          powerVote: 'Güç Oylaması'
        },
        acceptRefuseVote: {
          accepted: 'Kabul Edilmiş',
          rejected: 'Reddedilmiş'
        }
      }
    },
    top: {
      userMenu: {
        editProfile: 'Profili Düzenle',
        logout: 'Çıkış Yap'
      },
      userNotifications: {
        title: 'Bildirimler',
        loadMore: 'daha fazla yükle',
        noNotification: 'Hiç bildirim yok'
      }
    },
    leftSideBar: {
      home: 'Anasayfa',
      members: 'Üyeler',
      notifications: 'Bildirimler',
      settings: 'Ayarlar'
    },
    home: {
      voteList: {
        votes: 'Oylamalar',
        powerVote: 'Güç Oylaması',
        finishedVotes: 'Bitmiş Oylamalar',
        startVote: 'Oylama Başlat',
        powerVoteNeeded: 'Güç oylaması gerekir',
        needToJoinPowerVote: 'Güç oylamasına katılman gerekir',
        activeVotes: {
          title: 'Aktif Oylamalar',
          voted: 'Oy Verilmiş !',
          noActiveVotes: 'Aktif oylama hiç yok'
        },
        nextVotes: {
          title: 'Gelecek Oylamalar',
          shouldPowerVoteInfo: 'Güç oylamasının her ay yapılması zorunludur',
          noNextVotes: 'Gelecek oylama hiç yok'
        }
      },
      teamInfo: {
        team: 'Takım',
        codeCopied: 'Kod kopyalandı !',
        membersCount: 'Üye Sayısı',
        totalStartedVotes: 'Toplam Başlatılan Oylama',
        membersTurnoutToVote: 'Oylara Katılım Oranı',
        notCalculated: 'Henüz hesaplanmamış'
      }
    },
    members: {
      top: {
        members: 'Üyeler',
        member: 'üye',
        invitesWaiting: 'davet bekliyor',
        memberInvitation: 'Üye Daveti'
      },
      list: {
        delete: 'çıkar',
        totalVotes: 'Toplam Oylama',
        notStartVote: 'Henüz oylama başlatmamış',
        sentInvitation: 'Davetiye gönderildi'
      }
    },
    notifications: {
      title: 'Bildirimler',
      moreNotifications: 'daha fazla göster'
    },
    settings: {
      title: 'Ayarlar',
      updatedSettings: 'Ayarlar Güncellendi',
      team: {
        title: 'TAKIM AYARLARI',
        name: 'Takım Adı',
        image: 'Takım Fotoğrafı',
        change: 'Değiştir',
        fieldEmptyInfo: 'Alanlar boş bırakılamaz',
        save: 'Kaydet'
      },
      member: {
        title: 'ÜYE AYARLARI',
        leaveTeamInfo: 'Takımdan çıktığında başlattığın oylamalar veya verdiğin oylar silinmez.',
        leaveTeamInfoUnderlined: 'Sahip olduğun güç puanı silinir.',
        leaveTeam: 'Takımdan Çık'
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
        invitationInfo: 'Eğer daha önce takım daveti atıldıysa e-mail adresini kontrol etmeyi unutma.'
      }
    },
    createVote: {
      title: 'Oylama Başlat',
      content: {
        back: 'geri',
        createVote: 'Oylama Başlat',
        startedVote: 'Oylama Başlatıldı',
        items: {
          endDate: {
            endTime: 'Bitiş Zamanı',
            day: 'gün'
          },
          startDate: {
            startTime: 'Başlama Zamanı',
            startNow: 'Hemen Başlat',
            startNextDate: 'İleri Tarih Seç'
          },
          title: {
            text: 'Başlık'
          }
        },
        multipleVote: {
          options: 'Oy Seçenekleri',
          optionText: 'Oy seçeneğini kısaca açıkla...',
          selectedImage: 'Fotoğraf Seçildi.',
          showImage: 'Görüntüle',
          noOptions: 'Henüz oy seçeneği eklenmemiş',
          add: 'ekle'
        },
        doubleVote: {
          voteTitle: 'Ne Oylanacak ?',
          voteExplanation: 'Oylanacak konuyu kısaca açıkla...'
        }
      }
    },
    firstPowerVote: {
      title: 'Güç Oylaması',
      content: {
        info: {
          hasMoreThanLowerLimitUsers: 'İlk güç oylamasını başlatmak için en az 3 üye bulunmalıdır.',
          hasActiveVote: 'Güç oylaması başlatılmış. Oylama sonlandığında, farklı tipte oylamalar başlatılabilir.',
          powerVote: 'Takım oluşturulduktan sonra güç oylaması yapılması zorunludur. İlk güç oylaması yapıldıktan sonra diğer tip oylamalar başlatılabilir.'
        },
        createVote: 'Güç Oylamasını Başlat',
        firstPowerVoteText: 'İlk Güç Oylaması',
        startedVote: 'Oylama başlatıldı'
      }
    },
    finishedVote: {
      title: 'Bitmiş Oylamalar',
      content: {
        list: {
          showAnswer: 'sonuçları gör',
          waitInfo: 'sonuçlandırılıyor',
          moreFinishedVote: 'daha fazla gör'
        },
        detail: {
          back: 'geri',
          endTime: 'Oylama Bitiş Tarihi',
          totalVoteTime: 'Toplam Oylama Süresi',
          day: 'gün',
          multipleVote: {
            showImage: 'Fotoğrafı Görüntüle'
          }
        }
      }
    },
    userVote: {
      title: 'Oy Ver',
      content: {
        percentageOfUsersVoted: 'Oylamaya Katılım Oranı',
        endTime: '{day} bitiyor',
        voted: 'Oy Verildi !',
        powerVote: {
          power: 'birim güç',
          tooMuchPower: 'Birim Güç Kaldı',
          allPowerDeployed: 'Tüm Birim Güçler Dağıtıldı',
          fullPower: 'kalan birim güçleri dağıt',
          voteInfo: 'Toplamda {usersCount} üye var. Güçler eşit dağıtılmak istenirse her üyeye {power} birim güç verilebilir.',
          send: 'Gönder'
        },
        multipleVote: {
          imageVote: 'Fotoğraflı Seçenek',
          show: 'Görüntüle',
          send: 'Oy Ver'
        },
        acceptRefuseVote: {
          accept: 'Kabul Et',
          reject: 'Reddet'
        }
      }
    },
    userInvitation: {
      title: 'Üye Daveti',
      content: {
        name: 'Ad ve Soyad',
        email: 'E-mail',
        emailInfo: 'Eğer kayıtlı kullanıcıyı davet etmek istiyorsanız, kayıt olduğu e-mail adresini yazmalısınız.',
        isUserAlreadyMember: 'Bu kullanıcı zaten üye',
        sendInvitation: 'Davetiye Gönder'
      }
    },
    userEdit: {
      title: 'Profili Düzenle',
      content: {
        email: 'E-mail',
        nameAndSurname: 'Ad ve Soyad',
        image: 'Fotoğraf',
        uploadImage: 'Fotoğraf Yükle',
        timeZone: 'Saat Dilimi (UTC+14/-12)',
        updatedSettings: 'Bilgiler güncellendi',
        save: 'Kaydet'
      }
    },
    continue: {
      yes: 'evet',
      no: 'hayır'
    },
    image: {
      title: 'Image'
    }
  },
  errors,
  customErrors,
  notifyMessages
};
