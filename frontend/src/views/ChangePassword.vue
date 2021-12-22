<template>
  <div class="change-password">
    <div class="form">
      <div class="content">
        <div class="data-field-container">
          <input
              type="email"
              :placeholder="$t('general.input.email')"
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
              :placeholder="$t('general.input.password')"
              v-model="v$.user.password.$model"
              class="data-field"
              :class="{'has-error':v$.user.password.$error}">
          <errors
              v-if="v$.user.password.$error"
              is-input-error="true"
              :content="getOnlyErrors(v$.user.password.$errors)"/>
        </div>
        <standart-button
            class="continue-btn"
            :text="$t('login.loginButton')"
            @click="login"
            :is-disable="v$.user.$invalid || isLoadingLogin"/>
      </div>
    </div>
  </div>
</template>

<script>
import StandartButton from '../components/shared/elements/StandartButton';
import { mapActions } from 'vuex';

export default {
  name: 'ChangePassword',
  data() {
    return {
      key: this.$route.params.key,
      user:{
        password:'',
        confirm_password:''
      }
    };
  },
  components: {
    StandartButton
  },
  methods: {
    ...mapActions('auth', ['checkForgotPasswordKey']),
    checkForgotPasswordKeyAction() {
      this.handle(async () => {
        await this.checkForgotPasswordKey(this.key);
      }, () => {
        this.$router.push({ name: 'NoPage' });
        return true;
      });
    }
  },
  created() {
    this.checkForgotPasswordKeyAction();
  }
};
</script>

<style lang="scss" scoped>
@include user-actions-content;
</style>
