<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="template-4 container">
		<?php if ( $title || $url || $email || $phone || $print_date || $transmission_date || $order_id_html || $order_status || $barcode || $sender || $postcode || $economical || $reg ): ?>
            <table class="shop-info table-responsive table-fixed">
                <tbody>
                <tr>
					<?php if ( $logo || $url ): ?>
                        <td>
							<?php echo $logo; ?>
							<?php echo $url; ?>
                        </td>
					<?php endif; ?>
					<?php if ( $title || $email || $phone ): ?>
                        <td>
							<?php echo $title; ?>
							<?php echo $email; ?>
							<?php echo $phone; ?>
                        </td>
					<?php endif; ?>
					<?php if ( $print_date || $transmission_date || $order_id_html || $order_status || $barcode ): ?>
                        <td>
							<?php echo $print_date; ?>
							<?php echo $transmission_date; ?>
							<?php echo $order_id_html; ?>
							<?php echo $order_status; ?>
							<?php echo $barcode; ?>
                        </td>
					<?php endif; ?>
                </tr>
                </tbody>
            </table>
		<?php endif; ?>
        <div class="invoice-title"><?php echo $labels->get_label( 'invoice' ); ?></div>
		<?php if ( $sender || $postcode || $economical || $reg || $recipient || $full_name || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta|| $delivery_date || $novin_delivery_date || $novin_delivery_notice ): ?>
            <table class="sender-customer-table table-responsive table-fixed">
                <tbody>
                <tr>
					<?php if ( $sender || $postcode || $economical || $reg ): ?>
                        <td class="sender-info">
							<?php echo $sender; ?>
							<?php echo $postcode; ?>
							<?php echo $economical; ?>
							<?php echo $reg; ?>
                        </td>
					<?php endif; ?>
					<?php if ( $recipient || $full_name || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice ): ?>
                        <td class="customer-info">
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
                        </td>
					<?php endif; ?>
                </tr>
                </tbody>
            </table>
		<?php endif; ?>
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
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );