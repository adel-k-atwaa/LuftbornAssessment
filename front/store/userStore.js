// stores/authStore.js
import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
  state: () => ({
    access_token: null,
    name: null,
    expires: null,
  }),

  actions: {
    setAccessToken(text) {
      this.access_token = text
    },
    setName(text) {
      this.name = text
    },
    setExpires(text) {
      this.expires = text
    },
    delete() {
      this.setExpires(null)
      this.setAccessToken(null)
      this.setName(null)
    },
  },

  getters: {
    getAccessToken: (state) => state.access_token,
    getName: (state) => state.name,
    getExpires: (state) => state.expires,
  },
  persist: true,
})