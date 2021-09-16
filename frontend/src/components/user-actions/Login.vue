<template>
  <div class="login">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek için kayıt olun
    </div>
    <div class="content">
      <div class="data-field-container">
        <input class="data-field" placeholder="E-mail">
      </div>
      <!--       <div class="data-field-container">
        <input class="data-field has-error" placeholder="Şifre">
        <errors is-input-error="true" :content="['test test test test','sdadka dkjasjdashda hdsa']"/>
      </div>
-->
      <div class="data-field-container">
        <input class="data-field" placeholder="Şifre">
      </div>
      <errors :content="getErrors"/>
      <standart-button
          class="continue-btn"
          text="devam"
          :is-disable="isButtonDisable"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';

export default {
  name: 'Login',
  data() {
    return {
      isButtonDisable: true
    };
  },
  components: {
    StandartButton,
    Errors
  },
  computed: {
    getErrors() {
      return ['hata gata hata ver!', 'bir hata oluştu!'];
    }
  }
};
</script>

<style lang="scss" scoped>
.login {

  .title {
    font-size: 13px;
    font-weight: 400;
    color: $df-mdl-dark-black-color;
    margin-bottom: 10px;
  }

  .content {
    .data-field-container {
      margin: 10px 0;

      input {
        @include std-input;

        &.has-error {
          @include std-input-has-error;
        }
      }
    }

    .continue-btn {
      margin-top: 5px;
    }
  }
}
</style>
