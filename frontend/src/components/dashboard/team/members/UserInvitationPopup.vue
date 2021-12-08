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
            <input type="text" v-model="invitation.name">
          </div>
        </div>
        <div class="item">
          <div class="title">
            E-mail*
            <info-tooltip class="info-email"
                          text="Eğer kayıtlı kullanıcıyı davet etmek istiyorsanız, kayıt olduğu e-mail adresini yazmalısınız."/>
          </div>
          <div class="content">
            <input type="email"
                   v-model="v$.invitation.email.$model"
                   :class="{'has-error':v$.invitation.email.$error}">
            <errors
                v-if="v$.invitation.email.$error"
                is-input-error="true"
                :content="getOnlyErrors(v$.invitation.email.$errors)"/>
          </div>
        </div>
        <errors v-if="isUserAlreadyMember"
                :content="[$t('dashboard.members.invitation.isUserAlreadyMember')]"/>
        <div class="post-invitation-btn-container">
          <standart-button
              text="Davetiye Gönder"
              :is-disable="v$.invitation.$invalid || isLoadingPostInvitation"
              @click="postUserInvitationAction"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../shared/Popup';
import InfoTooltip from '../../../shared/InfoTooltip';
import Errors from '../../../shared/Errors';
import StandartButton from '../../../shared/elements/StandartButton';
import validateMixin from '../../../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'UserInvitationPopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoadingPostInvitation: false,
      isUserAlreadyMember: false,
      invitation: {
        email: 'halil@gmail.com',
        name: 'halil'
      }
    };
  },
  validations() {
    return {
      invitation: {
        email: {
          required: this.multipleLangError('errors.required', this.validators.required),
          email: this.multipleLangError('errors.email', this.validators.email)
        }
      }
    };
  },
  components: {
    Popup,
    InfoTooltip,
    Errors,
    StandartButton
  },
  methods: {
    ...mapActions('teamUser', ['postUserInvitation']),
    postUserInvitationAction() {
      this.handle(async () => {
        this.isLoadingPostInvitation = true;
        await this.postUserInvitation(this.invitation);
        this.invitationSent();
      }, (err) => {
        if (err.response.status === 400) this.isUserAlreadyMember = true;
      })
          .finally(() => {
            this.isLoadingPostInvitation = false;
          });
    },
    invitationSent() {
      this.$notify.success(this.$t('notifyMessages.successPostUserInvitation'));
      // this.invitation = this.$helpers.clearItems(this.invitation);
    }
  }
};
</script>

<style lang="scss" scoped>
.user-invitation {
  .item {
    margin-bottom: 20px;

    .title {
      display: flex;
      align-items: center;
      font-size: 15px;
      color: $df-dark-blue-color;

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
    margin-top: 30px;
  }
}
</style>
