<?php
/**
 * Customizer functionality for the Slider Section.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

/**
 * Hook controls for Big Title Section to Customizer.
 */
function shop_isle_big_title_controls_customize_register( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/* Big title section */

	$wp_customize->add_section(
		'shop_isle_big_title_section',
		array(
			'title'    => __( 'Big title section', 'KharkivShop' ),
			'priority' => 10,
			'panel'    => 'shop_isle_front_page_sections',
		)
	);

	/* Hide big title section */
	$wp_customize->add_setting(
		'shop_isle_big_title_hide',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'shop_isle_big_title_hide',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Hide big title section?', 'KharkivShop' ),
			'section'  => 'shop_isle_big_title_section',
			'priority' => 1,
		)
	);

	/* Image */
	$wp_customize->add_setting(
		'shop_isle_big_title_image',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => get_template_directory_uri() . '/assets/images/slide1.jpg',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shop_isle_big_title_image',
			array(
				'label'    => __( 'Image', 'KharkivShop' ),
				'section'  => 'shop_isle_big_title_section',
				'priority' => 2,
			)
		)
	);

	/* Title */
	$wp_customize->add_setting(
		'shop_isle_big_title_title',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'default'           => 'KharkivShop',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'shop_isle_big_title_title',
		array(
			'label'    => __( 'Title', 'KharkivShop' ),
			'section'  => 'shop_isle_big_title_section',
			'priority' => 3,
		)
	);

	/* Subtitle */
	$wp_customize->add_setting(
		'shop_isle_big_title_subtitle',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'default'           => __( 'WooCommerce Theme', 'KharkivShop' ),
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'shop_isle_big_title_subtitle',
		array(
			'label'    => __( 'Subtitle', 'KharkivShop' ),
			'section'  => 'shop_isle_big_title_section',
			'priority' => 4,
		)
	);

	/* Button label */
	$wp_customize->add_setting(
		'shop_isle_big_title_button_label',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'default'           => __( 'Read more', 'KharkivShop' ),
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'shop_isle_big_title_button_label',
		array(
			'label'    => __( 'Button label', 'KharkivShop' ),
			'section'  => 'shop_isle_big_title_section',
			'priority' => 5,
		)
	);

	/* Button link */
	$wp_customize->add_setting(
		'shop_isle_big_title_button_link',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'default'           => __( '#', 'KharkivShop' ),
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'shop_isle_big_title_button_link',
		array(
			'label'    => __( 'Button link', 'KharkivShop' ),
			'section'  => 'shop_isle_big_title_section',
			'priority' => 6,
		)
	);

}
add_action( 'customize_register', 'shop_isle_big_title_controls_customize_register' );


/**
 * Add selective refresh for Big Title section controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shop_isle_big_title_section_register_partials( $wp_customize ) {
	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial(
		'shop_isle_big_title_title',
		array(
			'selector'            => '.home .hero-slider .slides li .hs-title-size-4',
			'render_callback'     => 'shop_isle_big_title_section_title_callback',
			'container_inclusive' => false,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'shop_isle_big_title_subtitle',
		array(
			'selector'            => '.home .hero-slider .slides li .hs-title-size-1',
			'render_callback'     => 'shop_isle_big_title_section_subtitle_callback',
			'container_inclusive' => false,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'shop_isle_big_title_button_label',
		array(
			'selector'            => '.home .hero-slider .slides li .btn.btn-border-w',
			'render_callback'     => 'shop_isle_big_title_section_display_button',
			'container_inclusive' => true,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'shop_isle_big_title_button_link',
		array(
			'selector'            => '.home .hero-slider .slides li .btn.btn-border-w',
			'render_callback'     => 'shop_isle_big_title_section_display_button',
			'container_inclusive' => true,
		)
	);

}

add_action( 'customize_register', 'shop_isle_big_title_section_register_partials' );

/**
 * Callback function for Big Title section title
 *
 * @return string - title value
 */
function shop_isle_big_title_section_title_callback() {
	return get_theme_mod( 'shop_isle_big_title_title' );
}

/**
 * Callback function for Big Title section subtitle
 *
 * @return string - subtitle value
 */
function shop_isle_big_title_section_subtitle_callback() {
	return get_theme_mod( 'shop_isle_big_title_subtitle' );
}

/**
 * Render function for Big Title button
 */
function shop_isle_big_title_section_display_button() {

	$shop_isle_big_title_button_label = get_theme_mod( 'shop_isle_big_title_button_label', __( 'Read more', 'KharkivShop' ) );
	$shop_isle_big_title_button_link  = get_theme_mod( 'shop_isle_big_title_button_link', __( '#', 'KharkivShop' ) );

	if ( ! empty( $shop_isle_big_title_button_label ) && ! empty( $shop_isle_big_title_button_link ) ) {
		echo '<a href="' . esc_url( $shop_isle_big_title_button_link ) . '" class="section-scroll btn btn-border-w btn-round">' . $shop_isle_big_title_button_label . '</a>';
	} else {
		if ( is_customize_preview() ) {
			echo '<a href class="section-scroll btn btn-border-w btn-round si-hidden-in-customizer"></a>';
		}
	}
}
