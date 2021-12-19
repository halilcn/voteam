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
      <loading-animation v-if="isLoadingNotifications"
                         :textLineCount="9"
                         :textLineHeight="15"/>
      <div v-else>
        <div>
          <div v-for="(notification,index) in notifications"
               :key="index"
               class="item">
            <div class="content">
              <img class="notification-icon"
                   alt="notification-action-icon"
                   :src="actionIconOfNotification(notification.action)"/>
              <div class="text" :class="{'new-notification':!notification.read_at}">
                {{ notification.message }}
              </div>
            </div>
            <div @click="deleteNotificationAction(notification.id)" class="delete-btn">
              <i class="bi bi-x-lg"></i>
            </div>
          </div>
          <div
              v-if="hasMoreNotifications"
              @click="moreGetNotifications"
              class="item more-notifications-btn">
            daha fazla yükle
          </div>
        </div>
        <div v-if="notifications.length === 0" class="no-notifications">
          <i class="bi bi-emoji-frown"></i>
          Hiç bildirim yok
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingAnimation from '../../shared/LoadingAnimation';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'UserNotifications',
  data() {
    return {
      isShowNotificationListDropdown: false,
      isLoadingNotifications: true
    };
  },
  watch: {
    isShowNotificationListDropdown(newValue) {
      if (newValue) this.getNotificationsAction();
    }
  },
  components: {
    LoadingAnimation
  },
  methods: {
    ...mapActions('userNotification', ['getNotifications', 'deleteNotification']),
    toggleNotificationListDropdown() {
      this.isShowNotificationListDropdown = !this.isShowNotificationListDropdown;
    },
    getNotificationsAction() {
      this.handle(async () => {
        this.isLoadingNotifications = true;
        await this.getNotifications();
      })
          .finally(() => {
            this.isLoadingNotifications = false;
          });
    },
    actionIconOfNotification(action) {
      return this.$helpers.getNotificationIcon(action);
    },
    moreGetNotifications() {
      this.handle(async () => {
        await this.getNotifications(this.notifications[this.notifications.length - 1].created_at);
      });
    },
    deleteNotificationAction(payload) {
      this.handle(async () => {
        await this.deleteNotification(payload);
      });
    }
  },
  computed: {
    ...mapState('userNotification', ['notifications', 'hasMoreNotifications'])
  },
  created() {
    this.$helpers.clickOutside(this, 'isShowNotificationListDropdown');
  }
};
</script>

<style lang="scss" scoped>
.user-notifications {
  position: relative;

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
    max-height: 400px;
    font-size: 14px;
    border-radius: 5px;
    position: absolute;
    background-color: white;
    right: 0;
    top: 43px;
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
      padding: 12px;
      transition: .2s;
      position: relative;

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
          color: $df-dark-blue-color;

          &.new-notification {
            font-weight: 400;
          }
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

    .no-notifications {
      padding: 12px;
      font-size: 13px;
      font-weight: 300;
      text-align: center;
      color: $df-mdl-dark-black-color;

      i {
        margin-right: 5px;
      }
    }
  }
}
</style>
