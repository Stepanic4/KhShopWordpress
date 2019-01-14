<?php
/**
 * Front page Latest Products Section
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

$shop_isle_products_hide = get_theme_mod( 'shop_isle_products_hide', false );
$section_style           = '';
if ( ! empty( $shop_isle_products_hide ) && (bool) $shop_isle_products_hide === true ) {
	if ( is_customize_preview() ) {
		$section_style = 'style="display: none"';
	} else {
		return;
	}
}

echo '<section id="latest" class="module-small" ' . $section_style . '>';
shop_isle_display_customizer_shortcut( 'shop_isle_products_section' );
echo '<div class="container">';


/**
 * Display section titke
 */
$default = false;
if ( current_user_can( 'edit_theme_options' ) ) {
	$default = esc_html__( 'Latest products', 'KharkivShop' );
}
$shop_isle_products_title = get_theme_mod( 'shop_isle_products_title', $default );
$shop_isle_products_title = ! empty( $shop_isle_products_title ) ? $shop_isle_products_title : '';
if ( ! empty( $shop_isle_products_title ) || is_customize_preview() ) {
	echo '<div class="row">';
	echo '<div class="col-sm-6 col-sm-offset-3">';
	echo '<h2 class="module-title font-alt product-banners-title">' . $shop_isle_products_title . '</h2>';
	echo '</div>';
	echo '</div>';

}

/**
 *  WooCommerce shortcode.
 */
$shop_isle_products_shortcode = get_theme_mod( 'shop_isle_products_shortcode' );
if ( ! empty( $shop_isle_products_shortcode ) ) {
	echo '<div class="products_shortcode">';
	echo do_shortcode( $shop_isle_products_shortcode );
	echo '</div>';
	echo '</div><!-- .container -->';
	echo '</section>';

	return;
}


$shop_isle_latest_args = array(
	'post_type'      => 'product',
	'posts_per_page' => 8,
	'orderby'        => 'date',
	'order'          => 'DESC',
);

$shop_isle_products_category = get_theme_mod( 'shop_isle_products_category' );
if ( ! empty( $shop_isle_products_category ) && $shop_isle_products_category != '-' ) {
	$shop_isle_latest_args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $shop_isle_products_category,
		),
	);
}


$tax_query_item = array();
if ( taxonomy_exists( 'product_visibility' ) ) {
	$tax_query_item = array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'exclude-from-catalog',
			'operator' => 'NOT IN',

		),
	);
}
if ( ! empty( $tax_query_item ) ) {
	$shop_isle_latest_args['tax_query']['relation'] = 'AND';
	$shop_isle_latest_args['tax_query']             = array_merge( $shop_isle_latest_args['tax_query'], $tax_query_item );
}

$meta_query_item = array(
	'key'     => '_visibility',
	'value'   => 'hidden',
	'compare' => '!=',
);
if ( ! empty( $meta_query_item ) ) {
	$shop_isle_latest_args['meta_query'] = $meta_query_item;
}


