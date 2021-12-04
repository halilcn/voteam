<template>
  <popup
      title="Profili Düzenle"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="user-edit">
        <div class="item">
          <div class="title">
            E-mail
          </div>
          <div class="content readonly">
            <input v-model="user.email" type="email" readonly>
          </div>
        </div>
        <div class="item">
          <div class="title">
            Ad ve Soyad
          </div>
          <div class="content">
            <input type="text" v-model="v$.user.name.$model">
          </div>
        </div>
        <div class="item">
          <div class="title">
            Fotoğraf
          </div>
          <div class="content user-image">
            <img :src="userImageUrl" alt="user-image"/>
            <input @change="onChangeFile" type="file" id="user_image">
            <label for="user_image">
              Fotoğraf Yükle
            </label>
          </div>
        </div>
        <div class="item">
          <div class="title">
            Saat Dilimi (UTC+14/-12)
          </div>
          <div class="content hours-utc">
            <input type="number" v-model="v$.user.utc.$model">
          </div>
        </div>
        <errors
            v-if="v$.user.$invalid"
            :content="[$t('customErrors.userEditError')]"/>
        <div class="btn-container">
          <lottie-player
              v-show="isLoadingUpdateUserSettings"
              class="loading-icon"
              src="https://assets10.lottiefiles.com/packages/lf20_6m7gsdxq.json"
              background="transparent"
              speed="1"
              style="width: 40px; height: 40px;" loop autoplay/>
          <standart-button
              class="post-btn"
              @click="updateUserSettingsAction"
              :is-disable="v$.user.$invalid || isLoadingUpdateUserSettings"
              text="Kaydet"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
//TODO:Hiç değişikli yoksa btn disable yapma.
//TODO:Vuelidate ?
//TODO:UTC max min utc belirleme
//TODO:image post etme, url database gönderme

import Popup from '../../shared/Popup';
import StandartButton from '../../shared/elements/StandartButton';
import validateMixin from '../../../mixins/validateMixin';
import Errors from '../../shared/Errors';
import { mapState, mapActions } from 'vuex';

export default {
  name: 'UserEditPopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      temporaryUserImageUrl: '',
      user: {},
      isLoadingUpdateUserSettings: false
    };
  },
  validations() {
    return {
      user: {
        name: {
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        utc: {
          required: this.multipleLangError('errors.required', this.validators.required),
          between: this.multipleLangError('errors.between', this.validators.between(-12, 14)) //TODO:constants alma ?
        }
      }
    };
  },
  components: {
    Popup,
    StandartButton,
    Errors
  },
  methods: {
    ...mapActions('auth', ['updateUserSettings']),
    onChangeFile(event) {
      this.user.image = event.target.files[0];
      this.temporaryUserImageUrl = this.$helpers.createTemporaryUrl(this.user.image);
    },
    updateUserSettingsAction() {
      this.handle(async () => {
        this.isLoadingUpdateUserSettings = true;
        await this.updateUserSettings(this.user);
        this.$notify.success('Bilgiler güncellendi'); //TODO: multiple language
      })
          .finally(() => {
            this.isLoadingUpdateUserSettings = false;
          });
    }
  },
  computed: {
    ...mapState({
      temporaryUserData: (state) => state.auth.user
    }),
    userImageUrl() {
      return this.temporaryUserImageUrl === '' ? this.user.image : this.temporaryUserImageUrl;
    }
  },
  watch: {
    isEnable(newValue) {
      if (newValue) this.user = { ...this.temporaryUserData };
    }
  }
};
</script>

<style lang="scss" scoped>
.user-edit {
  display: flex;
  flex-direction: column;

  .item {
    margin-bottom: 25px;

    .title {
      font-size: 15px;
      color: $df-dark-blue-color;
      font-weight: 500;
    }

    .content {
      margin-top: 5px;

      &.readonly {
        input {
          pointer-events: none;
          background-color: #f6f6f6;
        }
      }

      &.user-image {
        display: flex;
        align-items: center;

        img {
          width: 120px;
          height: 120px;
          border-radius: 100%;
        }

        input {
          display: none;
        }

        label {
          cursor: pointer;
          margin-left: 30px;
          padding: 5px 10px;
          background-color: #f1f1f1;
          border-radius: 5px;
          color: $df-dark-blue-color;

          &:hover {
            background-color: #eaeaea;
          }
        }
      }

      input {
        @include std-input;
      }
    }
  }

  .btn-container {
    margin-top: 17px;
    display: flex;
    justify-content: flex-end;
    align-items: center;

    .post-btn {
      margin-left: 10px;
    }
  }
}
</style>
