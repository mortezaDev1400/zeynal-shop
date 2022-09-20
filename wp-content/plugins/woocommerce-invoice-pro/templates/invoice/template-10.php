<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

include(WIP_TPL_PATH . 'header.php');

$tapin = new WIP_Tapin_Info($this->get_order_id(), $this->type);
$tapin_order_id = $tapin->get_tapin_order_id_html();
$tapin_product_id = $tapin->get_tapin_product_id_html();
$tapin_logo = $tapin->get_logo_html();
$tapin_post_logo = $tapin->get_post_logo_html();
$tapin_desc = $tapin->get_desc_html();
$tapin_footer_desc = $tapin->get_footer_desc_html();
$tapin_barcode = $tapin->get_barcode_html(2, 50);
$tapin_weight = $tapin->get_weight_html();
$tapin_shipping_method = $tapin->get_shipping_method_html();
$tapin_send_time = $tapin->get_send_time_html();
$tapin_send_price = $tapin->get_send_price_html();
$tapin_send_price_tax = $tapin->get_send_price_tax_html();
$post_services = $tapin->get_post_services_html();
$shop_note = $tapin->get_shop_note_html();
$origin = $tapin->get_origin_html($state, $city);
$destination = $tapin->get_destination_html($r_state, $r_city);
?>
    <div class="template-10 container">
        <?php if ($tapin_logo || $tapin_desc || $tapin_barcode): ?>
            <table class="tapin-table table-responsive">
                <tbody>
                <tr>
                    <?php if ($tapin_logo): ?>
                        <td class="tapin-logo"><?php echo $tapin_logo; ?></td>
                    <?php endif; ?>
                    <?php if ($tapin_desc): ?>
                        <td class="tapin-desc"><?php echo $tapin_desc; ?></td>
                    <?php endif; ?>
                    <?php if ($tapin_barcode): ?>
                        <td class="tapin-barcode"><?php echo $tapin_barcode; ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <table class="sender-desc-table table-responsive table-fixed">
            <tbody>
            <tr>
                <?php if ($order_note || $tapin_order_id): ?>
                    <td>
                        <table class="desc-table table-responsive table-bordered">
                            <tbody>
                            <?php if ($order_note): ?>
                                <tr class="order-note">
                                    <td><?php echo $order_note; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($tapin_order_id): ?>
                                <tr class="tapin-order-id">
                                    <td><?php echo $tapin_order_id; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($tapin_product_id): ?>
                                <tr class="product-info">
                                    <td><?php echo $tapin_product_id; ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </td>
                <?php endif; ?>
                <?php if ($title || $state || $city || $sender || $postcode || $phone || $response_time || $namad_id || $url || $email || $print_date || $transmission_date || $order_id_html || $order_status || $barcode || $economical || $reg): ?>
                    <td>
                        <table class="shop-info-table table-responsive table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                        <?php if ($logo): ?>
                                            <tr>
                                                <td colspan="2"><?php echo $logo; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($title): ?>
                                            <tr>
                                                <td colspan="2"><?php echo $title; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($state || $city): ?>
                                            <tr>
                                                <?php if ($state): ?>
                                                    <td><?php echo $state; ?></td>
                                                <?php endif; ?>
                                                <?php if ($city): ?>
                                                    <td><?php echo $city; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($sender): ?>
                                            <tr>
                                                <td colspan="2"><?php echo $sender; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($postcode || $phone): ?>
                                            <tr>
                                                <?php if ($postcode): ?>
                                                    <td><?php echo $postcode; ?></td>
                                                <?php endif; ?>
                                                <?php if ($phone): ?>
                                                    <td><?php echo $phone; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($response_time || $namad_id): ?>
                                            <tr>
                                                <?php if ($response_time): ?>
                                                    <td><?php echo $response_time; ?></td>
                                                <?php endif; ?>
                                                <?php if ($namad_id): ?>
                                                    <td><?php echo $namad_id; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($url || $email): ?>
                                            <tr>
                                                <?php if ($url): ?>
                                                    <td><?php echo $url; ?></td>
                                                <?php endif; ?>
                                                <?php if ($email): ?>
                                                    <td><?php echo $email; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($print_date || $transmission_date): ?>
                                            <tr>
                                                <?php if ($print_date): ?>
                                                    <td><?php echo $print_date; ?></td>
                                                <?php endif; ?>
                                                <?php if ($transmission_date): ?>
                                                    <td><?php echo $transmission_date; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($order_id_html || $order_status): ?>
                                            <tr>
                                                <?php if ($order_id_html): ?>
                                                    <td><?php echo $order_id_html; ?></td>
                                                <?php endif; ?>
                                                <?php if ($order_status): ?>
                                                    <td><?php echo $order_status; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($economical || $reg): ?>
                                            <tr>
                                                <?php if ($economical): ?>
                                                    <td><?php echo $economical; ?></td>
                                                <?php endif; ?>
                                                <?php if ($reg): ?>
                                                    <td><?php echo $reg; ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($barcode): ?>
                                            <tr>
                                                <td colspan="2"><?php echo $barcode; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                <?php endif; ?>
            </tr>
            </tbody>
        </table>
        <?php if ($products_table): ?>
            <?php echo $products_table; ?>
        <?php endif; ?>
        <table class="total-services-table table-responsive table-bordered table-fixed">
            <tbody>
            <?php if ($pay_method): ?>
                <tr class="pay-method">
                    <td colspan="2"><?php echo $pay_method; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($post_services || $total_table): ?>
                <tr>
                    <?php if ($post_services): ?>
                        <td class="post-services-cell"><?php echo $post_services; ?></td>
                    <?php endif; ?>
                    <?php if ($total_table): ?>
                        <td class="final-amount-cell">
                            <?php echo $total_table; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <table class="customer-info-table table-responsive table-fixed">
            <tbody>
            <tr>
                <?php if ($full_name || $recipient || $r_postcode || $r_phone || $order_date || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date  || $novin_delivery_notice || $customer_note): ?>
                    <td class="customer-info">
                        <table>
                            <tbody>
                            <?php if ($full_name): ?>
                                <tr>
                                    <td colspan="2"><?php echo $full_name; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($r_state || $r_city): ?>
                                <tr>
                                    <td><?php echo $r_state; ?></td>
                                    <td><?php echo $r_city; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($recipient): ?>
                                <tr>
                                    <td colspan="2"><?php echo $recipient; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($r_postcode || $r_phone): ?>
                                <tr>
                                    <td><?php echo $r_postcode; ?></td>
                                    <td><?php echo $r_phone; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($order_date || $trans_id): ?>
                                <tr>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $trans_id; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($national_id || $shipping): ?>
                                <tr>
                                    <td><?php echo $national_id; ?></td>
                                    <td><?php echo $shipping; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($user_meta || $order_meta): ?>
                                <tr>
                                    <td><?php echo $user_meta; ?></td>
                                    <td><?php echo $order_meta; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($delivery_date): ?>
                                <tr>
                                    <td colspan="2"><?php echo $delivery_date; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($novin_delivery_date): ?>
                                <tr>
                                    <td colspan="2"><?php echo $novin_delivery_date; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($novin_delivery_notice): ?>
                                <tr>
                                    <td colspan="2"><?php echo $novin_delivery_notice; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($customer_note): ?>
                                <tr>
                                    <td colspan="2"><?php echo $customer_note; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($shop_note): ?>
                                <tr>
                                    <td colspan="2"><?php echo $shop_note; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($deliver_date || $deliver_time): ?>
                                <tr>
                                    <td><?php echo $deliver_date; ?></td>
                                    <td><?php echo $deliver_time; ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </td>
                <?php endif; ?>
                <?php if ($shop_sign || $customer_sign): ?>
                    <td class="signature">
                        <table>
                            <tbody>
                            <tr>
                                <?php if ($shop_sign): ?>
                                    <td class="shop-sign"><?php echo $shop_sign; ?></td>
                                <?php endif; ?>
                                <?php if ($customer_sign): ?>
                                    <td class="customer-sign"><?php echo $customer_sign; ?></td>
                                <?php endif; ?>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                <?php endif; ?>
            </tr>
            </tbody>
        </table>
        <table class="refund-post-table table-responsive table-fixed">
            <tbody>
            <tr>
                <?php if ($shop->is_show('tapin-refund-table')): ?>
                    <td class="refund-table-cell">
                        <table class="refund-table">
                            <tbody>
                            <tr>
                                <td colspan="2"><?php echo $labels->get_label('return-reason'); ?></td>
                            </tr>
                            <tr>
                                <td><span class="square"></span><?php echo $labels->get_label('lack-information'); ?>
                                </td>
                                <td><span class="square"></span><?php echo $labels->get_label('movement'); ?></td>
                            </tr>
                            <tr>
                                <td><span class="square"></span><?php echo $labels->get_label('lack-money'); ?></td>
                                <td>
                                    <span class="square"></span><?php echo $labels->get_label('amount-contradiction'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="square"></span><?php echo $labels->get_label('reopening-request'); ?>
                                </td>
                                <td><span class="square"></span><?php echo $labels->get_label('sending-delay'); ?></td>
                            </tr>
                            <tr>
                                <td><span class="square"></span><?php echo $labels->get_label('cancel-purchase'); ?>
                                </td>
                                <td>
                                    <span class="square"></span><?php echo $labels->get_label('recipient-not-identified'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="square"></span><?php echo $labels->get_label('duplicate-order'); ?>
                                </td>
                                <td><span class="square"></span><?php echo $labels->get_label('others'); ?></td>
                            </tr>
                            <tr class="postman-name">
                                <td colspan="2">
                                    <?php echo $labels->get_label('postman-name'); ?>
                                    <div></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                <?php endif; ?>
                <td class="post-table-cell">
                    <table class="post-table table-bordered">
                        <tbody>
                        <tr class="post-logo">
                            <td colspan="2">
                                <?php echo $tapin_post_logo; ?>
                                <div class="post-title"><?php echo $labels->get_label('post-title'); ?></div>
                                <?php echo $tapin_shipping_method; ?>
                            </td>
                        </tr>
                        <?php if ($origin): ?>
                            <tr class="origin">
                                <td colspan="2"><?php echo $origin; ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($destination || $tapin_weight): ?>
                            <tr>
                                <?php if ($destination): ?>
                                    <td><?php echo $destination; ?></td>
                                <?php endif; ?>
                                <?php if ($tapin_weight): ?>
                                    <td><?php echo $tapin_weight; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
                        <?php if ($tapin_send_time): ?>
                            <tr class="send-time">
                                <td colspan="2"><?php echo $tapin_send_time; ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($tapin_send_price || $tapin_send_price_tax): ?>
                            <tr>
                                <?php if ($tapin_send_price): ?>
                                    <td><?php echo $tapin_send_price; ?></td>
                                <?php endif; ?>
                                <?php if ($tapin_send_price_tax): ?>
                                    <td><?php echo $tapin_send_price_tax; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo $tapin_barcode; ?>
                </td>
            </tr>
            </tbody>
        </table>
        <?php if ($tapin_footer_desc): ?>
            <?php echo $tapin_footer_desc; ?>
        <?php endif; ?>
        <?php if ($destination): ?>
            <div class="footer-destination"><?php echo $destination; ?></div>
        <?php endif; ?>
        <?php echo $watermark; ?>
    </div>
<?php
include(WIP_TPL_PATH . 'footer.php');