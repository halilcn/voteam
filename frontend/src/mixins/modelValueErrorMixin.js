export default {
  /**
   * Get errors on parent component
   */
  props: {
    errors: {
      type: Array,
      required: true,
      default: []
    }
  },
  computed: {
    /**
     * For check errors exists
     */
    hasError() {
      return this.errors.length > 0;
    }
  }
};
