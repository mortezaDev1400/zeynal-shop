<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$whatsapp_service = $options->get_option('whatsapp-service');
$meta_keys = WIP_Helper::user_meta_keys();
$meta_key = $options->get_option('mobile-meta-key');
?>
<div class="wip-options-area wip-option-whatsapp">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="whatsapp"></span></span>
        <strong><?php _e('Whatsapp', 'wip'); ?></strong>
    </h2>
    <ul uk-tab>
        <li class="uk-active"><a href="#"><?php _e('Global', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Statuses', 'wip'); ?></a></li>
    </ul>
    <ul class="uk-switcher uk-margin">
        <li>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Send invoice', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="send-payment-completed-whatsapp" value="1" <?php checked($options->get_option('send-payment-completed-whatsapp'), 1); ?>>
                        <?php _e('Payment completed', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="send-vendor-whatsapp" value="1" <?php checked($options->get_option('send-vendor-whatsapp'), 1); ?>>
                        <?php _e('Send invoice to vendor', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-whatsapp-key"><?php _e('Key', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-whatsapp-key" name="whatsapp-key" value="<?php echo esc_attr($options->get_option('whatsapp-key')); ?>">
                <p class="wip-confirm-activation" style="display: block;"><a href="https://wamessenger.net" target="_blank"><?php _e('Get the key from here.', 'wip'); ?></a></p>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-whatsapp-recipients-phone"><?php _e('Recipients phone', 'wip'); ?></label>
                <div class="wip-description">
                    <span uk-icon="info"></span>
                    <?php _e('Enter each phone in a separate line.', 'wip'); ?>
                </div>
                <textarea class="uk-textarea" id="wip-whatsapp-recipients-phone" name="whatsapp-recipients-phone" rows="4"><?php echo esc_textarea($options->get_option('whatsapp-recipients-phone')); ?></textarea>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-whatsapp-text"><?php _e('Content', 'wip'); ?></label>
                <textarea class="uk-textarea" id="wip-whatsapp-text" name="whatsapp-text" rows="8"><?php echo esc_textarea($options->get_option('whatsapp-text')); ?></textarea>
                <table class="wip-code-table">
                    <tbody>
                    <tr>
                        <td><?php _e('Order ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{order-id}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Order status', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{order-status}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Products', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{products}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Address', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{address}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Full name', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{full-name}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Postcode', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{postcode}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Phone', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{phone}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Email', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{email}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Order date', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{order-date}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Payment method', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{payment-method}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Transaction ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{transaction-id}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('National ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{national-id}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Shipping method', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{shipping-method}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Total amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{total-amount}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Discount amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{discount-amount}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Tax amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{tax-amount}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Shipping amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{shipping-amount}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Final amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{final-amount}}</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Refunded amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{refunded-amount}}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Total items', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{total-items}}</code></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </li>
        <li>
            <?php foreach (wc_get_order_statuses() as $status_key => $title): ?>
                <?php $status = str_replace('wc-', '', $status_key); ?>
                <div class="uk-margin">
                    <div class="uk-margin-small">
                        <label class="uk-form-label">
                            <input class="uk-checkbox" type="checkbox" name="send-order-<?php echo esc_attr($status); ?>-whatsapp" value="1" <?php checked($options->get_option('send-order-' . $status . '-whatsapp'), 1); ?>>
                            <?php echo esc_html($title); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <textarea class="uk-textarea" name="whatsapp-text-<?php echo esc_attr($status); ?>" rows="8" placeholder="<?php _e('Content', 'wip'); ?>"><?php echo esc_textarea($options->get_option('whatsapp-text-' . $status)); ?></textarea>
                    </div>
                </div>
            <?php endforeach; ?>
        </li>
    </ul>
</div>