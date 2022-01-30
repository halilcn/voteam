<template>
  <div class="top-header">
    <router-link
        tag="div"
        :to="{name:'Home'}"
        class="desktop-logo">
      <img src="../../assets/logos/voteam.png" alt="logo"/>
    </router-link>
    <router-link
        tag="div"
        :to="{name:'Home'}"
        class="mobile-logo">
      <img src="../../assets/logos/voteam.png" alt="logo"/>
    </router-link>
    <div class="links">
      <router-link
          class="item"
          tag="div"
          :to="{name:'Home'}"
          exact-active-class="selected">
        {{ $t('home.topHeader.links.home') }}
      </router-link>
      <router-link
          class="item"
          tag="div"
          :to="{name:'About'}"
          exact-active-class="selected">
        {{ $t('home.topHeader.links.about') }}
      </router-link>
      <router-link
          class="item"
          tag="div"
          target="_blank"
          :to="{name:'HowWork'}"
          exact-active-class="selected">
        {{ $t('home.topHeader.links.howWork') }}
      </router-link>
    </div>
    <div class="user-actions">
      <router-link
          class="register"
          :to="{name:'Register'}">
        {{ $t('general.userActions.register') }}
      </router-link>
      <router-link
          class="login"
          :to="{name:'Login'}">
        {{ $t('general.userActions.login') }}
      </router-link>
    </div>
    <choose-language/>
  </div>
</template>

<script>
import ChooseLanguage from '../shared/ChooseLanguage';

export default {
  name: 'Top',
  components: {
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
  border-radius: 5px;

  .desktop-logo {
    img {
      width: 160px;
    }
  }

  .mobile-logo {
    display: none;

    img {
       width: 100px;
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
      border-bottom: 2px solid white;
      transition: .3s;
      color: $df-black-and-blue-color;

      &:hover {
        border-bottom-color: #dbe9ff;
        border-radius: 2px;
      }

      &.selected {
        color: $df-blue-color;
        border-bottom-color: #dbe9ff;
      }

    }
  }

  .user-actions {
    display: flex;
    padding-right: 10px;

    a {
      margin: 0 10px;
      cursor: pointer;
      font-weight: 500;
      padding: 5px 10px;
      border-radius: 5px;
      transition: .3s;
    }

    .login {
      background-color: $df-blue-color;
      color: white;

      &:hover {
        background-color: $df-blue-color-hover-dark;
        transform: translateY(-2px);
        @include bottom-lr-box-shadow;
      }
    }

    .register {
      color: $df-blue-color;

      &:hover {
        background-color: #f0f6ff;
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
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

      a {
        margin: 0 5px;
        font-size: 13px;
        padding: 3px 7px;
      }
    }
  }
}

</style>
