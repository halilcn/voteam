<template>
  <div class="top-header">
    <user-notifications/>
    <user-menu/>
  </div>
</template>

<script>
import UserNotifications from './UserNotifications';
import UserMenu from './UserMenu';

export default {
  name: 'TopHeader',
  components: {
    UserNotifications,
    UserMenu
  }
};
</script>

<style lang="scss" scoped>
.top-header {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-top: 5px;
  background-color: #fafafa;
  border: 1px solid #f5f5f5;
  border-radius: 5px;
  padding: 5px;
}
</style>
