<?php defined('ABSPATH') || exit(__('No Access!', 'wip')); ?>
<div class="wip-options-area wip-option-emails">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="mail"></span></span>
        <strong><?php _e('Emails', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Send invoice', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="send-payment-completed" value="1" <?php checked($options->get_option('send-payment-completed'), 1); ?>>
                <?php _e('Payment completed', 'wip'); ?>
            </label>
        </div>
        <?php
        foreach (wc_get_order_statuses() as $status_key => $title) {
            $status = str_replace('wc-', '', $status_key);
            ?>
            <div class="uk-margin-small">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="send-order-<?php echo esc_attr($status); ?>" value="1" <?php checked($options->get_option('send-order-' . $status), 1); ?>>
                    <?php echo $title; ?>
                </label>
            </div>
            <?php
        }
        ?>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="send-vendor" value="1" <?php checked($options->get_option('send-vendor'), 1); ?>>
                <?php _e('Send invoice to vendor', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-email-from"><?php _e('Email from', 'wip'); ?></label>
        <input type="email" class="uk-input" id="wip-email-from" name="email-from" value="<?php echo esc_attr($options->get_option('email-from')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-from-name"><?php _e('From name', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-from-name" name="from-name" value="<?php echo esc_attr($options->get_option('from-name')); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-recipients-email"><?php _e('Recipients email', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Enter each email in a separate line.', 'wip'); ?>
        </div>
        <textarea class="uk-textarea" id="wip-recipients-email" name="recipients-email" rows="4"><?php echo esc_textarea($options->get_option('recipients-email')); ?></textarea>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Disable Woocommerce default email', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="disable-wc-onhold" value="1" <?php checked($options->get_option('disable-wc-onhold'), 1); ?>>
                <?php _e('On hold', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email')); ?>" class="uk-text-warning"><?php _e('To disable woocommerce others dafault emails click here.', 'wip'); ?></a>
        </div>
    </div>
</div>