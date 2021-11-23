<template>
  <popup
      title="Güç Oylaması"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <loading-animation v-if="isLoading.powerTypeData"/>
      <div v-else class="create-power-vote-content">
        <warning v-if="!powerTypeVoteData.has_more_than_lower_limit_users"
                 text="İlk güç oylamasını başlatmak için en az 3 üye bulunmalıdır."/>
        <success v-if="hasActiveVote"
                 text="Güç oylaması başlatılmış. Oylama sonlandığında, diğer tür oylamalarda başlatılabilir."/>
        <template v-if="!hasActiveVote">
          <info class="power-vote-info"
                text="İlk oylama olarak güç oylaması yapılması zorunludur. Bu oylamadan sonra güç oylaması otomatik olarak her ay tanımlanır.(Her üye takıma katıldıktan sonra güç oylaması yapılması tavsiye edilir)"/>
          <standart-button
              class="create-power-vote"
              text="Güç Oylamasını Başlat"
              @click="postVoteAction"
              :is-disable="isDisablePostVoteButton"/>
        </template>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import StandartButton from '../../../../shared/elements/StandartButton';
import Info from '../../../../shared/Info';
import Warning from '../../../../shared/Warning';
import Success from '../../../../shared/Success';
import LoadingAnimation from '../../../../shared/LoadingAnimation';
import constants from '../../../../../store/constants';
import { mapActions } from 'vuex';

export default {
  name: 'CreatePowerVote',
  props: ['isEnable'],
  data() {
    return {
      powerTypeVoteData: {},
      vote: {
        title: 'İlk Güç Oylaması',
        type: 'power',
        options: constants.POWER_VOTE_DEFAULT_OPTIONS,
        start_date: this.$dayjs(),
        end_date: this.$dayjs().add(1, 'day')
        //? start_date, end_date ?
      },
      isLoading: {
        powerTypeData: true,
        postVote: false
      }
    };
  },
  components: {
    Popup,
    StandartButton,
    Info,
    Warning,
    Success,
    LoadingAnimation
  },
  methods: {
    ...mapActions('vote', ['checkForStorePowerTypeVote', 'postVote']),
    checkForStorePowerTypeVoteAction() {
      this.handle(async () => {
        this.isLoading.powerTypeData = true;
        this.powerTypeVoteData = await this.checkForStorePowerTypeVote();
      })
          .finally(() => {
            this.isLoading.powerTypeData = false;
          });
    },
    postVoteAction() {
      this.handle(async () => {
        this.isLoading.postVote = true;
        await this.postVote(this.vote);
        this.$emit('handlePopup');
        this.$notify.success('Oylama başlatıldı');
        this.$emit('update:should-get-votes', true);
      })
          .finally(() => {
            this.isLoading.postVote = false;
          });
    }
  },
  computed: {
    hasActiveVote() {
      return this.powerTypeVoteData.has_active_vote;
    },
    isDisablePostVoteButton() {
      return this.isLoading.postVote || !this.powerTypeVoteData.has_more_than_lower_limit_users;
    }
  },
  watch: {
    isEnable(newValue) {
      if (newValue === true) {
        this.checkForStorePowerTypeVoteAction();
      }
    }
  }
};
</script>

<style lang="scss" scoped>

.create-power-vote-content {
  .power-vote-info {
    margin: 10px 0;
    font-size: 12px;
  }

  .create-power-vote {
  }
}
</style>
