<template>
  <div class="login">
    <div class="title">
      Hoşgeldin!
    </div>
    <div class="content">
      <div class="data-field-container">
        <input
            type="email"
            placeholder="E-mail"
            v-model="v$.user.email.$model"
            class="data-field"
            :class="{'has-error':v$.user.email.$error}">
        <errors
            v-if="v$.user.email.$error"
            is-input-error="true"
            :content="getOnlyErrors(v$.user.email.$errors)"/>
      </div>
      <div class="data-field-container">
        <input
            type="password"
            placeholder="Şifre"
            v-model="v$.user.password.$model"
            class="data-field"
            :class="{'has-error':v$.user.password.$error}">
        <errors
            v-if="v$.user.password.$error"
            is-input-error="true"
            :content="getOnlyErrors(v$.user.password.$errors)"/>
      </div>
      <errors v-if="isWrongEmailOrPassword" content="E-mail ya da Şifre yanlış"/>
      <standart-button
          class="continue-btn"
          text="Giriş Yap"
          @click="login"
          :is-disable="v$.user.$invalid || isLoadingLogin"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';
import validateMixin from '../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'Login',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoadingLogin: false,
      isWrongEmailOrPassword: false,
      user: {
        email: '',
        password: ''
      }
    };
  },
  validations() {
    return {
      user: {
        email: {
          required: this.multipleLangError('errors.required', this.validators.required),
          email: this.multipleLangError('errors.email', this.validators.email)
        },
        password: {
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  components: {
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions('auth', ['postLogin']),
    login() {
      this.handle(async () => {
        this.isLoadingLogin = true;
        await this.postLogin(this.user);
      }, (err) => {
        if (err.response.status === 400) {
          this.isWrongEmailOrPassword = true;
          return true;
        }
      })
          .finally(() => {
            this.isLoadingLogin = false;
          });
    }
  }
};
</script>

<style lang="scss" scoped>
.login {
  @include user-actions-content;
}
</style>
