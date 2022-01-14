<template>
  <div v-if="data.status" class="detail success">
    <div class="title">
      <i class="bi bi-patch-check-fill"></i>
      {{ data.message }}
    </div>
    <div class="result">
      {{ translateResult(data.status) }}
    </div>
  </div>
  <div v-else class="detail unsuccessful">
    <div class="title">
      <i class="bi bi-x-circle"></i>
      {{ data.message }}
    </div>
    <div class="result">
      {{ translateResult(data.status) }}
    </div>
    <div v-if="typeof data.info_message !== undefined" class="info-message">
      <i class="bi bi-info-circle"></i>
      {{ data.info_message }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'FinishedDoubleVoteContent',
  props: {
    data: {
      type: Object,
      required: true
    }
  },
  methods: {
    translateResult(status) {
      return status ? this.$t('dashboard.general.vote.acceptRefuseVote.accepted') : this.$t('dashboard.general.vote.acceptRefuseVote.rejected');
    }
  }
};
</script>

<style lang="scss" scoped>
@include finished-vote;
</style>
