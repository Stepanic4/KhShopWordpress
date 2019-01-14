<?php
/**
 * Customizer functionality for the Footer.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

/**
 * Hook controls for Footer to Customizer.
 */
function shop_isle_footer_customize_register( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*  Footer */

	$wp_customize->add_section(
		'shop_isle_footer_section',
		array(
			'title'    => __( 'Footer', 'KharkivShop' ),
			'priority' => 50,
		)
	);

	/* Copyright */
	$wp_customize->add_setting(
		'shop_isle_copyright',
		array(
			'sanitize_callback' => 'shop_isle_sanitize_text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'shop_isle_copyright',
		array(
			'label'    => __( 'Copyright', 'KharkivShop' ),
			'section'  => 'shop_isle_footer_section',
			'priority' => 1,
		)
	);

	/* Hide site info */
	$wp_customize->add_setting(
		'shop_isle_site_info_hide',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'shop_isle_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'shop_isle_site_info_hide',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Hide site info?', 'KharkivShop' ),
			'section'  => 'shop_isle_footer_section',
			'priority' => 2,
		)
	);

	/* socials */
	$wp_customize->add_setting(
		'shop_isle_socials',
		array(
			'transport'         => $selective_refresh,
			'sanitize_callback' => 'shop_isle_sanitize_repeater',
		)
	);

	$wp_customize->add_control(
		new shop_isle_Repeater_Controler(
			$wp_customize,
			'shop_isle_socials',
			array(
				'label'                         => __( 'Add new social', 'KharkivShop' ),
				'section'                       => 'shop_isle_footer_section',
				'active_callback'               => 'is_front_page',
				'priority'                      => 3,
				'shop_isle_image_control'       => false,
				'shop_isle_link_control'        => true,
				'shop_isle_text_control'        => false,
				'shop_isle_subtext_control'     => false,
				'shop_isle_label_control'       => false,
				'shop_isle_icon_control'        => true,
				'shop_isle_description_control' => false,
				'shop_isle_box_label'           => __( 'Social', 'KharkivShop' ),
				'shop_isle_box_add_label'       => __( 'Add new social', 'KharkivShop' ),
			)
		)
	);
}

add_action( 'customize_register', 'shop_isle_footer_customize_register' );

/**
 * Callback function for footer copyright
 *
 * @return string - footer copyright value
 */
function shop_isle_footer_copyright_callback() {
	return get_theme_mod( 'shop_isle_copyright' );
}

/**
 * Render function for footer social icons
 */
function shop_isle_footer_display_socials() {

	$shop_isle_socials = get_theme_mod( 'shop_isle_socials' );
	if ( empty( $shop_isle_socials ) ) {
		if ( is_customize_preview() ) {
			echo '<div class="footer-social-links"></div>';
		}
		return '';
	}

	$shop_isle_socials_decoded = json_decode( $shop_isle_socials );
	if ( empty( $shop_isle_socials_decoded ) ) {
		if ( is_customize_preview() ) {
			echo '<div class="footer-social-links"></div>';
		}
		return '';
	}

	$markup = '<div class="footer-social-links">';

	foreach ( $shop_isle_socials_decoded as $shop_isle_social ) {

		$icon_value = ! empty( $shop_isle_social->icon_value ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_social->icon_value, 'Footer socials' ) : '';
		$link       = ! empty( $shop_isle_social->link ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_social->link, 'Footer socials' ) : '';

		if ( ! empty( $icon_value ) && ! empty( $link ) ) {
			$markup .= '<a href="' . esc_url( $link ) . '" target="_blank"><span class="' . esc_attr( $icon_value ) . '"></span></a>';
		}
	}

	$markup .= '</div>';

	return $markup;
}
