<template>
  <div class="form-item">
    <div class="title">
      {{ $t('popups.createVote.content.items.title.text') }}
    </div>
    <div class="content">
      <input
          type="text"
          v-model="value"
          class="content-text"
          :class="{'has-error':hasError}">
      <errors
          v-if="hasError"
          is-input-error="true"
          :content="errors"/>
    </div>
  </div>
</template>

<script>
import Errors from '../../../../../shared/Errors';
import modelValueMixin from '../../../../../../mixins/modelValueMixin';
import modelValueErrorMixin from '../../../../../../mixins/modelValueErrorMixin';

export default {
  name: 'VoteTitle',
  mixins: [modelValueMixin, modelValueErrorMixin],
  components: {
    Errors
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;
</style>
