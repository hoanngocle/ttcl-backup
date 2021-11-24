import { apiV1 } from '@/constants/apiUrl';
import Http from '../../utils/Http';
import { onLogin } from '../../utils/vue-auth';

export default {
  login({ dispatch }, payload) {
    return new Promise((resolve, reject) => {
      Http.post(apiV1.loginUrl, payload)
        .then((response) => {
          if (response.data.success === true) {
            onLogin(response.data.data.access_token, response.data.data.refresh_token);
            dispatch('getUserInfo').then((userInfo) => resolve(userInfo));
          } else {
            reject(response);
          }
        })
        .catch((error) => {
          reject(error.response);
        });
    });
  },
  getUserInfo(context) {
    return new Promise((resolve, reject) => {
      Http.get(apiV1.userInfoUrl)
        .then((response) => {
          context.dispatch('saveLoginInfo', response.data.data);
          resolve(response);
        })
        .catch((error) => {
          reject(error);
        });
    });
  },
  saveLoginInfo({ commit }, payload) {
    commit('clearError');
    commit('setProcessing', true);
    const currentUser = {
      email: payload.email,
      username: payload.username,
      display_name: payload.character.nickname,
      avatar: payload.character.avatar,
      phone: payload.phone,
      type: payload.type,
      level: payload.character.level,
      year: payload.character.year,
    };

    // let permissions = payload.roles[0].permissions;

    commit('setUser', currentUser);
    // commit('setPermission', JSON.stringify(permissions));
  },
  logOut({ commit }) {
    return new Promise((resolve) => {
      commit('setLogout', false);
      resolve(true);
    });
  },
};
