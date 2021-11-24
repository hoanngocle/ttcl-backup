const url = 'api/';
const master = 'master/';

export const apiV1 = {
  // Auth
  loginUrl: `${url}login`,
  logoutUrl: `${url}logout`,
  userInfoUrl: `${url}user-info`,

  // Master data
  getCountry: `${url}${master}country`,
  getProvince: `${url}${master}province`,
  getDistrict: `${url}${master}'district`,

  // Course
  courseUrl: `${url}course`,
  courseDetailUrl: `${url}course/detail`,

  // Set
  setUrl: `${url}set`,
  setListUrl: `${url}set/list`,
  setDetailUrl: `\`${url}set/detail`,

  // Term
  termListUrl: `${url}term`,
};

export const apiUrl = '/';
