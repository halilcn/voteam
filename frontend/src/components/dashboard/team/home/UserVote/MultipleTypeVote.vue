<template>
  <image-popup
      @handlePopup="toggleImagePopup"
      :is-enable="isEnableImagePopup"
      :path="pathForImageOption"/>
  <div class="options">
    <div @click="selectOption"
         class="item"
         :class="{selected:true}">
      <radio-button id="2">
        <template v-slot:content>
          <div class="option text">
            loremsada sdkas jdasdıau yafsjdajısodgodfuy uugd ıfgıogıdıgııgudf ıterturtoue rıoeusaokds aıjdıao
            dusıdıaosdo asuroeurweı ruweoıru woıerw eojsdaksjfklsj dflkdsjfs akdsjasdhasd jaıosduw oıruwıeurw wıoe
            ıwejrsdkfsdjs kljdskfjkdls
          </div>
        </template>
      </radio-button>
    </div>
    <div @click="selectOption"
         class="item"
         :class="{selected:true}">
      <radio-button id="2">
        <template v-slot:content>
          <div class="option text">
            loremsada sdkas jdasdıau yafsjdajısodgodfuy uugd ıfgıogıdıgııgudf ıterturtoue rıoeusaokds aıjdıao
            dusıdıaosdo asuroeurweı ruweoıru woıerw eojsdaksjfklsj dflkdsjfs akdsjasdhasd jaıosduw oıruwıeurw wıoe
            ıwejrsdkfsdjs kljdskfjkdls
          </div>
        </template>
      </radio-button>
    </div>
    <div class="item">
      <radio-button id="1">
        <template v-slot:content>
          <div class="option image">
            <div class="info">
              Fotoğraflı Seçenek
            </div>
            <a
                @click.stop.prevent="showImage('https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg')"
                class="show-image-popup">
              Görüntüle
            </a>
          </div>
        </template>
      </radio-button>
    </div>
    <div class="item">
      <radio-button id="1">
        <template v-slot:content>
          <div class="option image">
            <div class="info">
              Fotoğraflı Seçenek
            </div>
            <a
                @click.stop.prevent="showImage('https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg')"
                class="show-image-popup">
              Görüntüle
            </a>
          </div>
        </template>
      </radio-button>
    </div>
    <div class="item">
      <radio-button id="1">
        <template v-slot:content>
          <div class="option image">
            <div class="info">
              Fotoğraflı Seçenek
            </div>
            <a
                @click.stop.prevent="showImage('https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg')"
                class="show-image-popup">
              Görüntüle
            </a>
          </div>
        </template>
      </radio-button>
    </div>
    <div class="item">
      <radio-button id="1">
        <template v-slot:content>
          <div class="option image">
            <div class="info">
              Fotoğraflı Seçenek
            </div>
            <a
                @click.stop.prevent="showImage('https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg')"
                class="show-image-popup">
              Görüntüle
            </a>
          </div>
        </template>
      </radio-button>
    </div>
  </div>
</template>

<script>
import RadioButton from '../../../../shared/elements/RadioButton';
import ImagePopup from '../../../../shared/ImagePopup';

export default {
  name: 'MultipleTypeVote',
  data() {
    return {
      isEnableImagePopup: false,
      pathForImageOption: ''
    };
  },
  components: {
    RadioButton,
    ImagePopup
  },
  methods: {
    selectOption() {
      console.log('selected. duplicate click');
    },
    toggleImagePopup() {
      this.isEnableImagePopup = !this.isEnableImagePopup;
    },
    showImage(imagePath) {
      this.pathForImageOption = imagePath;
      this.toggleImagePopup();
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

        }

        .show-image-popup {
          margin-left: 7px;
          text-decoration: underline;
        }
      }
    }
  }
}
</style>
