<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$global_payment = $options->get_option('proforma-payment-global');
$default_payment = $options->get_option('proforma-payment-default');
?>
<div class="wip-options-area wip-option-proforma-invoice">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="copy"></span></span>
        <strong><?php _e('Proforma invoice', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Status', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="proforma-invoice" value="1" <?php echo checked($options->get_option('proforma-invoice'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Global payment status', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="proforma-payment-global" value="1" <?php checked($global_payment, '1'); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="proforma-payment-global" value="0" <?php checked($global_payment, '0'); ?>>
                <?php _e('Inactive', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Default payment status', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="proforma-payment-default" value="1" <?php checked($default_payment, '1'); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="proforma-payment-default" value="0" <?php checked($default_payment, '0'); ?>>
                <?php _e('Inactive', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-proforma-expire"><?php _e('Expire days', 'wip'); ?></label>
        <input type="number" class="uk-input" id="wip-proforma-expire" name="proforma-expire" step="1" value="<?php echo esc_attr($options->get_option('proforma-expire')); ?>">
    </div>
</div>