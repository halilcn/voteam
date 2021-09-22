<template>
  <div class="dashboard">
    <left-sidebar/>
    <div class="content">
      <top-header/>
      <router-view/>
    </div>
  </div>
</template>

<script>
import TopHeader from '../components/dashboard/TopHeader';
import LeftSidebar from '../components/dashboard/LeftSidebar';

export default {
  name: 'TeamDashboardHome',
  components: {
    TopHeader,
    LeftSidebar
  }
};
</script>

<style lang="scss" scoped>
.dashboard {
  display: flex;
  justify-content: flex-start;
  height: 100%;

  .content {
    width: 100%;
    padding: 0 7px;
  }
}
</style>
