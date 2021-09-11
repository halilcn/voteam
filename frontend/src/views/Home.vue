<template>
  <div class="home">
    <top-header/>
    <content2/>
  </div>
</template>

<script>
import TopHeader from '../components/home/TopHeader'
import Content from '../components/home/Content'

export default {
  name: 'Home',
  components: {
    TopHeader: TopHeader, //import('@/components/home/TopHeader'),
    Content2: Content//import('@/components/home/TopHeader'),
  }
}
</script>

<style lang="scss">

</style>
