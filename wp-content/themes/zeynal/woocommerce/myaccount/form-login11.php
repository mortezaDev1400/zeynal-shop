<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
<div class="userj">
<div class="voroodbadge">
</div>
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set login-wrapper" id="customer_login">

	<div class="u-column1 col-1">
<div class="karbarij">
<h3>سلام کاربر عزیز</h3>
<li>لطفا از مرورگرهای مطمئن و بروز مانند گوگل کروم و فایرفاکس استفاده کنید.</li>
<li>لطفا کلمه عبور خود را در فواصل زمانی کوتاه تغییر دهید.</li>
<li>ما هرگز اطلاعات محرمانه شما را از طریق ایمیل درخواست نمی کنیم. در صورت رخداد این مورد، سریعا اطلاع دهید.</li>
<li>لطفا به آدرس صفحه توجه داشته باشید که بر روی دامنه اصلی سایت ما باشد. در غیر این صورت اکیدا توصیه می‌شود از وارد کردن اطلاعات ورود خودداری فرمایید.</li>
</div>
	</div>




	<div class="u-column2 col-2 hjsfdkgsdf">
<div id="London" class="tabcontent">

		<h2 class="onvanij">عضویت در سایت</h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<i class="mdi mdi-account-outline"></i>
					<input placeholder="نام کاربری" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<i class="mdi mdi-email"></i>
				<input placeholder="آدرس ایمیل" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<i class="mdi mdi-lock-open-outline"></i>
					<input placeholder="کلمه عبور" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>


			<?php endif; ?>


				<p class="woocommerce-FormRow form-row">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'عضویت', '' ); ?>"><?php esc_html_e( 'عضویت', '' ); ?></button>
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
			
			<div class="leading">
			<span>قبلا ثبت‌نام کرده‌اید؟</span>
            <button class="tablinks" onclick="openCity(event, 'Paris')" id="reg-btn">وارد شوید</button>
		</div>	

	

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>
	


<div id="Paris" class="tabcontent" style="display: block;">
<?php endif; ?>

		<h2 class="onvanij">ورود به حساب کاربری</h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<i class="mdi mdi-email"></i>				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="نام کاربری یا آدرس ایمیل *" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<i class="mdi mdi-lock-open-outline"></i>
				<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="رمز عبور *" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'ورود', 'studiare' ); ?>"><?php esc_html_e( 'ورود', 'studiare' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password password-remember">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'مرا به خاطر داشته باش', 'studiare' ); ?></span>
                </label>
				<a class="faramooshi" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'رمز عبور را فراموش کرده اید؟', 'studiare' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>	
		<div class="leading">
				<span>کاربر جدید هستید؟</span>
				<button class="tablinks" onclick="openCity(event, 'London')" id="reg-btn">ثبت&zwnj;نام</button>
			</div>
	

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
</div>
</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>
<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 
</script>