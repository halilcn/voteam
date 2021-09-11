<template>
  <div class="top-header">
    <div class="logo">
      <img src="@/assets/logos/voteam.png">
    </div>
    <div class="links">
      <router-link
          class="item selected"
          tag="div"
          :to="{name:'Home'}">
        Anasayfa
      </router-link>
      <router-link
          class="item"
          tag="div"
          :to="{name:'Prices'}">
        Fiyatlar
      </router-link>
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

export default {
  name: 'Top',
  components: {
    //!!!
    ChooseLanguage: () => import('../shared/ChooseLanguage')
  }
};
</script>

<style lang="scss" scoped>
.top-header {
  position: sticky;
  z-index: 10;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 15px 0;
  background-color: white;
  box-shadow: 0 0.5px 1.3px rgba(0, 0, 0, 0.014),
  0 1.3px 3.1px rgba(0, 0, 0, 0.02),
  0 2.4px 5.8px rgba(0, 0, 0, 0.025),
  0 4.2px 10.3px rgba(0, 0, 0, 0.03),
  0 7.9px 19.2px rgba(0, 0, 0, 0.036),
  0 19px 46px rgba(0, 0, 0, 0.05);


  .logo {
    img {
      width: 160px;
    }
  }

  .links {
    display: flex;
    color: #02273D;

    .item {
      margin: 0 14px;
      cursor: pointer;
      font-size: 15px;
      padding-bottom: 4px;
      border-bottom: 1px solid white;
      transition: .3s;

      &:hover {
        border-bottom-color: #d0d0d0;
      }

      &.selected {
        color: #2575f1;
        border-bottom-color: #d0d0d0;
      }

    }
  }

  .user-actions {
    display: flex;
    align-items: center;

    div {
      margin: 0 10px;
      cursor: pointer;
      font-weight: 400;
    }

    //3DABF6 açık renk

    .login {
      background-color: #2575f1;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      transition: .3s;

      &:hover {
        background-color: #1d6ce7;
        transform: scale(1.03);
      }
    }

    .register {
      color: #2575f1;
      padding: 5px 10px;
      border-radius: 5px;

      &:hover {
        background-color: #f0f6ff;
      }
    }
  }

  .choose-language {
    position: absolute;
    right: 10px;
  }
}
</style>
