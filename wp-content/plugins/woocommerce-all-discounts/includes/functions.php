<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Redirect to the documentation of the plugin.
 *
 * @return void
 */
function wad_redirect_to_user_manual() {
	wp_redirect( 'https://discountsuiteforwp.com/tutorials/how-to-write-your-first-discount/?utm_source=WAD%20free&utm_medium=user%20manual%20submenu&utm_campaign=wordpress.org' );
	exit();
}

/**
 * Redirect to the ticket support for send a issue.
 *
 * @return void
 */
function wad_redirect_to_support() {
	wp_redirect( 'https://discountsuiteforwp.com/contact-us/?utm_source=WAD%20free&utm_medium=get%support%20submenu&utm_campaign=wordpress.org' );
	exit();
}

/**
 * Callback to get the ordered products related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_order_products( $var ) {
	return $var['condition'] == 'order-products';
}

/**
 * Callback to get the order items count related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_order_item_count( $var ) {
	return $var['condition'] == 'order-item-count';
}

function wad_filter_different_order_item_count( $var ) {
	return $var['condition'] == 'different-order-item-count';
}

/**
 * Callback to get the previously ordered products count rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_previously_ordered_products_count( $var ) {
	return $var['condition'] == 'previously-ordered-products-count';
}

/**
 * Callback to get the previously ordered products in list related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_previously_ordered_products_in_list( $var ) {
	return $var['condition'] == 'previously-ordered-products-in-list';
}

/**
 * Callback to get the previous orders count related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_previous_order_count( $var ) {
	return $var['condition'] == 'previous-order-count';
}

/**
 * Callback to get the total spent on shop related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_total_spent_on_shop( $var ) {
	return $var['condition'] == 'total-spent-on-shop';
}

/**
 * Callback to get the order subtotal related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_order_subtotal( $var ) {
	return $var['condition'] == 'order-subtotal';
}

/**
 * Callback to get the products reviews related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_product_review( $var ) {
	return ( ( $var['condition'] == 'customer-reviewed-product' ) || ( $var['condition'] == 'customer-reviewed-product-only' ) );
}

/**
 * Callback to get the single product reviews related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_product_review_only( $var ) {
	return ( ( $var['condition'] == 'customer-reviewed-product-only' ) );
}

/**
 * Callback to get the products shares related rules in a rules group
 *
 * @param array $var
 * @return type
 */
function wad_filter_product_shares( $var ) {
	return ( ( $var['condition'] == 'customer-share-product' ) );
}

/**
 * Checks if the current page is the checkout page
 *
 * @return boolean
 */
function wad_is_checkout() {
	$is_checkout = false;
	if ( ! is_admin() && function_exists( 'is_checkout' ) && is_checkout() ) {
		$is_checkout = true;
	}

	return $is_checkout;
}

/**
 * Returns the products targeted by a discount rule for an order
 *
 * @param array $rule Rule to evaluate
 * @param int   $product_id Product ID to check the rule only against if needed
 * @return array
 */
function wad_get_order_products_in_list( $rule, $product_id = false ) {

	$order_items_counts_by_products = wad_get_cart_products_count( true, $product_id );
	$list_products_ids              = $rule['order-product']['list'];
	if ( is_a( $list_products_ids, 'WAD_Products_List' ) ) {
		$list_products_ids = $list_products_ids->get_products();
	}

	if ( ! is_array( $list_products_ids ) ) {
		$list_products_ids = array();
	}

	if ( $rule['order-product']['operator'] == 'IN' ) {
		$to_count = array_intersect_key( $order_items_counts_by_products, array_flip( $list_products_ids ) );
	} else {
		$to_count = array_diff_key( $order_items_counts_by_products, array_flip( $list_products_ids ) );
	}

	return $to_count;
}

/**
 * Returns the logged user role
 *
 * @global object $wpdb
 * @return string
 */
function wad_get_user_role() {
	if ( ! is_user_logged_in() ) {
		return 'not-logged-in';
	}
	$uid = get_current_user_id();
	global $wpdb;
	$role = $wpdb->get_var( "SELECT meta_value FROM {$wpdb->usermeta} WHERE meta_key = '{$wpdb->prefix}capabilities' AND user_id = {$uid}" );
	if ( ! $role ) {
		return 'non-user';
	}
	$rarr  = unserialize( $role );
	$roles = is_array( $rarr ) ? array_keys( $rarr ) : array( 'non-user' );
	return $roles;// $roles[0];
}


/**
 * Returns the number of products in the cart grouped by product or not
 *
 * @global type $woocommerce
 * @param bool $by_products whether or not the return the result by product or the sum of the quantities in the cart
 * @param bool $product_id Product ID to limit the search to
 * @return int|array
 */
function wad_get_cart_products_count( $by_products = false, $product_id = false ) {
	global $woocommerce;
	$count = array();
		foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item_data ) {
			if ( ( $product_id && $cart_item_data['variation_id'] != $product_id && $cart_item_data['product_id'] != $product_id ) || isset( $cart_item_data['wad_free_gift'] ) ) {
				continue;
			}
			// We add the variations too in case the customer is checking against a variation
			if ( isset( $cart_item_data['variation_id'] ) && ! empty( $cart_item_data['variation_id'] ) ) {
				if ( ! isset( $count[ $cart_item_data['variation_id'] ] ) ) {
					$count[ $cart_item_data['variation_id'] ] = 0;
				}
				$count[ $cart_item_data['variation_id'] ] += $cart_item_data['quantity'];
			} else {
				if ( ! isset( $count[ $cart_item_data['product_id'] ] ) ) {
					$count[ $cart_item_data['product_id'] ] = 0;
				}
				$count[ $cart_item_data['product_id'] ] += $cart_item_data['quantity'];
			}
		}

	if ( $by_products ) {
		return $count;
	} else {
		return array_sum( $count );
	}
}

function wad_get_mailchimp_lists() {
	global $wad_settings;
	$api_key_mc = get_proper_value( $wad_settings, 'mailchimp-api-key', false );
	if ( ! ( $api_key_mc ) ) {
		return array();
	}
	$MailChimp = new \Drewm\MailChimp( $api_key_mc );
	if ( isset( $MailChimp ) ) {
		$results_list = $MailChimp->call( 'lists/list' );
		if ( ! is_array( $results_list ) ) {
			return array();
		}
		if ( ! in_array( 'Invalid_ApiKey', $results_list ) ) {
			$global_DATA = $results_list['data'];
			if ( isset( $global_DATA ) and ! empty( $global_DATA ) ) {
				foreach ( $global_DATA as $content ) {
					$content_id[]   = $content['id'];
					$content_name[] = $content['name'];
				}
				return array_combine( $content_id, $content_name );
			}
		}
	}
}

function wad_get_sendinblue_lists() {
	global $wad_settings;
	$api_key_sb = get_proper_value( $wad_settings, 'sendinblue-api-key', false );
	if ( ! ( $api_key_sb ) ) {
		return array();
	}
	$content_id   = array();
	$content_name = array();
	$api_url      = 'https://api.sendinblue.com/v3/contacts/lists/';
	$all_sb_lists = get_object_vars( wad_call_rest_api( $api_url, $api_key_sb ) );
	if ( isset( $all_sb_lists['lists'] ) && is_array( $all_sb_lists['lists'] ) ) {
		foreach ( $all_sb_lists['lists'] as $content_list ) {
			if ( is_object( $content_list ) ) {
				$content_id[]   = $content_list->id;
				$content_name[] = $content_list->name;
			}
		}
		return array_combine( $content_id, $content_name );
	}
	return array();
}

