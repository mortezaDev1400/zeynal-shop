<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="template-7 container">
        <table class="header-table table-responsive table-fixed">
            <tbody>
            <tr>
				<?php if ( $logo ): ?>
                    <td>
						<?php echo $logo; ?>
                    </td>
				<?php endif; ?>
                <td>
                    <table>
                        <tbody>
                        <tr class="invoice-title">
                            <td colspan="3"><?php echo $labels->get_label( 'invoice' ); ?></td>
                        </tr>
						<?php if ( $print_date ): ?>
                            <tr>
                                <td><?php echo str_replace( ':', '', $labels->get_label( 'print-date' ) ); ?></td>
                                <td>:</td>
                                <td><?php echo $print_date; ?></td>
                            </tr>
						<?php endif; ?>
						<?php if ( $transmission_date ): ?>
                            <tr>
                                <td><?php echo str_replace( ':', '', $labels->get_label( 'transmission-date' ) ); ?></td>
                                <td>:</td>
                                <td><?php echo $transmission_date; ?></td>
                            </tr>
						<?php endif; ?>
						<?php if ( $order_id_html ): ?>
                            <tr>
                                <td><?php echo str_replace( ':', '', $labels->get_label( 'order-id' ) ); ?></td>
                                <td>:</td>
                                <td><?php echo $order_id_html; ?></td>
                            </tr>
						<?php endif; ?>
						<?php if ( $order_status ): ?>
                            <tr>
                                <td><?php echo str_replace( ':', '', $labels->get_label( 'order-status' ) ); ?></td>
                                <td>:</td>
                                <td><?php echo $order_status; ?></td>
                            </tr>
						<?php endif; ?>
						<?php if ( $barcode ): ?>
                            <tr class="barcode">
                                <td colspan="3"><?php echo $barcode; ?></td>
                            </tr>
						<?php endif; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
		<?php if ( $sender || $postcode || $economical || $reg ): ?>
            <div class="shop-info">
                <div class="dollar">$</div>
				<?php echo $title; ?>
				<?php echo $sender; ?>
				<?php echo $postcode; ?>
				<?php echo $economical; ?>
				<?php echo $reg; ?>
            </div>
		<?php endif; ?>
		<?php if ( $full_name || $recipient || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice ): ?>
            <div class="customer-info">
				<?php if ( $full_name ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>user.png" width="16" height="16">
						<?php echo $full_name; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $recipient ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>marker.png" width="16" height="16">
						<?php echo $recipient; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $r_postcode ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>zip-code.png" width="16" height="16">
						<?php echo $r_postcode; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $r_phone ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>phone.png" width="16" height="16">
						<?php echo $r_phone; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $r_email ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>mail.png" width="16" height="16">
						<?php echo $r_email; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $order_date ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>calendar.png" width="16" height="16">
						<?php echo $order_date; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $pay_method ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>credit-card.png" width="16" height="16">
						<?php echo $pay_method; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $trans_id ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>dollar.png" width="16" height="16">
						<?php echo $trans_id; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $national_id ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>name.png" width="16" height="16">
						<?php echo $national_id; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $shipping ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>box.png" width="16" height="16">
						<?php echo $shipping; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $user_meta ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>info.png" width="16" height="16">
						<?php echo $user_meta; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $order_meta ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>info.png" width="16" height="16">
						<?php echo $order_meta; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $delivery_date ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>clock.svg" width="16" height="16">
						<?php echo $delivery_date; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $novin_delivery_date ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>clock.svg" width="16" height="16">
						<?php echo $novin_delivery_date; ?>
                    </div>
				<?php endif; ?>
				<?php if ( $novin_delivery_notice ): ?>
                    <div>
                        <img src="<?php echo WIP_IMG_URL; ?>clock.svg" width="16" height="16">
						<?php echo $novin_delivery_notice; ?>
                    </div>
				<?php endif; ?>
            </div>
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
		<?php if ( $url || $email || $phone ): ?>
            <table class="footer-table table-fixed table-responsive">
                <tbody>
                <tr>
					<?php if ( $url ): ?>
                        <td>
                            <img src="<?php echo WIP_IMG_URL; ?>internet.png" width="16" height="16">
							<?php echo $url; ?>
                        </td>
					<?php endif; ?>
					<?php if ( $email ): ?>
                        <td>
                            <img src="<?php echo WIP_IMG_URL; ?>mail.png" width="16" height="16">
							<?php echo $email; ?>
                        </td>
					<?php endif; ?>
					<?php if ( $phone ): ?>
                        <td>
                            <img src="<?php echo WIP_IMG_URL; ?>phone.png" width="16" height="16">
							<?php echo $phone; ?>
                        </td>
					<?php endif; ?>
                </tr>
                </tbody>
            </table>
		<?php endif; ?>
		<?php echo $watermark; ?>
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );