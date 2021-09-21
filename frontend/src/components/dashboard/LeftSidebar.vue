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
  @include right-md-box-shadow;
  background-color: white;
  width: 70px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: 0 10px 10px 0;

  .logo {

  }

  .menu {
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
    justify-content: flex-start;

    div {
      cursor: pointer;
    }

    .create-team-btn {
    }

    .item {
      margin: 3px 0;
      background-color: red;


      &.active {
        /* .team-image {
           background-color: #e5e5e5;
           border-radius: 20px;
         }*/
      }

      .team-image {
        width: 50px;
        height: 50px;
        padding: 5px;
        border-radius: 100%;
        background-color: black;
      }
    }
  }
}
</style>
