<template>
  <div class="progress-bar">
    <div
        :style="{width:`${percent}%`}"
        class="percent-text">
      %{{ percent }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProgressBar',
  props: {
    percent: {
      type: Number,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
$progress-bar-height: 23px;

.progress-bar {
  background-color: #efefef;
  height: $progress-bar-height;
  border-radius: 5px;
  overflow: hidden;

  .percent-text {
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: $progress-bar-height;
    background-color: $df-green-color;
    color: $df-dark-blue-color;
  }
}
</style>
