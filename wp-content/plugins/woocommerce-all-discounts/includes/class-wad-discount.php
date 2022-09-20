<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Description of class-wad-discount
 *
 * @author HL
 */
class WAD_Discount {

	private $id;
	private $settings;
	private $products_list;
	private $title;
	private $rules_verified;
	private $is_applicable;
	private $evaluable_per_product;
	private $cheapest_products;
	private $cheapest_product_quantities;
	private $remaining_gifts;

	public function __construct( $discount_id ) {
		$this->cheapest_products                 = array();
		$this->cheapest_product_quantities        = array();

		if ( $discount_id ) {
			$this->id                    = $discount_id;
			$this->settings              = get_post_meta( $discount_id, 'o-discount', true );
			$this->title                 = get_the_title( $discount_id );
			$this->rules_verified        = false;
			$this->is_applicable         = false;
			$this->evaluable_per_product = false;
			if ( empty( $this->settings['rules'] ) ) {
				$this->rules_verified = true;
				$this->is_applicable  = true;
			}

			if ( ! $this->settings ) {
				return;
			}

			$list_id          = false;
			$products_actions = wad_get_product_based_actions();
			if ( in_array( $this->settings['action'], $products_actions, true ) ) {
				$list_id = $this->settings['products-list'];
			} elseif ( 'free-gift' === $this->settings['action'] ) {
				$list_id = $this->settings['gift-list'];
				$this->remaining_gifts = $this->settings['nb-gifts-limit'];
			}

			if ( $list_id ) {
				$this->products_list = new WAD_Products_List( $list_id );
			}

			if ( ! is_admin() ) {

				$this->init_coupled_rules_if_needed();
			}
		}
	}

	/**
	 * Gets the discount ID.
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Sets the discount id.
	 *
	 * @param int $id The ID to set.
	 */
	public function set_id( $id ) {
		$this->id = $id;
	}

	/**
	 * Gets the discount configuration.
	 *
	 * @param string $setting_name The specific setting to retrieve.
	 *
	 * @return mixed The whole discount configuration if no parameter is provided or
	 * the specific setting for $setting_name if it is provided. Returns null if the
	 * there is no configuration found for $setting_name.
	 */
	public function get_settings( $setting_name = '' ) {
		if ( '' === $setting_name ) {
			return $this->settings;
		} elseif ( array_key_exists( $setting_name, $this->get_settings() ) ) {
			return $this->settings[ $setting_name ];
		}
		return null;
	}

	/**
	 * Sets the discount configuration.
	 *
	 * @param mixed  $value The value of the configuration.
	 * @param string $setting_name The specific setting to set.
	 */
	public function set_settings( $value, $setting_name = '' ) {

		if ( ! $setting_name ) {

			$this->settings = $value;
		} else {

			$this->settings[ $setting_name ] = $value;
		}
	}

	/**
	 * Gets the product list instance associated to the discount.
	 *
	 * @return WAD_Products_List
	 */
	public function get_products_list() {
		return $this->products_list;
	}

	/**
	 * Sets the product list instance associated to the discount.
	 *
	 * @param WAD_Products_List $products_list The instance of the product list.
	 */
	public function set_products_list( $products_list ) {
		$this->products_list = $products_list;
	}

	/**
	 * Gets the title of the discount.
	 *
	 * @return string
	 */
	public function get_title() {
		return $this->title;
	}

	/**
	 * Sets the title of the discount.
	 *
	 * @param string $title The title of the discount.
	 * @return  void
	 */
	public function set_title( $title ) {
		$this->title = $title;
	}

	/**
	 * Get the value of rules_verified
	 */
	public function get_rules_verified() {
		return $this->rules_verified;
	}

	/**
	 * Set the value of rules_verified
	 *
	 * @param [type] $rules_verified comment.
	 * @return  void
	 */
	public function set_rules_verified( $rules_verified ) {
		$this->rules_verified = $rules_verified;
	}

	/**
	 * Get the value of is_applicable
	 */
	public function get_is_applicable() {
		return $this->is_applicable;
	}

	/**
	 * Set the value of is_applicable
	 *
	 * @param [type] $is_applicable comment.
	 * @return  void
	 */
	public function set_is_applicable( $is_applicable ) {
		$this->is_applicable = $is_applicable;
	}

