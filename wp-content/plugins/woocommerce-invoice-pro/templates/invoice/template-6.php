<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="template-6 container">
        <table class="shop-info table-responsive table-fixed">
            <tbody>
            <tr>
				<?php if ( $order_id_html || $logo ): ?>
                    <td>
						<?php echo $order_id_html; ?>
						<?php echo $logo; ?>
                    </td>
				<?php endif; ?>
				<?php if ( $title || $sender || $postcode || $print_date || $transmission_date || $phone || $economical || $reg ): ?>
                    <td>
                        <table class="table-fixed">
                            <tbody>
                            <tr>
								<?php if ( $title || $sender || $postcode ): ?>
                                    <td>
										<?php echo $title; ?>
										<?php echo $sender; ?>
										<?php echo $postcode; ?>
                                    </td>
								<?php endif; ?>
								<?php if ( $print_date || $transmission_date || $phone || $economical || $reg ): ?>
                                    <td>
										<?php echo $print_date; ?>
										<?php echo $transmission_date; ?>
										<?php echo $phone; ?>
										<?php echo $economical; ?>
										<?php echo $reg; ?>
                                    </td>
								<?php endif; ?>
                            </tr>
                            </tbody>
                        </table>
                    </td>
				<?php endif; ?>
            </tr>
            </tbody>
        </table>
	    <?php if ( $products_table ): ?>
		    <?php echo $products_table; ?>
	    <?php endif; ?>
	    <?php if ( $total_table ): ?>
		    <?php echo $total_table; ?>
	    <?php endif; ?>
		<?php if ( $recipient || $full_name || $r_postcode || $r_phone || $r_email || $order_date || $pay_method || $trans_id || $national_id || $shipping || $user_meta || $order_meta || $delivery_date || $novin_delivery_date || $novin_delivery_notice ): ?>
            <div class="star-line">
				<?php
				for ( $i = 0; $i < 250; $i ++ ) {
					echo '* ';
				}
				?>
            </div>
            <table class="customer-info table-fixed">
                <tbody>
				<?php if ( $recipient ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'recipient' ) ); ?></td>
                        <td><?php echo $recipient; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $full_name ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'full-name' ) ); ?></td>
                        <td><?php echo $full_name; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $r_postcode ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'postcode' ) ); ?></td>
                        <td><?php echo $r_postcode; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $r_phone ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'phone' ) ); ?></td>
                        <td><?php echo $r_phone; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $r_email ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'email' ) ); ?></td>
                        <td><?php echo $r_email; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $order_date ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'order-date' ) ); ?></td>
                        <td><?php echo $order_date; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $pay_method ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'payment-method' ) ); ?></td>
                        <td><?php echo $pay_method; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $trans_id ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'transaction-id' ) ); ?></td>
                        <td><?php echo $trans_id; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $national_id ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'national-id' ) ); ?></td>
                        <td><?php echo $national_id; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $shipping ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'shipping-method' ) ); ?></td>
                        <td><?php echo $shipping; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $user_meta ): ?>
                    <tr>
                        <td colspan="2"><?php echo $user_meta; ?></td>
                    </tr>
				<?php endif; ?>
				<?php if ( $order_meta ): ?>
                    <tr>
                        <td colspan="2"><?php echo $order_meta; ?></td>
                    </tr>
				<?php endif; ?>
                <?php if ( $delivery_date ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'delivery-date' ) ); ?></td>
                        <td><?php echo $delivery_date; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ( $novin_delivery_date ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'delivery-date' ) ); ?></td>
                        <td><?php echo $novin_delivery_date; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ( $novin_delivery_notice ): ?>
                    <tr>
                        <td><?php echo str_replace( ':', '', $labels->get_label( 'delivery-notice' ) ); ?></td>
                        <td><?php echo $novin_delivery_notice; ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="star-line">
				<?php
				for ( $i = 0; $i < 250; $i ++ ) {
					echo '* ';
				}
				?>
            </div>
		<?php endif; ?>
        <div class="footer">
			<?php if ( $customer_note ): ?>
				<?php echo $customer_note; ?>
			<?php endif; ?>
			<?php if ( $order_note ): ?>
				<?php echo $order_note; ?>
			<?php endif; ?>
	        <?php if ( $shop_sign ): ?>
                <?php echo $shop_sign; ?>
	        <?php endif; ?>
	        <?php if ( $deliver_date ): ?>
                <?php echo $deliver_date; ?>
	        <?php endif; ?>
	        <?php if ( $deliver_time ): ?>
                <?php echo $deliver_time; ?>
	        <?php endif; ?>
	        <?php if ( $customer_sign ): ?>
                <?php echo $customer_sign; ?>
	        <?php endif; ?>
			<?php echo $barcode; ?>
			<?php if ( $order_status ): ?>
				<?php echo $order_status; ?>
			<?php endif; ?>
			<?php if ( $url ): ?>
				<?php echo $url; ?>
			<?php endif; ?>
			<?php if ( $email ): ?>
				<?php echo $email; ?>
			<?php endif; ?>
        </div>
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );