<template>
  <div class="vote-text">
    {{ voteData.message }}
  </div>
  <div class="vote-actions">
    <div @click="sendAnswerVote(true)"
         :class="{disable:isLoading}"
         class="btn accept-button">
      <i class="bi bi-check-circle"></i>
      {{ $t('popups.userVote.content.acceptRefuseVote.accept') }}
    </div>
    <div @click="sendAnswerVote(false)"
         :class="{disable:isLoading}"
         class="btn refuse-button">
      <i class="bi bi-x-circle"></i>
      {{ $t('popups.userVote.content.acceptRefuseVote.reject') }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'DoubleTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading'],
  methods: {
    sendAnswerVote(answer) {
      this.$emit('postAnswerVote', { answer });
    }
  }
};
</script>

<style lang="scss" scoped>
.vote-text {
  @include text-length-limit;
  text-align: justify;
}

.vote-actions {
  margin-top: 15px;
  font-weight: 500;
  display: flex;
  align-items: center;
  justify-content: space-between;

  .btn {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    transition: .2s;
    border: 1px solid transparent;

    &:hover {
      color: white !important;
    }

    &:first-child {
      margin-right: 20px;
    }

    &:last-child {
      margin-left: 20px;
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
