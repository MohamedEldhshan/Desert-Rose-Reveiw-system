/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          gold: '#C9982E',
          'gold-dark': '#A67C24',
          cream: '#F8F2E7',
          beige: '#EADFCF',
          overlay: '#3A2418',
          ink: '#1F2A44',
          muted: '#6B5E52',
        },
      },
      fontFamily: {
        display: ['Georgia', 'Cambria', 'Times New Roman', 'serif'],
        sans: ['Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif'],
      },
      boxShadow: {
        card: '0 4px 24px -4px rgba(58, 36, 24, 0.12)',
        elevated: '0 12px 40px -12px rgba(58, 36, 24, 0.18)',
      },
    },
  },
  plugins: [],
};
