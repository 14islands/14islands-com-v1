/**
 * Applications page Hero Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-applications-hero">...</div>
 *
 */

/* global components, componentLoader */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * ApplicationsHero Component
	 */
	components.ApplicationsHero = function (context) {

		// public api object
		var api = {},
		    $scrollBody;

		function scrollTo(y) {
			$scrollBody.animate({
				scrollTop: y
			}, 200);
		}

		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			$scrollBody = $('html, body');

			$('.apps-hero__list a', context).click(function (e) {
				// Commented out in order to link directly to pages
				e.preventDefault();

				var $link, selector, $section;
				$link = $(e.currentTarget);
				selector = $link.attr('href');
				$section = $(selector);

				scrollTo($section.offset().top);
			});

		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('applications-hero', components.ApplicationsHero);


}(jQuery));

