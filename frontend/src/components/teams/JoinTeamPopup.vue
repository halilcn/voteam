<template>
  <popup
      title="Takıma Katıl"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="team-join">
        <info class="info-text" text="Takıma katılmak için takımın kodu gerekir."/>
        <div class="form">
          <div class="input-container join-code-input">
            <div class="number-sign">
              #
            </div>
            <input
                v-model="v$.code.$model"
                type="text"
                maxlength="5">
          </div>
          <standart-button
              text="Katıl"
              :is-disable="v$.code.$invalid || isLoadingJoinTeam"
              @click="joinTeam"
              class="join-btn"/>
        </div>
        <errors
            v-if="isWrongCode"
            class="join-code-error"
            content="Girilen kod yanlış ya da bu takıma daha önce katıldın."/>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../shared/Popup';
import StandartButton from '../shared/elements/StandartButton';
import Info from '../shared/Info';
import Errors from '../shared/Errors';
import notify from '../../notify';
import validateMixin from '../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'JoinTeamPopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      code: '',
      isLoadingJoinTeam: false,
      isWrongCode: false
    };
  },
  validations() {
    return {
      code: {
        required: this.validators.required,
        minLength: this.validators.minLength(5)
      }
    };
  },
  components: {
    Popup,
    StandartButton,
    Info,
    Errors
  },
  methods: {
    ...mapActions('team', ['postJoinTeam']),
    joinTeam() {
      this.handle(async () => {
        this.isLoadingJoinTeam = true;
        await this.postJoinTeam({ code: this.code });
        this.code = '';
        this.$emit('handlePopup');
        notify.success('Takıma katıldın !');
      }, (err) => {
        if (err.response.status === 400) {
          this.isWrongCode = true;
          return true;
        }
      })
          .finally(() => {
            this.isLoadingJoinTeam = false;
          });
    }
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

    .join-code-input {
      display: flex;

      .number-sign {
        color: #b4b4b4;
        background-color: #f3f3f3;
        display: flex;
        align-items: center;
        font-size: 25px;
        padding: 0 12px;
        margin-right: 5px;
        border-radius: 5px;
      }
    }

    .input-container {
      width: 100%;

      input {
        @include std-input;
        font-weight: 600;
        font-size: 17px;
        letter-spacing: 40px;
        padding-left: 40px;
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

  .join-code-error {
    margin-top: 10px;
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
