import errors from './errors';
import customErrors from './custom-errors';

export default {
  general: {
    userActions: {
      register: 'Sign In',
      login: 'Log In',
      rememberPassword: 'Forgot your password ?'
    },
    input: {
      email: 'Email',
      password: 'Password',
      nameAndSurname: 'Name and Surname'
    },
    others: {
      termsOfService: 'Terms Of Service'
    }
  },
  home: {
    topHeader: {
      links: {
        home: 'Homepage',
        pricing: 'Pricing',
        about: 'About'
      }
    }
  },
  userActions: {
    helpfulLinks: {
      home: 'Home',
      pricing: 'Pricing',
      about: 'About'
    }
  },
  login: {
    infoText: 'Welcome!',
    loginButton: 'Log In',
    wrongEmailOrPassword: 'Email or password is wrong'
  },
  register: {
    infoText: 'Registration required to create or join teams.',
    registerButton: 'Create Account',
    sendCodeButton: 'Send Code',
    resendCodeButton: 'Resend Code',
    codeSent: 'Code sent. Write the code below.',
    termsOfServiceText: 'are deemed to have been accepted.'
  },
  footer: {
    text: '© Copyright 2021. All rights reserved.'
  },
  errors,
  customErrors
};
