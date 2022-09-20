<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="top-line"></div>
    <div class="template-8 container">
		<?php if ( $logo || $print_date || $transmission_date ): ?>
            <table class="header-table table-responsive table-fixed">
                <tbody>
                <tr>
					<?php if ( $logo ): ?>
                        <td><?php echo $logo; ?></td>
					<?php endif; ?>
                    <td class="invoice-title"><?php echo $labels->get_label( 'goods-services' ); ?></td>
					<?php if ( $print_date || $transmission_date ): ?>
                        <td class="print-date">
                            <?php echo $print_date; ?>
                            <?php echo $transmission_date; ?>
                        </td>
					<?php endif; ?>
                </tr>
                </tbody>
            </table>
		<?php endif; ?>
		<?php if ( $title || $sender || $postcode || $economical || $reg || $url || $email || $phone || $recipient || $full_name || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice ): ?>
            <table class="shop-customer-table table-responsive table-bordered">
                <tbody>
				<?php if ( $title || $sender || $postcode || $economical || $reg || $url || $email || $phone ): ?>
                    <tr>
                        <th>
                            <span><?php echo $labels->get_label( 'seller' ); ?></span>
                        </th>
                        <td class="info">
							<?php echo $title; ?>
							<?php echo $sender; ?>
							<?php echo $postcode; ?>
							<?php echo $economical; ?>
							<?php echo $reg; ?>
                        </td>
                        <td class="last">
							<?php echo $url; ?>
							<?php echo $email; ?>
							<?php echo $phone; ?>
                        </td>
                    </tr>
				<?php endif; ?>
				<?php if ( $full_name || $recipient || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice || $order_id_html || $order_status || $barcode ): ?>
                    <tr>
                        <th>
                            <span><?php echo $labels->get_label( 'shopper' ); ?></span>
                        </th>
                        <td class="info">
							<?php echo $full_name; ?>
							<?php echo $recipient; ?>
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
                        <td class="last">
							<?php echo $order_id_html; ?>
							<?php echo $order_status; ?>
							<?php echo $barcode; ?>
                        </td>
                    </tr>
				<?php endif; ?>
                </tbody>
            </table>
		<?php endif; ?>
        <div style="padding: 0 5px;">
			<?php if ( $products_table ): ?>
				<?php echo $products_table; ?>
			<?php endif; ?>
            <table class="table-fixed table-responsive">
                <tbody>
                <tr>
                    <td class="note-cell">
						<?php if ( $customer_note ): ?>
							<?php echo $customer_note; ?>
						<?php endif; ?>
						<?php if ( $order_note ): ?>
							<?php echo $order_note; ?>
						<?php endif; ?>
                    </td>
                    <td class="total-cell">
						<?php if ( $total_table ): ?>
							<?php echo $total_table; ?>
						<?php endif; ?>
                    </td>
                </tr>
                </tbody>
            </table>
			<?php if ( $shop_sign || $deliver_date || $deliver_time || $customer_sign ): ?>
                <table class="signature-table table-responsive table-fixed table-bordered">
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
        </div>
		<?php echo $watermark; ?>
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );