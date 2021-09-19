<template>
  <div class="register">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek için kayıt olmak gerekir.
    </div>
    <div class="content">
      <div class="data-field-container">
        <input
            v-model="v$.user.nameSurname.$model"
            class="data-field"
            :class="{'has-error':v$.user.nameSurname.$error}"
            placeholder="Ad ve Soyad">
        <errors
            v-if="v$.user.nameSurname.$error"
            is-input-error="true"
            :content="$helpers.getOnlyErrors(v$.user.nameSurname.$errors)"/>
      </div>
      <div class="data-field-container email-confirmation">
        <div class="input-container">
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
        <div class="send-code-btn disable">
          <i class="bi bi-cursor-fill"></i>
          Kod Gönder
        </div>
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
      <div class="terms-info">
        <i class="bi bi-info-circle"></i>
        Kayıt olduğunuzda <span>hizmet koşullarını</span> kabul etmiş olursunuz.
      </div>
      <standart-button
          class="continue-btn"
          text="Oluştur"
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

export default {
  name: 'Register',
  mixins: [errorMixin],
  //TODO: Dynamic ?
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      user: {
        nameSurname: '',
        email: '',
        password: ''
      }
    };
  },
  validations() {
    return {
      user: {
        nameSurname: {
          required: this.multipleLangError('errors.required', required)
        },
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
  components: {
    StandartButton,
    Errors
  }
};
</script>

<style lang="scss" scoped>
.register {
  @include user-actions-content;

  .content {
    .email-confirmation {
      display: flex;
      align-items: flex-start;

      .input-container {
        width: 100%;
        display: flex;
        flex-direction: column;
      }

      .send-code-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: $df-green-color;
        color: white;
        width: 150px;
        font-size: 12px;
        cursor: pointer;
        border-radius: 4px;
        margin-left: 5px;
        padding: 9px;

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

@media only screen and (max-width: 900px) {
  .register {
    .content {
      .email-confirmation {
        .send-code-btn {
          width: 130px !important;
          font-size: 10px !important;
          margin-left: 5px;
          padding: 11px 5px !important;
        }
      }
    }
  }
}

</style>
