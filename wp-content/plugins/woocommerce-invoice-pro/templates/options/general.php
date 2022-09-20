<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$pdf_layout = $options->get_option('pdf-layout');
?>
<div class="wip-options-area wip-option-general wip-active">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="settings"></span></span>
        <strong><?php _e('General', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <?php if (!get_option('wip-hide-tuts-alert')): ?>
            <div class="wip-custom-alert wip-custom-alert-success">
                <h4><?php _e('Video tutorials', 'wip'); ?></h4>
                <p><?php _e('This product has an installation and configuration instructional video.', 'wip'); ?></p>
                <p><?php _e('The tutorials video can be downloaded from the user panel > downloads.', 'wip'); ?></p>
                <button class="uk-button uk-button-default wip-hide-tuts-alert"><?php _e('Do not show this message', 'wip'); ?></button>
                <span class="wip-custom-alert-icon" uk-icon="icon: cog; ratio: 9"></span>
            </div>
        <?php endif; ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('User roles', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Select the user roles to access the other users invoice.', 'wip'); ?>
        </div>
        <?php
        $all_roles = WIP_Helper::get_editable_roles();
        $roles = $options->get_option('user-roles');
        foreach ($all_roles as $role => $details) {
            ?>
            <div class="uk-margin-small">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="user-roles[]" value="<?php echo $role; ?>" <?php echo (is_array($roles) && in_array($role, $roles)) || $role == 'administrator' ? 'checked' : null; ?> <?php echo $role == 'administrator' ? 'disabled' : null; ?>>
                    <?php echo translate_user_role($details['name']); ?>
                </label>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Order actions button', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span><?php _e('Buttons that appear in the order table operations column.', 'wip'); ?>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="invoice-btn" value="1" <?php checked($options->get_option('invoice-btn'), 1); ?>>
                <?php _e('Invoice button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="packing-slip-btn" value="1" <?php checked($options->get_option('packing-slip-btn'), 1); ?>>
                <?php _e('Packing slip button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="post-label-btn" value="1" <?php checked($options->get_option('post-label-btn'), 1); ?>>
                <?php _e('Post label button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="order-label-btn" value="1" <?php checked($options->get_option('order-label-btn'), 1); ?>>
                <?php _e('Order label button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="shop-mini-label-btn" value="1" <?php checked($options->get_option('shop-mini-label-btn'), 1); ?>>
                <?php _e('Shop mini label button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="customer-mini-label-btn" value="1" <?php checked($options->get_option('customer-mini-label-btn'), 1); ?>>
                <?php _e('Customer mini label button', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="product-label-btn" value="1" <?php checked($options->get_option('product-label-btn'), 1); ?>>
                <?php _e('Product label button', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Order statuses', 'wip'); ?></label>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Order statuses that the user will have access for own orders.', 'wip'); ?>
        </div>
        <?php
        $statuses = $options->get_option('order-statutes');
        foreach (wc_get_order_statuses() as $status => $title) {
            ?>
            <div class="uk-margin-small">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="order-statutes[]" value="<?php echo $status; ?>" <?php echo is_array($statuses) && in_array($status, $statuses) ? 'checked' : null; ?>>
                    <?php echo $title; ?>
                </label>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('View invoice', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="receiving-invoice-selection" value="1" <?php echo checked($options->get_option('receiving-invoice-selection'), 1); ?>>
                <?php _e('Select receiving invoice in checkout', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="account-btn" value="1" <?php echo checked($options->get_option('account-btn'), 1); ?>>
                <?php _e('Customer orders table', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="thankyou-btn" value="1" <?php echo checked($options->get_option('thankyou-btn'), 1); ?>>
                <?php _e('Thankyou page', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Download PDF', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="download-pdf" value="1" <?php echo checked($options->get_option('download-pdf'), 1); ?>>
                <?php _e('Active', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <input type="text" class="uk-input" id="wip-pdf-page-size" name="pdf-page-size" value="<?php echo esc_attr($options->get_option('pdf-page-size')); ?>" placeholder="<?php _e('Page size, for example: A4', 'wip'); ?>">
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="pdf-layout" value="P" <?php checked($pdf_layout, 'P'); ?>>
                <?php _e('Portrait', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-radio" type="radio" name="pdf-layout" value="L" <?php checked($pdf_layout, 'L'); ?>>
                <?php _e('Landscape', 'wip'); ?>
            </label>
        </div>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="invoice-attach" value="1" <?php checked($options->get_option('invoice-attach'), 1); ?>>
                <?php _e('By selecting this option, the PDF file will be attached to the email.', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Responsive', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="disable-responsive" value="1" <?php echo checked($options->get_option('disable-responsive'), 1); ?>>
                <?php _e('Disable', 'wip'); ?>
            </label>
        </div>
    </div>
</div>