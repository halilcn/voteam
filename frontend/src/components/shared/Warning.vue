<template>
  <div class="warning">
    <i class="bi bi-exclamation-triangle"></i>
    {{ text }}
  </div>
</template>

<script>
export default {
  name: 'Warning',
  props: {
    text: {
      required: true,
      type: String
    }
  }
};
</script>

<style lang="scss" scoped>
.warning {
  font-size: 13px;
  font-weight: 300;
  padding: 10px;
  background-color: $df-warning-yellow-bg-color;
  color: $df-warning-yellow-color;
  border-radius: 5px;
}

@media only screen and (max-width: $df-mobile-width) {
  .warning {
    font-size: 12px;
  }
}
</style>
