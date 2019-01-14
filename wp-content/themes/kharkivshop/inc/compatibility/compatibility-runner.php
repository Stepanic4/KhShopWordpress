<?php
/**
 * This class runs the compatibility for plugins.
 *
 * @package ShopIsle
 */

/**
 * Require abstract class.
 */
require shop_isle_COMPATIBILITY_DIR . '/compatibility-abstract.php';

/**
 * Class Compatibility_Runner
 */
class Compatibility_Runner {

	/**
	 * Init function.
	 */
	public function init() {
		$modules = array(
			'WP_Editor' => shop_isle_COMPATIBILITY_DIR . '/wordpress-editor/wp-editor.php',
		);

		foreach ( $modules as $class_name => $class_path ) {
			if ( ! file_exists( $class_path ) ) {
				continue;
			}

			require_once( $class_path );
			$module = new $class_name;
			if ( ! $module->should_run() ) {
				continue;
			}
			$module->init();
		}
	}
}
