/**
 * Script for the customizer auto scrolling.
 *
 * Sends the section name to the preview.
 *
 * @since    2.2.37
 * @package  KharkivShop
 *
 * @author    ThemeIsle
 */

/* global wp */

var shop_isle_customize_scroller = function ( $ ) {
	'use strict';

	$(
		function () {
			var customize = wp.customize;

			$( 'ul.customize-pane-child > li' ).each(
				function () {
					$( this ).on(
						'click', function() {
							var section = $( this ).attr( 'aria-owns' );
							customize.previewer.send( 'clicked-customizer-section', section );
						}
					);
				}
			);
		}
	);
};

shop_isle_customize_scroller( jQuery );
