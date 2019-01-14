<?php
/**
 * Deprecated functions that may be necessary for people using child themes.
 *
 * @package KharkivShop
 */

/**
 * Enqueue customize preview script.
 *
 * @deprecated 2.2.41
 */
function shop_isle_wp_themeisle_customize_preview_js() {
	wp_enqueue_script( 'wp_themeisle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

/**
 * Add selective refresh for banners section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_banners_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_banners_title',
		array(
			'selector'            => '.home-banners .product-banners-title',
			'render_callback'     => 'shop_isle_banners_title_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Add selective refresh for products section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_products_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_products_hide',
		array(
			'selector'            => '#latest',
			'render_callback'     => 'shop_isle_products_section_callback',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_products_title',
		array(
			'selector'            => '#latest .product-hide-title',
			'render_callback'     => 'shop_isle_products_title_section_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Add selective refresh for video section
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_video_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_video_hide',
		array(
			'selector'            => '.module-video',
			'render_callback'     => 'shop_isle_video_section_callback',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_video_title',
		array(
			'selector'            => '.module-video .video-title',
			'render_callback'     => 'shop_isle_video_title_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Add selective refresh for services section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_services_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_services_hide',
		array(
			'selector'            => '#services',
			'render_callback'     => 'shop_isle_services_section_callback',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_services_title',
		array(
			'selector'            => '#services .home-prod-title',
			'render_callback'     => 'shop_isle_services_title_section_callback',
			'container_inclusive' => false,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_services_subtitle',
		array(
			'selector'            => '#services .home-prod-subtitle',
			'render_callback'     => 'shop_isle_services_subtitle_section_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Add selective refresh for ribbon section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_ribbon_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_ribbon_hide',
		array(
			'selector'            => '#ribbon',
			'render_callback'     => 'shop_isle_ribbon_section_callback',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_ribbon_text',
		array(
			'selector'            => '#ribbon .module-title',
			'render_callback'     => 'shop_isle_ribbon_text_section_callback',
			'container_inclusive' => false,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_ribbon_button_text',
		array(
			'selector'            => '#ribbon .btn-ribbon-wrapper',
			'render_callback'     => 'shop_isle_display_ribbon_button',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_ribbon_button_link',
		array(
			'selector'            => '#ribbon .btn-ribbon-wrapper',
			'render_callback'     => 'shop_isle_display_ribbon_button',
			'container_inclusive' => true,
		)
	);
}

/**
 * Callback function for ribbon section
 *
 * @deprecated 2.2.41
 */
function shop_isle_ribbon_section_callback() {
	get_template_part( 'inc/sections/shop_isle_ribbon_section' );
}
/**
 * Callback function for ribbon text
 *
 * @return string - ribbon section text value
 * @deprecated 2.2.41
 */
function shop_isle_ribbon_text_section_callback() {
	return get_theme_mod( 'shop_isle_ribbon_text' );
}

/**
 * Add selective refresh for products slider section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_products_slider_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_products_slider_title',
		array(
			'selector'            => '.home-product-slider .home-prod-title',
			'render_callback'     => 'shop_isle_products_slider_title_section_callback',
			'container_inclusive' => false,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_products_slider_subtitle',
		array(
			'selector'            => '.home-product-slider .home-prod-subtitle',
			'render_callback'     => 'shop_isle_products_slider_subtitle_section_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Callback function for products slider title
 *
 * @return string - product slider section title value
 * @deprecated 2.2.41
 */
function shop_isle_products_slider_title_section_callback() {
	return get_theme_mod( 'shop_isle_products_slider_title' );
}

/**
 * Callback function for products slider subtitle
 *
 * @return string - products slider section subtitle value
 * @deprecated 2.2.41
 */
function shop_isle_products_slider_subtitle_section_callback() {
	return get_theme_mod( 'shop_isle_products_slider_subtitle' );
}

/**
 * Add selective refresh for map section
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_map_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_map_hide',
		array(
			'selector'            => '#map',
			'render_callback'     => 'shop_isle_map_section_callback',
			'container_inclusive' => true,
		)
	);
}

/**
 * Callback function for map section
 *
 * @deprecated 2.2.41
 */
function shop_isle_map_section_callback() {
	get_template_part( 'inc/sections/shop_isle_map_section' );
}

/**
 * Add selective refresh for categories section on frontpage
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_fp_categories_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_fp_categories_hide',
		array(
			'selector'            => '#categories',
			'render_callback'     => 'shop_isle_fp_categories_hide_callback',
			'container_inclusive' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_fp_categories_title',
		array(
			'selector'            => '#categories .home-prod-title',
			'render_callback'     => 'shop_isle_fp_categories_title_callback',
			'container_inclusive' => false,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_fp_categories_subtitle',
		array(
			'selector'            => '#categories .home-prod-subtitle',
			'render_callback'     => 'shop_isle_fp_categories_subtitle_callback',
			'container_inclusive' => false,
		)
	);
}

/**
 * Callback function for categories section on front page
 *
 * @deprecated 2.2.41
 */
function shop_isle_fp_categories_hide_callback() {
	get_template_part( 'inc/sections/shop_isle_fp_categories_section' );
}

/**
 * Callback function for categories title on front page
 *
 * @return string - categories title value
 * @deprecated 2.2.41
 */
function shop_isle_fp_categories_title_callback() {
	return get_theme_mod( 'shop_isle_fp_categories_title' );
}

/**
 * Callback function for categories subtitle on frontpage
 *
 * @return string - categories subtitle value
 * @deprecated 2.2.41
 */
function shop_isle_fp_categories_subtitle_callback() {
	return get_theme_mod( 'shop_isle_fp_categories_subtitle' );
}

/**
 * Add selective refresh for banners section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_fp_shortcodes_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_shortcodes_hide',
		array(
			'selector'            => '.home .shortcodes',
			'render_callback'     => 'shop_isle_fp_shortcode_hide_callback',
			'container_inclusive' => true,
		)
	);
}

/**
 * Callback function for shortcodes section on front page
 *
 * @deprecated 2.2.41
 */
function shop_isle_fp_shortcode_hide_callback() {
	get_template_part( 'inc/sections/shop_isle_shortcodes_section' );
}

/**
 * Callback function for Banners section
 *
 * @deprecated 2.2.41
 */
function shop_isle_banners_section_callback() {
	get_template_part( 'inc/sections/shop_isle_banners_section' );
}

/**
 * Callback function for Banners title
 *
 * @return string banners section title value
 * @deprecated 2.2.41
 */
function shop_isle_banners_title_callback() {
	return get_theme_mod( 'shop_isle_banners_title' );
}

/**
 * Callback function for products section
 *
 * @deprecated 2.2.41
 */
function shop_isle_products_section_callback() {
	get_template_part( 'inc/sections/shop_isle_products_section' );
}

/**
 * Callback function for products title
 *
 * @return string - products section title value
 * @deprecated 2.2.41
 */
function shop_isle_products_title_section_callback() {
	return get_theme_mod( 'shop_isle_products_title' );
}

/**
 * Callback function for services section
 *
 * @deprecated 2.2.41
 */
function shop_isle_services_section_callback() {
	get_template_part( 'inc/sections/shop_isle_services_section' );
}

/**
 * Callback function for services title
 *
 * @return string - services section title value
 * @deprecated 2.2.41
 */
function shop_isle_services_title_section_callback() {
	return get_theme_mod( 'shop_isle_services_title' );
}

/**
 * Callback function for services subtitle
 *
 * @return string - services section subtitle value
 * @deprecated 2.2.41
 */
function shop_isle_services_subtitle_section_callback() {
	return get_theme_mod( 'shop_isle_services_subtitle' );
}

/**
 * Callback function for video section
 *
 * @deprecated 2.2.41
 */
function shop_isle_video_section_callback() {
	get_template_part( 'inc/sections/shop_isle_video_section' );
}

/**
 * Callback function for video title
 *
 * @return string - video section title value
 * @deprecated 2.2.41
 */
function shop_isle_video_title_callback() {
	return get_theme_mod( 'shop_isle_video_title' );
}

/**
 * Add selective refresh for footer copyright and socials
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @deprecated 2.2.41
 */
function shop_isle_footer_copyright_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}
	$wp_customize->selective_refresh->add_partial(
		'shop_isle_socials',
		array(
			'selector'            => '.footer-social-links',
			'render_callback'     => 'shop_isle_footer_display_socials',
			'container_inclusive' => true,
			'fallback_refresh'    => false,
		)
	);
}
