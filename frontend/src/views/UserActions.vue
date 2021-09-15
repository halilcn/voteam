<template>
  <div class="user-actions">
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
          Şifremi sıfırla
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
    overflow: auto;

    .action-list {
      background-color: white;
      display: flex;

      a {
        background-color: $df-blue-color;
        width: 100%;
        text-align: center;
        padding: 10px;
        cursor: pointer;
        color: white;
        transition: .3s;
        font-weight: 500;

        &.selected {
          background-color: white;
          color: $df-blue-color;
        }
      }
    }

    .form-content {
      display: flex;
      flex-direction: column;
      padding: 20px;

      .forget-password {
        color: #808080;
        font-weight: 300;
        font-size: 14px;
        margin: 15px 0;

        &:hover {
          color: #626262;
          text-decoration: underline;
        }
      }
    }
  }
}
</style>
