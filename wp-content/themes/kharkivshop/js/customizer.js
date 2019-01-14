/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {



	$.shopIsle = {
		init: function () {
			this.liveShowHideSection();
            this.liveTextReplace();
            this.focusForCustomShortcut();
        },

        liveShowHideSection: function () {
            var showHideControls = {
                'shop_isle_banners_hide' : '#banners',
				'shop_isle_products_hide' : '#latest',
				'shop_isle_video_hide' : '.module-video',
				'shop_isle_services_hide' : '#services',
				'shop_isle_ribbon_hide' : '#ribbon',
				'shop_isle_products_slider_hide' : '.home-product-slider',
				'shop_isle_products_slider_single_hide' : '.module-small-bottom',
				'shop_isle_map_hide' : '#map',
				'shop_isle_fp_categories_hide' : '#categories',
				'shop_isle_shortcodes_hide' : '.home .shortcodes',
            };
			Object.keys(showHideControls).forEach(function (key) {
				wp.customize(
					key, function (value) {
						value.bind(
							function(){
								$(showHideControls[key]).toggle();
							}
						);
					}
				);
			});
        },

        liveTextReplace: function () {
            var textToReplace = [
                {
                    controlName: 'shop_isle_banners_title',
                    selector: '.home-banners .product-banners-title',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_products_title',
                    selector: '#latest .product-banners-title',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_video_title',
                    selector: '.module-video .video-title',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_services_title',
                    selector: '#services .home-prod-title',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_services_subtitle',
                    selector: '#services .home-prod-subtitle',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_ribbon_text',
                    selector: '#ribbon .module-title',
                    isHtml: true
                },
				{
                    controlName: 'shop_isle_ribbon_button_text',
                    selector: '#ribbon .btn-ribbon-wrapper a',
                    isHtml: true
                },
				{
                    controlName: 'shop_isle_products_slider_title',
                    selector: '.home-product-slider .home-prod-title',
                    isHtml: true
                },
				{
                    controlName: 'shop_isle_products_slider_subtitle',
                    selector: '.home-product-slider .home-prod-subtitle',
                    isHtml: true
                },
				{
                    controlName: 'shop_isle_fp_categories_title',
                    selector: '#categories .home-prod-title',
                    isHtml: true
                },
				{
                    controlName: 'shop_isle_fp_categories_subtitle',
                    selector: '#categories .home-prod-subtitle',
                    isHtml: true
                },
                {
                    controlName: 'shop_isle_copyright',
                    selector: '.copyright',
                    isHtml: true
                },
            ];
            textToReplace.forEach(function (item) {
                wp.customize(
                    item.controlName, function (value) {
                        value.bind(
                            function (newval) {
                                if (typeof item.isHtml !== 'undefined') {
                                    $(item.selector).html(newval);
                                } else {
                                    $(item.selector).text(newval);
                                }
                            }
                        );
                    }
                );
            });
        },

        focusForCustomShortcut: function () {
            var fakeShortcutClasses = [
            	'shop_isle_banners_section',
				'shop_isle_products_section',
				'shop_isle_video_section',
				'shop_isle_services_section',
				'shop_isle_ribbon_section',
				'shop_isle_products_slider_section',
				'shop_isle_map_section',
				'shop_isle_fp_categories_section',
				'shop_isle_shortcodes_section'
			];

            fakeShortcutClasses.forEach(function (element) {
                $('.customize-partial-edit-shortcut-'+element).on('click',function () {
                	wp.customize.preview.send( 'KharkivShop-customize-focus-section', element );
                });
            });
        }
	};


	$.shopIsle.init();


	/****************************************/
	/********** Big title section ***********/
	/****************************************/
	wp.customize( 'shop_isle_big_title_hide', function( value ) {
		value.bind( function( to ) {
			if( to !== true ) {
				$( '.home-section' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
			} else {
				$( '.home-section' ).addClass( 'shop_isle_hidden_if_not_customizer' );
			}

		} );
	} );

	/******************************/
	/**********  Colors ***********/
	/******************************/

	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$( '.shop_isle_header_title h1 a' ).css( {
				'color': to
			} );
			$( '.shop_isle_header_title h2 a' ).css( {
				'color': to
			} );
		} );
	} );
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
				'background': to
			} );
			if( $( '.front-page-main' ).length > 0 ) {
				$( '.front-page-main' ).css( {
					'background': to
				} );
			}
		} );
	} );

    /******************************/
    /**********  Header ***********/
    /******************************/

    wp.customize( 'shop_isle_blog_header_title', function( value ) {
        value.bind( function( to ) {
            if( to !== '' ) {
                $( '.KharkivShop-blog-header-title' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
            }
            else {
                $( '.KharkivShop-blog-header-title' ).addClass( 'shop_isle_hidden_if_not_customizer' );
            }
            $( '.KharkivShop-blog-header-title' ).html( to );
        } );
    } );

    wp.customize( 'shop_isle_blog_header_subtitle', function( value ) {
        value.bind( function( to ) {
            if( to !== '' ) {
                $( '.KharkivShop-blog-header-subtitle' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
            }
            else {
                $( '.KharkivShop-blog-header-subtitle' ).addClass( 'shop_isle_hidden_if_not_customizer' );
            }
            $( '.KharkivShop-blog-header-subtitle' ).html( to );
        } );
    } );

	/*******************************/
	/******    Slider section ******/
	/*******************************/
	wp.customize( 'shop_isle_slider_hide', function( value ) {
		value.bind( function( to ) {
			if( to !== '1' ) {
				$( 'section.home-section' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
				$( '.navbar-custom' ).removeClass( 'navbar-color-customizer' );
				$('.main').css('margin-top', 0 );
			}
			else {
				$( 'section.home-section' ).addClass( 'shop_isle_hidden_if_not_customizer' );
				$( '.navbar-custom' ).addClass( 'navbar-color-customizer' );
				$('.main').css('margin-top', $('.navbar-custom').outerHeight() );
			}
		} );
	} );

	/********************************/
    /*********	Banners section *****/
	/********************************/
	// Add new banner (Repeater)
	wp.customize( 'shop_isle_banners', function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ='';
			obj.forEach(function(item) {
				result += '<div class="col-sm-4"><div class="content-box mt-0 mb-0"><div class="content-box-image"><a href="' + item.link + '"><img src="' + item.image_url + '"></a></div></div></div>';
			});
			$( '.shop_isle_bannerss_section' ).html( result );
		} );
	} );

	/****************************************/
	/*********** Video section **************/
	/****************************************/
    wp.customize('shop_isle_video_section_padding', function (value) {
        var $selector = $('.module.module-video');
        value.bind(function (to) {
            $( window ).resize();
            $selector.css('padding', to+'px 0px');
        });
    });


	/****************************************/
	/*********  Services section ************/
	/****************************************/
	/* Our services (Repeater) */
	wp.customize( 'shop_isle_service_box', function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ='';
			obj.forEach(function(item) {
				result += '<div class="col-xs-12 col-sm-4 sip-service-box"><div class="sip-single-service"><a href="'+item.link+'" class="sip-single-service-a"><span class="'+item.icon_value+' sip-single-icon"></span><div class="sip-single-service-text"><h3 class="">'+item.text+'</h3><p class="">'+item.subtext+'</p></div></a></div></div>';
			});
			$( '#our_services_wrap' ).html( result );
		} );
	} );

	/****************************************/
	/*********  Ribbon section **************/
	/****************************************/
	wp.customize( 'shop_isle_ribbon_background', function( value ) {
		value.bind( function( to ) {
			$( '#ribbon' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );

	/*******************************************/
	/******    Hide site info from footer ******/
	/*******************************************/
	wp.customize( 'shop_isle_site_info_hide', function( value ) {
		value.bind( function( to ) {
			if( to !== true ) {
				$( '.KharkivShop-poweredby-box' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
			}
			else {
				$( '.KharkivShop-poweredby-box' ).addClass( 'shop_isle_hidden_if_not_customizer' );
			}
		} );
	} );

	// socials (Repeater)
	wp.customize( 'shop_isle_socials', function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ='';
			obj.forEach(function(item) {
				result+=  '<a href="' + item.link + '" class="social-icon"><i class="fa ' + item.icon_value + '"></i></a>';
			});
			$( '.footer-social-links' ).html( result );
		} );
	} );

	/*********************************/
	/******  About us page  **********/
	/*********************************/
	wp.customize( 'shop_isle_our_team_title', function( value ) {
		value.bind( function( to ) {
			$( '.meet-out-team-title' ).text( to );
		} );
	} );
	wp.customize( 'shop_isle_our_team_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.meet-out-team-subtitle' ).text( to );
		} );
	} );
	wp.customize( 'shop_isle_about_page_video_title', function( value ) {
		value.bind( function( to ) {
			$( '.video-title' ).text( to );
		} );
	} );
	wp.customize( 'shop_isle_about_page_video_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.video-subtitle' ).text( to );
		} );
	} );
	wp.customize( 'shop_isle_about_page_video_background', function( value ) {
		value.bind( function( to ) {
			$( '.about-page-video' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );
	wp.customize( 'shop_isle_about_page_video_link', function( value ) {
		value.bind( function( to ) {
			if( to !== '' ) {
				$( '.video-box-icon' ).removeClass( 'shop_isle_hidden_if_not_customizer' );
			}
			else {
				$( '.video-box-icon' ).addClass( 'shop_isle_hidden_if_not_customizer' );
			}

		} );
	} );
	wp.customize( 'shop_isle_our_advantages_title', function( value ) {
		value.bind( function( to ) {
			$( '.our_advantages' ).text( to );
		} );
	} );

	/* Team members (Repeater) */
	wp.customize( 'shop_isle_team_members', function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ='';
			obj.forEach(function(item) {
				result += '<div class="col-sm-6 col-md-3 mb-sm-20 fadeInUp"><div class="team-item"><div class="team-image"><img src="' + item.image_url + '" alt="' + item.text + '"><div class="team-detail"><p class="font-serif">' + item.description + '</p></div><!-- .team-detail --></div><!-- .team-image --><div class="team-descr font-alt"><div class="team-name">' + item.text + '</div><div class="team-role">' + item.subtext + '</div></div><!-- .team-descr --></div><!-- .team-item --></div>';
			});
			$( '.about-team-member .slides' ).html( result );
		} );
	} );

	/* Advantages (Repeater) */
	wp.customize( 'shop_isle_advantages', function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ='';
			obj.forEach(function(item) {
				result += '<div class="col-sm-6 col-md-3 col-lg-3"><div class="features-item"><div class="features-icon"><span class="' + item.icon_value + '"></span></div><h3 class="features-title font-alt">' + item.text + '</h3>' + item.subtext + '</div></div>';
			});
			$( '.module-advantages .multi-columns-row' ).html( result );
		} );
	} );


	/*********************************/
	/**********  404 page  ***********/
	/*********************************/
	wp.customize( 'shop_isle_404_background', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-background' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );
	wp.customize( 'shop_isle_404_title', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-title' ).html( to );
		} );
	} );
	wp.customize( 'shop_isle_404_text', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-text' ).html( to );
		} );
	} );
	wp.customize( 'shop_isle_404_link', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-button-text a' ).attr( 'href', to );
		} );
	} );
	wp.customize( 'shop_isle_404_label', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-button-text a' ).text( to );
		} );
	} );

} )( jQuery );

