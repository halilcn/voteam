<template>
  <div class="tooltip">
    <i class="bi bi-info-circle-fill"></i>
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
    }
  }
};
</script>

<style lang="scss" scoped>
.tooltip {
  position: relative;

  i {
    color: #838383;
  }

  .tooltiptext {
    @include center-md-box-shadow;
    font-size: 10px;
    visibility: hidden;
    width: 120px;
    background-color: white;
    text-align: center;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -60px;
    padding: 5px;

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
  }
}
</style>
