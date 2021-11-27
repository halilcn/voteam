<template>
  <image-popup
      @handlePopup="toggleImagePopup"
      :is-enable="isEnableImagePopup"
      :path="testPath"/>
  <div class="options">
    <div class="item selected">
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
      <radio-button id="4">
        <template v-slot:content>
          <div class="text-option">
            assad dlsakadja ksdjkasdjsadklasld as daskd sad
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
            <a class="show-image-popup" href="#">
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
      testPath: 'https://res.cloudinary.com/voteam/image/upload//v1635595083/vote-images/jmmj7kqi4rmdtqsmccfo.jpg'
    };
  },
  components: {
    RadioButton,
    ImagePopup
  },
  methods: {
    toggleImagePopup() {
      this.isEnableImagePopup = !this.isEnableImagePopup;
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
    border: 2px solid #e7e7e7;

    &.selected {
      @include center-md-blue-box-shadow;
      border-color: $df-light-blue-color;
    }

    .option {
      color: $df-dark-blue-color;
      font-weight: 300;

      &.text {

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
