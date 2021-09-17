import useVuelidate from '@vuelidate/core';
import { helpers } from '@vuelidate/validators';

export default {

  methods: {
    multipleLangError(path, type) {
      return helpers.withMessage(this.$t(path), type);
    },
    setup2() {
      return { v$: useVuelidate() };
    }
  }
};
