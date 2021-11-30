<template>
  <div>
  {{voteData}}
  </div>
</template>

<script>
export default {
  name: 'PowerTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading']
};
</script>

<style scoped>

</style>
