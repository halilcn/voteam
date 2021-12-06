<template>
  <popup title="Üye Daveti"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <div class="user-invitation">
        <div class="item">
          <div class="title">
            Ad ve Soyad
          </div>
          <div class="content">
            <input placeholder="Ahmet Güneş" type="email">
          </div>
        </div>
        <div class="item">
          <div class="title">
            E-mail *
            <info-tooltip class="info-email" text="Eğer kayıtlı ise kayıtlı olduğu e-mail'i yazınız"/>
          </div>
          <div class="content">
            <input placeholder="ahmetgunes@gmail.com" type="email">
          </div>
        </div>
        <div class="post-invitation-btn-container">
          <standart-button text="Davetiye Gönder"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../shared/Popup';
import InfoTooltip from '../../../shared/InfoTooltip';
import StandartButton from '../../../shared/elements/StandartButton';

export default {
  name: 'UserInvitationPopup',
  props: ['isEnable'],
  components: {
    Popup,
    InfoTooltip,
    StandartButton
  }
};
</script>

<style lang="scss" scoped>
.user-invitation {
  .item {
    margin-bottom: 20px;

    .title {
      display: flex;
      font-size: 15px;

      .info-email {
        margin-left: 8px;
      }
    }

    .content {
      margin-top: 4px;

      input {
        @include std-input;
      }
    }
  }

  .post-invitation-btn-container {
    display: flex;
    justify-content: flex-end;
  }
}
</style>
