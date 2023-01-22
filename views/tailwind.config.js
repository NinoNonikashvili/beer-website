/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./dist/**/*.{html,js}",
    "./**/*.{html,js,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        lobster: ['Lobster'],
        poppins: ['Poppins']
      },
      spacing: {
        auto: 'auto',
        nintyper: '90%',
        eightyper: '80%'
      },
      colors: {
        transparent: 'transparent'
      }
    },
  },
  plugins: [],
}
