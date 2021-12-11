const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#2f4982',
          DEFAULT: '#14213d',
          dark: '#0a111f',
        },
        secondary: {
          light: '#fdb849',
          DEFAULT: '#fca311',
          dark: '#ca7d02',
        },
        platinum: {
          light: '#f0f0f0',
          DEFAULT: '#e5e5e5 ',
          dark: '#d4d4d4',
        },
      },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ],
  
}