function wad_is_user_following_affiliation_link( $affiliate_ID_to_check ) {
	if ( class_exists( 'Affiliate_WP_Tracking' ) ) {
		$DATA_visite_url = new Affiliate_WP_Tracking();
	}
	if ( isset( $DATA_visite_url ) and ! empty( $DATA_visite_url ) ) {
		$affiliate_id_current_url = $DATA_visite_url->get_affiliate_id();
	}

	switch ( $affiliate_ID_to_check ) {

		case '*':
			if ( isset( $affiliate_id_current_url ) and ! empty( $affiliate_id_current_url ) ) {
				return true;
			} else {
				return false;
			}
			break;

		default:
			$affiliate_id_current_url_to_int = intval( $affiliate_id_current_url );
			$affiliate_ID_to_check_to_int    = intval( $affiliate_ID_to_check );
			if ( $affiliate_id_current_url_to_int == $affiliate_ID_to_check_to_int ) {
				return true;
			} else {
				return false;
			}
			break;
	}
}

/**
 * Check if the logged in user is subscribed to a specific mailchimp list
 *
 * @global type $mailchimp_user_lists
 * @param type $list_to_check Mailchimp list
 * @return boolean
 */
function wad_is_user_subscribed_to_mailchimp( $list_to_check ) {
	global $mailchimp_user_lists;

	if ( isset( $mailchimp_user_lists ) and ! empty( $mailchimp_user_lists ) ) {
		return in_array( $list_to_check, $mailchimp_user_lists );
	} else {
		return false;
	}
}

/**
 * Check if the logged in user is subscribed to a specific sendinblue list
 *
 * @global type $sendinblue_user_lists
 * @param type $list_to_check Sendinblue list
 * @return boolean
 */
function wad_is_user_subscribed_to_sendinblue( $list_to_check ) {
	$current_user          = wp_get_current_user();
	$email                 = $current_user->user_email;
	$sendinblue_user_lists = wad_get_sendinblue_user_lists( $email );

	if ( isset( $sendinblue_user_lists ) && ! empty( $sendinblue_user_lists ) ) {
		return in_array( $list_to_check, $sendinblue_user_lists );
	} else {
		return false;
	}
}

/**
 * Returns the list of user roles in the current installation
 *
 * @global type $wp_roles
 * @return array
 */
function wad_get_existing_user_roles() {
	global $wp_roles;
	$roles_arr                  = array();
	$all_roles                  = $wp_roles->roles;
	$roles_arr['not-logged-in'] = __( 'Not logged in', 'wad' );
	foreach ( $all_roles as $role_key => $role_data ) {
		$roles_arr[ $role_key ] = $role_data['name'];
	}
	return $roles_arr;
}

/**
 * Returns the list of states in woocommerce
 *
 * @return array
 */
function wad_get_all_states() {
		$states = array();
	foreach ( WC()->countries->states as $country_code => $country_states ) {
		if ( ! empty( $country_states ) ) {
			foreach ( $country_states as $state_code => $country_state ) {
				$states[ "$country_code|$state_code" ] = $country_state;
			}
		}
	}
		asort( $states );
		return $states;
}

/**
 * Returns the list of shipping methods
 *
 * @return array
 */
function wad_get_all_shipping_methods() {
	$wc_shipping = WC_Shipping::instance();
	$methods     = array();
	foreach ( $wc_shipping->get_shipping_methods() as $method_id => $method ) {
		$methods[ $method_id ] = $method->method_title;
	}
	asort( $methods );
	return $methods;
}

/**
 * Returns the list of users in the current installation
 *
 * @return array
 */
function wad_get_existing_users() {
	$users     = get_users( array( 'fields' => array( 'ID', 'display_name', 'user_email' ) ) );
	$users_arr = array();
	foreach ( $users as $user ) {
		$users_arr[ $user->ID ] = "$user->display_name($user->user_email)";
	}

	return $users_arr;
}

/**
 * Returns the list of available payment gateways
 *
 * @return array
 */
function wad_get_available_payment_gateways() {
	$available_gateways_arr = array();
	$available_gateways     = WC()->payment_gateways->get_available_payment_gateways();
	foreach ( $available_gateways as $gateway ) {
		$available_gateways_arr[ $gateway->id ] = $gateway->get_title();
	}
	return $available_gateways_arr;
}

/**
 * Returns the statuses to consider as completed when retrieving the orders
 *
 * @global array $wad_settings
 * @return array
 */
function wad_get_completed_orders_statuses() {
	global $wad_settings;
	$statuses = get_proper_value( $wad_settings, 'completed-order-statuses', array() );
	if ( empty( $wad_settings['completed-order-statuses'] ) ) {
		$statuses = array( 'wc-processing', 'wc-completed', 'wc-on-hold' );
	}
	return $statuses;
}

/**
 * Returns the logged in customer orders
 *
 * @return array
 */
function wad_get_customer_orders() {
	if ( ! is_user_logged_in() ) {
		return array();
	}
	$current_user = wp_get_current_user();
	$args         = array(
		'post_type'   => 'shop_order',
		'post_status' => wad_get_completed_orders_statuses(),
		'meta_key'    => '_customer_user',
		'meta_value'  => $current_user->ID,
		'nopaging'    => true,
	);
	$orders       = get_posts( $args );
	return $orders;
}

/**
 * Returns the list of products currently in the cart
 *
 * @global type $woocommerce
 * @return array
 */
function wad_get_cart_products() {

	$product_ids = array();

	foreach ( WC()->cart->get_cart() as $cart_item ) {

		if ( isset( $cart_item['wad_free_gift'] ) ) {

			continue;
		}

		$product_ids[] = $cart_item['product_id'];
		// We add the variations too in case the customer is checking against a variation
		if ( isset( $cart_item['variation_id'] ) && ! empty( $cart_item['variation_id'] ) ) {
			$product_ids[] = $cart_item['variation_id'];
		}
	}

	return $product_ids;

}

/**
 * Checks if an email is subscribed to the Newsletter plugin
 *
 * @global type $newsletter
 * @param string $email
 * @return boolean
 */
function wad_is_user_subscribed_to_newsletterplugin( $email ) {
	global $newsletter;
	if ( function_exists( 'newsletter_form' ) ) {
		$user = $newsletter->get_user( $email );
		if ( $user && $user->status == 'C' ) {
			return true;
		}
	}
	return false;
}

/**
 * Returns the corresponding order status to query for a given order status name.
 *
 * @param string $status The order status name.
 *
 * @return string
 */
function wad_map_order_status_to_status_to_query( $status ) {

	switch ( $status ) {

		case 'wc-pending':
			return 'pending';

		case 'wc-processing':
			return 'processing';

		case 'wc-on-hold':
			return 'on-hold';

		case 'wc-completed':
			return 'completed';

		case 'wc-cancelled':
			return 'refunded';

		case 'wc-refunded':
			return 'failed';

		case 'wc-failed':
			return 'cancelled';

		default:
			return 'completed';
	}
}

/**
 * Returns the ids of the customer's orders considered completed.
 *
 * @param array $statuses_to_query The statuses of the orders considered completed.
 *
 * @return array
 */
function wad_get_completed_orders( $statuses_to_query ) {

	$completed_orders = array();

	$args = array(
		'status'      => $statuses_to_query,
		'type'        => 'shop_order',
		'return'      => 'ids',
		'customer_id' => get_current_user_id(),
	);

	return wc_get_orders( $args );
}

/**
 * Returns the total number of products bought given a list of orders.
 *
 * @param array $completed_orders The ids of the orders to count the products in.
 *
 * @return int
 */
function wad_get_orders_products_count( $completed_orders ) {

	$count = 0;

	foreach ( $completed_orders as $order_id ) {

		$order = wc_get_order( $order_id );

		$order_data = $order->get_data();

		foreach ( $order_data['line_items'] as $order_item ) {

			$is_free_gift = $order_item->get_meta( 'wad_free_gift' );

			// the current order item is not a free gift
			if ( ! $is_free_gift ) {

				$count++;
			}
		}
	}

	return $count;
}

/**
 * Returns the total number of products bought by the customer in the store.
 *
 * @return int
 */
function wad_get_customer_previous_orders_products_count() {

	$completed_orders_statuses = wad_get_completed_orders_statuses();

	$statuses_to_query = array_map( 'wad_map_order_status_to_status_to_query', $completed_orders_statuses );

	// in case something went wrong during the mapping of order status to status to query and more than
	// one completed status is returned to query
	$statuses_to_query = array_unique( $statuses_to_query );

	$completed_orders = wad_get_completed_orders( $statuses_to_query );

	return wad_get_orders_products_count( $completed_orders );
}

/**
 * Returns the products bought by the customer in the shop that can be found in a given list of
 * products and a given list of orders.
 *
 * @param array $list The ids of the products to check the products bought against.
 * @param array $orders The ids of the orders to look the products bought into.
 *
 * @return array
 */
function wad_get_products_previously_ordered_in_list( $list, $orders ) {

	$products_bought_from_list = array();

	foreach ( $orders as $order_id ) {

		$order = wc_get_order( $order_id );

		$order_data = $order->get_data();

		foreach ( $order_data['line_items'] as $order_item ) {

			$is_free_gift = $order_item->get_meta( 'wad_free_gift' );

			if ( $is_free_gift ) {

				continue;
			}

			$product = $order_item->get_product();

			$product_id = $product->get_id();

			// the ordered product is in the list
			if ( in_array( $product_id, $list ) ) {

				if ( ! isset( $products_bought_from_list[ $product_id ] ) ) {

					$products_bought_from_list[ $product_id ] = 1;
				} else {

					$products_bought_from_list[ $product_id ] += 1;
				}
			}
		}
	}

	return $products_bought_from_list;
}

/**
 * Returns the products bought by the customer in the shop that can be found in a given list of products.
 *
 * @param array|WAD_Products_List $list The id of the product list to check the products against. Otherwise the list of products.
 *
 * @return array
 */
function wad_get_customer_previous_orders_products_in_list( $list ) {

	if ( is_array( $list ) ) {
		$list_products_ids = $list;
	} else {
		$list_object       = new WAD_Products_List( $list );
		$list_products_ids = $list_object->get_products( true );
	}

	$completed_orders_statuses = wad_get_completed_orders_statuses();

	$statuses_to_query = array_map( 'wad_map_order_status_to_status_to_query', $completed_orders_statuses );

	// in case something went wrong during the mapping of order status to status to query and more than
	// one completed status is returned to query
	$statuses_to_query = array_unique( $statuses_to_query );

	$completed_orders = wad_get_completed_orders( $statuses_to_query );

	$products_bought_from_list = wad_get_products_previously_ordered_in_list( $list_products_ids, $completed_orders );

	return count( $products_bought_from_list );
}

/**
 * Returns the groups created by the groups plugin
 *
 * @global type $wpdb
 * @return array
 */
function wad_get_available_groups() {
	global $wpdb;
	if ( ! function_exists( '_groups_get_tablename' ) ) {
		return array();
	}
	$group_table = _groups_get_tablename( 'group' );
	$query       = "SELECT distinct group_id, name FROM $group_table ORDER BY group_id asc";

	$results = $wpdb->get_results( $query );
	$groups  = array();
	foreach ( $results as $result ) {
		$groups[ $result->group_id ] = $result->name;
	}
	return $groups;
}

function wad_get_all_discounts() {
	global $wpdb;
	$sql     = "select ID, post_title from $wpdb->posts where post_type='o-discount' and post_status='publish'";
	$results = $wpdb->get_results( $sql );
	return $results;
}

/**
 * Returns the list of active discounts
 *
 * @global object $wpdb
 * @param bool $group_by_types to group the list by discount types (order | product) or not
 * @return array
 */
function wad_get_active_discounts( $group_by_types = false ) {
	global $wpdb;

	if ( $group_by_types ) {
		$valid_discounts = array(
			'product'  => array(),
			'order'    => array(),
			'shipping' => array(),
			'free_gift' => array(),
		);
	} else {
		$valid_discounts = array();
	}



	$date_format            = 'Y-m-d H:i';
	$raw_today              = current_time( $date_format, false );
	$today                  = date( $date_format, strtotime( $raw_today ) );
	$product_based_actions  = wad_get_product_based_actions();
	$shipping_based_actions = wad_get_shipping_based_actions();
	$free_gift_based_actions = wad_get_free_gift_based_actions();

	$all_discounts = wad_get_all_discounts();
	foreach ( $all_discounts as $discount ) {
		$metas = get_post_meta( $discount->ID, 'o-discount', true ) ? get_post_meta( $discount->ID, 'o-discount', true ) : array();
		if ( ! isset( $metas['start-date'] ) ) {
			$metas['start-date'] = '';
		}
		if ( ! isset( $metas['end-date'] ) ) {
			$metas['end-date'] = '';
		}
		if ( ! isset( $metas['period'] ) ) {
			$metas['period'] = '';
		}
		if ( ! isset( $metas['period-type'] ) ) {
			$metas['period-type'] = 'd';
		}

		// We make sure empty dates are marked as active
		if ( empty( $metas['start-date'] ) ) {
			$start_date = $today;
		} else {
			$start_date = date( $date_format, strtotime( $metas['start-date'] ) );
		}

		if ( empty( $metas['end-date'] ) ) {
			$end_date = $today;
		} else {
			$end_date = date( $date_format, strtotime( $metas['end-date'] ) );
		}

		// We check the limit if needed
		$limit = get_proper_value( $metas, 'users-limit' );
		if ( $limit ) {
			// How many times has this discount been used?
			$sql     = "SELECT count(*) FROM $wpdb->postmeta where meta_key='wad_used_discount' and meta_value=$discount->ID";
			$nb_used = $wpdb->get_var( $sql );
			if ( $nb_used >= $limit ) {
				continue;
			}
		}
		if (
					( ( $today >= $start_date ) && ( $today <= $end_date ) ) ||
					wad_is_discount_in_valid_period( $metas['start-date'], $metas['end-date'], $metas['period'], $metas['period-type'] )
			) {
			if ( $group_by_types ) {
				if ( in_array( $metas['action'], $product_based_actions ) ) {
					array_push( $valid_discounts['product'], $discount->ID );
				} elseif ( in_array( $metas['action'], $shipping_based_actions ) ) {
						array_push( $valid_discounts['shipping'], $discount->ID );
				} elseif ( in_array( $metas['action'], $free_gift_based_actions ) ) {
					array_push( $valid_discounts['free_gift'], $discount->ID );
				} else {
					array_push( $valid_discounts['order'], $discount->ID );
				}
			} else {
				array_push( $valid_discounts, $discount->ID );
			}
		}
	}
	return $valid_discounts;
}

/**
 * Checks if a discount is in the validity period
 *
 * @param string $start Start date
 * @param string $end End date
 * @param int    $period
 * @param string $period_type
 * @return boolean
 */
