<?php
/**
 * Customizer
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

/**
 * Register settings and controls for customize
 *
 * @since  1.0.0
 */
function shop_isle_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_setting( 'background_color' )->default = '';

	$wp_customize->remove_control( 'display_header_text' );

	/* Sections Customizing */

	$wp_customize->add_panel(
		'shop_isle_front_page_sections',
		array(
			'priority' => 42,
			'title'    => esc_html__( 'Frontpage sections', 'KharkivShop' ),
		)
	);

	/* Enqueue files for Scroll to top on front page sections */
	if ( file_exists( get_template_directory() . '/inc/customizer/customizer-scroll/class/class-shopisle-customize-control-scroll.php' ) ) {
		require_once get_template_directory() . '/inc/customizer/customizer-scroll/class/class-shopisle-customize-control-scroll.php';
	}

	if ( class_exists( 'shop_isle_Customize_Control_Scroll' ) ) {
		$scroller = new shop_isle_Customize_Control_Scroll;
	}
}
/**
 * Repeater Sanitization function
 *
 * @param string $input Input.
 * @return mixed|string|void
 */
function shop_isle_sanitize_repeater( $input ) {

	$input_decoded = json_decode( $input, true );
	$allowed_html  = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'a'      => array(
			'href'   => array(),
			'class'  => array(),
			'id'     => array(),
			'target' => array(),
		),
		'button' => array(
			'class' => array(),
			'id'    => array(),
		),
	);

	if ( ! empty( $input_decoded ) ) {
		foreach ( $input_decoded as $boxk => $box ) {
			foreach ( $box as $key => $value ) {
				if ( $key == 'text' ) {
					$value                          = html_entity_decode( $value );
					$input_decoded[ $boxk ][ $key ] = wp_kses( $value, $allowed_html );
				} else {
					$input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );
				}
			}
		}

		return json_encode( $input_decoded );
	}

	return $input;
}

/**
 * Sanitize checkbox output.
 */
function shop_isle_sanitize_checkbox( $input ) {
	return ( isset( $input ) && true === (bool) $input ? true : false );
}
