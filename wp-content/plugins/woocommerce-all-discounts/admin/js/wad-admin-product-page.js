(function ($) {
    'use strict';

    $(document).ready(function () {

        function display_warning_in_qbp_tab(wad_interval_error, msg) {
            $("a[href=#wad_quantity_pricing_data]").click();
            $(window).scrollTop($("a[href=#wad_quantity_pricing_data]").offset().top);
            wad_interval_error.html(msg);
        }

        //warning display on qbp(quantity based pricing) intervals when tiered pricing is active
        const intervals_id = $('#intervals_rules');
        intervals_id.before('<div id="wad_interval_error" style="color:red;"></div>');
        var wad_interval_error = $('#wad_interval_error');


        $( ".wrap > [name=post]" ).submit(function( e ) {
            const is_discount_active = $('[name="o-discount[enable]"]');
            const rules_type = $('input[type=radio][name="o-discount[rules-type]"]:checked').attr('value');
            wad_interval_error.html('');

            if (is_discount_active.is(":checked") && rules_type == 'intervals') {
                const nb_turns = $('#intervals_rules > tbody > tr').length;

                for (let index = 0; index < nb_turns; index++) {
                    const interval_min = parseInt($('input[id*="o-discount[intervals][min]"]:eq('+index+')').val());
                    const interval_max = parseInt($('input[id*="o-discount[intervals][max]"]:eq('+index+')').val());

                    if (index != 0 && isNaN(interval_min)) {
                        display_warning_in_qbp_tab(wad_interval_error, error_msg.min_msg);
                        e.preventDefault();
                        break;
                    }
                    if (index != nb_turns - 1 && isNaN(interval_max)) {
                        display_warning_in_qbp_tab(wad_interval_error, error_msg.max_msg);
                        e.preventDefault();
                        break;
                    }

                    if (!isNaN(interval_min) || !isNaN(interval_max)) {
                        if (interval_min > interval_max) {
                            display_warning_in_qbp_tab(wad_interval_error, error_msg.order_msg);
                            e.preventDefault();
                            break;
                        }
                        if (index > 0) {
                            let interval_prev_min = parseInt($('input[id*="o-discount[intervals][min]"]:eq(' + (index - 1) + ')').val());
                            let interval_prev_max = parseInt($('input[id*="o-discount[intervals][max]"]:eq(' + (index - 1) + ')').val());

                            if (isNaN(interval_prev_min) && isNaN(interval_prev_max)) {
                                interval_prev_min = parseInt($('input[id*="o-discount[intervals][min]"]:eq(' + (index - 2) + ')').val());
                                interval_prev_max = parseInt($('input[id*="o-discount[intervals][max]"]:eq(' + (index - 2) + ')').val());
                                if (isNaN(interval_prev_min) && isNaN(interval_prev_max)) {
                                    display_warning_in_qbp_tab(wad_interval_error, error_msg.empty_msg);
                                    e.preventDefault();
                                    break;
                                }
                            }
                            if (interval_prev_min >= interval_min || interval_prev_min >= interval_max || interval_prev_max >= interval_min || interval_prev_max >= interval_max) {
                                display_warning_in_qbp_tab(wad_interval_error, error_msg.order_msg);
                                e.preventDefault();
                                break;
                            }
                        }
                    }
                }
            }
        });
    });

})(jQuery);