function wad_is_discount_in_valid_period( $start, $end, $period, $period_type ) {
	if ( empty( $period ) ) {
		return false;
	}

	$begin_date = new DateTime( $start );
	$end_date   = new DateTime( $end );

	$today = new DateTime();
	// We make sure the today does not includes the time otherwise it may interfere with the comparison
	$today->setTime( 0, 0, 0 );

	$nb_elapsed = $today->diff( $begin_date );

	$nb_days_elapsed = $nb_elapsed->format( "%$period_type" );

	$nb_periods_elapsed = intval( $nb_days_elapsed / $period );

	if ( $period_type == 'd' ) {
		$period_type_str = 'day';
	} elseif ( $period_type == 'm' ) {
		$period_type_str = 'month';
	} elseif ( $period_type == 'y' ) {
		$period_type_str = 'year';
	}

	$last_period_begin_date = $begin_date->modify( '+' . ( $nb_periods_elapsed * $period ) . " $period_type_str" );
	$last_period_end_date   = $end_date->modify( '+' . ( $nb_periods_elapsed * $period ) . " $period_type_str" );

	return ( ( $today >= $last_period_begin_date ) && ( $today <= $last_period_end_date ) );
}

/**
 * Returns the groups the current user belongs to (groups created by the groups plugin)
 *
 * @global object $wpdb
 * @return array
 */
function wad_get_user_groups() {
	global $wpdb;
	global $wad_user_groups;
	if ( $wad_user_groups !== false ) {
		return $wad_user_groups;
	}
	if ( ! function_exists( '_groups_get_tablename' ) || ! is_user_logged_in() ) {
		return array();
	}
	$user_id          = get_current_user_id();
	$user_group_table = _groups_get_tablename( 'user_group' );
	$query            = "SELECT distinct group_id FROM $user_group_table where user_id=$user_id ORDER BY group_id asc";

	$results    = $wpdb->get_results( $query );
	$groups     = array_map(
		function( $o ) {
			return $o->group_id;
		},
		$results
	);


	$wad_user_groups = $groups;
	return $groups;
}

/**
 * Returns the reviews on a product by a customer
 *
 * @param array $products_to_check_against Products IDs to check against
 * @param int   $review_author Review author ID
 * @return boolean
 */
function wad_check_if_customer_reviewed_any_of_these_products( $products_to_check_against, $review_author ) {
	$wad_reviewed_products_by_customer = wad_get_reviewed_products_by_customer( $review_author );
	$intersection                      = array_intersect( $products_to_check_against, $wad_reviewed_products_by_customer );
	return ( ! empty( $intersection ) );
}

/**
 * Returns the IDs of the products reviewed by the customer
 *
 * @param int $review_author
 * @return array
 */
function wad_get_reviewed_products_by_customer( $review_author ) {
	global $wad_reviewed_products_by_customer;
	if ( $wad_reviewed_products_by_customer !== false ) {
		return $wad_reviewed_products_by_customer;
	}
	$args                              = array(
		// 'comment_post_ID' => $product_id,
			'author__in' => array( $review_author ),
		'post_status'    => 'publish',
		'post_type'      => 'product',
	);
	$commented_products                = get_comments( $args );
	$reviewed_products_ids 			   = array_map(
		function( $o ) {
			return $o->comment_post_ID;
		},
		$commented_products
	);
	$wad_reviewed_products_by_customer = $reviewed_products_ids;
	return $reviewed_products_ids;
}

/**
 * Returns the WP affiliates lists
 *
 * @return array
 */
function wad_get_affiliate_lists() {

	if ( class_exists( 'AffWP_Affiliates_Table' ) ) {
		$affiliates_table = new AffWP_Affiliates_Table();
	}

	if ( isset( $affiliates_table ) and ! empty( $affiliates_table ) ) {
		$list_all_affiliate_id   = array();
		$list_all_affiliate_name = array();
		$DATA_all_affiliate      = json_decode( json_encode( $affiliates_table->affiliate_data() ), true );

		foreach ( $DATA_all_affiliate as $to_affiliate_data ) {
			$list_all_affiliate_id[]   = $to_affiliate_data['affiliate_id'];
			$all_users                 = json_decode( json_encode( get_userdata( $to_affiliate_data['user_id'] ) ), true );
			$DATA_user                 = get_proper_value( $all_users, 'data', false );
			$list_all_affiliate_name[] = get_proper_value( $DATA_user, 'display_name', false );
		}
		array_push( $list_all_affiliate_id, '*' );
		array_push( $list_all_affiliate_name, 'ANY' );

		return array_combine( $list_all_affiliate_id, $list_all_affiliate_name );
	}
}

/**
 * Returns the list of products based actions
 *
 * @return array
 */
function wad_get_product_based_actions() {
	return array( 'percentage-off-pprice', 'fixed-amount-off-pprice', 'fixed-pprice', 'percentage-off-cprice', 'fixed-amount-off-cprice', 'percentage-off-lsubtotal', 'fixed-amount-off-lsubtotal' );
}

/**
 * Returns the list of cheapest products based actions
 *
 * @return array
 */
function wad_get_cheapest_product_based_actions() {
	 return array( 'percentage-off-cprice', 'fixed-amount-off-cprice' );
}

/**
 * Returns the list of smaller products subtotal based actions
 *
 * @return array
 */
function wad_get_smaller_item_subtotal_based_actions() {
	return array( 'percentage-off-lsubtotal', 'fixed-amount-off-lsubtotal' );
}

/**
 * Returns the list of shipping based actions
 *
 * @return array
 */
function wad_get_shipping_based_actions() {
	return array( 'percentage-off-shipping-fee', 'fixed-amount-off-shipping-fee', 'fixed-shipping-fee', 'fixed-shipping-fee-inc-taxes' );
}

function wad_get_free_gift_based_actions() {

	return array( 'free-gift' );
}

/**
 * Returns an array containing the types of dicount that imply the number of cheapest products option
 *
 * @return array
 */
function wad_get_nb_cheapest_products_based_actions() {
	 return array( 'percentage-off-cprice', 'fixed-amount-off-cprice', 'percentage-off-lsubtotal', 'fixed-amount-off-lsubtotal' );
}

/**
 * Returns the new unit price for free gifts in quantity based discounts
 *
 * @param float $original_price Normal product price
 * @param int   $purchased_quantity Purchased quantity
 * @param int   $quantity_to_give Quantity to give for free
 * @return float
 */
function wad_get_product_free_gift_price( $original_price, $purchased_quantity, $quantity_to_give ) {
	if ( $purchased_quantity == 0 ) {
		return $original_price;
	}
	$estimated_subtotal           = $purchased_quantity * $original_price;
	$estimated_subtotal_with_gift = $estimated_subtotal - ( $original_price * $quantity_to_give );
	$normal_price                 = $estimated_subtotal_with_gift / $purchased_quantity;

	return $normal_price;
}

function wad_evaluate_conditions( $condition, $operator, $value ) {
	switch ( $operator ) {
		case '<':
			return $condition < $value;
			break;
		case '>':
			return $condition > $value;
			break;
		case '==':
			return $condition == $value;
			break;
		case '>=':
			return $condition >= $value;
			break;
		case '<=':
			return $condition <= $value;
			break;
		default:
			return false;
			break;
	};
}

/**
 * Whether the installed version of woocommerce is supported by WAD
 *
 * @return bool
 */
function wad_is_supported_woocommerce_version() {

	return version_compare( WC()->version, '3.0.0', '>=' );
}

/**
 * Get the sale price of a product that may have a cheapest price/subtotal discount to be applied.
 *
 * @param int          $product_id The id of the product
 * @param float        $sale_price The sale price of the product without discount applied
 * @param WAD_Discount $discount The discount object of the discount that may be applied to the product
 *
 * @return int
 */
function wad_get_sale_price_for_product_in_cheapest_product_based_actions( $product_id, $sale_price, $discount ) {

	$cheapest_products              = $discount->get_cheapest_products();
	$cheapest_products_quantity = $discount->get_cheapest_product_quantities();

	if ( ! wad_is_product_in_cheapest_list( $product_id, $cheapest_products ) ) {

		return $sale_price;
	}

	$items_quantity_discounted = 0;

	if ( ! array_key_exists( $product_id, $cheapest_products_quantity ) ) {

		return $sale_price;
	}

	$discount_action = $discount->get_settings( 'action' );

	$product_quantity = $cheapest_products_quantity[ $product_id ];

	if ( $discount->is_discount_on_all_whole_quantity() ) {

		$items_quantity_discounted = $product_quantity;
	} else {

		$items_quantity_discounted = $discount->get_items_quantity_discounted( $product_quantity );
	}

	$sale_price = wad_get_product_sale_price_with_nb_cheapest_products_based_actions( $sale_price, $product_quantity, $items_quantity_discounted, $discount );

	return $sale_price;
}

/**
 * Whether a product is in the cheapest list
 *
 * @param int   $product_id The id of the product to check
 * @param array $cheapest_products The list of cheapest products in the cart for the current discount
 *
 * @return bool
 */
function wad_is_product_in_cheapest_list( $product_id, $cheapest_products ) {

	return in_array( $product_id, $cheapest_products );
}

/**
 * Get the sale price of a product which has a cheapest price/subtotal discount applied.
 *
 * @param float        $sale_price The sale price of the product without discount
 * @param int          $product_quantity The quantity of the product in the cart
 * @param int          $quantity_discounted The number of items that can get the discount for the product
 * @param WAD_Discount $discount The discount object of the discount applied on the product
 *
 * @return int
 */
function wad_get_product_sale_price_with_nb_cheapest_products_based_actions( $sale_price, $product_quantity, $quantity_discounted, $discount ) {

	$product_subtotal = 0;

	$discount_amount = $discount->get_discount_amount( floatval( $sale_price ) );

	if ( $product_quantity <= $quantity_discounted ) {

		$product_subtotal = ( $sale_price - $discount_amount ) * $product_quantity;
	} else {

		$discounted_subtotal     = ( $sale_price - $discount_amount ) * $quantity_discounted;
		$non_discounted_subtotal = $sale_price * ( $product_quantity - $quantity_discounted );

		$product_subtotal = $discounted_subtotal + $non_discounted_subtotal;
	}

	$sale_price = $product_subtotal / $product_quantity;

	return $sale_price;
}

/**
 * Returns the list containing the quantity of each cheapest product
 *
 * @param array $cheapest_products_list The list of the cheapest products we want the quantity of.
 * @param array $products_quantity_list The list containing the quantity of the products in the cart
 *
 * @return array
 */
function wad_get_cheapest_products_quantity( $cheapest_products_list, $products_quantity_list ) {

	$cheapest_products_quantity = array();

	foreach ( $cheapest_products_list as $product_id ) {

		if ( array_key_exists( $product_id, $products_quantity_list ) ) {

			$cheapest_products_quantity[ $product_id ] = $products_quantity_list[ $product_id ];
		}
	}

	return $cheapest_products_quantity;
}

/**
 * Returns the list containing the quantity of each product with a lowest subtotal
 *
 * @param array $lowest_subtotal_products The list of the products with a lowest subtotal we want the quantity of.
 * @param array $products_quantity_list The list containing the quantity of the products in the cart
 *
 * @return array
 */
function wad_get_lowest_subtotal_products_quantity( $lowest_subtotal_products, $products_quantity_list ) {

	$lowest_subtotal_products_quantity = array();

	foreach ( $lowest_subtotal_products as $product_id ) {

		if ( array_key_exists( $product_id, $products_quantity_list ) ) {

			$lowest_subtotal_products_quantity[ $product_id ] = $products_quantity_list[ $product_id ];
		}
	}

	return $lowest_subtotal_products_quantity;
}

/**
 * Saves a product as a discounted product.
 *
 * @param int $product_id The ID of the product to save.
 */
function wad_save_discounted_product( $product_id ) {

	global $wad_discounted_products;

	if ( ! is_array( $wad_discounted_products ) ) {

		$wad_discounted_products = array();
	}

	if ( ! array_key_exists( $product_id, $wad_discounted_products ) ) {

		$wad_discounted_products[ $product_id ] = $product_id;
	}
}

/**
 * Checks whether a product is in the discounted products list.
 *
 * @param int $product_id The ID of the product to check.
 *
 * @return bool
 */
function wad_is_discounted_product( $product_id ) {

	global $wad_discounted_products;

	if ( ! is_array( $wad_discounted_products ) ) {

		$wad_discounted_products = array();
	}

	return in_array( $product_id, $wad_discounted_products, true );
}

function wad_get_gift_count_in_cart( $discount_id ) {
	$items      = WC()->cart->get_cart();
	$gift_count = 0;
	foreach ( $items as $item_key => $values ) {
		if ( isset( $values['wad_free_gift'] ) && $values['wad_free_gift']->id == $discount_id ) {
			$gift_count += 1;
		}
	}
	return $gift_count;
}

function wad_get_cart_item_quantities() {
	global $woocommerce;
	$item_qties = array();
	foreach ( $woocommerce->cart->get_cart() as $cart_item ) {
		if ( isset( $cart_item['wad_free_gift'] ) ) {
			continue;
		}
		if ( ! empty( $cart_item['variation_id'] ) ) {
			$item_qties[ $cart_item['variation_id'] ] = $cart_item['quantity'];
		} else {
			$item_qties[ $cart_item['product_id'] ] = $cart_item['quantity'];
		}
	}
	return $item_qties;
}

/**
 * Returns the appropriate cheapest products needed for the discount.
 *
 * @param array $base_list The list to use as base list for the retrieval.
 * This is a list of products in the cart ordered either by price or subtotal.
 *
 * @param WAD_Discount $discount_obj The object of the discount we want the cheapest products list of.
 *
 * @return array
 */
function wad_get_cheapest_products_active_list( $base_list, $discount_obj ) {

	$cheapest_products_pool = $discount_obj->get_cheapest_product_pool();

	$nb_cheapest_products = get_proper_value( $discount_obj->get_settings(), 'nb-cheapest-products', 1 );

	if ( 'cart' === $cheapest_products_pool ) {

		$cheapest_products_needed = array_slice( $base_list, 0, $nb_cheapest_products );

	} else {

		$product_list_obj = $discount_obj->get_products_list();
		$product_list     = $product_list_obj->get_products();

		$cheapest_products = array_intersect( $base_list, $product_list );

		$cheapest_products_needed = array_slice( $cheapest_products, 0, $nb_cheapest_products );
	}

	return $cheapest_products_needed;
}

function wad_get_taxonomies_query_data() {
	$tax_terms = get_taxonomies( array(), 'objects' );

	$params            = array();
	$values            = array();
	$values_arr        = array();
	$values_arr_by_key = array();

	foreach ( $tax_terms as $tax_key => $tax_obj ) {
		// We ignore everything that has nothing to do with products
		if ( ! in_array( 'product', $tax_obj->object_type ) ) {
				continue;
		}
		$params[ $tax_key ] = $tax_obj->labels->singular_name;
		$terms              = get_terms( $tax_key );
		$terms_select       = '';
		foreach ( $terms as $term ) {
			$terms_select                .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
			$values_arr[ $term->term_id ] = $term->name;
			if ( ! isset( $values_arr_by_key[ $tax_key ] ) ) {
				$values_arr_by_key[ $tax_key ] = array();
			}
			$values_arr_by_key[ $tax_key ][ $term->term_id ] = $term->name;
		}
		if ( $terms_select ) {
			$values[ $tax_key ] = $terms_select;
		} else { // Empty tax element. We remove it from the labels
			unset( $params[ $tax_key ] );
		}
	}

	return array(
		'params'            => $params,
		'values'            => $values,
		'values_arr'        => $values_arr,
		'values_arr_by_key' => $values_arr_by_key,
	);
}

function wad_get_authors() {
	$all_users   = get_users( array( 'has_published_posts' => array( 'product' ) ) );
	$authors_arr = array( '' => 'Any' );
	foreach ( $all_users as $user ) {
		$authors_arr[ $user->ID ] = $user->user_nicename;
	}

	return $authors_arr;
}

function wad_get_all() {
	global $wpdb;

	$lists_arr = array();

	$sql     = "select ID, post_title from $wpdb->posts where post_type='o-list' and post_status='publish'";
	$results = $wpdb->get_results( $sql );

	foreach ( $results as $result_row ) {
		$lists_arr[ $result_row->ID ] = $result_row->post_title;
	}

	return $lists_arr;
}

function wad_get_mailchimp_user_lists( $email ) {
	global $wad_settings;

	$list = array();

	$api_key_mc = get_proper_value( $wad_settings, 'mailchimp-api-key', false );
	if ( isset( $api_key_mc ) && ! empty( $api_key_mc ) ) {
		$mail_chimp = new \Drewm\MailChimp( $api_key_mc );
		$data_mc    = array( 'email' => array( 'email' => $email ) );
		$user_lists = $mail_chimp->call( '/helper/lists-for-email', $data_mc );
		if ( empty( $user_lists ) ) {
			return $list;
		}
		foreach ( $user_lists as $to_list ) {
			if ( isset( $to_list['id'] ) && ! empty( $to_list['id'] ) ) {
				$list[] = $to_list['id'];
			}
		}
	}
	return $list;
}

function wad_get_sendinblue_user_lists( $email ) {
	global $wad_settings;

	$list = array();

	$api_key_sb = get_proper_value( $wad_settings, 'sendinblue-api-key', false );
	if ( ! $api_key_sb ) {
		return $list;
	}
	$api_url    = 'https://api.sendinblue.com/v3/contacts/' . $email;
	$content    = get_object_vars( wad_call_rest_api( $api_url, $api_key_sb ) );
	if ( isset( $content['listIds'] ) ) {
		$list = $content['listIds'];
	}
	return $list;
}

/**
 * Adds the discount used in the global variable.
 *
 * @param string $key the key of the array(discount or quantity based pricing).
 *
 * @param int    $value the id of the discount or product.
 *
 * @return void
 */
function wad_save_applied_discount_globally( $key, $value ) {
	global $wad_applied_discounts;
	if ( ! array_key_exists( $key, $wad_applied_discounts ) || ! in_array( $value, $wad_applied_discounts[ $key ], true ) ) {
		$wad_applied_discounts[ $key ][] = $value;
	}
}

function wad_is_wad_admin_screen() {
	$screen = get_current_screen();
	if ( 'product' === $screen->post_type || 'o-discount' === $screen->post_type || 'o-list' === $screen->post_type ) {
		return true;
	} else {
		return false;
	}
}

function wad_set_order_discounts() {

	global $wad_granted_order_discounts;

	global $wad_discounts;
	global $wad_settings;
	global $wad_applied_fees;

	$wad_granted_order_discounts = array();

	$order_subtotal         = WC()->cart->get_subtotal();
	$order_subtotal_inc_tax = WC()->cart->get_subtotal() + WC()->cart->get_subtotal_tax();

	if (! isset( $wad_discounts['order'] ) ) {
		return;
	}
	foreach ( $wad_discounts['order'] as $discount_id => $discount ) {

		if ( $discount->is_applicable() ) {

			$discount_action = $discount->get_settings( 'action' );
			$discount_amount = $discount->get_settings( 'percentage-or-fixed-amount' );
			$is_unknown_action = false;

			switch ( $discount_action ) {

				case 'percentage-off-osubtotal':
					$wad_granted_order_discounts[ $discount_id ] = array(
						'discount_id'     => $discount->get_id(),
						'discount_title'  => $discount->get_title(),
						'discount_amount' => $order_subtotal * $discount_amount / 100,
					);
					break;

				case 'percentage-off-osubtotal-inc-taxes':
					$inc_shipping_in_taxes = get_proper_value( $wad_settings, 'inc-shipping-in-taxes', 'Yes' );

					if ( 'Yes' === $inc_shipping_in_taxes ) {

						$wad_granted_order_discounts[ $discount_id ] = array(
							'discount_id'     => $discount->get_id(),
							'discount_title'  => $discount->get_title(),
							'discount_amount' => ( $order_subtotal_inc_tax + WC()->cart->get_shipping_total() ) * $discount_amount / 100,
						);

					} else {

						$wad_granted_order_discounts[ $discount_id ] = array(
							'discount_id'     => $discount->get_id(),
							'discount_title'  => $discount->get_title(),
							'discount_amount' => $order_subtotal_inc_tax * $discount_amount / 100,
						);
					}

					break;

				case 'fixed-amount-off-osubtotal':
					$wad_granted_order_discounts[ $discount_id ] = array(
						'discount_id'     => $discount->get_id(),
						'discount_title'  => $discount->get_title(),
						'discount_amount' => $discount_amount,
					);

					break;

				default:
					$is_unknown_action = true;
					break;
			}

			if ( ! $is_unknown_action ) {

				wad_save_applied_discount_globally( 'wad_used_discount', $discount->get_id() );

				$discount_tax = get_proper_value( $discount->get_settings(), 'is-taxable', 'yes' );
				if ( 'yes' === $discount_tax ) {
					$taxable = true;
				} else {
					$taxable = false;
				}

				$wad_applied_fees[ 'wad_order_discount' . $discount->get_id() ]['taxable'] = $taxable;
				$wad_applied_fees[ 'wad_order_discount' . $discount->get_id() ]['amount']  = $wad_granted_order_discounts[ $discount_id ]['discount_amount'];
			}
		}
	}
}

function wad_get_order_discounts_total() {

	global $wad_granted_order_discounts;
	$wad_granted_order_discounts = (array) $wad_granted_order_discounts;

	$order_discounts_reducer = function( $current_total, $discount_data ) {

		$current_total += $discount_data['discount_amount'];

		return $current_total;
	};

	$order_discounts_total = array_reduce( $wad_granted_order_discounts, $order_discounts_reducer, 0 );

	return $order_discounts_total;
}

/**
 * This function returns the list of all discounts types.
 *
 * @return array
 */
function wad_get_all_discounts_type_lists() {

	return array(
		'product'  => __( 'Product Discount', 'wad' ),
		'shipping' => __( 'Shipping Discount', 'wad' ),
		'order'    => __( 'Cart Discount', 'wad' ),
		'qbp'      => __( 'Quantity Based Pricing Discount', 'wad' ),
	);

}

/**
 * This function returns discount type from the discount id.
 *
 * @param int $discount_id
 * @return string
 */
