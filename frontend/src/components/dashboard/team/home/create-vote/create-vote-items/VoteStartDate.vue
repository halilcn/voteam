<template>
  <div class="form-item">
    <div class="title">
      {{ $t('popups.createVote.content.items.startDate.startTime') }}
    </div>
    <div class="content vote-start-date">
      <div class="vote-start-date-options">
        <div
            @click="selectDateTime('now')"
            class="start-now-btn "
            :class="{'selected':!isSelectedNextDate}">
          {{ $t('popups.createVote.content.items.startDate.startNow') }}
        </div>
        <div
            @click="selectDateTime('next')"
            class="start-next-date-btn"
            :class="{'selected':isSelectedNextDate}">
          {{ $t('popups.createVote.content.items.startDate.startNextDate') }}
        </div>
      </div>
      <template v-if="isSelectedNextDate">
        <input
            type="date"
            :min="nowDate"
            :max="maxDate"
            v-model="value"
            class="content-text"
            :class="{'has-error':hasError}">
        <errors
            v-if="hasError"
            is-input-error="true"
            :content="errors"/>
      </template>
    </div>
  </div>
</template>

<script>
import modelValueMixin from '../../../../../../mixins/modelValueMixin';
import modelValueErrorMixin from '../../../../../../mixins/modelValueErrorMixin';
import Errors from '../../../../../shared/Errors';

export default {
  name: 'VoteStartDate',
  mixins: [modelValueMixin, modelValueErrorMixin],
  props: ['isPowerVote'],
  data() {
    return {
      nowDate: this.$dayjs().format('YYYY-MM-DD'),
      isSelectedNextDate: false
    };
  },
  components: {
    Errors
  },
  methods: {
    selectDateTime(timeType) {
      const isNexDate = timeType === 'next';
      this.isSelectedNextDate = isNexDate;
      if (!isNexDate) this.value = this.nowDate;
    }
  },
  computed: {
    maxDate() {
      if (this.isPowerVote) {
        return this.$dayjs().endOf('month').format('YYYY-MM-DD');
      }

      return 0;
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.vote-start-date {
  &-options {
    display: flex;
    margin-bottom: 7px;

    div {
      font-weight: 300;
      font-size: 13px;
      cursor: pointer;
      padding: 5px 11px;
      background-color: #eeeeee;
      margin-right: 10px;
      border-radius: 4px;

      &:hover {
        background-color: #e5e5e5;
      }

      &.selected {
        background-color: $df-blue-color;
        color: white;
      }
    }
  }
}
</style>
