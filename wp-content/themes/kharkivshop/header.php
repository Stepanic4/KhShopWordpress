<?php
/**
 * The header for our theme.
 *
 * @package KharkivShop
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" type="image/png" href="favicon.ico">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php do_action( 'shop_isle_before_header' ); ?>

	<!-- Preloader -->
	<?php

	/* Preloader */
	if ( is_front_page() && ! is_customize_preview() ) :

		$shop_isle_disable_preloader = get_theme_mod( 'shop_isle_disable_preloader' );

		if ( isset( $shop_isle_disable_preloader ) && ( $shop_isle_disable_preloader != 1 ) ) :

			echo '<div class="page-loader">';
				echo '<div class="loader">' . __( 'Loading...', 'KharkivShop' ) . '</div>';
			echo '</div>';

		endif;

	endif;

	$header_class = '';
	$hide_top_bar = get_theme_mod( 'shop_isle_top_bar_hide', true );
	if ( (bool) $hide_top_bar === false ) {
		$header_class .= 'header-with-topbar';
	}
	?>

	<header class="header <?php echo esc_attr( $header_class ); ?>">
	<?php do_action( 'shop_isle_header' ); ?>

	<?php do_action( 'shop_isle_after_header' ); ?>

	</header>
