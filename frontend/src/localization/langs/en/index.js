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
  about: {
    text: 'Bu proje tamamen açık kaynaklıdır.'
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
    text: '© Copyright 2022. All rights reserved.'
  },
  teams: {
    actions: {
      buttons: {
        createTeam: 'Create Team',
        joinTeam: 'Join Team',
        signOut: 'Sign Out'
      }
    },
    list: {
      teamCode: 'Team Code',
      membersCount: 'Members Count',
      noTeams: 'There are currently no teams. You can create or join teams.'
    }
  },
  dashboard: {
    general: {
      vote: {
        types: {
          multipleVote: 'Multiple Vote',
          acceptRefuseVote: 'Accept/Refuse Vote',
          powerVote: 'Power Vote'
        },
        acceptRefuseVote: {
          accepted: 'Accepted',
          rejected: 'Rejected'
        }
      }
    },
    top: {
      userMenu: {
        editProfile: 'Edit Profile',
        logout: 'Logout'
      },
      userNotifications: {
        title: 'Notifications',
        loadMore: 'load more',
        noNotification: 'no notifications'
      }
    },
    leftSideBar: {
      home: 'Home',
      members: 'Members',
      notifications: 'Notifications',
      settings: 'Settings'
    },
    home: {
      voteList: {
        votes: 'Votes',
        powerVote: 'Power Vote',
        finishedVotes: 'Finished Votes',
        startVote: 'Start Vote',
        powerVoteNeeded: 'Power vote required',
        needToJoinPowerVote: 'Must participate in the power vote',
        activeVotes: {
          title: 'Active Votes',
          voted: 'Voted',
          noActiveVotes: 'No active vote'
        },
        nextVotes: {
          title: 'Next Votes',
          shouldPowerVoteInfo: 'Power vote have to be start every month',
          noNextVotes: 'No next vote'
        }
      },
      teamInfo: {
        team: 'Team',
        codeCopied: 'Code copied !',
        membersCount: 'Members Count',
        totalStartedVotes: 'Total Started Votes',
        membersTurnoutToVote: 'Members Turnout To Vote',
        notCalculated: 'Not Calculated'
      }
    },
    members: {
      top: {
        members: 'Members',
        member: 'member',
        invitesWaiting: 'invites waiting',
        memberInvitation: 'Member Invitation'
      },
      list: {
        delete: 'delete',
        totalVotes: 'Total Votes',
        notStartVote: 'There are no votes',
        sentInvitation: 'Invitation sent'
      }
    },
    notifications: {
      title: 'Notifications',
      moreNotifications: 'show more'
    },
    settings: {
      title: 'Settings',
      updatedSettings: 'Updated Settings',
      team: {
        title: 'TEAM SETTINGS',
        name: 'Team Name',
        image: 'Team Photo',
        change: 'Change',
        fieldEmptyInfo: 'Fields cannot be left empty',
        save: 'Save'
      },
      member: {
        title: 'MEMBER SETTINGS',
        leaveTeamInfo: 'When you leave the team, the votes you started or the votes you cast are not deleted.',
        leaveTeamInfoUnderlined: 'Your power points will be deleted.',
        leaveTeam: 'Leave Team'
      }
    }
  },
  popups: {
    createTeam: {
      title: 'Create Team',
      content: {
        teamName: 'Team Name',
        info: 'You are assigned as the leader of the team you created.',
        create: 'Create'
      }
    },
    joinTeam: {
      title: 'Join Team',
      content: {
        info: 'You need the teams code to join the team.',
        join: 'Join',
        wrongCode: 'The entered code is incorrect or you have joined this team before.',
        joinedTeam: 'You joined the team !'
      }

    },
    welcomeUser: {
      title: 'Welcome',
      content: {
        welcome: 'Welcome to voteam !',
        firstStep: 'You can create a team by entering your own team name or join the team with the team code.',
        invitationInfo: 'If you have been invited to the team before, do not forget to check your e-mail address.'
      }
    },
    createVote: {
      title: 'Start Vote',
      content: {
        back: 'back',
        createVote: 'Start Vote',
        startedVote: 'Started Vote',
        items: {
          endDate: {
            endTime: 'End Time',
            day: 'day'
          },
          startDate: {
            startTime: 'Start Time',
            startNow: 'Start Now',
            startNextDate: 'Select Next Date'
          },
          title: {
            text: 'Title'
          }
        },
        multipleVote: {
          options: 'Vote Options',
          optionText: 'Explain vote option...',
          selectedImage: 'Selected Image.',
          showImage: 'Show',
          noOptions: 'No vote option has been added yet',
          add: 'add'
        },
        doubleVote: {
          voteTitle: 'What is the event to vote ?',
          voteExplanation: 'Explain the topic to be voted on...'
        }
      }
    },
    firstPowerVote: {
      title: 'Power Vote',
      content: {
        info: {
          hasMoreThanLowerLimitUsers: 'A minimum of 3 members must be present to initiate the first power vote.',
          hasActiveVote: 'Power voting has started. When voting ends, different types of voting can be started.',
          powerVote: 'After the team is formed, a power vote is mandatory. Other types of voting may be initiated after the first power vote has been taken.'
        },
        createVote: 'Start Power Vote',
        firstPowerVoteText: 'First Power Vote',
        startedVote: 'Started vote'
      }
    },
    finishedVote: {
      title: 'Finished Votes',
      content: {
        list: {
          showAnswer: 'show answer',
          waitInfo: 'calculating',
          moreFinishedVote: 'more finished votes'
        },
        detail: {
          back: 'back',
          endTime: 'End Date Of Vote',
          totalVoteTime: 'Total Time Of Vote',
          day: 'day',
          multipleVote: {
            showImage: 'Show Image'
          }
        }
      }
    },
    userVote: {
      title: 'Send Vote',
      content: {
        percentageOfUsersVoted: 'Percentage Of Users Voted',
        endTime: 'end in {day}',
        voted: 'Voted !',
        powerVote: {
          power: 'unit power',
          tooMuchPower: '2 Units Of Power Left',
          allPowerDeployed: 'All Unit Powers Distributed',
          fullPower: 'distribute the remaining unit forces',
          voteInfo: 'There are {usersCount} members in total. If the powers are to be distributed equally, {power} units of power can be given to each member.',
          send: 'Send'
        },
        multipleVote: {
          imageVote: 'Photo Option',
          show: 'Show',
          send: 'Vote'
        },
        acceptRefuseVote: {
          accept: 'Accept',
          reject: 'Reject'
        }
      }
    },
    userInvitation: {
      title: 'Member Invitation',
      content: {
        name: 'Name ve Surname',
        email: 'E-mail',
        emailInfo: 'If you want to invite the registered user, you must write the registered e-mail address.',
        isUserAlreadyMember: 'This user is already a member',
        sendInvitation: 'Send Invitation'
      }
    },
    userEdit: {
      title: 'Edit Profile',
      content: {
        email: 'E-mail',
        nameAndSurname: 'Name ve Surname',
        image: 'Image',
        uploadImage: 'Upload Image',
        timeZone: 'Time Zone (UTC+14/-12)',
        updatedSettings: 'Profile updated',
        save: 'Save'
      }
    },
    continue: {
      title: 'Do you want to continue ?',
      yes: 'continue',
      no: 'back'
    },
    image: {
      title: 'Fotoğraf'
    },
    deleteUser: {
      title: 'Do you want to continue ?',
      content: {
        info: 'Warning ! Active votes initiated by the user leaving the team, votes given to active votes and power points are deleted. Do you want to continue ?',
        yes: 'continue',
        no: 'back'
      }
    }
  },
  errors,
  customErrors,
  notifyMessages
};