$shop_isle_latest_loop = new WP_Query( $shop_isle_latest_args );
if ( $shop_isle_latest_loop->have_posts() === false && current_user_can( 'edit_theme_options' ) ) {
	echo '<div class="row">';
	echo '<div class="col-sm-6 col-sm-offset-3">';
	if ( ! empty( $shop_isle_products_category ) && ( $shop_isle_products_category != '-' ) ) {
		echo '<p class="">' . __( 'No products found.', 'KharkivShop' ) . '</p>';
	} else {
		echo '<p class="">' . __( 'For this section to work, you first need to install the WooCommerce plugin , create some products, and insert a WooCommerce shortocode or select a product category in Customize -> Frontpage sections -> Products section', 'KharkivShop' ) . '</p>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div><!-- .container -->';
	echo '</section>';

	return;
}
echo '<div class="row multi-columns-row">';

while ( $shop_isle_latest_loop->have_posts() ) {

	$shop_isle_latest_loop->the_post();
	global $product;
	echo '<div class="col-sm-6 col-md-3 col-lg-3">';
	echo '<div class="shop-item">';
	echo '<div class="shop-item-image">';

	$shop_isle_gallery_attachment_ids = false;
	if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_gallery_image_ids' ) ) {
		$shop_isle_gallery_attachment_ids = $product->get_gallery_image_ids();
	} elseif ( function_exists( 'method_exists' ) && method_exists( $product, 'get_gallery_attachment_ids' ) ) {
		$shop_isle_gallery_attachment_ids = $product->get_gallery_attachment_ids();
	}

	if ( has_post_thumbnail( $shop_isle_latest_loop->post->ID ) ) {
		echo get_the_post_thumbnail( $shop_isle_latest_loop->post->ID, 'shop_catalog' );

		if ( $shop_isle_gallery_attachment_ids ) {
			echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[0], 'shop_catalog' );
		}
	} elseif ( $shop_isle_gallery_attachment_ids ) {

		if ( $shop_isle_gallery_attachment_ids[0] ) {
			echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[0], 'shop_catalog' );
		}

		if ( $shop_isle_gallery_attachment_ids[1] ) {
			echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[1], 'shop_catalog' );
		}
	} else {
		if ( function_exists( 'wc_placeholder_img_src' ) ) {
			echo '<img src="' . esc_url( wc_placeholder_img_src() ) . '" alt="Placeholder" width="65px" height="115px" />';
		}
	}

	echo '<div class="shop-item-detail">';
	if ( ! empty( $product ) ) {
		echo do_shortcode( '[add_to_cart id="' . $shop_isle_latest_loop->post->ID . '" show_price="no"]' );
		if ( function_exists( 'wccm_add_button' ) ) {
			wccm_add_button();
		}
		if ( defined( 'YITH_WCQV' ) ) {
			if ( ! empty( $shop_isle_products_category ) && ( $shop_isle_products_category != '-' ) ) {
				echo '<a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr( get_the_ID() ) . '">' . __( 'Quick View', 'KharkivShop' ) . '</a>';
			} else {
				$label = esc_html( get_option( 'yith-wcqv-button-label' ) );
				echo '<a class="button yith-wcqv-button" data-product_id="' . esc_attr( get_the_ID() ) . '">';
				if ( ! empty( $label ) ) {
					echo $label;
				} else {
					echo __( 'Quick View', 'KharkivShop' );
				}
				echo '</a>';
			}
		}

		echo '</div>';
		echo '</div>';
		echo '<h4 class="shop-item-title font-alt"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h4>';
		$rating_html = '';
		if ( function_exists( 'method_exists' ) && ( function_exists( 'wc_get_rating_html' ) ) && method_exists( $product, 'get_average_rating' ) ) {
			$shop_isle_avg = $product->get_average_rating();
			if ( ! empty( $shop_isle_avg ) ) {
				$rating_html = wc_get_rating_html( $shop_isle_avg );
			}
		} elseif ( function_exists( 'method_exists' ) && method_exists( $product, 'get_rating_html' ) && method_exists( $product, 'get_average_rating' ) ) {
			$shop_isle_avg = $product->get_average_rating();
			if ( ! empty( $shop_isle_avg ) ) {
				$rating_html = $product->get_rating_html( $shop_isle_avg );
			}
		}
		if ( ! empty( $rating_html ) && get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
			echo '<div class="product-rating-home">' . $rating_html . '</div>';
		}
		if ( function_exists( 'method_exists' ) && method_exists( $product, 'is_on_sale' ) ) {
			if ( $product->is_on_sale() ) {
				if ( function_exists( 'woocommerce_show_product_sale_flash' ) ) {
					woocommerce_show_product_sale_flash();
				}
			}
		}
		if ( function_exists( 'method_exists' ) && method_exists( $product, 'managing_stock' ) && method_exists( $product, 'is_in_stock' ) ) {
			if ( ! $product->managing_stock() && ! $product->is_in_stock() ) {
				echo '<span class="onsale stock out-of-stock">' . esc_html__( 'Out of Stock', 'KharkivShop' ) . '</span>';
			}
		}
		$shop_isle_price = '';
		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_price_html' ) ) {
			$shop_isle_price = $product->get_price_html();
		}
		if ( ! empty( $shop_isle_price ) ) {
			echo wp_kses_post( $shop_isle_price );
		}
		echo '</div>';
		echo '</div>';
	}
}
echo '</div>';

echo '<div class="row mt-30">';
echo '<div class="col-sm-12 align-center">';
if ( function_exists( 'wc_get_page_id' ) ) {
	echo '<a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" class="btn btn-b btn-round">' . apply_filters( 'shop_isle_see_all_products_label', __( 'See all products', 'KharkivShop' ) ) . '</a>';
} elseif ( function_exists( 'woocommerce_get_page_id' ) ) {
	echo '<a href="' . esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ) . '" class="btn btn-b btn-round">' . apply_filters( 'shop_isle_see_all_products_label', __( 'See all products', 'KharkivShop' ) ) . '</a>';
}
echo '</div>';
echo '</div>';


wp_reset_postdata();

echo '</div><!-- .container -->';

echo '</section>';
