/**
 * HomeTestimonials Component
 *
 * This component does 2 things:
 * - listens for scroll events and make a parallax effect on the "Learn more"-link
 * - Attaches a video lightbox to all links with a data-video-id (Vimeo video ID)
 *
 * Because of the parallax animation - it's recommended to only have one instance of this component per page.
 *
 * @method
 * init()
 * - Initializes the component when the following class is found on page:
 *	<div class="js-component-home-testimonials">...</div>
 *
 */

/* global components, componentLoader, requestAnimationFrame, Modernizr */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * HomeTestimonials Component
	 */
	components.HomeTestimonials = function (/* context */) {

		// public api object
		var api = {},
				LIGHTBOX_ID = '#home-testimonials-lightbox',
		    VIDEO_CONTROLS_COLOR = '1CA8DD', // without #
		    embedTemplate = '<iframe src="//player.vimeo.com/video/#{VIDEO_ID}?autoplay=1&portrait=0&title=0&badge=0&byline=0&color=#{COLOR}" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
		    $lightbox = $(LIGHTBOX_ID),
		    $videoWrapper = $('.home-testimonials-lightbox__video-wrapper', $lightbox),
		    $body = $('body'),
		    $scrollBody = $('html, body'),
		    $scrollTarget = $('.home-testimonials'),
		    $linkLearnMore = $('.home-learn-more__link'),
		    $videos,
		    propTransform = Modernizr.prefixed('transform'),
		    ticking = false,
		    isLinkHidden = false,
		    isUsingAnimation = false,
		    lastScrollY = 0,
		    DISTANCE_TO_SCROLL = 300, // px to scroll window
		    DISTANCE_TO_GLIDE= 150; // % of link + arrow height


		function onTransitionEnd($el, callback, fallbackDuration) {
			if ($.support.transition && $.support.transition.end) {
				$el.one($.support.transition.end, callback).emulateTransitionEnd(fallbackDuration);
			}
			else {
				setTimeout(callback, fallbackDuration);
			}
		}

		function closeVideo() {
			onTransitionEnd($lightbox, function () {
				$lightbox.removeClass('home-testimonials-lightbox--open');
				$lightbox.removeClass('home-testimonials-lightbox--closed');
				$body.removeClass('lightbox--open');
				$videoWrapper.html('');
			}, 500);

			$lightbox.addClass('home-testimonials-lightbox--closed');

			$(document).off('keyup', onKeyUp);
		}

		function onKeyUp(e) {
			// Escape key
			if (e.keyCode === 27) {
				closeVideo();
			}
		}

		function openVideo(videoId) {
			var embedCode = embedTemplate.replace('#{VIDEO_ID}', videoId).replace('#{COLOR}', VIDEO_CONTROLS_COLOR);
			$videoWrapper.html(embedCode);

			$body.addClass('lightbox--open');
			$lightbox.addClass('home-testimonials-lightbox--open');

			$lightbox.one('click', closeVideo);
			$(document).on('keyup', onKeyUp);
		}

		function onScrollDown(e) {
			e.preventDefault();
			$scrollBody.animate({
				scrollTop: $scrollTarget.offset().top
			}, 500);
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

		/**
		 * Our animation callback
		 */
		function update() {

			if (Modernizr.touch) {
				if(lastScrollY >= DISTANCE_TO_SCROLL) {
					if (!isLinkHidden) {
						$linkLearnMore.addClass('fadeOut');
						isLinkHidden = true;
					}
				}
				else {
					if (isLinkHidden) {
						$linkLearnMore.removeClass('fadeOut');
						isLinkHidden = false;
					}
				}
			}

			if (!isUsingAnimation) {
				$scrollTarget.css('opacity', '1');
				ticking = false;
				return;
			}

			var delta = Math.min(1, lastScrollY / DISTANCE_TO_SCROLL),
			    yP = DISTANCE_TO_GLIDE * delta,
			    oP = 1 - delta,
			    props = {};

			props[propTransform] = 'translate(0, ' + yP + '%)';
			props.opacity = oP;

			$linkLearnMore.css(props);
			$scrollTarget.css('opacity', delta);

			// allow further rAFs to be called
			ticking = false;
		}


		function checkVisibility() {
			isUsingAnimation = $linkLearnMore.is(':visible') && !Modernizr.touch;
			if (!isUsingAnimation) {
				$scrollTarget.css('opacity', '1');
			}
		}


		function onResize() {
			checkVisibility();
		}

		/**
		 * Initializes the component
		 *
		 **/
		api.init = function () {

			// find all videos (even outside context) - since elastica wanted more videos
			$videos = $('a[data-video-id]').click(function (e) {
				e.preventDefault();
				var videoId = $(this).data('video-id');
				openVideo(videoId);
				return false;
			});

			// animate opacity
			if ($linkLearnMore.length) {
				$linkLearnMore.click(onScrollDown);
				$(window).on('scroll', onScroll);
				$(window).resize(onResize);

				$(window).load(function () {
					setTimeout(checkVisibility, 100);
				});

			}
		};

		// returns public methods
		// to the world outside
		return api;

	};

	/*
	 * Register the component with the componentLoader
	 */
	componentLoader.register('home-testimonials', components.HomeTestimonials);


}(jQuery));

