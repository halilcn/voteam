<template>
  <div class="about-container">
    <top-header/>
    <div>
      hakkında
    </div>
  </div>
</template>

<script>
import TopHeader from '../components/home/TopHeader';

export default {
  name: 'About',
  components: {
    TopHeader
  }
};
</script>

<style scoped>
.about-container {
  height: 100%;
}
</style>
