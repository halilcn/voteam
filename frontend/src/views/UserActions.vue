<template>
  <div class="user-actions">
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
  justify-content: center;
  align-items: center;

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
      padding: 20px;
    }
  }
}
</style>
