/**
 * responsive.io v0.5.1
 * Copyright 2013, 14 Islands AB (14islands.com)
 */

(function (window, document) {
	'use strict';

	var NAMESPACE = 'responsive.io',

	    PROD_HOST = 'src[shard].responsive.io',
	    DEV_HOST  = 'src[shard].responsive.local',
	    DEV_PORT  = ':8889',

	    ENV_LOCAL = location.hostname === 'localhost',
	    ENV_DEVELOPMENT = location.hostname === 'responsive.local',

	    SRC_TOTAL_SHARDS = 4,
	    SRC_IMAGES_PER_SHARD = 4,
	    SRC_HOSTNAME = ENV_DEVELOPMENT ? DEV_HOST + DEV_PORT : PROD_HOST,
	    SRC_TEMPLATE = '[protocol]//[hostname]/[webp][pixelRatio][r][w][url]',
	    
	    // settings key index
	    OPTS_NAMESPACE    = 0,
	    OPTS_WEBP_SUPPORT = 1,
	    OPTS_PIXEL_RATIO  = 2,

	    RESIZE_DEBOUNCE_THRESHOLD = 500,

	    // TODO - make more future proof
	    // IE10 gives img tags with missing src an icon of width 28px
	    // Chrome gives broken image an icon of width 18px
	    MIN_IMAGE_SIZE = navigator.appName.indexOf("Internet Explorer") !== -1 ? 50 : 30,

	    getComputedStyle = window.getComputedStyle,
	    BYPASS = typeof getComputedStyle === 'undefined', // use original images for localhost

	    _opts,
	    _imageIndex = 0,
	    _images = {};


	// x-browser addEvent by John Resig
	function addEvent(obj, type, fn) {
		if (obj.attachEvent) {
			obj['e' + type + fn] = fn;
			obj[type + fn] = function () {obj['e' + type + fn](window.event);};
			obj.attachEvent('on' + type, obj[type + fn]);
		} else {
			obj.addEventListener(type, fn, false);
		}
	}

	// x-browser removeEvent by John Resig
	function removeEvent( obj, type, fn ) {
		if (obj.detachEvent) {
			obj.detachEvent('on' + type, obj[type + fn]);
			obj[type + fn] = null;
		} else {
			obj.removeEventListener(type, fn, false);
		}
	}

	function log() {
		if((ENV_LOCAL || ENV_DEVELOPMENT) && window.console) {
			console.log('responsive.io', Array.prototype.slice.call(arguments));
		}
	}

	// IE7 support for querySelectorAll (very basic polyfill)
	// https://gist.github.com/icodeforlove/868532
	if (typeof document.querySelectorAll === 'undefined') {
		(function(d){d=document,a=d.styleSheets[0]||d.createStyleSheet();d.querySelectorAll=function(e){a.addRule(e,'f:b');for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)l[b].currentStyle.f&&c.push(l[b]);a.removeRule(0);return c}})();
	}

	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;
		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if (!execAsap) {
					func.apply(obj, args);
				}
				timeout = null;
			}
			if (timeout) {
				clearTimeout(timeout);
			}
			else if (execAsap) {
				func.apply(obj, args);
			}
			timeout = setTimeout(delayed, threshold || 100);
		};
	};

	function getDevicePixelRatio() {
		var pixelRatio = window.devicePixelRatio;
		return pixelRatio ? pixelRatio : 1;
	}

	function getOriginUrl(img) {
		var src = img.getAttribute('data-src'),
				path;

		if (!src) {
			return;
		}
		if (src.indexOf('http') === 0) {
			return src;
		}
		if (src.indexOf('//') === 0) {
			return location.protocol + src;
		} 
		if (src.indexOf('/') === 0) {
			return location.protocol + '//' + location.host + src;
		} 
		path = location.pathname.slice(0, location.pathname.lastIndexOf('/'));
		return location.protocol + '//' + location.host + path + '/' + src;
	}

	// cycle through subdomains to allow more concurrent downloads
	function nextShardIndex() {
		_imageIndex++;
		return Math.floor((_imageIndex / SRC_IMAGES_PER_SHARD)) % SRC_TOTAL_SHARDS;
	}

	function buildTargetUrl(originUrl, opts) {
		var src = SRC_TEMPLATE,
		    webpSupport = recall(OPTS_WEBP_SUPPORT),
		    pixelRatio  = recall(OPTS_PIXEL_RATIO),
		    key;
		
		if (BYPASS) {
			return originUrl;
		}

		src  = src.replace('[protocol]', location.protocol);
		src  = src.replace('[hostname]', SRC_HOSTNAME);
		src  = src.replace('[shard]', nextShardIndex());
		src  = src.replace('[webp]', webpSupport === 'true' ? 'webp/' : '');
		src  = src.replace('[pixelRatio]', pixelRatio > 1 ? 'pr=' + pixelRatio + '/' : '');

		for (key in opts) {
			if (opts.hasOwnProperty(key)) {
				src  = src.replace('[' + key + ']', opts[key] ? key + '=' + opts[key] + '/' : '');
			}
		}

		return src.replace('[url]', originUrl);
	}

	function validSrc(img) {
		var src = img.getAttribute('src');
		var dataSrc = img.getAttribute('data-src');
		return src !== null && (src.indexOf(dataSrc) > -1);
	}

	function loadImage(img, originUrl, opts) {
		var targetUrl = buildTargetUrl(originUrl, opts);

		function onError() {
			img.style.visibility = 'hidden';
			img.setAttribute('src', img.getAttribute('data-src'));
			removeEvent(img, 'error', onError);
			
			log('img load error - reverting to origin src');
			setTimeout(function () {
				img.style.visibility = 'visible';
			}, 100); // delay so we don't see the broken image icon
		}

		// check if we are replacing already loaded image - if so wait until new version has loaded
		if (validSrc(img)) {
			var tmp = new Image();
			
			tmp.onload = function () {
				img.setAttribute('src', targetUrl);
			};
			
			tmp.onerror = onError;
			tmp.src = targetUrl;
		}
		else {
			// first time load
			if (!BYPASS) {
				addEvent(img, 'error', onError); // no need to unbind since we only attach it once
			}
			img.setAttribute('src', targetUrl);
		}
	}

	function getStyleAsNumericValue(imgStyle, prop) {
		var val  = parseFloat(imgStyle.getPropertyValue(prop));
		return isNaN(val) || val  === 0 ? false : val;
	}

	function resizedSmaller(img, newWidth, oldWidth) {
		oldWidth  = parseFloat(oldWidth);
		var hasWidth  = isFinite(oldWidth);

		if (!hasWidth) {
			return false;
		}
		return newWidth < oldWidth;
	}

	function getParentDimensions(img, childPadding) {
		var parent = img.parentNode,
		    style = getComputedStyle(parent, null),
		    paddingLeft  = parseFloat(style.getPropertyValue('padding-left')),
		    paddingRight  = parseFloat(style.getPropertyValue('padding-right'));

		var dimensions = {
			// clientWidth returns a rounded integer (seems to ceil). computed style returns decimals
			// need to use rounded values or image can get false 1px width
			width  : Math.max(0, parent.clientWidth - Math.ceil(paddingLeft + paddingRight))
		};

		// NOTE - we can't calculate width on inline/inline-block elements with no explicit width
		// step up the dom tree recursively until we find a width
		var widthLimit = childPadding ? Math.max(childPadding, MIN_IMAGE_SIZE) : MIN_IMAGE_SIZE;
		if (dimensions.width <= widthLimit && parent.parentNode) {
			var parentDimensions = getParentDimensions(parent, paddingLeft + paddingRight);

			// remove this elements padding and margin form the elements width
			var marginLeft   = parseFloat(style.getPropertyValue('margin-left'));
			var marginRight  = parseFloat(style.getPropertyValue('margin-right'));
			parentDimensions.width = parentDimensions.width - paddingLeft - paddingRight - marginLeft - marginRight;
			return parentDimensions; 
		}
		else {
			return dimensions;
		}
	}

	// find and load all images on the page
	function loadImages(resizeEvent) {
		var imgs = document.querySelectorAll('img[data-src]'),
		    l = imgs.length,
		    i = 0,
		    originUrl,
		    img,
		    imgAlt,
		    imgOriginalDisplay,
		    imgStyle,
		    imgWidth,
		    imgRetina,
		    parentDimensions,
		    hasValidSrc;
		
		_images.length = 0;

		log('********* found', imgs.length, 'images', imgs);

		for (i; i < l; i++) {
			img = imgs[i];
			originUrl = getOriginUrl(img);

			if (BYPASS) {
				loadImage(img, originUrl);
				continue;
			}

			// get image specific attributes
			imgRetina = img.getAttribute('data-retina');
			imgAlt = img.getAttribute('alt');
			hasValidSrc = validSrc(img);

			// alt gives image false width in some cases (something to do with parent being inline-block)
			if (imgAlt && !hasValidSrc) {
					imgStyle = getComputedStyle(img,null);
					imgOriginalDisplay = img.style.display;
					img.style.display = 'none'; // needed in safari
					img.removeAttribute('alt');
					// must switch display to trigger recalc of width
					img.style.display = (imgStyle.display === 'inline-block') ? 'inline' : 'inline-block';
			}

			// compute image size based on CSS
			imgStyle = getComputedStyle(img,null);
			var maxWidthStyle  = imgStyle.getPropertyValue('max-width');
			var maxWidth  = getStyleAsNumericValue(imgStyle, 'max-width');			
			imgWidth = getStyleAsNumericValue(imgStyle, 'width');

			// ignore browser image icons
			if (!hasValidSrc && imgWidth < MIN_IMAGE_SIZE) {
				imgWidth = false;
			}

			// check if resize and smaller size - then do nothing
			var oldWidth = img.getAttribute('data-width');
			if (resizedSmaller(img, imgWidth, oldWidth)) {
				log('resize was smaller, dont fetch new');
				continue;
			}

			// if no explicit size specified or check if we have max-/min- width
			if (!imgWidth || isFinite(maxWidth)) {

				// When resizing - need to temporary set witdh 100% or image will be stuck on smallest size already loaded
				if (resizeEvent) {
					var inlineStyle = img.style.width;
					img.style.width = '100%';
					imgWidth  = getStyleAsNumericValue(imgStyle, 'width'); // TODO - check if this makes sense!
					img.style.width = inlineStyle;
				}

				// calculate width based on parent width
				parentDimensions = getParentDimensions(img);
				if (maxWidthStyle.indexOf('px') > -1) {
					if ((imgWidth > MIN_IMAGE_SIZE && parentDimensions.width < maxWidth) || maxWidth < MIN_IMAGE_SIZE) {
						imgWidth = parentDimensions.width;
					}
					else {
						imgWidth = maxWidth;
					}
				}
				else if (maxWidthStyle.indexOf('%') > -1) {
					imgWidth = Math.round(parentDimensions.width * maxWidth * 0.01);
				}
			}

			log('detected image size', imgWidth);

			// load image
			var opts = {
				w: imgWidth,
				r: imgRetina
			};

			loadImage(img, originUrl, opts);

			// check if image was hidden while loading
			if (imgStyle.visibility === 'hidden') {
				img.style.visibility = 'visible';
			}

			// reset alt attribute and display style
			if (imgAlt) {
				img.setAttribute('alt', imgAlt);
				img.style.display = imgOriginalDisplay; //TODO see if second layout can be avoided
			}

			// store for resize logic
			img.setAttribute('data-width', imgWidth);

			_images[img.outerHTML] = {
				origin: originUrl,
				width: imgWidth,
				retina: imgRetina
			};
		}
	}

	function resizeImages() {
		var resizeEvent = true;
		loadImages(resizeEvent);
	}

	function remember(key, val) {
		_opts[key] = val;
		window.name = _opts.join(',');
	}

	function recall(key) {
		return _opts[key];
	}

	// load and validate settings from previous page load
	// TODO expire after X min if checking bandwidth 
	function validSettings() {
		_opts = window.name ? window.name.split(',') : [];
		return recall(OPTS_NAMESPACE) === NAMESPACE;
	}


	function detectWebP(callback) {
		var webP = new Image();
		webP.onload = webP.onerror = function () {
				callback(webP.height === 2);
		};
		webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
	}

	function init() {
		// check if settings stored since previous page load
		if (validSettings()) {
			loadImages();
		}
		else {
			// detect capabilities and store for later
			remember(OPTS_NAMESPACE, NAMESPACE);
			remember(OPTS_PIXEL_RATIO, getDevicePixelRatio());

			detectWebP(function (webpSupported) {
				remember(OPTS_WEBP_SUPPORT, webpSupported);
				loadImages();
			});
		}

		addEvent(window, 'resize', debounce(resizeImages, RESIZE_DEBOUNCE_THRESHOLD));

		return {
			images: _images,
			bypass: BYPASS
		};
	}

	window.responsive_io = init();

})(window, document);