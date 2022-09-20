<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

include(WIP_TPL_PATH . 'header.php');
?>
    <div class="template-2 container">
        <table class="table-bordered table-fixed">
            <tbody>
            <?php if ($title || $sender || $postcode || $economical || $reg || $phone || $email): ?>
                <tr>
                    <td class="shop-info" colspan="3">
                        <?php echo $title; ?>
                        <?php echo $sender; ?>
                        <?php echo $postcode; ?>
                        <?php echo $economical; ?>
                        <?php echo $reg; ?>
                        <?php echo $phone; ?>
                        <?php echo $email; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($r_phone || $order_date || $logo || $url): ?>
                <tr>
                    <?php if ($r_phone || $order_date): ?>
                        <td class="customer-phone-date" colspan="2">
                            <?php echo $r_phone; ?>
                            <?php echo $order_date; ?>
                        </td>
                    <?php endif; ?>
                    <?php if ($logo || $url): ?>
                        <td class="logo-url" rowspan="4">
                            <?php echo $logo; ?>
                            <?php echo $url; ?>
                            <img src="<?php echo WIP_IMG_URL . 'post.png'; ?>">
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
            <?php if ($recipient || $full_name || $r_postcode || $r_email || $order_status || $trans_id || $national_id || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice): ?>
                <tr>
                    <td class="customer-info" colspan="2">
                        <?php echo $recipient; ?>
                        <?php echo $full_name; ?>
                        <?php echo $r_postcode; ?>
                        <?php echo $r_email; ?>
                        <?php echo $order_status; ?>
                        <?php echo $trans_id; ?>
                        <?php echo $national_id; ?>
                        <?php echo $user_meta; ?>
                        <?php echo $order_meta; ?>
                        <?php echo $delivery_date; ?>
                        <?php echo $novin_delivery_date; ?>
                        <?php echo $novin_delivery_notice; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($shipping || $pay_method): ?>
                <tr>
                    <?php if ($shipping): ?>
                        <td>
                            <div class="with-icon">
                                <img src="<?php echo WIP_IMG_URL . 'shipped.svg'; ?>" width="28" height="28">
                                <?php echo $shipping; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                    <?php if ($pay_method): ?>
                        <td>
                            <div class="with-icon">
                                <img src="<?php echo WIP_IMG_URL . 'money-bag.svg'; ?>" width="28" height="28">
                                <?php echo $pay_method; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
            <?php if ($order_id_html || $print_date || $transmission_date): ?>
                <tr>
                    <?php if ($order_id_html): ?>
                        <td>
                            <div class="with-icon">
                                <img src="<?php echo WIP_IMG_URL . 'menu.svg'; ?>" width="28" height="28">
                                <?php echo $order_id_html; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                    <?php if ($print_date || $transmission_date): ?>
                        <td>
                            <?php if ($print_date): ?>
                                <div class="with-icon">
                                    <img src="<?php echo WIP_IMG_URL . 'clock.svg'; ?>" width="28" height="28">
                                    <?php echo $print_date; ?>
                                </div>
                                <br>
                            <?php endif; ?>
                            <?php if ($transmission_date): ?>
                                <div class="with-icon">
                                    <img src="<?php echo WIP_IMG_URL . 'clock.svg'; ?>" width="28" height="28">
                                    <?php echo $transmission_date; ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
            <?php if ($products_list): ?>
                <tr>
                    <td colspan="3">
                        <?php echo $products_list; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($total_table): ?>
                <tr>
                    <td colspan="<?php echo $products_list ? 3 : 2; ?>">
                        <?php echo $total_table; ?>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
            <?php if ($barcode): ?>
                <tfoot>
                <tr>
                    <td colspan="3">
                        <?php echo $barcode; ?>
                    </td>
                </tr>
                </tfoot>
            <?php endif; ?>
        </table>
    </div>
<?php
include(WIP_TPL_PATH . 'footer.php');