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
          <div class="custom-vote-form">
            <component
                class="vote-type-form"
                :is="activeVoteType"
                v-model="vote.options"
                v-model:vote-errors="voteTypeErrors"/>
            <error
                v-if="isVoteTypeHasErrors"
                :content="voteTypeErrors"
                class="vote-type-errors"/>
          </div>
          <vote-start-date
              v-model="v$.vote.startDate.$model"
              :errors="getOnlyErrors(v$.vote.startDate.$errors)"/>
          <vote-end-date
              v-model="v$.vote.endDate.$model"
              :errors="getOnlyErrors(v$.vote.endDate.$errors)"
              :minDate="this.$dayjs(vote.startDate).add(1,'day').format('YYYY-MM-DD')"/>
        </div>
        <div class="bottom">
          <div @click="activeVoteType=''" class="cancel-btn">
            geri
          </div>
          <standart-button
              text="Oylama Başlat"
              :is-disable="v$.vote.$invalid"
              @click="createVote"/>
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
import Error from '../../../../shared/Errors';

//vote type gelen errors paylaş butonuna etki etsin !!
export default {
  name: 'CreateVotePopup',
  mixins: [validateMixin],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoadingCreateVote: false,
      activeVoteType: '',
      voteTypeErrors: [],
      vote: {
        title: '',
        type: '',
        options: null,
        startDate: this.$dayjs().format('YYYY-MM-DD'),
        endDate: this.$dayjs().add(1, 'day').format('YYYY-MM-DD')
      }
    };
  },
  validations() {
    return {
      vote: {
        title: {
          required: this.multipleLangError('errors.required', this.validators.required),
          maxLength: this.multipleLangError('errors.maxLength', this.validators.maxLength(20))
        },
        startDate: {
          //geçmiş tarih yazdığında hata ver
          required: this.multipleLangError('errors.required', this.validators.required),
          //minValue: this.multipleLangError('errors.required', this.validators.minValue((value => {return this.$dayjs(value).toISOString() > this.$dayjs().toISOString();})))
        },
        endDate: {
          //geçmiş tarih yazdığında hata ver, başlangıç tarihinden erken seçilirse hata ver
          //çok ileri seçilemez
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  components: {
    Error,
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
      if (type === 'create-multiple-options-vote') {
        this.vote.type = 'multiple';
      }

      if (type === 'create-double-options-vote') {
        this.vote.type = 'double';
      }

      this.activeVoteType = type;
    },
    createVote() {
      console.log(this.vote);
    }
  },
  computed: {
    isActiveVoteType() {
      return this.activeVoteType !== '';
    },
    isVoteTypeHasErrors() {
      return this.voteTypeErrors.length > 0;
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
    //padding-bottom: 5px;

    .custom-vote-form {
      margin-bottom: 20px;

      .vote-type-form {
        margin-bottom: 0;
      }

      .vote-type-errors {
      }
    }
  }

  .bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid $df-very-light-blue-color;

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
