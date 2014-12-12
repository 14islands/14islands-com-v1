/* global Modernizr */
window.touchEvent = (function () {
	'use strict';

	var eventTouchStartType,
	    eventTouchLeaveType,
	    eventTouchMoveType,
	    eventTouchEnterType,
	    eventTouchEndType;

	if (window.navigator.msPointerEnabled) {
		eventTouchStartType = 'MSPointerDown';
		eventTouchLeaveType = 'MSPointerOut';
		eventTouchMoveType = 'MSPointerMove';
		eventTouchEnterType = 'MSPointerHover';
		eventTouchEndType = 'MSPointerUp';
	} else if (Modernizr.touch) {
		eventTouchStartType = 'touchstart';
		eventTouchLeaveType = 'touchleave ';
		eventTouchMoveType = 'touchmove';
		eventTouchEnterType = 'touchstart';
		eventTouchEndType = 'touchend touchcancel';
	} else {
		eventTouchStartType = 'mousedown';
		eventTouchLeaveType = 'mouseout';
		eventTouchMoveType = 'mousemove';
		eventTouchEnterType = 'mouseover';
		eventTouchEndType = 'mouseup';
	}

	return {
		start: eventTouchStartType,
		leave: eventTouchLeaveType,
		move: eventTouchMoveType,
		enter: eventTouchEnterType,
		end: eventTouchEndType
	};
})();