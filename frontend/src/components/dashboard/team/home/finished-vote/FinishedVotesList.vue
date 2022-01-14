<template>
  <div class="finished-votes-list">
    <loading-animation
        v-if="isLoading"
        :textLineCount="2"
        :textCount="4"/>
    <div class="list-content">
      <div v-for="(vote,index) in finishedVotes"
           :key="index"
           class="item">
        <img class="vote-type-img"
             :src="require(`../../../../../assets/icons/${vote.type}-type-vote.png`)"
             alt="vote-type"/>
        <div class="vote-info">
          <div class="title">
            {{ vote.title }}
          </div>
          <div class="time">
            <i class="bi bi-stopwatch"></i>
            {{ $dayjs(vote.end_date).from($dayjs().utc()) }}
          </div>
        </div>
        <div v-if="vote.calculated"
             @click="showFinishedVoteDetail(vote.id)"
             class="right-content show-answer-result">
          {{ $t('popups.finishedVote.content.list.showAnswer') }}
          <i class="bi bi-chevron-compact-right"></i>
        </div>
        <div v-else class="right-content wait-info">
          <i class="bi bi-hourglass-split"></i>
          {{ $t('popups.finishedVote.content.list.waitInfo') }}...
        </div>
      </div>
      <div
          v-if="hasMoreFinishedVotes"
          @click="getMoreFinishedVotesAction"
          class="more-finished-votes-btn">
        {{ $t('popups.finishedVote.content.list.moreFinished') }}
      </div>
    </div>
  </div>
</template>

<script>
import LoadingAnimation from '../../../../shared/LoadingAnimation';
import modelValueMixin from '../../../../../mixins/modelValueMixin';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'FinishedVotesList',
  mixins: [modelValueMixin],
  data() {
    return {
      isLoading: false
    };
  },
  components: {
    LoadingAnimation
  },
  methods: {
    ...mapActions('finishedVote', ['getFinishedVotes']),
    getFinishedVotesAction() {
      this.handle(async () => {
        this.isLoading = true;
        await this.getFinishedVotes();
      })
          .finally(() => {
            this.isLoading = false;
          });
    },
    getMoreFinishedVotesAction() {
      this.handle(async () => {
        await this.getFinishedVotes(true);
      });
    },
    showFinishedVoteDetail(voteId) {
      this.value = voteId;
    }
  },
  computed: {
    ...mapState('finishedVote', ['finishedVotes', 'hasMoreFinishedVotes'])
  },
  created() {
    this.getFinishedVotesAction();
  }
};
</script>

<style lang="scss" scoped>
.finished-votes-list {
  .item {
    @include center-lg-box-shadow;
    display: flex;
    align-items: center;
    padding: 10px;
    margin: 22px 0;
    border-radius: 5px;

    .vote-type-img {
      width: 40px;
      height: 40px;
    }

    .vote-info {
      margin-left: 17px;

      .title {
        font-size: 15px;
        color: $df-dark-blue-color;
      }

      .time {
        color: $df-black-and-blue-color;
        display: flex;
        align-items: center;
        font-size: 10px;
        font-weight: 300;

        i {
          margin-right: 4px;
        }
      }
    }

    .right-content {
      display: flex;
      align-items: center;
      margin-left: auto;
      padding: 7px 12px;
      font-weight: 300;
      font-size: 12px;
      transition: .3s;
      border-radius: 5px;

      &.show-answer-result {
        color: $df-blue-color;
        cursor: pointer;

        &:hover {
          background-color: $df-very-light-blue-color;

          i {
            transform: translateX(4px);
          }
        }

        i {
          transition: .3s;
          margin-left: 4px;
        }
      }

      &.wait-info {
        color: #8492a2;

        i {
          margin-right: 3px;
        }
      }
    }
  }

  .more-finished-votes-btn {
    text-align: center;
    cursor: pointer;
    font-weight: 300;
    padding: 10px 0;
    color: $df-black-and-blue-color;

    &:hover {
      color: $df-blue-color;
      text-decoration: underline;
    }
  }
}
</style>
