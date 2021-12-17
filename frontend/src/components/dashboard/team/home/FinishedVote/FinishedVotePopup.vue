<template>
  <popup title="Bitmiş Oylamalar"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <div class="finished-votes-list">
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="item">
          <img class="vote-type-img" src="../../../../../assets/icons/multiple-type-vote.png"/>
          <div class="vote-info">
            <div class="title">
              Vote title test başlık
            </div>
            <div class="time">
              <i class="bi bi-stopwatch"></i>
              12 saat önce
            </div>
          </div>
          <div class="show-answer-result">
            sonuçları gör
            <i class="bi bi-chevron-compact-right"></i>
          </div>
        </div>
        <div class="more-finished-votes-btn">
          daha fazla gör
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';

export default {
  name: 'FinishedVotePopup',
  props: ['isEnable'],
  components: { Popup }
};
</script>

<style lang="scss" scoped>
.finished-votes-list {
  .item {
    @include center-lg-box-shadow;
    display: flex;
    align-items: center;
    padding: 10px;
    margin: 14px 0;
    border-radius: 5px;

    .vote-type-img {
      width: 40px;
      height: 40px;
      //border-radius: 100%;
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

    .show-answer-result {
      color: $df-blue-color;
      display: flex;
      align-items: center;
      margin-left: auto;
      cursor: pointer;
      padding: 7px 12px;
      font-weight: 300;
      font-size: 12px;
      transition: .3s;
      border-radius: 5px;

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
