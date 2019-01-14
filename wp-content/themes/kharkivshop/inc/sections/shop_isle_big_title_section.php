<?php
/**
 * Big title section
 *
 * @package ShopIsle
 * @since 1.0.0
 */

$shop_isle_homepage_slider_shortcode = get_theme_mod( 'shop_isle_homepage_slider_shortcode' );
$shop_isle_big_title_hide            = get_theme_mod( 'shop_isle_big_title_hide' );

if ( isset( $shop_isle_big_title_hide ) && $shop_isle_big_title_hide != 1 ) {
    echo '<section id="home" class="home-section home-parallax home-fade' . ( empty( $shop_isle_homepage_slider_shortcode ) ? ' home-full-height' : ' home-slider-plugin' ) . '">';
} elseif ( is_customize_preview() ) {
    echo '<section id="home" class="home-section home-parallax home-fade shop_isle_hidden_if_not_customizer' . ( empty( $shop_isle_homepage_slider_shortcode ) ? ' home-full-height' : ' home-slider-plugin' ) . '">';
}

if ( ( isset( $shop_isle_big_title_hide ) && $shop_isle_big_title_hide != 1 ) || is_customize_preview() ) {

    if ( ! empty( $shop_isle_homepage_slider_shortcode ) ) {
        echo do_shortcode( $shop_isle_homepage_slider_shortcode );
    } else {

        $shop_isle_big_title_image    = get_theme_mod( 'shop_isle_big_title_image', get_template_directory_uri() . '/assets/images/slide2.jpg' );
        $shop_isle_big_title_title    = get_theme_mod( 'shop_isle_big_title_title', 'KharkivShop' );
        $shop_isle_big_title_subtitle = get_theme_mod( 'shop_isle_big_title_subtitle', __( 'Welcome to KharkivShop' ) );

        if ( ! empty( $shop_isle_big_title_image ) ) {

            echo '<div class="hero-slider">';

            echo '<ul class="slides">';

            echo '<li class="bg-dark" style="background-image:url(' . esc_url( $shop_isle_big_title_image ) . ')">';

            echo '<div class="home-slider-overlay"></div>';
            echo '<div class="hs-caption">';
            echo '<div class="caption-content">';

            if ( ! empty( $shop_isle_big_title_title ) ) {
                echo '<h1 class="hs-title-size-4 font-alt mb-30">' . $shop_isle_big_title_title . '</h1>';
            } elseif ( is_customize_preview() ) {
                echo '<h1 class="hs-title-size-4 font-alt mb-30"></h1>';
            }

            if ( ! empty( $shop_isle_big_title_subtitle ) ) {
                echo '<div class="hs-title-size-1 font-alt mb-40">' . $shop_isle_big_title_subtitle . '</div>';
            } elseif ( is_customize_preview() ) {
                echo '<div class="hs-title-size-1 font-alt mb-40"></div>';
            }

            shop_isle_big_title_section_display_button();
            echo '</div><!-- .caption-content -->';
            echo '</div><!-- .hs-caption -->';

            echo '</li><!-- .bg-dark -->';

            echo '</ul><!-- .slides -->';

            echo '</div><!-- .hero-slider -->';

        }
    }// End if().
}// End if().

echo '</section >';
