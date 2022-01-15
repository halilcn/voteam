<template>
  <user-invitation-popup
      :is-enable="isEnableUserInvitationPopup"
      @handlePopup="toggleUserInvitationPopup"
      @update:should-get-users-of-team="$emit('update:should-get-users-of-team',$event)"/>
  <page-title>
    <i class="bi bi-people"></i>
    {{ $t('dashboard.members.top.members') }}
  </page-title>
  <loading-animation
      v-if="isLoading"
      :text-line-count="2"
      :text-line-height="15"/>
  <div v-else class="users-top">
    <div class="user-info">
      <div class="item">
        <div class="title">
          <img src="../../../../assets/icons/users.png" alt="users-icon"/>
        </div>
        <div class="content">
          {{ usersLength }} {{ $t('dashboard.members.top.member') }}
        </div>
      </div>
      <div v-if="userInvitationsLength > 0" class="item">
        <div class="title">
          <img src="../../../../assets/icons/notifications/invitation.png" alt="invitation-icon"/>
        </div>
        <div class="content">
          {{ userInvitationsLength }} {{ $t('dashboard.members.top.invitesWaiting') }}
        </div>
      </div>
    </div>
    <div class="users-actions">
      <div @click="toggleUserInvitationPopup"
           :class="{disable:!userHasPermissions}"
           class="add-user-btn">
        <i class="bi bi-person-plus-fill"></i>
        {{ $t('dashboard.members.top.memberInvitation') }}
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from '../shared/PageTitle';
import UserInvitationPopup from './UserInvitationPopup';
import LoadingAnimation from '../../../shared/LoadingAnimation';

export default {
  name: 'MembersTop',
  emits: ['update:should-get-users-of-team'],
  props: ['userInvitationsLength', 'usersLength', 'isLoading', 'userHasPermissions'],
  data() {
    return {
      isEnableUserInvitationPopup: false
    };
  },
  components: {
    PageTitle,
    UserInvitationPopup,
    LoadingAnimation
  },
  methods: {
    toggleUserInvitationPopup() {
      this.isEnableUserInvitationPopup = !this.isEnableUserInvitationPopup;
    }
  }
};
</script>

<style lang="scss" scoped>
$default-padding: 5px 10px;
$default-border-radius: 5px;

.users-top {
  display: flex;
  align-items: center;
  padding: 15px 0;
  border-bottom: 1px solid #e5e8f1;


  .user-info {
    display: flex;

    > .item {
      display: flex;
      align-items: center;
      margin-right: 30px;
      padding: $default-padding;
      font-size: 13px;
      background-color: #f0f1f3;
      color: $df-black-and-blue-color;
      border-radius: $default-border-radius;

      .title > img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
      }
    }
  }

  .users-actions {
    margin-left: auto;

    .add-user-btn {
      background-color: $df-blue-color;
      color: white;
      padding: $default-padding;
      cursor: pointer;
      border-radius: $default-border-radius;
      font-size: 15px;
      transition: .2s;

      &:hover {
        background-color: $df-blue-color-hover-dark;
      }

      &.disable {
        display: none;
      }

      i {
        margin-right: 6px;
      }
    }
  }
}
</style>
