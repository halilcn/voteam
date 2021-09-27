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
    multipleLangError(path, type) {
      return helpers.withMessage(this.$t(path), type);
    },
    useVuelidate() {
      return useVuelidate();
    }
  }
};
