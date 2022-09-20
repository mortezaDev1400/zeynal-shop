<?php
defined('ABSPATH') || exit(__('No Access!', 'wip'));

$components = $options->get_option('components');
$components = $components ? $components : [];
?>
<div class="wip-options-area wip-option-components">
    <h2 class="wip-options-title">
        <span class="wip-title-icon"><span uk-icon="thumbnails"></span></span>
        <strong><?php _e('Components', 'wip'); ?></strong>
    </h2>
    <ul uk-tab>
        <li class="uk-active"><a href="#"><?php _e('Shop', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Customer', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Products table', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Total table', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Product label', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Orders list', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Tapin', 'wip'); ?></a></li>
        <li><a href="#"><?php _e('Others', 'wip'); ?></a></li>
    </ul>
    <ul class="uk-switcher uk-margin">
        <li>
            <div class="wip-description">
                <span uk-icon="info"></span>
                <?php _e('In this section you can select the components that are visible on the invoice, packing slip and post label.', 'wip'); ?>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop logo', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-logo][invoice]" value="1" <?php echo isset($components['shop-logo']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-logo][packing-slip]" value="1" <?php echo isset($components['shop-logo']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-logo][post-label]" value="1" <?php echo isset($components['shop-logo']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-logo][pre-invoice]" value="1" <?php echo isset($components['shop-logo']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop title', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][invoice]" value="1" <?php echo isset($components['shop-title']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][packing-slip]" value="1" <?php echo isset($components['shop-title']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][post-label]" value="1" <?php echo isset($components['shop-title']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][order-label]" value="1" <?php echo isset($components['shop-title']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][shop-mini-label]" value="1" <?php echo isset($components['shop-title']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-title][pre-invoice]" value="1" <?php echo isset($components['shop-title']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop economical number', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][invoice]" value="1" <?php echo isset($components['shop-economical-num']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][packing-slip]" value="1" <?php echo isset($components['shop-economical-num']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][post-label]" value="1" <?php echo isset($components['shop-economical-num']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][order-label]" value="1" <?php echo isset($components['shop-economical-num']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][shop-mini-label]" value="1" <?php echo isset($components['shop-economical-num']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[shop-economical-num][pre-invoice]" value="1" <?php echo isset($components['shop-economical-num']['pre-invoice']) ? 'checked' : null; ?>>
                            <?php _e('Pre invoice', 'wip'); ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop registration/National number', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][invoice]" value="1" <?php echo isset($components['shop-reg-num']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][packing-slip]" value="1" <?php echo isset($components['shop-reg-num']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][post-label]" value="1" <?php echo isset($components['shop-reg-num']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][order-label]" value="1" <?php echo isset($components['shop-reg-num']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][shop-mini-label]" value="1" <?php echo isset($components['shop-reg-num']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-reg-num][pre-invoice]" value="1" <?php echo isset($components['shop-reg-num']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop website', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][invoice]" value="1" <?php echo isset($components['shop-url']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][packing-slip]" value="1" <?php echo isset($components['shop-url']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][post-label]" value="1" <?php echo isset($components['shop-url']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][order-label]" value="1" <?php echo isset($components['shop-url']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][shop-mini-label]" value="1" <?php echo isset($components['shop-url']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-url][pre-invoice]" value="1" <?php echo isset($components['shop-url']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop postcode', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][invoice]" value="1" <?php echo isset($components['shop-postcode']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][packing-slip]" value="1" <?php echo isset($components['shop-postcode']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][post-label]" value="1" <?php echo isset($components['shop-postcode']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][order-label]" value="1" <?php echo isset($components['shop-postcode']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][shop-mini-label]" value="1" <?php echo isset($components['shop-postcode']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-postcode][pre-invoice]" value="1" <?php echo isset($components['shop-postcode']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop email', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][invoice]" value="1" <?php echo isset($components['shop-email']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][packing-slip]" value="1" <?php echo isset($components['shop-email']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][post-label]" value="1" <?php echo isset($components['shop-email']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][order-label]" value="1" <?php echo isset($components['shop-email']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][shop-mini-label]" value="1" <?php echo isset($components['shop-email']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-email][pre-invoice]" value="1" <?php echo isset($components['shop-email']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop phone', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][invoice]" value="1" <?php echo isset($components['shop-phone']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][packing-slip]" value="1" <?php echo isset($components['shop-phone']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][post-label]" value="1" <?php echo isset($components['shop-phone']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][order-label]" value="1" <?php echo isset($components['shop-phone']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][shop-mini-label]" value="1" <?php echo isset($components['shop-phone']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-phone][pre-invoice]" value="1" <?php echo isset($components['shop-phone']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop address', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][invoice]" value="1" <?php echo isset($components['shop-address']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][packing-slip]" value="1" <?php echo isset($components['shop-address']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][post-label]" value="1" <?php echo isset($components['shop-address']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][order-label]" value="1" <?php echo isset($components['shop-address']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][shop-mini-label]" value="1" <?php echo isset($components['shop-address']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[shop-address][pre-invoice]" value="1" <?php echo isset($components['shop-address']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Print date', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][invoice]" value="1" <?php echo isset($components['print-date']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][packing-slip]" value="1" <?php echo isset($components['print-date']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][post-label]" value="1" <?php echo isset($components['print-date']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][order-label]" value="1" <?php echo isset($components['print-date']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][shop-mini-label]" value="1" <?php echo isset($components['print-date']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[print-date][pre-invoice]" value="1" <?php echo isset($components['print-date']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Transmission date', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[transmission-date][invoice]" value="1" <?php echo isset($components['transmission-date']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[transmission-date][packing-slip]" value="1" <?php echo isset($components['transmission-date']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[transmission-date][post-label]" value="1" <?php echo isset($components['transmission-date']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[transmission-date][order-label]" value="1" <?php echo isset($components['transmission-date']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[transmission-date][shop-mini-label]" value="1" <?php echo isset($components['transmission-date']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Order ID', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-id][invoice]" value="1" <?php echo isset($components['order-id']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-id][packing-slip]" value="1" <?php echo isset($components['order-id']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-id][post-label]" value="1" <?php echo isset($components['order-id']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-id][order-label]" value="1" <?php echo isset($components['order-id']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-id][shop-mini-label]" value="1" <?php echo isset($components['order-id']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Order Status', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-status][invoice]" value="1" <?php echo isset($components['order-status']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-status][packing-slip]" value="1" <?php echo isset($components['order-status']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-status][post-label]" value="1" <?php echo isset($components['order-status']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-status][order-label]" value="1" <?php echo isset($components['order-status']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-status][shop-mini-label]" value="1" <?php echo isset($components['order-status']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Barcode', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[barcode][invoice]" value="1" <?php echo isset($components['barcode']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[barcode][packing-slip]" value="1" <?php echo isset($components['barcode']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[barcode][post-label]" value="1" <?php echo isset($components['barcode']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[barcode][order-label]" value="1" <?php echo isset($components['barcode']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[barcode][shop-mini-label]" value="1" <?php echo isset($components['barcode']['shop-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Address', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][invoice]" value="1" <?php echo isset($components['customer-addr']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][packing-slip]" value="1" <?php echo isset($components['customer-addr']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][post-label]" value="1" <?php echo isset($components['customer-addr']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][order-label]" value="1" <?php echo isset($components['customer-addr']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][customer-mini-label]" value="1" <?php echo isset($components['customer-addr']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-addr][pre-invoice]" value="1" <?php echo isset($components['customer-addr']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Full name', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][invoice]" value="1" <?php echo isset($components['customer-full-name']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][packing-slip]" value="1" <?php echo isset($components['customer-full-name']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][post-label]" value="1" <?php echo isset($components['customer-full-name']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][order-label]" value="1" <?php echo isset($components['customer-full-name']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][customer-mini-label]" value="1" <?php echo isset($components['customer-full-name']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-full-name][pre-invoice]" value="1" <?php echo isset($components['customer-full-name']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Postcode', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][invoice]" value="1" <?php echo isset($components['customer-postcode']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][packing-slip]" value="1" <?php echo isset($components['customer-postcode']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][post-label]" value="1" <?php echo isset($components['customer-postcode']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][order-label]" value="1" <?php echo isset($components['customer-postcode']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][customer-mini-label]" value="1" <?php echo isset($components['customer-postcode']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-postcode][pre-invoice]" value="1" <?php echo isset($components['customer-postcode']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Phone', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][invoice]" value="1" <?php echo isset($components['customer-phone']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][packing-slip]" value="1" <?php echo isset($components['customer-phone']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][post-label]" value="1" <?php echo isset($components['customer-phone']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][order-label]" value="1" <?php echo isset($components['customer-phone']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][customer-mini-label]" value="1" <?php echo isset($components['customer-phone']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-phone][pre-invoice]" value="1" <?php echo isset($components['customer-phone']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Email', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][invoice]" value="1" <?php echo isset($components['customer-email']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][packing-slip]" value="1" <?php echo isset($components['customer-email']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][post-label]" value="1" <?php echo isset($components['customer-email']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][order-label]" value="1" <?php echo isset($components['customer-email']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][customer-mini-label]" value="1" <?php echo isset($components['customer-email']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-email][pre-invoice]" value="1" <?php echo isset($components['customer-email']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Order date', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-date][invoice]" value="1" <?php echo isset($components['customer-order-date']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-date][packing-slip]" value="1" <?php echo isset($components['customer-order-date']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-date][post-label]" value="1" <?php echo isset($components['customer-order-date']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-date][order-label]" value="1" <?php echo isset($components['customer-order-date']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-date][customer-mini-label]" value="1" <?php echo isset($components['customer-order-date']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Payment method', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-payment-method][invoice]" value="1" <?php echo isset($components['customer-payment-method']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-payment-method][packing-slip]" value="1" <?php echo isset($components['customer-payment-method']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-payment-method][post-label]" value="1" <?php echo isset($components['customer-payment-method']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-payment-method][order-label]" value="1" <?php echo isset($components['customer-payment-method']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-payment-method][customer-mini-label]" value="1" <?php echo isset($components['customer-payment-method']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Transaction ID', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-transaction-id][invoice]" value="1" <?php echo isset($components['customer-transaction-id']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-transaction-id][packing-slip]" value="1" <?php echo isset($components['customer-transaction-id']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-transaction-id][post-label]" value="1" <?php echo isset($components['customer-transaction-id']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-transaction-id][order-label]" value="1" <?php echo isset($components['customer-transaction-id']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-transaction-id][customer-mini-label]" value="1" <?php echo isset($components['customer-transaction-id']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('National ID', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-national-id][invoice]" value="1" <?php echo isset($components['customer-national-id']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-national-id][packing-slip]" value="1" <?php echo isset($components['customer-national-id']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-national-id][post-label]" value="1" <?php echo isset($components['customer-national-id']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-national-id][order-label]" value="1" <?php echo isset($components['customer-national-id']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-national-id][customer-mini-label]" value="1" <?php echo isset($components['customer-national-id']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shipping method', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-shipping-method][invoice]" value="1" <?php echo isset($components['customer-shipping-method']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-shipping-method][packing-slip]" value="1" <?php echo isset($components['customer-shipping-method']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-shipping-method][post-label]" value="1" <?php echo isset($components['customer-shipping-method']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-shipping-method][order-label]" value="1" <?php echo isset($components['customer-shipping-method']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-shipping-method][customer-mini-label]" value="1" <?php echo isset($components['customer-shipping-method']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('User meta', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][invoice]" value="1" <?php echo isset($components['customer-user-meta']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][packing-slip]" value="1" <?php echo isset($components['customer-user-meta']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][post-label]" value="1" <?php echo isset($components['customer-user-meta']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][order-label]" value="1" <?php echo isset($components['customer-user-meta']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][customer-mini-label]" value="1" <?php echo isset($components['customer-user-meta']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-user-meta][pre-invoice]" value="1" <?php echo isset($components['customer-user-meta']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Order meta', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-meta][invoice]" value="1" <?php echo isset($components['customer-order-meta']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-meta][packing-slip]" value="1" <?php echo isset($components['customer-order-meta']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-meta][post-label]" value="1" <?php echo isset($components['customer-order-meta']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-meta][order-label]" value="1" <?php echo isset($components['customer-order-meta']['order-label']) ? 'checked' : null; ?>>
                        <?php _e('Order label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-order-meta][customer-mini-label]" value="1" <?php echo isset($components['customer-order-meta']['customer-mini-label']) ? 'checked' : null; ?>>
                        <?php _e('Mini label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <?php if (is_plugin_active('woocommerce-delivery-time/woocommerce-delivery-time.php')): ?>
                <div class="uk-margin">
                    <label class="uk-form-label"><?php _e('Delivery date', 'wip'); ?></label>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-delivery-date][invoice]" value="1" <?php echo isset($components['customer-delivery-date']['invoice']) ? 'checked' : null; ?>>
                            <?php _e('Invoice', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-delivery-date][packing-slip]" value="1" <?php echo isset($components['customer-delivery-date']['packing-slip']) ? 'checked' : null; ?>>
                            <?php _e('Packing slip', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-delivery-date][post-label]" value="1" <?php echo isset($components['customer-delivery-date']['post-label']) ? 'checked' : null; ?>>
                            <?php _e('Post label', 'wip'); ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (is_plugin_active('novin-delivery-time/delivery-woocommerce.php')): ?>
                <div class="uk-margin">
                    <label class="uk-form-label"><?php _e('Delivery date (Mahan plugin)', 'wip'); ?></label>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-date][invoice]" value="1" <?php echo isset($components['customer-novin-delivery-date']['invoice']) ? 'checked' : null; ?>>
                            <?php _e('Invoice', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-date][packing-slip]" value="1" <?php echo isset($components['customer-novin-delivery-date']['packing-slip']) ? 'checked' : null; ?>>
                            <?php _e('Packing slip', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-date][post-label]" value="1" <?php echo isset($components['customer-novin-delivery-date']['post-label']) ? 'checked' : null; ?>>
                            <?php _e('Post label', 'wip'); ?>
                        </label>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label"><?php _e('Delivery notice (Mahan plugin)', 'wip'); ?></label>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-notice][invoice]" value="1" <?php echo isset($components['customer-novin-delivery-notice']['invoice']) ? 'checked' : null; ?>>
                            <?php _e('Invoice', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-notice][packing-slip]" value="1" <?php echo isset($components['customer-novin-delivery-notice']['packing-slip']) ? 'checked' : null; ?>>
                            <?php _e('Packing slip', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[customer-novin-delivery-notice][post-label]" value="1" <?php echo isset($components['customer-novin-delivery-notice']['post-label']) ? 'checked' : null; ?>>
                            <?php _e('Post label', 'wip'); ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
        </li>
        <li>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Table', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-table][invoice]" value="1" <?php echo isset($components['products-table']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-table][packing-slip]" value="1" <?php echo isset($components['products-table']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-table][post-label]" value="1" <?php echo isset($components['products-table']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-table][pre-invoice]" value="1" <?php echo isset($components['products-table']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-table][sms]" value="1" <?php echo isset($components['products-table']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Row', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-row][invoice]" value="1" <?php echo isset($components['products-row']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-row][packing-slip]" value="1" <?php echo isset($components['products-row']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-row][post-label]" value="1" <?php echo isset($components['products-row']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-row][pre-invoice]" value="1" <?php echo isset($components['products-row']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-row" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-row')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('ID', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-id][invoice]" value="1" <?php echo isset($components['products-id']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-id][packing-slip]" value="1" <?php echo isset($components['products-id']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-id][post-label]" value="1" <?php echo isset($components['products-id']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-id][pre-invoice]" value="1" <?php echo isset($components['products-id']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-id][sms]" value="1" <?php echo isset($components['products-id']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-id" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-id')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Barcode', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-barcode][invoice]" value="1" <?php echo isset($components['products-barcode']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-barcode][packing-slip]" value="1" <?php echo isset($components['products-barcode']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-barcode][pre-invoice]" value="1" <?php echo isset($components['products-barcode']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-barcode" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-barcode')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Image', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-image][invoice]" value="1" <?php echo isset($components['products-image']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-image][packing-slip]" value="1" <?php echo isset($components['products-image']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-image][pre-invoice]" value="1" <?php echo isset($components['products-image']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-image" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-image')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Product', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-product][invoice]" value="1" <?php echo isset($components['products-product']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-product][packing-slip]" value="1" <?php echo isset($components['products-product']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-product][post-label]" value="1" <?php echo isset($components['products-product']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-product][pre-invoice]" value="1" <?php echo isset($components['products-product']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-product][sms]" value="1" <?php echo isset($components['products-product']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-product" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-product')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Download link', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-link][invoice]" value="1" <?php echo isset($components['products-link']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-link][packing-slip]" value="1" <?php echo isset($components['products-link']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-link" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-link')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Seller', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-seller][invoice]" value="1" <?php echo isset($components['products-seller']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-seller][packing-slip]" value="1" <?php echo isset($components['products-seller']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-seller][post-label]" value="1" <?php echo isset($components['products-seller']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-seller][pre-invoice]" value="1" <?php echo isset($components['products-seller']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-seller][sms]" value="1" <?php echo isset($components['products-seller']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-seller" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-seller')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Weight', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-weight][invoice]" value="1" <?php echo isset($components['products-weight']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-weight][packing-slip]" value="1" <?php echo isset($components['products-weight']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-weight][post-label]" value="1" <?php echo isset($components['products-weight']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-weight][pre-invoice]" value="1" <?php echo isset($components['products-weight']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-weight][sms]" value="1" <?php echo isset($components['products-weight']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-weight" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-weight')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Dimension', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-dimension][invoice]" value="1" <?php echo isset($components['products-dimension']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-dimension][packing-slip]" value="1" <?php echo isset($components['products-dimension']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-dimension][post-label]" value="1" <?php echo isset($components['products-dimension']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-dimension][pre-invoice]" value="1" <?php echo isset($components['products-dimension']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-dimension][sms]" value="1" <?php echo isset($components['products-dimension']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-dimension" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-dimension')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Cabinet code', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-cabinet-code][invoice]" value="1" <?php echo isset($components['products-cabinet-code']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-cabinet-code][packing-slip]" value="1" <?php echo isset($components['products-cabinet-code']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-cabinet-code][pre-invoice]" value="1" <?php echo isset($components['products-cabinet-code']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-cabinet-code" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-cabinet-code')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Price', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-price][invoice]" value="1" <?php echo isset($components['products-price']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-price][packing-slip]" value="1" <?php echo isset($components['products-price']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-price][post-label]" value="1" <?php echo isset($components['products-price']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-price][pre-invoice]" value="1" <?php echo isset($components['products-price']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-price][sms]" value="1" <?php echo isset($components['products-price']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-price" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-price')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Discount amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-discount][invoice]" value="1" <?php echo isset($components['products-discount']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-discount][packing-slip]" value="1" <?php echo isset($components['products-discount']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-discount][post-label]" value="1" <?php echo isset($components['products-discount']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-discount][pre-invoice]" value="1" <?php echo isset($components['products-discount']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-discount][sms]" value="1" <?php echo isset($components['products-discount']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-discount" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-discount')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Tax amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-tax][invoice]" value="1" <?php echo isset($components['products-tax']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-tax][packing-slip]" value="1" <?php echo isset($components['products-tax']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-tax][post-label]" value="1" <?php echo isset($components['products-tax']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-tax][sms]" value="1" <?php echo isset($components['products-tax']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-tax" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-tax')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Quantity', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-quantity][invoice]" value="1" <?php echo isset($components['products-quantity']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-quantity][packing-slip]" value="1" <?php echo isset($components['products-quantity']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-quantity][post-label]" value="1" <?php echo isset($components['products-quantity']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-quantity][pre-invoice]" value="1" <?php echo isset($components['products-quantity']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-quantity][sms]" value="1" <?php echo isset($components['products-quantity']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-quantity" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-quantity')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total][invoice]" value="1" <?php echo isset($components['products-total']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total][packing-slip]" value="1" <?php echo isset($components['products-total']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total][post-label]" value="1" <?php echo isset($components['products-total']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total][pre-invoice]" value="1" <?php echo isset($components['products-total']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total][sms]" value="1" <?php echo isset($components['products-total']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-total" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-total')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total + Tax amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total&tax][invoice]" value="1" <?php echo isset($components['products-total&tax']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total&tax][packing-slip]" value="1" <?php echo isset($components['products-total&tax']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total&tax][post-label]" value="1" <?php echo isset($components['products-total&tax']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-total&tax][sms]" value="1" <?php echo isset($components['products-total&tax']['sms']) ? 'checked' : null; ?>>
                        <?php _e('SMS', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-total&tax" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-total&tax')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Purchase note', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-purchase-note][invoice]" value="1" <?php echo isset($components['products-purchase-note']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-purchase-note][packing-slip]" value="1" <?php echo isset($components['products-purchase-note']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-purchase-note][pre-invoice]" value="1" <?php echo isset($components['products-purchase-note']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-purchase-note" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-purchase-note')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Extra columns', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-extra-column][invoice]" value="1" <?php echo isset($components['products-extra-column']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-extra-column][packing-slip]" value="1" <?php echo isset($components['products-extra-column']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-extra-column][pre-invoice]" value="1" <?php echo isset($components['products-extra-column']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <input type="number" class="uk-input" name="ordering-products-extra-column" step="1" value="<?php echo esc_attr($options->get_option('ordering-products-extra-column')); ?>" placeholder="<?php _e('Ordering', 'wip'); ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Footer', 'wip'); ?></label>
                <div class="wip-description">
                    <span uk-icon="info"></span><?php _e('The order total will be displayed in the footer of the table.', 'wip'); ?>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-footer][invoice]" value="1" <?php echo isset($components['products-footer']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-footer][packing-slip]" value="1" <?php echo isset($components['products-footer']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[products-footer][pre-invoice]" value="1" <?php echo isset($components['products-footer']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Table', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-table][invoice]" value="1" <?php echo isset($components['total-table']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-table][packing-slip]" value="1" <?php echo isset($components['total-table']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-table][post-label]" value="1" <?php echo isset($components['total-table']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-table][pre-invoice]" value="1" <?php echo isset($components['total-table']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-total][invoice]" value="1" <?php echo isset($components['total-total']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-total][packing-slip]" value="1" <?php echo isset($components['total-total']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-total][post-label]" value="1" <?php echo isset($components['total-total']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-total][pre-invoice]" value="1" <?php echo isset($components['total-total']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Discount amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-discount][invoice]" value="1" <?php echo isset($components['total-discount']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-discount][packing-slip]" value="1" <?php echo isset($components['total-discount']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-discount][post-label]" value="1" <?php echo isset($components['total-discount']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-discount][pre-invoice]" value="1" <?php echo isset($components['total-discount']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total tax', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-tax][invoice]" value="1" <?php echo isset($components['total-tax']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-tax][packing-slip]" value="1" <?php echo isset($components['total-tax']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-tax][post-label]" value="1" <?php echo isset($components['total-tax']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-tax][pre-invoice]" value="1" <?php echo isset($components['total-tax']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shipping amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-shipping][invoice]" value="1" <?php echo isset($components['total-shipping']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-shipping][packing-slip]" value="1" <?php echo isset($components['total-shipping']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-shipping][post-label]" value="1" <?php echo isset($components['total-shipping']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-shipping][pre-invoice]" value="1" <?php echo isset($components['total-shipping']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Final amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-final][invoice]" value="1" <?php echo isset($components['total-final']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-final][packing-slip]" value="1" <?php echo isset($components['total-final']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-final][post-label]" value="1" <?php echo isset($components['total-final']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-final][pre-invoice]" value="1" <?php echo isset($components['total-final']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Refunded amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-refunded][invoice]" value="1" <?php echo isset($components['total-refunded']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-refunded][packing-slip]" value="1" <?php echo isset($components['total-refunded']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-refunded][post-label]" value="1" <?php echo isset($components['total-refunded']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Net payment', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-net-payment][invoice]" value="1" <?php echo isset($components['total-net-payment']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-net-payment][packing-slip]" value="1" <?php echo isset($components['total-net-payment']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-net-payment][post-label]" value="1" <?php echo isset($components['total-net-payment']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Fee amount', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-fee][invoice]" value="1" <?php echo isset($components['total-fee']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-fee][packing-slip]" value="1" <?php echo isset($components['total-fee']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-fee][post-label]" value="1" <?php echo isset($components['total-fee']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-fee][pre-invoice]" value="1" <?php echo isset($components['total-fee']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[shop-logo][product-label]" value="1" <?php echo isset($components['shop-logo']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Shop logo', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[print-date][product-label]" value="1" <?php echo isset($components['print-date']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Print date', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[product-seller][product-label]" value="1" <?php echo isset($components['product-seller']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Seller', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[product-id][product-label]" value="1" <?php echo isset($components['product-id']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Product ID', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[product-product][product-label]" value="1" <?php echo isset($components['product-product']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Product', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[product-barcode][product-label]" value="1" <?php echo isset($components['product-barcode']['product-label']) ? 'checked' : null; ?>>
                    <?php _e('Barcode', 'wip'); ?>
                </label>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-row][orders]" value="1" <?php echo isset($components['order-row']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Row', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-id][orders]" value="1" <?php echo isset($components['order-id']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Order ID', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-status][orders]" value="1" <?php echo isset($components['order-status']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Status', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-addr][orders]" value="1" <?php echo isset($components['order-addr']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Address', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-full-name][orders]" value="1" <?php echo isset($components['order-full-name']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Full name', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-postcode][orders]" value="1" <?php echo isset($components['order-postcode']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Postcode', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-phone][orders]" value="1" <?php echo isset($components['order-phone']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Phone', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-email][orders]" value="1" <?php echo isset($components['order-email']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Email', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-date][orders]" value="1" <?php echo isset($components['order-date']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Order date', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-payment-method][orders]" value="1" <?php echo isset($components['order-payment-method']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Payment method', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-transaction-id][orders]" value="1" <?php echo isset($components['order-transaction-id']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Transaction ID', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-national-id][orders]" value="1" <?php echo isset($components['order-national-id']['orders']) ? 'checked' : null; ?>>
                    <?php _e('National ID', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-shipping-method][orders]" value="1" <?php echo isset($components['order-shipping-method']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Shipping method', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-transmission-date][orders]" value="1" <?php echo isset($components['order-transmission-date']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Transmission date', 'wip'); ?>
                </label>
            </div>
            <?php if (is_plugin_active('woocommerce-delivery-time/woocommerce-delivery-time.php')): ?>
                <div class="uk-margin">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-delivery-date][orders]" value="1" <?php echo isset($components['order-delivery-date']['orders']) ? 'checked' : null; ?>>
                        <?php _e('Delivery date', 'wip'); ?>
                    </label>
                </div>
            <?php endif; ?>
            <?php if (is_plugin_active('novin-delivery-time/delivery-woocommerce.php')): ?>
                <div class="uk-margin">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-novin-delivery-date][orders]" value="1" <?php echo isset($components['order-novin-delivery-date']['orders']) ? 'checked' : null; ?>>
                        <?php _e('Delivery date (Mahan plugin)', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-novin-delivery-notice][orders]" value="1" <?php echo isset($components['order-novin-delivery-notice']['orders']) ? 'checked' : null; ?>>
                        <?php _e('Delivery notice (Mahan plugin)', 'wip'); ?>
                    </label>
                </div>
            <?php endif; ?>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-customer-note][orders]" value="1" <?php echo isset($components['order-customer-note']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Customer note', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-note][orders]" value="1" <?php echo isset($components['order-note']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Order note', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-products][orders]" value="1" <?php echo isset($components['order-products']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Products', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-price][orders]" value="1" <?php echo isset($components['order-price']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Price', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order--total][orders]" value="1" <?php echo isset($components['order-total']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Total amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-discount][orders]" value="1" <?php echo isset($components['order-discount']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Discount amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-tax][orders]" value="1" <?php echo isset($components['order-tax']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Tax amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-shipping][orders]" value="1" <?php echo isset($components['order-shipping']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Shipping amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-final][orders]" value="1" <?php echo isset($components['order-final']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Final amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-refunded][orders]" value="1" <?php echo isset($components['order-refunded']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Refunded amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-net-payment][orders]" value="1" <?php echo isset($components['order-net-payment']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Net payment', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-fee][orders]" value="1" <?php echo isset($components['order-fee']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Fee amount', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-provider-price][orders]" value="1" <?php echo isset($components['order-provider-price']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Provider price', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[order-total][orders]" value="1" <?php echo isset($components['order-total']['orders']) ? 'checked' : null; ?>>
                    <?php _e('Total', 'wip'); ?>
                </label>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-barcode][invoice]" value="1" <?php echo isset($components['tapin-barcode']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Barcode', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-order-id][invoice]" value="1" <?php echo isset($components['tapin-order-id']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Order ID', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-product-info][invoice]" value="1" <?php echo isset($components['tapin-product-info']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Product info', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-shop-state][invoice]" value="1" <?php echo isset($components['tapin-shop-state']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Sender state', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-shop-city][invoice]" value="1" <?php echo isset($components['tapin-shop-city']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Sender city', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-customer-state][invoice]" value="1" <?php echo isset($components['tapin-customer-state']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Customer state', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-customer-city][invoice]" value="1" <?php echo isset($components['tapin-customer-city']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Customer city', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-shipping-method][invoice]" value="1" <?php echo isset($components['tapin-shipping-method']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Shipping method', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-refund-table][invoice]" value="1" <?php echo isset($components['tapin-refund-table']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Refund table', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-origin][invoice]" value="1" <?php echo isset($components['tapin-origin']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Origin', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-destination][invoice]" value="1" <?php echo isset($components['tapin-destination']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Destination', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-weight][invoice]" value="1" <?php echo isset($components['tapin-weight']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Weight', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-send-time][invoice]" value="1" <?php echo isset($components['tapin-send-time']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Send time', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-send-price][invoice]" value="1" <?php echo isset($components['tapin-send-price']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Send price', 'wip'); ?>
                </label>
            </div>
            <div class="uk-margin">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="components[tapin-send-price-tax][invoice]" value="1" <?php echo isset($components['tapin-send-price-tax']['invoice']) ? 'checked' : null; ?>>
                    <?php _e('Send price tax', 'wip'); ?>
                </label>
            </div>
        </li>
        <li>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shopping profit', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[profit][invoice]" value="1" <?php echo isset($components['profit']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[profit][packing-slip]" value="1" <?php echo isset($components['profit']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total items', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-items][invoice]" value="1" <?php echo isset($components['total-items']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-items][packing-slip]" value="1" <?php echo isset($components['total-items']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Total weight', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-weight][invoice]" value="1" <?php echo isset($components['total-weight']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-weight][packing-slip]" value="1" <?php echo isset($components['total-weight']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[total-weight][pre-invoice]" value="1" <?php echo isset($components['total-weight']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Customer note', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-note][invoice]" value="1" <?php echo isset($components['customer-note']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-note][packing-slip]" value="1" <?php echo isset($components['customer-note']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[customer-note][post-label]" value="1" <?php echo isset($components['customer-note']['post-label']) ? 'checked' : null; ?>>
                        <?php _e('Post label', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Order note', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-note][invoice]" value="1" <?php echo isset($components['order-note']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-note][packing-slip]" value="1" <?php echo isset($components['order-note']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[order-note][pre-invoice]" value="1" <?php echo isset($components['order-note']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Shop stamp and signature', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-shop][invoice]" value="1" <?php echo isset($components['signature-shop']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-shop][packing-slip]" value="1" <?php echo isset($components['signature-shop']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-shop][pre-invoice]" value="1" <?php echo isset($components['signature-shop']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Customer stamp and signature', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-customer][invoice]" value="1" <?php echo isset($components['signature-customer']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-customer][packing-slip]" value="1" <?php echo isset($components['signature-customer']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[signature-customer][pre-invoice]" value="1" <?php echo isset($components['signature-customer']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <?php if (is_plugin_active('sepehr-digital-signature/index.php')): ?>
                <div class="uk-margin">
                    <label class="uk-form-label"><?php _e('Customer signature (Sepehr digital signature plugin)', 'wip'); ?></label>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[sepehr-signature-customer][invoice]" value="1" <?php echo isset($components['sepehr-signature-customer']['invoice']) ? 'checked' : null; ?>>
                            <?php _e('Invoice', 'wip'); ?>
                        </label>
                    </div>
                    <div class="uk-margin-small">
                        <label>
                            <input class="uk-checkbox" type="checkbox" name="components[sepehr-signature-customer][packing-slip]" value="1" <?php echo isset($components['sepehr-signature-customer']['packing-slip']) ? 'checked' : null; ?>>
                            <?php _e('Packing slip', 'wip'); ?>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Deliver date', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-date][invoice]" value="1" <?php echo isset($components['deliver-date']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-date][packing-slip]" value="1" <?php echo isset($components['deliver-date']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-date][pre-invoice]" value="1" <?php echo isset($components['deliver-date']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label"><?php _e('Deliver time', 'wip'); ?></label>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-time][invoice]" value="1" <?php echo isset($components['deliver-time']['invoice']) ? 'checked' : null; ?>>
                        <?php _e('Invoice', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-time][packing-slip]" value="1" <?php echo isset($components['deliver-time']['packing-slip']) ? 'checked' : null; ?>>
                        <?php _e('Packing slip', 'wip'); ?>
                    </label>
                </div>
                <div class="uk-margin-small">
                    <label>
                        <input class="uk-checkbox" type="checkbox" name="components[deliver-time][pre-invoice]" value="1" <?php echo isset($components['deliver-time']['pre-invoice']) ? 'checked' : null; ?>>
                        <?php _e('Pre invoice', 'wip'); ?>
                    </label>
                </div>
            </div>
        </li>
    </ul>
</div>