	/**
	 * Get the value of evaluable_per_product
	 */
	public function get_evaluable_per_product() {
		return $this->evaluable_per_product;
	}

	/**
	 * Set the value of evaluable_per_product
	 *
	 * @param [type] $evaluable_per_product comment.
	 * @return  void
	 */
	public function set_evaluable_per_product( $evaluable_per_product ) {
		$this->evaluable_per_product = $evaluable_per_product;
	}

	/**
	 * Returns the list of cheapest products in the cart needed by the discount
	 *
	 * @return array
	 */
	public function get_cheapest_products() {

		return $this->cheapest_products;
	}


	/**
	 * Returns the list containing the quantity of each cheapest product needed by the discount
	 *
	 * @return array
	 */
	public function get_cheapest_product_quantities() {

		return $this->cheapest_product_quantities;
	}

	/**
	 * Updates the list of cheapest products in the cart needed by the discount
	 *
	 * @param array $list The new list of cheapest products.
	 */
	public function set_cheapest_products( $list ) {

		$this->cheapest_products = $list;
	}

	/**
	 * Updates the list containing the quantity of each cheapest product needed by the discount
	 *
	 * @param array $list The new list containing the quantity of each cheapest product
	 */
	public function set_cheapest_product_quantities( $list ) {

		$this->cheapest_product_quantities = $list;
	}

	/**
	 * Retrieves the value of the option cheapest products pool.
	 * Returns 'cart' if the value cannot be found.
	 *
	 * @return string
	 */
	public function get_cheapest_product_pool() {

		return get_proper_value( $this->get_settings(), 'cheapest-products-pool', 'cart' );
	}

	/**
	 * Returns the number of gifts still available to give.
	 *
	 * @return int
	 */
	public function get_remaining_gifts() {

		return $this->remaining_gifts;
	}

	/**
	 * Sets the number of gifts available to give.
	 *
	 * @param int $value The number of gifts to make available.
	 */
	public function set_remaining_gifts( $value ) {

		$this->remaining_gifts = $value;
	}

	function get_cart_items( $item_id = false ) {
		global $woocommerce;
		return $woocommerce->cart->get_cart();
	}


	function get_discount_amount( $amount, $product = null ) {
		$to_widthdraw = 0;
		if ( in_array( $this->get_settings( 'action' ), array( 'percentage-off-pprice', 'percentage-off-osubtotal', 'percentage-off-osubtotal-inc-taxes', 'percentage-off-cprice', 'percentage-off-lsubtotal' ) ) ) {
			$to_widthdraw = floatval( $amount ) * floatval( $this->get_settings( 'percentage-or-fixed-amount' ) ) / 100;
		}
		// Fixed discount
		elseif ( in_array( $this->get_settings( 'action' ), array( 'fixed-amount-off-pprice', 'fixed-amount-off-osubtotal', 'fixed-amount-off-cprice', 'fixed-amount-off-lsubtotal' ) ) ) {
			$to_widthdraw = $this->get_settings( 'percentage-or-fixed-amount' );
		} elseif ( $this->get_settings( 'action' ) == 'fixed-pprice' ) {
			$to_widthdraw = floatval( $amount ) - floatval( $this->get_settings( 'percentage-or-fixed-amount' ) );
		}
		// We save the discount in the session to use it later when completing the payment
		$decimals  = wc_get_price_decimals();
		$to_return = wc_round_discount( $to_widthdraw, $decimals );
		return apply_filters( 'wad_get_discount_amount', $to_return, $amount, $product, $this );
	}

