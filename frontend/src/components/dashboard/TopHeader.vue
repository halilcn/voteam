<template>
  <div class="top-header">
    <div @click="handleNotificationListDropdown" class="user-notifications">
      <div class="icon">
        <i class="bi bi-bell-fill"></i>
      </div>
      <div v-if="isShowNotificationListDropdown" class="notifications-list-dropdown">
        <div class="item">
          notificationasokdoas sdfjks ofdsf
        </div>
        <div class="item">
          noti asd asd asda das das sad asdas dadasdasd ficationasokdoas sdfjks ofdsf
        </div>
      </div>
    </div>
    <div @click="handleUserMenuDropdown" class="user-info">
      <img class="image" src="../../assets/test/me.jpg" height="460" width="460"/>
      <div class="name">Halil Can</div>
      <div v-if="isShowUserMenuDropdown" class="menu-dropdown">
        <div class="item">
          <i class="bi bi-person"></i>
          Profili Düzenle
        </div>
        <div class="item close">
          <i class="bi bi-door-closed"></i>
          Çıkış
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TopHeader',
  data() {
    return {
      isShowUserMenuDropdown: false,
      isShowNotificationListDropdown: false
    };
  },
  methods: {
    handleUserMenuDropdown() {
      this.isShowUserMenuDropdown = !this.isShowUserMenuDropdown;
    },
    handleNotificationListDropdown() {
      this.isShowNotificationListDropdown = !this.isShowNotificationListDropdown;
    }
  }
};
</script>

<style lang="scss" scoped>
.top-header {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-top: 5px;
  background-color: #fafafa;
  border: 1px solid #f5f5f5;
  border-radius: 5px;
  padding: 5px;

  .user-notifications {
    position: relative;
    margin-right: 40px;

    .icon {
      font-size: 18px;
      color: $df-blue-color;
      padding: 5px 9px;
      border-radius: 100%;
      cursor: pointer;

      &:hover {
        background-color: #e0edff;
      }
    }

    .notifications-list-dropdown {
      @include center-md-box-shadow;
      font-size: 14px;
      padding: 7px;
      border-radius: 5px;
      position: absolute;
      background-color: white;
      right: 0;
    }
  }

  .user-info {
    position: relative;
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 7px 13px;
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

    .menu-dropdown {
      @include center-md-box-shadow;
      top: 45px;
      width: 200px;
      right: 0;
      position: absolute;
      background-color: white;
      border-radius: 5px;
      overflow: hidden;

      .item {
        font-size: 13px;
        padding: 7px 10px;
        display: flex;
        align-items: center;

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
}
</style>
