!function(){var a,b,c;if(a=document.getElementById('site-navigation'),a&&(b=a.getElementsByTagName('button')[0],'undefined'!==typeof b)){if(c=a.getElementsByTagName('ul')[0],'undefined'===typeof c)return void(b.style.display='none');c.setAttribute('aria-expanded','false'),-1===c.className.indexOf('nav-menu')&&(c.className+=' nav-menu'),b.onclick=function(){-1!==a.className.indexOf('toggled')?(a.className=a.className.replace(' toggled',''),b.setAttribute('aria-expanded','false'),c.setAttribute('aria-expanded','false')):(a.className+=' toggled',b.setAttribute('aria-expanded','true'),c.setAttribute('aria-expanded','true'))},jQuery('.main-navigation, .secondary-navigation').find('a').on('focus.KharkivShop blur.KharkivShop',function(){jQuery(this).parents().toggleClass('focus')}),jQuery(window).load(function(){jQuery('.site-header-cart').find('a').on('focus.KharkivShop blur.KharkivShop',function(){jQuery(this).parents().toggleClass('focus')})})}}();

jQuery(window).load(function(){

    // product list
    var pageWidth = window.innerWidth;
    jQuery( '.page .products li, .single .products li, .post-type-archive-product .products li, .tax-product_cat .products li, .related.products .products li, #KharkivShop-blog-container .products li, .upsells.products li, .products_shortcode .products li, .cross-sells .products li, .woocommerce.archive .products li, .dokan-store .products li' ).each( function(){
        jQuery( this ).find( '.button' ).wrapAll('<div class="product-button-wrap"></div>');
        jQuery( this ).find( '.product-button-wrap .ajax_add_to_cart, .product-button-wrap > a' ).wrap( '<div class="add-to-cart-button-wrap"></div>' );
        jQuery( this ).find( 'img' ).wrapAll( '<div class="prod-img-wrap"></div>' );
        if (pageWidth > 768) {
            jQuery( this ).find( '.prod-img-wrap' ).append( jQuery(this).find( '.product-button-wrap' ) );
        }
    });

    if( jQuery('#latest').length > 0 ) {
        jQuery('#latest .shop-item-detail').each( function(){
            jQuery( this ).find( '.product ' ).after( jQuery( this ).find( '.product .button' ) );
            jQuery( this ).find( '.button' ).wrapAll('<div class="product-button-wrap"></div>');
            jQuery( this ).find( '.product-button-wrap .ajax_add_to_cart, .product-button-wrap > a' ).wrap( '<div class="add-to-cart-button-wrap"></div>' );
        });
        if (pageWidth <= 768) {
            jQuery('.shop-item-detail').each(function() {
                jQuery( this ).closest('.shop-item').append(this);
            })
        }
    }

    // add sidebar class to body
    if ( jQuery( '.sidebar-shop' ).length ) {
        jQuery('body').addClass('shopsidebar');
    }

});

jQuery(window).resize(function(){
    var pageWidth = window.innerWidth;
    jQuery( '.page .products li, .single .products li, .post-type-archive-product .products li, .tax-product_cat .products li, .related.products .products li, #KharkivShop-blog-container .products li, .upsells.products li, .products_shortcode .products li, .cross-sells .products li, .woocommerce.archive .products li, .dokan-store .products li' ).each( function(){
        if (pageWidth > 768) {
            jQuery( this ).find( '.prod-img-wrap' ).append( jQuery(this).find( '.product-button-wrap' ) );
        }
        else {
            jQuery( this ).find( '.woocommerce-loop-product__link' ).append( jQuery(this).find( '.product-button-wrap' ) );
        }
    })
    jQuery('.shop-item-detail').each(function() {
        if (pageWidth <= 768) {
            jQuery( this ).closest('.shop-item').append(this);
        }
        else {
            jQuery( this ).parent().find('.shop-item-image').append(this);
        }
    })
})

jQuery(document).ready(function(){
    var wooInfo = jQuery('.woocommerce-info');
    if( wooInfo.length > 0 && wooInfo.closest('.container').length === 0 ) {
        wooInfo.addClass('container').css({
            'margin-left': 'auto',
            'margin-right': 'auto',
        });
    }
});

/* add link to latest products on homepage */
jQuery(document).ready(function($){

    var shopItem = $( '.shop-item' );
    if ( shopItem.length === 0 ) {
        return;
    }

    var link, finda;
    shopItem.each( function() {
        finda = $(this).find( '.shop-item-title a' );
        if( finda.length === 0 ) {
            return false;
        }
        link = finda.attr('href');
        $(this).wrap( '<a href="' + link + '"></a>' );
    });

});


( function($) {

    $( '.woocommerce-page-title' ).unwrap();

    $( '.header-search-button' ).click( function() {
        $( '.header-search' ).toggleClass( 'header-search-open' );
        $( '.navbar-collapse').removeClass( 'in' ).attr( 'aria-expanded', 'false' ).css( 'height', '1px' );
        $( '.navbar-toggle').attr( 'aria-expanded', 'false' );
        $( '.navbar-toggle').addClass( 'collapsed' );
    } );

    $( '.header-search' ).click( function(event) {
        event.stopPropagation();
    } );

    $( 'html' ).click( function() {
        $( '.header-search' ).removeClass( 'header-search-open' );
    } );


} )(jQuery,window);


/*** DROPDOWN FOR MOBILE MENU */
var callback_mobile_dropdown = function () {

    var navLi = jQuery('.navbar-nav li');

    navLi.each(function(){
        if ( jQuery(this).find('ul').length > 0 && !jQuery(this).hasClass('has_children') ){
            jQuery(this).addClass('has_children');
            jQuery(this).find('a').first().after('<p class="dropdownmenu"></p>');
        }
    });
    jQuery('.dropdownmenu').click(function(){
        if( jQuery(this).parent('li').hasClass('this-open') ){
            jQuery(this).parent('li').removeClass('this-open');
        }else{
            jQuery(this).parent('li').addClass('this-open');
        }
    });

};
jQuery(document).ready(callback_mobile_dropdown);