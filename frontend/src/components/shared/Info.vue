<template>
  <div class="info">
    <i class="bi bi-info-circle"></i>
    {{ text }}
  </div>
</template>

<script>
export default {
  name: 'Info',
  props: {
    text: {
      required: true,
      type: String
    }
  }
};
</script>

<style lang="scss" scoped>
.info {
  font-size: 13px;
  font-weight: 300;
  color: #414141;
}

@media only screen and (max-width: $df-mobile-width) {
  .info {
    font-size: 12px;
  }
}
</style>
