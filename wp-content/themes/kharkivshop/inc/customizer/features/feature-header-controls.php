<?php
/**
 * Customizer functionality for the Header Section.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */
/**
 * Hook controls for Header Section section to Customizer.
 */
function shop_isle_header_controls_customize_register( $wp_customize ) {
	/*  Header */
	$wp_customize->add_section(
		'shop_isle_header_section',
		array(
			'title'    => __( 'Header', 'KharkivShop' ),
			'priority' => 40,
		)
	);
	$wp_customize->get_control( 'header_image' )->section  = 'shop_isle_header_section';
	$wp_customize->get_control( 'header_image' )->priority = '2';
}
add_action( 'customize_register', 'shop_isle_header_controls_customize_register', 10 );
