<template>
  <div class="login">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek için kayıt olun
    </div>
    <div class="content">
      <div class="data-field-container">
        <input class="data-field has-error" placeholder="E-mail">
        <error :content="['Geçersiz e-mail']"/>
      </div>
      <div class="data-field-container">
        <input class="data-field" placeholder="Şifre">
      </div>
      <error :content="getErrors"/>
      <standart-button
          class="continue-btn"
          text="devam"
          :is-disable="isButtonDisable"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Error from '../shared/Errors';

export default {
  name: 'Login',
  data() {
    return {
      isButtonDisable: true
    };
  },
  components: {
    StandartButton,
    Error
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


  //Ortak ??
  .title {
    font-size: 13px;
    font-weight: 400;
    color: $df-dark-blue-color;
    margin-bottom: 10px;
  }

  .content {
    .data-field-container {
      margin: 10px 0;

      input {
        @include standart-input;

        &.has-error {
          border-color: $df-very-light-red-color;
        }
      }

    }

    .continue-btn {
      margin-top: 5px;
    }

    .errors {


    }
  }
}
</style>
