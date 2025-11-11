const MAX_PARALLAX_MARGIN = 200;
const MIN_CONTAINER_WIDTH_REM = 42;

const initTextWithImageParallax = () => {
	const imageContainers = document.querySelectorAll(
		'.text-with-image .image-container'
	);

	if (!imageContainers.length) {
		return;
	}

	const containerMap = Array.from(imageContainers).map((element) => ({
		element,
		parentContainer: element.closest('[class~="@container"]'),
	}));

	const updateMargin = () => {
		const viewportHeight =
			window.innerHeight || document.documentElement.clientHeight;
		const fallbackWidth =
			window.innerWidth || document.documentElement.clientWidth;
		const rootFontSize = parseFloat(
			getComputedStyle(document.documentElement).fontSize || '16'
		);
		const minWidthPx = MIN_CONTAINER_WIDTH_REM * rootFontSize;

		containerMap.forEach(({ element, parentContainer }) => {
			const referenceWidth = parentContainer
				? parentContainer.getBoundingClientRect().width
				: fallbackWidth;

			if (referenceWidth < minWidthPx) {
				element.style.marginTop = '';
				return;
			}

			const rect = element.getBoundingClientRect();
			const totalDistance = viewportHeight + rect.height;
			if (totalDistance === 0) {
				return;
			}

			const progress = (viewportHeight - rect.top) / totalDistance;
			const clampedProgress = Math.min(Math.max(progress, 0), 1);
			const marginValue = clampedProgress * MAX_PARALLAX_MARGIN;

			element.style.marginTop = `${marginValue}px`;
		});
	};

	let ticking = false;

	const requestUpdate = () => {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(() => {
				updateMargin();
				ticking = false;
			});
		}
	};

	window.addEventListener('scroll', requestUpdate, { passive: true });
	window.addEventListener('resize', requestUpdate);

	updateMargin();
};

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initTextWithImageParallax);
} else {
	initTextWithImageParallax();
}

function MM_jumpMenu(targ, selObj, restore) {
	var target = targ ? targ : '_blank';
	var url = selObj.options[selObj.selectedIndex].value;
	if (!url) return;

	window.open(selObj.options[selObj.selectedIndex].value, target);
	if (restore) selObj.selectedIndex = 0;
}
