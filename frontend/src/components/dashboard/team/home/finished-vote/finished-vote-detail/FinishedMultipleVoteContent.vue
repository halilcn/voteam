<template>
  <div v-if="data.status" class="detail success">
    <image-popup
        @handlePopup="toggleImagePopup"
        :is-enable="isEnableImagePopup"
        :path="pathOfImageOnPopup"/>

    <div class="title">
      <i class="bi bi-patch-check-fill"></i>
      {{ data.message }}
    </div>
    <div v-if="isTextOptionType" class="result text-option">
      {{ data.selected_option.message }}
    </div>
    <div v-else class="result image-option">
      <div @click="showImage(data.selected_option.path)" class="show-img-btn">
        {{ $t('popups.finishedVote.content.detail.multipleVote.showImage') }}
      </div>
    </div>
  </div>
  <div v-else class="detail unsuccessful">
    <div class="title">
      <i class="bi bi-x-circle"></i>
      {{ data.message }}
    </div>
    <div v-if="typeof data.info_message !== undefined" class="info-message">
      <i class="bi bi-info-circle"></i>
      {{ data.info_message }}
    </div>
  </div>
</template>

<script>
import ImagePopup from '../../../../../shared/ImagePopup';
import constants from '../../../../../../store/constants';

export default {
  name: 'FinishedMultipleVoteContent',
  props: {
    data: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      isEnableImagePopup: false,
      pathOfImageOnPopup: ''
    };
  },
  components: {
    ImagePopup
  },
  methods: {
    toggleImagePopup() {
      this.isEnableImagePopup = !this.isEnableImagePopup;
    },
    showImage(imageUrl) {
      this.pathOfImageOnPopup = imageUrl;
      this.toggleImagePopup();
    }
  },
  computed: {
    isTextOptionType() {
      return this.data.selected_option.type === constants.VOTE_OPTIONS_TYPES['TEXT'];
    }
  }
};
</script>

<style lang="scss" scoped>
@include finished-vote;

.result {
  &.image-option {
    .show-img-btn {
      font-weight: 400;
      text-decoration: underline;
      cursor: pointer;
      transition: .2s;

      &:hover {
        color: $df-black-and-blue-color;
      }
    }
  }
}
</style>
