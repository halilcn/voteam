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
          <div @click="clearActiveType" class="cancel-btn">
            geri
          </div>
          <standart-button
              text="Oylama Başlat"
              :is-disable="isDisableCreateVoteButton"
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
import customValidators from '../../../../../mixins/customValidators';
import Error from '../../../../shared/Errors';
import { mapActions } from 'vuex';

export default {
  name: 'CreateVotePopup',
  mixins: [validateMixin, customValidators],
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
        options: {
          required: this.validators.required
        },
        startDate: {
          required: this.multipleLangError('errors.required', this.validators.required),
          nextDate: this.multipleLangError('errors.nextDate', this.nextDate)
        },
        endDate: {
          required: this.multipleLangError('errors.required', this.validators.required),
          nextDate: this.multipleLangError('errors.nextDate', this.nextDate),
          fromStartDate: this.multipleLangError('errors.fromStartDate', this.fromStartDate)
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
    ...mapActions('vote', ['postVote']),
    selectVoteType(type) {
      if (type === 'create-multiple-options-vote') {
        this.vote.type = 'multiple';
      }

      if (type === 'create-double-options-vote') {
        this.vote.type = 'double';
      }

      this.activeVoteType = type;
    },
    clearActiveType() {
      this.activeVoteType = '';
    },
    createdVote() {
      this.clearActiveType();
      this.vote = this.$helpers.clearItems(this.vote);
      this.v$.vote.$reset();
      this.$emit('handlePopup');
    },
    createVote() {
      this.handle(async () => {
        this.isLoadingCreateVote = true;
        await this.postVote(this.vote);
        this.createdVote();
      })
          .finally(() => {
            this.isLoadingCreateVote = false;
          });
    }
  },
  computed: {
    isActiveVoteType() {
      return this.activeVoteType !== '';
    },
    isVoteTypeHasErrors() {
      return this.voteTypeErrors.length > 0;
    },
    fromStartDate() {
      const self = this;
      return (value) => {
        return self.$dayjs(self.vote.startDate).isBefore(value);
      };
    },
    isDisableCreateVoteButton() {
      return this.v$.vote.$invalid || this.isVoteTypeHasErrors || this.isLoadingCreateVote;
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
