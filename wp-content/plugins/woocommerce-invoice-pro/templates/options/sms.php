<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$sms_service = $options->get_option('sms-service');
$meta_keys = WIP_Helper::user_meta_keys();
$meta_key = $options->get_option('mobile-meta-key');
?>
<div class="wip-options-area wip-option-sms">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="tablet"></span></span>
        <strong><?php _e('SMS', 'wip'); ?></strong>
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
                        <input class="uk-checkbox" type="checkbox" name="send-payment-completed-sms" value="1" <?php checked($options->get_option('send-payment-completed-sms'), 1); ?>>
                        <?php _e('Payment completed', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="send-vendor-sms" value="1" <?php checked($options->get_option('send-vendor-sms'), 1); ?>>
                        <?php _e('Send invoice to vendor', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-mobile-meta-key"><?php _e('Mobile meta key', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-mobile-meta-key" name="mobile-meta-key">
                        <option value=""><?php _e('Please select an item.', 'wip'); ?></option>
                        <?php if (is_array($meta_keys) && count($meta_keys)): ?>
                            <?php foreach ($meta_keys as $key): ?>
                                <option value="<?php echo esc_html($key); ?>" <?php selected($meta_key, $key); ?>><?php echo esc_html($key); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
                <div class="wip-description">
                    <span uk-icon="info"></span>
                    <?php _e('User must register your mobile number in your profile to receive SMS. If you use another plugin to register a user\'s mobile number, select the mobile meta key.', 'wip'); ?>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-sms-service"><?php _e('SMS service', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-sms-service" name="sms-service">
                        <option value=""><?php _e('Please select an item.', 'wip'); ?></option>
                        <option value="newsms" <?php selected($sms_service, 'newsms'); ?>>Newsms</option>
                        <option value="melipayamak" data-pattern="1" <?php selected($sms_service, 'melipayamak'); ?>>
                            Melipayamak
                        </option>
                        <option value="smsir" data-pattern="1" <?php selected($sms_service, 'smsir'); ?>>SMS.IR</option>
                        <option value="payamresan" <?php selected($sms_service, 'payamresan'); ?>>Payamresan</option>
                        <option value="farapayamak" data-pattern="1" <?php selected($sms_service, 'farapayamak'); ?>>
                            Farapayamak
                        </option>
                        <option value="payamkutah" <?php selected($sms_service, 'payamkutah'); ?>>Payamkutah</option>
                        <option value="niazpardaz" <?php selected($sms_service, 'niazpardaz'); ?>>Niazpardaz</option>
                        <option value="farazsms" data-pattern="1" <?php selected($sms_service, 'farazsms'); ?>>
                            Farazsms
                        </option>
                        <option value="zhiak" <?php selected($sms_service, 'zhiak'); ?>>Zhiak</option>
                        <option value="ippanel" data-pattern="1" <?php selected($sms_service, 'ippanel'); ?>>IPPanel
                        </option>
                        <option value="modirpayamak" <?php selected($sms_service, 'modirpayamak'); ?>>Modirpayamak
                        </option>
                        <option value="parsgreen" <?php selected($sms_service, 'parsgreen'); ?>>Parsgreen</option>
                        <option value="kavenegar" data-pattern="1" <?php selected($sms_service, 'kavenegar'); ?>>
                            Kavenegar
                        </option>
                        <option value="sabanovin" <?php selected($sms_service, 'sabanovin'); ?>>Sabanovin</option>
                        <option value="niksms" <?php selected($sms_service, 'niksms'); ?>>Niksms</option>
                        <option value="isms" <?php selected($sms_service, 'isms'); ?>>Isms</option>
                        <option value="asanak" <?php selected($sms_service, 'asanak'); ?>>Asanak</option>
                        <option value="rangine" data-pattern="1" <?php selected($sms_service, 'rangine'); ?>>Rangine
                        </option>
                        <option value="raygansms" <?php selected($sms_service, 'raygansms'); ?>>Raygansms</option>
                        <option value="fanap" <?php selected($sms_service, 'fanap'); ?>>Fanap</option>
                        <option value="tabansms" data-pattern="1" <?php selected($sms_service, 'tabansms'); ?>>
                            Tabansms
                        </option>
                        <option value="vansi" <?php selected($sms_service, 'vansi'); ?>>Vansi</option>
                        <option value="payamito" data-pattern="1"  <?php selected($sms_service, 'payamito'); ?>>Payamito</option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-sms-username"><?php _e('SMS username', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-sms-username" name="sms-username" value="<?php echo esc_attr($options->get_option('sms-username')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-sms-password"><?php _e('SMS password', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-sms-password" name="sms-password" value="<?php echo esc_attr($options->get_option('sms-password')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-sms-from"><?php _e('SMS from', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-sms-from" name="sms-from" value="<?php echo esc_attr($options->get_option('sms-from')); ?>">
            </div>
            <div class="uk-margin wip-pattern-wrapper">
                <label class="uk-form-label" for="wip-sms-pattern-code"><?php _e('Pattern code', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-sms-pattern-code" name="sms-pattern-code" value="<?php echo esc_attr($options->get_option('sms-pattern-code')); ?>">
            </div>
            <div class="uk-margin wip-pattern-wrapper">
                <label class="uk-form-label" for="wip-sms-pattern"><?php _e('Pattern', 'wip'); ?></label>
                <div class="wip-description">
                    <span uk-icon="info"></span>
                    <?php _e('Put the code you used in the pattern into a separate line.', 'wip'); ?>
                </div>
                <textarea class="uk-textarea" id="wip-sms-pattern" name="sms-pattern" rows="6"><?php echo esc_textarea($options->get_option('sms-pattern')); ?></textarea>
                <table class="wip-code-table">
                    <tbody>
                    <tr>
                        <td><?php _e('Order ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">order_id</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Order status', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">order_status</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Address', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">address</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Full name', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">full_name</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Postcode', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">postcode</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Phone', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">phone</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Email', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">email</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Order date', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">order_date</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Payment method', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">payment_method</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Transaction ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">transaction_id</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('National ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">national_id</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Shipping method', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">shipping_method</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Total amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">total_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Discount amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">discount_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Tax amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">tax_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Shipping amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">shipping_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Final amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">final_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Refunded amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">refunded_amount</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Total items', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">total_items</code></td>
                    </tr>
                    </tbody>
                </table>
                <table class="wip-code-table wip-kavenegar">
                    <tbody>
                    <tr>
                        <td><?php _e('Order ID', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">token</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Full name', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">token10</code></td>
                    </tr>
                    <tr>
                        <td><?php _e('Final amount', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">token20</code></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-recipients-phone"><?php _e('Recipients phone', 'wip'); ?></label>
                <div class="wip-description">
                    <span uk-icon="info"></span>
                    <?php _e('Enter each phone in a separate line.', 'wip'); ?>
                </div>
                <textarea class="uk-textarea" id="wip-recipients-phone" name="recipients-phone" rows="4"><?php echo esc_textarea($options->get_option('recipients-phone')); ?></textarea>
            </div>
            <div class="uk-margin wip-message-wrapper">
                <label class="uk-form-label" for="wip-sms-text"><?php _e('SMS text', 'wip'); ?></label>
                <textarea class="uk-textarea" id="wip-sms-text" name="sms-text" rows="8"><?php echo esc_textarea($options->get_option('sms-text')); ?></textarea>
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
            <div class="uk-margin" style="display: none;">
                <button class="uk-button uk-button-secondary" uk-toggle="target: #wip-send-sms-modal" type="button"><?php _e('Send SMS test', 'wip'); ?></button>
                <div id="wip-send-sms-modal" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title"><?php _e('Send SMS test', 'wip'); ?></h2>
                        <div class="uk-margin-small">
                            <input type="text" class="uk-input" id="wip-order-id" placeholder="<?php _e('Order ID', 'wip'); ?>">
                        </div>
                        <div class="uk-margin-small">
                            <div class="uk-alert-primary" uk-alert style="display: none;text-align: left;direction: initial;"></div>
                            <a href="#" class="uk-button uk-button-secondary" id="wip-send-test-sms">
                                <?php _e('Send', 'wip'); ?>
                                <img class="loader" src="<?php echo WIP_IMG_URL; ?>oval.svg" width="26" height="26" alt="loader">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <?php foreach (wc_get_order_statuses() as $status_key => $title): ?>
                <?php $status = str_replace('wc-', '', $status_key); ?>
                <div class="uk-margin">
                    <div class="uk-margin-small">
                        <label class="uk-form-label">
                            <input class="uk-checkbox" type="checkbox" name="send-order-<?php echo esc_attr($status); ?>-sms" value="1" <?php checked($options->get_option('send-order-' . $status . '-sms'), 1); ?>>
                            <?php echo esc_html($title); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small wip-pattern-wrapper">
                        <input type="text" class="uk-input" name="sms-pattern-code-<?php echo esc_attr($status); ?>" value="<?php echo esc_attr($options->get_option('sms-pattern-code-' . $status)); ?>" placeholder="<?php _e('Pattern code', 'wip'); ?>">
                    </div>
                    <div class="uk-margin-small wip-pattern-wrapper">
                        <textarea class="uk-textarea" name="sms-pattern-<?php echo esc_attr($status); ?>" rows="6" placeholder="<?php _e('Pattern', 'wip'); ?>"><?php echo esc_textarea($options->get_option('sms-pattern-' . $status)); ?></textarea>
                    </div>
                    <div class="uk-margin-small wip-message-wrapper">
                        <textarea class="uk-textarea" name="sms-text-<?php echo esc_attr($status); ?>" rows="8" placeholder="<?php _e('SMS text', 'wip'); ?>"><?php echo esc_textarea($options->get_option('sms-text-' . $status)); ?></textarea>
                    </div>
                </div>
            <?php endforeach; ?>
        </li>
    </ul>
</div>