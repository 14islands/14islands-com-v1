/**
 * Generic AnimateOnScroll Component
 *
 * Adds the .run CSS class whenever the element is in view
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-animate-on-scroll">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * AnimateOnScroll Component
	 */
	components.AnimateOnScroll = function (context) {

		// public api object
		var api = {},
				scrollWatcher,
				$el = $(context),
				resetWhenAbove = $el.data('animation-reset-when-above'),
				scrollOffset = $el.data('animation-scroll-offset');

		function initScrollWatcher() {
			scrollWatcher = scrollMonitor.create(context, scrollOffset);

			scrollWatcher.fullyEnterViewport(function() {
				$el.addClass('run');
			});

			scrollWatcher.exitViewport(function() {
				if (!ELASTICA.REPLAY_ANIMATIONS) {
					return;
				}

				if (resetWhenAbove && scrollWatcher.isAboveViewport) {
					$el.removeClass('run');
				}
				else if (scrollWatcher.isBelowViewport) {
					$el.removeClass('run');
				}
			});

		}

		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			$(document).ready(initScrollWatcher);
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('animate-on-scroll', components.AnimateOnScroll);


}(jQuery));

