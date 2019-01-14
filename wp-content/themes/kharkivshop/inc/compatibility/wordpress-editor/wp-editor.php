<?php
/**
 * Add compatibility for WP Editor
 *
 * @package ShopIsle
 */

/**
 * Class WP_Editor
 */
class WP_Editor extends Compatibility_Abstract {

	/**
	 * Init WordPress Editor integration.
	 */
	public function init() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue() {
		$this->enqueue_scripts();
		$this->enqueue_styles();
	}

	/**
	 * Enqueue js scripts.
	 */
	private function enqueue_scripts() {
		wp_enqueue_script( 'wp-editor-integration', shop_isle_PHP_INCLUDE_URI . '/compatibility/wordpress-editor/wp-editor-scripts.js', array( 'jquery' ), SI_VERSION, true );
		$editor_params = $this->get_wp_editor_params();
		if ( ! empty( $editor_params ) ) {
			wp_localize_script( 'wp-editor-integration', 'siEditor', $editor_params );
		}
	}

	/**
	 * Get WordPress Editor script parameters.
	 */
	private function get_wp_editor_params() {
		$pid = get_the_ID();
		return array(
			'has_sidebar'    => is_active_sidebar( 'sidebar-1' ),
			'post_thumbnail' => get_the_post_thumbnail_url( $pid ),
			'header_image'   => get_header_image(),
			'strings'        => array(
				'sidebar' => __( 'Sidebar', 'KharkivShop' ),
			),
		);
	}

	/**
	 * Enqueue styles.
	 */
	private function enqueue_styles() {
		wp_enqueue_style( 'shopisle-editor-style', shop_isle_PHP_INCLUDE_URI . '/compatibility/wordpress-editor/wp-editor-style.css', array(), SI_VERSION );
		$this->add_editor_inline_style();
	}

	/**
	 * Add inline style for editor.
	 */
	private function add_editor_inline_style() {
		$font_size = get_theme_mod( 'shop_isle_font_size' );
		if ( empty( $font_size ) ) {
			return;
		}
		$font_size_css = '
		.editor-styles-wrapper .editor-writing-flow p,
		.editor-styles-wrapper pre,
		.wp-block-freeform.block-library-rich-text__tinymce pre,
		.editor-writing-flow{ font-size:' . $font_size . '}';
		wp_add_inline_style( 'shopisle-editor-style', $font_size_css );
	}
}
