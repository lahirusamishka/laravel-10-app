const purgecss = require('@fullhuman/postcss-purgecss')({
  content: [
    './resources/js/**/*.html',
    './resources/js/**/*.svelte'
  ],

  whitelistPatterns: [/svelte-/],

  defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || []
});

const production = !process.env.ROLLUP_WATCH

module.exports = {
  plugins: [
    require('tailwindcss'),
    ...(production ? [purgecss] : [])
  ]
};
