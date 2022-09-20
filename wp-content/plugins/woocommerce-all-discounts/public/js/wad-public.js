(function ($) {
    'use strict';

    $(document).ready(function ()
    {
        $("[data-tooltip-title]").tooltip();
        
        $('body').on('change', 'input[name*="shipping_method"]', function(){
            setTimeout(function(){
            	$('body').trigger('wc_update_cart');
            }, 2000);
        });

        $( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
            // Fired when the user selects all the required dropdowns / attributes
            // and a final variation is selected / shown
            var variation_id = $("input[name='variation_id']").val();
            if (variation_id)
            {
                $(".wad-qty-pricing-table").hide();
                $(".wad-qty-pricing-table[data-id='"+variation_id+"']").show();
            }
        } );

        // upadate mini-cart after product added to cart.
        $( document.body ).on( 'added_to_cart', function(){
            jQuery(document.body).trigger('wc_fragment_refresh');
        });

        // update mini cart after loading the page.
        $(window).on('load', function(){
            $(document.body).trigger('wc_fragment_refresh');
        });
    });
})(jQuery);
