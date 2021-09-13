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
        {{ $t('homePage.topHeader.links.home') }}
      </router-link>
      <router-link
          class="item"
          tag="div"
          :to="{name:'Prices'}">
        {{ $t('homePage.topHeader.links.pricing') }}
      </router-link>
      <div class="item">
        {{ $t('homePage.topHeader.links.about') }}
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
import ChooseLanguage from '../shared/ChooseLanguage';

export default {
  name: 'Top',
  components: {
    //!!! !!!!!!!!!!!
    ChooseLanguage: ChooseLanguage
  }
};
</script>

<style lang="scss" scoped>
.top-header {
  @include bottom-md-box-shadow;
  position: sticky;
  z-index: 10;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 15px 0;
  background-color: white;


  .logo {
    img {
      width: 160px;
    }
  }

  .links {
    display: flex;
    color: $df-dark-blue-color;

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
        color: $df-blue-color;
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

    .login {
      background-color: $df-blue-color;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      transition: .3s;

      &:hover {
        background-color: $df-blue-color-hover-dark;
        transform: scale(1.03);
      }
    }

    .register {
      color: $df-blue-color;
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
