if (!Date.now) {
	Date.now = function now() {
		'use strict';
		return new Date().getTime();
	};
}