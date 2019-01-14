<?php
/**
 * Abstract function for compatibility modules.
 *
 * @package ShopIsle
 */

/**
 * Class Compatibility_Abstract
 */
abstract class Compatibility_Abstract {

	/**
	 * Initialize the control. Add all the hooks necessary.
	 */
	abstract public function init();

	/**
	 * Decide if the class should execute or not
	 */
	public function should_run() {
		return true;
	}
}