function wad_get_discount_type_from_id( $discount_id ) {
	global $wad_discounts;
	if ( in_array( $discount_id, array_keys( $wad_discounts['product'] ) ) ) {
		return 'product';
	} elseif ( in_array( $discount_id, array_keys( $wad_discounts['order'] ) ) ) {
		return 'order';
	} elseif ( in_array( $discount_id, array_keys( $wad_discounts['shipping'] ) ) ) {
		return 'shipping';
	}
}


/**
 * This function returns types of applied discounts.
 *
 * @return array
 */
function wad_get_applied_discount_type() {
	global $wad_applied_discounts;
	$granted_discounts_list = array();
	if ( isset( $wad_applied_discounts['wad_used_discount'] ) ) {
		foreach ( $wad_applied_discounts['wad_used_discount'] as $discount_id ) {
			$discount_type                            = wad_get_discount_type_from_id( $discount_id );
			$granted_discounts_list[ $discount_type ] = $discount_id;
		}
	}
	return $granted_discounts_list;
}



/**
 * This function checks the eligibility of the discounts applied for deactivation of coupons.
 *
 * @return bool
 */
function wad_check_discount_eligibility_for_deactivate_coupons() {
	global $wad_settings;
	global $wad_applied_discounts;
	$granted_discounts = get_proper_value( $wad_settings, 'disable-coupons-discounts-list', array( 'order' ) );

	if ( isset( $wad_applied_discounts['wad_quantity_based_pricing'] ) && in_array( 'qbp', $granted_discounts ) ) {
		return true;
	}
	$granted_discounts_type_list = wad_get_applied_discount_type();
	if ( isset( $wad_applied_discounts['wad_used_discount'] ) && ! empty( $granted_discounts_type_list ) ) {
		$granted_discount_type = array_keys( $granted_discounts_type_list );
		if ( array_intersect( $granted_discounts, $granted_discount_type ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Returns whether the configuration of the discount to save is valid.
 *
 * @return bool
 */
function wad_validate_settings() {

	$free_gift_validation_succeeded = wad_validate_free_gift_settings();

	if ( $free_gift_validation_succeeded ) {

		return true;
	}

	return false;
}

/**
 * Returns whether the configuration for the discount action free gift is valid.
 *
 * @return bool
 */
function wad_validate_free_gift_settings() {

	$settings_to_save = $_POST['o-discount'];

	// consider free gift validation a success if we are not saving a free gift discount
	if ( ! isset( $settings_to_save['action'] ) || 'free-gift' !== $settings_to_save['action'] ) {

		return true;
	}

	// the gift list is missing
	if ( ! isset( $settings_to_save['gift-list'] ) ) {

		wc_setcookie( 'wad_error_missing_gift_list', 'true', 0, false, true );

		return false;
	}

	$gift_list_abs_int_value = absint( $settings_to_save['gift-list'] );

	$gift_list_post_type = get_post_type( $gift_list_abs_int_value );

	// there is no post with the id provided. Otherwise it is not a product list post
	if ( false === $gift_list_post_type || 'o-list' !== $gift_list_post_type ) {

		wc_setcookie( 'wad_error_invalid_gift_list', 'true', 0, false, true );

		return false;
	}

	$_POST['o-discount']['gift-list'] = (string) $gift_list_abs_int_value;

	// the gift limit is missing
	if ( ! isset( $settings_to_save['nb-gifts-limit'] ) ) {

		wc_setcookie( 'wad_error_missing_gift_limit', 'true', 0, false, true );

		return false;
	}

	$gift_limit_abs_int_value = absint( $settings_to_save['nb-gifts-limit'] );

	if ( 0 === $gift_limit_abs_int_value ) {

		wc_setcookie( 'wad_error_invalid_gift_limit', 'true', 0, false, true );

		return false;
	}

	$_POST['o-discount']['nb-gifts-limit'] = (string) $gift_limit_abs_int_value;

	return true;
}

/**
 * Sanitizes the configuration of the discount to save before saving it in the database.
 */
function wad_sanitize_settings() {

	$settings_to_save = $_POST['o-discount'];

	if ( isset( $settings_to_save['action'] ) && 'free-gift' === $settings_to_save['action'] ) {

		$gift_label_sanitized = isset( $settings_to_save['gift-label'] ) ? sanitize_text_field( $settings_to_save['gift-label'] ) : '';

		$_POST['o-discount']['gift-label'] = $gift_label_sanitized;
	}
}

/**
 * Sets the free gift discounts granted to the user.
 */
function wad_set_free_gifts_granted_discounts() {

	global $wad_discounts;
	$wad_discounts = (array) $wad_discounts;

	global $wad_granted_free_gift_discounts;

	foreach ( $wad_discounts['free_gift'] as $discount_id => $discount_obj ) {

		if ( $discount_obj->is_applicable() ) {

			$wad_granted_free_gift_discounts[ $discount_id ] = $discount_obj;
		}
	}
}

/**
 * Removes all the free gifts found in the cart.
 */
function wad_clear_free_gifts_from_cart() {

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

		if ( ! isset( $cart_item['wad_free_gift'] ) ) {

			continue;
		}

		WC()->cart->remove_cart_item( $cart_item_key );
	}
}

/**
 * Filters the free gifts to only contain simple products and variation products.
 */
function wad_sanitize_free_gifts_choice_list() {

	global $wad_free_gifts_choice_list;
	$wad_free_gifts_choice_list = (array) $wad_free_gifts_choice_list;

	foreach ( $wad_free_gifts_choice_list as $free_gift_id ) {

		$product = wc_get_product( $free_gift_id );

		$product_type = $product->get_type();

		if ( 'simple' !== $product_type && 'variation' !== $product_type ) {

			unset( $wad_free_gifts_choice_list[ $free_gift_id ] );
		}
	}
}

/**
 * Check if free gift exist in the cart
 */
function wad_check_free_gifts_in_cart() {

	wad_set_free_gifts_granted_discounts();

	global $wad_granted_free_gift_discounts;
	$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

	if ( ! $wad_granted_free_gift_discounts || defined( 'WAD_FOUND_FREE_GIFT_IN_CART' ) ) {

		return;
	}

	foreach ( WC()->cart->get_cart() as $cart_item ) {

		if ( ! isset( $cart_item['wad_free_gift'] ) ) {

			continue;
		}

		$discount_used = $cart_item['wad_free_gift_discount_id'];

		// the discount used for the free gift in the cart is not a granted discount
		if ( isset( $wad_granted_free_gift_discounts[ $discount_used ] ) && ! defined( 'WAD_FOUND_FREE_GIFT_IN_CART' ) ) {

			define( 'WAD_FOUND_FREE_GIFT_IN_CART', true );

			break;

		}
	}
}

/**
 * Returns the quantity of free gift items per granted discounts.
 *
 * @return array
 */
function wad_get_free_gift_items_count() {

	$free_gifts_discount_quantities = array();

	foreach ( WC()->cart->get_cart() as $cart_item ) {

		if ( ! isset( $cart_item['wad_free_gift'] ) ) {

			continue;
		}

		$discount_granted = $cart_item['wad_free_gift_discount_id'];

		$item_quantity = $cart_item['quantity'];

		if ( ! isset( $free_gifts_discount_quantities[ $discount_granted ] ) ) {

			$free_gifts_discount_quantities[ $discount_granted ] = $item_quantity;

		} else {

			$free_gifts_discount_quantities[ $discount_granted ] += $item_quantity;
		}
	}

	return $free_gifts_discount_quantities;
}

/**
 * Updates the number of free gifts available for the granted discounts.
 */
function wad_update_discounts_free_gift_limit() {

	global $wad_granted_free_gift_discounts;
	$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

	// there is no limit to update if no free gift discount is granted or there is no free gift in the cart
	if ( ! $wad_granted_free_gift_discounts || ! defined( 'WAD_FOUND_FREE_GIFT_IN_CART' ) ) {

		return;
	}

	$free_gifts_discount_quantities = wad_get_free_gift_items_count();

	foreach ( $wad_granted_free_gift_discounts as $discount_id => $discount_obj ) {

		if ( isset( $free_gifts_discount_quantities[ $discount_id ] ) ) {

			$gift_limit = $discount_obj->get_settings( 'nb-gifts-limit' );

			// the number of free gift items in the cart for the granted discount unexpectedly exceeds its actual limit
			if ( $gift_limit < $free_gifts_discount_quantities[ $discount_id ] ) {

				global $wad_system_removing_free_gift;
				$wad_system_removing_free_gift = true;

				wad_clear_free_gifts_from_cart();

				$wad_system_removing_free_gift = false;

			} else { // update the remaining gifts

				$gifts_left = $gift_limit - $free_gifts_discount_quantities[ $discount_id ];

				$discount_obj->set_remaining_gifts( $gifts_left );
			}
		}
	}
}

/**
 * Updates the list of free gifts available to choose.
 */
function wad_update_free_gifts_choice_list() {

	global $wad_granted_free_gift_discounts;
	$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

	global $wad_free_gifts_choice_list;
	$wad_free_gifts_choice_list = array();

	// the free gift choice list stays empty if there is no granted free gift discounts
	if ( ! $wad_granted_free_gift_discounts ) {

		return;
	}

	foreach ( $wad_granted_free_gift_discounts as $discount_obj ) {

		$remaining_gifts = $discount_obj->get_remaining_gifts();

		if ( 0 < $remaining_gifts ) {

			$discount_list_obj = $discount_obj->get_products_list();

			$discount_gift_list = $discount_list_obj->get_products( true );

			foreach ( $discount_gift_list as $gift_id ) {

				if ( ! isset( $wad_free_gifts_choice_list[ $gift_id ] ) ) {

					$wad_free_gifts_choice_list[ $gift_id ] = $gift_id;
				}
			}
		}
	}

	wad_sanitize_free_gifts_choice_list();
}

/**
 * Adds the free gifts automatically to the cart.
 */
function wad_auto_add_unique_free_gift() {

	// free gifts automatic add is disabled for the current session
	if ( isset( $_COOKIE['wad_disable_auto_add'] ) ) {

		return;
	}

	global $wad_auto_add_unique_free_gift;
	$wad_auto_add_unique_free_gift = (bool) $wad_auto_add_unique_free_gift;

	global $wad_granted_free_gift_discounts;
	$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

	// do NOT automatically add free gifts in case option is disabled or there is no discount free gift
	if ( ! $wad_auto_add_unique_free_gift || ! $wad_granted_free_gift_discounts ) {

		return;
	}

	foreach ( $wad_granted_free_gift_discounts as $discount_id => $discount_obj ) {

		$discount_list_obj = $discount_obj->get_products_list();

		$discount_gift_list = $discount_list_obj->get_products( true );

		// the gift list does NOT contain a unique free gift
		if ( 1 !== count( $discount_gift_list ) ) {

			continue;
		}

		$unique_free_gift_id = current( $discount_gift_list );

		$unique_free_gift_qty = $discount_obj->get_remaining_gifts();

		$free_gift_item_data = array(
			'wad_free_gift'             => true,
			'wad_free_gift_discount_id' => $discount_id,
		);

		global $wad_processing_auto_add_free_gift;
		$wad_processing_auto_add_free_gift = true;

		WC()->cart->add_to_cart( $unique_free_gift_id, $unique_free_gift_qty, 0, array(), $free_gift_item_data );

		$wad_processing_auto_add_free_gift = false;

		// the free gift discount is completely used
		$discount_obj->set_remaining_gifts( 0 );
	}

	define( 'WAD_ADDED_FREE_GIFT_AUTOMATICALLY', true );
}

/**
 * Saves the free gift discounts that have been used by the user.
 */
function wad_save_free_gift_discounts() {

	foreach ( WC()->cart->get_cart() as $cart_item ) {

		if ( ! isset( $cart_item['wad_free_gift'] ) || ! isset( $cart_item['wad_free_gift_discount_id'] ) ) {

			continue;
		}

		wad_save_applied_discount_globally( 'wad_used_discount', $cart_item['wad_free_gift_discount_id'] );
	}
}

/**
 * Returns the discount to associate to a chosen free gift.
 *
 * @param int $free_gift_id The id of the chosen free gift.
 */
function wad_get_discount_to_grant_for_free_gift( $free_gift_id ) {

	global $wad_granted_free_gift_discounts;
	$wad_granted_free_gift_discounts = (array) $wad_granted_free_gift_discounts;

	foreach ( $wad_granted_free_gift_discounts as $discount_id => $discount_obj ) {

		// the current discount has been completely used
		if ( 0 >= $discount_obj->get_remaining_gifts() ) {

			continue;
		}

		$discount_list_obj = $discount_obj->get_products_list();

		$discount_gift_list = $discount_list_obj->get_products( true );

		foreach ( $discount_gift_list as $gift_id ) {

			// the current discount has the free gift in its gift_list
			if ( $free_gift_id == $gift_id ) {

				return $discount_id;
			}
		}
	}

	// the product is not a free gift
	return null;
}

function wad_tax_enabled() {

	return wc_tax_enabled() && ! WC()->cart->get_customer()->get_is_vat_exempt();
}

/**
 * Determines whether the request is a frontend request
 *
 * @return bool
 */
function wad_is_frontend_request() {

	return ( ! is_admin() || defined( 'DOING_AJAX' ) )
	&& ! defined( 'DOING_CRON' )
	&& ! WC()->is_rest_api_request();
}

function wad_filter_on_sale_products( $product_list, $discount_object ) {

    if ( empty( $product_list ) || ! is_array( $product_list ) ) {
            return array();
    }

    $wad_on_sale_products = array();

    foreach( $product_list as $product_id ) {

            if( $discount_object->is_applicable( $product_id ) ) {
                    array_push( $wad_on_sale_products, $product_id );
            }
    }

    return $wad_on_sale_products;
}

/**
 * Gets regular price with ou without taxes
 *
 * @param WC_Product $cart_item Product object.
 *
 * @return float|string
 */
function get_product_regular_price_according_taxes ( $cart_item ) {
	$regular_price = $cart_item['data']->get_regular_price();

	if ( 'excl' === get_option( 'woocommerce_tax_display_cart' ) ) {
		$regular_price = wc_get_price_excluding_tax( $cart_item['data'], array( 'price' => $cart_item['data']->get_regular_price() ) );
	} else {
		$regular_price = wc_get_price_including_tax( $cart_item['data'], array( 'price' => $cart_item['data']->get_regular_price() ) );
	}
	return $regular_price;
}

/**
 * Call Rest API of a third-party Services.
 *
 * @param string $api_url API URL.
 * @param string $api_key API Key.
 *
 * @return mixed
 */
function wad_call_rest_api( $api_url, $api_key ) {
	$headers = array(
		'headers' => array(
			'api-key' => $api_key,
		),
		'timeout' => 30,
	);
	$request = wp_remote_get( $api_url, $headers );
	return json_decode( wp_remote_retrieve_body( $request ) );
}
