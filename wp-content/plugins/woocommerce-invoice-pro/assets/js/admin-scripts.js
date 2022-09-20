/**
 * jquery.dotanimator.js
 * @author Igor Karbachinsky <igorkarbachinsky@mail.ru>
 * @description Creates a simple dot flicker animation for arbitrary jquery element.
 * (c) September 2015
 *
 */
(function ($) {
    /**
     * Initialize
     * @param {Jquery selector} $block
     * @return
     */
    function DotAnimation($block, params) {
        var self = this;

        self.$block = $block;

        self.params = {
            speed: 400,
            numDots: 3,
            dotElement: '.'
        };

        if ("object" == typeof (params)) {
            $.extend(self.params, params);
        }

        self._bindEvents();
        self.$block.trigger('startDotAnimation');

        return self;
    }

    /**
     * Start animation
     * @return
     */
    DotAnimation.prototype._bindEvents = function () {
        var self = this;

        self.$block.bind('startDotAnimation', function () {
            self._start();
        });

        self.$block.bind('stopDotAnimation', function () {
            self._stop();
        });

        return self;
    },

        /**
         * Start animation
         * @return
         */
        DotAnimation.prototype._start = function (i) {
            var self = this;

            var i = 0;
            var html = self.$block.html();

            self.intervalId = setInterval(function () {
                i = ++i % (self.params['numDots'] + 1);
                self.$block.html(html + Array(i + 1).join(self.params['dotElement']));
            }, self.params['speed']);

            return self;
        };

    /**
     * Stop animation
     * @return
     */
    DotAnimation.prototype._stop = function () {
        var self = this;
        clearInterval(self.intervalId);

        return self;
    };

    /**
     * Wrapper for JQuery
     * @param {Objeet} params
     * @return DotAnimation object
     */
    $.fn.dotAnimation = function (params) {
        return new DotAnimation(this, params);
    };

})(jQuery);

