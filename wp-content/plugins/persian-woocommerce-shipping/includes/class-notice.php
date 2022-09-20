<?php
/**
 * Developer : MahdiY
 * Web Site  : MahdiY.IR
 * E-Mail    : M@hdiY.IR
 */

defined( 'ABSPATH' ) || exit;

class PWS_Notice {

	public function __construct() {

		add_action( 'admin_notices', [ $this, 'admin_notices' ], 5 );
		add_action( 'wp_ajax_pws_dismiss_notice', [ $this, 'dismiss_notice' ] );
		add_action( 'wp_ajax_pws_update_notice', [ $this, 'update_notice' ] );
	}

	public function admin_notices() {

		if ( ! current_user_can( 'manage_options' ) && ! current_user_can( 'manage_woocommerce' ) ) {
			return;
		}

		if ( $this->is_dismiss( 'all' ) ) {
			return;
		}

		foreach ( $this->notices() as $notice ) {

			if ( $notice['condition'] == false || $this->is_dismiss( $notice['id'] ) ) {
				continue;
			}

			$dismissible = $notice['dismiss'] ? 'is-dismissible' : '';

			$notice_id      = esc_attr( $notice['id'] );
			$notice_content = strip_tags( $notice['content'], '<p><a><b><img><ul><ol><li>' );

			printf( '<div class="notice pws_notice notice-success %s" id="pws_%s"><p>%s</p></div>', $dismissible, $notice_id, $notice_content );

			break;
		}

		?>
		<script type="text/javascript">
            jQuery(document).ready(function ($) {

                $(document.body).on('click', '.notice-dismiss', function () {

                    let notice = $(this).closest('.pws_notice');
                    notice = notice.attr('id');

                    if (notice !== undefined && notice.indexOf('pws_') !== -1) {

                        notice = notice.replace('pws_', '');

                        $.ajax({
                            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                            type: 'post',
                            data: {
                                notice: notice,
                                action: 'pws_dismiss_notice',
                                nonce: "<?php echo wp_create_nonce( 'pws_dismiss_notice' ); ?>"
                            }
                        });
                    }

                });

                $.ajax({
                    url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                    type: 'post',
                    data: {
                        action: 'pws_update_notice',
                        nonce: '<?php echo wp_create_nonce( 'pws_update_notice' ); ?>'
                    }
                });
            });
		</script>
		<?php
	}

