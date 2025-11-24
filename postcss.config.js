/* eslint-env node */
const clampwind = require('postcss-clampwind');

module.exports = {
	plugins: [
		require('postcss-import-ext-glob'),
		require('postcss-import'),
		require('@tailwindcss/postcss'),
		require('autoprefixer'),
		(clampwind.default ? clampwind.default : clampwind)(),
	],
};
