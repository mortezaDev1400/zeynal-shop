<?php
/*
 * Template Name: Pre invoice
 */
$options = new WIP_Options_Manager();
if (!$options->get_option('pre-invoice')) {
    exit();
}

$labels = new WIP_Labels_Manager();

$view = new WIP_View();
$view->set_type('pre-invoice');

$shop = new WIP_Shop_Info(0, 'pre-invoice');
$customer = new WIP_Pre_Customer_Info();
$products = new WIP_Pre_Products_Table(0, 'pre-invoice');
$products = $products->render_html();

$total = new WIP_Cart_Total();
$total = $total->render_html();

$title = $shop->get_title_html();
$url = $shop->get_url_html();
$email = $shop->get_email_html();
$phone = $shop->get_phone_html();
$logo = $shop->get_logo_html();
$print_date = $shop->get_print_date_html();
$sender = $shop->get_address_html();
$postcode = $shop->get_postcode_html();
$economical = $shop->get_economical_num_html();
$reg = $shop->get_reg_num_html();
$recipient = $customer->get_address_html();
$full_name = $customer->get_full_name_html();
$r_postcode = $customer->get_postcode_html();
$r_phone = $customer->get_phone_html();
$r_email = $customer->get_email_html();
$user_meta = $customer->get_user_meta_html();
$order_note = $shop->get_order_note_html();
$shop_sign = $shop->get_shop_signature_html();
$customer_sign = $shop->get_customer_signature_html();
$deliver_date = $shop->get_deliver_date_html();
$deliver_time = $shop->get_deliver_time_html();
$watermark = $shop->get_watermark_html();

if ($view->is_download_pdf()) {
    $view->set_is_responsive(false);
}

ob_start();
?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <title><?php echo $labels->get_label('pre-invoice'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
        <meta name="fontiran.com:license" content="62ATP3">
        <link rel="stylesheet" href="<?php echo WIP_CSS_URL; ?>pre-invoice.css">
        <?php echo $view->get_styles(); ?>
    </head>
    <body class="invoice pre-invoice <?php echo is_rtl() ? 'rtl' : null; ?>">
    <div class="template-1 container">
        <?php if ($title || $url || $email || $phone || $print_date || $sender || $postcode || $economical || $reg): ?>
            <table class="shop-info table-responsive table-fixed">
                <tbody>
                <tr>
                    <?php $colspan = 0; ?>
                    <?php if ($title || $url || $email): ?>
                        <td>
                            <?php echo $title; ?>
                            <?php echo $url; ?>
                            <?php echo $email; ?>
                        </td>
                        <?php $colspan++; ?>
                    <?php endif; ?>
                    <?php if ($logo): ?>
                        <td>
                            <?php echo $logo; ?>
                        </td>
                        <?php $colspan++; ?>
                    <?php endif; ?>
                    <?php if ($print_date || $phone): ?>
                        <td>
                            <strong class="invoice-title"><?php echo $labels->get_label('pre-invoice'); ?></strong>
                            <?php echo $print_date; ?>
                            <?php echo $phone; ?>
                            <?php $colspan++; ?>
                        </td>
                    <?php endif; ?>
                </tr>
                </tbody>
                <?php if ($sender || $postcode || $economical || $reg): ?>
                    <tfoot>
                    <tr>
                        <td colspan="<?php echo $colspan; ?>">
                            <?php echo $sender; ?>
                            <?php echo $postcode; ?>
                            <?php echo $economical; ?>
                            <?php echo $reg; ?>
                        </td>
                    </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        <?php endif; ?>
        <?php if ($recipient || $full_name || $r_postcode || $r_phone || $r_email || $user_meta): ?>
            <div class="customer-info">
                <?php echo $recipient; ?>
                <?php echo $full_name; ?>
                <?php echo $r_postcode; ?>
                <?php echo $r_phone; ?>
                <?php echo $r_email; ?>
                <?php echo $user_meta; ?>
            </div>
        <?php endif; ?>
        <?php if ($products): ?>
            <?php echo $products; ?>
        <?php endif; ?>
        <?php if ($total): ?>
            <?php echo $total; ?>
        <?php endif; ?>
        <?php if ($order_note): ?>
            <?php echo $order_note; ?>
        <?php endif; ?>
        <?php if ($shop_sign || $customer_sign): ?>
            <table class="signature-table table-responsive table-fixed">
                <tbody>
                <tr>
                    <?php if ($shop_sign): ?>
                        <td><?php echo $shop_sign; ?></td>
                    <?php endif; ?>
                    <?php if ($deliver_date): ?>
                        <td><?php echo $deliver_date; ?></td>
                    <?php endif; ?>
                    <?php if ($deliver_time): ?>
                        <td><?php echo $deliver_time; ?></td>
                    <?php endif; ?>
                    <?php if ($customer_sign): ?>
                        <td><?php echo $customer_sign; ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <?php echo $watermark; ?>
    </div>
    <?php if (!$view->is_download_pdf()): ?>
        <div class="print">
            <a href="#" class="button" onclick="print()"><?php _e('Print this page', 'wip'); ?></a>
            <?php if (defined("WIP_WKHTMLTOX") && $options->get_option('download-pdf')): ?>
                <a href="<?php echo add_query_arg(['download' => 'pdf']); ?>" class="button"><?php _e('Download PDF', 'wip'); ?></a>
            <?php endif; ?>
            <a href="#" onclick="location.href = document.referrer; return false;" class="button"><?php _e('Return', 'wip'); ?></a>
            <a href="<?php echo wc_get_checkout_url(); ?>" class="button"><?php _e('Proceed to checkout', 'woocommerce'); ?></a>
        </div>
    <?php endif; ?>
    <?php if ($options->get_option('persian-number')): ?>
        <script src="<?php echo includes_url(); ?>js/jquery/jquery.js?ver=1.12.4-wp"></script>
        <script src="<?php echo WIP_JS_URL; ?>persianumber.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $('body').persiaNumber();
            });
        </script>
    <?php endif; ?>
    </body>
    </html>
<?php
$template = ob_get_clean();
if ($view->is_download_pdf()) {
    (new WIP_PDF_Generator($template, $view->get_type() . '(' . time() . ')'))->download();
} else {
    echo $template;
}