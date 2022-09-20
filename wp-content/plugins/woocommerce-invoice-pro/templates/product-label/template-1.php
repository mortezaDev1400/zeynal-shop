<?php
defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) );

include( WIP_TPL_PATH . 'header.php' );
?>
    <div class="template-1 container">
        <?php echo (new WIP_Products_Label($this->get_order_id(), $this->type))->render_html(); ?>
    </div>
<?php
include( WIP_TPL_PATH . 'footer.php' );