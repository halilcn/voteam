<template>
  <div class="user-menu">
    <user-edit-popup
        :is-enable="isEnableUserEditPopup"
        @handlePopup="toggleUserEditPopup"/>
    <div @click="toggleUserMenuDropdown" class="user-info">
      <div class="btn">
        <img class="image" :src="user.image" alt="user-image"/>
        <div class="name">{{ user.name }}</div>
      </div>
      <div v-if="isShowUserMenuDropdown" class="menu-dropdown">
        <div @click="toggleUserEditPopup" class="item">
          <i class="bi bi-person"></i>
          {{$t('dashboard.top.userMenu.editProfile')}}
        </div>
        <div @click="postLogout" class="item close">
          <i class="bi bi-door-closed"></i>
          {{$t('dashboard.top.userMenu.logout')}}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserEditPopup from './UserEditPopup';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'UserMenu',
  data() {
    return {
      isShowUserMenuDropdown: false,
      isEnableUserEditPopup: false
    };
  },
  components: {
    UserEditPopup
  },
  methods: {
    ...mapActions('auth', ['postLogout']),
    toggleUserMenuDropdown() {
      this.isShowUserMenuDropdown = !this.isShowUserMenuDropdown;
    },
    toggleUserEditPopup() {
      this.isEnableUserEditPopup = !this.isEnableUserEditPopup;
    }
  },
  computed: {
    ...mapState('auth', ['user'])
  },
  created() {
    this.$helpers.clickOutside(this, 'isShowUserMenuDropdown');
  }
};
</script>

<style lang="scss" scoped>
.user-info {
  position: relative;

  .btn {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 5px 9px;
    border-radius: 5px;

    &:hover {
      background-color: #f3f3f3;
    }

    .image {
      width: 30px;
      height: 30px;
      border-radius: 100%;
    }

    .name {
      margin-left: 7px;
      font-size: 13px;
      color: $df-dark-blue-color;
    }
  }

  .menu-dropdown {
    @include center-md-box-shadow;
    top: 45px;
    width: 200px;
    right: 0;
    position: absolute;
    background-color: white;
    border-radius: 5px;
    overflow: hidden;
    z-index: 9;

    .item {
      cursor: pointer;
      font-size: 13px;
      padding: 7px 10px;
      display: flex;
      align-items: center;
      color: $df-dark-blue-color;

      &.close {
        color: $df-red-color;

        &:hover {
          background-color: #fff5f5;;
        }
      }

      &:hover {
        background-color: #f5f5f5;
      }

      i {
        font-size: 15px;
        margin-right: 7px;
      }
    }
  }
}
</style>
