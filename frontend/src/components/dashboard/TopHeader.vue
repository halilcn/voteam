<template>
  <div class="top-header">
    <div class="user-notifications">
      <div class="icon">
        <i class="bi bi-bell-fill"></i>
      </div>
      <div class="notifications-list">
        <div class="item">
          notificationasokdoas sdfjks ofdsf
        </div>
        <div class="item">
          noti asd asd asda das das sad asdas dadasdasd ficationasokdoas sdfjks ofdsf
        </div>
      </div>
    </div>
    <div class="user-info">
      <img class="image" src="../../assets/test/me.jpg" height="460" width="460"/>
      <div class="name">Halil Can</div>
      <div class="menu-dropdown">
        <div class="item">
          Profili Düzenle
        </div>
        <div class="item">
          çıkış
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TopHeader'
};
</script>

<style lang="scss" scoped>
.top-header {
  background-color: white;
  border-bottom: 1px solid #d7d7d7;
  display: flex;
  align-items: center;
  justify-content: flex-end;

  .user-notifications {
    position: relative;
    margin-right: 40px;

    .icon {
      font-size: 18px;
    }

    .notifications-list {
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
    background-color: red;
    cursor: pointer;

    .image {
      width: 40px;
      height: 40px;
      border-radius: 100%;
    }

    .name {
      margin-left: 7px;
      font-size: 14px;
    }

    .menu-dropdown {
      @include center-md-box-shadow;
      padding: 5px;
      top: 45px;
      width: 200px;
      right: 0;
      position: absolute;
      background-color: white;
      border-radius: 5px;
      display: none;

      .item {

      }
    }
  }
}
</style>
