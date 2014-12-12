/**
 * Store overlay
 */
(function($) {
	'use strict';

	var $body = $('body'),
	    $menu = $('#storeModal'),
	    isMenuActive = false,
	    CSS_MODAL_CLASS = 'store-modal--open';


	function toggleMenu(e) {
		e.preventDefault();

		if (isMenuActive) {
			$body.removeClass(CSS_MODAL_CLASS);
			onTransitionEnd($menu, hideMenu, 300);
		} else {
			showMenu();
		}
	}

	function showMenu() {
		// need to prepare the menu first
		$menu.css('display', 'block');

		// easy tiger, wait for it.
		setTimeout(function() {
			isMenuActive = true;
			$body.addClass( CSS_MODAL_CLASS );
		}, 100);
	}

	function hideMenu() {
		isMenuActive = false;
		$menu.css('display', 'none');
	}

	function onTransitionEnd($el, callback, fallbackDuration) {
		if ($.support.transition && $.support.transition.end) {
			$el.one($.support.transition.end, callback).emulateTransitionEnd(fallbackDuration);
		}
		else {
			setTimeout(callback, fallbackDuration);
		}
	}

	function init() {

		// Add attribute to all tiles
		$('.store-section .tile').attr('store-overlay-toggle', '');

		$('[store-overlay-toggle]').click(toggleMenu);

	}

	init();

})(jQuery);
