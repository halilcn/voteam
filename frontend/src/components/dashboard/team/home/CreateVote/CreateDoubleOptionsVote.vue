<template>
  <div class="form-item">
    <div class="title">
      Ne Oylanacak ?
    </div>
    <div class="content vote-text">
      <textarea v-model="v$.vote.message.$model" class="content-text"/>
    </div>
  </div>
</template>

<script>
import modelValueMixin from '../../../../../mixins/modelValueMixin';
import constants from '../../../../../store/constants';
import validateMixin from '../../../../../mixins/validateMixin';

export default {
  name: 'CreateYesNoVote',
  mixins: [modelValueMixin, validateMixin],
  props: {
    voteErrors: Array
  },
  data() {
    return {
      v$: this.useVuelidate(),
      vote: {
        type: constants.VOTE_TYPES.TEXT,
        message: ''
      }
    };
  },
  validations() {
    return {
      vote: {
        message: {
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  watch: {
    'vote.message': function () {
      this.value = this.vote;
    },
    'v$.vote.message.$errors': function (newValue) {
      this.errors = this.getOnlyErrors(newValue);
    }
  },
  computed: {
    errors: {
      get() {
        return this.voteErrors;
      },
      set(voteErrors) {
        this.$emit('update:voteErrors', voteErrors);
      }
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
