<?php defined( 'ABSPATH' ) || exit( __( 'No Access!', 'wip' ) ); ?>
<div class="wip-options-area wip-option-labels">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="file-edit"></span></span>
        <strong><?php _e( 'Labels', 'wip' ); ?></strong>
    </h2>
    <div class="wip-description">
        <span uk-icon="info"></span>
		<?php _e( 'These texts will be replaced by the text in the invoice. If a field is left blank, the default value will be displayed.', 'wip' ); ?>
    </div>
	<?php $labels = new WIP_Labels_Manager(); ?>
	<?php foreach ( $labels->get_labels() as $name => $label ): ?>
        <div class="uk-margin">
            <input type="text" class="uk-input" name="labels[<?php echo $name; ?>]" value="<?php echo esc_attr( $labels->get_label( $name, false ) ); ?>" placeholder="<?php echo $label; ?>">
        </div>
	<?php endforeach; ?>
</div>