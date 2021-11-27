<template>
  <popup
      title="Oy Ver"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="user-vote">
        <div class="vote-area vote-title">
          Geleneksel Yemek Oylaması
        </div>
        <div class="vote-area vote-content">
          <component
              :is="voteType"
              @post-vote="postVoteAction"/>
        </div>
        <div class="vote-area vote-info">
          <div class="text">
            <div class="title">
              Kullanılmış Oy Oranı
            </div>
            <div class="time">
              (7 saat sonra bitiyor)
            </div>
          </div>
          <progress-bar class="progress-bar" percent="65.12"/>
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

export default {
  name: 'UserVote',
  props: ['isEnable'],
  data() {
    return {
      voteType: 'double-type-vote'
    };
  },
  components: {
    Popup,
    DoubleTypeVote,
    ProgressBar,
    MultipleTypeVote
  },
  methods: {
    postVoteAction() {
      alert();
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
