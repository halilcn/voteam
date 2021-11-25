<template>
  <popup
      title="Oy Ver"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <div class="user-vote">
        <div class="vote-title">
          Geleneksel Yemek Oylaması
        </div>
        <div class="vote-content">
          <double-type-vote/>
        </div>
        <div class="vote-percent">
          <div class="text">
            Kullanılmış Oy Oranı
          </div>
          <progress-bar percent="65.12"/>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import DoubleTypeVote from './DoubleTypeVote';
import ProgressBar from '../../../../shared/ProgressBar';

export default {
  name: 'UserVote',
  props: ['isEnable'],
  components: {
    Popup,
    DoubleTypeVote,
    ProgressBar
  }
  //TODO: postVote burada oluşturulacak
};
</script>

<style lang="scss" scoped>
.user-vote {
  .vote-title {
    text-align: center;
    font-size: 15px;
    color: $df-dark-blue-color;
  }

  .vote-content {
    //    background-color: red;
    padding: 5px;
    border: 1px solid #d7d7d7;
    border-radius: 5px;
  }

  .vote-percent {
    .text {
      font-weight: 300;
      margin-bottom: 4px;
    }
  }
}
</style>
