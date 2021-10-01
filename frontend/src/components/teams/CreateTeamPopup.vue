<template>
  <popup
      title="Takım Oluştur"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="create-team">
        <div class="form">
          <div class="input-container">
            <input placeholder="Takım Adı" type="text">
          </div>
          <info class="info-text" text="Takım oluşturduğunda otomatik olarak lider olarak atanırsın."/>
          <standart-button text="Oluştur"
                           is-disable="true"
                           class="create-btn"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import StandartButton from '../shared/elements/StandartButton';
import Popup from '../shared/Popup';
import Info from '../shared/Info';

export default {
  name: 'CreateTeamPopup',
  props: ['isEnable'],
  components: {
    Popup,
    StandartButton,
    Info
  }
};
</script>

<style lang="scss" scoped>
.create-team {
  .form {

    .input-container {
      margin: 5px 0;

      input {
        @include std-input;
      }
    }

    .info-text {
      margin: 10px 0;
    }
  }
}
</style>
