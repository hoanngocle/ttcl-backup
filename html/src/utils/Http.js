import axios from 'axios';
import { ACCESS_TOKEN } from '@/constants/const';

// Create new instance
const Http = axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  headers: {
    'Api-Authorization': process.env.VUE_APP_API_KEY,
    Accept: 'application/json',
  },
});

// Config instance
Http.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem(ACCESS_TOKEN);
    if (token) {
      // eslint-disable-next-line no-param-reassign
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => Promise.reject(error.response),
);

/**
 * Intercept the response so we can handle the
 * expected exceptions from the API
 */
Http.interceptors.response.use(
  (response) => response,
  (error) => {
    /**
     * This could be a CORS issue or
     * a dropped internet connection.
     */

    if (typeof error.response === 'undefined' && error.message !== 'Request Cancelled') {
      return alert('A network error occurred.');
    }

    switch (error.response.status) {
      case 401:
        console.log('401');

        break;
      case 422:
        console.log('422');
        /**
         * Handle Validation Response
         */

        break;
      case 403:
      case 500:
      case 562:
      case 563:
      case 567:
      case 568:
      case 570:
        /**
         * Handle the exceptions when the server
         * responds with error messages
         */

        if (error.response.data instanceof Blob) {
          // store.dispatch(showNotification(translate('The file does not exist'), false));
        } else {
          let message = error.response.data.message || error.response.data;
          if (!(message instanceof String)) {
            message = error.response.statusText;
          }
          // store.dispatch(showNotification(message, false));
        }

        break;
      default:
        break;
    }

    return Promise.reject(error);
  },
);

export default Http;
