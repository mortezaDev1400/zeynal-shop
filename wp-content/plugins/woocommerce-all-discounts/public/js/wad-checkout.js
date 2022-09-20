/* global wc_checkout_params */
(function ($) {
    'use strict';
    
    $( document ).ajaxSuccess(function( event, jqxhr, ajaxOptions ) {

        const add_to_cart_ajax_endpoint = wc_checkout_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' );

        if( ajaxOptions.url === add_to_cart_ajax_endpoint ) {

            const cookie_wad_refresh_checkout = Cookies.get('wad_refresh_checkout');

            if ( cookie_wad_refresh_checkout === 'true' ) {

                const hostname = window.location.hostname;

                Cookies.remove( 'wad_refresh_checkout', { path: '/', domain: hostname } );

                window.location.reload();
            }
        }
    });

    $( document ).ajaxSuccess(function( event, jqxhr, ajaxOptions ) {

        const updateOrderReviewEndpoint = wc_checkout_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'update_order_review' );

        if ( ajaxOptions.url !== updateOrderReviewEndpoint ) {

            return;
        }

        const wadCouponsStatus = Cookies.get('wad_coupons_status');

        const originalCouponForm = $('.woocommerce > .woocommerce-form-coupon-toggle')
        const alternativeCouponForm = $('.wad-form-coupon')

        if ( wadCouponsStatus === 'disabled' ) {

            if ( originalCouponForm.is(':visible') ) {

                originalCouponForm.hide()
            }
            
            if ( ! originalCouponForm.length ) {

                alternativeCouponForm.hide()
            }
        }

        if ( wadCouponsStatus === 'enabled' ) {

            if ( originalCouponForm.is(':hidden') ) {

                originalCouponForm.show()
            } 
            
            if ( ! originalCouponForm.length ) {

                alternativeCouponForm.show()
            }
        }

        const hostname = window.location.hostname;

        Cookies.remove( 'wad_coupons_status', { path: '/', domain: hostname } );
    });

    $(document).ready(function () {

        const wadFormCoupon = $('.wad-form-coupon')
    
        if ( wadFormCoupon.length ) {
    
            wadFormCoupon.hide()
        }

        $(document.body).on('change', '#billing_country, #shipping_country, #shipping_state, #billing_state', function() {
            setTimeout(function(){ 
                $(document.body).trigger('update_checkout');
            }, 2000);
        });

        //update checkout to calculate discounts based on shipping/payment method
        $(document.body).on('change', 'input[name*="shipping_method"], input[name*="payment_method"]', function() {

            $('body').trigger('update_checkout');
            
            setTimeout(function() {
                $(document.body).trigger('update_checkout');
            }, 2000);
        });
    });

})(jQuery);