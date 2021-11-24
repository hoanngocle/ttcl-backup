import { AUTH_COOKIE, AUTH_COOKIE_EXPIRED_TIME, PERMISSION } from '@/constants/const';
import Vue from 'vue';

export default {
  setUser(state, payload) {
    state.currentUser = payload;
    state.processing = false;
    state.loginError = null;
    Vue.$cookies.set(AUTH_COOKIE, payload, AUTH_COOKIE_EXPIRED_TIME);
  },
  setPermission(state, payload) {
    state.permissions = payload;
    localStorage.setItem(PERMISSION, payload);
  },
  setLogout(state) {
    state.currentUser = null;
    state.permissions = null;
    state.processing = false;
    state.loginError = null;
    Vue.$cookies.remove(AUTH_COOKIE);
    localStorage.removeItem(PERMISSION);
  },
  setProcessing(state, payload) {
    state.processing = payload;
    state.loginError = null;
  },
  setError(state, payload) {
    state.loginError = payload;
    state.currentUser = null;
    state.processing = false;
  },
  clearError(state) {
    state.loginError = null;
  },
};
