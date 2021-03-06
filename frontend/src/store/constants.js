export default {
  BACKEND_BASE_URL: process.env.VUE_APP_BACKEND_API,
  TEAM_ROLLERS: [
    'lead',
    'manager',
    'member'
  ],
  VOTE_TYPES: {
    DOUBLE: 'double',
    MULTIPLE: 'multiple',
    POWER: 'power'
  },
  POWER_VOTE_DEFAULT_OPTIONS: {
    type: 'text',
    message: 'Power Vote'
  },
  VOTE_OPTIONS_TYPES: {
    TEXT: 'text',
    IMAGE: 'image'
  },
  IMAGE: {
    MAX_SIZE_KB: 3000
  },
  USER_TIME_UTC: {
    MAX_UTC: 14,
    MIN_UTC: -12
  },
  NOTIFICATIONS_ACTION_ICONS: {
    celebration: 'celebration.png',
    information: 'information.png',
    invitation: 'invitation.png',
    success: 'success.png'
  },
  MAX_WIDTH_PERMISSION: 950,
  TOTAL_VOTE_USER_POWER: 10000
};

