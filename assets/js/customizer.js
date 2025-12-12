/**
 * Customizer Live Preview
 *
 * @package Ascend
 */

(function($) {
	'use strict';

	// Header Background Color
	wp.customize('ascend_header_bg_color', function(value) {
		value.bind(function(newval) {
			$('.site-header').css('background-color', newval);
		});
	});

	// Update other customizer settings in real-time as needed

})(jQuery);
