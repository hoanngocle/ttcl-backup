export const pageSizes = [10, 20, 50];

export const authConfig = {
  grant_type: 'password',
  client_id: process.env.VUE_APP_CLIENT_ID,
  client_secret: process.env.VUE_APP_CLIENT_SECRET,
};

export const searchPath = '';

export const defaultLocale = 'en';
export const defaultDirection = 'ltr';

/* eslint-disable global-require */
export const localeOptions = [
  {
    locale: 'en',
    img: require('@/assets/images/flags/en.png'),
    name: 'English',
  },
  {
    locale: 'vi',
    img: require('@/assets/images/flags/fr.png'),
    name: 'Vietnamese',
  },
  {
    locale: 'jp',
    img: require('@/assets/images/flags/de.png'),
    name: 'Japanese',
  },
];
