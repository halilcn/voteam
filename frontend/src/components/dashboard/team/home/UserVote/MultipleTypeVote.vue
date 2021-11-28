<template>
  <image-popup
      @handlePopup="toggleImagePopup"
      :is-enable="isEnableImagePopup"
      :path="pathForImageOption"/>
  <div class="options">
    <div
        v-for="(option,index) in test"
        :key="index"
        :class="{selected:selectedOptionIndex===index}"
        class="item">
      <radio-button @click="selectOption(index)" :id="index">
        <template v-slot:content>
          <div class="option" :class="isTextTypeOption(option.type) ? 'text' : 'image'">
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
    </div>
    <standart-button
        class="post-vote-btn"
        :is-disable="isDisablePostVoteButton"
        @click="$emit('postVote',selectedOption)"
        text="Oy Ver"/>
  </div>
</template>

<script>
import RadioButton from '../../../../shared/elements/RadioButton';
import ImagePopup from '../../../../shared/ImagePopup';
import StandartButton from '../../../../shared/elements/StandartButton';
import constants from '../../../../../store/constants';

//TODO: verilerin cevaplar şıklarda olmalı. backend kontrol

export default {
  name: 'MultipleTypeVote',
  emits: ['postVote'],
  data() {
    return {
      isEnableImagePopup: false,
      pathForImageOption: '',
      selectedOptionIndex: null,
      selectedOption: {},
      test: [
        {
          type: 'image',
          path: 'https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg'
        },
        {
          type: 'text',
          message: 'yazı yazıasıdas daskdas dasja'
        },
        {
          type: 'image',
          path: 'https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg'
        },
        {
          type: 'text',
          message: 'yazı yazıasıdas daskdas dasja'
        },
        {
          type: 'image',
          path: 'https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg'
        },
        {
          type: 'text',
          message: 'yazı yazıasıdas daskdas dasja'
        },
        {
          type: 'image',
          path: 'https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg'
        },
        {
          type: 'text',
          message: 'yazı yazıasıdas daskdas dasja'
        }
      ]
    };
  },
  components: {
    RadioButton,
    ImagePopup,
    StandartButton
  },
  methods: {
    selectOption(index) {
      // TODO: Duplicate click
      this.selectedOptionIndex = index;
      this.selectedOption = this.test[index];
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
    }
  },
  computed: {
    isDisablePostVoteButton() {
      return this.selectedOptionIndex === null;
    }
  }
};
</script>

<style lang="scss" scoped>
.options {
  .item {
    padding: 10px;
    // background-color: $df-very-light-blue-color;
    margin: 8px 0;
    border-radius: 5px;
    border: 2px solid $df-very-light-blue-color;
    transition: .2s;

    &.selected {
      @include center-lg-blue-box-shadow;
      border-color: $df-light-blue-color;
    }

    &:not(.selected):hover {
      background-color: #fafafa;
    }

    .option {
      //color: $df-dark-blue-color;
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
          margin-left: 10px;
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
