<template>
  <popup
      title="Oy Ver"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <loading-animation
          v-if="isLoadingVote"
          :textLineCount="5"
          :text-count="2"/>
      <div v-else class="user-vote">
        <div class="vote-area vote-title">
          {{ vote.title }}
        </div>
        <div class="vote-area vote-content">
          <component
              :is="vote.type+'-type-vote'"
              :data="vote.options"
              @post-vote="postVoteAction"/>
        </div>
        <div class="vote-area vote-info">
          <div class="text">
            <div class="title">
              Kullanılmış Oy Oranı
            </div>
            <div class="time">
              ({{ $dayjs($helpers.convertTimeToUtc(vote.end_date)).fromNow() }} bitiyor)
            </div>
          </div>
          <progress-bar class="progress-bar" :percent="vote.voted_percentage"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import DoubleTypeVote from './DoubleTypeVote';
import MultipleTypeVote from './MultipleTypeVote';
import ProgressBar from '../../../../shared/ProgressBar';
import LoadingAnimation from '../../../../shared/LoadingAnimation';
import { mapActions } from 'vuex';

export default {
  name: 'UserVote',
  props: ['isEnable', 'voteId'],
  data() {
    return {
      isLoadingVote: true,
      voteType: 'multiple-type-vote',
      vote: {}
    };
  },
  watch: {
    voteId() {
      this.getVoteAction();
    }
  },
  components: {
    Popup,
    DoubleTypeVote,
    ProgressBar,
    MultipleTypeVote,
    LoadingAnimation
  },
  methods: {
    ...mapActions('vote', ['getVote']),
    getVoteAction() {
      this.handle(async () => {
        this.isLoadingVote = true;
        this.vote = await this.getVote(this.voteId);
        console.log(this.vote);
      })
          .finally(() => {
            this.isLoadingVote = false;
          });
    },
    postVoteAction(option) {
      console.log(option);
    }
  }
};
</script>

<style lang="scss" scoped>
.user-vote {
  .vote-area {
    @include center-lg-box-shadow;
    padding: 10px;
    color: $df-dark-blue-color;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid $df-very-light-blue-color;

    &.vote-title {
      text-align: center;
      font-size: 18px;
    }

    &.vote-content {
      font-weight: 300;
    }

    &.vote-info {
      .text {
        display: flex;
        font-weight: 300;
        margin-bottom: 4px;

        .time {
          font-style: italic;
          margin-left: 7px;
          color: #7c7c7c;
        }
      }

      .progress-bar {
        margin-top: 8px;
      }
    }
  }
}
</style>
