/**
 * ThreatsAI Component
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-threats-ai">...</div>
 *
 */

/* global ELASTICA, components, componentLoader, scrollMonitor, requestAnimationFrame, easing */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	var Position = function (x, y) {
		this.x = x;
		this.y = y;
	};

	var Circle = function (position, size) {
		this.position = position;
		this.size = size;
	};
	Circle.prototype = {
		animateTo: function (properties, duration, easing) {
			this.animation = {
				target: properties,
				duration: duration,
				easing: easing
			};
		},
		getPosition: function (time) {
			if (this.animation && this.animation.target.position) {
				var deltaX = this.animation.target.position.x - this.position.x;
				var deltaY = this.animation.target.position.y - this.position.y;
				return {
					x: this.animation.easing(time, this.position.x, deltaX, this.animation.duration),
					y: this.animation.easing(time, this.position.y, deltaY, this.animation.duration)
				};
			}
			return this.position;
		},
		getSize: function (time) {
			if (this.animation && this.animation.target.size) {
				var deltaSize = this.animation.target.size - this.size;
				return this.animation.easing(time, this.size, deltaSize, this.animation.duration);
			}
			return this.size;
		},
		draw: function (ctx, time) {
			var pos = this.getPosition(time);
			var size = this.getSize(time);

			ctx.beginPath();
			ctx.arc(pos.x, pos.y, size, 0, Math.PI*2, true);
			ctx.fill();
			ctx.stroke();
		}
	};

	var Line = function (circleFrom, circleTo) {
		this.circleFrom = circleFrom;
		this.circleTo = circleTo;
	};
	Line.prototype = {
		draw: function (ctx, time) {
			var pos1 = this.circleFrom.getPosition(time);
			var pos2 = this.circleTo.getPosition(time);

			ctx.beginPath();
			ctx.moveTo(pos1.x, pos1.y);
			ctx.lineTo(pos2.x, pos2.y);
			ctx.stroke();
		}
	};




	/*
	 * ThreatsAI Component
	 */
	components.ThreatsAI = function (context) {

		// public api object
		var api = {},
		    $el = $(context),
				canvas = $('canvas', context)[0],
				resetWhenAbove = $el.data('animation-reset-when-above'),
				lineColor = $el.data('line-color'),
				backgroundColor = $el.data('background-color'),
				scrollWatcher,
				ctx,
				ANIMATION_DURATION = 1000,
				startedTime,
				isStarted = false,
				strokeWidth = 2,
				circles,
				lines;

		function runAnimation() {
			$el.addClass('run');
			startedTime = Date.now();
			draw();
		}

		function resetAnimation() {
			$el.removeClass('run');
			startedTime = null;
			isStarted = false;
			draw();
		}

		function timeElapsed() {
			if (!isStarted) {
				return 0;
			}
			return Date.now() - startedTime;
		}

		function initScrollWatcher() {
			scrollWatcher = scrollMonitor.create(canvas);
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


		function buildScene() {
			// positions for circles

			var pos1 = new Position(canvas.width*0.295, canvas.height*0.19);
			var pos2 = new Position(95+strokeWidth, canvas.height*0.57);
			var pos3 = new Position(canvas.width-85-strokeWidth, canvas.height-85-strokeWidth);
			var pos4 = new Position(canvas.width*0.675, canvas.height*0.14);

			// create circles
			var circle1 = new Circle(pos1, 35);
			var circle2 = new Circle(pos2, 95);
			var circle3 = new Circle(pos3, 85);
			var circle4 = new Circle(pos4, 60);
			circles = [circle1, circle2, circle3, circle4];

			// create lines
			var line1 = new Line(circle1, circle2);
			var line2 = new Line(circle2, circle3);
			var line3 = new Line(circle3, circle4);
			var line4 = new Line(circle4, circle1);
			var line5 = new Line(circle1, circle3);
			var line6 = new Line(circle2, circle4);
			lines = [line1, line2, line3, line4, line5, line6];

			// setup animations
			circle1.animateTo({position: circle2.position, size: circle2.size}, ANIMATION_DURATION, easing.easeInOutQuad);
			circle2.animateTo({position: circle3.position, size: circle3.size}, ANIMATION_DURATION, easing.easeInOutQuad);
			circle3.animateTo({position: circle4.position, size: circle4.size}, ANIMATION_DURATION, easing.easeInOutQuad);
			circle4.animateTo({position: circle1.position, size: circle1.size}, ANIMATION_DURATION, easing.easeInOutQuad);
		}


		function initDraw() {
			if (!canvas.getContext) {
				return;
			}
			ctx = canvas.getContext('2d');

			buildScene();

			draw(); //first frame
		}


		function draw() {

			var time = timeElapsed();

			if (isStarted && time < ANIMATION_DURATION) {
				requestAnimationFrame(draw);
			}

			ctx.clearRect(0, 0, canvas.width, canvas.height);

			ctx.lineWidth = strokeWidth;
			ctx.strokeStyle = lineColor;
			ctx.fillStyle = backgroundColor;

			for (var j = 0; j < lines.length; ++j) {
				lines[j].draw(ctx, time);
			}

			for (var i = 0; i < circles.length; ++i) {
				circles[i].draw(ctx, time);
			}
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
	componentLoader.register('threats-ai', components.ThreatsAI);


}(jQuery));

