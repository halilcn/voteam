<template>
  <div class="form-item">
    <div class="title">
      {{ $t('popups.createVote.content.items.endDate.endTime') }}
    </div>
    <div class="content">
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
      <div v-if="!hasError" class="date-info-text">
        <i class="bi bi-stopwatch-fill"></i>
        {{ differenceDayBetweenStartDateAndEndDate }}
        {{ $t('popups.createVote.content.items.endDate.day') }}
      </div>
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
  props: ['minDate'],
  watch: {
    minDate(newValue) {
      this.value = newValue;
    }
  },
  components: {
    Errors
  },
  computed: {
    differenceDayBetweenStartDateAndEndDate() {
      const diffDay = this.$dayjs(this.value).diff(this.minDate, 'day');
      return diffDay > 0 ? diffDay + 1 : 1;
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.date-info-text {
  font-weight: 300;
  font-size: 13px;
  color: $df-mdl-dark-black-color;
  margin-top: 5px;
}
</style>
