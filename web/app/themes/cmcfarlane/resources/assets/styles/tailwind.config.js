/*
|-------------------------------------------------------------------------------
| Tailwind – The Utility-First CSS Framework
|-------------------------------------------------------------------------------
|
| Documentation at https://tailwindcss.com
|
*/

/**
 * Global Styles Plugin
 *
 * This plugin modifies Tailwind’s base styles using values from the theme.
 * https://tailwindcss.com/docs/adding-base-styles#using-a-plugin
 */
const globalStyles = ({ addBase, config }) => {
  addBase({
    a: {
      color: config('theme.colors.cream.light'),
      textDecoration: 'none',
      borderBottom: '1px solid transparent',
      transition: '0.2s ease',
    },
    'a:hover': {
      borderColor: config('theme.borderColor.primary'),
    },
    p: {
      marginBottom: config('theme.margin.3'),
      lineHeight: config('theme.lineHeight.normal'),
    },
    'h1, h2, h3, h4, h5': {
      marginBottom: config('theme.margin.2'),
      lineHeight: config('theme.lineHeight.tight'),
    },
    h1: { fontSize: config('theme.fontSize.5xl') },
    h2: { fontSize: config('theme.fontSize.4xl') },
    h3: { fontSize: config('theme.fontSize.3xl') },
    h4: { fontSize: config('theme.fontSize.2xl') },
    h5: { fontSize: config('theme.fontSize.xl') },
    'ol, ul': { paddingLeft: config('theme.padding.4') },
    ol: { listStyleType: 'decimal' },
    ul: { listStyleType: 'disc' },
    body: {
      backgroundColor: config('theme.backgroundColor.blue.DEFAULT'),
      // marginTop: '5rem',
      // marginBottom: '5rem'
    },

  });
}

/**
 * Configuration
 */
module.exports = {
  theme: {
    colors: {
      primary: '#525ddc',
      white: '#fff',
      gray: {
        100: '#f7fafc',
        200: '#edf2f7',
        300: '#e2e8f0',
        400: '#cbd5e0',
        500: '#a0aec0',
        600: '#718096',
        700: '#4a5568',
        800: '#2d3748',
        900: '#1a202c',
      },
      blue: {
        dark: 'hsl(209, 100%, 13%)',
        DEFAULT: 'hsl(209, 100%, 19%)',
        light: 'hsl(196, 100%, 34%)',
        lighter: 'hsl(191, 93%, 40%)',
        lightest: 'hsl(191, 100%, 48%)',
      },
      charcoalBlack: {
        DEFAULT: 'hsl(0, 0%, 3%)',
      },
      cream: {
          DEFAULT: 'hsl(63, 63%, 90%)',
          light: 'hsl(44, 79%, 91%)',
          dark: 'hsl(63, 63%, 84%)',
          darker: 'hsl(63, 63%, 80%)',
      },
    transparent: 'transparent',
    },
    container: {
      center: true,
      padding: '1rem',
    },
    extend: {
      fontFamily: {
        'montserrat': ['Montserrat', 'sans-serif'],
        'poppins': ['Poppins', 'sans-serif'],
        'pt-mono': ['PT Mono', 'monospace'],
        'teko': ['Teko', 'sans-serif'],
      },
      height: {
        'body-full-screen': 'calc(var(--full-screen-height) - 10rem)'
      },
      maxWidth: {
        '7xl': '96rem',
      },
      screens: {
        'xs': {'max': '639px'}
      },
    },
  },
  variants: {
    // Define variants
  },
  plugins: [
    globalStyles,
  ],
}
