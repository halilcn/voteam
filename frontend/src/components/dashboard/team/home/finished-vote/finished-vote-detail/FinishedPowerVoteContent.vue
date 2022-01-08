<template>
  <div class="detail success">
    <div class="title">
      <i class="bi bi-patch-check-fill"></i>
      {{ data.message }}
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
