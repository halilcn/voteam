<template>
  <div class="form-item">
    <div class="title">
      Başlık
    </div>
    <div class="content">
      <input class="content-text" type="text">
    </div>
  </div>
</template>

<script>
export default {
  name: 'VoteTitle'
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;
</style>
