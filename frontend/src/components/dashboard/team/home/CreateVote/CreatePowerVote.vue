<template>
  <popup
      title="Güç Oylaması"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <warning text="İlk güç oylamasını başlatmak için üye sayısı en az 3 kişi olmalıdır."/>
      <info
          class="power-vote-info"
          text="İlk oylama olarak güç oylaması yapılması zorunludur. Bu oylamadan sonra güç oylaması otomatik olarak her ay tanımlanır.(Her üye takıma katıldıktan sonra güç oylaması yapılması tavsiye edilir)"/>
      <standart-button class="create-power-vote" text="Oylamayı Başlat"/>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import StandartButton from '../../../../shared/elements/StandartButton';
import Info from '../../../../shared/Info';
import Warning from '../../../../shared/Warning';
import { mapActions } from 'vuex';

export default {
  name: 'CreatePowerVote',
  data(){
    return{

    }
  },
  components: {
    Popup,
    StandartButton,
    Info,
    Warning
  },
  methods: {
    ...mapActions('vote', ['checkForStorePowerTypeVote']),
    checkForStorePowerTypeVoteAction() {
      this.handle(async () => {
        await this.checkForStorePowerTypeVote();
      });
    }
  },
  created() {
    this.checkForStorePowerTypeVoteAction();
  }
};
</script>

<style lang="scss" scoped>

.power-vote-info {
  margin: 10px 0;
}

.create-power-vote {
}
</style>
