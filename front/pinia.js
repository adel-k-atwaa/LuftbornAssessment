// plugins/pinia.js

import { defineNuxtPlugin } from '#app';
import { createPinia } from 'pinia';
import piniaPluginPersistedstate from '@pinia-plugin-persistedstate/nuxt';

export default defineNuxtPlugin(nuxtApp => {
  const pinia = createPinia();
  pinia.use(piniaPluginPersistedstate);
  nuxtApp.vueApp.use(pinia);
});