<template>
  <div class="form-item">
    <div class="title">
      Ne Oylanacak ?
    </div>
    <div class="content vote-text">
      {{ modelValue }}
      {{data}}
      <textarea v-model="modelValue" class="content-text"/>
    </div>
  </div>
</template>

<script>
import modelValueMixin from '../../../../../mixins/modelValueMixin';

export default {
  name: 'CreateYesNoVote',
  mixins: [modelValueMixin],
  data() {
    return {
      data: {
        type: 'text',
        message: ''
      }
    };
  },
  watch: {
    'data.message': function () {
      this.modelValue = this.data.message;
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.form-item {
  .vote-text textarea {
    width: 100%;
    resize: vertical;
    max-height: 200px;
    min-height: 50px;
  }
}

</style>
