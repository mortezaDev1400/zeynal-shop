<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$shop_logo = $options->get_option('shop-logo');
?>
<div class="wip-options-area wip-option-shop">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="world"></span></span>
        <strong><?php _e('Shop', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <div class="uk-margin">
            <label class="uk-form-label" for="wip-shop-logo"><?php _e('Logo', 'wip'); ?></label>
            <div class="wip-upload-file-wrapper">
                <img src="<?php echo intval($shop_logo) ? wp_get_attachment_url($shop_logo) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                <input type="hidden" name="shop-logo" value="<?php echo esc_attr($shop_logo); ?>">
                <br>
                <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
            </div>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-title"><?php _e('Title', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-title" name="shop-title" value="<?php echo esc_attr($options->get_option('shop-title')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-economical-num"><?php _e('Economical number', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-economical-num" name="shop-economical-num" value="<?php echo esc_attr($options->get_option('shop-economical-num')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-reg-num"><?php _e('Registration/National number', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-reg-num" name="shop-reg-num" value="<?php echo esc_attr($options->get_option('shop-reg-num')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-url"><?php _e('Website', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-url" name="shop-url" value="<?php echo esc_attr($options->get_option('shop-url')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-postcode"><?php _e('Postcode', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-postcode" name="shop-postcode" value="<?php echo esc_attr($options->get_option('shop-postcode')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-email"><?php _e('Email', 'wip'); ?></label>
        <input type="email" class="uk-input" id="wip-shop-email" name="shop-email" value="<?php echo esc_attr($options->get_option('shop-email')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-phone"><?php _e('Phone', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-phone" name="shop-phone" value="<?php echo esc_attr($options->get_option('shop-phone')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-address"><?php _e('Address', 'wip'); ?></label>
        <textarea class="uk-textarea" id="wip-shop-address" name="shop-address" rows="5"><?php echo esc_textarea($options->get_option('shop-address')); ?></textarea>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-state"><?php _e('State', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-state" name="shop-state" value="<?php echo esc_attr($options->get_option('shop-state')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-city"><?php _e('City', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-city" name="shop-city" value="<?php echo esc_attr($options->get_option('shop-city')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-response-time"><?php _e('Response time', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-response-time" name="shop-response-time" value="<?php echo esc_attr($options->get_option('shop-response-time')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-shop-namad-id"><?php _e('Namad ID', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-shop-namad-id" name="shop-namad-id" value="<?php echo esc_attr($options->get_option('shop-namad-id')); ?>">
    </div>
</div>