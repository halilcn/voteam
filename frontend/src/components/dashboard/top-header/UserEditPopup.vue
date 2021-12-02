<template>
  <popup
      title="Profili Düzenle"
      is-enable="true">
    <template v-slot:content>
      <div class="user-edit">
        <div class="item">
          <div class="title">
            Ad ve Soyad
          </div>
          <div class="content">
            <input type="text">
          </div>
        </div>
        <div class="item">
          <div class="title">
            Fotoğraf
          </div>
          <div class="content user-image">
            <input type="file">
          </div>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../shared/Popup';

export default {
  name: 'UserEditPopup',
  components: {
    Popup
  }
};
</script>

<style lang="scss" scoped>
.user-edit {
  .item {
    .title {
      font-size: 15px;
      color: $df-dark-blue-color;
    }

    .content {
      margin-top: 5px;

      input[type='text'] {
        @include std-input;
      }
    }
  }
}
</style>
