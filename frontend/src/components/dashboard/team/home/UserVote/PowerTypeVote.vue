<template>
  <div class="user-list">
    <div v-for="(user,index) in voteData"
         :key="index"
         class="item">
      <div class="user-info">
        <img
            :src="user.image"
            class="image"
            alt="user-image">
        <div title="Halil" class="name">
          {{ user.name }}
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input
              v-model.number="userPowers.find(({team_user_id})=>team_user_id === user.team_user_id).power"
              type="number"
              min="0"
              :max="TOTAL_VOTE_USER_POWER">
          birim güç
        </div>
        <div class="power-range">
          <input
              v-model.number="userPowers.find(({team_user_id})=>team_user_id === user.team_user_id).power"
              type="range"
              min="0"
              :max="TOTAL_VOTE_USER_POWER"
              step="1">
        </div>
      </div>
    </div>
  </div>
  <div class="power-vote-bottom">
    <div class="total-power-info"
         :class="{'power-warning':hasTooMuchPower,'power-over':isPowerOver}">
      <template v-if="!isPowerOver">
        <span v-if="hasTooMuchPower">
          {{ -remainingPower }} Birim Güç Fazla
        </span>
        <span v-else>
          {{ remainingPower }} Birim Güç Kaldı
        </span>
      </template>
      <template v-else>
        <i class="bi bi-check"></i>
        Tüm Birim Güçler Dağıtıldı
      </template>
      <info-tooltip
          class="tooltip-info"
          text="Toplamda 10 kullanıcı var. Her kullanıcıya 100 güç birimi verilebilir."/>
    </div>
    <div
        v-if="enablePowerFullButton"
        @click="fullPower"
        class="power-full-btn">
      kalan birim güçleri dağıt
    </div>
    <standart-button
        text="Gönder"
        :is-disable="isDisablePostVoteButton"
        @click="sendAnswerVote"
        class="post-answer-btn"/>
  </div>
</template>

<script>
//TODO: max 10.000 puan olabilir !
//TODO: gelen kişilerde kendisinin olmaması gerekiyor.kendisine oy veremez

import StandartButton from '../../../../shared/elements/StandartButton';
import InfoTooltip from '../../../../shared/InfoTooltip';
import constants from '../../../../../store/constants';

export default {
  name: 'PowerTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading'],
  data() {
    return {
      test: 0,
      userPowers: [],
      TOTAL_VOTE_USER_POWER: constants.TOTAL_VOTE_USER_POWER
    };
  },
  components: {
    StandartButton,
    InfoTooltip
  },
  methods: {
    sendAnswerVote() {
      this.$emit('postAnswerVote', this.userPowers);
    },
    fullPower() {
      const eachUserAddPower = (this.remainingPower / this.userPowers.length).toFixed(2);

      //string geliyor, o yüzden eklemiyor.
      this.userPowers.map((user) => {
        user['power'] = parseFloat(user['power']) + parseFloat(eachUserAddPower);
      });

      //alert(this.userPowers.length);
      //alert(this.remainingPower);
    },
    convertNumber(number) {
      return number.toFixed(2);
    }
  },
  computed: {
    remainingPower() {
      const totalPowerOfUsers = this.userPowers.reduce((a, b) => +a + +b.power, 0);
      const test = constants.TOTAL_VOTE_USER_POWER - totalPowerOfUsers;

      if (totalPowerOfUsers % 1 === 0) return test;
      return this.convertNumber(test);
    },
    enablePowerFullButton() {
      const POWER_LIMIT_FOR_ENABLE = 500;
      return this.remainingPower < POWER_LIMIT_FOR_ENABLE
          && !this.hasTooMuchPower
          && !this.isPowerOver;
    },
    hasTooMuchPower() {
      return this.remainingPower < 0;
    },
    isPowerOver() {
      return this.remainingPower < 1 && this.remainingPower > -1;
    },
    isDisablePostVoteButton() {
      return !this.isPowerOver || this.isLoading;
    }
  },
  created() {
    this.voteData.forEach(({ team_user_id }) => {
      this.userPowers.push({ team_user_id, power: 0 });
    });
  }
};
</script>

<style lang="scss" scoped>

//TODO: User list scroll !
//TODO: User name width kısıtlama. Üstüne gelince full isim gözükmesi

.user-list {
  height: 225px; // !
  overflow-y: auto;
  padding: 0 8px;

  &::-webkit-scrollbar {
    width: 6px;
  }

  .item {
    @include center-lg-box-shadow;
    display: flex;
    margin: 10px 0;
    border-radius: 5px;
    padding: 5px;

    .user-info {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 100%;

      .image {
        width: 40px;
        height: 40px;
        border-radius: 100%;
      }

      .name {
        @include text-width-limit;
        margin-left: 20px;
        font-size: 16px;
        font-weight: 400;
        color: $df-dark-blue-color;
        width: 140px; // bul olmamalı ? width 100% ?
      }
    }

    .power-percentage {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 500px;

      .power-percentage-info {
        input {
          @include std-input;
          padding: 3px !important;
          border-width: 0px;
          text-align: center;
          width: 55px; // ?
          background-color: #f6f6f6;
        }
      }

      .power-range {
        margin-top: 5px;
        width: 100%;

        input {
          width: 100%;
          background-color: red;
        }

      }
    }
  }
}

.power-vote-bottom {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin-top: 20px;
  border-top: 1px solid #c7d9ff;
  padding-top: 10px;

  .total-power-info {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    background-color: $df-very-light-blue-color;
    color: $df-blue-color;
    border-radius: 5px;

    &.power-warning {
      color: $df-warning-yellow-color;
      background-color: $df-warning-yellow-bg-color;
    }

    &.power-over {
      color: $df-green-color;
      background-color: $df-very-light-green-color;
    }

    .tooltip-info {
      margin-left: 12px;
    }
  }

  .power-full-btn {
    margin-left: 8px;
    font-size: 12px;
    color: $df-black-and-blue-color;
    cursor: pointer;

    &:hover {
      color: #10253f;
    }
  }

  .post-answer-btn {
    margin-left: auto;
  }
}
</style>
