export default {
  BACKEND_BASE_URL: 'http://127.0.0.1:8000/api/v1/',
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
  }
};

