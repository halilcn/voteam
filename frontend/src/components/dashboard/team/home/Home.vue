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
  },
};
</script>

<style lang="scss" scoped>
.home {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  height: 100%;
}

@media only screen and (max-width: 1250px) {

}

@media only screen and (min-height: 750px) {
  .home {
    .team {
      .team-info {
        justify-content: flex-start;

        .item {
          margin-bottom: 60px;
        }
      }
    }
  }
}
</style>
