/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'brand-teal': '#167070',
        'brand-teal-dark': '#0f5050',
        'brand-orange': '#fe6625',
        'brand-orange-light': '#fb9335',
        'brand-white': '#ffffff',
        'brand-beige': '#c19f7a',
        'brand-navy': '#013f59',
        'brand-light-green': '#a7f3d0',
        'primary-teal': '#167070',
        'primary-teal-dark': '#0f5050',
        'sidebar-bg': '#167070',
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}