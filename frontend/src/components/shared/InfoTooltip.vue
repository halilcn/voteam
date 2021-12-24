<template>
  <div class="tooltip">
    <i :class="iconClass"/>
    <span class="tooltiptext">
     {{ text }}
    </span>
  </div>
</template>

<script>
export default {
  name: 'Tooltip',
  props: {
    text: {
      type: String,
      required: true
    },
    iconClass: {
      type: String,
      required: false,
      default: 'bi bi-info-circle-fill'
    }
  }
};
</script>

<style lang="scss" scoped>
.tooltip {
  position: relative;

  i {
    color: $df-light-dark-black-color;
  }

  .tooltiptext {
    @include center-md-box-shadow;
    font-size: 10px;
    visibility: hidden;
    opacity: 0;
    width: 120px;
    background-color: white;
    text-align: center;
    border-radius: 6px;
    position: absolute;
    z-index: 5;
    bottom: 170%;
    left: 50%;
    margin-left: -60px;
    padding: 5px;
    transition: .2s;

    &::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: white transparent transparent transparent;
    }
  }

  &:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    bottom: 150%;
  }
}
</style>
