import Notiflix from 'notiflix';

const notify = {};

notify.success = (message = 'Success') => {
  Notiflix.Notify.success(message);
};

notify.error = (message = 'Error') => {
  Notiflix.Notify.failure(message);
};

export default notify;
