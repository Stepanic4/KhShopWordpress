/**
 * Script fort the customizer sections scroll function.
 *
 * @since    2.2.37
 * @package  KharkivShop
 *
 * @author    ThemeIsle
 */

/* global wp */

var shop_isle_customizer_section_scroll = function ( $ ) {
	'use strict';

	var panels = {
		'sub-accordion-section-shop_isle_slider_section':'#home',
		'sub-accordion-section-shop_isle_big_title_section':'#home',
		'sub-accordion-section-shop_isle_banners_section':'#banners',
		'sub-accordion-section-shop_isle_products_section':'#latest',
		'sub-accordion-section-shop_isle_video_section':'#video',
		'sub-accordion-section-shop_isle_services_section':'#services',
		'sub-accordion-section-shop_isle_ribbon_section':'#ribbon',
		'sub-accordion-section-shop_isle_products_slider_section':'#products-slider',
		'sub-accordion-section-shop_isle_map_section':'#map',
		'sub-accordion-section-shop_isle_fp_categories_section':'#categories',
		'sub-accordion-section-shop_isle_shortcodes_section':'.shortcodes'
	};

	$(
		function () {
			var customize = wp.customize;

			customize.preview.bind(
				'clicked-customizer-section', function( data ) {
					var sectionId = panels[data];

					if ( $( sectionId ).length > 0 && typeof panels[data] !== 'undefined' && $( sectionId ).css( 'display' ) !== 'none' ) {
						$( 'html, body' ).animate(
							{
								scrollTop: $( sectionId ).offset().top - 100
							}, 1000
						);
					}
				}
			);
		}
	);
};

shop_isle_customizer_section_scroll( jQuery );
