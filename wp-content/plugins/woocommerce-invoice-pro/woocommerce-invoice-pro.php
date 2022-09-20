<?php
/**
 * Plugin Name: Woocommerce Invoice Pro
 * Plugin URI: https://zhaket.com/web/woocommerce-invoice-pro
 * Description: Using this plugin you can create an advanced and powerful invoice for woocommerce orders and send it to your customers.
 * Version: 11.0.0
 * Author: S.Reza Salehi
 * Author URI: http://sreza-salehi.ir
 * Text Domain: wip
 * Domain Path: /languages/
 */

if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

define('WIP_BASE_FILE', __FILE__);
$plugin_data = get_plugin_data(WIP_BASE_FILE);
define('WIP_BASENAME', plugin_basename(WIP_BASE_FILE));
define('WIP_NAME', $plugin_data['Name']);
define('WIP_VER', $plugin_data['Version']);
define('WIP_URI', $plugin_data['PluginURI']);
define('WIP_AUTHOR_URI', $plugin_data['AuthorURI']);
define('WIP_AUTHOR_NAME', $plugin_data['AuthorName']);

require(trailingslashit(plugin_dir_path(WIP_BASE_FILE)) . 'core.php');