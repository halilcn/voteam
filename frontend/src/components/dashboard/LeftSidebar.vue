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
      <img class="item active" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
      <img class="item" src="../../assets/test/team.png"/>
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
  @include right-md-box-shadow;
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

  .teams-list {
    //TODO: fazla takım olduğunda scrool !
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 150px;
    overflow-y: auto;

    div {
      cursor: pointer;
    }

    .create-team-btn {
      padding: 10px 14px;
      border-radius: 100%;
      color: #657179;
      transition: .2s;

      &:hover {
        background-color: #edf0f3;
      }
    }

    .item {
      cursor: pointer;
      margin: 5px 0;
      background-color: #c5d4de;
      width: 40px;
      height: 40px;
      border-radius: 100%;
      transition: .2s;

      &:not(.active):hover {
        transform: scale(1.04);
      }

      &.active {
        padding: 4px;
      }
    }
  }
}
</style>