	function is_rule_valid( $rule, $product_id = false ) {
		$is_valid  = false;
		$condition = $this->get_evaluable_condition( $rule, $product_id );
		$value     = get_proper_value( $rule, 'value' );

		// We check if the condition is IN or NOT IN the value
		// $array_operators=array("IN", "NOT IN");
		if ( $rule['condition'] == 'customer' || $rule['condition'] == 'payment-gateway' || $rule['condition'] == 'billing-country' || $rule['condition'] == 'shipping-country' || $rule['condition'] == 'shipping-state' || $rule['condition'] == 'shipping-method' || $rule['condition'] == 'billing-state' || $rule['condition'] == 'shop-currency' ) {
			// if(in_array($rule["operator"], $array_operators))
			if ( ! is_array( $value ) ) {
				$error_msg = __( 'Discount', 'wad' ) . " #$this->id: " . __( 'Rule ', 'wad' ) . $rule['condition'] . __( ' requires at least one parameter selected in the values', 'wad' );
				echo $error_msg . '<br>';
				$is_valid = false;
			} else {
				$is_valid = in_array( $condition, $value );
				if ( $rule['operator'] == 'NOT IN' ) {
					$is_valid = ( ! $is_valid );
				}
			}
			// Checks if the a products is in a list
		} elseif ( $rule['condition'] == 'order-products' ) {
			$list_products_ids = ( isset( $rule['list'] ) && is_array( $rule['list'] ) ) ? $rule['list'] : array();
			// We check if there is at list one occurence of the items in the condition in the list
			$diff     = array_intersect( $condition, $list_products_ids );
			$is_valid = count( $diff );
			if ( $rule['operator'] == 'NOT IN' ) {
				$is_valid = ( ! $is_valid );
			}
		} elseif ( $rule['condition'] == 'customer-role' ) {
			if ( is_array( $condition ) ) {
				$is_valid = array_intersect( $condition, $value );
			} else {
				$is_valid = in_array( $condition, $value );
			}
			if ( $rule['operator'] == 'NOT IN' ) {
				$is_valid = ( ! $is_valid );
			}
		} elseif ( $rule['condition'] == 'order-item-count-in-list' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'different-order-item-count-in-list' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'previously-ordered-products-count' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'previously-ordered-products-in-list' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'customer-reviewed-product' ) {
			$is_valid = $condition;
			// } else if ($rule["condition"] == "customer-reviewed-product-only") {
			// $is_valid = in_array($product_id, $condition);
		} elseif ( $rule['condition'] == 'customer-subscribed-mailchimp' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'customer-following-affiliation-link' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'customer-subscribed-sendinblue' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'customer-subscribed-newsletter-plugin' ) {
			$is_valid = $condition;
			// customer-group: If the customer belongs to one of the specified groups
		} elseif ( $rule['condition'] == 'customer-group' ) {
			if ( isset( $rule['value'] ) ) {
				$selected_groups = $rule['value'];
				$diff            = array_intersect( $condition, $selected_groups );
				$is_valid        = count( $diff );
				if ( $rule['operator'] == 'NOT IN' ) {
					$is_valid = ( ! $is_valid );
				}
			} else {
				$is_valid = false;
			}
		} elseif ( $rule['condition'] == 'previously-ordered-products-count-in-list' ) {
			$is_valid = $condition;
		} elseif ( $rule['condition'] == 'email-domain-name' ) {
			$is_valid = $condition;
		} else {
			$operator = isset( $rule['operator'] ) ? $rule['operator'] : '';
			if ( $operator == '%' ) {// Modulo evaluation
				$expression_to_eval = function( $condition, $operator, $value ) {
					if ( $condition > 0 && ( $condition % $value == 0 ) ) {
						return true;
					} else {
						return false;
					}
				};
				$is_valid           = $expression_to_eval( $condition, $operator, $value );
			} else {
				$expression_to_eval = wad_evaluate_conditions( $condition, $operator, $value );
				$is_valid           = $expression_to_eval;
			}
		}
		return apply_filters( 'wad_is_rule_valid', $is_valid, $rule, $this );
	}

