/**
 * Company page Team carousel Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-company-team">...</div>
 *
 */

/* global components, componentLoader, Modernizr */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * CompanyTeam Component
	 */
	components.CompanyTeam = function (context) {

		// public api object
		var api = {};


		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {

			// figure out what margin the carousel should have
			var margin = parseInt( $('.section-padding').css('paddingLeft'), 10) || 0;

			var peekPercentage = 0.2;
			if (Modernizr.mq('(min-width : 480px)')) {
				peekPercentage = 0.1; // show less of next image on larger screens
			}

			$('.company-team', context).owlCarousel({
				items: 3,
				itemsDesktop: false,

				scrollPerPage: true,
				navigation: true,
				navigationText: false,
				rewindNav: false,
				paginationSpeed: 400,
				slideSpeed: 400,
				peekPercentage: peekPercentage,
				margin: margin, // need to be modified by matchmedia
				peekSpeed: 600
			});


			/*var $owl =*/
			$('.company-image-carousel', context).owlCarousel({
				items: 1,
				itemsDesktop: false,
				itemsDesktopSmall: false,
				itemsTablet: false,

				scrollPerPage: true,
				navigation: true,
				navigationText: false,
				rewindNav: false,
				paginationSpeed: 400,
				slideSpeed: 400,
				peekPercentage: 0,
				margin: 0, // need to be modified by matchmedia
				peekSpeed: 600
			});

			//get carousel instance data and store it in variable owl
			// var owl = $owl.data('owlCarousel');
			// var middleItem = Math.ceil(Math.max(1, owl.itemsAmount)/2)-1;
			// owl.jumpTo(middleItem);  // Go to x slide without slide animation

		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('company-team', components.CompanyTeam);


}(jQuery));

