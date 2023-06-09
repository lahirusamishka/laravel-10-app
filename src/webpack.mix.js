const cssImport = require("postcss-import");
const cssNesting = require("postcss-nesting");
const mix = require("laravel-mix");
const path = require("path");
const purgecss = require("@fullhuman/postcss-purgecss");
const tailwindcss = require("tailwindcss");
const sveltePreprocess = require("svelte-preprocess");
require("laravel-mix-svelte");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
	.js("resources/js/app.js", "public/js")
	.postCss("resources/css/app.css", "public/css/app.css")
	.svelte({
		dev: !mix.inProduction(),
		preprocess: sveltePreprocess({ postcss: true })
	})
	.options({
		hmrOptions: {
			host: "/" // site's host name
		},
		postCss: [
			cssImport(),
			cssNesting(),
			tailwindcss("tailwind.config.js"),
			...(mix.inProduction()
				? [
						purgecss({
							content: [
								"./resources/views/**/*.blade.php",
								"./resources/js/**/*.svelte"
							],
							defaultExtractor: content =>
								content.match(/[\w-/:.]+(?<!:)/g) || [],
							whitelistPatternsChildren: [/nprogress/]
						})
				  ]
				: [])
		]
	})
	.webpackConfig({
		output: { chunkFilename: "js/[name].js?id=[chunkhash]" },
		resolve: {
			alias: {
				"@": path.resolve("resources/js")
			}
		}
	})
	.version()
	.sourceMaps();
