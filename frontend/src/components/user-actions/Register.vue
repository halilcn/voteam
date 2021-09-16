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
      <div class="data-field-container email-confirmation">
        <input
            class="data-field"
            placeholder="E-mail">
        <div class="send-code-btn disable">
          <i class="bi bi-cursor-fill"></i>
          Kod Gönder
        </div>
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
  data() {
    return {

    };
  },
  components: {
    StandartButton
  }
};
</script>

<style lang="scss" scoped>
.register {
  @include user-actions-content;

  .content {
    .email-confirmation {
      display: flex;

      .send-code-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: $df-green-color;
        color: white;
        width: 150px;
        font-size: 13px;
        cursor: pointer;
        border-radius: 4px;
        margin-left: 5px;
        padding: 5px;

        &:hover {
          background-color: $df-light-green-color;
        }

        &.disable {
          opacity: .3;
          pointer-events: none;
        }

        i {
          margin-right: 5px;
        }
      }
    }
  }
}
</style>
