<template>
  <div class="form-item">
    <div class="title">
      Oylama Bitiş Zamanı
    </div>
    <div class="content">
      {{ minDate }}
      <input
          type="date"
          :min="minDate"
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
import modelValueMixin from '../../../../../../mixins/modelValueMixin';
import modelValueErrorMixin from '../../../../../../mixins/modelValueErrorMixin';
import Errors from '../../../../../shared/Errors';

export default {
  name: 'VoteEndDate',
  mixins: [modelValueMixin, modelValueErrorMixin],
  props: {
    minDate: Date
  },
  components: {
    Errors
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;
</style>
