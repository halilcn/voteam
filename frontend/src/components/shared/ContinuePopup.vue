<template>
  <popup title="Devam etmeye emin misin ?"
         is-enable="true">
    <template v-slot:content>
      test 123
    </template>
  </popup>
</template>

<script>
import Popup from './Popup';

export default {
  name: 'ContinuePopup',
  components: {
    Popup
  }
};
</script>

<style scoped>

</style>
