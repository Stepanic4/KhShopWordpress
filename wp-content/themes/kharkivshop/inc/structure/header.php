<?php
/**
 * Template functions used for the site header.
 *
 * @package KharkivShop
 */

if ( ! function_exists( 'shop_isle_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_primary_navigation() {

		$navbar_class = '';
		$hide_top_bar = get_theme_mod( 'shop_isle_top_bar_hide', true );
		if ( (bool) $hide_top_bar === false ) {
			$navbar_class .= ' header-with-topbar ';
		}

		$shop_isle_blog_case             = 0;
		$shop_isle_front_page_case       = 0;
		$shop_isle_default_template_case = 0;

		$shop_isle_wporg_flag = get_option( 'shop_isle_wporg_flag' );

		if ( ! empty( $shop_isle_wporg_flag ) && ( 'true' === $shop_isle_wporg_flag ) ) {

			if ( 'page' == get_option( 'show_on_front' ) ) {
				$shop_isle_keep_old_fp_template = get_theme_mod( 'shop_isle_keep_old_fp_template' );
				if ( ! $shop_isle_keep_old_fp_template && is_front_page() ) {
					$shop_isle_front_page_case = 1;
				}
			}
		} else {
			if ( 'posts' == get_option( 'show_on_front' ) && is_front_page() ) {
				$shop_isle_front_page_case = 1;
			}
		}

		if ( $shop_isle_front_page_case ) {
			$navbar_class .= ' navbar-color-on-scroll navbar-transparent ';
		}

		?>
		<!-- Navigation start -->
		<nav class="navbar navbar-custom navbar-fixed-top <?php echo esc_attr( $navbar_class ); ?>" role="navigation">

		<div class="container">
		<div class="header-container">

		<div class="navbar-header">
		<?php

		echo '<div class="shop_isle_header_title"><div class="KharkivShop-header-title-inner">';

		// Logo selected
		if ( has_custom_logo() ) {

			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}

			if ( is_customize_preview() ) {
				// Front page
				if ( is_front_page() ) {
					echo '<h1 class="site-title shop_isle_hidden_if_not_customizer"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
					// Other page
				} else {
					echo '<p class="site-title shop_isle_hidden_if_not_customizer"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
				}
			}

			// Without logo
		} else {
			if ( is_customize_preview() ) {
				echo ' <a href="' . esc_url( home_url( '/' ) ) . '" class="logo-image shop_isle_hidden_if_not_customizer"><img src=""></a>';
			}

			// Front page
			if ( is_front_page() ) {
				echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
				// Other page
			} else {
				echo '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
			}

			echo '<p class="site-description"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '" rel="home">' . get_bloginfo( 'description' ) . '</a></p>';
		}
		echo '</div></div>';
		?>

						<div type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
							<span class="sr-only"><?php _e( 'Toggle navigation', 'KharkivShop' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
					</div>

					<div class="header-menu-wrap">
						<div class="collapse navbar-collapse" id="custom-collapse">

							<?php

							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'container'      => false,
									'menu_class'     => 'nav navbar-nav navbar-right',
								)
							);
							?>

						</div>
					</div>

					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<div class="navbar-cart">

							<div class="header-search">
								<div class="glyphicon glyphicon-search header-search-button"></div>
								<div class="header-search-input">
									<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'KharkivShop' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'KharkivShop' ); ?>" />
										<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'KharkivShop' ); ?>" />
										<input type="hidden" name="post_type" value="product" />
									</form>
								</div>
							</div>

							<?php if ( function_exists( 'WC' ) ) : ?>
								<div class="navbar-cart-inner">
									<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'KharkivShop' ); ?>" class="cart-contents">
										<span class="icon-basket"></span>
										<span class="cart-item-number"><?php echo esc_html( trim( WC()->cart->get_cart_contents_count() ) ); ?></span>
									</a>
									<?php apply_filters( 'shop_isle_cart_icon', '' ); ?>
								</div>
							<?php endif; ?>

						</div>
					<?php endif; ?>

				</div>
			</div>

		</nav>
		<!-- Navigation end -->
		<?php
	}
}// End if().
