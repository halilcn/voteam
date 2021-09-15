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
  font-weight: 300;
  font-size: 13px;
  padding: 10px 0;
  text-align: center;
  background-color: #f2f7ff;
  color: #6e6e6e;
}
</style>
