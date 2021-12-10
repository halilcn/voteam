<template>
  <popup title="Devam etmek istiyor musun ?"
         @handleDisable="$emit('handlePopup')"
         :is-enable="isEnable">
    <template v-slot:content>
      <div class="actions">
        <div @click="$emit('handlePopup')" class="btn cancel">
          <i class="bi bi-x-circle"></i>
          Hayır
        </div>
        <div @click="continueAction" class="btn continue">
          <i class="bi bi-check-circle"></i>
          Evet
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from './Popup';

export default {
  name: 'ContinuePopup',
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
