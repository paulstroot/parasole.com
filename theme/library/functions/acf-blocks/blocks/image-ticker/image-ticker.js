// Parallax configuration variables
const MAX_MOVEMENT = 33; // Maximum horizontal movement as a percent of the width

// Get all carousel items
const carouselItems = document.querySelectorAll('.carousel-item');

// Function to update parallax position for an element
function updateParallax(element) {
	const image = element.querySelector('img');
	if (!image) return;

	// Get element's position relative to viewport
	const rect = element.getBoundingClientRect();
	const elementCenterX = rect.left + rect.width / 2;
	const viewportCenterX = window.innerWidth / 2;

	// Calculate offset from viewport center (normalized to -1 to 1)
	// When element is to the left of viewport center, offset is negative
	// When element is to the right of viewport center, offset is positive
	const offsetFromCenter =
		(elementCenterX - viewportCenterX) / viewportCenterX;

	// Clamp offset between -1 and 1
	const normalizedOffset = Math.max(-1, Math.min(1, offsetFromCenter));
	// Calculate horizontal translation based on horizontal position
	// Multiply by speed and max movement to control effect intensity

	const translateX =
		(MAX_MOVEMENT +
			((normalizedOffset * MAX_MOVEMENT) / 2 - MAX_MOVEMENT / 2)) *
		-1;

	// Apply transform to image
	image.style.transform = `translateX(${translateX}%)`;
}
// Store interval ID for cleanup
let tickerInterval = null;

function setImageSizes() {
	carouselItems.forEach((item) => {
		const inner = item.querySelector('.carousel-item-inner');
		if (inner) {
			inner.style.width = 'calc(100% + ' + MAX_MOVEMENT + '%)';
		}
	});
}

function startTicker() {
	// Only start if not already running
	if (tickerInterval === null) {
		// Update immediately when starting
		updateAllParallax();
		// Then start the interval
		tickerInterval = setInterval(updateAllParallax, 10);
	}
}

function stopTicker() {
	// Clear interval if running
	if (tickerInterval !== null) {
		clearInterval(tickerInterval);
		tickerInterval = null;
	}
}

// Function to update all parallax effects
function updateAllParallax() {
	carouselItems.forEach((item) => {
		updateParallax(item);
	});
}

// Throttle function to limit scroll event frequency
function throttle(func, wait) {
	let timeout;
	return function executedFunction(...args) {
		const later = () => {
			clearTimeout(timeout);
			func(...args);
		};
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
	};
}

// Set up scroll listener with throttling for performance
const throttledUpdate = throttle(updateAllParallax, 10);

// Initialize parallax on load
function init() {
	setImageSizes();

	// Find the carousel container
	const carouselContainer = document.querySelector('.carousel-container');
	if (!carouselContainer) return;

	// Set up Intersection Observer to watch the entire carousel container
	const containerObserverOptions = {
		root: null,
		rootMargin: '100px', // Start/stop animation when container is 100px from viewport
		threshold: 0, // Trigger when any part of container is visible
	};

	const containerObserver = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				// Carousel is visible, start the ticker
				startTicker();
			} else {
				// Carousel is off-screen, stop the ticker
				stopTicker();
			}
		});
	}, containerObserverOptions);

	// Observe the carousel container
	containerObserver.observe(carouselContainer);

	// Also observe individual carousel items for parallax updates
	const itemObserverOptions = {
		root: null,
		rootMargin: '50px',
		threshold: [0, 0.25, 0.5, 0.75, 1],
	};

	const itemObserver = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				updateParallax(entry.target);
			}
		});
	}, itemObserverOptions);

	// Observe all carousel items
	carouselItems.forEach((item) => {
		itemObserver.observe(item);
	});
}

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', init);
} else {
	init();
}
