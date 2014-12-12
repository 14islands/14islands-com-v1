/**
 * Company page Team carousel Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-big-carousel">...</div>
 *
 */

/* global components, componentLoader */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * BigCarousel Component
	 */
	components.BigCarousel = function (context) {

		// public api object
		var api = {};


		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {

			$('.owl-carousel', context).owlCarousel({
				items: 1,
				itemsDesktop: false,
				itemsDesktopSmall: false,
				itemsTablet: false,
				scrollPerPage: true,
				navigation: true,
				navigationText: false,
				rewindNav: false, // needed for continuous auto-play
				slideSpeed: 400,
        //autoPlay: 20000,
				addClassActive: true,
				peekPercentage: 0.3,
				peekSpeed: 600
			});

			// Jump to middle slide for platform page carousel
			// var owlPlatform = $('.owl-carousel.owl-carousel-platform').data('owlCarousel');

			// // load middle slide
			// var middleItem = Math.ceil(Math.max(1, owlPlatform.itemsAmount)/2)-1;
			// owlPlatform.jumpTo(middleItem);
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('big-carousel', components.BigCarousel);


}(jQuery));

