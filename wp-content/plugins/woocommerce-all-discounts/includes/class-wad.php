<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.orionorigin.com/
 * @since      0.1
 *
 * @package    Wad
 * @subpackage Wad/includes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1
 * @package    Wad
 * @subpackage Wad/includes
 * @author     ORION <support@orionorigin.com>
 */
class Wad {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      Wad_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function __construct() {

		$this->plugin_name = 'wad';
		$this->version     = '4.5.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wad_Loader. Orchestrates the hooks of the plugin.
	 * - Wad_i18n. Defines internationalization functionality.
	 * - Wad_Admin. Defines all hooks for the admin area.
	 * - Wad_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wad-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wad-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wad-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wad-public.php';

		$this->loader = new Wad_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wad_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wad_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin        = new Wad_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_admin, 'get_updater' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', 'WAD_UI_Builder', 'add_wad_menu' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'wad_redirect' );
		$this->loader->add_action( 'admin_notices', 'WAD_UI_Builder', 'get_max_input_vars_php_ini' );
		$this->loader->add_action( 'admin_notices', 'WAD_UI_Builder', 'check_product_list' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'check_woocommerce_ready_for_use' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'show_settings_saving_error' );

		// disable acf-pro datepicker on discount managing pages
		$this->loader->add_action( 'wp_print_scripts', $plugin_admin, 'acf_pro_dequeue_script', 100 );

		$this->loader->add_action( 'admin_notices', 'WAD_UI_Builder', 'get_license_activation_notice' );
		$this->loader->add_action( 'wp_ajax_wad_activate_license', $plugin_admin, 'activate_license' );
		$this->loader->add_action( 'wp_ajax_nopriv_wad_activate_license', $plugin_admin, 'activate_license' );

		$this->loader->add_action( 'init', 'WAD_UI_Builder', 'register_cpt_discount' );
		$this->loader->add_action( 'add_meta_boxes', 'WAD_UI_Builder', 'get_discount_metabox' );
		$this->loader->add_action( 'save_post_o-discount', $plugin_admin, 'save_discount' );
		$this->loader->add_action( 'save_post_product', $plugin_admin, 'save_discount' );
		$this->loader->add_filter( 'manage_edit-o-discount_columns', 'WAD_UI_Builder', 'get_columns' );
		$this->loader->add_action( 'manage_o-discount_posts_custom_column', 'WAD_UI_Builder', 'get_columns_values', 5, 2 );
		$this->loader->add_action( 'woocommerce_product_data_panels', 'WAD_UI_Builder', 'get_product_tab_data' );

		$this->loader->add_filter( 'woocommerce_product_data_tabs', 'WAD_UI_Builder', 'get_product_tab_label' );

		$list = new WAD_Products_List( false );
		$this->loader->add_action( 'init', 'WAD_UI_Builder', 'register_cpt_list' );
		$this->loader->add_action( 'add_meta_boxes', 'WAD_UI_Builder', 'get_list_metabox' );
		$this->loader->add_action( 'save_post_o-list', $plugin_admin, 'save_list' );
		$this->loader->add_action( 'wp_ajax_evaluate-wad-query', $list, 'evaluate_wad_query' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Wad_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_loaded', $plugin_public, 'init_globals' );
		$this->loader->add_action( 'wp_loaded', $plugin_public, 'init_free_gifts_process' );
		$this->loader->add_action( 'woocommerce_before_calculate_totals', $plugin_public, 'remove_gifts_products_from_cart' );
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );

		$this->loader->add_filter( 'woocommerce_product_get_price', 'Wad_Public', 'get_sale_price', 99999, 2 );

		$this->loader->add_filter( 'woocommerce_product_variation_get_price', 'Wad_Public', 'get_sale_price', 99999, 2 );

		$this->loader->add_filter( 'woocommerce_variation_prices_sale_price', 'Wad_Public', 'get_sale_price', 99999, 2 );
		$this->loader->add_filter( 'woocommerce_product_get_sale_price', 'Wad_Public', 'get_sale_price', 99999, 2 );
		$this->loader->add_filter( 'woocommerce_product_variation_get_sale_price', 'Wad_Public', 'get_sale_price', 99999, 2 );

		// add free gift item meta
		$this->loader->add_filter( 'woocommerce_add_cart_item_data', 'Wad_Public', 'add_free_gift_item_data', 10, 3 );

		$this->loader->add_filter( 'woocommerce_add_cart_item', $plugin_public, 'add_free_gift_to_cart_with_adjusted_quantity' );
		$this->loader->add_action( 'woocommerce_after_cart_item_quantity_update', $plugin_public, 'adjust_free_gift_quantity', 10, 4 );
		$this->loader->add_filter( 'woocommerce_cart_item_name', $plugin_public, 'show_free_gift_label', 99, 2 );
		$this->loader->add_action( 'woocommerce_shortcode_products_query', $plugin_public, 'query_free_gifts_with_variations' );
		$this->loader->add_filter( 'woocommerce_checkout_create_order_line_item', $plugin_public, 'add_free_gift_meta_to_order_item' );

