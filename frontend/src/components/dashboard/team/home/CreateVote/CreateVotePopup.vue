<template>
  <popup title="Oylama Başlat"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <div v-if="!isActiveVoteType" class="choose-vote-type">
        <div @click="selectVoteType('create-classic-vote')" class="item">
          <div class="right-icon">
            <i class="bi bi-chevron-right"></i>
          </div>
          <img src="../../../../../assets/icons/classic-vote.png" class="vote-icon"/>
          <div class="text">
            Klasik Oylama
          </div>
        </div>
        <div @click="selectVoteType('create-yes-no-vote')" class="item">
          <div class="right-icon">
            <i class="bi bi-chevron-right"></i>
          </div>
          <img src="../../../../../assets/icons/classic-vote.png" class="vote-icon"/>
          <div class="text">
            Kabul-Red Oylama
          </div>
        </div>
      </div>
      <div v-else class="create-vote">
        <component class="form" :is="activeVoteType"/>
        <div class="bottom">
          <div @click="activeVoteType=''" class="cancel-btn">
            geri
          </div>
          <standart-button text="Oylama Başlat" is-disable="true"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import StandartButton from '../../../../shared/elements/StandartButton';
import CreateClassicVote from './CreateMultipleOptionsVote';
import CreateYesNoVote from './CreateDoubleOptionsVote';

export default {
  name: 'CreateVotePopup',
  props: ['isEnable'],
  data() {
    return {
      activeVoteType: ''
    };
  },
  components: {
    Popup,
    StandartButton,
    CreateClassicVote,
    CreateYesNoVote
  },
  methods: {
    selectVoteType(type) {
      this.activeVoteType = type;
    }
  },
  computed: {
    isActiveVoteType() {
      return this.activeVoteType !== '';
    }
  }
};
</script>

<style lang="scss" scoped>
.choose-vote-type {

  .item {
    @include center-lg-box-shadow;
    position: relative;
    display: flex;
    align-items: center;
    background-color: #ffffff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px 0;
    font-weight: 500;
    color: $df-blue-color;
    transition: .2s;

    &:hover {
      background-color: $df-very-light-blue-color;

      .right-icon {
        transform: translateX(-6px);
      }
    }

    .right-icon {
      position: absolute;
      right: 10px;
      font-size: 17px;
      transition: .2s;
    }

    img {
      width: 40px;
    }

    .text {
      margin-left: 30px;

    }
  }
}

.create-vote {
  .form {
    border-bottom: 1px solid #e3e3e3;
    padding-bottom: 5px;
  }

  .bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid $df-blue-color-hover-light;

    .cancel-btn {
      cursor: pointer;
      color: $df-mdl-dark-black-color;

      &:hover {
        color: $df-dark-blue-color;
      }
    }
  }
}
</style>
