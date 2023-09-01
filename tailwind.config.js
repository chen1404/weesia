/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    backgroundImage: {
      'date-bg': "url('/public/img/background/date-bg.jpg')",
      'line-bg': "url('/public/img/background/line-bg.jpg')",
      'app-bg': "url('/public/img/background/app-bg.jpg')",
      'absen-bg': "url('/public/img/background/absen-bg.jpg')",
      'app-form-bg': "url('/public/img/background/app-form-bg.jpg')",
      'filter-svg': "url('/public/img/svg/Vector.svg')",
    },
    container: {
      center: true,
      padding: '70px',
    },
    extend: {
      screens: {
        'xs': {'max': '400px'},
      },
      colors: {
        primary: '#1BBC9D',
        secondary: '#F8FCFB',
        dark: '#181D31',
        light: '#F6F6F9',
        gray: '#D9D9D9',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
