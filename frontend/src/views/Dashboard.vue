<template>
  <div class="dashboard">
    <left-sidebar/>
    <div class="content">
      <top-header/>
      <div class="router-view-content">
        <router-view/>
      </div>
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
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 0 25px;

    .router-view-content {
      position: relative;
      height: 100%;
      margin: 20px 0;
    }
  }
}
</style>
