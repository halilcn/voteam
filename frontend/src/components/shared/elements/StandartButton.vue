<template>
  <div
      class="btn"
      :class="{'disable':isDisable}">
    {{ text }}
  </div>
</template>

<script>
export default {
  name: 'StandartButton',
  props: {
    text: {
      required: true,
      type: String
    },
    isDisable: {
      default: false,
      type: Boolean
    }
  }
};
</script>

<style lang="scss" scoped>
.btn {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: $df-blue-color;
  color: white;
  padding: 7px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  border-radius: 5px;
  transition: .3s;

  &:hover {
    background-color: $df-blue-color-hover-light;
  }

  &.disable {
    @include button-disable;
  }
}
</style>
