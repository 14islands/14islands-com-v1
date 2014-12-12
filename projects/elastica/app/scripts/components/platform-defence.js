/**
 * PlatformDefence Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-platform-defence">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor, requestAnimationFrame, easing */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * PlatformDefence Component
	 */
	components.PlatformDefence = function (context) {

		// public api object
		var api = {},
		    $el = $(context),
				canvas = $('canvas', context)[0],
				resetWhenAbove = $el.data('animation-reset-when-above'),
				scrollOffset = $el.data('animation-scroll-offset'),
				scrollWatcher,
				ctx,
				animationStarted,
				isStarted = false,
				CHART_MIN_Y = 103,
				CHART_MAX_Y = 40,
				CHART_PADDING = 20,
				CHART_VALUES = [0.40,0.45,0.50,0.60,0.70,0.80,0.70,0.65,0.60,0.50,0.40,0.50,0.60,1.0,0.85,0.71,0.75,0.70,0.50,0.30],
				DURATION = 2500;

		function runAnimation() {
			animationStarted = Date.now();
			draw();
		}

		function resetAnimation() {
			animationStarted = null;
			isStarted = false;
			draw();
		}

		function initScrollWatcher() {
			scrollWatcher = scrollMonitor.create(canvas, scrollOffset);
			scrollWatcher.fullyEnterViewport(function() {
				if (!isStarted) {
					isStarted = true;
					runAnimation();
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

		function timeElapsed(offset) {
			if (!isStarted) {
				return 0;
			}
			offset = offset ? offset : 0;
			return Math.max(0, Date.now() - animationStarted + offset);
		}

		function initDraw() {
			if (!canvas.getContext) {
				return;
			}
			ctx = canvas.getContext('2d');
		}

		function drawTextRow(y, values, timeElapsed) {
			var duration = DURATION / 3;
			var fraction1 = Math.min(1, timeElapsed / duration);
			var fraction2 = Math.min(1, Math.max(0, (timeElapsed - (duration*0.33)) / duration / 0.66));
			var fraction3 = Math.min(1, Math.max(0, (timeElapsed - (duration*0.66)) / duration / 0.33));

			ctx.fillText(Math.round(values[0] * fraction1), 320, y);
			ctx.fillText(Math.round(values[1] * fraction2), 405, y);
			ctx.fillText(Math.round(values[2] * fraction3), 488, y);

		}

		function drawText() {
			ctx.fillStyle = '#444';
			ctx.font = '100 20px sans-serif';
			ctx.textAlign = 'center';

			drawTextRow(245, [1423, 324, 3324], timeElapsed());
			drawTextRow(320, [1119, 215, 1824], timeElapsed(-DURATION*0.33));
			drawTextRow(395, [1028, 215, 1639], timeElapsed(-DURATION*0.66));
		}

		function drawGraph() {

			var inc = (canvas.width - (CHART_PADDING * 2)) / (CHART_VALUES.length - 1);
			var delta = CHART_MIN_Y - CHART_MAX_Y;

			var frame = [];
			for (var i = 0; i < CHART_VALUES.length; i++) {

				var x = CHART_PADDING + (i * inc);
				var yTarget = CHART_MIN_Y - (CHART_VALUES[i] * delta);

				// easing on Y
				var pDuration = (DURATION / CHART_VALUES.length)*4;
				var pTimeElapsed = timeElapsed() - (pDuration * i * 0.24);
				var time = Math.max(0, Math.min(pDuration, pTimeElapsed));
				var y = easing.easeInOutSine(time, CHART_MIN_Y, yTarget-CHART_MIN_Y, pDuration);

				frame.push({x:x, y:y});
			}

			for (i = 0; i < frame.length; i++) {

				// // draw line
				if (i < CHART_VALUES.length-1) {
					ctx.lineWidth = 2;
					ctx.strokeStyle = '#e5e9ea';
					ctx.beginPath();
					ctx.moveTo(frame[i].x, frame[i].y);
					ctx.lineTo(frame[i+1].x, frame[i+1].y);
					ctx.stroke();
					ctx.closePath();
				}

				// draw point
				ctx.lineWidth = 2;
				ctx.strokeStyle = '#ffbb42';
				ctx.fillStyle = '#ffffff';
				ctx.beginPath();
				ctx.arc(frame[i].x, frame[i].y, 3.5, 0, Math.PI*2, true);
				ctx.fill();
				ctx.stroke();
				ctx.closePath();
			}
		}

		function draw() {
			if (timeElapsed() < DURATION) {
				requestAnimationFrame(draw);
			}

			ctx.clearRect(0, 0, canvas.width, canvas.height);

			drawText();
			drawGraph();
		}


		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {
			initDraw();
			drawGraph();
			$(document).ready(initScrollWatcher);
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('platform-defence', components.PlatformDefence);


}(jQuery));

