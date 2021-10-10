<template>
  <popup title="Oylama Başlat"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    test
  </popup>
</template>

<script>
import Popup from '../../../shared/Popup';

export default {
  name: 'CreateVotePopup',
  props: ['isEnable'],
  components: {
    Popup
  }
};
</script>

<style scoped>

</style>
