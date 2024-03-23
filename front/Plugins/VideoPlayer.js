// import { applyPlugin,defineNuxtPlugin } from '#app'
// import Vue from 'vue'
// Vue.use(Vue3VideoPlayer)

// export default defineNuxtPlugin((nuxtApp) => {
  //     nuxtApp.vueApp.use(Vue3VideoPlayer)
  // })
  import Vue from 'vue'
  import VideoPlayer from 'vue-videojs7'
  // import { createApp } from 'vue'
  // import Vue from 'vue'
  // import Vue3VideoPlayer from '@cloudgeek/vue3-video-player'
  // import '@cloudgeek/vue3-video-player/dist/vue3-video-player.css'

// const app = createApp(App)
// createApp(App).mount('#app');
// Vue.use(Vue3VideoPlayer, {
//   lang: 'zh-CN'
// }).mount('#app')
// app.use(Vue3VideoPlayer, {
//   lang: 'zh-CN'
// }).mount('#app')

Vue.use(VideoPlayer, /* {
  options: global default videojs options,
  events: global videojs videojs events
} */)