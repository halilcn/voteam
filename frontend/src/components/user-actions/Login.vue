<template>
  <div class="login">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek için kayıt olun
    </div>
    <div class="content">
      <input placeholder="E-mail">
      <standart-button
          class="continue-btn"
          text="devam"
          :is-disable="isButtonDisable"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';

export default {
  name: 'Login',
  data() {
    return {
      isButtonDisable: true
    };
  },
  components: {
    StandartButton
  }
};
</script>

<style lang="scss" scoped>
.login {


  //Ortak ??
  .title {
    font-size: 13px;
    font-weight: 400;
  }

  .content {
    input {
      @include standart-input;
    }

    .continue-btn {
      margin-top: 10px;
    }
  }
}
</style>
