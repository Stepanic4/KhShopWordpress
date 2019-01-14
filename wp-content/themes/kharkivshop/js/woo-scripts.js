/**
 * Scripts for shopisle frontend.
 *
 * @package shopisle
 */

(function ( $ ) {
    $.shopIsle = {
        init: function () {
            this.scrollToLogin();
        },
        /**
         * Scroll to top when user clicks on login on checkout page.
         * @returns {boolean}
         */
        scrollToLogin: function () {
            var showLoginButton = $('.woocommerce-info').find('.showlogin');
            if( typeof showLoginButton === 'undefined' ){
                return false;
            }

            showLoginButton.on('click',function () {
                var loginForm = $( '.woocommerce-form-login' );
                if( loginForm.is(':hidden') ){
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }
            });
            return true;
        }
    };
}( jQuery ));

jQuery( document ).ready(
    function () {
        jQuery.shopIsle.init();
    }
);
