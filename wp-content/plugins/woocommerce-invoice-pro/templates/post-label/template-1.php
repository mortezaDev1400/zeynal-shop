<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

include(WIP_TPL_PATH . 'header.php');
$colspan = 0;
?>
    <div class="template-1 container">
        <div class="inner">
            <table class="table-bordered table-fixed">
                <tbody>
                <tr>
                    <?php if ($recipient || $full_name || $r_postcode || $r_phone || $r_email || $order_date || $trans_id || $national_id || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice || $customer_note || $barcode): ?>
                        <td>
                            <?php echo $recipient; ?>
                            <?php echo $full_name; ?>
                            <?php echo $r_postcode; ?>
                            <?php echo $r_phone; ?>
                            <?php echo $r_email; ?>
                            <?php echo $order_date; ?>
                            <?php echo $trans_id; ?>
                            <?php echo $national_id; ?>
                            <?php echo $user_meta; ?>
                            <?php echo $order_meta; ?>
                            <?php echo $delivery_date; ?>
                            <?php echo $novin_delivery_date; ?>
                            <?php echo $novin_delivery_notice; ?>
                            <?php echo $customer_note; ?>
                            <?php echo $barcode; ?>
                        </td>
                        <?php $colspan++ ?>
                    <?php endif; ?>
                    <?php if ($logo || $title || $sender || $postcode || $economical || $reg || $phone || $email || $url): ?>
                        <td>
                            <?php echo $logo; ?>
                            <?php echo $title; ?>
                            <?php echo $sender; ?>
                            <?php echo $postcode; ?>
                            <?php echo $economical; ?>
                            <?php echo $reg; ?>
                            <?php echo $phone; ?>
                            <?php echo $email; ?>
                            <?php echo $url; ?>
                        </td>
                        <?php $colspan++ ?>
                    <?php endif; ?>
                </tr>
                <?php if ($products_list): ?>
                    <tr>
                        <td colspan="<?php echo $colspan; ?>">
                            <?php echo $products_list; ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($total_table): ?>
                    <tr>
                        <td colspan="<?php echo $colspan; ?>">
                            <?php echo $total_table; ?>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
                <?php if ($shipping || $pay_method || $order_id_html || $order_status || $print_date || $transmission_date): ?>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <div>
                                <?php echo $shipping; ?>
                                <?php echo $pay_method; ?>
                                <?php echo $order_id_html; ?>
                                <?php echo $order_status; ?>
                                <?php echo $print_date; ?>
                                <?php echo $transmission_date; ?>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
<?php
include(WIP_TPL_PATH . 'footer.php');