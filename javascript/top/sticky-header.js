/** Move fixedheader on/off screen based on scroll  */
var prevScrollpos = -1;
var scrollThreshhold = 15; /* how quickly to scroll for the header to react to a change */

window.onscroll = function () {
	checkScrollPosition();
};

function checkScrollPosition() {
	var currentScrollPos = window.pageYOffset;
	var diff = prevScrollpos - currentScrollPos;

	// add 'scrolled' class to the body if the page is scrolled at all

	if (currentScrollPos <= 0) {
		if (document.body.classList.contains('scrolled')) {
			document.body.classList.remove('scrolled');
		}
	} else if (currentScrollPos > 156) {
		if (!document.body.classList.contains('scrolled')) {
			document.body.classList.add('scrolled');
		}
	}

	// add 'scrolling-down' class to the body if the user has recently scrolled down, but remove it if the user scrolls back up
	if (prevScrollpos < 0 || currentScrollPos <= 0 || diff > scrollThreshhold) {
		if (document.body.classList.contains('scrolling-down')) {
			document.body.classList.remove('scrolling-down');
		}
	} else if (diff < scrollThreshhold * -1) {
		if (!document.body.classList.contains('scrolling-down')) {
			document.body.classList.add('scrolling-down');

			var navWrapper = document.getElementsByClassName('nav-wrapper')[0];
			var toggleBtn = document.querySelector('#mobile-menu-toggle');
			navWrapper.classList.remove('open');
			toggleBtn.ariaExpanded = 'false';
		}
	}

	prevScrollpos = currentScrollPos;
}
