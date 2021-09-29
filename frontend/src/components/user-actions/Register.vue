<template>
  <div class="register">
    <div class="title">
      Takım oluşturabilmek veya takımlara katılabilmek için kayıt olmak gerekir.
    </div>
    <div class="content">
      {{ email }}
      <div class="data-field-container">
        <input
            v-model="v$.user.name.$model"
            class="data-field"
            :class="{'has-error':v$.user.name.$error}"
            placeholder="Ad ve Soyad">
        <errors
            v-if="v$.user.name.$error"
            is-input-error="true"
            :content="$helpers.getOnlyErrors(v$.user.name.$errors)"/>
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
        <standart-button
            class="send-code-btn"
            :text="isCodeSend ? 'Tekrar Gönder' : 'Kod Gönder'"
            @click="registerEmail"
            :is-disable="v$.user.email.$invalid ||isLoading.registerEmail"/>
      </div>
      <div v-if="isCodeSend" class="data-field-container email-code">
        <div class="info">
          <i class="bi bi-patch-check-fill"></i>
          Kod gönderildi. E-mail'e gelen kodu aşağıya yazınız.
        </div>
        <input
            v-model="v$.email.code.$model"
            class="data-field"
            :class="{'has-error':v$.email.code.$error}"
            maxlength="4"
            minlength="0"
            placeholder="____">
        <errors
            v-if="v$.email.code.$error"
            is-input-error="true"
            :content="$helpers.getOnlyErrors(v$.email.code.$errors)"/>
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
          :is-disable="v$.user.$invalid || v$.email.$invalid || isLoading.register"
          @click="register"/>
    </div>
  </div>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Errors from '../shared/Errors';
import validateMixin from '../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'Register',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoading: {
        registerEmail: false,
        register: false
      },
      customValidator: {
        isEmailUnique: true,
        isInvalidCode: false
      },
      user: {
        name: '',
        email: '',
        password: ''
      },
      email: {
        key: '',
        code: ''
      }
    };
  },
  validations() {
    return {
      user: {
        name: {
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        email: {
          required: this.multipleLangError('errors.required', this.validators.required),
          email: this.multipleLangError('errors.email', this.validators.email),
          uniqueEmail: this.multipleLangError('errors.uniqueEmail', this.uniqueEmail)
        },
        password: {
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      },
      email: {
        code: {
          required: this.multipleLangError('errors.required', this.validators.required),
          invalidCode: this.multipleLangError('errors.invalidCode', this.invalidCode)
        }
      }
    };
  },
  computed: {
    uniqueEmail() {
      const self = this;
      return () => {
        return self.customValidator.isEmailUnique;
      };
    },
    invalidCode() {
      const self = this;
      return () => {
        return !self.customValidator.isInvalidCode;
      };
    },
    isCodeSend() {
      return this.email.key;
    }
  },
  components: {
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions(['postRegisterEmail', 'postRegister']),
    registerEmail() {
      this.$helpers.defaultHandler(async () => {
        this.isLoading.registerEmail = true;
        this.email.key = await this.postRegisterEmail(this.user.email);
      }, (err) => {
        if (err.response.status === 409) {
          this.customValidator.isEmailUnique = false;
          return true;
        }
      })
          .finally(() => {
            this.isLoading.registerEmail = false;
          });
    },
    register() {
      this.$helpers.defaultHandler(async () => {
        this.isLoading.register = true;
        await this.postRegister({ user: this.user, email: this.email });
        alert('Kayıt oldun !!');
      }, (err) => {
        if (err.response.status === 400) {
          this.customValidator.isInvalidCode = true;
          return true;
        }
      })
          .finally(() => {
            this.isLoading.register = false;
          });
    }
  },
  watch: {
    'user.email': function () {
      this.customValidator.isEmailUnique = true;
    },
    'email.code': function () {
      this.customValidator.isInvalidCode = false;
    }
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
        background-color: $df-green-color;
        color: white;
        width: 150px;
        font-size: 12px;
        margin-left: 5px;
        padding: 9px;

        &:hover {
          background-color: $df-light-green-color;
        }

        &.disable {
          opacity: .3;
        }
      }
    }

    .email-code {
      @include center-lg-box-shadow;
      padding: 10px;
      border-radius: 5px;

      .info {
        text-align: center;
        font-size: 12px;
        margin-bottom: 7px;
        color: $df-green-color;
      }

      .data-field {
        font-weight: 800;
        letter-spacing: 60px;
        padding-left: 90px;
        padding-right: 30px;
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
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
