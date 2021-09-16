<template>
  <div class="user-actions">
    <img src="../assets/illustrations/work.png" class="bg-image left-illustration"/>
    <img src="../assets/illustrations/graphic.png" class="bg-image right-illustration"/>
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
          Giriş Yap
        </router-link>
        <router-link
            class="register"
            tag="a"
            :to="{name:'Register'}"
            exact-active-class="selected">
          Kayıt Ol
        </router-link>
      </div>
      <div class="form-content">
        <router-view/>
        <router-link
            class="forget-password"
            tag="div"
            :to="{name:'ForgotPassword'}">
          Şifren mi unuttun ?
        </router-link>
      </div>
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
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;

  .bg-image {
    width: 370px;
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
    width: 450px;
    border-radius: 5px;

    .action-list {
      background-color: white;
      display: flex;
      justify-content: space-around;
      margin: 8px 0;

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

        &:hover{
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
      padding: 20px;

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
}
</style>
