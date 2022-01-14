<template>
  <div class="finished-vote-detail">
    <loading-animation
        v-if="isLoading"
        :textLineHeight="15"
        :textCount="2"/>
    <div v-else class="content">
      <div class="vote-content-area top">
        <div @click="showFinishedVoteList"
             class="back-btn">
          <i class="bi bi-caret-left"></i>
          {{ $t('popups.finishedVote.content.detail.back') }}
        </div>
        <div class="vote-title">
          {{ vote.title }}
        </div>
      </div>
      <component :is="voteTypeComponent(vote.type)"
                 :data="vote.data"
                 class="vote-content-area"/>
      <div class="vote-content-area vote-infos">
        <div class="item">
          <div class="title">
            <i class="bi bi-clock-fill"></i>
            {{ $t('popups.finishedVote.content.detail.endTime') }}
          </div>
          <div class="content">
            {{ $dayjs(vote.end_date).format('D MMMM YYYY') }}
          </div>
        </div>
        <div class="item">
          <div class="title">
            <i class="bi bi-stopwatch-fill"></i>
            {{ $t('popups.finishedVote.content.detail.totalVoteTime') }}
          </div>
          <div class="content">
            {{ vote.total_voting_day }} {{ $t('popups.finishedVote.content.detail.day') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import modelValueMixin from '../../../../../../mixins/modelValueMixin';
import FinishedDoubleVoteContent from './FinishedDoubleVoteContent';
import FinishedMultipleVoteContent from './FinishedMultipleVoteContent';
import FinishedPowerVoteContent from './FinishedPowerVoteContent';
import LoadingAnimation from '../../../../../shared/LoadingAnimation';
import constants from '../../../../../../store/constants';
import { mapActions } from 'vuex';

export default {
  name: 'FinishedVoteDetail',
  mixins: [modelValueMixin],
  data() {
    return {
      vote: {},
      isLoading: false
    };
  },
  components: {
    FinishedDoubleVoteContent,
    FinishedMultipleVoteContent,
    FinishedPowerVoteContent,
    LoadingAnimation
  },
  methods: {
    ...mapActions('finishedVote', ['getFinishedVoteDetail']),
    getFinishedVoteDetailAction() {
      this.handle(async () => {
        this.isLoading = true;
        this.vote = await this.getFinishedVoteDetail(this.value);
      }).finally(() => {
        this.isLoading = false;
      });
    },
    showFinishedVoteList() {
      this.value = null;
    },
    voteTypeComponent(voteType) {
      if (voteType === constants.VOTE_TYPES['POWER']) return 'FinishedPowerVoteContent';
      if (voteType === constants.VOTE_TYPES['DOUBLE']) return 'FinishedDoubleVoteContent';
      if (voteType === constants.VOTE_TYPES['MULTIPLE']) return 'FinishedMultipleVoteContent';
    }
  },
  created() {
    this.getFinishedVoteDetailAction();
  }
};
</script>

<style lang="scss" scoped>
$area-padding: 12px;

.finished-vote-detail .content .vote-content-area {
  @include center-lg-box-shadow;
  padding: $area-padding;
  color: $df-dark-blue-color;
  margin-bottom: 10px;
  border: 1px solid $df-very-light-blue-color;
  border-radius: 5px;

  &.top {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;

    .back-btn {
      display: flex;
      align-items: center;
      position: absolute;
      left: 10px;
      font-size: 13px;
      font-weight: 300;
      cursor: pointer;
      background-color: #f5f5f5;
      color: $df-black-and-blue-color;
      padding: 5px 8px;
      border-radius: 5px;
      transition: .2s;

      &:hover {
        background-color: #ececec;
      }

      i {
        margin-right: 4px;
      }
    }

    .vote-title {
      color: $df-dark-blue-color;
    }
  }

  &.vote-infos {
    padding: 0 !important;

    .item {
      padding: $area-padding;
      margin: 7px 0;

      &:first-child {
        border-bottom: 1px solid #e2e7ee;
      }

      .title {
        color: $df-black-and-blue-color;
      }

      .content {
        margin-top: 5px;
        font-weight: 300;
        color: $df-dark-blue-color;
      }
    }
  }
}
</style>
