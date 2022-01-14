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
        <div :title="user.name" class="name">
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
          {{ $t('popups.userVote.content.powerVote.power') }}
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
          {{ -remainingPower }}
          {{ $t('popups.userVote.content.powerVote.power') }}
          Birim Güç Fazla
        </span>
        <span v-else>
          {{ remainingPower }}
          {{ $t('popups.userVote.content.powerVote.tooMuchPower') }}
        </span>
      </template>
      <template v-else>
        <i class="bi bi-check"></i>
        {{ $t('popups.userVote.content.powerVote.allPowerDeployed') }}
      </template>
      <info-tooltip
          class="tooltip-info"
          :text="powerVoteInfoText"/>
    </div>
    <div
        v-if="enablePowerFullButton"
        @click="fullPower"
        class="power-full-btn">
      {{ $t('popups.userVote.content.powerVote.fullPower') }}
    </div>
    <standart-button
        :text="$t('popups.userVote.content.powerVote.send')"
        :is-disable="isDisablePostVoteButton"
        @click="sendAnswerVote"
        class="post-answer-btn"/>
  </div>
</template>

<script>
import StandartButton from '../../../../shared/elements/StandartButton';
import InfoTooltip from '../../../../shared/InfoTooltip';
import constants from '../../../../../store/constants';

export default {
  name: 'PowerTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading'],
  data() {
    return {
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
      const eachUserAddPower = this.convertToDecimal(this.remainingPower / this.userPowers.length);
      this.userPowers.map((user) => {
        user['power'] = parseFloat(user['power']) + parseFloat(eachUserAddPower);
      });
    },
    convertToDecimal(number) {
      return number.toFixed(2);
    }
  },
  computed: {
    remainingPower() {
      const totalPowerOfUsers = this.userPowers.reduce((a, b) => a + b.power, 0);
      const remainingPower = constants.TOTAL_VOTE_USER_POWER - totalPowerOfUsers;

      return totalPowerOfUsers % 1 === 0
          ? remainingPower
          : this.convertToDecimal(remainingPower);
    },
    hasTooMuchPower() {
      return this.remainingPower < 0;
    },
    isPowerOver() {
      return this.remainingPower < 1 && this.remainingPower > -1;
    },
    enablePowerFullButton() {
      const POWER_LIMIT_FOR_ENABLE = 500;
      return this.remainingPower < POWER_LIMIT_FOR_ENABLE
          && !this.hasTooMuchPower
          && !this.isPowerOver;
    },
    isDisablePostVoteButton() {
      return !this.isPowerOver || this.isLoading;
    },
    powerVoteInfoText() {
      return this.$t('popups.userVote.content.powerVote.voteInfo', {
        usersCount: this.userPowers.length,
        power: (this.TOTAL_VOTE_USER_POWER / this.userPowers.length).toFixed(0)
      });
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
.user-list {
  height: 225px;
  overflow-y: auto;
  padding: 0 8px;

  &::-webkit-scrollbar {
    width: 6px;
  }

  .item {
    @include center-lg-box-shadow;
    display: flex;
    align-items: center;
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
        width: 130px;
      }
    }

    .power-percentage {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;

      .power-percentage-info input {
        @include std-input;
        padding: 3px !important;
        border-width: 0;
        text-align: center;
        width: 55px;
        background-color: #f6f6f6;
      }

      .power-range {
        margin-top: 5px;
        width: 100%;

        input {
          width: 100%;
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
  border-top: 1px solid #dce5ff;
  padding-top: 10px;

  .total-power-info {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 5px;
    background-color: $df-very-light-blue-color;
    color: $df-blue-color;

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
      color: #031328;
      text-decoration: underline;
    }
  }

  .post-answer-btn {
    margin-left: auto;
  }
}
</style>
