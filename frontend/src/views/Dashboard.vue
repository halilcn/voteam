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
import TopHeader from '../components/dashboard/top-header/TopHeader';
import LeftSidebar from '../components/dashboard/LeftSidebar';

export default {
  name: 'TeamDashboardHome',
  components: {
    TopHeader,
    LeftSidebar
  },
  beforeCreate() {
    this.$store.dispatch('activeTeam/getTeamSettings');
  }
};
</script>

<style lang="scss" scoped>
.dashboard {
  display: flex;
  height: 100%;

  .content {
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 0 20px;

    .router-view-content {
      position: relative;
      height: 100%;
      overflow: hidden;
      padding: 25px 0 5px 0;
    }
  }
}
</style>
