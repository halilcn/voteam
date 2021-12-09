<template>
  <div class="users">
    <members-top
        :is-loading="isLoadingUsers"
        :user-invitations-length="userInvitations.length"
        :users-length="users.length"
        v-model:should-get-users-of-team="shouldGetUsersOfTeam"/>
    <members-list
        :is-loading="isLoadingUsers"
        :userInvitations="userInvitations"
        :users="users"
        v-model:should-get-users-of-team="shouldGetUsersOfTeam"/>
  </div>
</template>

<script>
import MembersList from './MembersList';
import MembersTop from './MembersTop';
import { mapActions } from 'vuex';

export default {
  name: 'Members',
  data() {
    return {
      users: [],
      userInvitations: [],
      isLoadingUsers: false,
      shouldGetUsersOfTeam: false
    };
  },
  watch: {
    shouldGetUsersOfTeam() {
      this.getUsersOfTeamAction();
    }
  },
  components: {
    MembersList,
    MembersTop
  },
  methods: {
    ...mapActions('teamUser', ['getUsersOfTeam']),
    getUsersOfTeamAction() {
      this.handle(async () => {
        this.isLoadingUsers = true;
        const { user_invitations, users } = await this.getUsersOfTeam();
        this.userInvitations = user_invitations;
        this.users = users;
      })
          .finally(() => {
            this.isLoadingUsers = false;
          });
    }
  },
  created() {
    this.getUsersOfTeamAction();
  }
};
</script>

<style lang="scss" scoped>
.users {
  height: 100%;
  display: flex;
  flex-direction: column;
}
</style>
