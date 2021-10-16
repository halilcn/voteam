<template>
  <div class="form-item">
    <div class="title">
      Başlık
    </div>
    <div class="content">
      <!--  v-model="v$.user.password.$model"-->
      {{input}}
      <input
          type="text"
          v-model="input"
          class="content-text"
          :class="{'has-error':true}">
      <errors
          v-if="true"
          is-input-error="true"
          :content="['test erorr']"/>
    </div>
  </div>
</template>

<script>
import Errors from '../../../../../shared/Errors';

export default {
  name: 'VoteTitle',
  props: {
    value: {
      default: ''
    }
  },
  components: {
    Errors
  },
  computed: {
    input: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;
</style>
