<?php
/**
 * Plugin Name: JW Player for WordPress - Premium
 * Plugin URI: https://www.ilghera.com/product/jw-player-7-for-wordpress-premium/
 * Description:  The complete solution for using JW Player into WordPress.
 * It works with the latest version of the famous video player and it gives you full control of all the options available.
 * Player customization, social sharing and advertising are just an example.
 * Author: ilGhera
 * Version: 2.2.0
 * Author URI: https://www.ilghera.com/
 * Requires at least: 4.0
 * Tested up to: 5.9
 * Text Domain: jwppp
 */
/*No direct access*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*Define the plugin version*/
define( 'JWPPP_VERSION', '2.1.3' );

if(!class_exists('jwp_license')) {
require_once plugin_dir_path(__FILE__).'admin/activatezhk/jwp_license.php';
}

/**
 * Fired on the activation.
 */
function jwppp_premium_load() {

	if ( ! function_exists( 'is_plugin_active' ) ) {
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}

	/*Deactivate the free version*/
	if( is_plugin_active('jw-player-7-for-wp/jw-player-7-for-wp.php') || function_exists('jwppp_load') ) {
		deactivate_plugins('jw-player-7-for-wp/jw-player-7-for-wp.php');
	    remove_action( 'plugins_loaded', 'jwppp_load' );
	    wp_redirect(admin_url('plugins.php?plugin_status=all&paged=1&s'));

	}

	/*Deactivate the Related Videos for JW Player*/
	if( is_plugin_active('related-videos-for-jw-player/related-videos-for-jwplayer.php') ) {
		deactivate_plugins('related-videos-for-jw-player/related-videos-for-jwplayer.php');
 	}

	/*Internationalization*/
	load_plugin_textdomain( 'jwppp', false, basename( dirname( __FILE__ ) ) . '/languages' );

	/*Constants definition*/
	define( 'JWPPP_DIR', plugin_dir_path( __FILE__ ) );
	define( 'JWPPP_URI', plugin_dir_url( __FILE__ ) );
	define( 'JWPPP_INCLUDES', JWPPP_DIR . 'includes/' );
	define( 'JWPPP_ADMIN', JWPPP_DIR . 'admin/' );

	/*Files required*/
	include( JWPPP_ADMIN . 'jwppp-admin.php' );
	include( JWPPP_INCLUDES . 'jwppp-functions.php' );
	include( JWPPP_INCLUDES . 'jwppp-video-chapters.php' );
	include( JWPPP_INCLUDES . 'jwppp-related-posts.php' );
	include( JWPPP_DIR . 'fb/jwppp-fb-player.php' );
	include( JWPPP_DIR . 'jw-widget/jwppp-carousel-config.php' );

}
add_action( 'plugins_loaded', 'jwppp_premium_load', 1 );


/**
 * Plugin Update Checker
 */
require( plugin_dir_path( __FILE__ ) . 'plugin-update-checker/plugin-update-checker.php');

$jwpppUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://www.ilghera.com/wp-update-server-2/?action=get_metadata&slug=jw-player-7-for-wp-premium',
    __FILE__,
    'jw-player-7-for-wp-premium'
);

$jwpppUpdateChecker->addQueryArgFilter( 'jwppp_secure_update_check' );

function jwppp_secure_update_check( $queryArgs ) {
    $key = base64_encode( get_option( 'jwppp-premium-key' ) );

    if( $key ) {
        $queryArgs['premium-key'] = $key;
    }
    return $queryArgs;
}