<?php
/**
 * Template functions used for the site footer.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */

if ( ! function_exists( 'shop_isle_footer_widgets' ) ) {
	/**
	 * Display the footer widgets
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_footer_widgets() {
		?>
		<!-- Widgets start -->

		<?php if ( is_active_sidebar( 'sidebar-footer-area-1' ) || is_active_sidebar( 'sidebar-footer-area-2' ) || is_active_sidebar( 'sidebar-footer-area-3' ) || is_active_sidebar( 'sidebar-footer-area-4' ) ) : ?>

		<div class="module-small bg-dark shop_isle_footer_sidebar">
			<div class="container">
				<div class="row">

					<?php if ( is_active_sidebar( 'sidebar-footer-area-1' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar( 'sidebar-footer-area-1' ); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

					<?php if ( is_active_sidebar( 'sidebar-footer-area-2' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar( 'sidebar-footer-area-2' ); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

					<?php if ( is_active_sidebar( 'sidebar-footer-area-3' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar( 'sidebar-footer-area-3' ); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->


					<?php if ( is_active_sidebar( 'sidebar-footer-area-4' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar( 'sidebar-footer-area-4' ); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

				</div><!-- .row -->
			</div>
		</div>

	<?php endif; ?>

		<?php
	}
}// End if().

if ( ! function_exists( 'shop_isle_footer_copyright_and_socials' ) ) {
	/**
	 * Display the theme copyright and socials
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_footer_copyright_and_socials() {

		?>
		<!-- Footer start -->
		<footer class="footer bg-dark">
			<!-- Divider -->
			<hr class="divider-d">
			<!-- Divider -->
			<div class="container">

				<div class="row">

					<?php
					/* Copyright */
					$shop_isle_copyright = apply_filters( 'shop_isle_footer_copyright_filter', get_theme_mod( 'shop_isle_copyright' ) );
					$shop_isle_copyright = ! empty( $shop_isle_copyright ) ? $shop_isle_copyright : '';
					echo '<div class="col-sm-6">';
					if ( ! empty( $shop_isle_copyright ) || is_customize_preview() ) :
						echo '<p class="copyright font-alt">' . $shop_isle_copyright . '</p>';
						endif;

						$shop_isle_site_info_hide = apply_filters( 'shop_isle_footer_socials_filter', get_theme_mod( 'shop_isle_site_info_hide' ) );
					if ( isset( $shop_isle_site_info_hide ) && $shop_isle_site_info_hide != 1 ) {
						echo apply_filters( 'shop_isle_site_info', '<p class="KharkivShop-poweredby-box"><a class="KharkivShop-poweredby" href="https://www.linkedin.com/in/ivan-zolotukhin/" rel="nofollow">KharkivShop </a>' . __( 'powered by', 'KharkivShop' ) . '<a class="KharkivShop-poweredby" href="https://www.linkedin.com/in/ivan-zolotukhin/" rel="nofollow"> Zolotukhin</a></p>' );
					}
					echo '</div>';

					/* Socials icons */
					echo '<div class="col-sm-6">';
					echo shop_isle_footer_display_socials();
					echo '</div>';
					?>
				</div><!-- .row -->

			</div>
		</footer>
		<!-- Footer end -->
		<?php
	}
}// End if().


if ( ! function_exists( 'shop_isle_footer_wrap_open' ) ) {
	/**
	 * Display the theme copyright and socials
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_footer_wrap_open() {
		echo '</div><div class="bottom-page-wrap">';
	}
}


if ( ! function_exists( 'shop_isle_footer_wrap_close' ) ) {
	/**
	 * Display the theme copyright and socials
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_footer_wrap_close() {
		echo '</div><!-- .bottom-page-wrap -->';
	}
}
