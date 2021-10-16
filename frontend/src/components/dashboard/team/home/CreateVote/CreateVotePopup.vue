<template>
  <popup
      title="Oylama Başlat"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div v-if="!isActiveVoteType" class="choose-vote-type">
        <div @click="selectVoteType('create-multiple-options-vote')" class="item">
          <img src="../../../../../assets/icons/multiple-options-vote.png" class="vote-icon"
               alt="multiple-options-vote"/>
          <div class="text">
            Çoklu Oylama
          </div>
          <div class="right-icon">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
        <div @click="selectVoteType('create-double-options-vote')" class="item">
          <img src="../../../../../assets/icons/double-options-vote.png" class="vote-icon" alt="double-options-vote"/>
          <div class="text">
            Kabul/Red Oylaması
          </div>
          <div class="right-icon">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
      </div>
      <div v-else class="create-vote">
        <div class="form">
          <vote-title
              v-model="v$.vote.title.$model"
              :errors="getOnlyErrors(v$.vote.title.$errors)"/>
          <component
              :is="activeVoteType"
              class="form"/>
          <vote-start-date
              v-model="v$.vote.startDate.$model"
              :errors="getOnlyErrors(v$.vote.startDate.$errors)"/>
          <vote-end-date
              v-model="v$.vote.endDate.$model"
              :errors="getOnlyErrors(v$.vote.endDate.$errors)"
              :minDate="vote.startDate"/>
        </div>
        <div class="bottom">
          <div @click="activeVoteType=''" class="cancel-btn">
            geri
          </div>
          <standart-button
              text="Oylama Başlat"
              is-disable="true"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import StandartButton from '../../../../shared/elements/StandartButton';
import CreateMultipleOptionsVote from './CreateMultipleOptionsVote';
import CreateDoubleOptionsVote from './CreateDoubleOptionsVote';
import VoteTitle from './CreateVoteItems/VoteTitle';
import VoteStartDate from './CreateVoteItems/VoteStartDate';
import VoteEndDate from './CreateVoteItems/VoteEndDate';
import validateMixin from '../../../../../mixins/validateMixin';

export default {
  name: 'CreateVotePopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      isLoadingCreateVote: false,
      activeVoteType: '',
      v$: this.useVuelidate(),
      vote: {
        title: '',
        startDate: this.$dayjs().format('YYYY-MM-DD'),
        endDate: this.$dayjs().add(1, 'day').format('YYYY-MM-DD')
      }
    };
  },
  validations() {
    return {
      vote: {
        title: {
          //max 20 karakter
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        startDate: {
          //geçmiş tarih yazdığında hata ver
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        endDate: {
          //geçmiş tarih yazdığında hata ver, başlangıç tarihinden erken seçilirse hata ver
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  components: {
    Popup,
    StandartButton,
    CreateMultipleOptionsVote,
    CreateDoubleOptionsVote,
    VoteTitle,
    VoteStartDate,
    VoteEndDate
  },
  methods: {
    selectVoteType(type) {
      this.activeVoteType = type;
    },
    createVote() {
      alert();
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
    color: $df-mdl-dark-black-color;
    transition: .2s;

    &:hover {
      background-color: #f5f5f5;

      .right-icon {
        transform: translateX(-6px);
      }
    }

    .right-icon {
      position: absolute;
      right: 10px;
      font-size: 17px;
      transition: .2s;
      color: $df-blue-color;
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
