<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.orionorigin.com/
 * @since      0.1
 *
 * @package    Wad
 * @subpackage Wad/public
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wad
 * @subpackage Wad/public
 * @author     ORION <support@orionorigin.com>
 */
class Wad_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wad_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wad_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wad-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wad-tooltip', WAD_URL . 'public/css/tooltip.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wad_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wad_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wad-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'wad-tooltip', WAD_URL . 'public/js/tooltip.min.js', array( 'jquery' ), $this->version, false );

		if ( is_checkout() ) {

			wp_enqueue_script( 'wad-checkout', plugin_dir_url( __FILE__ ) . 'js/wad-checkout.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'js-cookie', plugin_dir_url( __DIR__ ) . 'libraries/js-cookie/js.cookie.js', array(), $this->version, false );
		}
	}

	function init_globals() {
		global $wad_settings;
		$wad_settings = get_option( 'wad-options' );
		if ( class_exists( 'WooCommerce' ) ) {

			$is_frontend_request = wad_is_frontend_request();

			if ( ! $is_frontend_request ) {

				return;
			}

			global $wad_discounts;
			global $wad_cheapest_discounts;
			global $wad_discounted_products;
			global $wad_products_lists;
			global $mailchimp_user_lists;
			global $wad_free_gifts;
			global $wad_cart_discounts;
			global $wad_user_role;
			global $wad_user_groups;
			global $wad_reviewed_products_by_customer;
			global $wad_last_products_fetch;
			global $wad_free_gifts_total;
			global $wad_applied_discounts;
			global $wad_granted_order_discounts;
			global $wad_granted_free_gift_discounts;
			global $wad_free_gifts_choice_list;
			global $wad_system_removing_free_gift;
			global $wad_free_gifts_displaying;
			global $wad_auto_add_unique_free_gift;
			global $wad_processing_auto_add_free_gift;
			global $wad_applied_fees;

			$wad_cart_discounts                = 0;
			$wad_free_gifts_total              = 0;
			$wad_reviewed_products_by_customer = false;
			$wad_last_products_fetch           = array();
			$wad_free_gifts                    = array();
			$wad_user_groups                   = false;
			$wad_cheapest_discounts            = array();
			$wad_discounted_products           = array();
			$wad_auto_add_unique_free_gift     = get_option( 'wad-options' )['free-gift-auto'] ? true : false;
			$wad_applied_fees                  = array();

			$current_user  = wp_get_current_user();
			$email         = $current_user->user_email;
			$wad_user_role = wad_get_user_role();

			$mailchimp_user_lists  = wad_get_mailchimp_user_lists( $email );
			$all_discounts         = wad_get_active_discounts( true );
			$wad_products_lists    = array();
			$wad_applied_discounts = array();

			foreach ( $all_discounts as $discount_type => $discounts ) {
				$wad_discounts[ $discount_type ] = array();
				foreach ( $discounts as $discount_id ) {

					$discount_obj = new WAD_Discount( $discount_id );

					$wad_discounts[ $discount_type ][ $discount_id ] = $discount_obj;

					$discount_obj_type = $wad_discounts[ $discount_type ][ $discount_id ]->get_settings( 'action' );

					if ( in_array( $discount_obj_type, wad_get_nb_cheapest_products_based_actions(), true ) ) {

						$wad_cheapest_discounts[] = $discount_obj;
					}
				}
			}

			define( 'WAD_INITIALIZED', true );
		}
	}

	public static function register_shortcodes() {
		if ( ! is_admin() ) {
			add_shortcode( 'wad_product_pricing_table', array( 'WAD_UI_Builder', 'get_quantity_pricing_tables' ) );
		}
	}

	/**
	 * Checks whether the 'SALE' badge needs to appear for the product.
	 *
	 * @param bool                                                     $on_sale The current 'SALE' badge appearance status.
	 * @param WC_Product_Simple|WC_Product_Variable|WC_Product_Grouped $product The product to check.
	 *
	 * @return bool
	 */
	public function is_product_on_sale( $on_sale, $product ) {

		global $wad_free_gifts_displaying;
		$wad_free_gifts_displaying = (bool) $wad_free_gifts_displaying;

		$product_id = $product->get_id();

		$regular_price = $product->get_regular_price();

		// product is free gift or product with a granted discount
		if ( ( $wad_free_gifts_displaying && $regular_price ) || wad_is_discounted_product( $product_id ) ) {

			return true;
		}

		return $on_sale;
	}

	/**
	 * This function apply quantity based discount if needed
	 *
	 * @param [type] $product comment.
	 * @param [type] $normal_price comment.
	 * @return float|string
	 */
	public static function apply_quantity_based_discount_if_needed( $product, $normal_price ) {
		// We check if there is a quantity based discount for this product.
		$product_type = $product->get_type();
		$product_id   = $product->get_id();

		if ( 'variation' === $product_type ) {
			$parent_product   = $product->get_parent_id();
			$quantity_pricing = get_post_meta( $parent_product, 'o-discount', true );
		} else {
			$quantity_pricing = get_post_meta( $product_id, 'o-discount', true );
		}

		$normal_price = (float) $normal_price;

		if ( empty( $quantity_pricing ) || ! isset( $quantity_pricing['enable'] ) ) {
			return $normal_price;
		}

		$products_qties = wad_get_cart_item_quantities();
		if ( array_key_exists( $product_id, $products_qties ) ) {
			$product_qty = $products_qties[ $product_id ];
		}

		if ( ! isset( $product_qty ) ) {
			return $normal_price;
		}

		$rules_type            = get_proper_value( $quantity_pricing, 'rules-type', 'intervals' );
		$use_tiering_price     = get_proper_value( $quantity_pricing, 'tiered', 'no' );
		$original_normal_price = $normal_price;

		if ( isset( $quantity_pricing['rules'] ) && $rules_type == 'intervals' ) {
			if ( 'yes' === $use_tiering_price ) {
				$normal_price = self::apply_tiering_pricing( $quantity_pricing, $normal_price, $product_qty );
			} elseif ( 'no' === $use_tiering_price ) {
				$normal_price = self::apply_quantity_based_discount_on_intervals_without_tiering_pricing( $quantity_pricing, $normal_price, $product_qty, $original_normal_price );
			}
		} elseif ( isset( $quantity_pricing['rules-by-step'] ) && $rules_type == 'steps' ) {
			$normal_price = self::apply_quantity_based_discount_on_steps( $quantity_pricing, $normal_price, $product_qty, $original_normal_price );
		}

		// We save the id of product if qbp is applied on it.
		if ( $original_normal_price !== $normal_price ) {
			wad_save_applied_discount_globally( 'wad_quantity_based_pricing', $product_id );
		}

		return $normal_price;
	}

	/**
	 * This function applies tiering pricing
	 *
	 * @param array  $quantity_pricing quantity pricing configuration datas.
	 * @param [type] $normal_price product normal price.
	 * @param int    $product_qty product quantity.
	 * @return int|string
	 */
	private static function apply_tiering_pricing( $quantity_pricing, $normal_price, $product_qty ) {
		$price_per_interval = array();
		// allows us to obtain a new array of rules with consecutive and ordered indexes.
		$quantity_based_pricing_rules_intervals = array_values( $quantity_pricing['rules'] );
		foreach ( $quantity_based_pricing_rules_intervals as $key => $rule ) {
			$min = intval( $rule['min'] );
			if ( 0 < $min ) {
				$min = --$min;
			}

			// if it is the first round we check if there is a virtual interval.
			if ( 0 === $key ) {
				if ( intval( $rule['min'] ) > 1 && intval( $rule['min'] ) <= $product_qty ) {
					$price_per_interval[] = $normal_price * $min;
				}
				if ( intval( $rule['min'] ) > $product_qty ) {

					return $normal_price;
				}
			}

			// if it is not the first round we check if there is a virtual interval.
			if ( 0 < $key ) {
				$last_maximum_interval = intval( $quantity_based_pricing_rules_intervals[ $key - 1 ]['max'] );
				if ( ( $last_maximum_interval + 1 ) < intval( $rule['min'] ) ) {
					if ( $rule['min'] > $product_qty ) {
						$price_per_interval[] = $normal_price * ( intval( $product_qty ) - $last_maximum_interval );
						break;
					} else {

						$price_per_interval[] = $normal_price * ( $min - $last_maximum_interval );
					}
				}

				if ( '' === $rule['min'] ) {
					$min         = $last_maximum_interval;
					$rule['min'] = $last_maximum_interval + 1;
					$quantity_based_pricing_rules_intervals[ $key ]['min'] = $rule['min'];
				}
			}
			// we check if the interval is infinite.
			if ( $rule['min'] <= $product_qty && '' === $rule['max'] ) {
				if ( array_key_exists( $key + 1, $quantity_based_pricing_rules_intervals ) ) {

					$rule['max'] = intval( $quantity_based_pricing_rules_intervals[ $key + 1 ]['min'] ) - 1;
					$quantity_based_pricing_rules_intervals[ $key ]['max'] = $rule['max'];
				} else {
					$nb_products_in_intervals = $product_qty - $min;
					$price_per_interval[]     = self::get_tiering_price( $normal_price, $nb_products_in_intervals, $quantity_pricing['type'], $rule );
					break;
				}
			}
			// $nb_products_in_intervals represents the number of products in the current range.
			if ( $rule['max'] <= $product_qty ) {
				$nb_products_in_intervals = intval( $rule['max'] ) - $min;
			} else {
				$nb_products_in_intervals = intval( $product_qty ) - $min;
			}

			// we calculate the price of the products in the current real range according to the percentage and the number of products in the range.
					$price_per_interval[] = self::get_tiering_price( $normal_price, $nb_products_in_intervals, $quantity_pricing['type'], $rule );

			// if the number of product in the cart is in the current interval we stop the loop.
			if ( ( $rule['min'] <= $product_qty && $rule['max'] >= $product_qty ) ) {

				break;
			}

			// if it is the last interval and there are still some product items to process we calculate their subtotal.
			if ( ! next( $quantity_based_pricing_rules_intervals ) && $rule['max'] < $product_qty ) {

				$remaining_qty = $product_qty - intval( $rule['max'] );

				$price_per_interval[] = $remaining_qty * $normal_price;
			}
		}

		$normal_price = array_sum( $price_per_interval ) / $product_qty;

		return $normal_price;
	}

	/**
	 * This function returns the tiering price
	 *
	 * @param [type]  $normal_price
	 * @param integer $nb_products_in_intervals
	 * @param string  $pricing_type
	 * @param array   $rule
	 * @return void
	 */
	private static function get_tiering_price( $normal_price, $nb_products_in_intervals, $pricing_type, $rule ) {
		if ( 'fixedPrice' === $pricing_type ) {
			$normal_price = floatval( $rule['discount'] ) * $nb_products_in_intervals;
		} elseif ( 'fixed' === $pricing_type ) {
			$normal_price = ( $normal_price - floatval( $rule['discount'] ) ) * $nb_products_in_intervals;
		} elseif ( 'percentage' === $pricing_type ) {
			$normal_price = ( $normal_price - $normal_price * floatval( $rule['discount'] ) / 100.0 ) * $nb_products_in_intervals;
		}
		return $normal_price;
	}

	/**
	 * This function apply quantity based discount on intervals rule type when tiering pricing is not enable
	 *
	 * @param array  $quantity_pricing
	 * @param [type] $normal_price
	 * @param int    $product_qty
	 * @param [type] $original_normal_price
	 * @return void
	 */
	private static function apply_quantity_based_discount_on_intervals_without_tiering_pricing( $quantity_pricing, $normal_price, $product_qty, $original_normal_price ) {
		foreach ( $quantity_pricing['rules'] as $rule ) {
			if ( ( '' === $rule['min'] && $product_qty <= $rule['max'] ) || ( $rule['min'] <= $product_qty && '' === $rule['max'] ) || ( $rule['min'] <= $product_qty && $product_qty <= $rule['max'] ) ) {
				if ( $quantity_pricing['type'] == 'fixed' ) {
						$normal_price -= $rule['discount'];

				} elseif ( 'percentage' === $quantity_pricing['type'] ) {
						$normal_price -= ( $normal_price * $rule['discount'] ) / 100;

				} elseif ( 'n-free' === $quantity_pricing['type'] ) {
					$normal_price = wad_get_product_free_gift_price( $original_normal_price, $product_qty, $rule['discount'] );
				} elseif ( 'fixedPrice' === $quantity_pricing['type'] ) {
					$normal_price = $rule['discount'];
				}
				if ( '' === $rule['max'] || $product_qty <= $rule['max'] ) {
					break;
				}
			}
		}
		return $normal_price;
	}

	/**
	 * This function apply quantity based discount on steps rule type
	 *
	 * @param array  $quantity_pricing
	 * @param [type] $normal_price
	 * @param int    $product_qty
	 * @param [type] $original_normal_price
	 * @return void
	 */
	private static function apply_quantity_based_discount_on_steps( $quantity_pricing, $normal_price, $product_qty, $original_normal_price ) {
		foreach ( $quantity_pricing['rules-by-step'] as $rule ) {
			if ( 0 === $product_qty % $rule['every'] ) {
				if ( 'fixed' === $quantity_pricing['type'] ) {
					$normal_price -= $rule['discount'];
				} elseif ( 'percentage' === $quantity_pricing['type'] ) {
					$normal_price -= ( $normal_price * $rule['discount'] ) / 100;
				} elseif ( 'n-free' === $quantity_pricing['type'] ) {
					$normal_price = wad_get_product_free_gift_price( $original_normal_price, $product_qty, $rule['discount'] );
				} elseif ( 'fixedPrice' === $quantity_pricing['type'] ) {
					$normal_price = $rule['discount'];
				}
				break;
			}
		}
		return $normal_price;
	}

	public static function get_sale_price( $sale_price, $product ) {
		global $wad_discounts, $wad_free_gifts_displaying, $wad_last_products_fetch;
		// We're still in the init_globals() so we don't need to run yet.
		if ( ! defined( 'WAD_INITIALIZED') || Woocommerce_All_Discount_License::is_activated() === false ) {
			return $sale_price;
		}

		if ( isset( $product->aelia_cs_conversion_in_progress ) && ! empty( $product->aelia_cs_conversion_in_progress ) ) {
			return $sale_price;
		}

		if ( is_admin() && ! wp_doing_ajax() /* || empty($sale_price) */ ) {
			return $sale_price;
		}

		$pid        = $product->get_id();
		$sale_price = apply_filters( 'wad_before_calculate_sale_price', $sale_price, $product );
		// a free gift has a display price of 0 outside product page and shop page if not bypassing that 0 price.
		if ( $wad_free_gifts_displaying || isset( $product->wad_free_gift ) ) {

			return '0';
		}

		$default_price                   = floatval( $sale_price );
		$original_sale_price             = $sale_price;
		$wad_settings                    = get_option( 'wad-options' );
		$use_regular_price_for_discounts = get_proper_value( $wad_settings, 'use-regular-price-for-discounts', 0 );
		if ( ( $use_regular_price_for_discounts || '' === $sale_price ) && $product->get_regular_price() ) {
			$sale_price    = floatval( $product->get_regular_price() );
			$default_price = floatval( $product->get_regular_price() );
		}

		foreach ( $wad_discounts['product'] as $discount_id => $discount_obj ) {
			$discount_type = $discount_obj->get_settings( 'action' );

			$disable_on_products_pages = get_proper_value( $discount_obj->get_settings(), 'disable-on-product-pages', 'no' );
			// Even If the discount is disabled on the shop pages, we force it to be enabled in the minicart even if this minicart is on the shop pages.
			if ( $disable_on_products_pages && did_action( 'woocommerce_before_mini_cart_contents' ) && ! did_action( 'woocommerce_after_mini_cart' ) ) {
				$disable_on_products_pages = false;
			}
			if ( $disable_on_products_pages == 'yes' && ! is_cart() && ! is_checkout() && ! wp_doing_ajax() ) {
				continue;
			}

			if ( $discount_obj->is_applicable( $pid ) ) {
				if ( wp_doing_ajax() ) {
					array_push( $wad_last_products_fetch, $pid );
					if ( $product->is_type( 'variation' ) ) {
						array_push( $wad_last_products_fetch, $product->get_parent_id() );
					}
				}
				$list_products = $discount_obj->get_products_list()->get_products();
				
				if ( is_array( $list_products ) && in_array( $pid, $list_products ) ) {

					if ( in_array( $discount_type, wad_get_nb_cheapest_products_based_actions() ) ) {

						$sale_price = wad_get_sale_price_for_product_in_cheapest_product_based_actions( $pid, $sale_price, $discount_obj );

					} else {
						
						$sale_price = floatval( $sale_price ) - $discount_obj->get_discount_amount( floatval( $sale_price ), $product );
					}

					// We save the discount to use it later when completing the payment.
					wad_save_applied_discount_globally( 'wad_used_discount', $discount_id );
				}
			}
		}
		if ( is_product() && did_action( 'woocommerce_product_meta_end' ) && !did_action( 'woocommerce_after_single_product_summary' ) ){
			return $sale_price;
		}

		// We check if there is a quantity pricing in order to apply that discount in the cart or checkout pages.
		if ( is_cart() || wad_is_checkout() || did_action( 'woocommerce_before_mini_cart_contents' ) ) {
			$sale_price = self::apply_quantity_based_discount_if_needed( $product, $sale_price );
			// If product's sale price changed, we must update the product too,
			// so that other parties can access it.
			$product->sale_price = $sale_price;
		}

		// Double check that the product has been granted a discount before saving it.
		if ( $sale_price < $original_sale_price ) {

			wad_save_discounted_product( $pid );
		}

		if ( $default_price === $sale_price ) {
			$sale_price = $original_sale_price;
		}
		return apply_filters( 'wad_after_calculate_sale_price', (string) $sale_price, $original_sale_price, $product );
	}

	public static function get_cheapest_products() {
		global $woocommerce, $wad_cheapest_discounts;

		if ( WC()->cart->is_empty() ) {

			return;
		}

		if ( ! is_array( $wad_cheapest_discounts ) || empty( $wad_cheapest_discounts ) ) {

			return;
		}

		foreach ( $woocommerce->cart->get_cart() as $cart_item ) {

			if ( isset( $cart_item['wad_free_gift'] ) ) {

				continue;
			}

			$sale_price                            = floatval( $cart_item['data']->get_price() );
			$product_id                            = $cart_item['data']->get_id();
			$products_price_list[ $product_id ]    = $sale_price;
			$products_subtotal_list[ $product_id ] = $sale_price * intval( $cart_item['quantity'] );
			$products_quantity_list[ $product_id ] = $cart_item['quantity'];
		}

		if ( empty( $products_price_list ) ) {

			return;
		}

		asort( $products_price_list );
		asort( $products_subtotal_list );

		$products_in_cart_sorted_by_price    = array_keys( $products_price_list );
		$products_in_cart_sorted_by_subtotal = array_keys( $products_subtotal_list );

		foreach ( $wad_cheapest_discounts as $discount_obj ) {

			$discount_type                  = $discount_obj->get_settings( 'action' );
			$cheapest_product_based_actions = wad_get_cheapest_product_based_actions();
			$smaller_subtotal_based_actions = wad_get_smaller_item_subtotal_based_actions();

			if ( in_array( $discount_type, $cheapest_product_based_actions ) ) {

				$cheapest_products_list     = wad_get_cheapest_products_active_list( $products_in_cart_sorted_by_price, $discount_obj );
				$cheapest_products_quantity = wad_get_cheapest_products_quantity( $cheapest_products_list, $products_quantity_list );

			} elseif ( in_array( $discount_type, $smaller_subtotal_based_actions ) ) {

				$cheapest_products_list     = wad_get_cheapest_products_active_list( $products_in_cart_sorted_by_subtotal, $discount_obj );
				$cheapest_products_quantity = wad_get_lowest_subtotal_products_quantity( $cheapest_products_list, $products_quantity_list );

			}

			$discount_obj->set_cheapest_products( $cheapest_products_list );
			$discount_obj->set_cheapest_product_quantities( $cheapest_products_quantity );
		}
	}

	public static function save_used_discounts( $order_id ) {
		global $wad_applied_discounts;
		if ( $wad_applied_discounts ) {
			foreach ( $wad_applied_discounts as $wad_applied_discounts_key => $applied_discount ) {
				$used_discounts = array_unique( $applied_discount );
				foreach ( $used_discounts as $discount_id ) {
					add_post_meta( $order_id, $wad_applied_discounts_key, $discount_id );

					if ( $wad_applied_discounts_key === 'wad_used_discount' ) {
						$discout_obj = new WAD_Discount( $discount_id );
						add_post_meta( $order_id, $wad_applied_discounts_key . "_settings_$discount_id", $discout_obj->get_settings() );
					}
				}
			}
			unset( $wad_applied_discounts );
		}
	}

	public static function get_coupons_status( $enabled ) {
		global $wad_bypass_coupon_filter, $wad_settings, $wad_applied_discounts;

		if ( $wad_bypass_coupon_filter ) {

			return $enabled;
		}

		$disable_coupons = get_proper_value( $wad_settings, 'disable-coupons', '0' );

		if ( empty( $wad_applied_discounts ) || '0' === $disable_coupons ) {
			return $enabled;
		}
		$discounts_are_eligible = wad_check_discount_eligibility_for_deactivate_coupons();
		if ( $discounts_are_eligible ) {
			WC()->cart->remove_coupons();
			$enabled = false;
		}
		return $enabled;
	}

	public static function get_loop_data( $wp_query ) {
		if ( is_admin() ) {

			return;
		}

		global $wad_last_products_fetch, $post;

		if ( is_a( $post, 'WP_Post' ) &&
					(
						has_shortcode( $post->post_content, 'products' )
						|| has_shortcode( $post->post_content, 'sale_products' )
						|| has_shortcode( $post->post_content, 'best_selling_products' )
						|| has_shortcode( $post->post_content, 'recent_products' )
						|| has_shortcode( $post->post_content, 'product_attribute' )
						|| has_shortcode( $post->post_content, 'top_rated_products' )
						|| has_shortcode( $post->post_content, 'product_categories' )
					)
			) {
				return;
		}

		if ( empty( $wp_query ) ) {
			global $wp_query;
		}
		if ( is_cart() || is_checkout() ) {
			$cart_products = wad_get_cart_products();
			if ( $cart_products ) {
				$wad_last_products_fetch = $cart_products;
			}
		} else {
			if ( isset( $wp_query->query['post_type'] ) ) {
				$query_post_types = $wp_query->query['post_type'];
			} else {
				$query_post_types = array( 'product' );
			}
			if (
					! empty( $query_post_types ) && (
					( is_array( $query_post_types ) && in_array( 'product', $query_post_types ) )
					|| ( ! is_array( $query_post_types ) && strpos( $query_post_types, 'product' ) !== false )
					|| ( is_array( $query_post_types ) && (
							is_product_category()
							|| is_product_tag() )
							|| is_product_taxonomy()
					) )
			) {
				$wad_last_products_fetch = array_merge(
					(array) $wad_last_products_fetch,
					array_map(
						function( $o ) {
							return $o->ID;
						},
						$wp_query->posts
					)
				);
			}
		}
	}

	public static function get_mini_cart_loop_data() {
		global $wad_last_products_fetch;
		$wad_last_products_fetch = wad_get_cart_products();
	}

	public static function prepare_product_template_loop_data( $template_name, $template_path, $located, $args ) {
		global $wad_last_products_fetch;

		if ( 'single-product/related.php' === $template_name ) {
			$wad_last_products_fetch = array_map(
				function( $o ) {
					return $o->get_id();
				},
				$args['related_products']
			);
		} elseif ( 'single-product/up-sells.php' === $template_name ) {
						$wad_last_products_fetch = array_map(
							function( $o ) {
								return $o->get_id();
							},
							$args['upsells']
						);
		} elseif ( 'cart/cross-sells.php' === $template_name && $args['cross_sells'] ) {
			$wad_last_products_fetch = array_merge(
				(array) $wad_last_products_fetch,
				array_map(
					function( $o ) {
						return $o->get_id();
					},
					$args['cross_sells']
				)
			);
		}
	}

	public static function add_discounted_products_to_query( $args, $attributes, $type ) {
		global $wad_discounts;
		$wad_on_sale_products = array();

		if ( ! empty( $attributes['ids'] ) ) {
			return $args;
		}

		if ( 'sale_products' === $type ) {
			foreach ( $wad_discounts['product'] as $discount_obj ) {
				$product_list         = $discount_obj->get_products_list()->get_products( true );
				$discounted_products  = wad_filter_on_sale_products( $product_list, $discount_obj );
				$wad_on_sale_products = array_merge( $wad_on_sale_products, $discounted_products );
			}
		}

		if ( empty( $wad_on_sale_products ) ) {
			return $args;
		}

		$args['post__in'] = array_merge( $args['post__in'], $wad_on_sale_products );
		return $args;
	}

	public static function save_products_query_results( $results, $wc_shortcode ) {
		global $wad_last_products_fetch;
		$woo_shortcode_list = array(
			'products',
			'sale_products',
			'best_selling_products',
			'recent_products',
			'product_attribute',
			'top_rated_products',
			'product_categories',
		);

		if ( in_array( $wc_shortcode->get_type(), $woo_shortcode_list, true ) ) {
			$wad_last_products_fetch = $results->ids;
		}
		return $results;
	}

	public static function get_shipping_amount( $shipping_amount, $package ) {
		if ( ! defined( 'WAD_INITIALIZED' ) ) {
			return $shipping_amount;
		}

		// Update cart total.
		global $wad_discounts, $wad_discounted_shipping_amount;

		$shipping_discounts = $wad_discounts['shipping'];
		foreach ( $shipping_discounts as $discount ) {
			$shipping_actions = wad_get_shipping_based_actions();
			$settings         = $discount->get_settings();
			$shipping_values  = get_proper_value( $settings, 'shipping-list', '' );
			$package_id       = $package->get_method_id();
			$discount_action  = $settings['action'];
			if ( $discount->is_applicable() && in_array( $package_id, $shipping_values, true ) && in_array( $discount_action, $shipping_actions, true ) ) {
				$wad_amount = floatval( $settings['percentage-or-fixed-amount'] );

				if ( 'percentage-off-shipping-fee' === $discount_action ) {
					$wad_shipping_amount = $shipping_amount - $wad_amount * floatval( $shipping_amount ) / 100;
				} elseif ( 'fixed-amount-off-shipping-fee' === $discount_action ) {
					$wad_shipping_amount = $shipping_amount - $wad_amount;
				} elseif ( 'fixed-shipping-fee' === $discount_action ) {
					$wad_shipping_amount = $wad_amount;
				} elseif ( 'fixed-shipping-fee-inc-taxes' === $discount_action ) {
					$shipping_tax_rates = 0;
					if ( wc_tax_enabled() ) {
						foreach ( WC_Tax::get_shipping_tax_rates() as $value ) {
							$shipping_tax_rates += $value['rate'];
						}
						$shipping_tax_rates /= 100;
					}
					$wad_shipping_amount = $wad_amount / ( 1 + $shipping_tax_rates );
				}

				$shipping_amount = $wad_shipping_amount;

				if ( $shipping_amount <= 0 ) {
					$shipping_amount = 0;
				}

				$wad_discounted_shipping_amount = $shipping_amount;

				// We save the discount to use it later when completing the payment.
				wad_save_applied_discount_globally( 'wad_used_discount', $discount->get_id() );
			}
		}
		return $shipping_amount;
	}

	/**
	 * This function returns shipping rate taxes
	 *
	 * @param [type] $data comment.
	 * @return [type]
	 */
	public static function get_shipping_rate_taxes( $data ) {
		global $wad_discounted_shipping_amount;
		if ( isset( $wad_discounted_shipping_amount ) && wad_tax_enabled() ) {
			return WC_Tax::calc_shipping_tax( $wad_discounted_shipping_amount, WC_Tax::get_shipping_tax_rates() );
		}

		return $data;
	}

	/**
	 * Apply discounts on order
	 *
	 * @return [type]
	 */
	public function add_order_discount() {
		wad_set_order_discounts();

		global $wad_granted_order_discounts, $wad_settings;
		$wad_granted_order_discounts = (array) $wad_granted_order_discounts;

		if ( ! $wad_granted_order_discounts ) {
			return;
		}

		$display_individual_discounts = get_proper_value( $wad_settings, 'individual-cart-discounts', 1 );

		if ( ! $display_individual_discounts ) {
			$fee = array(
				'id'     => 'wad_order_discount_grouped',
				'name'   => __( 'Reductions on cart', 'wad' ),
				'amount' => (float) - 1 * wad_get_order_discounts_total(),
			);
			wc()->cart->fees_api()->add_fee( $fee );
		} else {
			foreach ( $wad_granted_order_discounts as $key => $discount_data ) {
				$fee = array(
					'id'      => 'wad_order_discount' . $key,
					'name'    => $discount_data['discount_title'],
					'amount'  => (float) - 1 * $discount_data['discount_amount'],
					'taxable' => true,
				);
				wc()->cart->fees_api()->add_fee( $fee );
			}
		}
	}

	/**
	 * Excluding taxes for reductions on order
	 *
	 * @param [type] $taxes comment.
	 * @param [type] $fee comment.
	 * @return array
	 */
	public function exclude_cart_fees_taxes( $taxes, $fee ) {
		global $wad_applied_fees;
		if ( ! $wad_applied_fees ) {
			return $taxes;
		}

		if ( 'wad_order_discount_grouped' === $fee->object->id ) {
			$amount = 0;
			foreach ( $wad_applied_fees as $wad_fee ) {
				if ( true === $wad_fee['taxable'] ) {
					$amount += $wad_fee['amount'];
				}
			}
			$amount = wc_add_number_precision_deep( $amount );
			return WC_Tax::calc_tax( -$amount, WC_Tax::get_rates() );

		} elseif ( array_key_exists( $fee->object->id, $wad_applied_fees ) ) {
			$amount = 0;
			if ( true === $wad_applied_fees[ $fee->object->id ]['taxable'] ) {
				$amount = wc_add_number_precision_deep( $wad_applied_fees[ $fee->object->id ]['amount'] );
			}
			return WC_Tax::calc_tax( -$amount, WC_Tax::get_rates() );
		}
		return $taxes;
	}

	public static function init_free_gifts_process() {

		$is_frontend_request = wad_is_frontend_request();

		if ( ! $is_frontend_request ) {

			return;
		}

		wad_check_free_gifts_in_cart();

		wad_update_discounts_free_gift_limit();

		wad_update_free_gifts_choice_list();

		wad_auto_add_unique_free_gift();

		if ( defined( 'WAD_ADDED_FREE_GIFT_AUTOMATICALLY' ) ) {

			wad_update_free_gifts_choice_list();
		}

		wad_save_free_gift_discounts();
	}

	/**
	 * This function removes all free gifts for not applicable discounts
	 */
	public static function remove_gifts_products_from_cart() {
		global $wad_discounts, $wad_granted_free_gift_discounts, $wad_system_removing_free_gift;

		if ( ! isset( $wad_discounts['free_gift'] ) ) {
			return;
		}
		foreach ( $wad_discounts['free_gift'] as $discount_id => $discount_obj ) {
			$gifts_limit = (int) get_proper_value( $discount_obj->get_settings(), 'nb-gifts-limit', 1 );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				// remove free gift when discount is no longer applicable.
				if ( ! $discount_obj->is_applicable() && isset( $cart_item['wad_free_gift'] ) && $cart_item['wad_free_gift_discount_id'] === $discount_id ) {

					if ( isset( $wad_granted_free_gift_discounts[ $discount_id ] ) ) {

						unset( $wad_granted_free_gift_discounts[ $discount_id ] );
					}

					$wad_system_removing_free_gift = true;

					WC()->cart->remove_cart_item( $cart_item_key );

					$wad_system_removing_free_gift = false;

					$discount_obj->set_remaining_gifts( $gifts_limit );

					continue;
				}
			}
		}
	}

	public static function add_free_gift_item_data( $cart_item_data, $product_id, $variation_id ) {
		global $wad_free_gifts_choice_list, $wad_processing_auto_add_free_gift;
		$wad_free_gifts_choice_list        = (array) $wad_free_gifts_choice_list;
		$wad_processing_auto_add_free_gift = (bool) $wad_processing_auto_add_free_gift;

		if ( ! empty( $variation_id ) ) {

			$product_id = $variation_id;
		}

		// we are tying to add a free gift to the cart at the request of the user, NOT the auto add free gift system.
		if ( isset( $wad_free_gifts_choice_list[ $product_id ] ) && ! $wad_processing_auto_add_free_gift ) {

			$discount_to_grant_id = wad_get_discount_to_grant_for_free_gift( $product_id );

			// return cart item data unmodified if unable to find a discount to grant to the free gift.
			if ( ! $discount_to_grant_id ) {

				return $cart_item_data;
			}

			$cart_item_data['wad_free_gift'] = true;

			$cart_item_data['wad_free_gift_discount_id'] = $discount_to_grant_id;

		}

		return $cart_item_data;
	}

	public static function add_free_gift_to_cart_with_adjusted_quantity( $cart_item ) {
		global $wad_granted_free_gift_discounts, $wad_processing_auto_add_free_gift;
		$wad_granted_free_gift_discounts   = (array) $wad_granted_free_gift_discounts;
		$wad_processing_auto_add_free_gift = (bool) $wad_processing_auto_add_free_gift;

		// return the cart item as is if we are not adding a free gift or we are adding a unique free gift because it already contains the right quantity and free gift related metas.
		if ( ! isset( $cart_item['wad_free_gift'] ) || $wad_processing_auto_add_free_gift ) {

			return $cart_item;
		}

		$discount_to_grant_id     = $cart_item['wad_free_gift_discount_id'];
		$discount_to_grant_obj    = $wad_granted_free_gift_discounts[ $discount_to_grant_id ];
		$discount_remaining_gifts = $discount_to_grant_obj->get_remaining_gifts();

		$quantity = $cart_item['quantity'];

		// we are tying to add more gift quantity than the granted discount is allowed.
		if ( $discount_remaining_gifts < $quantity ) {

			// adjust the free gift quantity to match the remaining gifts for the granted discount.
			$cart_item['quantity'] = $discount_to_grant_obj->get_remaining_gifts();

			$discount_to_grant_obj->set_remaining_gifts( 0 );

		} else {

			$discount_to_grant_obj->set_remaining_gifts( $discount_remaining_gifts - $quantity );
		}

		return $cart_item;
	}

	public static function adjust_free_gift_quantity( $cart_item_key, $new_qty, $old_qty, $cart ) {
		$cart_item = $cart->get_cart_item( $cart_item_key );

		// we are not updating the quantity of a free gift.
		if ( ! isset( $cart_item['wad_free_gift'] ) ) {

			return;
		}

		global $wad_granted_free_gift_discounts;
		$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

		$discount_to_grant_id     = $cart_item['wad_free_gift_discount_id'];
		$discount_to_grant_obj    = $wad_granted_free_gift_discounts[ $discount_to_grant_id ];
		$discount_remaining_gifts = $discount_to_grant_obj->get_remaining_gifts();

		if ( $new_qty <= $old_qty ) {

			$number_of_items_to_withdraw = $old_qty - $new_qty;

			// adjust the remaining gifts of its granted discount accordingly
			$discount_to_grant_obj->set_remaining_gifts( $discount_remaining_gifts + $number_of_items_to_withdraw );

			return;
		}

		$number_of_items_to_add = $new_qty - $old_qty;

		// adjust the quantity to add the remaining gifts to the quantity
		if ( $discount_remaining_gifts < $number_of_items_to_add ) {

			$cart_contents = $cart->get_cart_contents();

			$cart_contents[ $cart_item_key ]['quantity'] = $old_qty + $discount_remaining_gifts;

			$cart->set_cart_contents( $cart_contents );

			$discount_to_grant_obj->set_remaining_gifts( 0 );
		} else {

			$discount_to_grant_obj->set_remaining_gifts( $discount_remaining_gifts - $number_of_items_to_add );
		}
	}

	public static function show_free_gift_label( $label_name, $cart_item ) {

		if ( isset( $cart_item['wad_free_gift'] ) ) {

			global $wad_granted_free_gift_discounts;
			$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

			$granted_discount_id = $cart_item['wad_free_gift_discount_id'];

			$granted_discount_obj = $wad_granted_free_gift_discounts[ $granted_discount_id ];

			$gift_label = $granted_discount_obj->get_settings( 'gift-label' );

			if ( ! $gift_label ) {

				$gift_label = 'Free Gift';
			}

			$label_name .= '<br>' . $gift_label;
		}

		return $label_name;
	}

	public static function ajax_added_to_cart() {

		$current_url = wp_get_referer();

		if ( $current_url === wc_get_checkout_url() ) {

			wc_setcookie( 'wad_refresh_checkout', 'true', 0, false, false );
		}
	}

	public static function disable_free_gift_auto_add( $cart_item_key, $cart ) {
		$cart_item = $cart->get_cart()[ $cart_item_key ];

		global $wad_system_removing_free_gift;
		$wad_system_removing_free_gift = (bool) $wad_system_removing_free_gift;

		// the user is removing a free gift item
		if ( isset( $cart_item['wad_free_gift'] ) && ! $wad_system_removing_free_gift ) {

			// disable adding automatically free gifts for the current session
			wc_setcookie( 'wad_disable_auto_add', 'true', 0, false, true );
		}
	}


	public static function query_free_gifts_with_variations( $query_args ) {
		global $wad_free_gifts_displaying;
		$wad_free_gifts_displaying = (bool) $wad_free_gifts_displaying;

		if ( $wad_free_gifts_displaying ) {

			$query_args['post_type'] = array( 'product', 'product_variation' );
		}

		return $query_args;
	}

	public static function add_free_gift_meta_to_order_item( $order_item ) {

		if ( isset( $order_item->legacy_values['wad_free_gift'] ) ) {

			$order_item->add_meta_data( 'wad_free_gift', true, true );
		}
	}

	public static function add_discounted_variation_price_to_cache( $cached_prices ) {

		foreach ( $cached_prices['price'] as $variation_id => $variation_price ) {

			$variation = wc_get_product( $variation_id );

			$cached_prices['price'][ $variation_id ] = self::get_sale_price( $variation_price, $variation );
		}

		return $cached_prices;
	}

	/**
	 * This function sets free gift price in the cart
	 *
	 * @param [object] $cart comment.
	 */
	public static function set_free_gift_price_in_cart( $cart ) {

		foreach ( $cart->get_cart() as $cart_item ) {
			if ( isset( $cart_item['wad_free_gift'] ) ) {

				$cart_item['data']->set_price( 0 );
				$cart_item['data']->wad_free_gift = true;

			}
		}
	}

	/**
	 * Sets free gift price in the cart(useful for the minicart)
	 *
	 * @param [object] $item_data comment.
	 * @param [object] $cart_item comment.
	 */
	public static function update_cart_widget( $item_data, $cart_item ) {
		if ( isset( $cart_item['wad_free_gift'] ) ) {
			$item_data->set_price( 0 );
		}
		return $item_data;
	}

	/**
	 * Calculates cart totals(useful for the minicart)
	 */
	public static function calculate_cart_totals() {

		WC()->cart->calculate_totals();

	}

	public static function add_order_discounts_meta( $order_id ) {
		global $wad_granted_order_discounts;
		$wad_granted_order_discounts = (array) $wad_granted_order_discounts;

		if ( ! empty( $wad_granted_order_discounts ) ) {

			update_post_meta( $order_id, 'wad_order_discounts', $wad_granted_order_discounts );
		}
	}

	public static function set_coupons_status_cookie() {

		if ( wc_coupons_enabled() ) {

			wc_setcookie( 'wad_coupons_status', 'enabled', 0, false, false );
		} else {

			wc_setcookie( 'wad_coupons_status', 'disabled', 0, false, false );
		}
	}
}
