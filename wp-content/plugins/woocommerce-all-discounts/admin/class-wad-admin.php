<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.orionorigin.com/
 * @since      0.1
 *
 * @package    Wad
 * @subpackage Wad/admin
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wad
 * @subpackage Wad/admin
 * @author     ORION <support@orionorigin.com>
 */
class Wad_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wad-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'acd-flexgrid', plugin_dir_url( __FILE__ ) . 'css/flexiblegs.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'o-ui', plugin_dir_url( __FILE__ ) . 'css/UI.css', array(), $this->version, 'all' );
		if ( wad_is_wad_admin_screen() ) {
			wp_enqueue_style( 'o-datepciker', plugin_dir_url( __FILE__ ) . 'js/datepicker/css/datepicker.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'wad-datetimepicker', plugin_dir_url( __FILE__ ) . 'js/datetimepicker/jquery.datetimepicker.css', array(), $this->version, 'all' );
		}
	}

	public function enqueue_scripts() {
		if ( wad_is_wad_admin_screen() ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wad-admin.js', array( 'jquery' ), $this->version, false );
			wp_localize_script( $this->plugin_name, 'license_message', array( 'purchase_code_used_on_different_site' => __( 'This purchase code has been used on another website. If you want to use it anyway, please go to the your account page on https://discountsuiteforwp.com/my-account to cancel your previous activation.', 'wad' ) ) );
			wp_enqueue_script( 'o-admin', plugin_dir_url( __FILE__ ) . 'js/o-admin.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'wad-tabs', plugin_dir_url( __FILE__ ) . 'js/SpryAssets/SpryTabbedPanels.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'wad-serializejson', plugin_dir_url( __FILE__ ) . 'js/jquery.serializejson.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'wad-datetimepicker', plugin_dir_url( __FILE__ ) . 'js/datetimepicker/build/jquery.datetimepicker.full.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'wad-qbp-script', plugin_dir_url( __FILE__ ) . 'js/wad-admin-product-page.js', array( 'jquery' ), $this->version, false );
			wp_localize_script(
				'wad-qbp-script',
				'error_msg',
				array(
					'order_msg' => __( 'The intervals should be defined from the lowest to the highest. Please check the values you set.', 'wad' ),
					'empty_msg' => __( 'There should not be two empty consecutive intervals. Please check the values you set.', 'wad' ),
					'min_msg' => __( 'Please ensure the minimum value is set. Only the first minimum interval box can be empty.', 'wad' ),
					'max_msg' => __( 'Please ensure the maximum value is set. Only the last maximum interval box can be empty as the plugin automatically sets that as infinity (∞).', 'wad' ),
				)
			);
		}
	}

	/*
	* disable acf timepicker script as needed
	*/
	function acf_pro_dequeue_script() {
		if ( class_exists( 'acf' ) && is_admin() ) {
			if ( strpos( $_SERVER['REQUEST_URI'], '?post_type=o-discount' ) || ( isset( $_GET['post'] ) && get_post_type( $_GET['post'] ) == 'o-discount' ) ) {
				wp_dequeue_script( 'acf-timepicker' );
			}
		}
	}

	/**
	 * Saves the configuration of the discount.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save_discount( $post_id ) {
		$meta_key = 'o-discount';
		if ( isset( $_POST[ $meta_key ] ) ) {
			$validation_succeeded = wad_validate_settings();

			if ( $validation_succeeded ) {

				wad_sanitize_settings();
				update_post_meta( $post_id, $meta_key, $_POST[ $meta_key ] );
			}
		}
	}

	/**
	 * Saves the display data
	 *
	 * @param type $post_id
	 */
	public function save_list( $post_id ) {
		// Optimize and merge the two meta
		$meta_key = 'o-list';
		if ( isset( $_POST[ $meta_key ] ) ) {
			update_post_meta( $post_id, $meta_key, $_POST[ $meta_key ] );
		}
	}

	/**
	 * Runs the new version check and upgrade process
	 *
	 * @return \WAD_Updater
	 */
	function get_updater() {
		// do_action('wad_before_init_updater');
		require_once WAD_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'updaters' . DIRECTORY_SEPARATOR . 'class-wad-updater.php';
		$updater = new WAD_Updater();
		$updater->init();
		require_once WAD_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'updaters' . DIRECTORY_SEPARATOR . 'class-wad-updating-manager.php';
		$updater->set_auto_updater( new WAD_Updating_Manager( WAD_VERSION, $updater->versionUrl(), WAD_MAIN_FILE ) );
		// do_action('wad_after_init_updater');
		return $updater;
	}

	function activate_license() {
		global $wad_settings;
		if ( isset( $wad_settings['purchase-code'] ) && $wad_settings['purchase-code'] != '' ) {
			$purchase_code = $wad_settings['purchase-code'];
			$site_url      = get_site_url();
			$code          = $_POST['code'];
			$plugin_name   = WAD_PLUGIN_NAME;
			$url           = 'https://discountsuiteforwp.com/service/olicenses/v1/license/?purchase-code=' . $purchase_code . '&siteurl=' . urlencode( $site_url ) . '&subscription=1';
			$args          = array( 'timeout' => 60 );
			$response      = wp_remote_get( $url, $args );
			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				echo "Something went wrong: $error_message";
				die();
			}
			if ( isset( $response['body'] ) ) {
				$answer = $response['body'];
			}

			if ( is_array( json_decode( $answer, true ) ) ) {
				$data = json_decode( $answer, true );
				$key  = $data['key'];
				update_option( 'wad-license-key', $key );
				set_transient( 'wad-license-checking', 'valid', 1 * WEEK_IN_SECONDS );
				echo '200';
			} else {
				echo $answer;
			}
		} else {
			echo ( "Purchase code not found. Please, set your purchase code in the plugin's settings. " );
		}

		die();
	}

	function o_verify_validity() {
		$wad_settings = get_option( 'wad-options' );
		if ( get_transient( 'wad-license-checking' ) !== 'valid' ) {
			if ( isset( $wad_settings['purchase-code'] ) && $wad_settings['purchase-code'] != '' ) {
				$purchase_code = $wad_settings['purchase-code'];
				$site_url      = get_site_url();
				$plugin_name   = WAD_PLUGIN_NAME;
				$url           = 'https://discountsuiteforwp.com/service/olicenses/v1/checking/?license-key=' . $purchase_code . '&siteurl=' . urlencode( $site_url ) . '&subscription=1';
				$args          = array( 'timeout' => 60 );
				$response      = wp_remote_get( $url, $args );
				if ( ! is_wp_error( $response ) ) {
					if ( isset( $response['body'] ) && intval( $response['body'] ) == 403 ) {
						delete_option( 'wad-license-key' );
					}
				}
			} else {
				if ( get_option( 'wad-license-key' ) ) {
					delete_option( 'wad-license-key' );
				}
			}
			set_transient( 'wad-license-checking', 'valid', 1 * WEEK_IN_SECONDS );
		}
	}

	/**
	 * Redirects the plugin to the getting page after the activation
	 */
	function wad_redirect() {
		if ( get_option( 'wad_do_activation_redirect', false ) ) {
			delete_option( 'wad_do_activation_redirect' );
			wp_redirect( admin_url( 'edit.php?post_type=o-discount&page=wad-about' ) );
		}
	}

	/**
	 * Notifies the user of issues related to woocommerce
	 */
	function check_woocommerce_ready_for_use() {

		if ( ! class_exists( 'WooCommerce' ) ) {

			?>
			<div class="wad notice notice-warning is-dismissible">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( '<b>%s :</b> Plugin <b><i>WooCommerce</i></b> is not activated. Please activate <b><i>WooCommerce</i></b> from plugins menu.', 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php
		} elseif ( ! wad_is_supported_woocommerce_version() ) {

			?>
			<div class="wad notice notice-error">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( '<b>%s :</b> Your version of <b><i>WooCommerce</i></b> is no longer supported. Please update <b><i>WooCommerce</i></b> to version 3.0.0+', 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Displays the error occured during the save of the discount configuration.
	 */
	function show_settings_saving_error() {

		// the gift list is invalid
		if ( isset( $_COOKIE['wad_error_invalid_gift_list'] ) ) {

			?>
			<div class="wad notice notice-error">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( '<b>%s :</b> Failed to save settings. Reason : <b><i>invalid gift list provided</i></b>.', 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php

			wc_setcookie( 'wad_error_invalid_gift_list', false, -1, false, true );
		}

		// the gift list is missing
		if ( isset( $_COOKIE['wad_error_missing_gift_list'] ) ) {

			?>
			<div class="wad notice notice-error">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( "<b>%s :</b> Looks like you don't have any existing products list. Please create one that will contain one or multiple products to offer your customers.", 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php

			wc_setcookie( 'wad_error_missing_gift_list', false, -1, false, true );
		}

		// the gift limit is invalid
		if ( isset( $_COOKIE['wad_error_invalid_gift_limit'] ) ) {

			?>
			<div class="wad notice notice-error">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( '<b>%s :</b> Gifts limit value must be greater or equal 1.', 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php

			wc_setcookie( 'wad_error_invalid_gift_limit', false, -1, false, true );
		}

		// the gift limit is missing
		if ( isset( $_COOKIE['wad_error_missing_gift_limit'] ) ) {

			?>
			<div class="wad notice notice-error">
				<p>
					<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, WordPress.WP.I18n.MissingTranslatorsComment
						printf( __( '<b>%s :</b> Failed to save settings. Reason : <b><i>no gift limit provided</i></b>.', 'wad' ), WAD_PLUGIN_NAME );
					?>
				</p>
			</div>
			<?php

			wc_setcookie( 'wad_error_missing_gift_limit', false, -1, false, true );
		}
	}
}
