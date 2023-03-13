/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  content: [
      './public/**/*.html',
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    screens:{
      'xs': '350px',
      ...defaultTheme.screens,
    },
    extend: {
      colors: {

      },
      fontFamily: {
        'montserrat': ['Montserrat','sans-serif'],
        'poppins': ['Poppins','sans-serif'],

      },
      fontSize: {
        'xxs': '.65rem'
      },

    }
  },
  plugins: [
    require('flowbite/plugin'),
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/aspect-ratio'),
  ],
}
