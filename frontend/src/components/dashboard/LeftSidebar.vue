<template>
  <div class="left-sidebar">
    <div class="logo">
      logo
    </div>
    <div class="menu">
      <div class="item selected">
        <div class="icon">
          <i class="bi bi-house-fill"></i>
        </div>
        <div class="tooltip-title">
          Anasayfa
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-gear"></i>
        </div>
        <div class="tooltip-title">
          Ayarlar
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-bell"></i>
        </div>
        <div class="tooltip-title">
          Bildirimler
        </div>
      </div>
    </div>
    <div class="teams-list">
      <div class="create-team-btn">
        <i class="bi bi-plus-lg"></i>
      </div>
      <div class="item active">
        <img class="team-image" src="../../assets/test/team.png"/>
      </div>
      <div class="item">
        <img class="team-image" src="../../assets/test/team.png"/>
      </div>
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
  //@include right-md-box-shadow;
  border-right: 1px solid #bdbdbd;
  background-color: white;
  width: 70px;
  height: 100%;

  .menu {
    margin-top: 30px;

    .item {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      padding: 7px 0;

      &:hover {
        .tooltip-title {
          opacity: 1;
          left: 80px;
        }

        &.selected:before {
          background-color: red !important;
        }
      }

      &.selected:before {
        content: " ";
        background: $df-blue-color;
        height: 100%;
        width: 4px;
        position: absolute;
        left: 0;
        border-radius: 0 4px 4px 0;
      }

      .icon {
        font-size: 24px;
      }

      .tooltip-title {
        @include center-md-box-shadow;
        position: absolute;
        font-size: 11px;
        left: 70px;
        background-color: white;
        padding: 4px 6px;
        border-radius: 10px;
        opacity: 0;
        transition: .3s;
      }
    }
  }

  .teams-list {
    margin-top: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;

    div {
      cursor: pointer;
    }

    .create-team-btn {
    }

    .item {
      margin: 3px 0;
      &.active {
        .team-image {
          background-color: #e5e5e5;
          border-radius: 20px;
        }
      }

      .team-image {
        width: 50px;
        height: 50px;
        padding: 5px;
        border-radius: 100%;
      }
    }
  }
}
</style>
