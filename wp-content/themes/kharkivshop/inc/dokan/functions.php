<?php
/**
 * Compatibility functions for Dokan Multivendor functions
 *
 * @package KharkivShop
 * @since 2.2.34
 */

/**
 * Enqueue style for dokan plugin.
 *
 * @since 2.2.34
 */
function shop_isle_enqueue_dokan_style() {
	wp_enqueue_style( 'KharkivShop-dokan-style', get_template_directory_uri() . '/inc/dokan/css/style.css', array() );
}
add_action( 'wp_enqueue_scripts', 'shop_isle_enqueue_dokan_style' );


/**
 * Open wrapper for new-product-single for Dokan
 *
 * @since 2.2.34
 */
function shop_isle_before_wrap() {
	echo '<section class="page-module-content module"><div class="container"><div class="row">';
}
add_action( 'dokan_dashboard_wrap_before', 'shop_isle_before_wrap' );


/**
 * Close wrapper for new-product-single for Dokan
 *
 * @since 2.2.34
 */
function shop_isle_after_wrap() {
	echo '</div></section>';
}
add_action( 'dokan_dashboard_wrap_after', 'shop_isle_after_wrap' );
