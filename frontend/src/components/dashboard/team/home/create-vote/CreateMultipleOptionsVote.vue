<template>
  <image-popup
      @handlePopup="toggleImagePopup"
      :is-enable="isEnableImagePopup"
      :path="pathOfImageOnPopup"/>
  <div class="form-item">
    <div class="title">
      Oy Seçenekleri
    </div>
    <div class="content options-list">
      <template v-if="options.length > 0">
        <div v-for="(option,index) in v$.options.$model"
             :key="index"
             :class="isTextVoteType(option.type) ? 'text-item' : 'image-item'"
             class="item-container text-item">
        <textarea
            v-if="isTextVoteType(option.type)"
            placeholder="Oy seçeneğini kısaca açıkla..."
            v-model.trim="option.message"
            class="content-text item"/>
          <template v-else>
            <input
                v-if="!isSelectedImage(option.path)"
                type="file"
                accept="image/*"
                @change="onChangeFile(index,$event)"
                class="content-text item"/>
            <div
                v-else
                class="content-text"
                :class="{'selected-image':isSelectedImage(option.image)}">
              Fotoğraf Seçildi. <span @click="showImage(index)" class="show-image">Görüntüle</span>
            </div>
          </template>
          <div @click="deleteOption(index)" class="delete">
            <i class="bi bi-trash-fill"></i>
          </div>
        </div>
      </template>
      <div v-else class="no-options">
        Henüz oy seçeneği eklenmemiş
      </div>
    </div>
    <div class="add-options-list-item-btn">
      <div @click="toggleOptionsList" class="btn">
        <i class="bi bi-plus"></i>
        ekle
      </div>
      <div
          v-if="isEnableOptionsList"
          v-click-outside="toggleOptionsList"
          class="options-type-list">
        <div @click="addOption('text')" class="item">
          <i class="bi bi-card-text"></i>
        </div>
        <div @click="addOption('image')" class="item">
          <i class="bi bi-image"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import modelValueMixin from '../../../../../mixins/modelValueMixin';
import validateMixin from '../../../../../mixins/validateMixin';
import constants from '../../../../../store/constants';
import ImagePopup from '../../../../shared/ImagePopup';

export default {
  name: 'CreateClassicVote',
  mixins: [modelValueMixin, validateMixin],
  props: {
    voteErrors: Array
  },
  data() {
    return {
      v$: this.useVuelidate(),
      isEnableOptionsList: false,
      isEnableImagePopup: false,
      pathOfImageOnPopup: '',
      options: []
    };
  },
  validations() {
    return {
      options: {
        minLength: this.multipleLangError('customErrors.minLengthVoteOptions', this.validators.minLength(2))
      }
    };
  },
  watch: {
    options: {
      handler: function () {
        this.value = this.options;
      },
      deep: true
    },
    // TODO: Bad structure. Code will be reviewed.
    'v$.options.$invalid': function (newValue) {
      this.errors = newValue ? [this.$t('customErrors.minLengthVoteOptions')] : [];
    }
  },
  components: {
    ImagePopup
  },
  methods: {
    toggleOptionsList() {
      this.isEnableOptionsList = !this.isEnableOptionsList;
    },
    addOption(type) {
      const data = {
        type
      };

      if (type === constants.VOTE_OPTIONS_TYPES.TEXT) {
        data.message = '';
      }

      if (type === constants.VOTE_OPTIONS_TYPES.IMAGE) {
        data.path = '';
      }

      this.options.push(data);
      this.toggleOptionsList();
    },
    deleteOption(index) {
      this.options.splice(index, 1);
    },
    isTextVoteType(type) {
      return type === constants.VOTE_OPTIONS_TYPES.TEXT;
    },
    isSelectedImage(path) {
      return path !== '';
    },
    onChangeFile(index, event) {
      this.options[index].path = event.target.files[0];
    },
    showImage(index) {
      this.pathOfImageOnPopup = this.$helpers.createTemporaryUrl(this.options[index].path);
      this.isEnableImagePopup = true;
    },
    toggleImagePopup() {
      this.isEnableImagePopup = !this.isEnableImagePopup;
    }
  },
  computed: {
    errors: {
      get() {
        return this.voteErrors;
      },
      set(voteErrors) {
        this.$emit('update:voteErrors', voteErrors);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.options-list {
  .item-container {
    display: flex;
    align-items: center;
    margin: 5px 0;

    &.text-item {
      .item {
        resize: vertical;
        height: 38px;
        min-height: 38px;
        max-height: 80px;
      }
    }

    &.image-item {
      .selected-image {
        color: $df-green-color;

        .show-image {
          margin-left: 10px;
          cursor: pointer;
          color: black;

          &:hover {
            text-decoration: underline;
            color: $df-dark-blue-color;
          }
        }
      }
    }

    .delete {
      margin-left: 10px;
      color: $df-red-color;
      background-color: #fff5f5;
      padding: 7px 11px;
      border-radius: 4px;
      cursor: pointer;

      &:hover {
        background-color: #ffe6e6;
      }
    }
  }

  .no-options {
    font-size: 12px;
    font-weight: 300;
    color: $df-light-dark-black-color;
  }
}

.add-options-list-item-btn {
  margin-top: 10px;
  display: inline-block;
  position: relative;

  .btn {
    font-weight: 300;
    font-size: 12px;
    cursor: pointer;
    color: $df-blue-color;
    background-color: #eaf2ff;
    padding: 2px 7px;
    border-radius: 4px;

    &:hover {
      background-color: #e5efff;
    }
  }

  .options-type-list {
    @include center-md-box-shadow;
    position: absolute;
    left: 60px;
    top: -20px;
    width: 100%;
    background-color: white;
    border-radius: 5px;
    overflow: hidden;

    .item {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      cursor: pointer;
      color: $df-dark-blue-color;

      &:hover {
        background-color: #efefef;
      }

      i {
      }
    }
  }
}
</style>
