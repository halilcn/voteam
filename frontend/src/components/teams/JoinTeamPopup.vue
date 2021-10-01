<template>
  <popup
      title="Takıma Katıl"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="team-join">
        <info class="info-text" text="Takıma katılmak için takımın kodu gerekir."/>
        <div class="form">
          <div class="input-container">
            <input type="text" maxlength="6">
          </div>
          <standart-button text="Katıl"
                           is-disable="true"
                           class="join-btn"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../shared/Popup';
import StandartButton from '../shared/elements/StandartButton';
import Info from '../shared/Info';

export default {
  name: 'JoinTeamPopup',
  data() {
    return {};
  },
  props: ['isEnable'],
  components: {
    Popup,
    StandartButton,
    Info
  }
};
</script>

<style lang="scss" scoped>
.team-join {
  .info-text {
    margin-bottom: 10px;
  }

  .form {
    display: flex;

    .input-container {
      width: 100%;

      input {
        @include std-input;
        font-weight: 600;
        font-size: 17px;
        letter-spacing: 30px;
        padding-left: 30px;
        text-align: center;
        text-transform: uppercase;
      }
    }

    .join-btn {
      width: 150px;
      margin-left: 10px;

      &:not(.disable) {
        background-color: $df-green-color;

        &:hover {
          background-color: $df-light-green-color;
        }
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .team-join {
    .form {
      flex-direction: column;

      .input-container {
        input {
          font-size: 15px;
        }
      }

      .join-btn {
        margin: 10px 0 0 0;
        width: 100%;
      }
    }
  }
}
</style>
