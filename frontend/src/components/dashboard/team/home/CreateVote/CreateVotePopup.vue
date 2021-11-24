<template>
  <popup
      title="Oylama Başlat"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div v-if="!isActiveVoteType" class="choose-vote-type">
        <div @click="selectVoteType('create-multiple-options-vote')" class="item">
          <img src="../../../../../assets/icons/multiple-type-vote.png" class="vote-icon"
               alt="multiple-options-vote"/>
          <div class="text">
            Çoklu Oylama
          </div>
          <div class="right-icon">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
        <div @click="selectVoteType('create-double-options-vote')" class="item">
          <img src="../../../../../assets/icons/double-type-vote.png" class="vote-icon" alt="double-options-vote"/>
          <div class="text">
            Kabul/Red Oylaması
          </div>
          <div class="right-icon">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
        <loading-animation
            v-if="isLoading.powerTypeVote"
            :textLineCount="2"
            :textLineHeight="17"/>
        <div v-else
             @click="selectVoteType('create-power-vote')"
             :class="{'power-vote-button-disable':dataForPostPowerTypeVote.has_power_type_vote_this_month}"
             class="item">
          <img src="../../../../../assets/icons/power-type-vote.png" class="vote-icon" alt="power-options-vote"/>
          <div class="text">
            Güç Oylaması
          </div>
          <div v-if="dataForPostPowerTypeVote.has_power_type_vote_this_month" class="power-vote-time-info">
            <i class="bi bi-clock"></i>
            {{ $dayjs(dataForPostPowerTypeVote.no_power_type_vote_date).fromNow() }}
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
              :is-power-vote="vote.type==='power'"
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
          <div class="create-vote-btn">
            <lottie-player
                v-if="isLoading.postVote"
                class="loading-icon"
                src="https://assets10.lottiefiles.com/packages/lf20_6m7gsdxq.json"
                background="transparent"
                speed="1"
                style="width: 40px; height: 40px;" loop autoplay/>
            <standart-button
                text="Oylama Başlat"
                :is-disable="isDisablePostVoteButton"
                @click="postVoteAction"/>
          </div>
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
import CreatePowerVote from './CreatePowerVote';
import VoteTitle from './CreateVoteItems/VoteTitle';
import VoteStartDate from './CreateVoteItems/VoteStartDate';
import VoteEndDate from './CreateVoteItems/VoteEndDate';
import validateMixin from '../../../../../mixins/validateMixin';
import customValidators from '../../../../../mixins/customValidators';
import Error from '../../../../shared/Errors';
import LoadingAnimation from '../../../../shared/LoadingAnimation';
import { mapActions } from 'vuex';
import constants from '../../../../../store/constants';

export default {
  name: 'CreateVotePopup',
  mixins: [validateMixin, customValidators],
  props: ['isEnable'],
  data() {
    return {
      v$: this.useVuelidate(),
      isLoading: {
        postVote: false,
        powerTypeVote: true
      },
      activeVoteType: '',
      voteTypeErrors: [],
      vote: {
        title: '',
        type: '',
        options: null,
        startDate: this.$dayjs().format('YYYY-MM-DD'),
        endDate: this.$dayjs().add(1, 'day').format('YYYY-MM-DD')
      },
      dataForPostPowerTypeVote: {}
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
    CreatePowerVote,
    VoteTitle,
    VoteStartDate,
    VoteEndDate,
    LoadingAnimation
  },
  methods: {
    ...mapActions('vote', ['postVote', 'checkTimeForPostPowerTypeVote']),
    selectVoteType(type) {
      this.clearVote();

      if (type === 'create-multiple-options-vote') this.vote.type = constants.VOTE_TYPES['MULTIPLE'];

      if (type === 'create-double-options-vote') this.vote.type = constants.VOTE_TYPES['DOUBLE'];

      if (type === 'create-power-vote') {
        this.vote.type = constants.VOTE_TYPES['POWER'];
        this.selectedPowerVote();
      }

      this.activeVoteType = type;
    },
    clearVote() {
      this.vote = this.$helpers.clearItems(this.vote);
      this.vote.startDate = this.$dayjs().format('YYYY-MM-DD');
      this.vote.endDate = this.$dayjs().add(1, 'day').format('YYYY-MM-DD');
      this.v$.vote.$reset();
    },
    clearActiveType() {
      this.activeVoteType = '';
    },
    selectedPowerVote() {
      this.vote.title = 'Güç Oylaması'; // TODO: $t() multiple lang
      this.vote.options = constants.POWER_VOTE_DEFAULT_OPTIONS;
    },
    createdVote() {
      this.clearActiveType();
      this.clearVote();

      this.$notify.success('Oylama Başlatıldı'); // TODO: $t() multiple language
      this.$emit('update:should-get-votes', true);
      this.$emit('handlePopup');
    },
    postVoteAction() {
      this.handle(async () => {
        this.isLoading.postVote = true;
        await this.postVote(this.vote);
        this.createdVote();
      })
          .finally(() => {
            this.isLoading.postVote = false;
          });
    },
    checkTimeForPostPowerTypeVoteAction() {
      this.handle(async () => {
        this.isLoading.powerTypeVote = true;
        this.dataForPostPowerTypeVote = await this.checkTimeForPostPowerTypeVote();
      })
          .finally(() => {
            this.isLoading.powerTypeVote = false;
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
    isDisablePostVoteButton() {
      return this.v$.vote.$invalid || this.isVoteTypeHasErrors || this.isLoading.postVote;
    }
  },
  watch: {
    isEnable(newValue) {
      if (newValue === true) {
        this.checkTimeForPostPowerTypeVoteAction();
      }
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
    transition: .2s;

    &:hover {
      background-color: #f5f5f5;

      .right-icon {
        transform: translateX(-6px);
      }
    }

    &.power-vote-button-disable {
      pointer-events: none;
      background-color: #f5f5f5;
      cursor: text;

      .text, .right-icon {
        color: #ababab;
      }

      img {
        filter: grayscale(100%);
      }
    }

    .power-vote-time-info {
      font-size: 11px;
      color: $df-light-blue-color;
      border: 1px solid $df-light-blue-color;
      border-radius: 4px;
      padding: 3px 5px;
      margin: 0 auto;
    }

    .text {
      font-weight: 500;
      color: $df-mdl-dark-black-color;
      margin-left: 30px;
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
  }
}

.create-vote {
  .form {
    .custom-vote-form {
      margin-bottom: 20px;

      .vote-type-form {
        margin-bottom: 0;
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

    .create-vote-btn {
      display: flex;

      .loading-icon {
        margin-right: 4px;
      }
    }
  }
}
</style>
