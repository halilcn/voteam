<template>
  <div class="login">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek kayıt olmanız gerekir.
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
      <!-- <errors content="E-mail ya da Şifre yanlış"/>-->
      <standart-button
          class="continue-btn"
          text="devam"
          :is-disable="v$.user.$invalid"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';
import useVuelidate from '@vuelidate/core';
import { required, email } from '@vuelidate/validators';

export default {
  name: 'Login',
  //Todo: Global setup ?
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      user: {
        email: '',
        password: ''
      }
    };
  },
  validations: {
    user: {
      email: {
        required,
        email
      },
      password: {
        required
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

//TODO: Aynısı Register Comp kullanılıyor. Dynamic hale getirme ? !!!!
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
      margin-top: 25px;
    }
  }
}
</style>
