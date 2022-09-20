<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$customer_addr = $options->get_option('customer-addr');
$user_meta = $options->get_option('user-meta');
$order_meta = $options->get_option('order-meta');
?>
<div class="wip-options-area wip-option-customer">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="user"></span></span>
        <strong><?php _e('Customer', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-customer-addr"><?php _e('Customer address', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-customer-addr" name="customer-addr">
                <option value="billing" <?php selected($customer_addr, 'billing'); ?>><?php _e('Billing address', 'wip'); ?></option>
                <option value="shipping" <?php selected($customer_addr, 'shipping'); ?>><?php _e('Shipping address', 'wip'); ?></option>
                <option value="both" <?php selected($customer_addr, 'both'); ?>><?php _e('Both', 'wip'); ?></option>
            </select>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('National ID', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="national-id" value="1" <?php echo checked($options->get_option('national-id'), 1); ?>>
                <?php _e('With this option enabled, regardless of your current theme the National ID field will be added to the checkout form and can also be displayed on the invoice.', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="no-validate-national-id" value="1" <?php echo checked($options->get_option('no-validate-national-id'), 1); ?>>
                <?php _e('No validate', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('User meta', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Enter the label and user meta key in this format to display at the end of the address:', 'wip'); ?>
            <code>label@user_meta_key</code>
        </div>
        <div class="wip-meta-wrapper">
            <?php
            if ($user_meta && is_array($user_meta)) {
                foreach ($user_meta as $meta) {
                    ?>
                    <div class="uk-margin-small">
                        <input type="text" class="uk-input" name="user-meta[]" value="<?php echo esc_attr($meta); ?>">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <a href="#" class="wip-add-meta uk-button uk-button-default" data-toggle="user">
            <span uk-icon="plus"></span>
            <?php _e('Add new', 'wip'); ?>
        </a>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Order meta', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Enter the label and order meta key in this format to display at the end of the customer info:', 'wip'); ?>
            <code>label@post_meta_key</code>
        </div>
        <div class="wip-meta-wrapper">
            <?php
            if ($order_meta && is_array($order_meta)) {
                foreach ($order_meta as $meta) {
                    ?>
                    <div class="uk-margin-small">
                        <input type="text" class="uk-input" name="order-meta[]" value="<?php echo esc_attr($meta); ?>">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <a href="#" class="wip-add-meta uk-button uk-button-default" data-toggle="order">
            <span uk-icon="plus"></span>
            <?php _e('Add new', 'wip'); ?>
        </a>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Optimize customer address', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="wip-confirm uk-checkbox" type="checkbox" name="optimize-address" data-toggle="optimize-address" value="1" <?php echo checked($options->get_option('optimize-address'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="wip-confirm-activation" id="wip-optimize-address">
            <span uk-icon="warning"></span>
            <?php _e('Enable this option if you have trouble displaying customer address.', 'wip'); ?>
        </div>
    </div>
</div>