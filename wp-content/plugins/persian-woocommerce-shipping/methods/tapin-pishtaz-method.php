<?php
/**
 * Developer : MahdiY
 * Web Site  : MahdiY.IR
 * E-Mail    : M@hdiY.IR
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'Tapin_Pishtaz_Method' ) ) {
	return;
} // Stop if the class already exists

/**
 * Class WC_Tapin_Method
 *
 * @author mahdiy
 *
 */
class Tapin_Pishtaz_Method extends PWS_Tapin_Method {

	protected $method = 'pishtaz';

	public function __construct( $instance_id = 0 ) {

		$this->id                 = 'Tapin_Pishtaz_Method';
		$this->instance_id        = absint( $instance_id );
		$this->method_title       = __( 'پست تاپین - پیشتاز' );
		$this->method_description = 'پیشخوان مجازی تاپین - ارسال کالا با استفاده از پست پیشتاز';

		parent::__construct();
	}
}
