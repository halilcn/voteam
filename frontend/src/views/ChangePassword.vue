<template>
  <div class="change-password">
    <div v-if="!isLoading.checkKey" class="form">
      <canvas id="confetti"></canvas>
      <div class="content">
        <div class="title">
          Yeni şifreni oluşturabilirsin.
        </div>
        <div class="data-field-container">
          <input
              type="password"
              :placeholder="$t('general.input.newPassword')"
              v-model="v$.user.password.$model"
              class="data-field"
              :class="{'has-error':v$.user.password.$error}">
          <errors
              v-if="v$.user.password.$error"
              is-input-error="true"
              :content="getOnlyErrors(v$.user.password.$errors)"/>
        </div>
        <div class="data-field-container">
          <input
              type="password"
              :placeholder="$t('general.input.repeatNewPassword')"
              v-model="v$.user.confirm_password.$model"
              class="data-field"
              :class="{'has-error':v$.user.confirm_password.$error}">
          <errors
              v-if="v$.user.confirm_password.$error"
              is-input-error="true"
              :content="getOnlyErrors(v$.user.confirm_password.$errors)"/>
        </div>
        <standart-button
            class="continue-btn"
            text="Şifre Değiştir"
            @click="postNewPasswordAction"
            :is-disable="v$.user.$invalid || isLoading.postPassword"/>
      </div>
    </div>
  </div>
</template>

<script>
import StandartButton from '../components/shared/elements/StandartButton';
import Errors from '../components/shared/Errors';
import confetti from 'canvas-confetti';
import validateMixin from '../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'ChangePassword',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      key: this.$route.params.key,
      isLoading: {
        checkKey: true,
        postPassword: false
      },
      user: {
        password: '',
        confirm_password: ''
      }
    };
  },
  validations() {
    return {
      user: {
        password: {
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        confirm_password: {
          required: this.multipleLangError('errors.required', this.validators.required),
          sameAsPassword: this.multipleLangError('errors.sameAsPassword', this.newPasswordSame)
        }
      }
    };
  },
  components: {
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions('auth', ['checkForgotPasswordKey', 'postNewPassword']),
    checkForgotPasswordKeyAction() {
      this.handle(async () => {
        await this.checkForgotPasswordKey();
        this.isLoading.checkKey = false;
      }, () => {
        this.$router.push({ name: 'NoPage' });
        return true;
      });
    },
    postNewPasswordAction() {
      this.handle(async () => {
        this.isLoading.postPassword = true;
        await this.postNewPassword({ ...this.user });
        this.passwordChanged();
      });
    },
    passwordChanged() {
      this.startConfetti();
      this.$notify.success('Şifre Değiştirildi'); //TODO: multiple language
      setTimeout(() => {
        this.$router.push({ name: 'Login' });
      }, 2200);
    },
    startConfetti() {
      const myCanvas = document.getElementById('#confetti');
      const myConfetti = confetti.create(myCanvas, {
        resize: true,
        useWorker: true
      });
      myConfetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 }
      });
    }
  },
  computed: {
    newPasswordSame() {
      const self = this;
      return () => {
        return self.user.password === self.user.confirm_password;
      };
    }
  },
  created() {
    this.checkForgotPasswordKeyAction();
  }
};
</script>

<style lang="scss" scoped>
@include user-actions-content;

.change-password {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;

  .form {
    @include center-md-box-shadow;
    border-radius: 10px;
    padding: 20px;
    width: 500px;

    #confetti {
      position: absolute;
      z-index: -1;
    }

    .title {
      text-align: center;
    }
  }
}
</style>
