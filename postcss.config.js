/* eslint-env node */
const tailwindcss = require('@tailwindcss/postcss');
const clampwind = require('postcss-clampwind');

module.exports = {
	plugins: [
		require('postcss-import-ext-glob'),
		require('postcss-import'),
		tailwindcss(),
		require('autoprefixer'),
		(clampwind.default ? clampwind.default : clampwind)(),
	],
};
