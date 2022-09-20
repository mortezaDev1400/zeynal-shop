<?php
/**
 * Plugin Name: افزونه حمل و نقل ووکامرس - حرفه‌ای
 * Plugin URI: https://Nabik.Net
 * Description: مکمل و توسعه‌دهنده افزونه حمل و نقل ووکامرس - نرخ ثابت حرفه‌ای، لیست‌شهرها در صفحه حساب کاربری و...
 * Version: 1.5.1
 * Author: نابیک [Nabik.Net]
 * Author URI: https://Nabik.Net
 * WC requires at least: 5.0.0
 * WC tested up to: 6.5.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'PWS_PRO_VERSION' ) ) {
	define( 'PWS_PRO_VERSION', '1.5.1' );
}

if ( ! defined( 'PWS_PRO_DIR' ) ) {
	define( 'PWS_PRO_DIR', __DIR__ );
}

if ( ! defined( 'PWS_PRO_FILE' ) ) {
	define( 'PWS_PRO_FILE', __FILE__ );
}

if ( ! defined( 'PWS_PRO_URL' ) ) {
	define( 'PWS_PRO_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! function_exists( 'sg_load' ) ) {

	add_action( 'admin_notices', function () {
		?>
		<div class="notice notice-error">
			<p><b>هشدار: </b>
				فعالسازی «افزونه حمل و نقل ووکامرس - حرفه‌ای» انجام نشد. لودر سورس گاردین روی هاست شما فعال نیست، لطفا
				به هاستینگ خود تیکت بزنید و درخواست کنید لودر سورس گاردین را برای شما نصب و فعالسازی
				نمایند.
			</p>
		</div>
		<?php
	} );

	return;
}

add_action( 'woocommerce_loaded', function () {

	if ( ! defined( 'PWS_VERSION' ) || version_compare( PWS_VERSION, '3.0.4', '<' ) ) {

		add_action( 'admin_notices', function () {

			$url = admin_url( 'plugin-install.php?tab=plugin-information&plugin=persian-woocommerce-shipping' );

			?>
			<div class="notice notice-error">
				<p><b>هشدار: </b>
					فعالسازی «افزونه حمل و نقل ووکامرس - حرفه‌ای» انجام نشد. <a href="<?php echo $url; ?>"
																				target="_blank">افزونه
						حمل و نقل ووکامرس نسخه رایگان</a> فعال نیست، لطفا <b>آخرین نسخه</b> آن را نصب و فعالسازی
					نمایید.
				</p>
			</div>
			<?php
		} );

		return;
	}

	require_once PWS_PRO_DIR . '/includes/class-pws-pro.php';
	require_once PWS_PRO_DIR . '/includes/class-zone.php';
	require_once PWS_PRO_DIR . '/includes/class-city.php';
	require_once PWS_PRO_DIR . '/includes/class-rule.php';
	require_once PWS_PRO_DIR . '/includes/class-tools.php';
	require_once PWS_PRO_DIR . '/includes/class-version.php';
	require_once PWS_PRO_DIR . '/includes/class-update.php';
	require_once PWS_PRO_DIR . '/includes/class-order.php';

}, 30 );



