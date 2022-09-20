<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$labels = new WIP_Labels_Manager();
$shop = new WIP_Shop_Info($this->get_order_id(), $this->type);
$customer = new WIP_Customer_Info($this->get_order_id(), $this->type);
$products = new WIP_Products_Table($this->get_order_id(), $this->type);
$total = new WIP_Total_Table($this->get_order_id(), $this->type);

$font_family = $this->get_font_family();
$title = $shop->get_title_html();
$url = $shop->get_url_html();
$email = $shop->get_email_html();
$phone = $shop->get_phone_html();
$logo = $shop->get_logo_html();
$print_date = $shop->get_print_date_html();
$transmission_date = $shop->get_get_transmission_date_html();
$order_id_html = $shop->get_order_id_html();
$order_status = $shop->get_order_status_html();
$barcode = $shop->get_barcode_html();
$sender = $shop->get_address_html();
$postcode = $shop->get_postcode_html();
$economical = $shop->get_economical_num_html();
$reg = $shop->get_reg_num_html();
$state = $shop->get_state_html();
$city = $shop->get_city_html();
$response_time = $shop->get_response_time_html();
$namad_id = $shop->get_namad_id_html();
$r_state = $customer->get_state_html();
$r_city = $customer->get_city_html();
$recipient = $customer->get_address_html();
$full_name = $customer->get_full_name_html();
$r_postcode = $customer->get_postcode_html();
$r_phone = $customer->get_phone_html();
$r_email = $customer->get_email_html();
$order_date = $customer->get_order_date_html();
$pay_method = $customer->get_payment_method_html();
$trans_id = $customer->get_transaction_id_html();
$national_id = $customer->get_national_id_html();
$shipping = $customer->get_shipping_method_html();
$user_meta = $customer->get_user_meta_html();
$order_meta = $customer->get_order_meta_html();
$delivery_date = $customer->get_delivery_date_html();
$novin_delivery_date = $customer->get_novin_delivery_date_html();
$novin_delivery_notice = $customer->get_novin_delivery_notice_html();
$customer_note = $shop->get_customer_note_html();
$order_note = $shop->get_order_note_html();
$shop_sign = $shop->get_shop_signature_html();
$customer_sign = $shop->get_customer_signature_html();
$deliver_date = $shop->get_deliver_date_html();
$deliver_time = $shop->get_deliver_time_html();
$watermark = $shop->get_watermark_html();
$products_table = $products->render_html();
$products_list = $products->get_list();
$total_table = $total->render_html();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo $this->type; ?>(<?php echo $shop->get_order_id(); ?>)</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    <?php if ($font_family == 'IRANSans'): ?>
        <meta name="fontiran.com:license" content="62ATP3">
    <?php elseif ($font_family == 'iranyekan'): ?>
        <meta name="fontiran.com:license" content="P8B2XP">
    <?php endif; ?>
    <?php echo $this->get_styles(); ?>
</head>
<body class="<?php echo $this->body_class(); ?>">