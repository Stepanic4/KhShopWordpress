<?php
/**
 * Contact page template instructions.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */


/**
 * Class ShopIsle_Contact_Page_Instructions
 */
class ShopIsle_Contact_Page_Instructions extends WP_Customize_Control {

	/**
	 * Render Content Function
	 */
	public function render_content() {
		echo __( 'To customize the Contact Page you need to first select the template "Contact page" for the page you want to use for this purpose. Then open that page in the browser and press "Customize" in the top bar.', 'KharkivShop' ) . '<br><br>' . sprintf(
			/* translators: 1: Link to documentation page. 2: 'doc' */
			__( 'Need further informations? Check this %1$s', 'KharkivShop' ),
			sprintf( '<a href="http://docs.themeisle.com/article/211-shopisle-customizing-the-contact-and-about-us-page" target="_blank">%s</a>', __( 'doc', 'KharkivShop' ) )
		);
	}
}
