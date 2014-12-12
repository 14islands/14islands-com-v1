/**
 * The one and only floating/modal menu on every page.
 *
 * This file is also copied and used in the Wordpress theme.
 */

/* global Modernizr */

(function($) {
	'use strict';

	var docElem = document.documentElement,
	    $body = $('body'),
	    $header = $('.header-container'),
	    $menu = $('#menuModal'),
	    didScroll = false,
	    isFloating = false,
	    isMenuActive = false,
	    oldY = 0,
	    useFixedLimit = $('.section--first').outerHeight() || 400,
	    CSS_MODAL_CLASS = 'menu-modal--open',
	    CSS_INVERTED_COLOR_CLASS = 'header-container--inverted',
	    CSS_FIXED_CLASS = 'header-container--fixed',
	    CSS_ANIMATE_IN_CLASS = 'header-container--animate-in',
	    CSS_ANIMATE_OUT_CLASS = 'header-container--animate-out',
	    ACTIVE_BREAKPOINT = '(max-width : 1200px)';


	function toggleMenu(e) {
		e.preventDefault();
		$(document).off('keyup', onKeyUp);

		if (isMenuActive) {
			$body.removeClass(CSS_MODAL_CLASS);
			onTransitionEnd($menu, hideMenu, 300);
		} else {
			showMenu();
		}
	}

	function onKeyUp(e) {
		// Escape key
		if (e.keyCode === 27) {
			toggleMenu(e);
		}
	}

	function showMenu() {
		// need to prepare the menu first
		$menu.css('display', 'block');

		// easy tiger, wait for it.
		setTimeout(function() {
			isMenuActive = true;
			$body.addClass( CSS_MODAL_CLASS );
			$(document).on('keyup', onKeyUp);
		}, 100);
	}

	function hideMenu() {
		isMenuActive = false;
		$menu.css('display', 'none');
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	function onTransitionEnd($el, callback, fallbackDuration) {
		if ($.support.transition && $.support.transition.end) {
			$el.one($.support.transition.end, callback).emulateTransitionEnd(fallbackDuration);
		}
		else {
			setTimeout(callback, fallbackDuration);
		}
	}

	function scrollPage() {
		var sy = scrollY();

		if (sy > oldY && isFloating) {  // scrolling down - hide floating header
			$header.removeClass(CSS_ANIMATE_IN_CLASS);
			$header.addClass(CSS_ANIMATE_OUT_CLASS);
			isFloating = false;

			onTransitionEnd($header, function () {
				if (!isFloating) {
					$header.removeClass(CSS_INVERTED_COLOR_CLASS);
					$header.removeClass(CSS_FIXED_CLASS);
					$header.removeClass(CSS_ANIMATE_OUT_CLASS);
				}
			}, 500);

		}
		else if (sy < oldY && sy <= 0) { // scrolling up - reached top - hide floating header
			$header.removeClass(CSS_INVERTED_COLOR_CLASS);
			$header.removeClass(CSS_ANIMATE_IN_CLASS);
			$header.removeClass(CSS_ANIMATE_OUT_CLASS);
			$header.removeClass(CSS_FIXED_CLASS);
			isFloating = false;
		}
		else if (!isFloating && sy < oldY && sy > useFixedLimit) { // scroll up - show floating header if below first section
			$header.removeClass(CSS_ANIMATE_OUT_CLASS);
			$header.addClass(CSS_INVERTED_COLOR_CLASS);
			$header.addClass(CSS_ANIMATE_IN_CLASS);
			$header.addClass(CSS_FIXED_CLASS);
			isFloating = true;
		}
		else if (sy < oldY && sy <= useFixedLimit) { // scrolling up over first section - change color
			$header.removeClass(CSS_INVERTED_COLOR_CLASS);
		}

		oldY = sy;
		didScroll = false;
	}

	function initFloatingHeader() {
		oldY = scrollY();
		$(window).on('scroll', function() {
			if(!didScroll) {
				didScroll = true;
				setTimeout(scrollPage, 250);
			}
		});
	}

	function init() {
		$('[data-menu-toggle]').click(toggleMenu);

		// only use on narrow monitors
		if (Modernizr.mq(ACTIVE_BREAKPOINT)) {
			initFloatingHeader();
		}
	}


	init();

})(jQuery);
