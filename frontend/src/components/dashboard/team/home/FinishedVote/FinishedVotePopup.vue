<template>
  <popup title="Bitmiş Oylamalar"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      {{voteDetailId}}
      <finished-votes-list
          v-if="!activeVoteDetail"
          v-model="voteDetailId"/>
      <finished-vote-detail v-else/>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import FinishedVotesList from './FinishedVotesList';
import FinishedVoteDetail from './finished-vote-detail/FinishedVoteDetail';

export default {
  name: 'FinishedVotePopup',
  props: ['isEnable'],
  data() {
    return {
      voteDetailId: null
    };
  },
  components: {
    Popup,
    FinishedVotesList,
    FinishedVoteDetail
  },
  computed: {
    activeVoteDetail() {
      return this.voteDetailId;
    }
  }
};
</script>

<style lang="scss" scoped>

</style>
