<?php
/**
 * Integration logic for WooCommerce extensions
 *
 * @package KharkivShop
 */

/**
 * Styles & Scripts
 *
 * @return void
 */
function shop_isle_woocommerce_integrations_scripts() {
	/**
	 * Bookings
	 */
	if ( is_woocommerce_extension_activated( 'WC_Bookings' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-bookings-style', get_template_directory_uri() . '/inc/woocommerce/css/bookings.css' );
	}

	/**
	 * Brands
	 */
	if ( is_woocommerce_extension_activated( 'WC_Brands' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-brands-style', get_template_directory_uri() . '/inc/woocommerce/css/brands.css' );
	}

	/**
	 * Wishlists
	 */
	if ( is_woocommerce_extension_activated( 'WC_Wishlists_Wishlist' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-wishlists-style', get_template_directory_uri() . '/inc/woocommerce/css/wishlists.css' );
	}

	/**
	 * AJAX Layered Nav
	 */
	if ( is_woocommerce_extension_activated( 'SOD_Widget_Ajax_Layered_Nav' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-ajax-layered-nav-style', get_template_directory_uri() . '/inc/woocommerce/css/ajax-layered-nav.css' );
	}

	/**
	 * Variation Swatches
	 */
	if ( is_woocommerce_extension_activated( 'WC_SwatchesPlugin' ) ) {
		wp_enqueue_style( 'KharkivShop-variation-swatches-style', get_template_directory_uri() . '/inc/woocommerce/css/variation-swatches.css' );
	}

	/**
	 * Composite Products
	 */
	if ( is_woocommerce_extension_activated( 'WC_Composite_Products' ) ) {
		wp_enqueue_style( 'KharkivShop-composite-products-style', get_template_directory_uri() . '/inc/woocommerce/css/composite-products.css' );
	}

	/**
	 * WooCommerce Photography
	 */
	if ( is_woocommerce_extension_activated( 'WC_Photography' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-photography-style', get_template_directory_uri() . '/inc/woocommerce/css/photography.css' );
	}

	/**
	 * Product Reviews Pro
	 */
	if ( is_woocommerce_extension_activated( 'WC_Product_Reviews_Pro' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-product-reviews-pro-style', get_template_directory_uri() . '/inc/woocommerce/css/product-reviews-pro.css' );
	}

	/**
	 * WooCommerce Smart Coupons
	 */
	if ( is_woocommerce_extension_activated( 'WC_Smart_Coupons' ) ) {
		wp_enqueue_style( 'KharkivShop-woocommerce-smart-coupons-style', get_template_directory_uri() . '/inc/woocommerce/css/smart-coupons.css' );
	}
}
