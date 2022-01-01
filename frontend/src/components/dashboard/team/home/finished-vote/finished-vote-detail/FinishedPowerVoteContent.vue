<template>
  <div>
    power vote
    {{ data }}
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

<style scoped>

</style>
