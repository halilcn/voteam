<template>
  <div :class="{'input-error':isInputError}" class="errors">
    <div v-for="(item,key) in content" :key="key" class="item">
      <i class="bi bi-x-circle-fill"></i>
      {{ item }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'Error',
  props: {
    content: {
      required: true,
      type: Array
    },
    isInputError: {
      required: false,
      default: false,
    }
  }
};
</script>

<style lang="scss" scoped>


.errors {
  padding: 7px;
  background-color: $df-very-light-red-color;
  border-radius: 4px;

  &.input-error {
    border-radius: 0 0 4px 4px;
  }

  .item {
    display: flex;
    align-items: center;
    color: $df-red-color;
    font-size: 13px;
    font-weight: 300;
    margin: 3px 0;

    i {
      margin-right: 5px;
    }
  }
}
</style>