	public function notices(): array {
		global $pagenow;

		$page = sanitize_text_field( $_GET['page'] ?? null );
		$tab  = sanitize_text_field( $_GET['tab'] ?? null );

		$notices = [
			[
				'id'        => 'post_rate_temp_2',
				'content'   => '<b>اطلاعیه: پیرو افزایش تعرفه ناگهانی اداره پست، به اطلاع شما عزیزان می‌رسانیم:</b> 
 
<ul>
<li>- علی رغم افزایش ناگهانی و بدون اطلاع تعرفه ها، همچنان نرخ نامه رسمی اداره پست به صورت عمومی منتشر نشده است.</li>
<li>- جهت جلوگیری از ضرر و زیان فروشگاه‌ها، <b>نسخه حرفه‌ای</b> افزونه طبق آخرین <b>نرخ نامه غیررسمی</b>، بروزرسانی شده است.</li>
<li>- نرخ نامه خدمات تاپین بروزرسانی شده است. شما می توانید از منو حمل و نقل > تاپین آن را فعال کنید.</li>
<li>- در صورتی که مستندات و نرخ نامه غیر رسمی در اختیار دارید، می‌توانید جهت تسریع در بروزرسانی افزونه آن را برای ما ارسال کنید.</li>
<li>- افزونه حمل و نقل رایگان، به محض انتشار رسمی نرخ نامه توسط اداره پست و در سریع‌ترین زمان ممکن بروزرسانی می‌شود.</li>
<li>- آخرین اخبار و اطلاعیه‌ها در مورد بروزرسانی‌ها و نرخ نامه ها را می‌توانید از کانال تلگرامی نابیک دنبال کنید.</li>
</ul>
<a href="' . PWS()->pws_pro_url( 'post' ) . '" target="_blank">افزونه حمل و نقل حرفه‌ای</a> |
<a href="https://t.me/nabik_net" target="_blank">کانال تلگرامی نابیک</a>',
				'condition' => is_plugin_inactive( 'persian-woocommerce-shipping-pro/pws-pro.php' ),
				'dismiss'   => 3 * DAY_IN_SECONDS,
			],

			[
				'id'        => 'pws_pro_zone',
				'content'   => '<b>حمل و نقل حرفه‌ای:</b> براساس شهرها مناطق حمل و نقل تعریف کنید، از نرخ ثابت حرفه‌ای بهره ببرید، برای آن‌ها شرط‌های متنوع و مختلف بگذارید و حمل و نقل فروشگاه‌تان را کاملا مدیریت کنید. <a href="' . PWS()->pws_pro_url( 'zone' ) . '" target="_blank">مشاهده امکانات حمل و نقل حرفه‌ای</a>',
				'condition' => $tab == 'shipping' && is_plugin_inactive( 'persian-woocommerce-shipping-pro/pws-pro.php' ),
				'dismiss'   => 6 * MONTH_IN_SECONDS,
			],
			[
				'id'        => 'tapin_shipping',
				'content'   => '<b>تاپین:</b> هزینه پست سفارشی و پیشتاز را بصورت دقیق محاسبه کنید و بدون مراجعه به پست، بارکد پستی بگیرید و بسته هایتان را ارسال کنید. از <a href="https://yun.ir/pwsts" target="_blank">اینجا</a> راهنمای نصب و پیکربندی آن را مطالعه کنید.',
				'condition' => ! PWS_Tapin::is_enable() && $page == 'wc-settings' && $tab == 'shipping',
				'dismiss'   => 6 * MONTH_IN_SECONDS,
			],
			[
				'id'        => 'woocommerce_invoice',
				'content'   => '<b>فاکتور ووکامرس:</b> برای چاپ برچسب پستی و فاکتورهای سفارش هایتان <a href="https://yun.ir/mwooi" target="_blank">افزونه فاکتور حرفه ای ووکامرس</a> را امتحان کنید!',
				'condition' => ! PWS_Tapin::is_enable() && is_plugin_inactive( 'woocommerce-invoice/woocommerce-invoice.php' ),
				'dismiss'   => 6 * MONTH_IN_SECONDS,
			],
			[
				'id'        => 'pws_video',
				'content'   => '<b>آموزش:</b> برای پیکربندی حمل و نقل می توانید از <a href="https://yun.ir/pwsvideo" target="_blank">اینجا</a> فیلم های آموزشی افزونه را مشاهده کنید.',
				'condition' => class_exists( 'WC_Shipping_Zones' ) && ! count( WC_Shipping_Zones::get_zones() ),
				'dismiss'   => 6 * MONTH_IN_SECONDS,
			],
			[
				'id'        => 'woocommerce_invoice_tapin',
				'content'   => '<b>فاکتور ووکامرس:</b> برای چاپ برچسب های استاندارد پستی تاپین نیاز به <a href="https://yun.ir/twooi" target="_blank">افزونه فاکتور حرفه ای ووکامرس</a> دارید. لطفا آن را تهیه، نصب و فعال نمایید.',
				'condition' => PWS_Tapin::is_enable() && is_plugin_inactive( 'woocommerce-invoice/woocommerce-invoice.php' ),
				'dismiss'   => false,
			],
		];

		$_notices = get_option( 'pws_notices', [] );

		foreach ( $_notices['notices'] ?? [] as $_notice ) {

			$_notice['condition'] = 1;

			$rules = $_notice['rules'];

			if ( isset( $rules['pagenow'] ) && $rules['pagenow'] != $pagenow ) {
				$_notice['condition'] = 0;
			}

			if ( isset( $rules['page'] ) && $rules['page'] != $page ) {
				$_notice['condition'] = 0;
			}

			if ( isset( $rules['tab'] ) && $rules['tab'] != $tab ) {
				$_notice['condition'] = 0;
			}

			if ( isset( $rules['active'] ) && is_plugin_inactive( $rules['active'] ) ) {
				$_notice['condition'] = 0;
			}

			if ( isset( $rules['inactive'] ) && is_plugin_active( $rules['inactive'] ) ) {
				$_notice['condition'] = 0;
			}

			if ( isset( $rules['tapin'] ) && $rules['tapin'] != PWS_Tapin::is_enable() ) {
				$_notice['condition'] = 0;
			}

			unset( $_notice['rules'] );

			array_unshift( $notices, $_notice );
		}

		return $notices;
	}

