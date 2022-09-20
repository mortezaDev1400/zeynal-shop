<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$tapin_logo = $options->get_option('tapin-logo');
$post_logo = $options->get_option('post-logo');
?>
<div class="wip-options-area wip-option-tapin">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="nut"></span></span>
        <strong><?php _e('Tapin', 'wip'); ?></strong>
    </h2>
    <?php if (!is_plugin_active('persian-woocommerce-shipping/woocommerce-shipping.php')): ?>
        <div class="wip-pws-alert">
            <span class="dashicons dashicons-warning"></span>&nbsp;<?php _e('Please install persian woocommerce shipping plugin.', 'wip'); ?>
            &nbsp;<a href="https://wordpress.org/plugins/persian-woocommerce-shipping" target="_blank"><?php _e('Plugin page', 'wip'); ?>
                &nbsp;<?php echo is_rtl() ? '&#8592;' : '&#8594;'; ?></a></div>
    <?php endif; ?>
    <div class="uk-margin">
        <div class="uk-margin">
            <label class="uk-form-label" for="wip-tapin-logo"><?php _e('Logo', 'wip'); ?></label>
            <div class="wip-upload-file-wrapper">
                <img src="<?php echo intval($tapin_logo) ? wp_get_attachment_url($tapin_logo) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                <input type="hidden" name="tapin-logo" value="<?php echo esc_attr($tapin_logo); ?>">
                <br>
                <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-tapin-desc"><?php _e('Header description', 'wip'); ?></label>
        <textarea class="uk-textarea" id="wip-tapin-desc" name="tapin-desc" rows="5"><?php echo esc_textarea($options->get_option('tapin-desc')); ?></textarea>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-tapin-footer"><?php _e('Footer description', 'wip'); ?></label>
        <textarea class="uk-textarea" id="wip-tapin-footer" name="tapin-footer" rows="5"><?php echo esc_textarea($options->get_option('tapin-footer')); ?></textarea>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-post-services"><?php _e('Post services', 'wip'); ?></label>
        <input class="uk-input" id="wip-post-services" name="post-services" value="<?php echo esc_attr($options->get_option('post-services')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-note"><?php _e('Shop note', 'wip'); ?></label>
        <input class="uk-input" id="wip-shop-note" name="shop-note" value="<?php echo esc_attr($options->get_option('shop-note')); ?>">
    </div>
    <div class="uk-margin">
        <div class="uk-margin">
            <label class="uk-form-label" for="wip-post-logo"><?php _e('Post logo', 'wip'); ?></label>
            <div class="wip-upload-file-wrapper">
                <img src="<?php echo intval($post_logo) ? wp_get_attachment_url($post_logo) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                <input type="hidden" name="post-logo" value="<?php echo esc_attr($post_logo); ?>">
                <br>
                <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
            </div>
        </div>
    </div>
</div>