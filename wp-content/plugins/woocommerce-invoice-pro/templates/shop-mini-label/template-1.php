<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="template-1 container">
        <div class="inner">
			<?php echo $title; ?>
			<?php echo $sender; ?>
			<?php echo $postcode; ?>
			<?php echo $economical; ?>
			<?php echo $reg; ?>
			<?php echo $phone; ?>
			<?php echo $email; ?>
			<?php echo $url; ?>
			<?php echo $order_id_html; ?>
			<?php echo $order_status; ?>
			<?php echo $print_date; ?>
			<?php echo $transmission_date; ?>
			<?php echo $barcode; ?>
        </div>
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );