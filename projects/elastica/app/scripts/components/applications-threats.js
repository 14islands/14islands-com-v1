/**
 * ApplicationsThreats Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-applications-threats">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor, requestAnimationFrame, easing */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * ApplicationsThreats Component
	 */
	components.ApplicationsThreats = function (context) {

		// public api object
		var api = {},
		    $el = $(context),
				canvas = $('canvas', context)[0],
				srcImg = $('.apps-threats-animation__ratio__mask')[0],
				resetWhenAbove = $el.data('animation-reset-when-above'),
				img,
				scrollWatcher,
				ctx,
				LENS_RADIUS = 110,
				SCALE_DURATION = 1500,
				MOVE_DURATION = 1300,
				startX = 150,
				startY = canvas.height - LENS_RADIUS,
				endX = 280,
				endY = 170,
				startSize = 0,
				animationStarted,
				isLoaded = false,
				isStarted = false;

		function runAnimation() {
			$el.addClass('run');
			animationStarted = Date.now();
			draw();
		}

		function resetAnimation() {
			$el.removeClass('run');
			animationStarted = null;
			isStarted = false;
			draw();
		}

		function initScrollWatcher() {
			scrollWatcher = scrollMonitor.create(canvas);
			scrollWatcher.fullyEnterViewport(function() {
				if (!isStarted) {
					isStarted = true;
					if (isLoaded) {
						runAnimation();
					}
				}
			});

			scrollWatcher.exitViewport(function() {
				if (!ELASTICA.REPLAY_ANIMATIONS) {
					return;
				}

				if (resetWhenAbove && scrollWatcher.isAboveViewport) {
					resetAnimation();
				}
				else if (scrollWatcher.isBelowViewport) {
					resetAnimation();
				}
			});
		}

		function timeElapsed() {
			if (!isStarted) {
				return 0;
			}
			return Date.now() - animationStarted;
		}

		function initDraw() {
			if (!canvas.getContext) {
				return;
			}
			ctx = canvas.getContext('2d');

			img = new Image();
			img.addEventListener('load', function() {
				isLoaded = true;
				if (isStarted) {
					runAnimation();
				}
			}, true);
			img.src = srcImg.src;
		}

		function getPosition() {
			var time = Math.max(0, Math.min(MOVE_DURATION, timeElapsed() - SCALE_DURATION));

			var x = easing.easeInSine(time, startX, endX-startX, MOVE_DURATION),
			    y = easing.easeOutSine(time, startY, endY-startY, MOVE_DURATION);

			return {
				x: x,
				y: y
			};
		}

		function getSize() {
			var endSize = LENS_RADIUS;
			var time = Math.min(SCALE_DURATION, timeElapsed());
			return easing.easeInOutQuart(time, startSize, endSize-startSize, SCALE_DURATION);
		}

		function draw() {
			if (!isLoaded) {
				return;
			}

			if (timeElapsed() < MOVE_DURATION + SCALE_DURATION) {
				requestAnimationFrame(draw);
			}

			ctx.clearRect(0, 0, canvas.width, canvas.height);

			ctx.save();

			ctx.lineWidth = 1;
			ctx.strokeStyle = '#F6772C'; // better anti-aliasing
			ctx.fillStyle='rgba(255,255,255,1)';

			var size = getSize();
			var pos = getPosition();

			ctx.beginPath();
			ctx.arc(pos.x, pos.y, size, 0, Math.PI*2, true);
			ctx.clip();

			ctx.fill();
			ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
			ctx.stroke();

			ctx.closePath();
			ctx.restore();
		}


		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			initDraw();
			initScrollWatcher();
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('applications-threats', components.ApplicationsThreats);


}(jQuery));

