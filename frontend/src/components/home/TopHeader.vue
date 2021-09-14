<template>
  <div class="top-header">
    <router-link
        tag="div"
        :to="{name:'Home'}"
        class="desktop-logo">
      <img src="@/assets/logos/voteam.png">
    </router-link>
    <router-link
        tag="div"
        :to="{name:'Home'}"
        class="mobile-logo">
      logo
    </router-link>
    <div class="links">
      <router-link
          class="item"
          tag="div"
          :to="{name:'Home'}"
          exact-active-class="selected">
        {{ $t('homePage.topHeader.links.home') }}
      </router-link>
      <router-link
          class="item"
          tag="div"
          :to="{name:'Prices'}"
          exact-active-class="selected">
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
  padding: 15px $df-dsktp-lr-width-pdn;
  background-color: white;
  width: 100%;

  .desktop-logo {
    img {
      width: 160px;
    }
  }

  .mobile-logo {
    display: none;

    img {

    }
  }

  .links {
    display: flex;
    color: $df-dark-blue-color;
    margin: 0 auto;

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
      padding: 5px 10px;
      border-radius: 5px;
      transition: .3s;
    }

    .login {
      background-color: $df-blue-color;
      color: white;

      &:hover {
        background-color: $df-blue-color-hover-dark;
        transform: scale(1.03);
      }
    }

    .register {
      color: $df-blue-color;

      &:hover {
        background-color: #f0f6ff;
      }
    }
  }

  .choose-language {
  }
}

@media only screen and (max-width: 900px) {
  .top-header {
    justify-content: flex-start;
    padding: 10px $df-mbl-lr-width-pdn;

    .desktop-logo {
      display: none;
    }

    .mobile-logo {
      display: block;
    }

    .links {
      position: absolute;
      bottom: -39px;
      background-color: white;
      width: 100%;
      right: 0;
      padding: 7px;
      justify-content: center;
      @include center-md-box-shadow;

      .item {
        border: 0 !important;
      }
    }

    .user-actions {
      margin-left: auto;

      div {
        margin: 0 5px;
        font-size: 13px;
        padding: 3px 7px;
      }
    }
  }
}

</style>
