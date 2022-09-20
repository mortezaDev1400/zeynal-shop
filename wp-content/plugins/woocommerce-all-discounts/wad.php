<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://discountsuiteforwp.com/
 * @since             0.1
 * @package           Wad
 *
 * @wordpress-plugin
 * Plugin Name:       Conditional Discounts for WooCommerce by ORION
 * Plugin URI:        https://discountsuiteforwp.com/
 * Description:       Manage your shop discounts like a pro.
 * Version:           4.6
 * Author:            Ehsan12
 * Author URI:        https://zhaket.com/store/ehsan12
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wad
 * Domain Path:       /languages
 * WC requires at least: 3.0.0
 * WC tested up to: 6.2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wad-activator.php
 */
function activate_wad() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wad-activator.php';
	Wad_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wad-deactivator.php
 */
function deactivate_wad() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wad-deactivator.php';
	Wad_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wad' );
register_deactivation_hook( __FILE__, 'deactivate_wad' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_wad() {

	$plugin = new Wad();
	$plugin->run();

}

/**
 * Loads all the necessary files needed by the plugin
 */
function wad_load_resources() {

	require_once plugin_dir_path( __FILE__ ) . '/includes/requires.php';
}

wad_load_resources();
run_wad();
