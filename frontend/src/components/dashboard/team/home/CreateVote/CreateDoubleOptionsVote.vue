<template>
  <div class="vote-type-title">
    Kabul-Red Oylaması
  </div>
  <vote-title
      v-model="v$.vote.title.$model"
      :errors="getOnlyErrors(v$.vote.title.$errors)"/>
  <div class="form-item">
    <div class="title">
      Ne Oylanacak ?
    </div>
    <div class="content vote-text">
      <textarea class="content-text"/>
    </div>
  </div>
  <vote-start-date
      v-model="v$.vote.startDate.$model"
      :errors="getOnlyErrors(v$.vote.startDate.$errors)"/>
  <vote-end-date
      v-model="v$.vote.endDate.$model"
      :errors="getOnlyErrors(v$.vote.endDate.$errors)"
      :minDate="vote.startDate"/>
</template>

<script>
import VoteTitle from './CreateVoteItems/VoteTitle';
import VoteStartDate from './CreateVoteItems/VoteStartDate';
import VoteEndDate from './CreateVoteItems/VoteEndDate';
import validateMixin from '../../../../../mixins/validateMixin';

export default {
  name: 'CreateYesNoVote',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      vote: {
        title: '',
        startDate: this.$dayjs().format('YYYY-MM-DD'),
        endDate: this.$dayjs().add(1, 'day').format('YYYY-MM-DD')
      }
    };
  },
  validations() {
    return {
      vote: {
        title: {
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        startDate: {
          //geçmiş tarih yazdığında hata ver
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        endDate: {
          //geçmiş tarih yazdığında hata ver, başlangıç tarihinden erken seçilirse hata ver
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  components: {
    VoteTitle,
    VoteStartDate,
    VoteEndDate
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
