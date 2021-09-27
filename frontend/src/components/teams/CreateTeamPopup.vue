<template>
  <popup
      title="Takım Oluştur"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      asdasdsad
    </template>
  </popup>
</template>

<script>
import Popup from '../shared/Popup';

export default {
  name: 'CreateTeamPopup',
  props: ['isEnable'],
  components: {
    Popup
  }
};
</script>

<style scoped>

</style>
