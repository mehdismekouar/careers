/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'selector',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'black': '#060606'
        
      },
      fontFamily: {
        'hanken': ['Hanken Grotesk', 'sans-serif']
      },
      fontSize: {
        '2xs': '.625rem'
      }
    },
  },
  plugins: [],
}

