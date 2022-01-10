<template>
  <div class="user-actions">
    <img src="../assets/illustrations/work.png" class="bg-image left-illustration" alt="bg-image"/>
    <img src="../assets/illustrations/graphic.png" class="bg-image right-illustration" alt="bg-image"/>
    <router-link
        class="logo"
        tag="div"
        :to="{name:'Home'}">
      <img src="../assets/logos/voteam.png" alt="votem-logo"/>
    </router-link>
    <div class="content-container">
      <div class="action-list">
        <router-link
            class="login"
            tag="a"
            :to="{name:'Login'}"
            exact-active-class="selected">
          {{ $t('general.userActions.login') }}
        </router-link>
        <router-link
            class="register"
            tag="a"
            :to="{name:'Register'}"
            exact-active-class="selected">
          {{ $t('general.userActions.register') }}
        </router-link>
      </div>
      <div class="form-content">
        <router-view/>
        <router-link
            class="forget-password"
            tag="div"
            :to="{name:'ForgotPassword'}">
          {{ $t('general.userActions.rememberPassword') }}
        </router-link>
      </div>
    </div>
    <div class="helpful-links">
      <router-link
          class="item"
          :to="{name:'Home'}">
        {{ $t('userActions.helpfulLinks.home') }}
      </router-link>
      <div class="circle">
        &#9679;
      </div>
      <router-link
          class="item"
          target="_blank"
          :to="{name:'HowWork'}">
        {{ $t('userActions.helpfulLinks.howWork') }}
      </router-link>
      <div class="circle">
        &#9679;
      </div>
      <router-link
          class="item"
          :to="{name:'About'}">
        {{ $t('userActions.helpfulLinks.about') }}
      </router-link>
    </div>
  </div>
</template>

<script>

export default {
  name: 'UserActions'
};
</script>

<style lang="scss" scoped>
.user-actions {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 450px;
  margin: 0 auto;

  .bg-image {
    width: 33%;
    position: fixed;
    bottom: 0;

    &.left-illustration {
      left: 0;
    }

    &.right-illustration {
      right: 0;
    }
  }

  .logo {
    margin: 50px 0;

    img {
      width: 200px;
    }
  }

  .content-container {
    @include center-md-box-shadow;
    border-radius: 5px;
    background-color: white;
    z-index: 1;
    width: 100%;

    .action-list {
      background-color: white;
      display: flex;
      justify-content: space-around;
      margin: 8px 0;
      padding-bottom: 10px;
      border-bottom: 1px solid #f1f1f1;

      a {
        color: $df-blue-color;
        width: 45%;
        text-align: center;
        padding: 10px;
        cursor: pointer;
        transition: .3s;
        font-weight: 500;
        background-color: $df-very-light-blue-color;
        border-radius: 4px;

        &:hover {
          background-color: #e7f0ff;
        }

        &.selected {
          @include bottom-lr-box-shadow;
          color: white;
          background-color: $df-blue-color;
          transform: scale(1.02);
        }
      }
    }

    .form-content {
      display: flex;
      flex-direction: column;
      padding: 0 20px;

      .forget-password {
        color: $df-mdl-dark-black-color;
        font-weight: 300;
        font-size: 14px;
        margin: 15px 0;

        &:hover {
          color: #414141;
          text-decoration: underline;
        }
      }
    }
  }

  .helpful-links {
    display: flex;
    justify-content: center;
    font-size: 14px;
    font-weight: 500;
    color: $df-black-and-blue-color;
    margin: 40px 0;

    .circle {
      margin: 0 20px;
    }

    .item {
      color: $df-mdl-dark-black-color;

      &:hover {
        text-decoration: underline;
        color: $df-dark-blue-color;
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .user-actions {
    width: 90%;

    .logo {
      img {
        width: 170px;
      }
    }

    .content-container {
      .action-list {
        justify-content: space-around;

        a {
          font-size: 14px;
          padding: 8px;
        }
      }
    }

    .helpful-links {
      font-size: 12px;

      .circle {
        margin: 0 7px;
      }
    }

    .bg-image {
      display: none;
    }
  }
}
</style>
