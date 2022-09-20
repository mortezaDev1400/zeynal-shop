<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WAD_VERSION', '4.6' );
define( 'WAD_URL', plugins_url( '/', dirname( __FILE__ ) ) );
define( 'WAD_DIR', dirname( __FILE__, 2 ) );
define( 'WAD_MAIN_FILE', 'woocommerce-all-discounts/wad.php' );
define( 'WAD_PLUGIN_NAME', 'Woocommerce All Discounts - Pro' );
