<?php
/**
 * Developer : MahdiY
 * Web Site  : MahdiY.IR
 * E-Mail    : M@hdiY.IR
 */

class PWS_Settings_Tools extends PWS_Settings {

	protected static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function get_sections(): array {
		return apply_filters( 'pws_settings_sections', [
			[
				'id'    => 'pws_tools',
				'title' => 'ابزارهای کاربردی',
			],
		] );
	}

	public function get_fields(): array {

		$has_pro = defined( 'PWS_PRO_VERSION' );

		return apply_filters( 'pws_settings_fields', [
			'pws_tools' => [
				[
					'name' => 'html',
					'desc' => '<b>آموزش:</b> برای پیکربندی حمل و نقل می توانید از <a href="https://yun.ir/pwsvideo" target="_blank">اینجا</a> فیلم های آموزشی افزونه را مشاهده کنید.',
					'type' => 'html',
				],
				[
					'label'   => 'وضعیت سفارشات کمکی',
					'name'    => 'status_enable',
					'default' => '0',
					'type'    => 'checkbox',
					'desc'    => 'جهت مدیریت بهتر سفارشات فروشگاه، وضعیت های زیر به پنل اضافه خواهد شد.
					<ol>
						<li>ارسال شده به انبار</li>
						<li>بسته بندی شده</li>
						<li>تحویل پیک</li>
					</ol>
					',
				],
				[
					'label'   => 'فقط روش ارسال رایگان',
					'name'    => 'hide_when_free',
					'default' => '0',
					'type'    => 'checkbox',
					'desc'    => 'در صورتی که یک روش ارسال رایگان در دسترس باشد، بقیه روش های ارسال مخفی می شوند.',
				],
				[
					'label'   => 'فقط روش ارسال پیک موتوری',
					'name'    => 'hide_when_courier',
					'default' => '0',
					'type'    => 'checkbox',
					'desc'    => 'در صورتی که پیک موتوری برای کاربر در دسترس باشد، بقیه روش های ارسال مخفی می شوند.',
				],
				[
					'label'   => 'وزن پیشفرض هر محصول',
					'name'    => 'product_weight',
					'default' => 0,
					'type'    => 'number',
					'desc'    => "در صورتی که برای محصول وزنی وارد نشده بود، بصورت پیشفرض وزن محصول چند گرم در نظر گرفته شود؟",
				],
				[
					'label'   => 'وزن بسته بندی',
					'name'    => 'package_weight',
					'default' => 0,
					'type'    => 'number',
					'desc'    => "بطور میانگین وزن بسته بندی ها چند گرم در نظر گرفته شود؟",
				],
				[
					'label'   => 'محدودیت وزنی ارسال پستی',
					'name'    => 'post_weight_limit',
					'default' => 30000,
					'type'    => 'number',
					'desc'    => "روش‌های ارسال پستی، برای سبدهای خرید با وزن بالای این مقدار (به گرم) مخفی خواهند شد. (اداره پست بسته‌های بالای ۳۰،۰۰۰ گرم ارسال نمی‌کند)",
				],
				[
					'label'   => 'جابه‌جایی فیلد استان و شهر',
					'name'    => 'swap_state_city_field',
					'default' => 0,
					'type'    => 'checkbox',
					'desc'    => 'در صفحه‌ی تسویه حساب، فیلد استان بالای فیلد شهر قرار می‌گیرد. ' . ( $has_pro ? '' : '(این امکان فقط در <a href="' . PWS()->pws_pro_url( 'swap_state_city_field' ) . '" target="_blank">نسخه حرفه‌ای</a> فعال می‌باشد)' ),
				],
				[
					'label'   => 'حذف حمل و نقل پیشفرض',
					'name'    => 'remove_chosen_shipping_method',
					'default' => 0,
					'type'    => 'checkbox',
					'desc'    => 'به صورت پیشفرض هیچ یک از روش‌های حمل و نقل انتخاب (فعال) نخواهند شد. ' . ( $has_pro ? '' : '(این امکان فقط در <a href="' . PWS()->pws_pro_url( 'remove_chosen_shipping_method' ) . '" target="_blank">نسخه حرفه‌ای</a> فعال می‌باشد)' ),
				],
			],
		] );
	}

	public static function output() {

		$instance = self::instance();

		echo '<div class="wrap">';

		$instance->show_navigation();
		$instance->show_forms();

		echo '</div>';
	}
}