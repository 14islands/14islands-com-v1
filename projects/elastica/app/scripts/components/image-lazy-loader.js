/**
 * Breakpoint Loader Component
 *
 * This component will load content based on the viewport size.
 *
 * Example markup:
 * <img class="community__image community__image--secondary js-component-image-lazy-loader" data-src="<?php echo $third_url_2; ?>" alt="<?php echo $third_alt_2; ?>" />
 *
 * If you wish to sue scrollMonitor, make sure you have a data-offset set to 0.
 *
 * @method
 * init()
 * - Initializes the header component
 *
 * @method
 * render()
 * - Called when component is visible - if hidden while instanciating
 *
 */

/* global components, componentLoader, scrollMonitor, Modernizr */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * Dashboard Component
	 */
	components.ImageLazyLoader = function (context) {

		// public api object
		var api = {};
		var $context = $(context);
		var watcher = null;

		/**
		 * Gets the source based on the context data attribute.
		 * @return {String} src for the img tag
		 */
		function getImgSrc() {
			return $context.data('src') || '';
		}

		/**
		 * Callback for when the context enters the viewport.
		 */
		function onEnterViewport() {
			loadImg();
			watcher.destroy();
		}

		/**
		 * Loads the image by settings it's source.
		 */
		function loadImg() {
			$context.attr('src', getImgSrc());
		}

		/**
		 * Initializes the component - Called by ComponentLoader for each instance found on page.
		 *
		 **/
		api.init = function () {
			var offset = $context.data('offset');

			// load them immediately for touch devices
			if (Modernizr.touch || navigator.msMaxTouchPoints) {
				$(window).load(function() {
					loadImg();
				});
				return;
			}

			if (typeof offset !== 'undefined' && typeof scrollMonitor === 'object') {

				watcher = scrollMonitor.create( context, offset );
				watcher.enterViewport( onEnterViewport );

			} else {
				$(window).load(function() {
					loadImg();
				});
			}

		};

		/**
		 * Function called by the component loader when it's time to render
		 *  - only called if component was :visible
		 * This function is not called if component is display:none - for instance hidden in an inactive tab-controller.
		 * Call ComponentLoader.notifyAll() to trigger all hidden components to render when visibility changes.
		 **/
		api.render = function () {
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component
	 */
	componentLoader.register('image-lazy-loader', components.ImageLazyLoader);


}(jQuery));