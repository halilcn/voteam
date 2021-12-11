<template>
  <div class="users">
    <members-top
        :is-loading="isLoadingUsers"
        :user-invitations-length="userInvitations.length"
        :users-length="users.length"
        :userHasPermissions="userHasPermissions"
        v-model:should-get-users-of-team="shouldGetUsersOfTeam"/>
    <members-list
        :is-loading="isLoadingUsers"
        :userInvitations="userInvitations"
        :users="users"
        :userHasPermissions="userHasPermissions"
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
      shouldGetUsersOfTeam: false,
      userHasPermissions: false
    };
  },
  watch: {
    shouldGetUsersOfTeam(newValue) {
      if (newValue) this.getUsersOfTeamAction();
      this.shouldGetUsersOfTeam = false;
    }
  },
  components: {
    MembersList,
    MembersTop
  },
  methods: {
    ...mapActions('teamUser', ['getUsersOfTeam', 'getPermissionsUserOfTeam']),
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
    },
    getPermissionsUserOfTeamAction() {
      this.handle(async () => {
        const { all_permissions } = await this.getPermissionsUserOfTeam();
        this.userHasPermissions = all_permissions;
      });
    }
  },
  created() {
    this.getUsersOfTeamAction();
    this.getPermissionsUserOfTeamAction();
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
