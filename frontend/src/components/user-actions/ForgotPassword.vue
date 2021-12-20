<template>
  <div class="forgot-password">
    <div class="title">
      E-mail adresini girerek şifreni değiştirebilirsin.
    </div>
    <div class="content">
      <!-- TODO:vuelidate -->
      <div v-if="true" class="first-step">
        <div class="data-field-container">
          <input
              type="email"
              placeholder="E-mail"
              v-model="v$.userEmail.$model"
              class="data-field"
              :class="{'has-error':v$.userEmail.$error}">
          <errors
              v-if="v$.userEmail.$error"
              is-input-error="true"
              :content="getOnlyErrors(v$.userEmail.$error)"/>
        </div>
        <standart-button
            class="continue-btn"
            text="Şifre Sıfırla"
            @click="postForgotPasswordAction"
            :is-disable="false"/>
        <errors
            class="wrong-email-error"
            v-if="true"
            :content="['Bu e-mail hesabıyla kayıtlı kullanıcı yok']"/>
      </div>
      <div v-else class="email-sent-info">
        <lottie-player
            src="https://assets4.lottiefiles.com/packages/lf20_zd2j6msi.json"
            background="transparent"
            speed="1"
            style="width: 90px; height: 90px;"
            loop autoplay/>
        <div class="text">
          Şifre sıfırlamak için e-mail gönderildi.
          2 saat sonra şifre sıfırlama linki otomatik olarak silinir.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';
import validateMixin from '../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'ForgotPassword',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      isWrongEmail: false,
      userEmail: ''
    };
  },
  validations() {
    return {
      userEmail: {
        required: this.multipleLangError('errors.required', this.validators.required)
        //  email: this.multipleLangError('errors.email', this.validators.email)
      }
    };
  },
  components: {
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions('auth', ['postForgotPassword']),
    postForgotPasswordAction() {
      this.handle(async () => {
        await this.postForgotPassword({ email: this.userEmail });
      }, (err) => {
        if (err.response.status === 400) {
          this.isWrongEmail = true;
          return true;
        }
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.forgot-password {
  @include user-actions-content;

  .wrong-email-error {
    margin-top: 20px;
  }

  .email-sent-info {
    display: flex;
    flex-direction: column;
    align-items: center;

    .text {
      font-size: 13px;
      font-weight: 300;
      color: $df-green-color;
      text-align: center;
    }
  }
}
</style>
