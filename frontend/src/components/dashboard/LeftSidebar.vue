<template>
  <div class="left-sidebar">
    <div class="logo">
      logo
    </div>
    <div class="menu">
      <router-link
          class="item"
          :to="{name:'TeamDashboardHome'}"
          exact-active-class="selected">
        <div class="icon">
          <i class="bi bi-house-fill fill-icon"></i>
          <i class="bi bi-house normal-icon"></i>
        </div>
        <div class="tooltip-title">
          Anasayfa
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardMembers'}"
          exact-active-class="selected">
        <div class="icon">
          <i class="bi bi-people-fill fill-icon"></i>
          <i class="bi bi-people normal-icon"></i>
        </div>
        <div class="tooltip-title">
          Üyeler
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardNotifications'}"
          exact-active-class="selected">
        <div class="icon">
          <i class="bi bi-bell-fill fill-icon"></i>
          <i class="bi bi-bell normal-icon"></i>
        </div>
        <div class="tooltip-title">
          Bildirimler
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardSettings'}"
          exact-active-class="selected">
        <div class="icon">
          <i class="bi bi-gear-fill fill-icon"></i>
          <i class="bi bi-gear normal-icon"></i>
        </div>
        <div class="tooltip-title">
          Ayarlar
        </div>
      </router-link>
    </div>
    <div class="team">
      <router-link
          class="team-list-btn"
          :to="{name:'TeamsList'}">
        <i class="fas fa-list"></i>
      </router-link>
      <img :src="teamSettings.image"
           class="active-team"
           alt="team-image"/>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: 'LeftSidebar',
  computed: {
    ...mapState('activeTeam', ['teamSettings'])
  }
};
</script>

<style lang="scss" scoped>
.left-sidebar {
  @include center-lg-box-shadow;
  background-color: white;
  width: 70px;
  height: 100%;
  display: flex;
  flex-direction: column;
  border-radius: 0 10px 10px 0;

  .logo {

  }

  .menu {
    margin-top: auto;
    margin-bottom: auto;

    .item {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      padding: 7px 0;

      &:not(.selected):hover {
        background-color: #f6f6f6;

        .tooltip-title {
          visibility: visible;
          opacity: 1;
          left: 80px;
        }
      }

      &.selected {
        .icon {
          color: $df-blue-color;

          .fill-icon {
            display: block;
          }

          .normal-icon {
            display: none;
          }
        }

        &:before {
          content: "";
          background: $df-blue-color;
          height: 100%;
          width: 4px;
          position: absolute;
          left: 0;
          border-radius: 0 4px 4px 0;
        }
      }

      .icon {
        font-size: 24px;
        color: $df-black-and-blue-color;

        .fill-icon {
          display: none;
        }

        .normal-icon {
          display: block;
        }
      }

      .tooltip-title {
        @include center-md-box-shadow;
        visibility: hidden;
        opacity: 0;
        position: absolute;
        font-size: 11px;
        font-weight: 500;
        left: 70px;
        background-color: white;
        color: $df-black-and-blue-color;
        padding: 4px 8px;
        border-radius: 10px;
        transition: .2s;
        z-index: 9;
      }
    }
  }

  .team {
    display: flex;
    flex-direction: column;
    align-items: center;

    .team-list-btn {
      padding: 10px 14px;
      border-radius: 100%;
      color: $df-black-and-blue-color;
      transition: .2s;
      cursor: pointer;

      &:hover {
        background-color: #edf0f3;
      }
    }

    .active-team {
      @include center-lg-blue-box-shadow;
      margin: 5px 0;
      width: 40px;
      height: 40px;
      border-radius: 100%;
      transition: .2s;
    }
  }
}
</style>
