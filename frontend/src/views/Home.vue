<template>
  <top-header/>
  <middle-content/>
  <bottom-footer/>
</template>

<script>
import TopHeader from '../components/home/TopHeader';
import Content from '../components/home/Content';
import Footer from '../components/shared/Footer';

export default {
  name: 'Home',
  components: {
    TopHeader,
    BottomFooter: Footer,
    MiddleContent: Content
  }
};
</script>

<style lang="scss">

</style>
