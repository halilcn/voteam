<template>
  <user-invitation-popup :is-enable="isEnableUserInvitationPopup"
                         @handlePopup="toggleUserInvitationPopup"/>

  <page-title>
    <i class="bi bi-people"></i>
    Üyeler
  </page-title>

  <loading-animation
      v-if="isLoading"
      class="loading-users-top"
      :text-line-count="2"
      :text-line-height="15"/>

  <div v-else class="users-top">
    <div class="user-info">
      <div class="item">
        <div class="title">
          <img src="../../../../assets/icons/users.png"/>
        </div>
        <div class="content">
          {{ usersLength }} üye
        </div>
      </div>
      <div v-if="userInvitationsLength > 0" class="item">
        <div class="title">
          <img src="../../../../assets/icons/notifications/invitation.png"/>
        </div>
        <div class="content">
          {{ userInvitationsLength }} davet bekliyor
        </div>
      </div>
    </div>
    <div class="users-actions">
      <div @click="toggleUserInvitationPopup" class="add-user-btn">
        <i class="bi bi-person-plus"></i>
        Üye Daveti
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
  props: ['userInvitationsLength', 'usersLength', 'isLoading'],
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
.users-top {
  display: flex;
  align-items: center;
  padding-bottom: 15px;
  border-bottom: 1px solid #e5e8f1;

  .user-info {
    margin-top: 20px;
    display: flex;
    align-items: center;

    > .item {
      display: flex;
      align-items: center;
      margin-right: 30px;
      padding: 4px 12px;
      font-size: 13px;
      background-color: #f0f1f3;
      color: $df-black-and-blue-color;
      border-radius: 5px;

      .title img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
      }

      .content {
        margin-left: 4px;
      }
    }
  }

  .users-actions {
    margin-left: auto;
    display: flex;

    .add-user-btn {
      background-color: $df-blue-color;
      color: white;
      margin-left: auto;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 15px;
      transition: .2s;

      &:hover {
        background-color: $df-blue-color-hover-dark;
      }

      i {
        margin-right: 6px;
      }
    }
  }
}
</style>
