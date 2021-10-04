<template>
  <popup
      title="Takım Oluştur"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="create-team">
        <div class="form">
          <div class="input-container">
            <input
                type="text"
                placeholder="Takım Adı"
                v-model="v$.team.name.$model"
                class="data-field"
                :class="{'has-error':v$.team.name.$error}">
            <errors
                v-if="v$.team.name.$error"
                is-input-error="true"
                :content="getOnlyErrors(v$.team.name.$errors)"/>
          </div>
          <info class="info-text" text="Oluşturduğun takıma lider olarak atanırsın."/>
          <standart-button
              text="Oluştur"
              :is-disable="v$.team.$invalid || isLoadingCreateTeam"
              @click="createTeam"
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
import Errors from '../shared/Errors';
import validateMixin from '../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'CreateTeamPopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoadingCreateTeam: false,
      team: {
        name: ''
      }
    };
  },
  validations() {
    return {
      team: {
        name: {
          required: this.multipleLangError('errors.required', this.validators.required),
          maxLength: this.multipleLangError('errors.maxLength', this.validators.maxLength(25))
        }
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
    ...mapActions('team', ['postCreateTeam']),
    createTeam() {
      this.handle(async () => {
        this.isLoadingCreateTeam = true;
        await this.postCreateTeam(this.team);
        this.team.name = '';
        this.v$.team.$reset();
        this.$emit('handlePopup');
      })
          .finally(() => {
            this.isLoadingCreateTeam = false;
          });
    }
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
