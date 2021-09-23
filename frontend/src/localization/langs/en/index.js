import errors from './errors';
import customErrors from './custom-errors';

export default {
  general:{
    userActions: {
      register: 'Sign In',
      login: 'Log In'
    },
  },
  homePage: {
    topHeader: {
      links: {
        home: 'Homepage',
        pricing: 'Pricing',
        about: 'About'
      }
    }
  },
  footer: {
    text: '© Copyright 2021. All rights reserved.'
  },
  errors,
  customErrors
};
