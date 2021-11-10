<template>
  <popup
      title="Güç Oylaması"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <loading-animation v-if="isLoadingPowerTypeVoteData"/>
      <div v-else class="create-power-vote-content">
        {{ powerTypeVoteData }}
        <warning v-if="!powerTypeVoteData.has_more_than_lower_limit_users"
                 text="İlk güç oylamasını başlatmak için en az 3 üye bulunmalıdır."/>
        <success text="Güç oylaması başlatılmış. Oylama sonlandığında, diğer tür oylamalarda başlatılabilir."/>
        <info class="power-vote-info"
              text="İlk oylama olarak güç oylaması yapılması zorunludur. Bu oylamadan sonra güç oylaması otomatik olarak her ay tanımlanır.(Her üye takıma katıldıktan sonra güç oylaması yapılması tavsiye edilir)"/>
        <standart-button
            class="create-power-vote"
            text="Oylamayı Başlat"/>
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
import { mapActions } from 'vuex';

export default {
  name: 'CreatePowerVote',
  props: ['isEnable'],
  data() {
    return {
      powerTypeVoteData: {},
      isLoadingPowerTypeVoteData: true
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
    ...mapActions('vote', ['checkForStorePowerTypeVote']),
    checkForStorePowerTypeVoteAction() {
      this.handle(async () => {
        this.isLoadingPowerTypeVoteData = true;
        this.powerTypeVoteData = await this.checkForStorePowerTypeVote();
      })
          .finally(() => {
            this.isLoadingPowerTypeVoteData = false;
          });
    }
  },
  watch: {
    isEnable(newValue) {
      if (newValue === true) {
        console.log('oluşturuluyor bu');
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