	private function get_evaluable_condition( $rule, $product_id ) {
		$condition           = $rule['condition'];
		$evaluable_condition = false;

		switch ( $condition ) {
			case 'customer-role':
				global $wad_user_role;
				$evaluable_condition = $wad_user_role;
				break;
			case 'customer':
				if ( is_user_logged_in() ) {
					$evaluable_condition = get_current_user_id();
				}
				break;
			case 'previous-order-count':
				$evaluable_condition = $this->get_settings( 'previous-order-count' );
				break;
			case 'total-spent-on-shop':
				$evaluable_condition = $this->get_settings( 'total-spent-on-shop' );
				break;
			case 'order-subtotal':
				$evaluable_condition = WC()->cart->get_subtotal();
				break;
			case 'order-subtotal-in-list':
				global $woocommerce;
				$subtotal_in_list = 0;

				$order_products_in_list     = wad_get_order_products_in_list( $rule );
				$order_products_in_list_ids = array_keys( $order_products_in_list );

				foreach ( $woocommerce->cart->get_cart() as $cart_item ) {
					if ( in_array( $cart_item['variation_id'], $order_products_in_list_ids ) || in_array( $cart_item['product_id'], $order_products_in_list_ids ) ) {
						$subtotal_in_list += $cart_item['line_subtotal'];
					}
				}
				$evaluable_condition = $subtotal_in_list;
				break;
			case 'order-subtotal-inc-taxes':
				$evaluable_condition = WC()->cart->get_subtotal() + WC()->cart->get_subtotal_tax();
				break;
			case 'order-item-count':
				$evaluable_condition = wad_get_cart_products_count(); // $woocommerce->cart->get_cart_contents_count();
				break;
			case 'different-order-item-count':
				$evaluable_condition = count( wad_get_cart_products_count( true ) ); // $woocommerce->cart->get_cart_contents_count();
				break;
			case 'order-products':
				$evaluable_condition = wad_get_cart_products();
				break;
			case 'customer-reviewed-product':
				$evaluable_condition = false;
				if ( is_user_logged_in() ) {
					$current_user_id     = get_current_user_id();
					$evaluable_condition = wad_check_if_customer_reviewed_any_of_these_products( $rule['list'], $current_user_id );
					if ( $rule['operator'] == 'NOT IN' ) {
						$evaluable_condition = ( ! $evaluable_condition );
					}
				}
				break;
			// case "customer-reviewed-product-only":
			// $evaluable_condition = false;
			// if (is_user_logged_in()) {
			// $current_user_id = get_current_user_id();
			// $evaluable_condition = wad_get_reviewed_products_by_customer($current_user_id);
			// if($rule["operator"] == 'NOT IN')
			// $evaluable_condition=(!$evaluable_condition);
			// }
			// break;
			case 'payment-gateway':
				$evaluable_condition = WC()->session->chosen_payment_method;
				break;
			case 'billing-country':
				$evaluable_condition = WC()->session->customer['country'];
				// var_dump(WC()->session);
				break;
			case 'billing-state':
				// The state condition is stored in form of country-code|state-code
				$country = WC()->session->customer['country'];
				if ( isset( WC()->session->customer['billing_state'] ) ) {
					$state = WC()->session->customer['billing_state'];
				} else {
					$state = WC()->session->customer['state'];
				}
				$evaluable_condition = "$country|$state";
				break;
			case 'shipping-country':
				$evaluable_condition = WC()->session->customer['shipping_country'];
				break;
			case 'shipping-state':
				// The state condition is stored in form of country-code|state-code
				$country = WC()->session->customer['shipping_country'];
				if ( isset( WC()->session->customer['shipping_state'] ) ) {
					$state = WC()->session->customer['shipping_state'];
				} else {
					$state = WC()->session->customer['state'];
				}
				$evaluable_condition = "$country|$state";
				break;
			case 'shipping-method':
				$evaluable_condition = false;
				if ( WC()->cart->show_shipping() && WC()->cart->needs_shipping() ) {
					$chosen_methods      = WC()->session->get( 'chosen_shipping_methods' );
					$evaluable_condition = $chosen_methods[0];
					// Not sure why we have : in that string.
					$dot_position = strpos( $evaluable_condition, ':' );
					if ( false !== $dot_position ) {
						$evaluable_condition = substr( $evaluable_condition, 0, $dot_position );
					}
				}
				break;
			case 'customer-subscribed-newsletter-plugin':
				$evaluable_condition = false;
				if ( is_user_logged_in() ) {
					$current_user_id     = wp_get_current_user();
					$evaluable_condition = wad_is_user_subscribed_to_newsletterplugin( $current_user_id->user_email );
				}
				break;
			case 'customer-subscribed-mailchimp':
				if ( is_user_logged_in() ) {
					$evaluable_condition = wad_is_user_subscribed_to_mailchimp( $rule['value'] );
					if ( $rule['operator'] == 'NOT IN' ) {
						$evaluable_condition = ( ! $evaluable_condition );
					}
				}
				break;
			case 'customer-subscribed-sendinblue':
				$evaluable_condition = false;
				if ( is_user_logged_in() ) {
					$evaluable_condition = wad_is_user_subscribed_to_sendinblue( $rule['value'] );
					if ( $rule['operator'] == 'NOT IN' ) {
						$evaluable_condition = ( ! $evaluable_condition );
					}
				}
				break;
			case 'customer-following-affiliation-link':
				$evaluable_condition = wad_is_user_following_affiliation_link( $rule['value'] );
				break;
			case 'customer-group':
				$evaluable_condition = wad_get_user_groups();
				break;
			case 'order-item-count-in-list':
				$calculate_per_product = get_proper_value( $this->get_settings(), 'calculate-per-product', 'no' );
				if ( $calculate_per_product == 'yes' ) {
					$order_products_in_list = wad_get_order_products_in_list( $rule, $product_id );
				} else {
					$order_products_in_list = wad_get_order_products_in_list( $rule );
				}
				$count    = array_sum( $order_products_in_list );
				$operator = $rule['order-item-count']['operator'];
				$value    = $rule['order-item-count']['value'];
				if ( $operator == '%' ) {
					if ( $count > 0 && ( $count % intval( $value ) == 0 ) ) {
						$evaluable_condition = true;
					}
				} else {
					$evaluable_condition = wad_evaluate_conditions( $count, $operator, $value );
				}
				break;
			case 'different-order-item-count-in-list':
				$calculate_per_product = get_proper_value( $this->get_settings(), 'calculate-per-product', 'no' );
				if ( $calculate_per_product == 'yes' ) {
					$different_order_products_in_list = wad_get_order_products_in_list( $rule, $product_id );
				} else {
					$different_order_products_in_list = wad_get_order_products_in_list( $rule );
				}
				$count    = count( $different_order_products_in_list );
				$operator = $rule['different-order-item-count']['operator'];
				$value    = $rule['different-order-item-count']['value'];
				if ( $operator == '%' ) {
					if ( $count > 0 && ( $count % intval( $value ) == 0 ) ) {
						$evaluable_condition = true;
					}
				} else {
					$evaluable_condition = wad_evaluate_conditions( $count, $operator, $value );
				}
				break;
			case 'previously-ordered-products-count':
				$number_bought_from_list = wad_get_customer_previous_orders_products_count();
				$operator                = $rule['operator'];
				$value                   = $rule['value'];
				if ( $operator == '%' ) {
					if ( $number_bought_from_list > 0 && ( $number_bought_from_list % intval( $value ) == 0 ) ) {
						$evaluable_condition = true;
					}
				} else {
					$evaluable_condition = wad_evaluate_conditions( $number_bought_from_list, $operator, $value );
				}
				break;
			case 'previously-ordered-products-in-list':
				$list                    = ! empty( $rule['list'] ) ? $rule['list'] : $rule['value'];
				$number_bought_from_list = wad_get_customer_previous_orders_products_in_list( $list );
				$operator                = $rule['operator'];
				$value                   = $rule['value'];
				$evaluable_condition     = $number_bought_from_list;
				if ( $rule['operator'] == 'NOT IN' ) {
						$evaluable_condition = ( ! $evaluable_condition );
				}
				break;
			case 'previously-ordered-products-count-in-list':
				// $number_bought_from_list = $rule["calculated-count"];
				$operator                                  = $rule['previously-ordered-products-count']['operator'];
				$value                                     = $rule['previously-ordered-products-count']['value'];
				$previously_ordered_products_in_list_rules = $rule['previously-ordered-products-in-list'];
				$list                                      = $previously_ordered_products_in_list_rules['value'];
				$number_bought_from_list                   = wad_get_customer_previous_orders_products_in_list( $list );
				if ( $operator == '%' ) {
					if ( $number_bought_from_list > 0 && ( $number_bought_from_list % intval( $value ) == 0 ) ) {
						$evaluable_condition = true;
					}
				} else {
					$evaluable_condition = wad_evaluate_conditions( $number_bought_from_list, $operator, $value );
				}
				break;
			case 'shop-currency':
				$evaluable_condition = get_woocommerce_currency();
				break;
			case 'email-domain-name':
				if ( is_user_logged_in() ) {
					$current_user_id = wp_get_current_user();
					$customer_email  = $current_user_id->user_email;
				} else {
					$customer_email = WC()->session->customer['email'];
					// $customer_email = $_SESSION[ "billing_email" ];
				}
					$values = explode( ',', $rule['value'] );
				if ( $rule['operator'] == 'IN' ) {
					$evaluable_condition = false;
				} elseif ( $rule['operator'] == 'NOT IN' ) {
						$evaluable_condition = true;
				}

				foreach ( $values as $value ) {
					$is_email_domain = o_endsWith( $customer_email, trim( $value ) );
					if ( $rule['operator'] == 'IN' && $is_email_domain ) {
						$evaluable_condition = true;
						break;
					} elseif ( $rule['operator'] == 'NOT IN' && $is_email_domain ) {
						$evaluable_condition = false;
						break;
					}
				}
				return $evaluable_condition;
				break;
			default:
				$evaluable_condition = apply_filters( 'wad_get_evaluable_condition', false, $rule, $product_id ); // false;
				break;
		}

		return $evaluable_condition;
	}

