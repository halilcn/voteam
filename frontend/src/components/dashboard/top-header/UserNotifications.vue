<template>
  <div class="user-notifications">
    <div @click="toggleNotificationListDropdown" class="icon">
      <i class="bi bi-bell-fill"></i>
    </div>
    <div v-if="isShowNotificationListDropdown" class="notifications-list-dropdown">
      <div class="top">
        <div class="title">
          <i class="bi bi-bell-fill"></i>
          Bildirimler
        </div>
      </div>
      <div class="item">
        <div class="content">
          <img class="notification-icon" src="../../../assets/icons/notifications-celebration.png"/>
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad asdsad asdasd asdasdasdasdj aıdjasdaasdkdoas sdfjks ofdsf asdad
            asdsad asdasd asdasdasdasdj aıdjasdaa
          </div>
        </div>
        <div class="delete-btn">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>
      <div class="item more-notifications-btn">
        daha fazla yükle
      </div>
    </div>
  </div>
</template>

<script>
//TODO: Multiple language için lang parametreside gönder ?
export default {
  name: 'UserNotifications',
  data() {
    return {
      isShowNotificationListDropdown: false
    };
  },
  methods: {
    toggleNotificationListDropdown() {
      this.isShowNotificationListDropdown = !this.isShowNotificationListDropdown;
    }
  },
  created() {
    this.$helpers.clickOutside(this, 'isShowNotificationListDropdown');
  }
};
</script>

<style lang="scss" scoped>
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
    width: 400px;
    height: 400px;
    font-size: 14px;
    border-radius: 5px;
    position: absolute;
    background-color: white;
    right: 0;
    overflow: auto;
    z-index: 9;

    &::-webkit-scrollbar {
      width: 5px;
    }

    .top {
      background-color: $df-very-light-blue-color;
      border-bottom: 1px solid #e5edff;;
      padding: 12px;

      .title {
        font-size: 15px;
        color: $df-blue-color;

        i {
          margin-right: 5px;
        }
      }
    }

    .item {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding: 10px;
      transition: .2s;
      position: relative;
      border-radius: 5px;

      &:hover {
        background-color: #f6f6f6;

        .delete-btn {
          opacity: 1;
        }
      }

      .content {
        margin-right: 10px;
        display: flex;
        align-items: center;

        .notification-icon {
          width: 20px;
          height: 20px;
        }

        .text {
          font-size: 12px;
          font-weight: 300;
          margin-left: 10px;
        }
      }

      .delete-btn {
        font-size: 11px;
        margin-left: auto;
        cursor: pointer;
        color: #7c7c7c;
        opacity: 0;
        transition: .2s;

        &:hover {
          color: $df-blue-color;
        }
      }
    }

    .more-notifications-btn {
      border-radius: 0;
      justify-content: center;
      font-size: 13px;
      cursor: pointer;
      color: $df-blue-color;
      font-weight: 500;

      &:hover {
        background-color: initial;
        text-decoration: underline;
      }
    }
  }
}
</style>
