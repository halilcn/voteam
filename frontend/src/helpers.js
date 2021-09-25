import notify from './notify';

const helpers = {};

const constants = {
  STORAGE_LANGUAGE: 'lang'
};

/**
 * Get language of app
 */
helpers.getLanguage = () => {
  const storedLang = localStorage.getItem(constants.STORAGE_LANGUAGE);

  if (storedLang !== null) return storedLang;

  const defaultLang = window.navigator.language || process.env.DEFAULT_LANGUAGE;
  this.setLanguage(defaultLang);
  return defaultLang;
};

/**
 * Set Language of app
 */
helpers.setLanguage = (lang) => {
  localStorage.setItem(constants.STORAGE_LANGUAGE, lang);
};

/**
 * When clicked it puts dataName's data false
 */
helpers.clickOutside = (self, dataName) => {
  window.addEventListener('click', function (e) {
    if (!self.$el.contains(e.target)) {
      self[dataName] = false;
    }
  });
};

/**
 * Get only message of errors for vuelidate package
 */
helpers.getOnlyErrors = (data) => {
  return data.map(item => {return item.$message;});
};

/**
 * Shows an error alert when there is an error
 * @param handle
 * @param customCatch
 * @returns {Promise<void>}
 */
helpers.defaultHandler = async (handle, customCatch = () => {}) => {
  try {
    await handle();
  } catch (err) {
    if (await customCatch(err)) return;
    await notify.error('Bir hata oluştu.');
    // console.log(this.$t('customErrors.generalError')); //this.$t(('customErrors.generalError'))
  }
};

export default helpers;
