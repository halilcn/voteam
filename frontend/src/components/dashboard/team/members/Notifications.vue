<template>
  <div class="team-notifications">
    <page-title>
      <i class="bi bi-bell"></i>
      Bildirimler
    </page-title>
    <div class="list">
      <div class="item positive">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/celebration.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item neutral">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/invitation.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item warning">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/information.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item positive">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/success.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item neutral">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/invitation.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item warning">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/information.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item positive">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/success.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item neutral">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/invitation.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item warning">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/information.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
      <div class="item positive">
        <div class="time">
          20 saat önce
        </div>
        <img class="action-type-icon" src="../../../../assets/icons/notifications/success.png"/>
        <div class="content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from '../shared/PageTitle';

export default {
  name: 'Notifications',
  components: {
    PageTitle
  }
};
</script>

<style lang="scss" scoped>

.team-notifications {
  height: 100%;

  .list {
    margin-top: 15px;
    padding: 0 20px 50px 0;
    display: flex;
    flex-direction: column;
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
        margin-left: 25px;
        font-size: 13px;
        color: $df-dark-blue-color;
      }
    }
  }
}
</style>
