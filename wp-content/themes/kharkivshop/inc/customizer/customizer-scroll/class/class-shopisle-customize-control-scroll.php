<?php
/**
 * This class allows developers to implement scrolling to sections.
 *
 * @package    KharkivShop
 * @since      2.2.37
 * @author     Andrei Baicus <andrei@themeisle.com>
 * @copyright  Copyright (c) 2017, Themeisle
 * @link       http://themeisle.com/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Scroll to section.
 *
 * @since  2.2.37
 * @access public
 */
class shop_isle_Customize_Control_Scroll {

	/**
	 * shop_isle_Customize_Control_Scroll constructor.
	 */
	public function __construct() {
		add_action( 'customize_controls_init', array( $this, 'enqueue' ) );
		add_action( 'customize_preview_init', array( $this, 'helper_script_enqueue' ) );
	}

	/**
	 * The priority of the control.
	 *
	 * @since 2.2.37
	 * @var   string
	 */
	public $priority = 0;

	/**
	 * Loads the customizer script.
	 *
	 * @since  2.2.37
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'shopisle-scroller-script', get_template_directory_uri() . '/inc/customizer/customizer-scroll/js/script.js', array( 'jquery' ), '2.2.37', true );
	}

	/**
	 * Enqueue the partials handler script that works synchronously with the shopisle-scroller-script
	 */
	public function helper_script_enqueue() {
		wp_enqueue_script( 'shopisle-scroller-addon-script', get_template_directory_uri() . '/inc/customizer/customizer-scroll/js/customizer-addon-script.js', array( 'jquery' ), '2.2.37', true );
	}
}
