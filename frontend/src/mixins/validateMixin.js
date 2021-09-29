import { helpers } from '@vuelidate/validators';
import useVuelidate from '@vuelidate/core';
import * as validators from '@vuelidate/validators';

export default {
  data() {
    return {
      validators
    };
  },
  methods: {
    /**
     * Get only message of errors for vuelidate package
     */
    getOnlyErrors(data) {
      return data.map(item => {return item.$message;});
    },

    /**
     * For multiple language error
     */
    multipleLangError(path, type) {
      return helpers.withMessage(this.$t(path), type);
    },
    /**
     * Required to use vuelidate on vue 3
     */
    useVuelidate() {
      return useVuelidate();
    }
  }
};
