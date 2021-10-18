export default {
  computed: {
    validCode(data) {
      console.log(data);
      return (value) => {
        console.log(value);
        return false;
      };
    }
  }
};
