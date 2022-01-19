<template>
  <popup :title="$t('popups.deleteUser.title')"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <div class="info">
        {{ $t('popups.deleteUser.content.info') }}
      </div>
      <div class="actions">
        <div @click="$emit('handlePopup')" class="btn cancel">
          <i class="bi bi-x-circle"></i>
          {{ $t('popups.deleteUser.content.no') }}
        </div>
        <div @click="continueAction" class="btn continue">
          <i class="bi bi-check-circle"></i>
          {{ $t('popups.deleteUser.content.yes') }}
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../shared/Popup';

export default {
  name: 'DeleteUserPopup',
  props: ['isEnable'],
  components: {
    Popup
  },
  methods: {
    continueAction() {
      this.$emit('continue');
      this.$emit('handlePopup');
    }
  }
};
</script>

<style lang="scss" scoped>
.info {
  padding: 20px;
  color: $df-black-and-blue-color;
  font-size: 17px;
  font-weight: 300;
}

.actions {
  display: flex;
  justify-content: space-evenly;
  padding: 10px 0;

  .btn {
    border-radius: 5px;
    padding: 10px 50px;
    cursor: pointer;
    transition: .2s;

    &:hover {
      transform: translateY(-2px);
    }

    i {
      margin-right: 3px;
    }

    &.continue {
      color: $df-green-color;
      background-color: #dcfff3;

      &:hover {
        background-color: #cfffee;
      }
    }

    &.cancel {
      color: $df-red-color;
      background-color: #ffe5e5;

      &:hover {
        background-color: #ffd8d8;
      }
    }
  }
}
</style>
