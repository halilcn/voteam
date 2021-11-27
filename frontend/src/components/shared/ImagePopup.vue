<template>
  <popup
      title="Fotoğraf"
      width="340"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <img class="option-image" :src="path" alt="image"/>
    </template>
  </popup>
</template>

<script>
import Popup from './Popup';

export default {
  name: 'ShowImagePopup',
  props: ['isEnable', 'path'],
  components: {
    Popup
  }
};
</script>

<style lang="scss" scoped>
.option-image {
  width: 100%;
  border-radius: 10px;
}
</style>
