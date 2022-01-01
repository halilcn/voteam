<template>
  <div class="team-notifications">
    <page-title>
      <i class="bi bi-bell"></i>
      Bildirimler
    </page-title>
    <div class="list">
      <loading-animation
          v-if="isLoading"
          :text-line-count="3"
          :text-count="3"/>
      <div v-for="(notification,index) in notifications"
           :key="index"
           class="item"
           :class="actionColorOfNotification(notification.data.action)">
        <div class="time">
          {{ $dayjs(notification.created_at).from($dayjs().utc()) }}
        </div>
        <img :src="actionIconOfNotification(notification.data.action)"
             alt="notification-icon"
             class="action-type-icon"/>
        <div class="content">
          {{ notification.data.message }}
        </div>
      </div>
      <div
          v-if="hasMoreNotifications"
          @click="getMoreNotificationsOfTeamAction"
          class="more-notifications-get-btn">
        daha fazla göster
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from '../shared/PageTitle';
import LoadingAnimation from '../../../shared/LoadingAnimation';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'Notifications',
  data() {
    return {
      isLoading: true,
      NOTIFICATIONS_ACTION_COLORS: {
        celebration: 'positive',
        information: 'warning',
        invitation: 'neutral',
        success: 'positive'
      }
    };
  },
  components: {
    PageTitle,
    LoadingAnimation
  },
  methods: {
    ...mapActions('teamNotification', ['getNotificationsOfTeam']),
    getNotificationsOfTeamAction() {
      this.handle(async () => {
        this.isLoading = true;
        await this.getNotificationsOfTeam();
      })
          .finally(() => {
            this.isLoading = false;
          });
    },
    getMoreNotificationsOfTeamAction() {
      this.handle(async () => {
        await this.getNotificationsOfTeam(this.notifications[this.notifications.length - 1].id);
      });
    },
    actionIconOfNotification(action) {
      return this.$helpers.getNotificationIcon(action);
    },
    actionColorOfNotification(action) {
      const DEFAULT_COLOR = 'neutral';

      return typeof this.NOTIFICATIONS_ACTION_COLORS[action] != 'undefined'
          ? this.NOTIFICATIONS_ACTION_COLORS[action]
          : DEFAULT_COLOR;
    }
  },
  computed: {
    ...mapState('teamNotification', ['notifications', 'hasMoreNotifications'])
  },
  created() {
    this.getNotificationsOfTeamAction();
  }
};
</script>

<style lang="scss" scoped>
.team-notifications {
  height: 100%;

  .list {
    display: flex;
    flex-direction: column;
    margin-top: 15px;
    padding: 0 20px 50px 0;
    height: 100%;
    overflow-y: auto;

    .item {
      position: relative;
      display: flex;
      align-items: center;
      padding: 25px;
      border-radius: 5px;
      margin: 12px 0;
      border: 1px solid transparent;

      &.positive {
        background-color: $df-very-light-green-color;
        border-color: #d7ffea;
      }

      &.neutral {
        background-color: #f5f5f5;
        border-color: #eaeaea;
      }

      &.warning {
        background-color: $df-very-light-blue-color;
        border-color: #eaf2ff;
      }

      .time {
        position: absolute;
        font-size: 11px;
        right: 7px;
        top: 7px;
        font-weight: 300;
        color: $df-black-and-blue-color;
      }

      .action-type-icon {
        width: 30px;
        height: 30px;
      }

      .content {
        @include text-length-limit;
        margin-left: 25px;
        font-size: 13px;
        color: $df-dark-blue-color;
      }
    }

    .more-notifications-get-btn {
      margin-top: 10px;
      align-self: center;
      font-weight: 300;
      font-size: 14px;
      cursor: pointer;
      color: $df-black-and-blue-color;
      padding: 8px 20px;
      border-radius: 5px;
      transition: .2s;

      &:hover {
        background-color: #f1f1f1;
      }
    }
  }
}
</style>