	function is_applicable( $product_id = false ) {
		$is_valid = true;
		if ( $this->get_rules_verified() !== true ) {
			if ( ! $this->get_settings( 'rules' ) || ! is_array( $this->get_settings( 'rules' ) ) ) {
				$this->settings['rules'] = array();
			}
			foreach ( $this->get_settings( 'rules' ) as $group ) {
				foreach ( $group as $rule ) {
					$is_valid = $this->is_rule_valid( $rule, $product_id );
					// Group is not valid
					if ( ! $is_valid ) {
						break;
					}
				}
				// If one rule of the group is not valid in a AND case, then the group is not valid
				if ( $this->get_settings( 'relationship' ) == 'AND' && ! $is_valid ) {
					break;
				}
				// If one group is valid in a OR case, then the discount is valid
				if ( $this->get_settings( 'relationship' ) == 'OR' && $is_valid ) {
					break;
				}
			}

			if ( $this->get_evaluable_per_product() == false ) {
				$this->set_rules_verified( true );
				$this->set_is_applicable( $is_valid );
			}
		} else {
			$is_valid = $this->get_is_applicable();
		}
		return apply_filters( 'wad_is_applicable', $is_valid, $this, $product_id );
	}

	/**
	 * Build the new discounts if some couples are found in the rules
	 */
	private function init_coupled_rules_if_needed() {
		global $wad_settings;
		global $wad_last_products_fetch;
		if ( ! $wad_last_products_fetch ) {
			$wad_last_products_fetch = wad_get_cart_products();
		}
		$settings_rules = $this->get_settings( 'rules' );
		if ( $settings_rules ) {
			// Some rules can be coupled to produce new ones
			foreach ( $settings_rules as $i => $group ) {
				// order-products + order-item-count
				$order_item_count_rules = array_filter( $group, 'wad_filter_order_item_count' );
				$order_products_rules   = array_filter( $group, 'wad_filter_order_products' );
				$order_subtotal_rules   = array_filter( $group, 'wad_filter_order_subtotal' );

				// order-products + different-order-item-count
				$different_order_item_count_rules = array_filter( $group, 'wad_filter_different_order_item_count' );

				// previously-ordered-products-count + previously-ordered-products-in-list
				$previously_ordered_products_count_rules   = array_filter( $group, 'wad_filter_previously_ordered_products_count' );
				$previously_ordered_products_in_list_rules = array_filter( $group, 'wad_filter_previously_ordered_products_in_list' );

				$previous_order_count_rules = array_filter( $group, 'wad_filter_previous_order_count' );
				$total_spent_on_shop_rules  = array_filter( $group, 'wad_filter_total_spent_on_shop' );

				$product_review_rules      = array_filter( $group, 'wad_filter_product_review' );
				$product_review_only_rules = array_filter( $group, 'wad_filter_product_review_only' );
				$order_sharing_rules       = array_filter( $group, 'wad_filter_product_shares' );
				if ( ! empty( $order_item_count_rules ) && ! empty( $order_products_rules ) ) {
					$k1 = array_keys( $order_item_count_rules );
					$k2 = array_keys( $order_products_rules );
					$k  = array_merge( $k1, $k2 );

					$order_item_count_rules = current( $order_item_count_rules );
					$order_products_rules   = current( $order_products_rules );

					$new_rule = array(
						'condition'        => 'order-item-count-in-list',
						'operator'         => '',
						'value'            => '',
						'order-product'    => $order_products_rules,
						'order-item-count' => $order_item_count_rules,
					);

					$products_list = new WAD_Products_List( $new_rule['order-product']['value'] );
					// Coupled discounts don't get the lists because the woocommerce constants
					// haven't been initialized yet so we save the list object in order to set the ids later

					$products_ids = $products_list->get_products();
					if ( empty( $products_ids ) ) {
						$new_rule['order-product']['list'] = $products_list;// ->get_products();
					} else {
						$new_rule['order-product']['list'] = $products_ids;
					}

					$settings_rules[ $i ]  = array_diff_key( $group, array_flip( $k ) );
					$calculate_per_product = get_proper_value( $this->get_settings(), 'calculate-per-product', 'no' );
					if ( $calculate_per_product == 'yes' ) {
						$this->set_evaluable_per_product( true );
					}
					array_push( $settings_rules[ $i ], $new_rule );
				} elseif ( ! empty( $previously_ordered_products_count_rules ) && ! empty( $previously_ordered_products_in_list_rules ) ) {
					$k1 = array_keys( $previously_ordered_products_count_rules );
					$k2 = array_keys( $previously_ordered_products_in_list_rules );
					$k  = array_merge( $k1, $k2 );

					$previously_ordered_products_count_rules   = current( $previously_ordered_products_count_rules );
					$previously_ordered_products_in_list_rules = current( $previously_ordered_products_in_list_rules );

					// $products_list_id = $previously_ordered_products_in_list_rules["value"];
					// next line don't return true value
					// $number_bought_from_list = wad_get_customer_previous_orders_products_in_list($products_list_id);

					$new_rule = array(
						'condition' => 'previously-ordered-products-count-in-list',
						'operator'  => '',
						'value'     => '',
						'previously-ordered-products-in-list' => $previously_ordered_products_in_list_rules,
						'previously-ordered-products-count' => $previously_ordered_products_count_rules,
						// "calculated-count" => $number_bought_from_list
					);
					$settings_rules[ $i ] = array_diff_key( $group, array_flip( $k ) );
					array_push( $settings_rules[ $i ], $new_rule );
				} elseif ( ! empty( $different_order_item_count_rules ) && ! empty( $order_products_rules ) ) {
					$k1 = array_keys( $different_order_item_count_rules );
					$k2 = array_keys( $order_products_rules );
					$k  = array_merge( $k1, $k2 );

					$different_order_item_count_rules = current( $different_order_item_count_rules );
					$order_products_rules             = current( $order_products_rules );

					$new_rule = array(
						'condition'                  => 'different-order-item-count-in-list',
						'operator'                   => '',
						'value'                      => '',
						'order-product'              => $order_products_rules,
						'different-order-item-count' => $different_order_item_count_rules,
					);

					$products_list = new WAD_Products_List( $new_rule['order-product']['value'] );
					// Coupled discounts don't get the lists because the woocommerce constants
					// haven't been initialized yet so we save the list object in order to set the ids later

					$products_ids = $products_list->get_products();
					if ( empty( $products_ids ) ) {
						$new_rule['order-product']['list'] = $products_list;// ->get_products();
					} else {
						$new_rule['order-product']['list'] = $products_ids;
					}

					$settings_rules[ $i ]  = array_diff_key( $group, array_flip( $k ) );
					$calculate_per_product = get_proper_value( $this->get_settings(), 'calculate-per-product', 'no' );
					if ( $calculate_per_product == 'yes' ) {
						$this->set_evaluable_per_product( true );
					}
					array_push( $settings_rules[ $i ], $new_rule );
				} elseif ( ! empty( $previous_order_count_rules ) ) {
					$this->settings[ 'previous-order-count' ] = count( wad_get_customer_orders() );
				} elseif ( ! empty( $total_spent_on_shop_rules ) ) {
					$customer_orders = wad_get_customer_orders();
					$total_spent     = 0;
					foreach ( $customer_orders as $order ) {
						$order        = wc_get_order( $order->ID );
						$total_spent += $order->get_total();
					}
					$this->settings['total-spent-on-shop'] = $total_spent;
				} elseif ( ! empty( $order_subtotal_rules ) && ! empty( $order_products_rules ) ) {
					$k1 = array_keys( $order_subtotal_rules );
					// var_dump($order_products);
					$k2 = array_keys( $order_products_rules );
					// var_dump($k2);
					$k = array_merge( $k1, $k2 );

					$order_subtotal_rules = current( $order_subtotal_rules );
					$order_products_rules = current( $order_products_rules );

					$new_rule                            = array(
						'condition'      => 'order-subtotal-in-list',
						'operator'       => $order_subtotal_rules['operator'],
						'value'          => $order_subtotal_rules['value'],
						'order-product'  => $order_products_rules,
						'order-subtotal' => $order_subtotal_rules,
					);
					$products_list                       = new WAD_Products_List( $new_rule['order-product']['value'] );
					$new_rule['order-product']['list']   = $products_list->get_products();
					$settings_rules[ $i ] = array_diff_key( $group, array_flip( $k ) );
					array_push( $settings_rules[ $i ], $new_rule );
				} elseif ( ! empty( $product_review_rules ) ) {
					$k = array_keys( $product_review_rules );

					foreach ( $product_review_rules as $rule_index => $product_review_rule ) {
						$products_list               = new WAD_Products_List( $product_review_rule['value'] );
						$product_review_rule['list'] = $products_list->get_products();

						$settings_rules[ $i ] = array_diff_key( $group, array_flip( $k ) );
						array_push( $settings_rules[ $i ], $product_review_rule );
					}
				} elseif ( ! empty( $order_products_rules ) ) {
					$k = array_keys( $order_products_rules );

					foreach ( $order_products_rules as $rule_index => $order_products_rule ) {
						$products_list               = new WAD_Products_List( $order_products_rule['value'] );
						$order_products_rule['list'] = $products_list->get_products();
						// var_dump($products_list->get_products());

						$settings_rules[ $i ] = array_diff_key( $group, array_flip( $k ) );
						array_push( $settings_rules[ $i ], $order_products_rule );
					}
				} elseif ( ! empty( $product_review_only_rules ) || ! empty( $order_sharing_rules ) ) {
					$this->set_evaluable_per_product( true );
				} elseif ( ! empty( $previously_ordered_products_in_list_rules ) ) {
					$k = array_keys( $previously_ordered_products_in_list_rules );

					foreach ( $previously_ordered_products_in_list_rules as $rule_index => $rule ) {
						$products_list = new WAD_Products_List( $rule['value'] );
						$rule['list']  = $products_list->get_products();

						$settings_rules[ $i ] = array_diff_key( $group, array_flip( $k ) );
						array_push( $settings_rules[ $i ], $rule );
					}
				}
			}
			$this->set_settings( $settings_rules, 'rules' );
		}
		$this->set_settings( apply_filters( 'wad_init_coupled_rules', $this->get_settings(), $this ) );
	}

	/**
	 * Whether a discount is applied on the whole quantity of each product getting the discount.
	 *
	 * @return bool
	 */
	public function is_discount_on_all_whole_quantity() {

		$discount_all_cheapest_products_items = get_proper_value( $this->get_settings(), 'cheapest-products-units-discounted', '' );

		if ( '' === $discount_all_cheapest_products_items ) {

			return true;
		}

		return false;
	}

	/**
	 * Get the quantity of items to be discounted as set in a specific discount.
	 *
	 * @param int $default_items_quantity_discounted The default value to return if the items quantity discounted cannot be found in the database
	 *
	 * @return int
	 */
	function get_items_quantity_discounted( $default_items_quantity_discounted ) {

		$items_quantity_discounted = get_proper_value( $this->get_settings(), 'cheapest-products-units-discounted', $default_items_quantity_discounted );

		return (int) $items_quantity_discounted;
	}
}
