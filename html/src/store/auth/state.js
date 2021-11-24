import Vue from 'vue';
import VueCookies from 'vue-cookies';
import { AUTH_COOKIE } from '@/constants/const';

Vue.use(VueCookies);

export default {
  currentUser: Vue.$cookies.get(AUTH_COOKIE) !== null ? Vue.$cookies.get(AUTH_COOKIE) : null,
  permissions: localStorage.getItem('permission') !== null ? localStorage.getItem('permission') : null,
  loginError: null,
  processing: false,
};
