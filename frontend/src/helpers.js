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
 * Shows an error alert when there is an error
 * @param handle
 * @param customCatch
 * @returns {Promise<void>}
 */
helpers.handle = async (handle, customCatch = () => {}) => {
  try {
    await handle();
  } catch (err) {
    if (err.response) if (await customCatch(err)) return;
    await notify.error('Bir hata oluştu.');
    //TODO: Multiple language
    /* console.log(i18n); //this.$t(('customErrors.generalError'))*/
  }
};

/**
 * Copy text
 * @param text
 */
helpers.copyText = (text) => {
  const textArea = document.createElement('textarea');
  textArea.textContent = text;
  document.body.append(textArea);
  textArea.select();
  document.execCommand('copy');
  textArea.style.display = 'none';
};

/**
 * For clear items in object
 */
helpers.clearItems = (object) => {
  for (const key in object) {
    object[key] = '';
  }
  return object;
};

/**
 * Convert to snake_case format
 */
helpers.convertSnakeCase = (text) => {
  const result = text.replace(/([A-Z])/g, ' $1');
  return result.split(' ').join('_').toLowerCase();
};

/**
 * Convert all keys to snake_case format by convertSnakeCase function
 */
helpers.convertAllKeys = (data) => {
  const newData = {};

  for (const [key, value] of Object.entries(data)) {
    newData[helpers.convertSnakeCase(key)] = value;
  }

  return newData;
};

/**
 * Create temporary url for show
 */
helpers.createTemporaryUrl = (file) => {
  return URL.createObjectURL(file);
};

export default helpers;
