<?php
/**
 * Customizer functionality for the Very Top Bar.
 *
 * @package KharkivShop
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * A customizer control to display text in customizer.
 */
class shop_isle_Display_Text extends WP_Customize_Control {
	/**
	 * Control id
	 *
	 * @var string $id Control id.
	 */
	public $id = '';
	/**
	 * Button class.
	 *
	 * @var mixed|string
	 */
	public $button_class = '';
	/**
	 * Icon class.
	 *
	 * @var mixed|string
	 */
	public $icon_class = '';
	/**
	 * Button text.
	 *
	 * @var mixed|string
	 */
	public $button_text = '';
	/**
	 * shop_isle_Display_Text constructor.
	 *
	 * @param WP_Customize_Manager $manager Customizer manager.
	 * @param string               $id Control id.
	 * @param array                $args Argument.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$this->id = $id;
		if ( ! empty( $args['button_class'] ) ) {
			$this->button_class = $args['button_class'];
		}
		if ( ! empty( $args['icon_class'] ) ) {
			$this->icon_class = $args['icon_class'];
		}
		if ( ! empty( $args['button_text'] ) ) {
			$this->button_text = $args['button_text'];
		}
	}
	/**
	 * Render content for the control.
	 */
	public function render_content() {
		if ( ! empty( $this->button_text ) ) {
			echo '<button type="button" class="button menu-shortcut ' . esc_attr( $this->button_class ) . '" tabindex="0">';
			if ( ! empty( $this->button_class ) ) {
				echo '<i class="fa ' . esc_attr( $this->icon_class ) . '" style="margin-right: 10px"></i>';
			}
			echo esc_html( $this->button_text );
			echo '</button>';
		}
	}
}
