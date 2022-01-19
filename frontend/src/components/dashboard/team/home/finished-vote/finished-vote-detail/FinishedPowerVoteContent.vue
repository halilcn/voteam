<template>
  <div v-if="data.status" class="detail success">
    <div class="title">
      <i class="bi bi-patch-check-fill"></i>
      {{ data.message }}
    </div>
  </div>
  <div v-else class="detail unsuccessful">
    <div class="title">
      <i class="bi bi-x-circle-fill"></i>
      {{ data.message }}
    </div>
    <div class="info-message">
      {{ data.info_message }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'FinishedPowerVoteContent',
  props: {
    data: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
@include finished-vote
</style>
