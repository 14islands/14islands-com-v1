/**
 * GlobalPresence Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-global-presence">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor, Modernizr */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 *
	 */
	components.GlobalPresence = function (context) {

		var api = {},
		    $el = $(context),
		    $items =  $el.find('.global-presence-animation__ratio__items li'),
		    $bgImage = $el.find('.global-presence-animation__ratio__bg'),
		    scrollWatcher,
		    resetWhenAbove = $el.data('animation-reset-when-above'),
		    scrollOffset = $el.data('animation-scroll-offset'),
		    height,
		    width,
		    ANIMATION_DURATION = 1200, // ms
		    delay = ANIMATION_DURATION ? ANIMATION_DURATION / $items.length : 0;


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

		function renderItem(index, item) {
			var $item = $(item),
			    x     = $item.data('x'),
			    y     = $item.data('y'),
			    color = $item.data('color'),
			    xP = parseInt(x, 10) / width * 100,
			    yP = parseInt(y, 10) / height * 100,
			    props;

			props = {
				left: xP+'%',
				top: yP+'%',
				background: color
			};

			if (delay > 0) {
				props[Modernizr.prefixed('transitionDelay')] = delay * index + 'ms';
			}

			$item.css(props);
		}

		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {

			height = $bgImage.attr('height');
			width = $bgImage.attr('width');

			$items.each(renderItem);
			initScrollWatcher();
		};

		return api;
	};

	/*
	 * Register the component
	 */
	componentLoader.register('global-presence', components.GlobalPresence);

}(jQuery));

