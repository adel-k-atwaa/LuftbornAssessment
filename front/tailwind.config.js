/** @type {import('tailwindcss').Config} */
export default {
  tailwindcss: {
    cssPath: '~/assets/css/tailwind.css',
    configPath: 'tailwind.config.js',
    exposeConfig: true,
    config: {},
    injectPosition: 0,
    viewer: true,
  },
  content: [
    `components/**/*.{vue,js}`,
    `layouts/**/*.vue`,
    `pages/**/*.vue`,
    `composables/**/*.{js,ts}`,
    `plugins/**/*.{js,ts}`,
    `App.{js,ts,vue}`,
    `app.{js,ts,vue}`
  ],
  theme: {
    extend: {
      colors: {
        'yellow': '#f7a833',
        'purple': '#201a47',
        'gray': '#d9d9d9',
        'white': '#ffffff',
        'black': '#000000',
        'red':'#ff0000',
      },
    },
  },
  plugins: [],
}

