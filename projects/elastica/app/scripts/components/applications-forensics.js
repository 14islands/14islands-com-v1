/**
 * ApplicationsForensics Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-applications-forensics">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor, requestAnimationFrame, easing */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * ApplicationsForensics Component
	 */
	components.ApplicationsForensics = function (context) {

		// public api object
		var api = {},
		    $el = $(context),
				canvas = $('canvas', context)[0],
				srcImg = $('.apps-forensics-animation__ratio__mask')[0],
				direction = $(context).data('animation-direction'),
				resetWhenAbove = $el.data('animation-reset-when-above'),
				img,
				scrollWatcher,
				ctx,
				LENS_RADIUS = 150,
				MOVE_DURATION = 1500,
				startX = LENS_RADIUS,
				endX = canvas.width/2,
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
			var time = Math.max(0, Math.min(MOVE_DURATION, timeElapsed()));

			return easing.easeInOutQuad(time, startX, endX-startX, MOVE_DURATION);
		}

		function draw() {
			if (!isLoaded) {
				return;
			}

			if (timeElapsed() < MOVE_DURATION) {
				requestAnimationFrame(draw);
			}


			ctx.clearRect(0, 0, canvas.width, canvas.height);

			ctx.save();

			ctx.lineWidth = 1;
			ctx.strokeStyle = '#ffffff'; // better anti-aliasing
			ctx.fillStyle='rgba(255,255,255,1)';

			var x = getPosition();

			ctx.beginPath();
			ctx.arc(x, canvas.height/2, LENS_RADIUS, 0, Math.PI*2, true);
			ctx.shadowColor = 'rgba(0,0,0,.15)';
			ctx.shadowBlur = 6;
			ctx.shadowOffsetX = 0;
			ctx.shadowOffsetY = 3;
			ctx.fill();
			ctx.shadowColor = 'none';
			ctx.clip();

			ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
			ctx.restore();
			ctx.closePath();
		}


		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			if (direction === 'rtl') {
				startX = canvas.width - LENS_RADIUS;
			}

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
	componentLoader.register('applications-forensics', components.ApplicationsForensics);


}(jQuery));

