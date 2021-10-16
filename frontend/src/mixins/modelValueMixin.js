export default {
  /**
   * Define modelValue for vue 3
   */
  props: {
    modelValue: String
  },
  computed: {
    /**
     *  For two-way data transfer
     */
    value: {
      get() {
        return this.modelValue;
      },
      set(modelValue) {
        this.$emit('update:modelValue', modelValue);
      }
    }
  }
};
