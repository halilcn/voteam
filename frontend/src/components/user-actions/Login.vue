<template>
  <div class="login">
    <div class="title">
      Hoşgeldin!
    </div>
    <div class="content">
      <div class="data-field-container">
        <input
            v-model="v$.user.email.$model"
            class="data-field"
            :class="{'has-error':v$.user.email.$error}"
            placeholder="E-mail">
        <errors
            v-if="v$.user.email.$error"
            is-input-error="true"
            :content="$helpers.getOnlyErrors(v$.user.email.$errors)"/>
      </div>
      <div class="data-field-container">
        <input
            v-model="v$.user.password.$model"
            class="data-field"
            :class="{'has-error':v$.user.password.$error}"
            placeholder="Şifre">
        <errors
            v-if="v$.user.password.$error"
            is-input-error="true"
            :content="$helpers.getOnlyErrors(v$.user.password.$errors)"/>
      </div>
      <errors v-if="isWrongEmailOrPassword" content="E-mail ya da Şifre yanlış"/>
      <standart-button
          class="continue-btn"
          text="Giriş Yap"
          @click="login"
          :is-disable="v$.user.$invalid"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';
import { required, email } from '@vuelidate/validators';
import errorMixin from '../../mixins/errorMixin';
import useVuelidate from '@vuelidate/core';
import { mapActions } from 'vuex';

export default {
  name: 'Login',
  mixins: [errorMixin],
  //TODO: Dynamic ?
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
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
          required: this.multipleLangError('errors.required', required),
          email: this.multipleLangError('errors.email', email)
        },
        password: {
          required: this.multipleLangError('errors.required', required)
        }
      }
    };
  },
  methods: {
    ...mapActions(['postLogin']),
    async login() {
      //Dynamic ??
      try {
        this.isLoadingLogin = true;
        await this.postLogin(this.user);
        this.isLoadingLogin = false;
        //her şey başarılı ise
      } catch (err) {
        if (err.response.status === 401) {
          this.isWrongEmailOrPassword = true;
          return;
        }
        this.$notify.error(this.$t(('customErrors.generalError')));
      }

    }
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
  @include user-actions-content;
}
</style>
