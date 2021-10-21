<template>
  <!-- popup içinde popup kullanmak ? -->
  <popup
      title="Fotoğraf Göster"
      @handleDisable="toggleImagePopup"
      width="340"
      :is-enable="isEnableImagePopup">
    <template v-slot:content>
      dasd as
    </template>
  </popup>

  <div class="form-item">
    <div class="title">
      Oy Seçenekleri
    </div>
    <div class="content options-list">
      {{ options }}
      {{ v$.options.$invalid }}
      <errors :content="['dasd']"/>
      <div v-for="(option,index) in options"
           :key="index"
           :class="isTextVoteType(option.type) ? 'text-item' : 'image-item'"
           class="item-container text-item">
        <textarea
            v-if="isTextVoteType(option.type)"
            v-model.trim="options[index].$model"
            class="content-text item"/>
        <template v-else>
          <input
              v-if="!isSelectedImage(option.path)"
              type="file"
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

      <!--   <div class="item-container text-item">
          <textarea class="content-text item"/>
          <div class="delete">
            <i class="bi bi-trash-fill"></i>
          </div>
        </div>
        <div class="item-container image-item">
          <input type="file" class="content-text item"/>
          <div class="delete">
            <i class="bi bi-trash-fill"></i>
          </div>
        </div>
        <div class="item-container image-item">
          <div class="content-text selected-image">
            Fotoğraf Seçildi. <span class="show-image">Görüntüle</span>
          </div>
          <div class="delete">
            <i class="bi bi-trash-fill"></i>
          </div>
        </div>-->
    </div>
    <div class="add-options-list-item-btn">
      <div @click="toggleOptionsList" class="btn">
        <i class="bi bi-plus"></i>
        ekle
      </div>
      <div v-if="isEnableOptionsList" class="options-type-list">
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
import Errors from '../../../../shared/Errors';
import Popup from '../../../../shared/Popup';

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
      options: []
    };
  },
  validations() {
    return {
      options: {
        $each: {
          message: {
            required: this.multipleLangError('errors.required', this.validators.required)
          },
          path: {
            required: this.multipleLangError('errors.required', this.validators.required)
          }
        }
      }
    };
  },
  components: {
    Popup,
    Errors
  },
  watch: {
    'options': function () {
      alert();
      //this.value = this.vote;
    },
    'v$.options.$errors': function (newValue) {
      this.errors = this.getOnlyErrors(newValue);
    }
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
      console.log(path);
      return path !== '';
    },
    onChangeFile(index, event) {
      this.options[index].path = event.target.files[0];
    },
    showImage(index) {
      console.log(this.options[index].path);
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
  },
  created() {
    this.$helpers.clickOutside(this, 'isEnableOptionsList');
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
}

.add-options-list-item-btn {
  margin-top: 5px;
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
