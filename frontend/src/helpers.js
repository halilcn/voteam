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

export default helpers;
