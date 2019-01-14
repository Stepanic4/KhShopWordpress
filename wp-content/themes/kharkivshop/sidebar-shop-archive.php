<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package KharkivShop
 */

if ( ! is_active_sidebar( 'KharkivShop-sidebar-shop-archive' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'KharkivShop-sidebar-shop-archive' ); ?>
</aside><!-- #secondary -->
