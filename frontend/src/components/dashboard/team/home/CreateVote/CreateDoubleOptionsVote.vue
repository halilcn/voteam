<template>
  <div class="vote-type-title">
    Kabul-Red Oylaması
  </div>
  {{vote.title}}
  <vote-title
      v-model="v$.vote.title.$model"/>
  <div class="form-item">
    <div class="title">
      Ne Oylanacak ?
    </div>
    <div class="content vote-text">
      <textarea class="content-text"/>
    </div>
  </div>
  <vote-start-date/>
  <vote-end-date/>
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
        title: ''
      }
    };
  },
  validations() {
    return {
      vote: {
        title: {
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
