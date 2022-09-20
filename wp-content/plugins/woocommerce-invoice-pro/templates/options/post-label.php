<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$template = $options->get_option('post-label-template');
$order_template = $options->get_option('order-label-template');
$product_template = $options->get_option('product-label-template');
$color = $options->get_option('post-label-color');
$font_family = $options->get_option('post-label-font-family');
$font_size = $options->get_option('post-label-font-size');
$margin = $options->get_option('post-label-margin');
?>
<div class="wip-options-area wip-option-post-label">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="credit-card"></span></span>
        <strong><?php _e('Post label', 'wip'); ?></strong>
    </h2>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-post-label-template"><?php _e('Template', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-post-label-template" name="post-label-template">
                <option value="template-1" <?php selected($template, 'template-1'); ?>><?php _e('Template 1', 'wip'); ?></option>
                <option value="template-2" <?php selected($template, 'template-2'); ?>><?php _e('Template 2', 'wip'); ?></option>
                <option value="template-3" <?php selected($template, 'template-3'); ?>><?php _e('Template 3', 'wip'); ?></option>
            </select>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-order-label-template"><?php _e('Order label template', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-order-label-template" name="order-label-template">
                <option value="template-1" <?php selected($order_template, 'template-1'); ?>><?php _e('Template 1', 'wip'); ?></option>
                <option value="template-2" <?php selected($order_template, 'template-2'); ?>><?php _e('Template 2', 'wip'); ?></option>
            </select>
            <button class="uk-button uk-button-default" type="button" tabindex="-1">
                <span></span>
                <span uk-icon="icon: chevron-down"></span>
            </button>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-post-label-font-family"><?php _e('Font family', 'wip'); ?></label>
        <div uk-form-custom="target: > * > span:first-child">
            <select id="wip-post-label-font-family" name="post-label-font-family">
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
        <label class="uk-form-label" for="wip-post-label-font-size"><?php _e('Font size', 'wip'); ?></label>
        <input type="number" class="uk-input" id="wip-post-label-font-size" name="post-label-font-size" step="1" value="<?php echo esc_attr($font_size); ?>">
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="wip-post-label-margin"><?php _e('Margin', 'wip'); ?></label>
        <input type="number" class="uk-input" id="wip-post-label-margin" name="post-label-margin" step="1" value="<?php echo esc_attr($margin); ?>">
    </div>
</div>