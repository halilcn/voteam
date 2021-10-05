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
    </div>
    <div class="team">
      <div class="team-list-btn">
        <i class="fas fa-list"></i>
      </div>
      <img class="active-team" src="../../assets/test/team.png" alt="team-image"/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LeftSidebar'
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
      border-radius: 5px;

      &:not(.selected):hover {
        background-color: #f6f6f6;

        .tooltip-title {
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
        color: $df-mdl-dark-black-color;

        .fill-icon {
          display: none;
        }

        .normal-icon {
          display: block;
        }
      }

      .tooltip-title {
        @include center-md-box-shadow;
        position: absolute;
        font-size: 11px;
        left: 70px;
        background-color: white;
        padding: 4px 8px;
        border-radius: 10px;
        opacity: 0;
        transition: .2s;
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
      color: #657179;
      transition: .2s;
      cursor: pointer;

      &:hover {
        background-color: #edf0f3;
      }
    }

    .active-team {
      @include center-md-blue-box-shadow;
      margin: 5px 0;
      background-color: $df-blue-color;
      width: 40px;
      height: 40px;
      border-radius: 100%;
      transition: .2s;
      padding: 2px;
    }
  }
}
</style>
