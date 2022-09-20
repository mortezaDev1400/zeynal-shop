<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$template = $options->get_option('invoice-template');
$color = $options->get_option('invoice-color');
$font_family = $options->get_option('invoice-font-family');
$id_type = $options->get_option('id-type');
$currency = $options->get_option('currency');
$product_price = $options->get_option('product-price');
$product_meta = $options->get_option('product-meta');
$shop_signature = $options->get_option('shop-signature');
$watermark = $options->get_option('watermark');
$watermark_pending = $options->get_option('watermark-pending');
$watermark_processing = $options->get_option('watermark-processing');
$watermark_on_hold = $options->get_option('watermark-on-hold');
$watermark_completed = $options->get_option('watermark-completed');
$watermark_cancelled = $options->get_option('watermark-cancelled');
$watermark_refunded = $options->get_option('watermark-refunded');
$watermark_failed = $options->get_option('watermark-failed');
?>
<div class="wip-options-area wip-option-invoice">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="file-text"></span></span>
        <strong><?php _e('Invoice', 'wip'); ?></strong>
    </h2>
    <ul uk-tab>
        <li class="uk-active"><a href="#"><?php _e('Styles', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Settings', 'wip'); ?></a></li>
    </ul>
    <ul class="uk-switcher uk-margin">
        <li>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-invoice-template"><?php _e('Template', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-invoice-template" name="invoice-template">
                        <option value="template-1" <?php selected($template, 'template-1'); ?>><?php _e('Template 1', 'wip'); ?></option>
                        <option value="template-2" <?php selected($template, 'template-2'); ?>><?php _e('Template 2', 'wip'); ?></option>
                        <option value="template-3" <?php selected($template, 'template-3'); ?>><?php _e('Template 3', 'wip'); ?></option>
                        <option value="template-4" <?php selected($template, 'template-4'); ?>><?php _e('Template 4', 'wip'); ?></option>
                        <option value="template-5" <?php selected($template, 'template-5'); ?>><?php _e('Template 5', 'wip'); ?></option>
                        <option value="template-6" <?php selected($template, 'template-6'); ?>><?php _e('Template 6 (POS device)', 'wip'); ?></option>
                        <option value="template-7" <?php selected($template, 'template-7'); ?>><?php _e('Template 7', 'wip'); ?></option>
                        <option value="template-8" <?php selected($template, 'template-8'); ?>><?php _e('Template 8', 'wip'); ?></option>
                        <option value="template-9" <?php selected($template, 'template-9'); ?>><?php _e('Template 9', 'wip'); ?></option>
                        <option value="template-10" <?php selected($template, 'template-10'); ?>><?php _e('Template 10 (Tapin)', 'wip'); ?></option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-invoice-color"><?php _e('Template color', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-invoice-color" name="invoice-color">
                        <option value=""><?php _e('Gray', 'wip'); ?></option>
                        <option value="27ae60" <?php selected($color, '27ae60'); ?>><?php _e('Green 1', 'wip'); ?></option>
                        <option value="16a085" <?php selected($color, '16a085'); ?>><?php _e('Green 2', 'wip'); ?></option>
                        <option value="00cec9" <?php selected($color, '00cec9'); ?>><?php _e('Seafoam blue', 'wip'); ?></option>
                        <option value="2980b9" <?php selected($color, '2980b9'); ?>><?php _e('Blue', 'wip'); ?></option>
                        <option value="e74c3c" <?php selected($color, 'e74c3c'); ?>><?php _e('Red', 'wip'); ?></option>
                        <option value="ffa502" <?php selected($color, 'ffa502'); ?>><?php _e('Orange', 'wip'); ?></option>
                        <option value="fff200" <?php selected($color, 'fff200'); ?>><?php _e('Yellow', 'wip'); ?></option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-invoice-font-family"><?php _e('Font family', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-invoice-font-family" name="invoice-font-family">
                        <option value="IRANSans" <?php selected($font_family, 'IRANSans'); ?>>IRANSans</option>
                        <option value="iranyekan" <?php selected($font_family, 'iranyekan'); ?>>IRANYekan</option>
                        <option value="Parastoo" <?php selected($font_family, 'Parastoo'); ?>>Parastoo</option>
                        <option value="Sahel" <?php selected($font_family, 'Sahel'); ?>>Sahel</option>
                        <option value="Samim" <?php selected($font_family, 'Samim'); ?>>Samim</option>
                        <option value="Shabnam" <?php selected($font_family, 'Shabnam'); ?>>Shabnam</option>
                        <option value="Tanha" <?php selected($font_family, 'Tanha'); ?>>Tanha</option>
                        <option value="Yekan" <?php selected($font_family, 'Yekan'); ?>>Yekan</option>
                        <option value="Koodakbold" <?php selected($font_family, 'Koodakbold'); ?>>Koodakbold</option>
                        <option value="Homa" <?php selected($font_family, 'Homa'); ?>>Homa</option>
                        <option value="Mitra" <?php selected($font_family, 'Mitra'); ?>>Mitra</option>
                        <option value="BNazanin" <?php selected($font_family, 'BNazanin'); ?>>BNazanin</option>
                        <option value="Bardiya" <?php selected($font_family, 'Bardiya'); ?>>Bardiya</option>
                        <option value="Ferdosi" <?php selected($font_family, 'Ferdosi'); ?>>Ferdosi</option>
                        <option value="Traffic" <?php selected($font_family, 'Traffic'); ?>>Traffic</option>
                        <option value="Yas" <?php selected($font_family, 'Yas'); ?>>Yas</option>
                        <option value="Morvarid" <?php selected($font_family, 'Morvarid'); ?>>Morvarid</option>
                        <option value="Ubuntu" <?php selected($font_family, 'Ubuntu'); ?>>Ubuntu</option>
                        <option value="Libre Franklin" <?php selected($font_family, 'Libre+Franklin'); ?>>Libre
                            Franklin
                        </option>
                        <option value="Questrial" <?php selected($font_family, 'Questrial'); ?>>Questrial</option>
                        <option value="Comfortaa" <?php selected($font_family, 'Comfortaa'); ?>>Comfortaa</option>
                        <option value="Courgette" <?php selected($font_family, 'Courgette'); ?>>Courgette</option>
                        <option value="Lalezar" <?php selected($font_family, 'Lalezar'); ?>>Lalezar</option>
                        <option value="Markazi Text" <?php selected($font_family, 'Markazi+Text'); ?>>Markazi Text
                        </option>
                        <option value="Almarai" <?php selected($font_family, 'Almarai'); ?>>Almarai</option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-invoice-font-size"><?php _e('Font size', 'wip'); ?></label>
                <input type="number" class="uk-input" id="wip-invoice-font-size" name="invoice-font-size" step="1" value="<?php echo esc_attr($options->get_option('invoice-font-size')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-invoice-margin"><?php _e('Margin', 'wip'); ?></label>
                <input type="number" class="uk-input" id="wip-invoice-margin" name="invoice-margin" step="1" value="<?php echo esc_attr($options->get_option('invoice-margin')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-custom-css"><?php _e('Custom css', 'wip'); ?></label>
                <textarea class="uk-textarea uk-text-left" id="wip-custom-css" name="custom-css" rows="10"><?php echo esc_textarea($options->get_option('custom-css')); ?></textarea>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Condensed state', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="condensed" value="1" <?php echo checked($options->get_option('condensed'), 1); ?>>
                        <?php _e('If you are using the A5 paper, you can enable this option.', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Invoice border', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="invoice-border" value="1" <?php echo checked($options->get_option('invoice-border'), 1); ?>>
                        <?php _e('Show', 'wip'); ?>
                    </label>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-currency"><?php _e('Currency', 'wip'); ?></label>
                <div uk-form-custom="target: > * > span:first-child">
                    <select id="wip-currency" name="currency">
                        <option value=""><?php _e('Please select an item.', 'wip'); ?></option>
                        <option value="IRR" <?php selected($currency, 'IRR'); ?>><?php _e('Rial', 'wip'); ?></option>
                        <option value="IRT" <?php selected($currency, 'IRT'); ?>><?php _e('Toman', 'wip'); ?></option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Product ID', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-radio" type="radio" name="id-type" value="id" <?php checked($id_type, 'id'); ?>>
                        <?php _e('Global ID', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-radio" type="radio" name="id-type" value="sku" <?php checked($id_type, 'sku'); ?>>
                        <?php _e('Product SKU', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Product title', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="wip-confirm uk-checkbox" type="checkbox" name="optimize-product" data-toggle="optimize-product" value="1" <?php echo checked($options->get_option('optimize-product'), 1); ?>>
                        <?php _e('Optimize product name', 'wip'); ?>
                    </label>
                    <div class="wip-confirm-activation" id="wip-optimize-product">
                        <span uk-icon="warning"></span>
                        <?php _e('Enable this option if you have trouble displaying your variable product name.', 'wip'); ?>
                    </div>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="show-attributes" value="1" <?php echo checked($options->get_option('show-attributes'), 1); ?>>
                        <?php _e('Attributes', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="show-pre-invoice-variation" value="1" <?php echo checked($options->get_option('show-pre-invoice-variation'), 1); ?>>
                        <?php _e('Variation in pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="show-line-items" value="1" <?php echo checked($options->get_option('show-line-items'), 1); ?>>
                        <?php _e('Line items', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="text" class="uk-input" id="wip-prefix" name="hidden-line-items" value="<?php echo esc_attr($options->get_option('hidden-line-items')); ?>" placeholder="<?php _e('Hidden line items', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Refunded products', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="refunded-product" value="1" <?php echo checked($options->get_option('refunded-product'), 1); ?>>
                        <?php _e('If you have returned a product from the order, the number and amount for each product will be shown separately on the invoice.', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Product price', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-radio" type="radio" name="product-price" value="order" <?php echo checked($product_price, 'order'); ?>>
                        <?php _e('Order', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-radio" type="radio" name="product-price" value="product" <?php echo checked($product_price, 'product'); ?>>
                        <?php _e('Product', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-radio" type="radio" name="product-price" value="cart" <?php echo checked($product_price, 'cart'); ?>>
                        <?php _e('Cart', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Extra columns', 'wip'); ?></label>
                <div class="wip-description">
                    <span uk-icon="info"></span>
                    <?php _e('Enter the label and product meta key or order meta key in this format to display at products table:', 'wip'); ?>
                    <code>label@post_meta_key</code>
                </div>
                <div class="wip-meta-wrapper">
                    <?php
                    if ($product_meta && is_array($product_meta)) {
                        foreach ($product_meta as $meta) {
                            ?>
                            <div class="uk-margin-small">
                                <input type="text" class="uk-input" name="product-meta[]" value="<?php echo esc_attr($meta); ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <a href="#" class="wip-add-meta uk-button uk-button-default" data-toggle="product">
                    <span uk-icon="plus"></span>
                    <?php _e('Add new', 'wip'); ?>
                </a>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-prefix"><?php _e('Order ID prefix', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-prefix" name="prefix" value="<?php echo esc_attr($options->get_option('prefix')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-suffix"><?php _e('Order ID suffix', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-suffix" name="suffix" value="<?php echo esc_attr($options->get_option('suffix')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-start-num"><?php _e('Order ID start number', 'wip'); ?></label>
                <input type="number" class="uk-input" id="wip-start-num" name="start-num" step="1" value="<?php echo esc_attr($options->get_option('start-num')); ?>">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-dynamic-id"><?php _e('Dynamic order ID', 'wip'); ?></label>
                <input type="text" class="uk-input" id="wip-dynamic-id" name="dynamic-id" step="1" value="<?php echo esc_attr($options->get_option('dynamic-id')); ?>">
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
                        <td><?php _e('Order timestamp', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{order-timestamp}}</code>
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
                        <td><?php _e('Total items', 'wip'); ?></td>
                        <td><code uk-tooltip="title: <?php _e('Click to copy', 'wip'); ?>">{{total-items}}</code></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total to word', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="to-word" value="1" <?php echo checked($options->get_option('to-word'), 1); ?>>
                        <?php _e('Active', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-order-note"><?php _e('Order note', 'wip'); ?></label>
                <textarea class="uk-textarea" id="wip-order-note" name="order-note" rows="5"><?php echo esc_textarea($options->get_option('order-note')); ?></textarea>
            </div>
            <div class="uk-margin">
                <div class="uk-margin">
                    <label class="uk-form-label" for="wip-shop-signature"><?php _e('Shop stamp and signature', 'wip'); ?></label>
                    <div class="wip-upload-file-wrapper">
                        <img src="<?php echo intval($shop_signature) ? wp_get_attachment_url($shop_signature) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                        <input type="hidden" name="shop-signature" value="<?php echo esc_attr($shop_signature); ?>">
                        <br>
                        <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                        <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
                    </div>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-margin">
                    <label class="uk-form-label" for="wip-watermark"><?php _e('Watermark', 'wip'); ?></label>
                    <div class="wip-upload-file-wrapper">
                        <img src="<?php echo intval($watermark) ? wp_get_attachment_url($watermark) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                        <input type="hidden" name="watermark" value="<?php echo esc_attr($watermark); ?>">
                        <br>
                        <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                        <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
                        <p><?php _e('Global', 'wip'); ?></p>
                    </div>
                    <?php foreach (wc_get_order_statuses() as $key => $name): ?>
                        <?php
                        $key = str_replace('wc-', '', $key);
                        $watermark = $options->get_option('watermark-' . $key);
                        ?>
                        <div class="wip-upload-file-wrapper">
                            <img src="<?php echo intval($watermark) ? wp_get_attachment_url($watermark) : WIP_IMG_URL . 'dot.png'; ?>" class="wip-image" alt="image">
                            <input type="hidden" name="watermark-<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($watermark); ?>">
                            <br>
                            <button class="uk-button uk-button-primary wip-upload-file"><?php _e('Select image', 'wip'); ?></button>
                            <button class="uk-button uk-button-default wip-remove" data-default="<?php echo WIP_IMG_URL . 'dot.png'; ?>"><?php _e('Remove image', 'wip'); ?></button>
                            <p><?php esc_html_e($name); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="wip-watermark-opacity"><?php _e('Watermark opacity', 'wip'); ?></label>
                <input type="number" class="uk-input" id="wip-watermark-opacity" name="watermark-opacity" step="0.01" min="0" max="1" value="<?php echo esc_attr($options->get_option('watermark-opacity')); ?>">
            </div>
        </li>
    </ul>
</div>