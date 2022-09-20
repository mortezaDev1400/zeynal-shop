<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$order = $this->get_order();
$pay_url = $order->get_checkout_payment_url();
?>
<?php if (!$this->get_is_email() && !$this->is_download_pdf()): ?>
    <div class="print">
        <a href="#" class="button" onclick="print()"><?php _e('Print this page', 'wip'); ?></a>
        <?php if ($order->get_status() == 'proforma-invoice' && WIP_Helper::valid_proforma_status($order)): ?>
            <a href="<?php echo esc_url($pay_url); ?>" class="button"><?php _e('Proceed to checkout', 'woocommerce'); ?></a>
        <?php endif; ?>
        <?php if ($this->options->get_option('download-pdf') && ($this->get_type() == 'invoice' || $this->get_type() == 'packing-slip')): ?>
            <a href="<?php echo add_query_arg(['download' => 'pdf']); ?>" class="button"><?php _e('Download PDF', 'wip'); ?></a>
        <?php endif; ?>
        <a href="#" onclick="location.href = document.referrer; return false;" class="button"><?php _e('Return', 'wip'); ?></a>
    </div>
<?php endif; ?>
<?php if ($this->options->get_option('persian-number') && !$this->get_is_email()): ?>
    <script src="<?php echo includes_url(); ?>js/jquery/jquery.js?ver=1.12.4-wp"></script>
    <script src="<?php echo WIP_JS_URL; ?>persianumber.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('body').persiaNumber();
        });
    </script>
<?php endif; ?>
<?php if ($this->options->get_option('page-break') && !$this->is_download_pdf()): ?>
    <p style="page-break-before: always;"></p>
<?php endif; ?>
</body>
</html>