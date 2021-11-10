<template>
  <div class="success">
    <i class="bi bi-check2-circle"></i>
    {{ text }}
  </div>
</template>

<script>
export default {
  name: 'Success',
  props: {
    text: {
      required: true,
      type: String
    }
  }
};
</script>

<style lang="scss" scoped>
.success {
  font-size: 13px;
  font-weight: 300;
  padding: 10px;
  background-color: $df-very-light-green-color;
  color: $df-green-color;
  border-radius: 5px;
}

@media only screen and (max-width: $df-mobile-width) {
  .success {
    font-size: 12px;
  }
}
</style>
