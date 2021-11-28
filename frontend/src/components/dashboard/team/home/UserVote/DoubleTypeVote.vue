<template>
  <div class="vote-text">
    {{ voteData.message }}
  </div>
  <div class="vote-actions">
    <div
        @click="$emit('postAnswerVote',true)"
        :class="{disable:isLoading}"
        class="btn accept-button">
      <i class="bi bi-check-circle"></i>
      Kabul Et
    </div>
    <div
        @click="$emit('postAnswerVote',false)"
        :class="{disable:isLoading}"
        class="btn refuse-button">
      <i class="bi bi-x-circle"></i>
      Reddet
    </div>
  </div>
</template>

<script>
export default {
  name: 'DoubleTypeVote',
  props: ['voteData', 'isLoading']
};
</script>

<style lang="scss" scoped>
.vote-text {
  @include text-length-limit;
  text-align: justify;
}

.vote-actions {
  margin-top: 15px;
  font-weight: 400;
  display: flex;
  align-items: center;
  justify-content: space-evenly;

  .btn {
    width: 100%;
    padding: 7px;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 15px;
    text-align: center;
    transition: .2s;
    border: 1px solid transparent;

    &:hover {
      color: white !important;
    }

    i {
      margin-right: 5px;
    }

    &.disable {
      @include button-disable;
      border-color: $df-light-black !important;
    }

    &.accept-button {
      color: $df-green-color;
      border-color: $df-green-color;

      &:hover {
        background-color: $df-green-color;
      }
    }

    &.refuse-button {
      color: $df-red-color;
      border-color: $df-red-color;

      &:hover {
        background-color: $df-red-color;
      }
    }
  }
}
</style>
