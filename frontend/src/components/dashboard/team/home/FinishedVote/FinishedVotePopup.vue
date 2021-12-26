<template>
  <popup title="Bitmiş Oylamalar"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <finished-votes-list/>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import FinishedVotesList from './FinishedVotesList';

export default {
  name: 'FinishedVotePopup',
  props: ['isEnable'],
  components: {
    Popup,
    FinishedVotesList
  }
};
</script>

<style lang="scss" scoped>

</style>
