import errors from './errors';
import customErrors from './custom-errors';
import notifyMessages from './notify-messages';

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
      newPassword: 'New Password',
      repeatNewPassword: 'Confirm New Password',
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
        howWork: 'How voteam Works',
        about: 'About'
      }
    },
    content: {
      itemOne: {
        title: 'provides next generation voting.',
        info: 'allows the team to make decisions democratically. If you are looking for a team that makes democratic decisions for work, school or any cause, voteam is for you.',
        createTeamBtn: 'Create Team'
      },
      itemTwo: {
        title: 'Votes are secret and of varying strength.',
        info: 'When any type of voting is initiated, the votes of everyone on the team are secret and of varying strength.' +
          'Voting powers are distributed to each member by their teammates. No one, including the team leader, can see these deployed powers.' +
          'voteam finalizes voting by passing members\' votes and voting power through certain algorithms.'
      },
      itemThree: {
        title: 'Ensures team integrity.',
        info: 'voteam, removing power ambiguities among members, allows you to focus on your work.'
      }
    }
  },
  pricing: {
    title: {
      first: 'Completely',
      second: 'free'
    }
  },
  userActions: {
    helpfulLinks: {
      home: 'Home',
      howWork: 'How voteam Work ?',
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
  forgotPassword: {
    infoText: 'You can change your password by entering your e-mail address.',
    sendCodeButton: 'Reset Password',
    wrongEmail: 'No users registered with this e-mail account',
    sentCodeInfo: 'Email sent to reset password. Password reset link will be deleted automatically after 2 hours.'
  },
  footer: {
    text: '© Copyright 2021. All rights reserved.'
  },
  dashboard: {
    members: {
      invitation: {
        isUserAlreadyMember: 'This user is already a member'
      }
    }
  },
  errors,
  customErrors,
  notifyMessages
};
