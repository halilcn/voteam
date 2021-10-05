<template>
  <div class="top-header">
    <div @click="handleNotificationListDropdown" class="user-notifications">
      <div class="icon">
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
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad asdsad asdasd asdasdasdasdj aıdjasdaasdkdoas sdfjks ofdsf asdad
            asdsad asdasd asdasdasdasdj aıdjasdaa
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad asdsad asdasd asdasdasdasdj aıdjasdaasdkdoas sdfjks ofdsf asdad
            asdsad asdasd asdasdasdasdj aıdjasdaa
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad asdsad asdasd asdasdasdasdj aıdjasdaasdkdoas sdfjks ofdsf asdad
            asdsad asdasd asdasdasdasdj aıdjasdaa
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad asdsad asdasd asdasdasdasdj aıdjasdaasdkdoas sdfjks ofdsf asdad
            asdsad asdasd asdasdasdasdj aıdjasdaa
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notificationasokdoas sdfjks ofdsf asdad
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notifiasdasdas dsa dasd asdasdsald sadla
          </div>
          <div class="delete-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="item">
          <div class="text">
            notifiasdasdas dsa dasd asdasdsald sadla
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
    <div @click="handleUserMenuDropdown" class="user-info">
      <div class="btn">
        <img class="image" src="../../assets/test/me.jpg" height="460" width="460" alt="user-image"/>
        <div class="name">Halil Can</div>
      </div>
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
  },
  created() {
    //TODO: problem
    this.$helpers.clickOutside(this, 'isShowUserMenuDropdown');
    this.$helpers.clickOutside(this, 'isShowNotificationListDropdown');
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
      width: 400px;
      height: 400px;
      font-size: 14px;
      border-radius: 5px;
      position: absolute;
      background-color: white;
      right: 0;
      overflow: auto;

      &::-webkit-scrollbar {
        width: 5px;
      }

      .top {
        background-color: $df-very-light-blue-color;
        padding: 12px;

        .title {
          font-size: 15px;
          color: $df-blue-color;
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

        .text {
          font-size: 12px;
          font-weight: 300;
          margin-right: 10px;
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
        justify-content: center;
        font-size: 13px;
        cursor: pointer;
        background-color: $df-very-light-blue-color;
        color: $df-blue-color;

        &:hover {
          background-color: #e9f0ff;
        }
      }
    }
  }

  .user-info {
    position: relative;


    .btn {
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
}
</style>
