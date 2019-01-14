<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package KharkivShop
 */

if ( ! function_exists( 'shop_isle_product_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_product_categories( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters(
				'shop_isle_product_categories_args',
				array(
					'limit'            => 3,
					'columns'          => 3,
					'child_categories' => 0,
					'orderby'          => 'name',
					'title'            => __( 'Product Categories', 'KharkivShop' ),
				)
			);

			echo '<section class="KharkivShop-product-section KharkivShop-product-categories">';

			do_action( 'shop_isle_homepage_before_product_categories' );

			echo '<h2 class="section-title">' . esc_attr( $args['title'] ) . '</h2>';
			echo do_shortcode( '[product_categories number="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '" orderby="' . esc_attr( $args['orderby'] ) . '" parent="' . esc_attr( $args['child_categories'] ) . '"]' );

			do_action( 'shop_isle_homepage_after_product_categories' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'shop_isle_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_recent_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters(
				'shop_isle_recent_products_args',
				array(
					'limit'   => 4,
					'columns' => 4,
					'title'   => __( 'Recent Products', 'KharkivShop' ),
				)
			);

			echo '<section class="KharkivShop-product-section KharkivShop-recent-products">';

			do_action( 'shop_isle_homepage_before_recent_products' );

			echo '<h2 class="section-title">' . esc_attr( $args['title'] ) . '</h2>';
			echo do_shortcode( '[recent_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

			do_action( 'shop_isle_homepage_after_recent_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'shop_isle_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_featured_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters(
				'shop_isle_featured_products_args',
				array(
					'limit'   => 4,
					'columns' => 4,
					'orderby' => 'date',
					'order'   => 'desc',
					'title'   => __( 'Featured Products', 'KharkivShop' ),
				)
			);

			echo '<section class="KharkivShop-product-section KharkivShop-featured-products">';

			do_action( 'shop_isle_homepage_before_featured_products' );

			echo '<h2 class="section-title">' . esc_attr( $args['title'] ) . '</h2>';
			echo do_shortcode( '[featured_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '" orderby="' . esc_attr( $args['orderby'] ) . '" order="' . esc_attr( $args['order'] ) . '"]' );

			do_action( 'shop_isle_homepage_after_featured_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'shop_isle_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_popular_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters(
				'shop_isle_popular_products_args',
				array(
					'limit'   => 4,
					'columns' => 4,
					'title'   => __( 'Top Rated Products', 'KharkivShop' ),
				)
			);

			echo '<section class="KharkivShop-product-section KharkivShop-popular-products">';

			do_action( 'shop_isle_homepage_before_popular_products' );

			echo '<h2 class="section-title">' . esc_attr( $args['title'] ) . '</h2>';
			echo do_shortcode( '[top_rated_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

			do_action( 'shop_isle_homepage_after_popular_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'shop_isle_on_sale_products' ) ) {
	/**
	 * Display On Sale Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_on_sale_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters(
				'shop_isle_on_sale_products_args',
				array(
					'limit'   => 4,
					'columns' => 4,
					'title'   => __( 'On Sale', 'KharkivShop' ),
				)
			);

			echo '<section class="KharkivShop-product-section KharkivShop-on-sale-products">';

			do_action( 'shop_isle_homepage_before_on_sale_products' );

			echo '<h2 class="section-title">' . esc_attr( $args['title'] ) . '</h2>';
			echo do_shortcode( '[sale_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

			do_action( 'shop_isle_homepage_after_on_sale_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'shop_isle_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function shop_isle_homepage_content() {
		while ( have_posts() ) :
			the_post();

			get_template_part( 'content', 'page' );

		endwhile; // end of the loop.
	}
}

if ( ! function_exists( 'shop_isle_social_icons' ) ) {
	/**
	 * Display social icons
	 * If the subscribe and connect plugin is active, display the icons.
	 *
	 * @link http://wordpress.org/plugins/subscribe-and-connect/
	 * @since 1.0.0
	 */
	function shop_isle_social_icons() {
		if ( class_exists( 'Subscribe_And_Connect' ) ) {
			echo '<div class="subscribe-and-connect-connect">';
			subscribe_and_connect_connect();
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'shop_isle_get_sidebar' ) ) {
	/**
	 * Display sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function shop_isle_get_sidebar() {
		get_sidebar();
	}
}


if ( ! function_exists( 'shop_isle_get_sidebar_shop_archive' ) ) {
	/**
	 * Display sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function shop_isle_get_sidebar_shop_archive() {
		get_sidebar( 'shop-archive' );
	}
}

if ( ! function_exists( 'shop_isle_the_very_top_bar' ) ) {
	/**
	 * Function to display Very Top Bar.
	 *
	 * @param bool $is_callback Check if we need to add KharkivShop-top-bar div.
	 * @access public
	 */
	function shop_isle_the_very_top_bar( $is_callback = false ) {

		$hide_top_bar = get_theme_mod( 'shop_isle_top_bar_hide', true );
		if ( (bool) $hide_top_bar === true ) {
			return;
		}

		$shop_isle_top_bar_alignment = get_theme_mod( 'shop_isle_top_bar_alignment', 'right' );
		$menu_class                  = 'pull-right';
		$sidebar_class               = 'pull-left';

		if ( ! empty( $shop_isle_top_bar_alignment ) && $shop_isle_top_bar_alignment === 'left' ) {
			$menu_class    = 'pull-left';
			$sidebar_class = 'pull-right';
		}

		if ( $is_callback !== true ) {
			echo '<div class="KharkivShop-top-bar">';
		}

		echo '<div class="container">';
			echo '<div class="row">';

			/**
			 * Call for sidebar
			 */
		if ( is_active_sidebar( 'sidebar-top-bar' ) ) {
			$sidebar_class .= ' col-md-6';
			if ( ! has_nav_menu( 'top-bar-menu' ) && ! current_user_can( 'manage_options' ) ) {
				$sidebar_class .= ' col-md-12';
			}
			echo '<div class="' . esc_attr( $sidebar_class ) . '">';
				dynamic_sidebar( 'sidebar-top-bar' );
			echo '</div>';
		}
		if ( is_active_sidebar( 'sidebar-top-bar' ) ) {
			$menu_class .= ' col-md-6';
		} else {
			$menu_class .= ' col-md-12';
		}

			echo '<div class="' . esc_attr( $menu_class ) . '">';
				/**
				 * Call for the menu
				 */
				wp_nav_menu(
					array(
						'theme_location' => 'top-bar-menu',
						'depth'          => 1,
						'container'      => 'div',
						'container_id'   => 'top-bar-navigation',
						'menu_class'     => 'nav top-bar-nav',
					)
				);
			echo '</div>';
		echo '</div>';
		echo '</div>';
		if ( $is_callback !== true ) {
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'shop_isle_hidden_sidebars' ) ) {
	/**
	 * Fix for sections with widgets not appearing anymore after the hide button is selected for each section.
	 */
	function shop_isle_hidden_sidebars() {

		echo '<div style="display: none">';

		if ( is_customize_preview() ) {
			dynamic_sidebar( 'sidebar-top-bar' );
		}

		echo '</div>';
	}
}

add_action( 'shop_isle_footer', 'shop_isle_hidden_sidebars' );
