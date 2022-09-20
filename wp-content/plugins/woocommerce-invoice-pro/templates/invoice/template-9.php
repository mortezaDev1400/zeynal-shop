<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

include(WIP_TPL_PATH . 'header.php');
?>
    <div class="template-9 container">
        <table class="template-table table-responsive">
            <tr class="first-row">
                <td class="title-cell">
                    <div class="invoice-title"><?php echo $labels->get_label('invoice'); ?></div>
                    <?php echo $order_id_html; ?>
                </td>
                <td class="logo-cell">
                    <?php echo $logo; ?>
                    <?php echo $print_date; ?>
                    <?php echo $order_status; ?>
                    <?php echo $barcode; ?>
                </td>
            </tr>
            <tr class="second-row">
                <td class="info-cell">
                    <div class="shop-info">
                        <?php echo $title; ?>
                        <?php echo $url; ?>
                        <?php echo $email; ?>
                        <?php echo $phone; ?>
                        <?php echo $sender; ?>
                        <?php echo $postcode; ?>
                        <?php echo $economical; ?>
                        <?php echo $reg; ?>
                    </div>
                    <div class="customer-info">
                        <?php echo $recipient; ?>
                        <?php echo $full_name; ?>
                        <?php echo $r_postcode; ?>
                        <?php echo $r_phone; ?>
                        <?php echo $r_email; ?>
                        <?php echo $order_date; ?>
                        <?php echo $pay_method; ?>
                        <?php echo $trans_id; ?>
                        <?php echo $national_id; ?>
                        <?php echo $shipping; ?>
                        <?php echo $user_meta; ?>
                        <?php echo $order_meta; ?>
                        <?php echo $delivery_date; ?>
                        <?php echo $novin_delivery_date; ?>
                        <?php echo $novin_delivery_notice; ?>
                    </div>
                </td>
                <td class="products-cell">
                    <?php if ( $products_table ): ?>
                        <?php echo $products_table; ?>
                    <?php endif; ?>
                    <?php if ( $total_table ): ?>
                        <?php echo $total_table; ?>
                    <?php endif; ?>
                    <?php if ( $customer_note ): ?>
                        <?php echo $customer_note; ?>
                    <?php endif; ?>
                    <?php if ( $order_note ): ?>
                        <?php echo $order_note; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php if ( $shop_sign || $deliver_date || $deliver_time || $customer_sign ): ?>
                        <table class="signature-table table-responsive table-fixed">
                            <tbody>
                            <tr>
                                <?php if ( $shop_sign ): ?>
                                    <td><?php echo $shop_sign; ?></td>
                                <?php endif; ?>
                                <?php if ( $deliver_date ): ?>
                                    <td><?php echo $deliver_date; ?></td>
                                <?php endif; ?>
                                <?php if ( $deliver_time ): ?>
                                    <td><?php echo $deliver_time; ?></td>
                                <?php endif; ?>
                                <?php if ( $customer_sign ): ?>
                                    <td><?php echo $customer_sign; ?></td>
                                <?php endif; ?>
                            </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php echo $watermark; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="bottom-line"></div>
<?php
include(WIP_TPL_PATH . 'footer.php');