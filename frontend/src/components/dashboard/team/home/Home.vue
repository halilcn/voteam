<template>
  <div class="home">
    <votes-list/>
    <team-info/>
  </div>
</template>

<script>
import TeamInfo from './TeamInfo';
import VotesList from './VotesList';

export default {
  name: 'TeamHOme',
  components: {
    TeamInfo,
    VotesList
  }
};
</script>

<style lang="scss" scoped>
.home {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  height: 100%;
}
</style>
