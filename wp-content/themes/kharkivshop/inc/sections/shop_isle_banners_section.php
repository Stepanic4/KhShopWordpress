<?php
/**
 * The Banners Section
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

$shop_isle_banners_hide = get_theme_mod( 'shop_isle_banners_hide' );
$section_style          = '';
if ( ! empty( $shop_isle_banners_hide ) && (bool) $shop_isle_banners_hide === true ) {
	if ( is_customize_preview() ) {
		$section_style = 'style="display: none"';
	} else {
		return;
	}
}

$shop_isle_banners = get_theme_mod(
	'shop_isle_banners',
	json_encode(
		array(
			array(
				'image_url' => get_template_directory_uri() . '/assets/images/banner1.jpg',
				'link'      => '#',
			),
			array(
				'image_url' => get_template_directory_uri() . '/assets/images/banner2.jpg',
				'link'      => '#',
			),
			array(
				'image_url' => get_template_directory_uri() . '/assets/images/banner3.jpg',
				'link'      => '#',
			),
		)
	)
);

echo '<section id="banners" class="module-small home-banners" ' . $section_style . '>';
shop_isle_display_customizer_shortcut( 'shop_isle_banners_section' );
if ( empty( $shop_isle_banners ) ) {
	echo '</section>';

	return;
}

$shop_isle_banners_decoded = json_decode( $shop_isle_banners );
if ( empty( $shop_isle_banners_decoded ) ) {
	echo '</section>';

	return;
}

$shop_isle_banners_title = get_theme_mod( 'shop_isle_banners_title' );
$shop_isle_banners_title = ! empty( $shop_isle_banners_title ) ? $shop_isle_banners_title : '';
echo '<div class="container">';

if ( ! empty( $shop_isle_banners_title ) || is_customize_preview() ) {
	echo '<div class="row">';
	echo '<div class="col-sm-6 col-sm-offset-3">';
	echo '<h2 class="module-title font-alt product-banners-title">' . $shop_isle_banners_title . '</h2>';
	echo '</div>';
	echo '</div>';

}

echo '<div class="row shop_isle_bannerss_section">';
foreach ( $shop_isle_banners_decoded as $shop_isle_banner ) {

	$image_url = ! empty( $shop_isle_banner->image_url ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_banner->image_url, 'Banners section' ) : '';
	if ( empty( $image_url ) ) {
		continue;
	}

	$link                = ! empty( $shop_isle_banner->link ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_banner->link, 'Banners section' ) : '';
	$shop_isle_alt_image = '';
	$image_id            = function_exists( 'attachment_url_to_postid' ) ? attachment_url_to_postid( preg_replace( '/-\d{1,4}x\d{1,4}/i', '', $image_url ) ) : '';
	if ( ! empty( $image_id ) && $image_id !== 0 ) {
		$shop_isle_alt_image = 'alt="' . esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) . '"';
	}

	echo '<div class="col-sm-4"><div class="content-box mt-0 mb-0"><div class="content-box-image">';
	$image_markup = '<a><img src="' . esc_url( $image_url ) . '"></a>';
	if ( ! empty( $link ) ) {
		$image_markup = '<a href="' . esc_url( $link ) . '"><img src="' . esc_url( $image_url ) . '" ' . $shop_isle_alt_image . '></a>';
	}
	echo $image_markup;
	echo '</div></div></div>';
}

echo '</div>';
echo '</div>';
echo '</section>';

