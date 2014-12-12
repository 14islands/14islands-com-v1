/**
 *
 * Last script file to be included on all pages.
 *
 * It uses the component-loader (https://github.com/14islands/component-loader)
 * library to initialize JavaScript components based on whether they are found in the
 * current page markup.
 *
 * All available components are defined and registered in scripts/components
 *
 */

 /* global componentLoader, Modernizr */

componentLoader.initializeComponents();

// Color match for intro movie in Safari
var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
if (isSafari && !Modernizr.touch) {
	$('#home-page').css('background', '#21272d');
}
