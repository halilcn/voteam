<template>
  <image-popup
      @handlePopup="toggleImagePopup"
      :is-enable="isEnableImagePopup"
      :path="pathForImageOption"/>
  <div class="options">
    <radio-button
        v-for="(option,index) in voteData"
        :key="index"
        :id="index"
        @click="selectOption(index)"
        :class="{selected:selectedOptionIndex===index}"
        class="item">
      <template v-slot:content>
        <div class="option-content"
             :class="isTextTypeOption(option.type) ? 'text' : 'image'">
          <span v-if="isTextTypeOption(option.type)">
               {{ option.message }}
          </span>
          <template v-else>
            <div class="info">
              <i class="bi bi-image"></i>
              Fotoğraflı Seçenek
            </div>
            <a @click.stop.prevent="showImage(option.path)"
               class="show-image-popup">
              Görüntüle
            </a>
          </template>
        </div>
      </template>
    </radio-button>
    <standart-button
        class="post-vote-btn"
        :is-disable="isDisablePostVoteButton"
        @click="sendAnswerVote"
        text="Oy Ver"/>
  </div>
</template>

<script>
import RadioButton from '../../../../shared/elements/RadioButton';
import ImagePopup from '../../../../shared/ImagePopup';
import StandartButton from '../../../../shared/elements/StandartButton';
import constants from '../../../../../store/constants';

export default {
  name: 'MultipleTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading'],
  data() {
    return {
      isEnableImagePopup: false,
      pathForImageOption: '',
      selectedOptionIndex: null,
      selectedOption: {}
    };
  },
  components: {
    RadioButton,
    ImagePopup,
    StandartButton
  },
  methods: {
    selectOption(index) {
      this.selectedOptionIndex = index;
      this.selectedOption = this.voteData[index];
    },
    toggleImagePopup() {
      this.isEnableImagePopup = !this.isEnableImagePopup;
    },
    showImage(imagePath) {
      this.pathForImageOption = imagePath;
      this.toggleImagePopup();
    },
    isTextTypeOption(type) {
      return type === constants.VOTE_OPTIONS_TYPES['TEXT'];
    },
    sendAnswerVote() {
      this.$emit('postAnswerVote', this.selectedOption);
    }
  },
  computed: {
    isDisablePostVoteButton() {
      return this.selectedOptionIndex === null || this.isLoading;
    }
  }
};
</script>

<style lang="scss" scoped>
.options {
  .item {
    padding: 14px;
    margin-bottom: 12px;
    border-radius: 10px;
    border: 2px solid $df-very-light-blue-color;
    transition: .2s;

    &.selected {
      @include center-lg-blue-box-shadow;
      border-color: $df-light-blue-color;
    }

    &:not(.selected):hover {
      background-color: #f6f6f6;
    }

    .option-content {
      color: #084b73;
      font-weight: 300;

      &.text {
        @include text-length-limit;
        text-align: justify;
      }

      &.image {
        display: flex;

        .info {
          font-style: italic;
        }

        .show-image-popup {
          color: $df-blue-color;
          margin-left: 15px;
          text-decoration: underline;

          &:hover {
            color: $df-blue-color-hover-light;
          }
        }
      }
    }
  }

  .post-vote-btn {
    margin-top: 20px;
    width: 140px;
    margin-left: auto;
  }
}
</style>
