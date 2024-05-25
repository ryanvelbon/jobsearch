const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')
import preset from './vendor/filament/support/tailwind.config.preset'

module.exports = {
    theme: {
        extend: {
            colors: {
                primary: colors.purple,
                secondary: colors.green,
                gray: colors.stone,
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
                '160': '40rem',
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    presets: [preset],
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        './vendor/filament/**/*.blade.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
