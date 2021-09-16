<template>
  <div class="register">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek kayıt olmanız gerekir.
    </div>

    <div class="content">
      <div class="data-field-container">
        <input
            class="data-field"
            placeholder="Ad ve Soyad">
      </div>
      <div class="data-field-container">
        <input
            class="data-field"
            placeholder="E-mail">
      </div>
      <div class="data-field-container">
        <input
            class="data-field"
            placeholder="Şifre">
      </div>
      <div class="terms-info">
        <i class="bi bi-info-circle"></i>
        Kayıt olduğunuzda <span>hizmet koşullarını</span> kabul etmiş olursunuz.
      </div>
      <standart-button
          class="continue-btn"
          text="Oluştur"
          is-disable="false"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';

export default {
  name: 'Register',
  components: {
    StandartButton
  }
};
</script>

<style lang="scss" scoped>
.register {

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

    .terms-info {
      font-weight: 200;
      font-size: 13px;
      color: $df-dark-blue-color;

      span {
        color: $df-blue-color;
        cursor: pointer;

        &:hover {
          text-decoration: underline;
        }
      }
    }

    .continue-btn {
      margin-top: 25px;
    }
  }
}
</style>
