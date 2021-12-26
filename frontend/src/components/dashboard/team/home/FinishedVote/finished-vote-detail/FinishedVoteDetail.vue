<template>
  <div class="finished-vote-detail">
    <div class="vote-content-area top">
      <div class="back-btn">
        <i class="bi bi-caret-left"></i>
        geri
      </div>
      <div class="vote-title">
        Kkjasdad sdsad asdasdsa asdsadsa
      </div>
    </div>
    <div class="vote-content-area">
      vote sonuç content
    </div>
    <div class="vote-content-area vote-infos">
      <div class="item">
        <div class="title">
          <i class="bi bi-clock-fill"></i>
          Oylama Bitiş Tarihi
        </div>
        <div class="content">
          12 Ocak
        </div>
      </div>
      <div class="item">
        <div class="title">
          <i class="bi bi-stopwatch-fill"></i>
          Toplam Oylama Süresi
        </div>
        <div class="content">
          2 gün
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FinishedVoteDetail'
};
</script>

<style lang="scss" scoped>
.finished-vote-detail {
  .vote-content-area {
    @include center-lg-box-shadow;
    padding: 10px;
    color: $df-dark-blue-color;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid $df-very-light-blue-color;

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
      padding: 0 !important; //?
      .item {
        padding: 10px; //?
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
}
</style>
