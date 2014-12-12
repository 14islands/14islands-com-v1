/**
 * Video Component
 *
 * This component will look for two data attributes in the markup:
 * - data-path: valid absolute path set by Wordpress template pathh
 * - data-videos: encoded array of valid videos file names like 'Dashboard.mp4'
 *
 * Example markup:

		<figure class="js-component-video" data-path="/videos/home/" data-videos="[&#34;home_ipad.mp4&#34;, &#34;home_ipad.webm&#34;]" data-poster-image="true" data-video-scroll-offset="">
			<noscript class="js-component-video__image" data-src="/images/home/home-ipad-large@1x.jpg">
				<img src="/images/home/home-ipad-large@1x.jpg" alt="Elastica iPad UI" />
			</noscript>
		</figure>

 * @method
 * init()
 * - Initializes the header component
 *
 * @method
 * render()
 * - Called when component is visible - if hidden while instanciating
 *
 */

 /* global ELASTICA, components, componentLoader, scrollMonitor, Modernizr, Spinner */

/*
 * Component scope
 */
(function ($) {
	'use strict';

	/*
	 * Video Component
	 */
	components.Video = function (context) {

		// public api object
		var api = {};
		var $context = $(context);
		var $video = '';
		var video = '';
		var watcher = null;
		var isFullyInViewport = false;
		var isVideoLoaded = false;
		var isVideoAppended = false;
		var isVideoSupported = false;
		var isLazy = $context.data('lazy-load') === true ? true : false;
		var shouldLoop = $context.data('video-loop');
		var scrollOffset = $context.data('video-scroll-offset');
		var usePosterImage = $context.data('poster-image') === false ? false : true;
		var videoDuration = 0;
		var SELECTOR_MEDIA_IMG = '.js-component-video__image';
		var loadTimer;
		var spinner;

		/**
		 * Add events callbacks
		 **/
		function addEventListeners() {
			if (typeof watcher !== 'object') {
				return;
			}
			watcher.fullyEnterViewport( onFullyEnterViewport );
			watcher.exitViewport( onExitViewport );
		}

		function showSpinnerAfter(delay) {
			var opts = {
				lines: 17, // The number of lines to draw
				length: 0, // The length of each line
				width: 2, // The line thickness
				radius: 40, // The radius of the inner circle
				corners: 0, // Corner roundness (0..1)
				rotate: 0, // The rotation offset
				direction: 1, // 1: clockwise, -1: counterclockwise
				color: '#fff', // #rgb or #rrggbb or array of colors
				speed: 1.7, // Rounds per second
				trail: 100, // Afterglow percentage
				shadow: false, // Whether to render a shadow
				hwaccel: false, // Whether to use hardware acceleration
				className: 'spinner', // The CSS class to assign to the spinner
				zIndex: 2e9, // The z-index (defaults to 2000000000)
				top: 'auto', // Top position relative to parent in px
				left: 'auto' // Left position relative to parent in px
			};

			loadTimer = setTimeout(function () {
				spinner = new Spinner(opts).spin($context[0]);
			}, delay);
		}

		function cancelSpinner() {
			clearTimeout(loadTimer);
			if (spinner) {
				spinner.stop();
			}
		}

		/**
		 * Add video callbacks
		 */
		function addVideoListeners() {
			$video.on('touchstart', onVideoTouch);
			$video.on('canplay', onVideoLoadedData);
			$video.on('loadedmetadata', onVideoLoadedMetadata);
			$video.on('ended', onVideoEnded);
			$video.on('error', onVideoError);

			showSpinnerAfter(2000);
		}

		function onFullyEnterViewport() {
			isFullyInViewport = true;

			if (!isVideoSupported) {
				return;
			}

			if (isVideoLoaded && video.paused && video.currentTime === 0) {
				video.play();
			}
		}

		/**
		 * Callback for when it's exiting the page view
		 */
		function onExitViewport() {
			isFullyInViewport = false;

			if (!isVideoSupported) {
				return;
			}

			if (!ELASTICA.REPLAY_ANIMATIONS) {
				return;
			}

			// David: we let the video play to end because it's short and for mood only
			// Pause it if not paused already
			// if (isVideoLoaded && !video.paused) {
			// 	video.pause();
			// }

			// reset video if user scroll up the page again
			if (isVideoLoaded && watcher.isBelowViewport) {
				video.currentTime = 0;
				video.pause();
			}

		}

		/**
		 * Returns the extension of the video given the source.
		 * @param  {String} source A video filename string.
		 * @return {String}        The video type.
		 */
		function getVideoType(source) {
			var result = '';

			if (source && source.length > 1) {
				result =  'video/' + source.split('.')[1];
			} else {
				throw new Error('getVideoType: source doesnt have a valid extension set.');
			}

			return result;
		}

		/**
		 * Gets a video path based on it's filename.
		 * @param  {String} source A video filename string.
		 * @return {String}        The absolute path with it's source.
		 */
		function getVideoPath(source) {
			var path = $context.data('path') || '';
			return path + source;
		}

		/**
		 * Prepares a video <source> tag of a specific source string.
		 * @param  {String} source A video filename string.
		 * @return {String}        The complete <source> tag
		 */
		function createSourceTag(source) {
			var type = '';
			var src = '';

			if (source.length === 0) {
				throw new Error('createSourceTag: source invalid or missing!');
			}

			type = getVideoType( source );
			src = getVideoPath( source );

			if (type === 'mp4') {
				// Android doesn't like specifying the type attribute for mp4
				return '<source src=\'' + src + '\'>';
			} else {
				return '<source src=\'' + src + '\' type=\''+ type + '\'>';
			}

		}

		/**
		 * Prepares a beautiful <video /> tag to be appended in the component.
		 */
		function appendVideo() {
			var html = '';
			var videos = $context.data('videos') || false;
			var posterUrl = '';

			// Do we have any videos to work with?
			if (!videos) {
				throw new Error('appendVideo: video filenames not found in markup.');
			}

			if (usePosterImage) {
				// Get our poster URL from the image that is on top of it
				posterUrl = $context.find( SELECTOR_MEDIA_IMG ).data('src');
			}
			// Remove it as we have a poster now (see below)
			$context.find( SELECTOR_MEDIA_IMG ).remove();

			// Fix our markup
			html += '<div class=\'video-ratio\'>';
			html += '<div class=\'video-container\'>';
			html += '<video id=\'dashboard-video\' class=\'dashboard-figure__video\' poster=\''+ posterUrl + '\'>';

			// Set the sources
			for (var i = 0; i < videos.length; i++) {
				html += createSourceTag( videos[i] );
			}

			// Close our markup
			html += '</video>';
			html += '</div>';
			html += '</div>';

			// Append our video tag
			$context.prepend(html);

			onVideoAppended();
		}

		function onVideoTouch() {
			video.play();
		}

		function onVideoAppended() {
			// Cache these for later
			$video = $('video', context);
			video = $video.get(0);

			// Done
			isVideoAppended = true;
			// Listen to what's goin on
			addVideoListeners();
		}

		/**
		 * Callback for when the video is successfully loaded
		 */
		function onVideoLoadedData() {
			isVideoLoaded = true;
			video.play(); // so we loose the poster image and can show the first frame

			if (!isFullyInViewport) {
				video.pause();
				video.currentTime = 0;
			}

			cancelSpinner();
			setTimeout(function () {
				$context.addClass('loaded');
			}, 100);
		}

		/**
		 * Callback for when we have the video information available for us.
		 * So we can find out the total lenght of the video.
		 */
		function onVideoLoadedMetadata() {
			videoDuration = $video.get(0).duration.toFixed(1);
		}

		/**
		 * Callback for when we reached the end of the video.
		 * This is to make sure that it looks endlessly.
		 */
		function onVideoEnded() {
			if (shouldLoop) {
				// Restart the video
				video.currentTime = 0;
				// Play straight away, it will pause if it leaves the screen
				video.play();
			}
		}

		function onVideoError(event) {
			throw new Error('video error: ', event);
		}

		function showFallbackImage() {
			var imgUrl = $context.find( SELECTOR_MEDIA_IMG ).data('src');
			$context.prepend( $('<img>', {src: imgUrl}) );
		}

		/**
		 * We lazy load the video after document ready and append it to the DOM
		 * so it's ready to play when the user scrolls down
		 */
		function onDocumentReady() {
			if (!isVideoSupported) {
				return;
			}

			if (!isVideoAppended) {
				appendVideo();
			}

			// ok now let's start monitoring scroll events
			watcher = scrollMonitor.create(context, scrollOffset);
			addEventListeners();
		}

		/**
		 * Initializes the component - Called by ComponentLoader for each instance found on page.
		 *
		 **/
		api.init = function () {

			// Checking for video support
			if (Modernizr.video.h264 === '' &&
				Modernizr.video.webm === '' &&
				Modernizr.video.ogg === '') {
				isVideoSupported = false;
			} else {
				isVideoSupported = true;
			}

			// don't show video on touch devices
			// ideally we would feature detect if autoplay is supported - waiting for Modernizr 3.0...
			if (Modernizr.touch || navigator.msMaxTouchPoints) {
				isVideoSupported = false;
				showFallbackImage();
			}

			if (isLazy) {
				$(window).load(onDocumentReady);
			}
			else {
				onDocumentReady();
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
	componentLoader.register('video', components.Video);


}(jQuery));
