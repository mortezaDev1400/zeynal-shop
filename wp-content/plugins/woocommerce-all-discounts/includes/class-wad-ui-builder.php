<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

class WAD_UI_Builder
{

	/**
	 * Builds a select dropdpown
	 *
	 * @param string       $name Name
	 * @param string       $id ID
	 * @param string       $class Class
	 * @param array        $options Options
	 * @param string|array $selected Selected value
	 * @param bool         $multiple Can select multiple values
	 * @return string HTML code
	 */
	public static function get_wad_html_select($name, $id, $class, $options, $selected = '', $multiple = false, $required = false)
	{
		ob_start();
		if ($multiple && !is_array($selected)) {
			$selected = array();
		}
?>
		<select name="<?php echo $name; ?>" <?php echo ($id) ? "id=\"$id\"" : ''; ?> <?php echo ($class) ? "class=\"$class\"" : ''; ?> <?php echo ($multiple) ? 'multiple' : ''; ?> <?php echo ($required) ? 'required' : ''; ?>>
			<?php
			if (is_array($options) && !empty($options)) {
				foreach ($options as $value => $label) {
					if (!$multiple && $value == $selected) {
			?>
						<option value="<?php echo $value; ?>" selected="selected"> <?php echo $label; ?></option>
					<?php
					} elseif ($multiple && in_array($value, $selected)) {
					?>
						<option value="<?php echo $value; ?>" selected="selected"> <?php echo $label; ?></option>
					<?php
					} else {
					?>
						<option value="<?php echo $value; ?>"> <?php echo $label; ?></option>
			<?php
					}
				}
			}
			?>
		</select>
	<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

	/**
	 * Registers the discount custom post type
	 */
	public static function register_cpt_discount()
	{

		$labels = array(
			'name'               => __('Discount', 'wad'),
			'singular_name'      => __('Discount', 'wad'),
			'add_new'            => __('New discount', 'wad'),
			'add_new_item'       => __('New discount', 'wad'),
			'edit_item'          => __('Edit discount', 'wad'),
			'new_item'           => __('New discount', 'wad'),
			'view_item'          => __('View discount', 'wad'),
			// 'search_items' => __('Search a group', 'wad'),
			'not_found'          => __('No discount found', 'wad'),
			'not_found_in_trash' => __('No discount in the trash', 'wad'),
			'menu_name'          => __('Discounts', 'wad'),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'Discounts',
			'supports'            => array('title'),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => true,
			'menu_icon'           => WAD_URL . 'admin/images/WAD-logo.svg',
		);

		register_post_type('o-discount', $args);
	}

	/**
	 * Registers the list custom post type
	 */
	public static function register_cpt_list()
	{

		$labels = array(
			'name'               => __('List', 'wad'),
			'singular_name'      => __('List', 'wad'),
			'add_new'            => __('New list', 'wad'),
			'add_new_item'       => __('New list', 'wad'),
			'edit_item'          => __('Edit list', 'wad'),
			'new_item'           => __('New list', 'wad'),
			'view_item'          => __('View list', 'wad'),
			// 'search_items' => __('Search a group', 'wad'),
			'not_found'          => __('No list found', 'wad'),
			'not_found_in_trash' => __('No list in the trash', 'wad'),
			'menu_name'          => __('Lists', 'wad'),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'Lists',
			'supports'            => array('title'),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => true,
			// 'menu_icon' => 'dashicons-schedule',
		);

		register_post_type('o-list', $args);
	}

	/**
	 * Adds the metabox for the discount CPT
	 */
	public static function get_discount_metabox()
	{

		$screens = array('o-discount');

		foreach ($screens as $screen) {

			add_meta_box(
				'o-discount-settings-box',
				__('Discount settings', 'wad'),
				'WAD_UI_Builder::get_discount_settings_page',
				$screen
			);
		}
	}

	/**
	 * Adds the metabox for the list CPT
	 */
	public static function get_list_metabox()
	{

		$screens = array('o-list');

		foreach ($screens as $screen) {

			add_meta_box(
				'o-list-settings-box',
				__('List settings', 'wad'),
				'WAD_UI_Builder::get_list_settings_page',
				$screen
			);
		}
	}

	/**
	 * Discount CPT metabox callback
	 */
	public static function get_discount_settings_page()
	{
		$raw_wp_language       = get_bloginfo('language');
		$formatted_wp_language = substr($raw_wp_language, 0, strpos($raw_wp_language, '-'));
		$url                   = admin_url('post-new.php?post_type=o-list');
		$html                  = "<a href='" . $url . "'>here</a>";
	?>
		<script type="text/javascript">
			var lang_wordpress = '<?PHP echo $formatted_wp_language; ?>';
			jQuery(document).ready(function() {
				if (jQuery('body').hasClass('post-type-o-discount')) {
					if (jQuery('tr.product-action-row select#products-list').val() === null) {
						jQuery("<p><?php _e("You haven't created a products list. You need one in order to apply a discount on multiple products. You can create one $html", 'wad'); ?></p>").css('color', 'red').insertAfter('tr.product-action-row select#products-list');
					}
				}
			});
		</script>
		<div class='block-form'>
			<?php
			$timezone_format = _x('Y-m-d H:i:s', 'timezone date format');
			$begin           = array(
				'type' => 'sectionbegin',
				'id'   => 'wad-datasource-container',
			);
			$start_date      = array(
				'title'    => __('Start date', 'wad'),
				'name'     => 'o-discount[start-date]',
				'type'     => 'text',
				'class'    => 'o-date',
				// 'custom_attributes' => array("required" => ""),
				'desc' => __('Date from which the discount is applied. Not mandatory. </br></br>Local time: ', 'woo-advanced-discounts') . '<strong>' . date_i18n($timezone_format) . '</strong>',
				'default'  => '',
			);

			$end_date = array(
				'title'    => __('End date', 'wad'),
				'name'     => 'o-discount[end-date]',
				'type'     => 'text',
				'class'    => 'o-date',
				// 'custom_attributes' => array("required" => ""),
				'desc' => __('Date when the discount ends.  Not mandatory. </br></br>Local time: ', 'woo-advanced-discounts') . '<strong>' . date_i18n($timezone_format) . '</strong>',
				'default'  => '',
			);

			$period = array(
				'title' => '',
				'name'  => 'o-discount[period]',
				'type'  => 'number',
				// 'desc' => __('Repeat every.', 'wad'),
			);
			$period_type = array(
				'title'       => '',
				'name'        => 'o-discount[period-type]',
				'type'        => 'select',
				// 'desc' => __('xx', 'wad'),
				'default' => '',
				'options'     => array(
					'd' => __('days', 'wad'),
					'm' => __('months', 'wad'),
					'y' => __('years', 'wad'),
				),
			);
			$periodicity = array(
				'title'  => __('Repeat every', 'wad'),
				'type'   => 'groupedfields',
				'desc'   => __('Interval to repeat the discount. Leave empty to disable that feature.', 'wad'),
				'fields' => array($period, $period_type),
			);
			$users_limit = array(
				'title'   => __('Users Limit', 'wad'),
				'name'    => 'o-discount[users-limit]',
				'desc'    => __('Autorized number of customers that can use the discount (leave empty to disable that feature).', 'wad'),
				'type'    => 'number',
				'default' => '',
			);
			$action      = array(
				'title'   => __('Action', 'wad'),
				'name'    => 'o-discount[action]',
				'type'    => 'select',
				'class'   => 'discount-action',
				'desc'    => __('Type of discount to apply.', 'wad'),
				'default' => '',
				'options' => self::get_discounts_actions(),
			);

			$free_gift = array(
				'title'             => __('Gifts List', 'wad'),
				'id'                => 'gift-list',
				'name'              => 'o-discount[gift-list]',
				'type'              => 'select',
				'row_class'         => 'free-gift-row',
				'desc'              => __('List of products the customer can choose his gift from', 'wad'),
				'default'           => '',
				'options'           => wad_get_all(),
			);

			$gifts_limit = array(
				'title'             => __('Gifts Limit', 'wad'),
				'name'              => 'o-discount[nb-gifts-limit]',
				'type'              => 'number',
				'row_class'         => 'free-gift-row',
				'desc'              => __('Maximum number of products the customer can select within the gifts list', 'wad'),
				'default'           => 1,
				'custom_attributes' => array(
					'min'      => '1',
					'required' => '',
				),
			);

			$gift_label = array(
				'title' => __('Gift Label', 'wad'),
				'name' => 'o-discount[gift-label]',
				'row_class' => 'free-gift-row',
				'type' => 'text',
				'desc' => __('This is a short description of the gift product. It will appear at the cart item line level. <br/><strong>Note</strong> that <strong>Free gift</strong> will be display as default value.', 'wad'),
				'default' => 'Free Gift',
			);

			$products_action   = array(
				'title'     => __('Products list', 'wad'),
				'id'        => 'products-list',
				'name'      => 'o-discount[products-list]',
				'type'      => 'select',
				'row_class' => 'product-action-row',
				'desc'      => __('List of products the selected action applies on', 'wad'),
				'default'   => '',
				'options'   => wad_get_all(),
				'required'  => true,
			);
			$cheapest_products = array(
				'title'     => __('NB. Cheapest products', 'wad'),
				'name'      => 'o-discount[nb-cheapest-products]',
				'type'      => 'number',
				'row_class' => 'cheapest-product-row',
				'desc'      => __('How many products should be considered when applying the discounts on the cheapest products?', 'wad'),
				'default'   => 1,
			);

			$nb_units_per_cheapest_product = array(
				'title'     => __('NB. units per cheapest product', 'wad'),
				'desc'      => 'How many units per cheapest product should be discounted? Leave empty to apply the discount on all units added to the cart by the customer.',
				'row_class' => 'cheapest-products-units-discounted-row',
				'type'      => 'number',
				'name'      => 'o-discount[cheapest-products-units-discounted]',
				'default'   => '',
			);

			$shippings_action = array(
				'title'     => __('Shipping methods', 'wad'),
				'row_class' => 'shipping-action-row',
				'desc'      => __('Shipping methods on which the selected action applies on', 'wad'),
				'type'      => 'custom',
				'callback'  => 'WAD_UI_Builder::get_shipping_method_select',
			);

			$disable_on_product_pages = array(
				'title'     => __('Disable on products and shop pages', 'wad'),
				'id'        => 'products-list',
				'name'      => 'o-discount[disable-on-product-pages]',
				'type'      => 'radio',
				'row_class' => 'product-action-row',
				'desc'      => __('Disables the display of discounted prices on all pages except cart and checkout', 'wad'),
				'default'   => 'no',
				'options'   => array(
					'yes' => 'Yes',
					'no'  => 'No',
				),
			);

			$cheapest_products_pool = array(
				'title'     => __('Cheapest products pool', 'wad'),
				'desc'      => __('Where to fetch the cheapest products from?', 'wad'),
				'row_class' => 'cheapest-products-pool-row',
				'type'      => 'radio',
				'name'      => 'o-discount[cheapest-products-pool]',
				'options'   => array(
					'cart'         => 'From cart - the discount will be applied to the cheapest product in the cart if that product is also in the product list assigned to the discount.',
					'product-list' => 'From product list - the discount will be applied to the cheapest product both the assigned product list AND  the cart have in common.',
				),
				'default'   => 'cart',
				'required'  => true,
			);

			$percentage_or_fixed_amount = array(
				'title'             => __('Percentage / Fixed amount', 'wad'),
				'name'              => 'o-discount[percentage-or-fixed-amount]',
				'type'              => 'number',
				'id'                => 'percentage-amount',
				'custom_attributes' => array('step' => 'any'),
				'row_class'         => 'percentage-row',
				'desc'              => __('Percentage or fixed amount to apply.', 'wad'),
				'default'           => '',
				'required'          => true,
			);

			$group_by_product = array(
				'title'     => __('Evaluate per product', 'wad'),
				'name'      => 'o-discount[calculate-per-product]',
				'type'      => 'select',
				'row_class' => 'product-action-row',
				'desc'      => __('Run the calculations of each product in the list independantly.', 'wad') . "<br><strong style='color: red;'>Beta.</strong>",
				'default'   => 'no',
				'options'   => array(
					'yes' => 'Yes',
					'no'  => 'No',
				),
			);

			$is_cumulable = array(
				'title'   => __('Cumulable ?', 'wad'),
				'name'    => 'o-discount[is-cumulable]',
				'type'    => 'radio',
				'default' => 'no',
				'desc'    => __('whether or not the discount can be applied if the condition is fullfilled more than once.', 'wad'),
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No',
				),
			);

			$is_taxable = array(
				'title'     => __('Taxable ?', 'wad'),
				'name'      => 'o-discount[is-taxable]',
				'type'      => 'radio',
				'default'   => 'yes',
				'row_class' => 'percentage-row wad-taxable',
				'desc'      => __('whether or not the discount should be taxable.', 'wad'),
				'options'   => array(
					'yes' => __('Yes', 'wad'),
					'no'  => __('No', 'wad'),
				),
			);

			$relationship = array(
				'title'   => __('Rules groups relationship', 'wad'),
				'name'    => 'o-discount[relationship]',
				'type'    => 'radio',
				'desc'    => __('AND: All groups rules must be verified to have the discount action applied.', 'wad') . '<br' . __('OR: AT least one group rules must be verified to have the discount action applied.', 'wad'),
				'default' => 'AND',
				'options' => array(
					'AND' => 'AND',
					'OR'  => 'OR',
				),
			);

			$rules = array(
				'title'    => __('Rules', 'wad'),
				'desc'     => __('Allows you to define which rules should be checked in order to apply the discount. Not mandatory.', 'wad'),
				'name'     => 'o-discount[rules]',
				'type'     => 'custom',
				'callback' => 'WAD_UI_Builder::get_discount_rules_callback',
			);

			$end      = array('type' => 'sectionend');
			$settings = array(
				$begin,
				$start_date,
				$end_date,
				$periodicity,
				$users_limit,
				// $is_cumulable,
				$relationship,
				$rules,
				$action,
				$percentage_or_fixed_amount,
				$cheapest_products_pool,
				$group_by_product,
				$shippings_action,
				$is_taxable,
				$free_gift,
				$gifts_limit,
				$gift_label,
				$products_action,
				$cheapest_products,
				$nb_units_per_cheapest_product,
				$disable_on_product_pages,
				$end,
			);
			$settings = apply_filters(
				'wad_discount_settings_page',
				$settings
			);
			echo o_admin_fields($settings);
			?>
		</div>

		<?php
		global $o_row_templates;
		?>
		<script>
			var o_rows_tpl = <?php echo json_encode($o_row_templates); ?>;
		</script>
	<?php
		return;
	}

	private static function get_discounts_actions()
	{
		return apply_filters(
			'wad_get_discount_action',
			array(
				'percentage-off-pprice'                => __('Percentage off product price', 'wad'),
				'fixed-amount-off-pprice'              => __('Fixed amount off product price', 'wad'),
				'fixed-pprice'                         => __('Fixed product price', 'wad'),
				'percentage-off-cprice'                => __('Percentage off cheapest product price in cart', 'wad'),
				'fixed-amount-off-cprice'              => __('Fixed amount off cheapest product price in cart', 'wad'),
				'percentage-off-lsubtotal'             => __('Percentage off product with lowest subtotal in cart', 'wad'),
				'fixed-amount-off-lsubtotal'           => __('Fixed amount off product with lowest subtotal in cart', 'wad'),
				'percentage-off-osubtotal'             => __('Percentage off order subtotal', 'wad'),
				'percentage-off-osubtotal-inc-taxes'   => __('Percentage off order subtotal (inc. taxes)', 'wad'),
				'fixed-amount-off-osubtotal'           => __('Fixed amount off order subtotal', 'wad'),
				'percentage-off-shipping-fee'          => __('Percentage off shipping fees', 'wad'),
				'fixed-amount-off-shipping-fee'        => __('Fixed amount off shipping fees', 'wad'),
				'fixed-shipping-fee'                   => __('Fixed shipping fees', 'wad'),
				'fixed-shipping-fee-inc-taxes'       => __('Fixed shipping fees (inc. taxes)', 'wad'),
				'free-gift'                            => __('Free gift', 'wad'),
			)
		);
	}

	/**
	 * Discount apply on shipping method select
	 */
	public static function get_shipping_method_select()
	{

		$method_title     = array();
		$did              = get_the_ID();
		$discount_metas   = get_post_meta($did, 'o-discount', true);
		$selected_method  = isset($discount_metas['shipping-list']) ? $discount_metas['shipping-list'] : '';
		$shipping_methods = WC()->shipping->get_shipping_methods();
		foreach ($shipping_methods as $id => $shipping_method) {
			if ($id != 'free_shipping') {
				$method_title[$id] = $shipping_method->get_method_title();
			}
		}
		$shipping_html_select = self::get_wad_html_select('o-discount[shipping-list][]', 'shipping-list', '', $method_title, $selected_method, true, true);

		echo $shipping_html_select;
	}

	public static function get_discount_rules_callback()
	{

		$conditions = self::get_discounts_conditions();
		$first_rule = self::get_rule_tpl($conditions, 'customer-role');
		$values_match    = self::get_value_fields_match(-1);
		$operators_match = self::get_operator_fields_match(-1);
	?>
		<script>
			var wad_values_matches = <?php echo json_encode($values_match); ?>;
			var wad_operators_matches = <?php echo json_encode($operators_match); ?>;
		</script>
		<div class='wad-rules-table-container'>
			<textarea id='wad-rule-tpl' style='display: none;'>
				<?php echo $first_rule; ?>
			</textarea>
			<textarea id='wad-first-rule-tpl' style='display: none;'>
				<?php echo $first_rule; ?>
			</textarea>
			<?php
			$discount_id = get_the_ID();
			$metas       = get_post_meta($discount_id, 'o-discount', true);
			$all_rules   = array();
			if (isset($metas['rules'])) {
				$all_rules = $metas['rules'];
			}

			if (is_array($all_rules) && !empty($all_rules)) {
				$rule_group = 0;
				foreach ($all_rules as $rules) {
					$rule_index = 0;
			?>
					<table class="wad-rules-table widefat wad-rules-table">
						<tbody>
							<?php
							foreach ($rules as $rule_arr) {
								$rule_arr['condition'] = get_proper_value($rule_arr, 'condition');
								$rule_arr['operator']  = get_proper_value($rule_arr, 'operator');
								$rule_arr['value']     = get_proper_value($rule_arr, 'value');
								$rule_html             = self::get_rule_tpl($conditions, $rule_arr['condition'], $rule_arr['operator'], $rule_arr['value']);
								$r1                    = str_replace('{rule-group}', $rule_group, $rule_html);
								$r2                    = str_replace('{rule-index}', $rule_index, $r1);
								echo $r2;
								$rule_index++;
							}
							$rule_group++;
							?>
						</tbody>
					</table>
			<?php
				}
			}
			?>

		</div>
		<a class="button wad-add-group mg-top"><?php _e('Add rules group', 'wad'); ?></a>
	<?php
	}

	private static function get_discounts_conditions()
	{
		if (Woocommerce_All_Discount_License::is_activated() === true) {
			return apply_filters(
				'wad_get_discounts_conditions',
				array(
					'customer-role'                         => __('If Customer role', 'wad'),
					'email-domain-name'                     => __('If Customer email domain name', 'wad'),
					'customer'                              => __('If Customer', 'wad'),
					'previous-order-count'                  => __('If Previous orders count', 'wad'),
					'total-spent-on-shop'                   => __('If Total spent in shop', 'wad'),
					'previously-ordered-products-count'     => __('If Previously ordered products count', 'wad'),
					'previously-ordered-products-in-list'   => __('If Previously ordered products', 'wad'),
					'order-subtotal'                        => __('If Order subtotal', 'wad'),
					'order-subtotal-inc-taxes'              => __('If Order subtotal (inc. taxes)', 'wad'),
					'order-item-count'                      => __('If Order items count', 'wad'),
					'different-order-item-count'            => __('If Different Order items count', 'wad'),
					'order-products'                        => __('If Order products', 'wad'),
					'customer-reviewed-product'             => __('If Customer reviewed any product', 'wad'),
					// "customer-reviewed-product-only" => __("If Customer reviewed a product", "wad"),
					'payment-gateway'               => __('If Payment gateway', 'wad'),
					'billing-country'                       => __('If Customer billing country', 'wad'),
					'billing-state'                         => __('If Billing state', 'wad'),
					'shipping-country'                      => __('If Shipping country', 'wad'),
					'shipping-state'                        => __('If Shipping state', 'wad'),
					'shipping-method'                       => __('If Shipping method', 'wad'),
					'customer-subscribed-mailchimp'         => __('If Customer subscribed to Mailchimp list', 'wad'),
					'customer-subscribed-sendinblue'        => __('If Customer subscribed to a Sendinblue list', 'wad'),
					'customer-subscribed-newsletter-plugin' => __('If Customer subscribed to a NewsletterPlugin list', 'wad'),
					'customer-following-affiliation-link'   => __('If Customer is following an affiliation link', 'wad'),
					'customer-group'                        => __('If Customer belongs to specified groups', 'wad'),
					'shop-currency'                         => __('If shop currency', 'wad'),
				)
			);
		}
	}

	private static function get_rule_tpl($conditions, $default_condition = false, $default_operator = '', $default_value = '')
	{
		ob_start();
		$operators   = self::get_operator_fields_match($default_condition, $default_operator);
		$value_field = self::get_value_fields_match($default_condition, $default_value);
	?>
		<tr data-id="rule_{rule-group}">
			<td class="param">
				<select class="select wad-pricing-group-param" name="o-discount[rules][{rule-group}][{rule-index}][condition]" data-group="{rule-group}" data-rule="{rule-index}">
					<?php
					foreach ($conditions as $condition_key => $condition_val) {
						if ($condition_key == $default_condition) {
					?>
							<option value='<?php echo $condition_key; ?>' selected="selected"><?php echo $condition_val; ?></option>
						<?php
						} else {
						?>
							<option value='<?php echo $condition_key; ?>'><?php echo $condition_val; ?></option>
					<?php
						}
					}
					?>
				</select>
			</td>
			<td class="operator">
				<?php echo $operators; ?>
			</td>
			<td class="value">
				<?php echo $value_field; ?>
			</td>
			<td class="add">
				<a class="wad-add-rule button" data-group='{rule-group}'><?php echo __('and', 'wad'); ?></a>
			</td>
			<td class="remove">
				<a class="wad-remove-rule acf-button-remove"></a>
			</td>
		</tr>
	<?php
		$rule_tpl = ob_get_contents();
		ob_end_clean();
		return $rule_tpl;
	}

	private static function get_value_fields_match($condition = false, $selected_value = '')
	{
		$selected_value_arr = array();
		$selected_value_str = '';
		if (is_array($selected_value)) {
			$selected_value_arr = $selected_value;
		} else {
			$selected_value_str = $selected_value;
		}

		$field_name        = 'o-discount[rules][{rule-group}][{rule-index}][value]';
		$roles             = wad_get_existing_user_roles();
		$roles_select      = self::get_wad_html_select($field_name . '[]', false, '', $roles, $selected_value_arr, true, true);
		$mc_lists          = wad_get_mailchimp_lists();
		$affiliate_lists   = wad_get_affiliate_lists();
		$sendingblue_lists = wad_get_sendinblue_lists();
		$currencies_lists  = array();
		$currencies        = get_woocommerce_currencies();
		foreach ($currencies as $currency_name => $currency) {
			$currencies_lists[$currency_name] = $currency_name;
		}

		$mailchimp_select  = self::get_wad_html_select($field_name, false, '', $mc_lists, $selected_value_str, false);
		$affiliate_select  = self::get_wad_html_select($field_name, false, '', $affiliate_lists, $selected_value_str, false);
		$sendinblue_select = self::get_wad_html_select($field_name, false, '', $sendingblue_lists, $selected_value_str, false);

		$currencies_select = self::get_wad_html_select($field_name . '[]', false, '', $currencies_lists, $selected_value_arr, true);

		$users        = wad_get_existing_users();
		$users_select = self::get_wad_html_select($field_name . '[]', false, '', $users, $selected_value_arr, true, true);

		$text          = '<input type="number" name="' . $field_name . '" value="' . $selected_value_str . '" required>';
		$text_field    = '<input type="text" placeholder="' . __('multiple sepated by ,', 'wad') . '" name="' . $field_name . '" value="' . $selected_value_str . '" required>';
		$lists_arr     = wad_get_all();
		$products_list = self::get_wad_html_select($field_name, false, '', $lists_arr, $selected_value_str, false, true);

		$available_gateways_arr = wad_get_available_payment_gateways();
		$payment_systems_select = self::get_wad_html_select($field_name . '[]', false, '', $available_gateways_arr, $selected_value_arr, true);

		$countries_obj    = new WC_Countries();
		$countries_arr    = $countries_obj->get_countries();
		$countries_select = self::get_wad_html_select($field_name . '[]', false, '', $countries_arr, $selected_value_arr, true);

		$states_arr    = wad_get_all_states();
		$states_select = self::get_wad_html_select($field_name . '[]', false, '', $states_arr, $selected_value_arr, true);

		$shipping_methods_arr   = wad_get_all_shipping_methods();
		$shipping_method_select = self::get_wad_html_select($field_name . '[]', false, '', $shipping_methods_arr, $selected_value_arr, true);

		$groups_arr    = wad_get_available_groups();
		$groups_select = self::get_wad_html_select($field_name . '[]', false, '', $groups_arr, $selected_value_arr, true);

		$values_match = apply_filters(
			'wad_fields_values_match',
			array(
				'customer-role'                         => $roles_select,
				'customer'                              => $users_select,
				'previous-order-count'                  => $text,
				'total-spent-on-shop'                   => $text,
				'order-subtotal'                        => $text,
				'order-subtotal-inc-taxes'              => $text,
				'order-item-count'                      => $text,
				'different-order-item-count'            => $text,
				'order-products'                        => $products_list,
				'customer-reviewed-product'             => $products_list,
				// "customer-reviewed-product-only" => $products_list,
				'payment-gateway'               => $payment_systems_select,
				'billing-country'                       => $countries_select,
				'billing-state'                         => $states_select,
				'shipping-country'                      => $countries_select,
				'shipping-state'                        => $states_select,
				'shipping-method'                       => $shipping_method_select,
				'customer-subscribed-mailchimp'         => $mailchimp_select,
				'customer-following-affiliation-link'   => $affiliate_select,
				'customer-subscribed-sendinblue'        => $sendinblue_select,
				'customer-subscribed-newsletter-plugin' => '',
				'customer-group'                        => $groups_select,
				'previously-ordered-products-count'     => $text,
				'previously-ordered-products-in-list'   => $products_list,
				'shop-currency'                         => $currencies_select,
				'email-domain-name'                     => $text_field,
			),
			$condition,
			$selected_value
		);

		if (isset($values_match[$condition])) {
			return $values_match[$condition];
		} else {
			return $values_match;
		}
	}

	private static function get_operator_fields_match($condition = false, $selected_value = '')
	{
		$field_name              = 'o-discount[rules][{rule-group}][{rule-index}][operator]';
		$arrays_operators        = array(
			'IN'     => __('IN', 'wad'),
			'NOT IN' => __('NOT IN', 'wad'),
		);
		$arrays_operators_select = self::get_wad_html_select($field_name, false, '', $arrays_operators, $selected_value);

		$number_operators        = array(
			'<'  => __('is less than', 'wad'),
			'<=' => __('is less or equal to', 'wad'),
			'==' => __('equals', 'wad'),
			'>'  => __('is more than', 'wad'),
			'>=' => __('is more or equal to', 'wad'),
			'%'  => __('is a multiple of', 'wad'),
		);
		$number_operators_select = self::get_wad_html_select($field_name, false, '', $number_operators, $selected_value);
		$operators_match         = apply_filters(
			'wad_operators_fields_match',
			array(
				'customer-role'                         => $arrays_operators_select,
				'customer'                              => $arrays_operators_select,
				'previous-order-count'                  => $number_operators_select,
				'total-spent-on-shop'                   => $number_operators_select,
				'order-subtotal'                        => $number_operators_select,
				'order-subtotal-inc-taxes'              => $number_operators_select,
				'order-item-count'                      => $number_operators_select,
				'different-order-item-count'            => $number_operators_select,
				'order-products'                        => $arrays_operators_select,
				'customer-reviewed-product'             => $arrays_operators_select,
				// "customer-reviewed-product-only" => $arrays_operators_select,
				'payment-gateway'               => $arrays_operators_select,
				'billing-country'                       => $arrays_operators_select,
				'billing-state'                         => $arrays_operators_select,
				'shipping-country'                      => $arrays_operators_select,
				'shipping-state'                        => $arrays_operators_select,
				'shipping-method'                       => $arrays_operators_select,
				'customer-subscribed-mailchimp'         => $arrays_operators_select,
				'customer-following-affiliation-link'   => $arrays_operators_select,
				'customer-subscribed-sendinblue'        => $arrays_operators_select,
				'customer-subscribed-newsletter-plugin' => '',
				'customer-group'                        => $arrays_operators_select,
				'previously-ordered-products-count'     => $number_operators_select,
				'previously-ordered-products-in-list'   => $arrays_operators_select,
				'shop-currency'                         => $arrays_operators_select,
				'email-domain-name'                     => $arrays_operators_select,
			),
			$condition,
			$selected_value
		);

		if (isset($operators_match[$condition])) {
			return $operators_match[$condition];
		} else {
			return $operators_match;
		}
	}

	/**
	 * List CPT metabox callback
	 */
	public static function get_list_settings_page()
	{
	?>
		<div class='block-form'>
			<?php

			$begin = array(
				'type' => 'sectionbegin',
				'id'   => 'wad-datasource-container',
			);

			$extraction_type = array(
				'title'   => __('Extraction type', 'wad'),
				'name'    => 'o-list[type]',
				'type'    => 'radio',
				'class'   => 'o-list-extraction-type',
				'default' => 'by-id',
				'desc'    => __('How would you like to specify which products you want to include in the list?', 'wad'),
				'options' => array(
					'by-id'          => 'By ID',
					'custom-request' => 'Dynamic request',
				),
			);

			$list_id     = get_the_ID();
			$metas       = get_post_meta($list_id, 'o-list', true);
			$action_meta = get_proper_value($metas, 'type', 'by-id');
			if ($action_meta == 'by-id') {
				$custom_request_css = 'display:none;';
				$by_id_css          = '';
			} else {
				$by_id_css          = 'display:none;';
				$custom_request_css = '';
			}

			$ids_list = array(
				'title'     => __('Products IDs', 'wad'),
				'desc'      => __('Values separated by commas', 'wad'),
				'name'      => 'o-list[ids]',
				'row_class' => 'extract-by-id-row',
				'row_css'   => $by_id_css,
				'type'      => 'text',
				'default'   => '',
			);

			$author = array(
				'title'     => __('Author', 'wad'),
				'desc'      => __('Retrieves only the elements created by the specified authors', 'wad'),
				'name'      => 'o-list[author__in]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'multiselect',
				'default'   => '',
				'options'   => wad_get_authors(),
			);

			$exclude = array(
				'title'     => __('Exclude', 'wad'),
				'desc'      => __('Excludes the following elements IDs from the results (values separated by commas)', 'wad'),
				'name'      => 'o-list[post__not_in]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'text',
				'default'   => '',
			);

			$metas_relationship = array(
				'title'     => __('Metas relationship', 'wad'),
				'name'      => 'o-list[meta_query][relation]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'select',
				'default'   => '',
				'options'   => array(
					'AND' => 'AND',
					'OR'  => 'OR',
				),
			);

			$meta_filter_key = array(
				'title'   => __('Key', 'wad'),
				'name'    => 'key',
				'type'    => 'text',
				'default' => '',
			);

			$meta_filter_compare = array(
				'title'   => __('Operator', 'wad'),
				'tip'     => __("If the operator  is 'IN', 'NOT IN', 'BETWEEN', or 'NOT BETWEEN', make sure the different values are separated by a comma", 'wad'),
				'name'    => 'compare',
				'type'    => 'select',
				'options' => array(
					'='           => 'EQUALS',
					'!='          => 'NOT EQUALS',
					'>'           => 'MORE THAN',
					'>='          => 'MORE OR EQUALS',
					'<'           => 'LESS THAN',
					'<='          => 'LESS OR EQUALS',
					'LIKE'        => 'LIKE',
					'NOT LIKE'    => 'NOT LIKE',
					'IN'          => 'IN',
					'NOT IN'      => 'NOT IN',
					'BETWEEN'     => 'BETWEEN',
					'NOT BETWEEN' => 'NOT BETWEEN',
					'NOT EXISTS'  => 'NOT EXISTS',
					'REGEXP'      => 'REGEXP',
					'NOT REGEXP'  => 'NOT REGEXP',
					'RLIKE'       => 'RLIKE',
				),
			);

			$meta_filter_value = array(
				'title'   => __('Value', 'wad'),
				'name'    => 'value',
				'type'    => 'text',
				'default' => '',
			);

			$meta_filter_type = array(
				'title'   => __('Type', 'wad'),
				'name'    => 'type',
				'type'    => 'select',
				'options' => array(
					''         => 'Undefined',
					'NUMERIC'  => 'NUMERIC',
					'BINARY'   => 'BINARY',
					'DATE'     => 'DATE',
					'CHAR'     => 'CHAR',
					'DATETIME' => 'DATETIME',
					'DECIMAL'  => 'DECIMAL',
					'SIGNED'   => 'SIGNED',
					'TIME'     => 'TIME',
					'UNSIGNED' => 'UNSIGNED',
				),
			);

			$tax_query_data = wad_get_taxonomies_query_data();
			?>
			<script>
				var wad_tax_query_recap = <?php echo json_encode($tax_query_data['values']); ?>;
			</script>
			<?php

			$metas_filters = array(
				'title'     => __('Metas', 'wad'),
				'desc'      => __('Filter by metas', 'wad'),
				'name'      => 'o-list[meta_query][queries]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'repeatable-fields',
				'fields'    => array($meta_filter_key, $meta_filter_compare, $meta_filter_value, $meta_filter_type),
			);

			$taxonomies_relationship = array(
				'title'     => __('Taxonomies relationship', 'wad'),
				'name'      => 'o-list[tax_query][relation]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'select',
				'default'   => '',
				'options'   => array(
					'AND' => 'AND',
					'OR'  => 'OR',
				),
			);

			$taxonomy_filter_key = array(
				'title'   => __('Taxonomy', 'wad'),
				'name'    => 'taxonomy',
				'type'    => 'select',
				'class'   => 'wad-taxonomies-selector',
				'options' => $tax_query_data['params'],
			);

			$taxonomy_filter_operator = array(
				'title'   => __('Operator', 'wad'),
				'name'    => 'operator',
				'type'    => 'select',
				'options' => array(
					'IN'     => 'IN',
					'NOT IN' => 'NOT IN',
					'AND'    => 'AND',
				),
			);

			$taxonomy_filter_value = array(
				'title'   => __('Value', 'wad'),
				'name'    => 'terms',
				'type'    => 'multiselect',
				'class'   => 'wad-terms-selector',
				'options' => $tax_query_data['values_arr'],
			);

			$taxonomies_filters = array(
				'title'     => __('Taxonomies', 'wad'),
				'desc'      => __('Filter by taxonomies (Categories, Tags, Attributes)', 'wad'),
				'name'      => 'o-list[tax_query][queries]',
				'row_class' => 'extract-by-custom-request-row',
				'row_css'   => $custom_request_css,
				'type'      => 'repeatable-fields',
				'fields'    => array($taxonomy_filter_key, $taxonomy_filter_operator, $taxonomy_filter_value),
			);

			$end      = array('type' => 'sectionend');
			$settings = array(
				$begin,
				$extraction_type,
				$ids_list,
				$author,
				$exclude,
				$taxonomies_relationship,
				$taxonomies_filters,
				$metas_relationship,
				$metas_filters,
				$end,
			);
			echo o_admin_fields($settings);
			?>
		</div>
		<a id="wad-check-query" class="button mg-top"><?php _e('Evaluate', 'wad'); ?></a>
		<span id="wad-evaluate-loading" class="wad-loading mg-top mg-left" style="display: none;"></span>
		<div id="debug" class="mg-top"></div>
		<?php
		global $o_row_templates;
		?>
		<script>
			var o_rows_tpl = <?php echo json_encode($o_row_templates); ?>;
		</script>
	<?php
	}

	/**
	 * Adds the Custom column to the default products list to help identify which ones are custom
	 *
	 * @param array $defaults Default columns
	 * @return array
	 */
	public static function get_columns($defaults)
	{
		$defaults['wad_start_date'] = __('Start Date', 'wad');
		$defaults['wad_end_date']   = __('End Date', 'wad');
		$defaults['wad_active']     = __('Active', 'wad');
		return $defaults;
	}

	/**
	 * Sets the Custom column value on the products list to help identify which ones are custom
	 *
	 * @param type $column_name Column name
	 * @param type $id Product ID
	 */
	public static function get_columns_values($column_name, $id)
	{
		$wad_discounts = wad_get_active_discounts();
		if ($column_name === 'wad_active') {
			$class = '';
			if (in_array($id, $wad_discounts)) {
				$class = 'active';
			}
			echo "<span class='wad-discount-status $class'></span>";
		} elseif ($column_name === 'wad_start_date') {
			$discount = new WAD_Discount($id);
			if (!$discount->get_settings()) {
				echo '-';
				return;
			}
			$date_formatted = mysql2date(get_option('date_format'), $discount->get_settings('start-date'), false);
			$time_formatted = mysql2date(get_option('time_format'), $discount->get_settings('start-date'), false);
			$formatted_date = $date_formatted . ' ' . $time_formatted;
			echo $formatted_date;
		} elseif ($column_name === 'wad_end_date') {
			$discount = new WAD_Discount($id);
			if (!$discount->get_settings()) {
				echo '-';
				return;
			}
			$date_formatted = mysql2date(get_option('date_format'), $discount->get_settings('end-date'), false);
			$time_formatted = mysql2date(get_option('time_format'), $discount->get_settings('end-date'), false);
			$formatted_date = $date_formatted . ' ' . $time_formatted;
			echo $formatted_date;
		}
	}

	/**
	 * Adds new tabs in the product page
	 */
	public static function get_product_tab_label($tabs)
	{
		if (!is_array($tabs)) {
			return;
		}

		$tabs['wad_quantity_pricing'] = array(
			'label'  => __('Quantity Based Pricing', 'wad'),
			'target' => 'wad_quantity_pricing_data',
			'class'  => array(),
		);
		return $tabs;
	}

	public static function get_max_input_vars_php_ini()
	{
		$total_max_normal = ini_get('max_input_vars');
		$msg              = __("Your max input var is <strong>$total_max_normal</strong> but this page contains <strong>{nb}</strong> fields. You may experience a lost of data after saving. In order to fix this issue, please increase <strong>the max_input_vars</strong> value in your php.ini file.", 'vpc');
	?>
		<script type="text/javascript">
			var o_max_input_vars = <?php echo $total_max_normal; ?>;
			var o_max_input_msg = "<?php echo $msg; ?>";
		</script>
	<?php
	}

	/**
	 * Builds all the plugin menu and submenu
	 */
	public static function add_wad_menu()
	{
		$parent_slug = 'edit.php?post_type=o-discount';
		add_submenu_page($parent_slug, __('Products Lists', 'wad'), __('Products Lists', 'wad'), 'manage_product_terms', 'edit.php?post_type=o-list', false);
		add_submenu_page($parent_slug, __('Settings', 'wad'), __('Settings', 'wad'), 'manage_product_terms', 'wad-manage-settings', 'WAD_UI_Builder::get_wad_settings_page');
		add_submenu_page($parent_slug, __('Get Started', 'wad'), __('Get Started', 'wad'), 'manage_product_terms', 'wad-about', 'WAD_UI_Builder::get_about_page');
	}

	public static function get_wad_settings_page()
	{
		if ((isset($_POST['wad-options']) && !empty($_POST['wad-options']))) {
			// $_POST[ "wad-options" ][ "social-desc" ] = stripslashes( wp_filter_post_kses( addslashes( $_POST[ "wad-options" ][ "social-desc" ] ) ) );
			update_option('wad-options', $_POST['wad-options']);
			// echo stripslashes(wp_filter_post_kses(addslashes($_POST["wad-options"]["social-desc"])));
		}
	?>
		<div class="o-wrap cf">
			<h1 style="font-size: 23px; text-transform: uppercase; margin: 1em 0;"><?php _e('Woocommerce All Discounts Settings', 'wad'); ?></h1>
			<form method="POST" action="" class="mg-top">
				<div class="postbox" id="wad-options-container">
					<?php
					$begin = array(
						'type'  => 'sectionbegin',
						'id'    => 'wad-datasource-container',
						'table' => 'options',
					);

					$mailchimp_api_key_admin  = array(
						'title'   => __('Mailchimp API KEY', 'wad'),
						'name'    => 'wad-options[mailchimp-api-key]',
						'type'    => 'text',
						'desc'    => __('Used when a MailChimp based discount need to be set. <a href="http://kb.mailchimp.com/accounts/management/about-api-keys" target="blank">How to find my API Key?</a>', 'wad'),
						'default' => '',
					);
					$sendinblue_api_key_admin = array(
						'title'   => __('SendinBlue API KEY', 'wad'),
						'name'    => 'wad-options[sendinblue-api-key]',
						'type'    => 'text',
						'desc'    => __('Used when a SendinBlue based discount need to be set.<a href="https://my.sendinblue.com/advanced/apikey" target="blank">How to find my API Key?</a>', 'wad'),
						'default' => '',
					);


					$include_taxes = array(
						'title'   => __('Include shipping in taxes', 'wad'),
						'name'    => 'wad-options[inc-shipping-in-taxes]',
						'type'    => 'select',
						'options' => array(
							'No'  => 'No',
							'Yes' => 'Yes',
						),
						'desc'    => __('Wether or not to consider shipping as part of taxes', 'wad'),
						'default' => 'No',
					);

					$disable_coupons                     = array(
						'title'   => __('Disable coupons', 'wad'),
						'name'    => 'wad-options[disable-coupons]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('whether to disable the coupons usage when a specific discount type is granted.', 'wad'),
						'default' => '',
					);

					$granted_discounts_type_list = array(
						'title'     => __('Discount types to disable coupons', 'wad'),
						'name'      => 'wad-options[disable-coupons-discounts-list]',
						'type'      => 'multiselect',
						'options'   => wad_get_all_discounts_type_lists(),
						'desc'      => __('If any of the selected discount types is granted, coupons will be disabled.', 'wad'),
						'row_class' => 'wad-disable-granted-discounts',
					);

					$display_cart_discounts_individually = array(
						'title'   => __('Display cart discounts individually', 'wad'),
						'name'    => 'wad-options[individual-cart-discounts]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('whether or not to display each cart discount individually on cart pages.', 'wad'),
						'default' => 1,
					);
					$display_original_pprice             = array(
						'title'   => __('Display each discounted product original price crossed on the cart page', 'wad'),
						'name'    => 'wad-options[original-price]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('whether or not to display each discounted product original price crossed on the cart page', 'wad'),
						'default' => 1,
					);
					$use_regular_price_for_discounts     = array(
						'title'   => __('Use the regular price as the basis for calculating discounts', 'wad'),
						'name'    => 'wad-options[use-regular-price-for-discounts]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('whether or not to use regular product prices to calculate discounts.', 'wad'),
						'default' => 0,
					);
					$display_products_discounts          = array(
						'title'   => __('Display the total products discounts', 'wad'),
						'name'    => 'wad-options[discount-on-products]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('whether or not to display total discounts on products below the cart subtotal.', 'wad'),
						'default' => 0,
					);
					$add_gift_automatically              = array(
						'title'   => __('Automatically add free gifts to the cart', 'wad'),
						'name'    => 'wad-options[free-gift-auto]',
						'type'    => 'select',
						'options' => array(
							0 => 'No',
							1 => 'Yes',
						),
						'desc'    => __('Wether or not to automatically add the free gift to the cart if there is only one product in the gifts list.', 'wad'),
						'default' => 0,
					);
					$completed_order_statuses            = array(
						'title'   => __('Completed Orders Statuses', 'wad'),
						'name'    => 'wad-options[completed-order-statuses]',
						'type'    => 'multiselect',
						'options' => wc_get_order_statuses(),
						'desc'    => __('List of order statuses considered as completed (used when manipulating previous orders in the discounts conditions).', 'wad'),
						'default' => '',
					);
					/*
					$fast_extraction_algorithm = array(
						'title' => __( 'Use new extraction algorithm', 'wad' ),
						'name' => 'wad-options[new-extraction-algorithm]',
						'type' => 'select',
						'options' => array( 0 => "No", 1 => "Yes" ),
						'desc' => __( 'Use new extraction algorithm recommanded for slow websites.', 'wad' ),
						'default' => 1,
					);
					*/
					$end      = array('type' => 'sectionend');
					$settings = apply_filters(
						'wad_get_settings_fields',
						array(
							$begin,
							$mailchimp_api_key_admin,
							$sendinblue_api_key_admin,
							$display_cart_discounts_individually,
							$display_original_pprice,
							$use_regular_price_for_discounts,
							$display_products_discounts,
							$add_gift_automatically,
							$include_taxes,
							$disable_coupons,
							$granted_discounts_type_list,
							$completed_order_statuses,
							// $fast_extraction_algorithm,
							$end,
						)
					);
					echo o_admin_fields($settings);
					?>
				</div>
				<input type="submit" class="button button-primary button-large" value="<?php _e('Save', 'wad'); ?>">
			</form>
		</div>
		<?php
		global $o_row_templates;
		?>
		<script>
			var o_rows_tpl = <?php echo json_encode($o_row_templates); ?>;
		</script>
	<?php
	}

	/**
	 * Builds the about page
	 */
	public static function get_about_page()
	{
	?>
		<div id='wad-about-page'>
			<div class="wrap">
				<div id="features-wrap">
					<h2 class="feature-h2"><?php _e('Getting Started', 'wpd'); ?></h2>
					<div class="list-posts-content">
						<div class="o-wrap o-features xl-gutter-8">
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-26.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A PRODUCTS LIST?', 'wad'); ?></h3>
								<p><?php _e("A product list is a subset of your shop's products that you can target in the discount conditions or the products on which they apply while setting up a dynamic...", 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%d9%87-%d9%84%db%8c%d8%b3%d8%aa-%d9%85%d8%ad%d8%b5%d9%88%d9%84%d8%a7%d8%aa-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%b4%d9%88%d8%af%d8%9f/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-01.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE DISCOUNT BASED ON THE CUSTOMER EMAIL DOMAIN?', 'wad'); ?></h3>
								<p><?php _e('Email addresses from a company are grouped under the same email domain and can be easily used to target a group of customers for multiple purposes.', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1-%d8%a7%d8%b3%d8%a7%d8%b3-%d8%af%d8%a7%d9%85%d9%86%d9%87-%d8%a7%db%8c%d9%85%db%8c%d9%84/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-02.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE DISCOUNT ON A PRODUCT VARIATION?', 'wad'); ?></h3>
								<p><?php _e('Variable products are a product type in WooCommerce that lets you offer a set of variations on a product, with control over prices, stock, image and more for ...', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1%d8%a7%db%8c-%d9%85%d8%ad%d8%b5%d9%88%d9%84%d8%a7%d8%aa-%d9%85%d8%aa%d8%ba%db%8c%db%8c/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-07.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE DISCOUNT PER PAYMENT METHOD?', 'wad'); ?></h3>
								<p><?php _e('A payment gateway is a service that allows a customer to pay for his order using credit cards or direct payments methods. While there are hundreds of payment methods...', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1-%d8%a7%d8%b3%d8%a7%d8%b3-%d8%b1%d9%88%d8%b4-%d9%be%d8%b1%d8%af%d8%a7%d8%ae%d8%aa%d8%9f/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-08.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE DISCOUNT ON THE FIRST ORDER OR THE NTH ORDER?', 'wad'); ?></h3>
								<p><?php _e('A discount on the first order is the most effective way to convert a first time visitor into a paying customer. That conversion is the first and hardest step into...', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1%d8%a7%db%8c-%d8%ae%d8%b1%db%8c%d8%af%d9%87%d8%a7%db%8c-%d8%a7%d9%88%d9%84/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-24.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE BULK DISCOUNT PER CUSTOMER ROLE OR GROUP?', 'wad'); ?></h3>
								<p><?php _e('Bulk discounts per customer are particularly useful if you have different types of customers or different pricing strategies to apply.', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1%d8%a7%db%8c-%d9%81%d8%b1%d9%88%d8%b4-%d8%b9%d9%85%d8%af%d9%87-%d8%a8%d8%b1%d8%a7%db%8c/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>
							<div class="o-col col xl-1-2">
								<img class="vc_single_image-img " src="<?php echo WAD_URL . 'admin/images/features/'; ?>WAD-Icons-25.svg">
								<h3 class="wad-title"><?php _e('HOW TO CREATE A WOOCOMMERCE BULK DISCOUNT PER PRODUCT CATEGORY?', 'wad'); ?></h3>
								<p><?php _e('Bulk discounts are one of the most popular deals mainly used to increase the average order size on online stores. Despite WooCommerce being one of the most...', 'wpd'); ?></p>
								<a href="https://ehsan-12.ir/all-discounts/%da%86%da%af%d9%88%d9%86%da%af%db%8c-%d8%a7%db%8c%d8%ac%d8%a7%d8%af-%d8%aa%d8%ae%d9%81%db%8c%d9%81-%d8%a8%d8%b1%d8%a7%db%8c-%d9%81%d8%b1%d9%88%d8%b4-%d8%b9%d9%85%d8%af%d9%87-%d9%85%d8%b1%d8%a8%d9%88/" class="button" target="_blank"><?php _e('Learn More', 'wad'); ?></a>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
		<?php
	}

	public static function get_license_activation_notice()
	{
		$wad_settings = get_option('wad-options');
		if (!empty($wad_settings['purchase-code'])) {
		?>
		<?php
			return;
		}

		if (0) {
		?>
			<?php
		}
	}

	/**
	 * Checking if product list is define.
	 */
	public static function check_product_list()
	{
		$product_lists_counts = wad_get_all();
		global $post_type, $pagenow;
		if ('o-discount' == $post_type || 'o-list' == $post_type || ('edit.php' == $pagenow || (isset($_GET['page']) && $_GET['page'] != 'wad-pro-features'))) {
			if (isset($product_lists_counts) && empty($product_lists_counts)) {
				$url  = admin_url('post-new.php?post_type=o-list');
				$html = "<a href='" . $url . "'>here</a>";
			?>
				<div class="wad notice notice-error">
					<p>
						<?php
						_e("You haven't created a products list. You need one in order to apply a discount on multiple products. You can create one $html .", 'wad');
						?>
					</p>
				</div>
		<?php
			}
		}
	}

	public static function show_original_price_on_cart($formatted_price, $cart_item)
	{
		global $wad_settings;
		$show_o_price = get_proper_value($wad_settings, 'original-price', '1');
		if ('1' === $show_o_price) {
			$regular_price = get_product_regular_price_according_taxes($cart_item);

			if ($cart_item['data']->is_on_sale()) {

				return wc_format_sale_price($regular_price, $formatted_price);
			}
		}

		return $formatted_price;
	}

	public static function show_original_total_price_on_checkout($formatted_subtotal, $cart_item)
	{
		if (is_checkout()) {
			global $wad_settings;
			$show_o_price = get_proper_value($wad_settings, 'original-price', '1');

			if ('1' === $show_o_price) {
				$regular_price = get_product_regular_price_according_taxes($cart_item);

				$product_qty      = $cart_item['quantity'];
				$regular_subtotal = $regular_price * $product_qty;

				if ($cart_item['data']->is_on_sale()) {

					return wc_format_sale_price($regular_subtotal, $formatted_subtotal);
				}
			}
		}

		return $formatted_subtotal;
	}

	public static function display_total_products_discount()
	{
		global $woocommerce;
		global $wad_settings;
		$display_discount_products = get_proper_value($wad_settings, 'discount-on-products', '0');
		if ($display_discount_products == '1') {

			$discount_total = 0;

			foreach ($woocommerce->cart->get_cart() as $cart_item_key => $values) {

				$product = $values['data'];
				if (isset($values['wad_free_gift'])) {
					$discount        = $product->get_regular_price();
					$discount_total += $discount;
				} elseif ($product->is_on_sale()) {
					$regular_price   = $product->get_regular_price();
					$sale_price      = $product->get_price();
					$discount        = ($regular_price - $sale_price) * $values['quantity'];
					$discount_total += $discount;
				}
			}

			if ($discount_total > 0) {
				echo '<tr class="cart-discount">
                <th>' . __('Total products discounts', 'wad') . '</th>
                <td data-title=" ' . __('Total Discounts', 'wad') . ' ">'
					. wc_price($discount_total) . '</td>
                </tr>';
			}
		}
	}

	public static function get_product_tab_data()
	{
		$begin = array(
			'type' => 'sectionbegin',
			'id'   => 'wad-quantity-pricing-rules',
		);
		$product_id = get_the_ID();

		$discount_enabled = array(
			'title'   => __('Enabled', 'wad'),
			'name'    => 'o-discount[enable]',
			'type'    => 'checkbox',
			'value'   => 1,
			'desc'    => __('Enable/Disable this feature. <br>Shortcode  <strong>[wad_product_pricing_table product_id="' . $product_id . '"]</strong>', 'wad'),
			'default' => 0,
		);

		$discount_type = array(
			'title'   => __('Discount type', 'wad'),
			'name'    => 'o-discount[type]',
			'type'    => 'radio',
			'options' => array(
				'percentage' => __('Percentage off product price', 'wad'),
				'fixed'      => __('Fixed amount off product price', 'wad'),
				'fixedPrice' => __('Fixed product price', 'wad'),
				'n-free'     => __('Give N for free', 'wad'),
			),
			'default' => 'percentage',
			'desc'    => __('Apply a percentage or a fixed amount discount', 'wad'),
		);

		$rules_types = array(
			'title'   => __('Rules type', 'wad'),
			'name'    => 'o-discount[rules-type]',
			'type'    => 'radio',
			'options' => array(
				'intervals' => __('Intervals', 'wad'),
				'steps'     => __('Steps', 'wad'),
			),
			'default' => 'intervals',
			'desc'    => __('If Intervals, the intervals rules will be used.<br>If Steps, the steps rules will be used.', 'wad'),
		);

		$min = array(
			'title'   => __('Min', 'wad'),
			'name'    => 'min',
			'id'      => 'o-discount[intervals][min]',
			'type'    => 'number',
			'default' => '',
		);

		$max = array(
			'title'   => __('Max', 'wad'),
			'name'    => 'max',
			'id'      => 'o-discount[intervals][max]',
			'type'    => 'number',
			'default' => '',
		);

		$discount = array(
			'title'             => __('Discount / Nb. Free', 'wad'),
			'name'              => 'discount',
			'type'              => 'number',
			'custom_attributes' => array('step' => 'any'),
			'default'           => '',
		);

		$discount_rules = array(
			'title'  => __('Intervals rules', 'wad'),
			'desc'   => __('If quantity ordered between Min and Max, then the discount specified will be applied. <br>Leave Min or Max empty for any value (joker).', 'wad'),
			'name'   => 'o-discount[rules]',
			'type'   => 'repeatable-fields',
			'id'     => 'intervals_rules',
			'fields' => array($min, $max, $discount),
		);

		$every = array(
			'title'   => __('Every X items', 'wad'),
			'name'    => 'every',
			'type'    => 'number',
			'default' => '',
		);

		$discount_rules_steps = array(
			'title'  => __('Steps Rules', 'wad'),
			'desc'   => __('If quantity ordered is a multiple of the step, then the discount specified will be applied.', 'wad'),
			'name'   => 'o-discount[rules-by-step]',
			'type'   => 'repeatable-fields',
			'id'     => 'steps_rules',
			'fields' => array($every, $discount),
		);

		$tiered        = array(
			'title'     => __('Tiered pricing', 'wad'),
			'name'      => 'o-discount[tiered]',
			'type'      => 'radio',
			'row_class' => 'tiered-pricing',
			'default'   => 'no',
			'desc'      => __('Can the discounts be accumulated across defined intervals or steps? <br/><strong style="color:red;">Note</strong> : Enabling this will disable the pricing table on the product page.', 'wad'),
			'options'   => array(
				'yes' => 'Yes',
				'no'  => 'No',
			),
		);
		$pricing_table = array(
			'title'   => __('Show pricing table', 'wad'),
			'name'    => 'o-discount[show-pricing-table]',
			'type'    => 'radio',
			'default' => 'yes',
			'desc'    => __('If the quantity based pricing feature is enabled, do you want to show the pricing table on the product page?', 'wad'),
			'options' => array(
				'yes' => 'Yes',
				'no'  => 'No',
			),
		);

		$end      = array('type' => 'sectionend');
		$settings = array(
			$begin,
			$discount_enabled,
			$pricing_table,
			$discount_type,
			$rules_types,
			$discount_rules,
			$discount_rules_steps,
			$tiered,
			$end,
		);
		?>
		<div id="wad_quantity_pricing_data" class="panel woocommerce_options_panel wpc-sh-triggerable">
			<?php
			echo o_admin_fields($settings);
			?>
		</div>
		<?php
		global $o_row_templates;
		?>
		<script>
			var o_rows_tpl = <?php echo json_encode($o_row_templates); ?>;
		</script>
		<?php
	}

	public static function get_quantity_pricing_tables($atts = null)
	{
		$atts_array = shortcode_atts(
			array(
				'product_id' => get_the_ID(),
			),
			$atts
		);
		$product_id = $atts_array['product_id'];

		$product_obj              = wc_get_product($product_id);
		$quantity_pricing         = get_post_meta($product_id, 'o-discount', true);
		$rules_type               = get_proper_value($quantity_pricing, 'rules-type', 'intervals');
		$use_tiering_price        = get_proper_value($quantity_pricing, 'tiered', 'no');
		$show_pricing_table_value = get_proper_value($quantity_pricing, 'show-pricing-table', 'yes');
		$discount_type            = get_proper_value($quantity_pricing, 'type');

		if ('yes' !== $show_pricing_table_value) {
			return;
		}

		ob_start();

		if (isset($quantity_pricing['enable']) && ('n-free' === $discount_type || (isset($quantity_pricing['rules']) && 'no' === $use_tiering_price) || (isset($quantity_pricing['rules-by-step']) && 'steps' === $rules_type))) {
		?>
			<h3><?php _e('Quantity based pricing table', 'wad'); ?></h3>

		<?php
			if ($rules_type == 'intervals') {
				if ($product_obj->get_type() == 'variable') {
					$available_variations = $product_obj->get_available_variations();
					foreach ($available_variations as $variation) {
						$product_price = $variation['display_price'];
						self::get_quantity_pricing_table($variation['variation_id'], $quantity_pricing, $product_price);
					}
				} else {
					$product_price = $product_obj->get_price();
					$product_is_taxable = $product_obj->get_tax_status();
					if ($product_is_taxable === "taxable") {
						if ('incl' == get_option('woocommerce_tax_display_shop')) {
							$product_price = wc_get_price_including_tax($product_obj);
						} else {
							$product_price = wc_get_price_excluding_tax($product_obj);
						}
					}
					self::get_quantity_pricing_table($product_id, $quantity_pricing, $product_price, true);
				}
			} elseif ($rules_type == 'steps') {

				if ($product_obj->get_type() == 'variable') {
					$available_variations = $product_obj->get_available_variations();
					foreach ($available_variations as $variation) {
						$product_price = $variation['display_price'];
						self::get_steps_quantity_pricing_table($variation['variation_id'], $quantity_pricing, $product_price);
					}
				} else {
					$product_price = $product_obj->get_price();
					$product_is_taxable = $product_obj->get_tax_status();
					if ($product_is_taxable === "taxable") {
						if ('incl' == get_option('woocommerce_tax_display_shop')) {
							$product_price = wc_get_price_including_tax($product_obj);
						} else {
							$product_price = wc_get_price_excluding_tax($product_obj);
						}
					}
					self::get_steps_quantity_pricing_table($product_id, $quantity_pricing, $product_price, true);
				}
			}
		}
		$table = ob_get_clean();
		echo apply_filters('wad_get_quantity_pricing_tables', $table, $product_id, $product_obj);
	}

	private static function get_steps_quantity_pricing_table($product_id, $quantity_pricing, $product_price, $display = false)
	{
		$style = '';
		if (!$display) {
			$style = 'display: none;';
		}
		?>
		<table class="wad-qty-pricing-table" data-id="<?php echo $product_id; ?>" style="<?php echo $style; ?>">
			<thead>
				<tr>
					<th><?php _e('Every multiple of', 'wad'); ?></th>
					<th><?php _e('Unit Price', 'wad'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$product_obj = wc_get_product($product_id);
				foreach ($quantity_pricing['rules-by-step'] as $rule) {
					if ($quantity_pricing['type'] == 'fixed') {
						$discount_value = $rule['discount'];
						if ($product_obj->is_taxable()) {
							$tax_amount = WC_Tax::calc_tax($rule['discount'], WC_Tax::get_rates());
							if ('incl' == get_option('woocommerce_tax_display_shop')) {
								$discount_value += array_sum($tax_amount);
							}
						}
						$price = $product_price - $discount_value;
					} elseif ($quantity_pricing['type'] == 'percentage') {
						$price = $product_price - ($product_price * $rule['discount']) / 100;
					} elseif ($quantity_pricing['type'] == 'fixedPrice') {
						$discount_value = $rule['discount'];
						if ($product_obj->is_taxable()) {
							$tax_amount = WC_Tax::calc_tax($rule['discount'], WC_Tax::get_rates());
							if ('incl' == get_option('woocommerce_tax_display_shop')) {
								$discount_value += array_sum($tax_amount);
							}
						}
						$price = $discount_value;
					}
				?>
					<tr>
						<td><?php echo $rule['every']; ?></td>
						<td><?php echo wc_price($price); ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	<?php
	}

	private static function get_quantity_pricing_table($product_id, $quantity_pricing, $product_price, $display = false)
	{
		$style = '';
		if (!$display) {
			$style = 'display: none;';
		}
	?>
		<table class="wad-qty-pricing-table" data-id="<?php echo $product_id; ?>" style="<?php echo $style; ?>">
			<thead>
				<tr>
					<th><?php _e('Min', 'wad'); ?></th>
					<th><?php _e('Max', 'wad'); ?></th>
					<th><?php _e('Unit Price', 'wad'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$product_obj = wc_get_product($product_id);
				foreach ($quantity_pricing['rules'] as $rule) {
					if ($quantity_pricing['type'] == 'fixed') {
						$discount_value = $rule['discount'];
						if ($product_obj->is_taxable()) {
							$tax_amount = WC_Tax::calc_tax($rule['discount'], WC_Tax::get_rates());
							if ('incl' == get_option('woocommerce_tax_display_shop')) {
								$discount_value += array_sum($tax_amount);
							}
						}
						$price = $product_price - $discount_value;
					} elseif ($quantity_pricing['type'] == 'percentage') {
						$price = $product_price - ($product_price * $rule['discount']) / 100;
					} elseif ($quantity_pricing['type'] == 'n-free') {
						if ($rule['min']) {
							$quantity_to_check = $rule['min'];
						} else {
							$quantity_to_check = $rule['max'];
						}
						$price = wad_get_product_free_gift_price($product_price, $quantity_to_check, $rule['discount']);
					} elseif ($quantity_pricing['type'] == 'fixedPrice') {
						$discount_value = $rule['discount'];
						if ($product_obj->is_taxable()) {
							$tax_amount = WC_Tax::calc_tax($rule['discount'], WC_Tax::get_rates());
							if ('incl' == get_option('woocommerce_tax_display_shop')) {
								$discount_value += array_sum($tax_amount);
							}
						}
						$price = $discount_value;
					}
				?>
					<tr>
						<td><?php echo $rule['min']; ?></td>
						<td>
							<?php
							if (empty($rule['max'])) {
								_e('And more.', 'wad');
							} else {
								echo $rule['max'];
							}
							?>
						</td>
						<td><?php echo wc_price($price); ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	<?php
	}

	/**
	 * Displays the free gifts available.
	 */
	public static function show_free_gifts_table()
	{

		global $wad_free_gifts_choice_list;
		$wad_free_gifts_choice_list = (array) $wad_free_gifts_choice_list;

		if (!$wad_free_gifts_choice_list) {

			return;
		}

		$free_gifts_list = join(',', $wad_free_gifts_choice_list);

		echo '<h2>' . __('You earned a free gift!', 'wad') . '</h2>';

		global $wad_free_gifts_displaying;
		$wad_free_gifts_displaying = true;

		echo WC_Shortcodes::products(array('ids' => $free_gifts_list));

		$wad_free_gifts_displaying = false;
	}

	public static function add_alternative_coupon_form()
	{

	?>
		<div class="wad-form-coupon">
			<?php
			global $wad_bypass_coupon_filter;
			$wad_bypass_coupon_filter = true;

			woocommerce_checkout_coupon_form();

			$wad_bypass_coupon_filter = false;
			?>
		</div>
<?php
	}

	/**
	 * Displays free gift label
	 */
	public static function show_free_gift_label($cart_item)
	{

		if (isset($cart_item['wad_free_gift'])) {

			global $wad_granted_free_gift_discounts;
			$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

			$granted_discount_id = $cart_item['wad_free_gift_discount_id'];

			$granted_discount_obj = $wad_granted_free_gift_discounts[$granted_discount_id];

			$gift_label = $granted_discount_obj->get_settings('gift-label');

			if (!$gift_label) {

				$gift_label = 'Free Gift';
			}

			echo wp_kses_post('<p>' . $gift_label . '</p>');
		}
	}
}
