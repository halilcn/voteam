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
        <div @click="selectVoteType('test')" class="item">
          <div class="right-icon">
            <i class="bi bi-chevron-right"></i>
          </div>
          <img src="../../../../../assets/icons/classic-vote.png" class="vote-icon"/>
          <div class="text">
            Kabul-Red Oylama
          </div>
        </div>
      </div>
      <div v-else class="create-vote create-classic-vote">
        <div>
          bura değişecek
          <component :is="activeVoteType"/>
        </div>
        <div class="bottom">
          <div @click="activeVoteType=''" class="cancel-btn">
            geri
          </div>
          <standart-button text="oluştur"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
//import StandartButton from '../../../../shared/elements/StandartButton';

export default {
  name: 'CreateVotePopup',
  props: ['isEnable'],
  data() {
    return {
      activeVoteType: ''
    };
  },
  components: {
    Popup
    // StandartButton
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

    &:hover {
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
  .bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #e3e3e3;
    padding-top: 10px;

    .cancel-btn {
      cursor: pointer;
      color: $df-mdl-dark-black-color;
    }
  }
}
</style>
