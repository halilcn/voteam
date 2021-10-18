import dayjs from 'dayjs';

export default {
  computed: {
    nextDate() {
      return (value) => {
        return dayjs().add(-1, 'day').isBefore(value);
      };
    }
  }
};
