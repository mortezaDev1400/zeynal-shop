<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __DIR__ ) . 'includes/constants.php';
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __DIR__ ) . 'includes/class-wad.php';
require plugin_dir_path( __DIR__ ) . 'includes/class-wad-ui-builder.php';
require plugin_dir_path( __DIR__ ) . 'includes/class-wad-discount.php';
require plugin_dir_path( __DIR__ ) . 'includes/class-wad-products-list.php';
if ( ! class_exists( 'Woocommerce_All_Discount_License' ) ) { 
	require plugin_dir_path( __DIR__ ) .'includes/class-wad-update.php';
	}
if ( ! function_exists( 'o_admin_fields' ) ) {
	require plugin_dir_path( __DIR__ ) . 'includes/utils.php';
}
require plugin_dir_path( __DIR__ ) . 'includes/functions.php';
if ( ! class_exists( '\Drewm\MailChimp' ) ) {
	require plugin_dir_path( __DIR__ ) . 'includes/MailChimp.php';
}
