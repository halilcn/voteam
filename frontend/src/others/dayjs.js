import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import utc from 'dayjs/plugin/utc';
import tr from 'dayjs/locale/tr';
import en from 'dayjs/locale/en';
import helpers from '../helpers';

dayjs.extend(relativeTime);
dayjs.extend(utc);
dayjs.locale(helpers.getLanguage() === 'tr' ? tr : en);

export default dayjs;
