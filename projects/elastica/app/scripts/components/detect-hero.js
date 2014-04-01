/**
 * Detect page Hero Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-detect-hero">...</div>
 *
 */

/* global components, componentLoader, requestAnimationFrame, scrollMonitor, Modernizr */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * DetectHero Component
	 */
	components.DetectHero = function (context) {

		// public api object
		var api = {},
				scrollWatcher,
				$el               = $(context),
				$cover            = $el.find('.component-detect-hero__cover'),
				$coverContent     = $el.find('.component-detect-hero__cover__rel__content'),
				$slider           = $el.find('.component-detect-hero__slider'),
				scrollOffset      = $el.data('animation-scroll-offset') || 0,
				transformProp     = Modernizr.prefixed('transform'),
				lastScrollY       = 0,
				lastDelta         = 0,
				ticking           = false,
				dragging          = false,
				lastMousePosition = { x: 0, y: 0 },
				startPercentage   = 50; // percentage from right

		// add temporary transition on slider until it stops
		function oneTransition() {
			if (!$.support.transition) {
				return;
			}

			$el.addClass('component-detect-hero--transition');
			$el.one($.support.transition.end, function () {
				$el.removeClass('component-detect-hero--transition');
			}).emulateTransitionEnd(2000);
		}

		function onScrollDisable(e) {
			e.preventDefault();
		}

		function onMouseDown() {
			dragging = true;
			$el.on(window.touchEvent.move, onMouseMove);
			$el.addClass('js-mouse-down');
			$(document).on('touchmove', onScrollDisable);
		}

		function onMouseUp() {
			dragging = false;
			$el.off('mousemove', onMouseMove);
			$(document).off('touchmove', onScrollDisable);

			// remove transition for normal scrolling
			$el.removeClass('js-mouse-down');
			oneTransition();
		}

		function onMouseMove(evt) {
			if (evt.originalEvent.touches) {
				evt = evt.originalEvent.touches[0];
			}
			else {
				evt = evt.originalEvent;
			}

			lastMousePosition.x = evt.clientX;
			lastMousePosition.y = evt.clientY;
			requestTick();
		}

		function neverDragged() {
			return lastMousePosition.x === 0;
		}
		/**
		 * Callback for our scroll event - just
		 * keeps track of the last scroll value
		 */
		function onScroll() {
			lastScrollY = $(window).scrollTop();
			requestTick();
		}

		/**
		 * Calls rAF if it's not already
		 * been done already
		 */
		function requestTick() {
			if(!ticking) {
				requestAnimationFrame(update);
				ticking = true;
			}
		}

		function moveCover(percentage) {
			if (Modernizr.csstransforms3d) {
				$cover.css(transformProp, 'translate3d(-' + percentage + '%, 0, 0)');
				$coverContent.css(transformProp, 'translate3d(' + percentage + '%, 0, 0)');
			}
			else {
				$cover.css(transformProp, 'translateX(-' + percentage + '%)');
				$coverContent.css(transformProp, 'translateX(' + percentage + '%)');
			}
		}

		/**
		 * Our animation callback
		 */
		function update() {
			var cTop                = $el.offset().top,
					cHeight             = $el.outerHeight(),
					p                   = 0,
					distanceToScroll    = cHeight * 0.66, // how far to scroll before animation is completed
					delta = Math.min(1, (lastScrollY - cTop + scrollOffset) / distanceToScroll);

			if (dragging) {
				var w = $el.outerWidth();
				var x = $el.offset().left + w - lastMousePosition.x;
				p = Math.max(5, Math.min(90, x / w * 100));

				moveCover(p);
			}
			else if (Modernizr.touch) {
				moveCover(startPercentage);
			}
			// never dragged and new scroll delta to show
			else if (neverDragged() && delta !== lastDelta) {

				p = startPercentage + (delta*(100-startPercentage));
				p = Math.min(90, Math.max(0, p)); // no negative position

				moveCover(p);

				lastDelta = delta;
			}

			// allow further rAFs to be called
			ticking = false;
		}

		function enable() {
			$(window).on('scroll', onScroll);
		}

		function disable() {
			$(window).on('scroll', onScroll);
		}

		function initScrollWatcher() {
			scrollWatcher = scrollMonitor.create(context);
			scrollWatcher.enterViewport(function() {
				enable();
			});
			scrollWatcher.exitViewport(function() {
				disable();
			});
		}

		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			$slider.on(window.touchEvent.start, onMouseDown);
			$(document).on(window.touchEvent.end, onMouseUp);

			// don't update on scroll on touch devices
			if (!Modernizr.touch) {
				initScrollWatcher();
			}

			// wait .5s after page load before initial slide
			$(document).ready(function () {
				setTimeout(function () {
					oneTransition();
					update();
				}, 500);
			});

		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('detect-hero', components.DetectHero);


}(jQuery));

