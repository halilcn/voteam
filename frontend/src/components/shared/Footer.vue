<template>
  <footer>
    {{ $t('footer.text') }}
  </footer>
</template>

<script>
export default {
  name: 'Footer'
};
</script>

<style lang="scss" scoped>
footer {
  font-weight: 500;
  font-size: 13px;
  padding: 30px 0;
  text-align: center;
  color: $df-black-and-blue-color;
  background-color: $df-very-light-blue-color;
}
</style>
