<template>
  <div class="auth-wrapper auth-v2">
    <b-row class="auth-inner m-0">
      <!-- Brand logo-->
      <b-link class="brand-logo">
        <vuexy-logo />
        <h2 class="brand-text text-primary ml-1">
          {{ $t('logo') }}
        </h2>
      </b-link>
      <!-- /Brand logo-->

      <!-- Left Text-->
      <b-col lg="8" class="d-none d-lg-flex align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
          <b-img fluid :src="imgUrl" alt="Login V2" />
        </div>
      </b-col>
      <!-- /Left Text-->

      <!-- Login-->
      <b-col lg="4" class="d-flex align-items-center auth-bg px-2 p-lg-5">
        <b-col sm="8" md="6" lg="12" class="px-xl-2 mx-auto">
          <b-card-title class="mb-1 font-weight-bold" title-tag="h2">
            {{ $t('label.welcome') }} 👋
          </b-card-title>
          <b-card-text class="mb-2">
            {{ $t('label.welcome-description') }}
          </b-card-text>

          <!-- form -->
          <validation-observer ref="loginForm" #default="{ invalid }">
            <b-form class="auth-login-form mt-2" @submit.prevent="onLogin">
              <!-- email -->
              <b-form-group label="Username or Email" label-for="login-username">
                <validation-provider #default="{ errors }" name="Username" vid="username" rules="required">
                  <b-form-input
                    id="login-username"
                    v-model="username"
                    :state="errors.length > 0 ? false : null"
                    name="login-username"
                    placeholder="ttcl or ttcl@gmail.com"
                  />
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- forgot password -->
              <b-form-group>
                <div class="d-flex justify-content-between">
                  <label for="login-password">{{ $t('label.password') }}</label>
                  <b-link :to="{ name: 'auth-forgot-password' }">
                    <small>{{ $t('label.forgot-password') }}</small>
                  </b-link>
                </div>
                <validation-provider #default="{ errors }" name="Password" vid="password" rules="required">
                  <b-input-group class="input-group-merge" :class="errors.length > 0 ? 'is-invalid' : null">
                    <b-form-input
                      id="login-password"
                      v-model="password"
                      :state="errors.length > 0 ? false : null"
                      class="form-control-merge"
                      :type="passwordFieldType"
                      name="login-password"
                      placeholder="Password"
                    />
                    <b-input-group-append is-text>
                      <feather-icon
                        class="cursor-pointer"
                        :icon="passwordToggleIcon"
                        @click="togglePasswordVisibility"
                      />
                    </b-input-group-append>
                  </b-input-group>
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </b-form-group>

              <!-- checkbox -->
              <b-form-group>
                <b-form-checkbox id="remember-me" v-model="status" name="checkbox-1">{{
                  $t('label.remember-me')
                }}</b-form-checkbox>
              </b-form-group>

              <!-- submit buttons -->
              <b-button type="submit" variant="primary" block :disabled="invalid">
                {{ $t('button.sign-in') }}
              </b-button>
            </b-form>
          </validation-observer>

          <b-card-text class="text-center mt-2">
            <span>{{ $t('label.newbie') }}</span>
            <b-link :to="{ name: 'auth-register' }">
              <span>&nbsp;{{ $t('label.register') }}</span>
            </b-link>
          </b-card-text>

          <!-- divider -->
          <div class="divider my-2">
            <div class="divider-text">
              or
            </div>
          </div>

          <!-- social buttons -->
          <div class="auth-footer-btn d-flex justify-content-center">
            <b-button variant="facebook" href="javascript:void(0)">
              <feather-icon icon="FacebookIcon" />
            </b-button>
            <b-button variant="google" href="javascript:void(0)">
              <feather-icon icon="InstagramIcon" />
            </b-button>
          </div>
        </b-col>
      </b-col>
      <!-- /Login-->
    </b-row>
  </div>
</template>

<script>
/* eslint-disable global-require */
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import VuexyLogo from '@core/layouts/components/Logo.vue';
import {
  BRow,
  BCol,
  BLink,
  BFormGroup,
  BFormInput,
  BInputGroupAppend,
  BInputGroup,
  BFormCheckbox,
  BCardText,
  BCardTitle,
  BImg,
  BForm,
  BButton,
  VBTooltip,
} from 'bootstrap-vue';
import { required, email } from '@validations';
import { togglePasswordVisibility } from '@core/mixins/ui/forms';
import store from '@/store/index';
import { mapActions } from 'vuex';
import { getHomeRouteForLoggedInUser } from '@/auth/utils';
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue';
import { authConfig } from '@/constants/config';

export default {
  directives: {
    'b-tooltip': VBTooltip,
  },
  components: {
    BRow,
    BCol,
    BLink,
    BFormGroup,
    BFormInput,
    BInputGroupAppend,
    BInputGroup,
    BFormCheckbox,
    BCardText,
    BCardTitle,
    BImg,
    BForm,
    BButton,
    VuexyLogo,
    ValidationProvider,
    ValidationObserver,
  },
  mixins: [togglePasswordVisibility],
  data() {
    return {
      status: '',
      password: '',
      username: '',
      sideImg: require('@/assets/images/pages/login-v2.svg'),

      // validation rules
      required,
      email,
    };
  },
  computed: {
    passwordToggleIcon() {
      return this.passwordFieldType === 'password' ? 'EyeIcon' : 'EyeOffIcon';
    },
    imgUrl() {
      if (store.state.appConfig.layout.skin === 'dark') {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.sideImg = require('@/assets/images/pages/login-v2-dark.svg');
        return this.sideImg;
      }
      return this.sideImg;
    },
  },
  methods: {
    ...mapActions({
      login: 'auth/login',
    }),
    onLogin() {
      let credentials = {
        username: this.username,
        password: this.password,
      };
      credentials = { ...credentials, ...authConfig };

      this.$refs.loginForm.validate().then((success) => {
        if (success) {
          this.login(credentials)
            .then((response) => {
              const userData = response.data.data;
              localStorage.setItem('userData', JSON.stringify(userData));

              this.$router.replace(getHomeRouteForLoggedInUser(userData.role)).then(() => {
                this.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `Welcome ${userData.fullName || userData.username}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `You have successfully logged in as ${userData.role}. Now you can start to explore!`,
                  },
                });
              });
            })
            .catch((error) => {
              this.$refs.loginForm.setErrors(error.response.data.error);
            });
        }
      });
    },
  },
};
</script>

<style lang="scss">
@import '@core/scss/vue/pages/page-auth.scss';
</style>
