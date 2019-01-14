<?php
/**
 * The home.php template.
 *
 * The template to display the home.php content.
 *
 * @package WordPress
 * @subpackage KharkivShop
 */
get_header(); ?>

	<!-- Wrapper start -->
	<div class="main">

	<!-- Header section start -->
<?php

$page_for_posts_id = get_option( 'page_for_posts' );
if ( ! empty( $page_for_posts_id ) ) {
	$thumb_tmp = get_the_post_thumbnail_url( $page_for_posts_id );
}

$shop_isle_header_image = get_header_image();
if ( ! empty( $thumb_tmp ) ) {
	echo '<section class="page-header-module module bg-dark" data-background="' . esc_url( $thumb_tmp ) . '">';
} elseif ( ! empty( $shop_isle_header_image ) ) {
	echo '<section class="page-header-module module bg-dark" data-background="' . esc_url( $shop_isle_header_image ) . '">';
} else {
	echo '<section class="module bg-dark">';
}
?>
		<div class="container">

			<div class="row">

				<div class="col-sm-10 col-sm-offset-1">

					<?php
					$shop_isle_blog_header_title = get_theme_mod( 'shop_isle_blog_header_title', __( 'Blog', 'KharkivShop' ) );
					if ( ! empty( $shop_isle_blog_header_title ) ) {
						echo '<h1 class="module-title font-alt KharkivShop-blog-header-title">';
						echo $shop_isle_blog_header_title;
						echo '</h1>';
					} elseif ( is_customize_preview() ) {
						echo '<h1 class="module-title font-alt KharkivShop-blog-header-title shop_isle_hidden_if_not_customizer"></h1>';
					}
					$shop_isle_blog_header_subtitle = get_theme_mod( 'shop_isle_blog_header_subtitle' );
					if ( ! empty( $shop_isle_blog_header_subtitle ) ) {
						echo '<div class="module-subtitle font-serif mb-0 KharkivShop-blog-header-subtitle">';
						echo $shop_isle_blog_header_subtitle;
						echo '</div>';
					} elseif ( is_customize_preview() ) {
						echo '<div class="module-subtitle font-serif mb-0 KharkivShop-blog-header-subtitle shop_isle_hidden_if_not_customizer"></div>';
					}

					?>

				</div><!-- .col-sm-10 col-sm-offset-1 -->

			</div><!-- .row -->

		</div><!-- .container -->

<?php
echo '</section><!-- .module -->';
?>
	<!-- Header section end -->

	<!-- Blog standard start -->
<?php
$shop_isle_posts_per_page = get_option( 'posts_per_page' ); /* number of latest posts to show */

if ( ! empty( $shop_isle_posts_per_page ) && ( $shop_isle_posts_per_page > 0 ) ) :

	$shop_isle_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => $shop_isle_posts_per_page,
			'paged'          => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ),
		)
	);



	if ( have_posts() ) {

		?>
		<section class="module">
			<div class="container">

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-8" id="KharkivShop-blog-container">
						<?php

						while ( $shop_isle_query->have_posts() ) {
							$shop_isle_query->the_post();

							?>
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

								<?php
								if ( has_post_thumbnail() ) {
									echo '<div class="post-thumbnail">';
									echo '<a href="' . esc_url( get_permalink() ) . '">';
									echo get_the_post_thumbnail( $post->ID, 'shop_isle_blog_image_size' );
									echo '</a>';
									echo '</div>';
								}
								?>

								<div class="post-header font-alt">
									<h2 class="post-title entry-title"><a href="
									<?php
										echo esc_url( get_permalink() );
									?>
										"><?php the_title(); ?></a></h2>
									<div class="post-meta">
										<?php
										shop_isle_posted_on();
										?>

									</div>
								</div>

								<div class="post-entry entry-content">
									<?php
									$shop_isleismore = strpos( $post->post_content, '<!--more-->' );
									if ( $shop_isleismore ) :
										the_content();
									else :
										the_excerpt();
									endif;
									?>
								</div>

								<?php
								if ( ! $shop_isleismore ) {
									echo '<div class="post-more">';
										echo '<a href="' . esc_url( get_permalink() ) . '" class="more-link">' . esc_html__( 'Read more', 'KharkivShop' ) . '</a>';
									echo '</div>';
								}
								?>

							</div>
							<?php

						}// End while().

						?>

						<!-- Pagination start-->
						<div class="pagination font-alt">
							<?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'KharkivShop' ), $shop_isle_query->max_num_pages ); ?>
							<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'KharkivShop' ), $shop_isle_query->max_num_pages ); ?>
						</div>
						<!-- Pagination end -->
					</div>
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'shop_isle_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->

				</div><!-- .row -->

			</div>
		</section>
		<!-- Blog standard end -->

		<?php
	}// End if().

endif;

?>

<?php get_footer(); ?>