		$this->loader->add_action( 'woocommerce_ajax_added_to_cart', $plugin_public, 'ajax_added_to_cart' );

		$this->loader->add_action( 'woocommerce_cart_is_empty', 'WAD_UI_Builder', 'show_free_gifts_table' );
		$this->loader->add_action( 'woocommerce_after_cart_table', 'WAD_UI_Builder', 'show_free_gifts_table' );
		$this->loader->add_action( 'woocommerce_review_order_before_payment', 'WAD_UI_Builder', 'show_free_gifts_table' );
		$this->loader->add_action( 'woocommerce_remove_cart_item', $plugin_public, 'disable_free_gift_auto_add', 10, 2 );
		$this->loader->add_action( 'woocommerce_before_calculate_totals', 'Wad_Public', 'set_free_gift_price_in_cart' );
		$this->loader->add_filter( 'woocommerce_cart_item_product', 'Wad_Public', 'update_cart_widget', 99, 2 );
		$this->loader->add_action( 'woocommerce_before_mini_cart_contents', 'Wad_Public', 'calculate_cart_totals' );

		// get cheapest products in cart
		$this->loader->add_action( 'woocommerce_before_calculate_totals', 'Wad_Public', 'get_cheapest_products' );

		// Saves the used discounts in the order
		$this->loader->add_action( 'woocommerce_checkout_update_order_meta', 'Wad_Public', 'save_used_discounts' );

		$this->loader->add_filter( 'woocommerce_product_is_on_sale', $plugin_public, 'is_product_on_sale', 99, 2 );

		$this->loader->add_action( 'woocommerce_cart_calculate_fees', $plugin_public, 'add_order_discount' );
		$this->loader->add_action( 'woocommerce_cart_totals_get_fees_from_cart_taxes', $plugin_public, 'exclude_cart_fees_taxes', 10, 2 );
		$this->loader->add_action( 'woocommerce_checkout_update_order_meta', 'Wad_Public', 'add_order_discounts_meta' );

		// We disable coupons if there is a discount somewhere
		$this->loader->add_filter( 'woocommerce_coupons_enabled', 'Wad_Public', 'get_coupons_status' );

		$this->loader->add_action( 'loop_start', 'Wad_Public', 'get_loop_data', 99, 2 );
		$this->loader->add_action( 'woocommerce_before_cart', 'Wad_Public', 'get_loop_data' );
		$this->loader->add_action( 'woocommerce_before_mini_cart_contents', 'Wad_Public', 'get_mini_cart_loop_data' );
		$this->loader->add_action( 'woocommerce_checkout_update_order_review', 'Wad_Public', 'get_loop_data' );
		$this->loader->add_action( 'woocommerce_before_shop_loop', 'Wad_Public', 'get_loop_data' );

		// Related products
		$this->loader->add_action( 'woocommerce_before_template_part', 'Wad_Public', 'prepare_product_template_loop_data', 99, 4 );

		$this->loader->add_action( 'woocommerce_product_meta_end', 'WAD_UI_Builder', 'get_quantity_pricing_tables' );

		// Use new algorithm extration in woocommerce shotcodes pages
		$this->loader->add_filter( 'woocommerce_shortcode_products_query', 'Wad_Public', 'add_discounted_products_to_query', 99, 3 );
		$this->loader->add_filter( 'woocommerce_shortcode_products_query_results', 'Wad_Public', 'save_products_query_results', 10, 2 );

		// Get shipping amount
		$this->loader->add_filter( 'woocommerce_shipping_rate_cost', 'Wad_Public', 'get_shipping_amount', 99, 2 );
		// shipping taxe filter.
		$this->loader->add_filter( 'woocommerce_shipping_rate_taxes', 'Wad_Public', 'get_shipping_rate_taxes' );

		// show original price on cart
		$this->loader->add_filter( 'woocommerce_cart_item_price', 'WAD_UI_Builder', 'show_original_price_on_cart', 30, 2 );
		$this->loader->add_filter( 'woocommerce_cart_item_subtotal', 'WAD_UI_Builder', 'show_original_total_price_on_checkout', 30, 2 );

		// display the total products discount
		$this->loader->add_action( 'woocommerce_cart_totals_before_order_total', 'WAD_UI_Builder', 'display_total_products_discount', 99 );
		$this->loader->add_action( 'woocommerce_review_order_before_order_total', 'WAD_UI_Builder', 'display_total_products_discount', 99 );

		$this->loader->add_filter( 'woocommerce_variation_prices', 'Wad_Public', 'add_discounted_variation_price_to_cache' );

		$this->loader->add_action( 'woocommerce_before_checkout_form', 'WAD_UI_Builder', 'add_alternative_coupon_form', 15 );
		$this->loader->add_action( 'woocommerce_checkout_update_order_review', 'Wad_Public', 'set_coupons_status_cookie' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.1
	 * @return    Wad_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
