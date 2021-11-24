export const TYPE_KEY = Symbol('resourceType');

export function randomStr(len) {
  let text = ' ';
  let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

  for (let i = 0; i < len; i++) {
    text += chars.charAt(Math.floor(Math.random() * chars.length));
  }

  return text;
}

export function formatMasterCountries(data) {
  let resource = data.data;
  let masterDataArray = [];
  resource.filter(function (value) {
    masterDataArray.push({ label: value.name, value: value.id });
  });

  return masterDataArray;
}

export function formatMasterData(data) {
  let resource = data.data;
  let masterDataArray = [];
  resource.filter(function (value) {
    masterDataArray.push({ label: value.name, value: value.code });
  });

  return masterDataArray;
}

export function formatMasterProvinces(data) {
  let resource = data.data;
  let masterDataArray = [];
  resource.forEach(function (value) {
    masterDataArray.push({ label: value.name_with_type, value: value.code });
  });

  return masterDataArray;
}

export function formatMasterDistricts(data) {
  let districts = data.data;
  let defaultDistrict = {};
  for (let key in districts) {
    let province_code = 'D' + districts[key].province_code;
    defaultDistrict[province_code] = defaultDistrict[province_code] || [];
    defaultDistrict[province_code].push({ label: districts[key].name_with_type, value: districts[key].code });
  }
  console.log(defaultDistrict);
  return defaultDistrict;
}

export function formatMasterColors(data) {
  let resource = data.data;
  let masterDataArray = [];
  resource.filter(function (value) {
    masterDataArray.push({ color: value.code, value: value.id });
  });

  return masterDataArray;
}

export function setDefaultNumberNaN(data) {
  return isNaN(data) ? 0 : data;
}
