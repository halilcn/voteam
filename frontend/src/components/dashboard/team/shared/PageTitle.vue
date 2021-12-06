<template>
  <div class="page-title">
    <slot/>
  </div>
</template>

<script>

export default {
  name: 'PageTitle'
};
</script>

<style lang="scss" scoped>
.page-title {
  font-weight: 400;
  font-size: 22px;
  color: $df-dark-blue-color;
}
</style>
