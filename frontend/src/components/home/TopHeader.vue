<template>
  <div class="top-header">
    <div class="logo">
      <img src="@/assets/logo.png">
    </div>
    <div class="links">
      <div class="item">
        Anasayfa
      </div>
      <div class="item">
        Fiyatlar
      </div>
      <div class="item">
        Hakkımızda
      </div>
    </div>
    <div class="user-actions">
      <div class="register">
        Kayıt Ol
      </div>
      <div class="login">
        Giriş Yap
      </div>
    </div>
    <choose-language class="choose-language"/>
  </div>
</template>

<script>
import ChooseLanguage from '@/components/shared/ChooseLanguage'

export default {
  name: 'Top',
  components: {
    ChooseLanguage
  }
}
</script>

<style lang="scss" scoped>
.top-header {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: space-around;
  box-shadow: 0 0.5px 1.3px rgba(0, 0, 0, 0.014),
  0 1.3px 3.1px rgba(0, 0, 0, 0.02),
  0 2.4px 5.8px rgba(0, 0, 0, 0.025),
  0 4.2px 10.3px rgba(0, 0, 0, 0.03),
  0 7.9px 19.2px rgba(0, 0, 0, 0.036),
  0 19px 46px rgba(0, 0, 0, 0.05);


  .logo {
    img {
      width: 80px;
    }
  }

  .links {
    display: flex;
    color: #02273D;

    .item {
      margin: 0 7px;
      cursor: pointer;
      font-size: 14px;
    }
  }

  .user-actions {
    display: flex;
    align-items: center;

    div {
      margin: 0 4px;
      cursor: pointer;
      font-weight: 400;
    }

    //3DABF6 açık renk

    .login {
      background-color: #2575f1;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
    }

    .register {
      color: #2575f1;
    }
  }

  .choose-language {
    position: absolute;
    right: 10px;
  }
}
</style>
