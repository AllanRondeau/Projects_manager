/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    colors: {
      'blue': '#211951',
      'light-blue': '#9AD0C2',
      'purple': '#836FFF',
      'turquoise': '#15F5BA',
      'white': '#F0F3FF',
      'caribbean': '#265073',
      'green': '#13ce66',
      'error': '#FB3640',
      'dark-slate-gray': '#28464B',
      'gray-light': '#d3dce6',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {},
  },
  plugins: [],
}

