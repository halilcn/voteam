<template>
  <div class="top-header">
    <user-notifications class="item"/>
    <user-menu class="item"/>
    <choose-language class="item"/>
  </div>
</template>

<script>
import UserNotifications from './UserNotifications';
import UserMenu from './UserMenu';
import ChooseLanguage from '../../shared/ChooseLanguage';

export default {
  name: 'TopHeader',
  components: {
    ChooseLanguage,
    UserNotifications,
    UserMenu
  }
};
</script>

<style lang="scss" scoped>
.top-header {
  @include center-lg-box-shadow;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-top: 5px;
  background-color: #fafafa;
  border: 1px solid #f5f5f5;
  border-radius: 5px;
  padding: 7px;

  .item {
    margin-left: 20px;
  }
}
</style>
