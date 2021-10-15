<template>
  <div class="form-item">
    <div class="title">
      Oylama Bitiş Zamanı
    </div>
    <div class="content">
      <input class="content-text" type="date">
    </div>
  </div>
</template>

<script>
export default {
  name: 'VoteEndDate'
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;
</style>