jQuery(document).ready(function ($) {

    var menuItem = $('.wip-menu-item a');
    menuItem.click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $toggle = $this.data('toggle');
        $('.wip-menu-item a').removeClass('wip-active');
        $this.addClass('wip-active');
        $('.wip-options-area').removeClass('wip-active');
        $('.wip-option-' + $toggle).addClass('wip-active');
    });

    $('.wip-upload-file').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var image = wp.media({
            multiple: false,
        }).open().on('select', function (e) {
            var uploadedImage = image.state().get('selection').first();
            var imageID = uploadedImage.toJSON().id;
            var imageURL = uploadedImage.toJSON().url;
            $this.val(imageURL);
            $this.prev('br').prev('input[type="hidden"]').val(imageID);
            $this.prev('br').prev('input[type="hidden"]').prev('img.wip-image').attr('src', imageURL);
        });
    });

    $('.wip-remove').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $default = $this.data('default');
        var $image = $this.prev('button').prev('br').prev('input[type="hidden"]').prev('img.wip-image');
        $this.prev('button').prev('br').prev('input[type="hidden"]').val('');
        $image.attr('src', $default);
    });

    var nonce = $('meta[name="wip-nonce"]').attr('content');

    $('#wip-options-form').submit(function (e) {
        e.preventDefault();
        var $this = $(this);
        var button = $this.find('.wip-save');
        var loader = button.find('.loader');
        button.prop('disabled', true);
        loader.show();

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 20000,
            data: {
                action: 'wip_update_options',
                wipNonce: nonce,
                formData: $this.serialize()
            },
            success: function (response) {
                if (response.result === true) {
                    UIkit.notification({
                        message: WIP_DATA.options_saved,
                        status: 'success',
                        pos: 'bottom-center',
                        timeout: 5000
                    });
                }
            },
            error: function () {
                UIkit.notification({
                    message: WIP_DATA.error_occurred,
                    status: 'danger',
                    pos: 'bottom-center',
                    timeout: 5000
                });
            },
            complete: function (data) {
                button.prop('disabled', false);
                loader.hide();
            }
        });
    });

    $('.wp-list-table .wip-invoice, .wp-list-table .wip-packing-slip, .wp-list-table .wip-post-label, .wp-list-table .wip-order-label, .wp-list-table .wip-shop-mini-label, .wp-list-table .wip-customer-mini-label, .wp-list-table .wip-product-label').attr('target', '_blank');

    $('.wip-add-meta').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $toggle = $this.data('toggle');
        $this.prev('.wip-meta-wrapper').append('<div class="uk-margin-small"><input type="text" class="uk-input" name="' + $toggle + '-meta[]"></div>');
    });

    $(".wip-confirm").click(function () {
        var $this = $(this);
        var $toggle = $this.data('toggle');
        if (this.checked) {
            $('#wip-' + $toggle).slideDown();
        } else {
            $('#wip-' + $toggle).slideUp();
        }
    });
    $(".wip-confirm").each(function () {
        var $this = $(this);
        if ($this.is(':checked')) {
            var $toggle = $this.data('toggle');
            $('#wip-' + $toggle).show();
        }
    });

    $('#wip-send-invoice').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var orderID = parseInt($this.data('id'));
        if (!orderID) {
            return false;
        }
        $this.text(WIP_DATA.please_wait);
        $this.prop('disabled', true);
        $this.dotAnimation({
            speed: 300,
            dotElement: '.',
            numDots: 3
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 40000,
            data: {
                action: 'wip_send_invoice',
                wipNonce: nonce,
                orderID: orderID
            },
            success: function (response) {
                if (response.result === true) {
                    alert(WIP_DATA.invoice_send_to_user);
                }
            },
            error: function () {
                alert(WIP_DATA.error_occurred);
            },
            complete: function (data) {
                $this.text(WIP_DATA.send_invoice);
                $this.prop('disabled', false);
                $this.trigger('stopDotAnimation');
            }
        });
    });

    $('#wip-send-invoice-sms').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var orderID = parseInt($this.data('id'));
        if (!orderID) {
            return false;
        }
        $this.text(WIP_DATA.please_wait);
        $this.prop('disabled', true);
        $this.dotAnimation({
            speed: 300,
            dotElement: '.',
            numDots: 3
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 40000,
            data: {
                action: 'wip_send_invoice_sms',
                wipNonce: nonce,
                orderID: orderID
            },
            success: function (response) {
                if (response.result === true) {
                    alert(WIP_DATA.invoice_send_to_user);
                }
            },
            error: function () {
                alert(WIP_DATA.error_occurred);
            },
            complete: function (data) {
                $this.text(WIP_DATA.send_invoice_sms);
                $this.prop('disabled', false);
                $this.trigger('stopDotAnimation');
            }
        });
    });

    $('#wip-send-invoice-whatsapp').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var orderID = parseInt($this.data('id'));
        if (!orderID) {
            return false;
        }
        $this.text(WIP_DATA.please_wait);
        $this.prop('disabled', true);
        $this.dotAnimation({
            speed: 300,
            dotElement: '.',
            numDots: 3
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 40000,
            data: {
                action: 'wip_send_invoice_whatsapp',
                wipNonce: nonce,
                orderID: orderID
            },
            success: function (response) {
                if (response.result === true) {
                    alert(WIP_DATA.invoice_send_to_user);
                }
            },
            error: function () {
                alert(WIP_DATA.error_occurred);
            },
            complete: function (data) {
                $this.text(WIP_DATA.send_invoice_whatsapp);
                $this.prop('disabled', false);
                $this.trigger('stopDotAnimation');
            }
        });
    });

    $('.wip-remove').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $toggle = $this.data('toggle');
        $('input[name="' + $toggle + '"], #wip-' + $toggle).val('');
    });

    $('.post-type-shop_order .bulkactions #doaction, .post-type-shop_order .bulkactions #doaction2').click(function (e) {
        var $value = $('#bulk-action-selector-top').val();
        if ($value.match("^wip_bulk_print")) {
            e.preventDefault();
            var $type = $value.replace('wip_bulk_print_', '');
            var IDs = '';
            var cb = $("#posts-filter [name='post[]']:checked");
            var total = cb.length;
            if (!total) {
                return false;
            }
            cb.each(function (index) {
                IDs += $(this).val();
                if (index !== total - 1) {
                    IDs += ',';
                }
            });
            window.open(WIP_DATA.base_url + '?action=wip-print&type=' + $type + '&order-id=' + IDs + '&wip-nonce=' + nonce, '_blank');
        }
    });

    $('.wip-code-table code').click(function () {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).text()).select();
        document.execCommand("copy");
        $temp.remove();
    });

    $('#wip-send-test-sms').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var orderID = $('#wip-order-id');
        var loader = $this.find('.loader');
        var alert = $this.prev();
        if (orderID.val() === '') {
            return false;
        }
        $this.prop('disabled', true);
        loader.show();
        alert.hide();

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 20000,
            data: {
                action: 'wip_send_test_sms',
                wipNonce: nonce,
                orderID: orderID.val(),
            },
            success: function (response) {
                alert.html(JSON.stringify(response.result)).show();
            },
            error: function () {
                UIkit.notification({
                    message: WIP_DATA.error_occurred,
                    status: 'danger',
                    pos: 'bottom-center',
                    timeout: 5000
                });
            },
            complete: function (data) {
                $this.prop('disabled', false);
                loader.hide();
            }
        });
    });

    $('#wip-sms-service').on('change', function () {
        showPatternWrapper();
    });
    showPatternWrapper();

    function showPatternWrapper() {
        var patternWrapper = $('.wip-pattern-wrapper');
        var messageWrapper = $('.wip-message-wrapper');
        var codeTable = $('.wip-code-table');
        var kavenegarTable = $('.wip-kavenegar');
        var $selected = $('#wip-sms-service').find(":selected");
        if ($selected.data('pattern') == 1) {
            patternWrapper.show();
            messageWrapper.hide();
            if ($selected.val() == 'kavenegar') {
                codeTable.hide();
                kavenegarTable.show();
            } else {
                codeTable.show();
                kavenegarTable.hide();
            }
        } else {
            patternWrapper.hide();
            messageWrapper.show();
        }
    }

    const getUriWithParam = (baseUrl, params) => {
        const Url = new URL(baseUrl);
        const urlParams = new URLSearchParams(Url.search);
        for (const key in params) {
            if (params[key] !== undefined) {
                urlParams.set(key, params[key]);
            }
        }
        Url.search = urlParams.toString();
        return Url.toString();
    };

    $('.wip-currency-switch input').change(function () {
        var invoiceBTN = $('.wip-invoice-button');
        var packingBTN = $('.wip-packing-slip-button');
        var labelBTN = $('.wip-post-label-button');
        var invoiceHREF = invoiceBTN.attr('href');
        var packingHREF = packingBTN.attr('href');
        var labelHREF = labelBTN.attr('href');
        if (this.value == 'rial') {
            invoiceBTN.attr('href', getUriWithParam(invoiceHREF, {currency: "IRR"}));
            packingBTN.attr('href', getUriWithParam(packingHREF, {currency: "IRR"}));
            labelBTN.attr('href', getUriWithParam(labelHREF, {currency: "IRR"}));
        } else if (this.value == 'toman') {
            invoiceBTN.attr('href', getUriWithParam(invoiceHREF, {currency: "IRT"}));
            packingBTN.attr('href', getUriWithParam(packingHREF, {currency: "IRT"}));
            labelBTN.attr('href', getUriWithParam(labelHREF, {currency: "IRT"}));
        } else if (this.value == 'none') {
            invoiceBTN.attr('href', getUriWithParam(invoiceHREF, {currency: ""}));
            packingBTN.attr('href', getUriWithParam(packingHREF, {currency: ""}));
            labelBTN.attr('href', getUriWithParam(labelHREF, {currency: ""}));
        }
    });

    $('.wip-hide-tuts-alert').click(function (e) {
        e.preventDefault();
        let $this = $(this);

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            timeout: 20000,
            data: {
                action: 'wip_hide_tuts_alert',
                wipNonce: nonce,
            },
            success: function (response) {
                if (response.result === true) {
                    $this.parentsUntil('.uk-margin').slideUp(200);
                }
            },
        });
    });
});