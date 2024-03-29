<template>
  <div class="register">
    <div class="title">
      {{ $t('register.infoText') }}
    </div>
    <div class="content">
      <div class="data-field-container">
        <input
            type="text"
            :placeholder="$t('general.input.nameAndSurname')"
            v-model="v$.user.name.$model"
            class="data-field"
            :class="{'has-error':v$.user.name.$error}">
        <errors
            v-if="v$.user.name.$error"
            is-input-error="true"
            :content="getOnlyErrors(v$.user.name.$errors)"/>
      </div>
      <div class="data-field-container email-confirmation">
        <div class="input-container">
          <input
              type="email"
              :placeholder="$t('general.input.email')"
              v-model="v$.user.email.$model"
              class="data-field"
              :class="{'has-error':v$.user.email.$error,'code-sent':isCodeSent}">
          <errors
              v-if="v$.user.email.$error"
              is-input-error="true"
              :content="getOnlyErrors(v$.user.email.$errors)"/>
        </div>
        <standart-button
            class="send-code-btn"
            :text="isCodeSent ? $t('register.resendCodeButton') : $t('register.sendCodeButton')"
            @click="registerEmail"
            :is-disable="v$.user.email.$invalid ||isLoading.registerEmail"/>
      </div>
      <div v-if="isCodeSent" class="data-field-container email-code">
        <div class="info">
          <i class="bi bi-patch-check-fill"></i>
          {{ $t('register.codeSent') }}
        </div>
        <input
            type="text"
            placeholder="____"
            maxlength="4"
            minlength="0"
            v-model="v$.email.code.$model"
            class="data-field"
            :class="{'has-error':v$.email.code.$error}">
        <errors
            v-if="v$.email.code.$error"
            is-input-error="true"
            :content="getOnlyErrors(v$.email.code.$errors)"/>
      </div>
      <div class="data-field-container">
        <input
            type="password"
            :placeholder="$t('general.input.password')"
            v-model="v$.user.password.$model"
            class="data-field"
            :class="{'has-error':v$.user.password.$error}">
        <errors
            v-if="v$.user.password.$error"
            is-input-error="true"
            :content="getOnlyErrors(v$.user.password.$errors)"/>
      </div>
      <div class="terms-info">
        <router-link
            :to="{name:'Terms'}"
            target="_blank"
            class="terms-link">
          {{ $t('general.others.termsOfService') }}
        </router-link>
        {{ $t('register.termsOfServiceText') }}
      </div>
      <standart-button
          class="continue-btn"
          :text="$t('register.registerButton')"
          :is-disable="registerButtonDisable"
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
        isValidCode: true
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
          validCode: this.multipleLangError('errors.validCode', this.validCode)
        }
      }
    };
  },
  watch: {
    'user.email': function () {
      this.customValidator.isEmailUnique = true;
    },
    'email.code': function () {
      this.customValidator.validCode = true;
    }
  },
  components: {
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions('auth', ['postRegisterEmail', 'postRegister']),
    registerEmail() {
      this.handle(async () => {
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
      this.handle(async () => {
        this.isLoading.register = true;
        await this.postRegister({ user: this.user, email: this.email });
      }, (err) => {
        if (err.response.status === 400) {
          this.customValidator.isValidCode = false;
          return true;
        }
      })
          .finally(() => {
            this.isLoading.register = false;
          });
    }
  },
  computed: {
    uniqueEmail() {
      const self = this;
      return () => {
        return self.customValidator.isEmailUnique;
      };
    },
    validCode() {
      const self = this;
      return () => {
        return self.customValidator.isValidCode;
      };
    },
    isCodeSent() {
      return this.email.key;
    },
    registerButtonDisable() {
      return this.v$.user.$invalid
          || this.v$.email.code.required.$invalid
          || this.isLoading.register;
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

        .code-sent {
          pointer-events: none;
          background-color: $df-light-black;
        }
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
        letter-spacing: 50px;
        padding-left: 100px;
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

      .email-code {
        .data-field {
          letter-spacing: 30px;
          padding: 7px;
          text-align: center;
        }
      }
    }
  }
}
</style>
