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
            <input v-model="user.email" type="email">
          </div>
        </div>
        <div class="item">
          <div class="title">
            Ad ve Soyad
          </div>
          <div class="content">
            <input type="text">
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
          {{ user }}
          <div class="title">
            Saat Dilimi (UTC+14,UTC-12)
          </div>
          <div class="content hours-utc">
            <input type="number">
          </div>
        </div>
        <standart-button class="post-btn" text="Kaydet"/>
      </div>
    </template>
  </popup>
</template>

<script>
//TODO:Hiç değişikli yoksa btn disable yapma.
//TODO:Vuelidate ?
//TODO:UTC max min utc belirleme

import Popup from '../../shared/Popup';
import StandartButton from '../../shared/elements/StandartButton';
import { mapState } from 'vuex';

export default {
  name: 'UserEditPopup',
  props: ['isEnable'],
  data() {
    return {
      temporaryUserImageUrl: ''
    };
  },
  components: {
    Popup,
    StandartButton
  },
  methods: {
    onChangeFile(event) {
      this.user.image = event.target.files[0];
      this.temporaryUserImageUrl = this.$helpers.createTemporaryUrl(this.user.image);
    }
  },
  computed: {
    ...mapState('auth', ['user']),
    userImageUrl() {
      return this.temporaryUserImageUrl === '' ? this.user.image : this.temporaryUserImageUrl;
    }
  }
};
</script>

<style lang="scss" scoped>
.user-edit {
  display: flex;
  flex-direction: column;

  .item {
    margin-bottom: 20px;

    .title {
      font-size: 15px;
      color: $df-dark-blue-color;
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
        }
      }

      input {
        @include std-input;
      }
    }
  }

  .post-btn {
    margin-left: auto;
  }
}
</style>
