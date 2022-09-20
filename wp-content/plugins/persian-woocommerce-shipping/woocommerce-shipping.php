<?php
/**
 * Plugin Name: افزونه حمل و نقل ووکامرس
 * Plugin URI: http://MahdiY.ir
 * Description: افزونه قدرتمند حمل و نقل ووکامرس با قابلیت ارسال از طریق پست پیشتاز، سفارشی، پیک موتوری و تیپاکس
 * Version: 3.0.7
 * Author: Mahdi Yousefi [MahdiY]
 * Author URI: http://MahdiY.ir
 * WC requires at least: 4.0.0
 * WC tested up to: 6.5.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'PWS_VERSION' ) ) {
	define( 'PWS_VERSION', '3.0.7' );
}

if ( ! defined( 'PWS_DIR' ) ) {
	define( 'PWS_DIR', __DIR__ );
}

if ( ! defined( 'PWS_FILE' ) ) {
	define( 'PWS_FILE', __FILE__ );
}

if ( ! defined( 'PWS_URL' ) ) {
	define( 'PWS_URL', plugin_dir_url( __FILE__ ) );
}

function PWS() {

	if ( PWS_Tapin::is_enable() ) {
		return PWS_Tapin::instance();
	}

	return PWS_Core::instance();
}

add_action( 'woocommerce_loaded', function () {

	include( 'includes/class-pws.php' );
	include( 'includes/class-ajax.php' );
	include( 'includes/class-cart.php' );
	include( 'includes/class-install.php' );
	include( 'includes/class-tapin.php' );
	include( 'includes/class-order.php' );
	include( 'includes/class-product.php' );
	include( 'includes/class-sms.php' );
	include( 'includes/class-tools.php' );
	include( 'includes/class-notice.php' );
	include( 'includes/class-status.php' );
	include( 'includes/class-version.php' );

	include( 'includes/admin/class-admin.php' );

}, 20 );

register_activation_hook( PWS_FILE, function () {
	file_put_contents( PWS_DIR . '/.activated', '' );
} );