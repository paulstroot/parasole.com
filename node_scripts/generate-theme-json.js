#!/usr/bin/env node

const fs = require('fs');
const path = require('path');

function readFileIfExists(filePath) {
	try {
		return fs.readFileSync(filePath, 'utf8');
	} catch {
		return null;
	}
}

function titleCase(slug) {
	return slug
		.replace(/[-_]+/g, ' ')
		.replace(/\s+/g, ' ')
		.trim()
		.replace(/\b\w/g, (m) => m.toUpperCase());
}

function extractRootBlocks(css) {
	// Return concatenated content of all :root { ... } blocks
	const contents = [];
	let idx = 0;
	while (idx < css.length) {
		const start = css.indexOf(':root', idx);
		if (start === -1) break;
		const braceStart = css.indexOf('{', start);
		if (braceStart === -1) break;
		let depth = 0;
		for (let i = braceStart; i < css.length; i++) {
			const ch = css[i];
			if (ch === '{') depth++;
			else if (ch === '}') {
				depth--;
				if (depth === 0) {
					contents.push(css.slice(braceStart + 1, i));
					idx = i + 1;
					break;
				}
			}
		}
		if (depth !== 0) break; // unmatched braces; stop
	}
	return contents.join('\n');
}

function parseCssVariables(css) {
	const map = {};
	const block = extractRootBlocks(css);
	// Remove comments
	const clean = block.replace(/\/\*[\s\S]*?\*\//g, '');
	const re = /--([a-z0-9\-_]+)\s*:\s*([^;]+);/gi;
	let m;
	while ((m = re.exec(clean))) {
		const key = m[1].trim();
		const val = m[2].trim();
		map[key] = val;
	}
	return map;
}

function buildColorPalette(vars) {
	const colors = Object.entries(vars)
		.filter(([k]) => k.startsWith('color-'))
		.map(([k, v]) => {
			const slug = k.replace(/^color-/, '');
			return { slug, name: titleCase(slug), color: v };
		});
	// Ensure uniqueness by slug (last one wins)
	const bySlug = new Map();
	for (const c of colors) bySlug.set(c.slug, c);
	return Array.from(bySlug.values());
}

function buildFontFamilies(vars) {
	const fontKeys = Object.entries(vars).filter(([k]) =>
		k.startsWith('font-')
	);
	const families = fontKeys.map(([k, v]) => {
		const slug = k.replace(/^font-/, '');
		// Preserve quotes as-is
		const fontFamily = v.replace(/;$/, '').trim();
		return { slug, name: titleCase(slug), fontFamily };
	});
	// Deduplicate by fontFamily value
	const byFamily = new Map();
	for (const f of families) byFamily.set(f.fontFamily, f);
	return Array.from(byFamily.values());
}

function buildFontSizes(vars) {
	const sizes = Object.entries(vars)
		.filter(([k]) => k.startsWith('text-'))
		.map(([k, v]) => {
			const slug = k.replace(/^text-/, '');
			return { slug, name: slug, size: v };
		})
		.sort((a, b) => a.slug.localeCompare(b.slug));
	return sizes;
}

function toCamelCase(slug) {
	return slug.replace(/-([a-z])/g, (_, c) => c.toUpperCase());
}

function buildLayout(vars) {
	const layout = {};
	for (const [k, v] of Object.entries(vars)) {
		if (k.startsWith('layout-')) {
			const key = toCamelCase(k.replace(/^layout-/, ''));
			layout[key] = v;
		}
	}
	return layout;
}

function pick(obj, keys) {
	const out = {};
	for (const k of keys) if (obj[k] !== undefined) out[k] = obj[k];
	return out;
}

function resolveCssVar(value, vars) {
	// Resolve CSS variable references like var(--color-light)
	if (typeof value !== 'string') return value;
	const varMatch = value.match(/var\(--([a-z0-9\-_]+)\)/i);
	if (varMatch) {
		const varName = varMatch[1];
		const resolved =
			vars[varName] ||
			vars[varName.replace(/_/g, '-')] ||
			vars[varName.replace(/-/g, '_')];
		if (resolved) {
			return resolveCssVar(resolved, vars); // Recursively resolve
		}
	}
	return value;
}

function convertRemToPx(value) {
	// Convert 0rem to 0px for border radius
	if (typeof value === 'string' && value.trim() === '0rem') {
		return '0px';
	}
	return value;
}

function buildButtonStyles(vars) {
	const buttonStyles = {};

	// Typography
	if (vars['button-default-font-size']) {
		buttonStyles.typography = {
			fontSize: vars['button-default-font-size'],
		};
	}

	// Color
	const btnTextColor = resolveCssVar(vars['btn-color-text'], vars);
	const btnBg = resolveCssVar(vars['btn-color'], vars);
	const btnBorderColor = resolveCssVar(vars['btn-color-border'], vars);

	if (btnTextColor || btnBg) {
		buttonStyles.color = {};
		if (btnBg) buttonStyles.color.background = btnBg;
		if (btnTextColor) buttonStyles.color.text = btnTextColor;
	}

	// Border
	const radius = vars['radius-field'];
	const borderWidth = vars['border'];

	if (radius !== undefined || borderWidth !== undefined || btnBorderColor) {
		buttonStyles.border = {};
		if (radius !== undefined) {
			buttonStyles.border.radius = convertRemToPx(radius);
		}
		if (borderWidth !== undefined) {
			buttonStyles.border.width = borderWidth;
		}
		if (btnBorderColor) {
			buttonStyles.border.color = btnBorderColor;
			buttonStyles.border.style = 'solid';
		}
	}

	// Spacing (padding)
	const paddingX = vars['button-padding-x'];
	const paddingY = vars['button-padding-y'];

	if (paddingX || paddingY) {
		buttonStyles.spacing = {
			padding: {},
		};
		if (paddingX) {
			buttonStyles.spacing.padding.left = paddingX;
			buttonStyles.spacing.padding.right = paddingX;
		}
		if (paddingY) {
			buttonStyles.spacing.padding.top = paddingY;
			buttonStyles.spacing.padding.bottom = paddingY;
		}
	}

	// Hover styles
	const hoverTextColor = resolveCssVar(vars['btn-color-hover'], vars);
	const hoverBg = resolveCssVar(vars['btn-bg-hover'], vars);
	const hoverBorderColor = resolveCssVar(
		vars['btn-color-border-hover'],
		vars
	);

	if (hoverTextColor || hoverBg || hoverBorderColor) {
		buttonStyles[':hover'] = {};

		if (hoverTextColor || hoverBg) {
			buttonStyles[':hover'].color = {};
			if (hoverBg) buttonStyles[':hover'].color.background = hoverBg;
			if (hoverTextColor)
				buttonStyles[':hover'].color.text = hoverTextColor;
		}

		// Update border color on hover
		if (hoverBorderColor && buttonStyles.border) {
			buttonStyles[':hover'].border = {
				color: hoverBorderColor,
			};
		}
	}

	return Object.keys(buttonStyles).length > 0 ? buttonStyles : null;
}

function buildCustom(vars) {
	// Put non-WP-schema tokens safely under settings.custom
	const custom = {};

	const spacing = Object.fromEntries(
		Object.entries(vars).filter(([k]) => k.startsWith('spacing-'))
	);
	if (Object.keys(spacing).length) custom.spacing = spacing;

	const breakpoints = Object.fromEntries(
		Object.entries(vars).filter(([k]) => k.startsWith('breakpoint-'))
	);
	if (Object.keys(breakpoints).length) custom.breakpoints = breakpoints;

	const radii = Object.fromEntries(
		Object.entries(vars).filter(([k]) => k.startsWith('radius-'))
	);
	if (Object.keys(radii).length) custom.radii = radii;

	const button = pick(vars, ['border']);
	if (Object.keys(button).length) custom.button = button;

	const other = Object.fromEntries(
		Object.entries(vars).filter(
			([k]) =>
				!k.startsWith('color-') &&
				!k.startsWith('font-') &&
				!k.startsWith('text-') &&
				!k.startsWith('spacing-') &&
				!k.startsWith('breakpoint-') &&
				!k.startsWith('radius-') &&
				!k.startsWith('layout-') &&
				!k.startsWith('button-') &&
				!k.startsWith('btn-') &&
				!['border', 'radius-field'].includes(k)
		)
	);
	if (Object.keys(other).length) custom.other = other;

	return custom;
}

function mergeDeep(target, source) {
	if (typeof target !== 'object' || target === null) return source;
	if (typeof source !== 'object' || source === null) return source;
	const out = Array.isArray(target) ? [...target] : { ...target };
	for (const [k, v] of Object.entries(source)) {
		if (Array.isArray(v)) {
			out[k] = v; // replace arrays
		} else if (typeof v === 'object' && v !== null) {
			out[k] = mergeDeep(out[k] || {}, v);
		} else {
			out[k] = v;
		}
	}
	return out;
}

function main() {
	// CLI args
	const argv = process.argv.slice(2);
	const arg = (name, defVal) => {
		const idx = argv.findIndex(
			(a) => a === name || a.startsWith(name + '=')
		);
		if (idx === -1) return defVal;
		const val = argv[idx].includes('=')
			? argv[idx].split('=')[1]
			: argv[idx + 1];
		return val ?? defVal;
	};

	// Default paths assume this script is in node_scripts/ and theme.json is in theme/
	const root = path.resolve(__dirname, '..');
	const cssPath = path.resolve(root, 'tailwind', 'theme', 'theme.css');
	const jsonPath = path.resolve(root, 'theme', 'theme.json');

	const inputCss = arg('--in', cssPath);
	const outputJson = arg('--out', jsonPath);

	const cssContent = readFileIfExists(inputCss);
	if (!cssContent) {
		console.error(`ERROR: Could not read CSS file: ${inputCss}`);
		process.exit(1);
	}

	const existingJsonStr = readFileIfExists(outputJson);
	let existing = {};
	if (existingJsonStr) {
		try {
			existing = JSON.parse(existingJsonStr);
		} catch (e) {
			console.warn(
				`WARN: Existing theme.json is invalid JSON at ${outputJson}. Starting fresh.`
			);
		}
	}

	const vars = parseCssVariables(cssContent);

	// Build schema parts
	const palette = buildColorPalette(vars);
	const fontFamilies = buildFontFamilies(vars);
	const fontSizes = buildFontSizes(vars);
	const layout = buildLayout(vars);
	const custom = buildCustom(vars);
	const buttonStyles = buildButtonStyles(vars);

	// Start with existing, ensure version and settings
	let next = mergeDeep({ version: 2, settings: {} }, existing || {});

	// Ensure styles structure exists
	if (!next.styles) next.styles = {};
	if (!next.styles.elements) next.styles.elements = {};

	// Apply layout from variables (merge with existing if present)
	if (Object.keys(layout).length) {
		next.settings.layout = {
			...(next.settings.layout || {}),
			...layout,
		};
	}

	// Apply colors
	next.settings.color = next.settings.color || {};
	if (palette.length) next.settings.color.palette = palette;

	// Apply typography
	next.settings.typography = next.settings.typography || {};
	if (fontFamilies.length)
		next.settings.typography.fontFamilies = fontFamilies;
	if (fontSizes.length) next.settings.typography.fontSizes = fontSizes;

	// Add custom tokens
	if (Object.keys(custom).length) {
		next.settings.custom = mergeDeep(next.settings.custom || {}, custom);
	}

	// Apply button styles from CSS variables
	if (buttonStyles) {
		next.styles.elements.button = mergeDeep(
			next.styles.elements.button || {},
			buttonStyles
		);
	}

	// Optionally merge static theme fragments (lower precedence than generated)
	const staticPath = path.resolve(root, 'node_scripts', 'theme_static.json');
	const staticStr = readFileIfExists(staticPath);
	if (staticStr) {
		try {
			const staticJson = JSON.parse(staticStr);
			// Merge so that generated values in `next` take precedence
			next = mergeDeep(staticJson || {}, next);
		} catch (e) {
			console.warn(
				`WARN: theme_static.json is invalid JSON at ${staticPath}. Skipping.`
			);
		}
	}

	// Write out
	const output = JSON.stringify(next, null, 2);
	fs.writeFileSync(outputJson, output, 'utf8');
	console.log(`Wrote ${outputJson}`);
}

if (require.main === module) {
	main();
}
