
export default defineNuxtConfig({
  devtools: { enabled: true },
  // plugins: ['~/plugins/pinia.js'],
  ssr:false,
  css: ['~/assets/css/tailwind.css'],
  runtimeConfig:{
    public: {
      BASE_URL:process.env.BASE_URL,
      APP_NAME: process.env.APP_NAME
    }
  },
  components: true,
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  
  buildModules: [
    '@nuxtjs/tailwindcss',
    '@nuxtjs/moment',
  ],
  modules: [
    "@nuxtjs/tailwindcss",
    '@pinia/nuxt',
    '@pinia-plugin-persistedstate/nuxt',
  ]
})