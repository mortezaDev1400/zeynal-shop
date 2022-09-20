<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

include(WIP_TPL_PATH . 'header.php');
$barcode = $shop->get_barcode_html(2, 70);
?>
    <div class="template-2 container">
        <table class="table-bordered table-fixed">
            <tbody>
            <?php if ($title || $sender || $postcode || $economical || $reg || $phone || $email || $url || $order_status || $print_date || $transmission_date): ?>
                <tr>
                    <td class="shop-info" colspan="2">
                        <img src="<?php echo WIP_IMG_URL . 'post.png'; ?>">
                        <?php echo $title; ?>
                        <?php echo $sender; ?>
                        <?php echo $postcode; ?>
                        <?php echo $economical; ?>
                        <?php echo $reg; ?>
                        <?php echo $phone; ?>
                        <?php echo $email; ?>
                        <?php echo $url; ?>
                        <?php echo $order_status; ?>
                        <?php echo $print_date; ?>
                        <?php echo $transmission_date; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($recipient || $full_name): ?>
                <tr>
                    <td><?php echo $recipient; ?></td>
                    <td><?php echo $full_name; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($r_postcode || $r_phone): ?>
                <tr>
                    <td><?php echo $r_postcode; ?></td>
                    <td><?php echo $r_phone; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($r_email || $order_date): ?>
                <tr>
                    <td><?php echo $r_email; ?></td>
                    <td><?php echo $order_date; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($trans_id || $national_id): ?>
                <tr>
                    <td><?php echo $trans_id; ?></td>
                    <td><?php echo $national_id; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($user_meta || $shipping): ?>
                <tr>
                    <td><?php echo $user_meta; ?></td>
                    <td><?php echo $shipping; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($pay_method || $order_meta): ?>
                <tr>
                    <td><?php echo $pay_method; ?></td>
                    <td><?php echo $order_meta; ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php echo $barcode; ?>
        <?php echo $order_id_html; ?>
    </div>
<?php
include(WIP_TPL_PATH . 'footer.php');