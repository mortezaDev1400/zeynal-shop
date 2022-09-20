<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$barcode_type = $options->get_option('barcode-type');
?>
<div class="wip-options-area wip-option-misc">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="database"></span></span>
        <strong><?php _e('Misc', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-date-format"><?php _e('Date format', 'wip'); ?></label>
        <input type="text" class="uk-input" id="wip-date-format" name="date-format" value="<?php echo esc_attr($options->get_option('date-format')); ?>">
        <div class="wip-description">
            <span uk-icon="info"></span>
            <a href="https://www.php.net/manual/en/function.date.php" target="_blank"><?php _e('Get it from this link.', 'wip'); ?></a>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-repair-date"><?php _e('Repair date', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="wip-confirm uk-checkbox" type="checkbox" name="repair-date" data-toggle="repair-date" value="1" <?php echo checked($options->get_option('repair-date'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="wip-confirm-activation" id="wip-repair-date">
            <span uk-icon="warning"></span>
            <?php _e('Enable this option if you have problems with date.', 'wip'); ?>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Vendor address', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="vendor-address" value="1" <?php echo checked($options->get_option('vendor-address'), 1); ?>>
                <?php _e('If you are using Dokan plugin, the seller\'s address will be replaced with the store\'s address.', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Barcode type', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="barcode-type" value="barcode" <?php checked($barcode_type, 'barcode'); ?>>
                <?php _e('Barcode', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="barcode-type" value="qrcode" <?php checked($barcode_type, 'qrcode'); ?>>
                <?php _e('QR Code', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Persian number', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="persian-number" value="1" <?php echo checked($options->get_option('persian-number'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
    </div>
    <?php if (is_plugin_active('sepehr-digital-signature/index.php')): ?>
        <div class="uk-margin">
            <label class="uk-form-label"><?php _e('Replace barcode', 'wip'); ?></label>
            <div class="uk-margin-small">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="replace-sepehr-barcode" value="1" <?php echo checked($options->get_option('replace-sepehr-barcode'), 1); ?>>
                    <?php _e('Selecting this option, replaced the barcode of Sepehr digital signature plugin.', 'wip'); ?>
                </label>
            </div>
        </div>
    <?php endif; ?>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Page break', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="page-break" value="1" <?php echo checked($options->get_option('page-break'), 1); ?>>
                <?php _e('Print each page in separate for bulk printing.', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Print count', 'wip'); ?></label>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-invoice" value="<?php echo esc_attr($options->get_option('print-count-invoice')); ?>" placeholder="<?php _e('Invoice page', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-packing-slip" value="<?php echo esc_attr($options->get_option('print-count-packing-slip')); ?>" placeholder="<?php _e('Packing slip page', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-post-label" value="<?php echo esc_attr($options->get_option('print-count-post-label')); ?>" placeholder="<?php _e('Post label page', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-shop-mini-label" value="<?php echo esc_attr($options->get_option('print-count-shop-mini-label')); ?>" placeholder="<?php _e('Shop mini label page', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-order-label" value="<?php echo esc_attr($options->get_option('print-count-order-label')); ?>" placeholder="<?php _e('Order label page', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" name="print-count-customer-mini-label" value="<?php echo esc_attr($options->get_option('print-count-customer-mini-label')); ?>" placeholder="<?php _e('Customer mini label page', 'wip'); ?>">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-repair-date"><?php _e('Repair URL', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="wip-confirm uk-checkbox" type="checkbox" name="repair-url" data-toggle="repair-url" value="1" <?php echo checked($options->get_option('repair-url'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="wip-confirm-activation" id="wip-repair-url">
            <span uk-icon="warning"></span>
            <?php _e('If you have a problem displaying the invoice, enable this option.', 'wip'); ?>
        </div>
    </div>
</div>