	public function dismiss_notice() {

		check_ajax_referer( 'pws_dismiss_notice', 'nonce' );

		$this->set_dismiss( $_POST['notice'] );

		die();
	}

	public function update_notice() {

		$update = get_transient( 'pws_update_notices' );

		if ( $update ) {
			return;
		}

		set_transient( 'pws_update_notices', 1, DAY_IN_SECONDS / 10 );

		check_ajax_referer( 'pws_update_notice', 'nonce' );

		$notices = wp_remote_get( 'https://wpnotice.ir/pws.json', [ 'timeout' => 5, ] );
		$sign    = wp_remote_get( 'https://wphash.ir/pws.hash', [ 'timeout' => 5, ] );

		if ( is_wp_error( $notices ) || is_wp_error( $sign ) ) {
			die();
		}

		if ( ! is_array( $notices ) || ! is_array( $sign ) ) {
			die();
		}

		$notices = trim( $notices['body'] );
		$sign    = trim( $sign['body'] );

		if ( sha1( $notices ) !== $sign ) {
			die();
		}

		$notices = json_decode( $notices, JSON_OBJECT_AS_ARRAY );

		if ( empty( $notices ) || ! is_array( $notices ) ) {
			die();
		}

		foreach ( $notices['notices'] as &$_notice ) {

			$doc     = new DOMDocument();
			$content = strip_tags( $_notice['content'], '<p><a><b><img><ul><ol><li>' );
			$content = str_replace( [ 'javascript', 'java', 'script' ], '', $content );
			$doc->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );

			foreach ( $doc->getElementsByTagName( '*' ) as $element ) {

				$href  = null;
				$src   = null;
				$style = $element->getAttribute( 'style' );

				if ( $element->nodeName == 'a' ) {
					$href = $element->getAttribute( 'href' );
				}

				if ( $element->nodeName == 'img' ) {
					$src = $element->getAttribute( 'src' );
				}

				foreach ( $element->attributes as $attribute ) {
					$element->removeAttribute( $attribute->name );
				}

				if ( $href && filter_var( $href, FILTER_VALIDATE_URL ) ) {
					$element->setAttribute( 'href', $href );
					$element->setAttribute( 'target', '_blank' );
				}

				if ( $src && filter_var( $src, FILTER_VALIDATE_URL ) && strpos( $src, 'https://repo.nabik.net' ) === 0 ) {
					$element->setAttribute( 'src', $src );
				}

				if ( $style ) {
					$element->setAttribute( 'style', $style );
				}
			}

			$_notice['content'] = $doc->saveHTML();
		}

		update_option( 'pws_notices', $notices );

		die();
	}

	public function set_dismiss( string $notice_id ) {

		$notices = wp_list_pluck( $this->notices(), 'dismiss', 'id' );

		if ( isset( $notices[ $notice_id ] ) && $notices[ $notice_id ] ) {
			set_transient( 'pws_notice_' . $notice_id, 'DISMISS', intval( $notices[ $notice_id ] ) );
			set_transient( 'pws_notice_all', 'DISMISS', HOUR_IN_SECONDS );
		}
	}

	public function is_dismiss( $notice_id ): bool {
		return get_transient( 'pws_notice_' . $notice_id ) !== false;
	}

}

new PWS_Notice();