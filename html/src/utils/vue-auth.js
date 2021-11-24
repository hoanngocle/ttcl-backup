import { ACCESS_TOKEN, REFRESH_TOKEN } from '@/constants/const';

/**
 * Stores the accessToken + refreshToken in local storage
 * and updates the HTTP header
 *
 * @param accessToken
 * @param refreshToken
 */
function setToken({ accessToken, refreshToken }) {
  localStorage.setItem(ACCESS_TOKEN, accessToken);
  localStorage.setItem(REFRESH_TOKEN, refreshToken);
}

/**
 * Remove the accessToken + refreshToken in local storage
 */
function removeToken() {
  localStorage.removeItem(ACCESS_TOKEN);
  localStorage.removeItem(REFRESH_TOKEN);
}

// Manually call this when user log in
export async function onLogin(accessToken, refreshToken) {
  try {
    if (typeof localStorage !== 'undefined' && accessToken && refreshToken) {
      setToken({ accessToken, refreshToken });
    }
  } catch (e) {
    console.log('%cError on cache reset (login)', 'color: orange;', e.message);
  }
}

// Manually call this when user log out
export async function onLogout() {
  try {
    if (typeof localStorage !== 'undefined') {
      removeToken();
    }
  } catch (e) {
    console.log('%cError on cache reset (logout)', 'color: orange;', e.message);
  }
}
