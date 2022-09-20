<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$template = $options->get_option('pre-invoice-template');
$color = $options->get_option('pre-invoice-color');
$font_family = $options->get_option('pre-invoice-font-family');
$font_size = $options->get_option('pre-invoice-font-size');
$margin = $options->get_option('pre-invoice-margin');
?>
<div class="wip-options-area wip-option-pre-invoice">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="print"></span></span>
        <strong><?php _e('Pre invoice', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label">
            <?php _e('Pre invoice', 'wip'); ?>
            <?php echo '<a href="' . get_permalink($options->get_option('pre-invoice-page')) . '" class="wip-view-page uk-text-primary" target="_blank"> (' . __('View page', 'wip') . ')</a>'; ?>
        </label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="pre-invoice" value="1" <?php echo checked($options->get_option('pre-invoice'), 1); ?>>
                <?php _e('Enabling this option activates the invoice button on the cart.', 'wip'); ?>
            </label>
        </div>
        <div uk-form-custom="target: > * > span:first-child">
            <?php
            wp_dropdown_pages([
                'post_type' => 'page',
                'selected' => $options->get_option('pre-invoice-page'),
                'name' => 'pre-invoice-page',
                'show_option_none' => __('Please select pre invoice page.', 'wip'),
                'echo' => 1,
            ]);
            ?>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
        <div class="wip-description">
            <span uk-icon="info"></span>
            <?php _e('Select page template:', 'wip'); ?>
            <code><?php _e('Pre invoice', 'wip'); ?></code>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label"><?php _e('Shipping total', 'wip'); ?></label>
        <div class="uk-margin-small">
            <label>
                <input class="uk-checkbox" type="checkbox" name="hide-free-shipping-total" value="1" <?php echo checked($options->get_option('hide-free-shipping-total'), 1); ?>>
                <?php _e('Hide free shipping total', 'wip'); ?>
            </label>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-pre-invoice-template"><?php _e('Template', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-invoice-template" name="pre-invoice-template">
                <option value="template-1" <?php selected($template, 'template-1'); ?>><?php _e('Template 1', 'wip'); ?></option>
            </select>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-pre-invoice-color"><?php _e('Template color', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-pre-invoice-color" name="pre-invoice-color">
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
        <label class="uk-form-label" for="wip-pre-invoice-font-family"><?php _e('Font family', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-pre-invoice-font-family" name="pre-invoice-font-family">
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
                <option value="Libre Franklin" <?php selected($font_family, 'Libre+Franklin'); ?>>Libre Franklin
                </option>
                <option value="Questrial" <?php selected($font_family, 'Questrial'); ?>>Questrial</option>
                <option value="Comfortaa" <?php selected($font_family, 'Comfortaa'); ?>>Comfortaa</option>
                <option value="Courgette" <?php selected($font_family, 'Courgette'); ?>>Courgette</option>
                <option value="Lalezar" <?php selected($font_family, 'Lalezar'); ?>>Lalezar</option>
                <option value="Markazi Text" <?php selected($font_family, 'Markazi+Text'); ?>>Markazi Text</option>
                <option value="Almarai" <?php selected($font_family, 'Almarai'); ?>>Almarai</option>
            </select>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-pre-invoice-font-size"><?php _e('Font size', 'wip'); ?></label>
        <input type="number" class="uk-input" id="wip-pre-invoice-font-size" name="pre-invoice-font-size" step="1" value="<?php echo esc_attr($font_size); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-pre-invoice-margin"><?php _e('Margin', 'wip'); ?></label>
        <input type="number" class="uk-input" id="wip-pre-invoice-margin" name="pre-invoice-margin" step="1" value="<?php echo esc_attr($margin); ?>">
    </div>
</div>