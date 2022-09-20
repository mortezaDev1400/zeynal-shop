<?php
/**
 * The admin field forms functionalities.
 *
 * @link       https://themehigh.com
 * @since      3.1.4
 *
 * @package    woocommerce-checkout-field-editor-pro
 * @subpackage woocommerce-checkout-field-editor-pro/admin
 */
if(!defined('WPINC')){	die; }

if(!class_exists('THWCFE_Admin_Form_Field')):

class THWCFE_Admin_Form_Field extends THWCFE_Admin_Form{
	private $field_props = array();

	public function __construct() {
		$this->init_constants();
	}

	private function init_constants(){
		$this->field_props = $this->get_field_form_props();
		//$this->field_props_display = $this->get_field_form_props_display();
	}

	private function get_field_types(){
		return array(
			'text' => 'متن', 
			'hidden' => 'پنهان', 
			'password' => 'پسورد', 
			'tel' => 'تلفن', 
			'email' => 'ایمیل', 
			'number' => 'شماره',  
			'textarea' => 'ناحیه متن', 
			'select' => 'انتخابی', 
			'multiselect' => 'چند انتخابی', 
			'radio' => 'رادیویی', 
			'checkbox' => 'چک باکس', 
			'checkboxgroup' => 'گروه چک باکس', 
			'datepicker' => 'انتخاب کننده تاریخ (شمسی)', 
			'datetime_local' => 'تاریخ محلی',
			'date' => 'تاریخ', 
			'timepicker' => 'انتخاب کننده زمان', 
			'time'=>'زمان',
			'month' => 'ماه', 
			'week' => 'هفته', 
			'file' => 'آپلود فایل', 
			'heading' => 'عنوان', 
			'paragraph' => 'پاراگراف', 
			'label' => 'برچسب',
			'url' => 'آدرس اینترنتی',
			
		);
	}

	public function get_field_form_props(){
		$field_types = $this->get_field_types();
		
		$validations = array(
			'email' => 'Email',
			'phone' => 'Phone',
			'postcode' => 'Postcode',
			'state' => 'State',
			'number' => 'Number',
			'url'   => 'Url',
		);
		$custom_validators = THWCFE_Utils::get_settings('custom_validators');
		if(is_array($custom_validators)){
			foreach( $custom_validators as $vname => $validator ) {
				$validations[$vname] = $validator['label'];
			}
		}
		
		$confirm_validators = THWCFE_Utils::get_settings('confirm_validators');
		if(is_array($confirm_validators)){
			foreach( $confirm_validators as $vname => $validator ) {
				$validations[$vname] = $validator['label'];
			}
		}
		
		$price_types = array(
			'normal' => 'ثابت',
			'custom' => 'سفارشی',
			'percentage' => 'درصدی از مجموع محتویات سبد خرید',
			'percentage_subtotal' => ' درصدی از قیمت فرعی ',
			'percentage_subtotal_ex_tax' => 'درصدی از مالیات فرعی',
			'dynamic' => 'پویا',
		);
		
		$week_days = array(
			'sun' => 'یکشنبه',
			'mon' => 'دوشنبه',
			'tue' => 'سه شنبه',
			'wed' => 'چهار شنبه',
			'thu' => 'پنج شنبه',
			'fri' => 'جمعه',
			'sat' => 'شنبه',
		);
		
		$html_text_tags = $this->get_html_text_tags();
		//$title_positions = array( 'left' => 'Left of the field', 'above' => 'Above field', );
		
		$time_formats = array(
			'h:i A' => 'فرمت 12 ساعته',
			'H:i' => 'فرمت 24 ساعته',
		);

		$suffix_types = array(
			'number' => 'شماره',
			'alphabet' => 'الفبا',
			'none' => 'هیچکدام',
		);

		$suffix_types_1 = array(
			'number' => 'شماره',
			'alphabet' => 'الفبا',
		);

		$reserved_names = array('address');
		$hint_name_arr[] = "نامهای فیلدی که پیشوند آن صورتحساب یا ارسال است ، بطور خودکار با مقادیر فیلد سفارش قبلی پر می شوند.";
		$hint_name_arr[] = "برخی از نام های فیلد محفوظ است و استفاده از آن خطاهای غیرمنتظره ای ایجاد می کند.";
		$hint_name_arr[] = "Eg: ". implode(', ', $reserved_names);
		$hint_name = implode('. ', $hint_name_arr);
		
		$hint_accept = "تعیین انواع فایل های مجاز با کاما (مانند png ، jpg ، docx ، pdf).";
		
		$hint_price = "در صورت مشمول مالیات ، همیشه بدون مالیات قیمت را وارد کنید.";
		$hint_default_date = "تعیین تاریخ در تاریخ فعلی ، به عنوان مثال ' +1 m +7d') ، یا برای امروز خالی بگذارید.";
		$hint_date_format = "قالب تاریخ تجزیه و نمایش داده شده.";
		$hint_min_date = "حداقل تاریخ انتخابی تعیین تاریخ در قالب yyyy-mm-dd ، یا تعداد روزهای امروز (به عنوان مثال -7) یا یک رشته از مقادیر و دوره ها ('y' برای سالها ، 'm' برای ماهها ، 'w' برای هفته ها ، 'd 'برای روزها ، به عنوان مثال' -1m -7d ') ، یا بدون حداقل محدود خالی بگذارید.";
		$hint_max_date = "حداکثر تاریخ انتخابی تاریخ را در قالب yyyy-mm-dd ، یا تعداد روزهای امروز";
		$hint_year_range = "محدوده سالهای نمایش داده شده در سال کشویی سال: یا نسبت به سال امروز ('-nn:+nn' -5: +3) ، نسبت به سال انتخاب شده فعلی ('c-nn: c+nn' به عنوان مثال c-10: c+10) ، مطلق ('nnnn: nnnn' به عنوان مثال 2002: 2012) ، یا ترکیبی از این قالب ها ('nnnn:+nn' به عنوان مثال 2002: +3). توجه داشته باشید که این گزینه فقط بر روی مواردی که در کشویی ظاهر می شود تأثیر می گذارد ، برای محدود کردن تاریخ هایی که ممکن است انتخاب شوند از گزینه های minDate و/یا maxDate استفاده کنید.";
		$hint_number_of_months = "تعداد ماههایی که به یکباره نشان داده می شود.";
		$hint_disabled_dates = "تاریخها را در قالب yyyy-mm-dd با کاما جدا کنید.";
		$hint_html_default_datetime = "مقدار تاریخ/زمان را در قالب YYYY-MM-DDThh:mm مشخص کنید.";
		$hint_min_html_datetime = "مقدار حداقل تاریخ/زمان را در قالب YYYY-MM-DDThh:mm تعیین کنید. بدون حداقل محدودیت خالی بگذارید.";
		$hint_max_html_datetime = "مقدار حداقل تاریخ/زمان را در قالب YYYY-MM-DDThh:mm تعیین کنید. بدون حداکثر محدودیت خالی بگذارید.";
		$hint_html_default_date = "مقدار تاریخ را در قالب yyyy-mm-dd مشخص کنید.";
		$hint_min_html_date = "مقدار حداقل تاریخ را در قالب yyyy-mm-dd مشخص کنید. بدون حداقل محدودیت خالی بگذارید..";
		$hint_max_html_date = "حداکثر مقدار تاریخ را در قالب yyyy-mm-dd مشخص کنید. بدون حداکثر محدودیت خالی بگذارید.";
		$hint_html_default_time = "زمان ورودی را با فرمت hh:mm مشخص کنید و مقدار ورودی همیشه در قالب 24 ساعته باشد.";
		$hint_min_html_time = "مقدار زمان حداقل را در قالب hh:mm مشخص کنید. بدون حداقل محدودیت خالی بگذارید. ";
		$hint_max_html_time = "حداکثر مقدار زمان را در قالب hh:mm تعیین کنید. بدون حداکثر محدودیت خالی بگذارید.";
		$hint_html_default_month = "ورودی ماه را با فرمت yyyy-MM مشخص کنید.";
		$hint_min_html_month = "مقدار حداقل ماه را در قالب yyyy-MM مشخص کنید. بدون حداقل محدودیت خالی بگذارید.";
		$hint_max_html_month = "حداکثر مقدار ماه را در قالب yyyy-MM مشخص کنید. بدون حداکثر محدودیت خالی بگذارید.";
		$hint_html_default_week = "ورودی هفته را در قالب yyyy-Www مشخص کنید، به عنوان مثال: 2017-W01.";
		$hint_min_html_week = "مقدار حداقل هفته را در قالب yyyy-Www مشخص کنید. بدون حداقل محدودیت خالی بگذارید.";
		$hint_max_html_week = "حداکثر مقدار هفته را در قالب yyyy-Www مشخص کنید. بدون حداکثر محدودیت خالی بگذارید.";

		return array(
			'name' 		  => array('type'=>'text', 'name'=>'name', 'label'=>'Name', 'required'=>1, 'hint_text'=>$hint_name),
			'type' 		  => array('type'=>'select', 'name'=>'type', 'label'=>'نوع فیلد', 'required'=>1, 'options'=>$field_types, 'onchange'=>'thwcfeFieldTypeChangeListner(this)'),
								
			'value' 	  => array('type'=>'text', 'name'=>'value', 'label'=>'مقدار پیش فرض'),
			'placeholder' => array('type'=>'text', 'name'=>'placeholder', 'label'=>'نگهدارنده مکان'),
			'description' => array('type'=>'text', 'name'=>'description', 'label'=>'شرح'),
			'validate'    => array('type'=>'multiselect', 'name'=>'validate', 'label'=>'اعتبارسنجی ها', 'placeholder'=>'اعتبارسنجی ها را انتخاب کنید', 'options'=>$validations),
			'cssclass'    => array('type'=>'text', 'name'=>'cssclass', 'label'=>'دسته بندی کلاس', 'placeholder'=>'کلاسها را با کاما جدا کنید', 'value'=>'به شکل ردیف گسترده'),
			'input_class' => array('type'=>'text', 'name'=>'input_class', 'label'=>'ورودی کلاس', 'placeholder'=>'کلاسها را با کاما جدا کنید'),
			
			'price'        => array('type'=>'text', 'name'=>'price', 'label'=>'قیمت', 'placeholder'=>'قیمت', 'hint_text'=>$hint_price),
			'price_unit'   => array('type'=>'text', 'name'=>'price_unit', 'label'=>'واحد', 'placeholder'=>'واحد'),
			'price_type'   => array('type'=>'select', 'name'=>'price_type', 'label'=>'نوع قیمت', 'options'=>$price_types, 'onchange'=>'thwcfePriceTypeChangeListener(this)'),
			'taxable'      => array('type'=>'select', 'name'=>'taxable', 'label'=>'مشمول مالیات', 'options'=>array('no' => 'No', 'yes' => 'Yes')),
			'tax_class'    => array('type'=>'select', 'name'=>'tax_class', 'label'=>'کلاس مالیات', 'options'=>THWCFE_Utils::get_product_tax_class_options()),
			
			'order_meta' => array('type'=>'checkbox', 'name'=>'order_meta', 'label'=>'سفارش داده های متا', 'value'=>'yes', 'checked'=>1),
			'user_meta'  => array('type'=>'checkbox', 'name'=>'user_meta', 'label'=>'متا داده کاربر', 'value'=>'yes', 'checked'=>0),
			
			'checked'   => array('type'=>'checkbox', 'name'=>'checked', 'label'=>'به طور پیش فرض بررسی شده است', 'value'=>'yes', 'checked'=>1),
			'required'  => array('type'=>'checkbox', 'name'=>'required', 'label'=>'ضروری', 'value'=>'yes', 'checked'=>0, 'status'=>1),
			'clear' 	=> array('type'=>'checkbox', 'name'=>'clear', 'label'=>'پاک کردن ردیف', 'value'=>'yes', 'checked'=>0, 'status'=>1),
			'enabled'   => array('type'=>'checkbox', 'name'=>'enabled', 'label'=>'فعال شد', 'value'=>'yes', 'checked'=>1, 'status'=>1),
			
			'show_in_email' => array('type'=>'checkbox', 'name'=>'show_in_email', 'label'=>'نمایش در ایمیل های سرپرست', 'value'=>'yes', 'checked'=>1),
			'show_in_email_customer' => array('type'=>'checkbox', 'name'=>'show_in_email_customer', 'label'=>'نمایش در ایمیل های مشتری', 'value'=>'yes', 'checked'=>1),
			'show_in_order' => array('type'=>'checkbox', 'name'=>'show_in_order', 'label'=>'نمایش در صفحات جزئیات سفارش', 'value'=>'yes', 'checked'=>1),
			'show_in_thank_you_page' => array('type'=>'checkbox', 'name'=>'show_in_thank_you_page', 'label'=>'نمایش در صفحه تشکر', 'value'=>'yes', 'checked'=>1),
			'show_in_my_account_page' => array('type'=>'checkbox', 'name'=>'show_in_my_account_page', 'label'=>'در صفحه حساب من نمایش داده شود', 'value'=>'yes', 'checked'=>0),
			
			'title'          => array('type'=>'text', 'name'=>'title', 'label'=>'برچسب'),
			'title_type'     => array('type'=>'select', 'name'=>'title_type', 'label'=>'نوع انواع', 'value'=>'h3', 'options'=>$html_text_tags),
			'title_color'    => array('type'=>'colorpicker', 'name'=>'title_color', 'label'=>'عنوان رنگ'),
			'title_class'    => array('type'=>'text', 'name'=>'title_class', 'label'=>'کلاس برچسب', 'placeholder'=>'کلاسها را با کاما جدا کنید'),
			
			'subtitle'       => array('type'=>'text', 'name'=>'subtitle', 'label'=>'عنوان فرعی'),
			'subtitle_type'  => array('type'=>'select', 'name'=>'subtitle_type', 'label'=>'نوع زیرنویس', 'value'=>'label', 'options'=>$html_text_tags),
			'subtitle_color' => array('type'=>'colorpicker', 'name'=>'subtitle_color', 'label'=>'رنگ زیرنویس'),
			'subtitle_class' => array('type'=>'text', 'name'=>'subtitle_class', 'label'=>'کلاس زیرنویس', 'placeholder'=>'کلاسها را با کاما جدا کنید'),
			
			'minlength'   => array('type'=>'text', 'name'=>'minlength', 'label'=>'حداقل طول', 'hint_text'=>'حداقل تعداد کاراکتر مجاز'),
			'maxlength'   => array('type'=>'text', 'name'=>'maxlength', 'label'=>'حداکثر طول', 'hint_text'=>'حداکثر تعداد کاراکتر مجاز'),
			//'repeat_x'    => array('type'=>'text', 'name'=>'repeat_x', 'label'=>'Repeat X'),
			
			'maxsize' => array('type'=>'text', 'name'=>'maxsize', 'label'=>'حداکثر (مگابایت)'),
			'accept'  => array('type'=>'text', 'name'=>'accept', 'label'=>'انواع فایل های پذیرفته شده', 'placeholder'=>'eg: png,jpg,docx,pdf', 'hint_text'=>$hint_accept),

			'autocomplete' 	=> array('type'=>'text', 'name'=>'autocomplete', 'label'=>'تکمیل خودکار'),
			'country_field' => array('type'=>'text', 'name'=>'country_field', 'label'=>'نام فیلد کشور'),
			'کشور' 		=> array('type'=>'text', 'name'=>'country', 'label'=>'کشور'),
						
			'default_date' => array('type'=>'text','name'=>'default_date', 'label'=>'تاریخ پیش فرض','placeholder'=>"برای تاریخ امروز خالی بگذارید",'hint_text'=>$hint_default_date),
			'date_format'  => array('type'=>'text', 'name'=>'date_format', 'label'=>'فرمت تاریخ', 'value'=>'dd/mm/yy', 'hint_text'=>$hint_date_format),
			'min_date'     => array('type'=>'text', 'name'=>'min_date', 'label'=>'کمترین تاریخ', 'placeholder'=>'کمترین تاریخ انتخابی', 'hint_text'=>$hint_min_date),
			'max_date'     => array('type'=>'text', 'name'=>'max_date', 'label'=>'حداکثر تاریخ', 'placeholder'=>'حداکثر تاریخ انتخابی', 'hint_text'=>$hint_max_date),
			'year_range'   => array('type'=>'text', 'name'=>'year_range', 'label'=>'محدوده سال', 'value'=>'-100:+1', 'hint_text'=>$hint_year_range),
			'number_of_months' => array('type'=>'text', 'name'=>'number_of_months', 'label'=>'تعداد ماه ها', 'value'=>'1', 'hint_text'=>$hint_number_of_months),
			'disabled_days'  => array('type'=>'multiselect', 'name'=>'disabled_days', 'label'=>'روز های غیر فعال', 'placeholder'=>'روزها را برای غیرفعال کردن انتخاب کنید', 'options'=>$week_days),
			'disabled_dates' => array('type'=>'text', 'name'=>'disabled_dates', 'label'=>'تاریخ های غیرفعال', 'placeholder'=>'تاریخ را با کاما جدا کنید', 
			'hint_text'=>$hint_disabled_dates),
			
			'min_time'    => array('type'=>'text', 'name'=>'min_time', 'label'=>'حداقل زمان', 'value'=>'12:00am', 'sub_label'=>'ex: 12:30am'),
			'max_time'    => array('type'=>'text', 'name'=>'max_time', 'label'=>'حداکثر زمان', 'value'=>'11:30pm', 'sub_label'=>'ex: 11:30pm'),
			'start_time'  => array('type'=>'text', 'name'=>'start_time', 'label'=>'زمان شروع', 'value'=>'', 'sub_label'=>'ex: 2h 30m'),
			'time_step'   => array('type'=>'text', 'name'=>'time_step', 'label'=>'مرحله زمان', 'value'=>'30', 'sub_label'=>'In minutes, ex: 30'),
			'time_format' => array('type'=>'select', 'name'=>'time_format', 'label'=>'فرمت زمان', 'value'=>'h:i A', 'options'=>$time_formats),
			'linked_date' => array('type'=>'text', 'name'=>'linked_date', 'label'=>'تاریخ پیوند'),

			'rpt_name_suffix' => array('type'=>'select', 'name'=>'rpt_name_suffix', 'label'=>'پسوند نام', 'options'=>$suffix_types_1),
			'rpt_label_suffix' => array('type'=>'select', 'name'=>'rpt_label_suffix', 'label'=>'پسوند برچسب', 'options'=>$suffix_types),
			'rpt_incl_parent' => array('type'=>'checkbox', 'name'=>'rpt_incl_parent', 'label'=>'نمایه سازی را از والدین شروع کنید', 'value'=>'yes', 'checked'=>0),

			'inherit_display_rule' => array('type'=>'checkbox', 'name'=>'inherit_display_rule', 'label'=>'وراثت قوانین و قوانین نمایش مبتنی بر کاربر', 'value'=>'yes', 'checked'=>1),
			'inherit_display_rule_ajax' => array('type'=>'checkbox', 'name'=>'inherit_display_rule_ajax', 'label'=>'فیلد قوانین نمایش مبتنی بر وراثت', 'value'=>'yes', 'checked'=>1),
			'auto_adjust_display_rule_ajax' => array('type'=>'checkbox', 'name'=>'auto_adjust_display_rule_ajax', 'label'=>'قوانین نمایش را بر اساس فیلدهای موجود در همان قسمت تنظیم کنید', 'value'=>'yes', 'checked'=>1),

			'html_default_datetime' => array('type'=>'text','name'=>'html_default_datetime', 'label'=>'تاریخ پیش فرض','hint_text'=>$hint_html_default_datetime),
			'min_html_datetime' => array('type'=>'text','name'=>'min_html_datetime', 'label'=>'حداقل تاریخ','hint_text'=>$hint_min_html_datetime),
			'max_html_datetime' => array('type'=>'text','name'=>'max_html_datetime', 'label'=>'حداکثر تاریخ','hint_text'=>$hint_max_html_datetime),
			'html_default_date' => array('type'=>'text','name'=>'html_default_date', 'label'=>'تاریخ پیش فرض','hint_text'=>$hint_html_default_date),
			'min_html_date' => array('type'=>'text','name'=>'min_html_date', 'label'=>'حداقل تاریخ','hint_text'=>$hint_min_html_date),
			'max_html_date' => array('type'=>'text','name'=>'max_html_date', 'label'=>'حداکثر تاریخ','hint_text'=>$hint_max_html_date),
			'html_default_time' => array('type'=>'text','name'=>'html_default_time', 'label'=>'زمان پیش فرض','hint_text'=>$hint_html_default_time),
			'min_html_time' => array('type'=>'text','name'=>'min_html_time', 'label'=>'حداقل زمان','hint_text'=>$hint_min_html_time),
			'max_html_time' => array('type'=>'text','name'=>'max_html_time', 'label'=>'حداکثر زمان','hint_text'=>$hint_max_html_time),
			'html_default_month' => array('type'=>'text','name'=>'html_default_month', 'label'=>'ماه پیش فرض','hint_text'=>$hint_html_default_month),
			'min_html_month' => array('type'=>'text','name'=>'min_html_month', 'label'=>'حداقل ماه','hint_text'=>$hint_min_html_month),
			'max_html_month' => array('type'=>'text','name'=>'max_html_month', 'label'=>'حداکثر ماه','hint_text'=>$hint_max_html_month),
			'html_default_week' => array('type'=>'text','name'=>'html_default_week', 'label'=>'هفته پیش فرض','hint_text'=>$hint_html_default_week),
			'min_html_week' => array('type'=>'text','name'=>'min_html_week', 'label'=>'حداقل هفته','hint_text'=>$hint_min_html_week),
			'max_html_week' => array('type'=>'text','name'=>'max_html_week', 'label'=>'حداکثر هفته','hint_text'=>$hint_max_html_week),
			'disable_select2' => array('name'=>'disable_select2', 'label'=>'"انتخاب پیشرفته (انتخاب2)" را غیرفعال کنید.', 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0),
			// 'enable_country_code' => array('name'=>'enable_country_code', 'label'=>'Enable country code', 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0),
		);
	}

	public function get_field_form_props_display(){
		return array(
			'name'  => array('name'=>'name', 'type'=>'text'),
			'type'  => array('name'=>'type', 'type'=>'select'),
			'title' => array('name'=>'title', 'type'=>'text', 'len'=>40),
			'placeholder' => array('name'=>'placeholder', 'type'=>'text', 'len'=>30),
			'validate' => array('name'=>'validate', 'type'=>'text'),
			'required' => array('name'=>'required', 'type'=>'checkbox', 'status'=>1),
			'enabled'  => array('name'=>'enabled', 'type'=>'checkbox', 'status'=>1),
		);
	}

	public function output_field_forms(){
		$this->output_field_form_pp();
		$this->output_form_fragments();
		// $this->render_form_fragment_options();
	}

	private function output_field_form_pp(){
		?>
        <div id="thwcfe_field_form_pp" class="thpladmin-modal-mask">
          <?php $this->output_popup_form_fields();
          ?>
        </div>
        <?php
	}

	/*****************************************/
	/********** POPUP FORM WIZARD ************/
	/*****************************************/
	private function output_popup_form_fields(){
		?>
		<div class="thpladmin-modal">
			<div class="modal-container">
				<span class="modal-close" onclick="thwcfeCloseModal(this)">×</span>
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-wizard wizard">
							<aside>
								<side-title class="wizard-title">ذخیره فیلد</side-title>
								<ul class="pp_nav_links">
									<li class="text-primary active first pp-nav-link-basic" data-index="0">
										<i class="dashicons dashicons-admin-generic text-primary"></i>اطلاعات پایه
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary pp-nav-link-styles" data-index="1">
										<i class="dashicons dashicons-art text-primary"></i>نمایش سبک ها
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<!--<li class="text-primary pp-nav-link-tooltip" data-index="2">
										<i class="dashicons dashicons-admin-comments text-primary"></i>Tooltip Details
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>-->
									<li class="text-primary pp-nav-link-price" data-index="2">
										<i class="dashicons dashicons-cart text-primary"></i>جزئیات قیمت
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary pp-nav-link-rules" data-index="3">
										<i class="dashicons dashicons-filter text-primary"></i>نمایش قوانین
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary last" data-index="4">
										<i class="dashicons dashicons-controls-repeat text-primary"></i>تکرار قوانین
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
								</ul>
							</aside>
							<main class="form-container main-full">
								<form method="post" id="thwcfe_field_form" action="">
									<input type="hidden" name="f_action" value="" />
									<input type="hidden" name="i_name_old" value="" >
									<input type="hidden" name="i_order" value="" >
									<input type="hidden" name="i_priority" value="" >
			                        <input type="hidden" name="i_options" value="" >
									<input type="hidden" name="i_rules" value="" >
									<input type="hidden" name="i_rules_ajax" value="" >
									<input type="hidden" name="i_repeat_rules" value="" >
									<input type="hidden" name="i_country_field" value="" >
									<input type="hidden" name="i_country" value="" >
									<input type="hidden" name="i_autocomplete" value="" >
									<input type="hidden" name="i_rowid" value="" />
                    				<input type="hidden" name="i_original_type" value="" />

									<div class="data-panel data_panel_0">
										<?php $this->render_form_tab_general_info(); ?>
									</div>
									<div class="data-panel data_panel_1">
										<?php $this->render_form_tab_display_details(); ?>
									</div>
									<!--<div class="data-panel data_panel_2">
										<?php //$this->render_form_tab_tooltip_info(); ?>
									</div>-->
									<div class="data-panel data_panel_2">
										<?php $this->render_form_tab_price_info(); ?>
									</div>
									<div class="data-panel data_panel_3">
										<?php $this->render_form_tab_display_rules(); ?>
									</div>
									<div class="data-panel data_panel_4">
										<?php $this->render_form_tab_repeat_rules(); ?>
									</div>
								</form>
							</main>
							<footer>
								<span class="Loader"></span>
								<div class="btn-toolbar">
									<button class="save-btn pull-right btn btn-primary" onclick="thwcfeSaveField(this)">
										<span>ذخیره و بستن</span>
									</button>
									<button class="next-btn pull-right btn btn-primary-alt" onclick="thwcfeWizardNext(this)">
										<span>بعدی</span><i class="i i-plus"></i>
									</button>
									<button class="prev-btn pull-right btn btn-primary-alt" onclick="thwcfeWizardPrevious(this)">
										<span>قبلی</span><i class="i i-plus"></i>
									</button>
								</div>
							</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/*----- TAB - General Info -----*/
	private function render_form_tab_general_info(){
		$this->render_form_tab_main_title('اطلاعات پایه');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<?php
			$this->render_form_fragment_general();
			?>
			<table class="thwcfe_field_form_tab_general_placeholder thwcfe_pp_table thwcfe-general-info"></table>
			<table class="thwcfe_field_form_tab_general_field_options" style="display: none;">
				<?php
					$this->render_form_fragment_options();
				?>
			</table>
		</div>
		<?php
	}

	/*----- TAB - Display Details -----*/
	private function render_form_tab_display_details(){
		$this->render_form_tab_main_title('تنظیمات نمایشگر');

		?>
		<div style="display: inherit;" class="data-panel-content mt-10">
			<table class="thwcfe_pp_table compact thwcfe-display-info">
				<?php
				$this->render_form_elm_row($this->field_props['cssclass']);
				$this->render_form_elm_row($this->field_props['input_class']);
				$this->render_form_elm_row($this->field_props['title_class']);

				$this->render_form_elm_row_cb($this->field_props['show_in_email']);
				$this->render_form_elm_row_cb($this->field_props['show_in_email_customer']);
				$this->render_form_elm_row_cb($this->field_props['show_in_order']);
				$this->render_form_elm_row_cb($this->field_props['show_in_thank_you_page']);
				?>
			</table>
		</div>
		<?php
	}

	/*----- TAB - Tooltip Info -----*/
	/*
	private function render_form_tab_tooltip_info(){
		$this->render_form_tab_main_title('Tooltip Details');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<table class="thwcfe_pp_table thwcfe-tooltip-info">
				<?php
				$this->render_form_elm_row($this->field_props['tooltip']);
				$this->render_form_elm_row($this->field_props['tooltip_size']);
				$this->render_form_elm_row_cp($this->field_props['tooltip_color']);
				$this->render_form_elm_row_cp($this->field_props['tooltip_bg_color']);
				//$this->render_form_elm_row_cp($this->field_props['tooltip_border_color']);
				?>
			</table>
		</div>
		<?php
	}
	*/

	/*----- TAB - Price Info -----*/
	private function render_form_tab_price_info(){
		$price_type_props = $this->field_props['price_type'];
		$options = isset($price_type_props['options']) ? $price_type_props['options'] : array();
		
		/*$type = false; //TODO
		//if($type === 'datepicker' || $type === 'timepicker' || $type === 'checkbox' || $type === 'file'){
		if($type === 'datepicker' || $type === 'timepicker'){
			unset($options['custom']);
			unset($options['dynamic']);
			//unset($options['dynamic-excl-base-price']);
		}*/
		
		$price_type_props['options'] = $options;

		$this->render_form_tab_main_title('جزئیات قیمت');
		?>
		<div style="display: inherit;" class="data-panel-content">
			<table class="thwcfe_pp_table thwcfe-price-info">
				<tr class="form_field_price_type">
					<?php $this->render_form_field_element($price_type_props, $this->cell_props); ?>
		        </tr>
		        <tr class="form_field_price">
		            <td class="label"><?php THWCFE_i18n::et('Price'); ?></td>
		            <?php $this->render_form_fragment_tooltip(false); ?>
		            <td class="field">
		            	<input type="text" name="i_price" placeholder="Price" style="width:260px;" class="thpladmin-price-field"/>
		                <label class="thpladmin-dynamic-price-field" style="display:none">per</label>
		                <input type="text" name="i_price_unit" placeholder="Unit" style="width:80px; display:none" class="thpladmin-dynamic-price-field"/>
		                <label class="thpladmin-dynamic-price-field thpladmin-price-unit-label" style="display:none">unit</label>
		            </td>
				</tr>
				<?php
				$this->render_form_elm_row($this->field_props['taxable']);
				$this->render_form_elm_row($this->field_props['tax_class']);
				?>
			</table>
		</div>
		<?php
	}

	/*----- TAB - Display Rules -----*/
	private function render_form_tab_display_rules(){
		$this->render_form_tab_main_title('نمایش قوانین');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<table class="thwcfe_pp_table thwcfe-display-rules">
				<?php
				$this->render_form_fragment_rules(); 
				$this->render_form_fragment_rules_ajax();
				?>
			</table>
		</div>
		<?php
	}

	/*----- TAB - Repeat Rules -----*/
	private function render_form_tab_repeat_rules(){
		$this->render_form_tab_main_title('تکرار قوانین');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<table class="thwcfe_pp_table thwcfe-repeat-rules">
				<?php
				$this->render_form_fragment_repeat_rules($this->field_props);
				?>
			</table>
		</div>
		<?php
	}

	/*-------------------------------*/
	/*------ Form Field Groups ------*/
	/*-------------------------------*/
	private function render_form_fragment_general($input_field = true){
		//$field_types = $this->get_field_types();
		//$field_name_label = $input_field ? THWCFE_i18n::t('Name') : THWCFE_i18n::t('ID');
		?>
		<div class="err_msgs"></div>
        <table class="thwcfe_pp_table">
        	<?php
			$this->render_form_elm_row($this->field_props['type']);
			$this->render_form_elm_row($this->field_props['name']);
			?>
        </table>  
        <?php
	}

	private function output_form_fragments(){
		$this->render_form_field_inputtext();
		$this->render_form_field_hidden();
		$this->render_form_field_password();
		$this->render_form_field_number();
		$this->render_form_field_tel();
		$this->render_form_field_email();
		$this->render_form_field_textarea();
		$this->render_form_field_select();
		$this->render_form_field_multiselect();		
		$this->render_form_field_radio();
		$this->render_form_field_checkbox();
		$this->render_form_field_checkboxgroup();
		$this->render_form_field_datepicker();
		$this->render_form_field_timepicker();
		$this->render_form_field_url();
		//$this->render_form_field_colorpicker();
		$this->render_form_field_file();
		//$this->render_form_field_country();
		//$this->render_form_field_state();
		$this->render_form_field_heading();
		//$this->render_form_field_html();
		$this->render_form_field_label();
		$this->render_form_field_default();
		$this->render_form_field_datetime_local();
		$this->render_form_field_date();
		$this->render_form_field_time();
		$this->render_form_field_month();
		$this->render_form_field_week();
		$this->render_form_field_paragraph();
		
		$this->render_field_form_fragment_product_list();
		$this->render_field_form_fragment_product_type_list();
		$this->render_field_form_fragment_category_list();
		$this->render_field_form_fragment_tag_list();
		$this->render_field_form_fragment_user_role_list();
		$this->render_field_form_fragment_fields_wrapper();
	}

	private function render_form_field_inputtext(){
		?>
        <table id="thwcfe_field_form_id_text" class="thwcfe_pp_table" style="display:none;">
        	<?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['minlength']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);
			$this->render_form_elm_row($this->field_props['input_mask']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
        </table>
        <?php   
	}

	private function render_form_field_hidden(){
		$title_props = $this->field_props['title'];
		$title_props['placeholder'] = 'برای جزئیات سفارش صفحه و ایمیل';

		?>
        <table id="thwcfe_field_form_id_hidden" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($title_props);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>  
        </table>
        <?php   
	}

	private function render_form_field_password(){
		?>
        <table id="thwcfe_field_form_id_password" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>  
        </table>
        <?php   
	}

	private function render_form_field_number(){
		?>
        <table id="thwcfe_field_form_id_number" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>     
        </table>
        <?php   
	}

	private function render_form_field_tel(){
		?>
        <table id="thwcfe_field_form_id_tel" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);
			$this->render_form_elm_row($this->field_props['input_mask']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			// $this->render_form_elm_row_cb($this->field_props['enable_country_code']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>    
        </table>
        <?php   
	}

	private function render_form_field_email(){
		?>
        <table id="thwcfe_field_form_id_email" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>    
        </table>
        <?php   
	}
	
	private function render_form_field_textarea(){
		$value_props = $this->field_props['value'];
		$value_props['type'] = 'textarea';

		?>
        <table id="thwcfe_field_form_id_textarea" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($value_props);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			//$this->render_form_elm_row($this->field_props['cols']);
			//$this->render_form_elm_row($this->field_props['rows']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>     
        </table>
        <?php   
	}
	
	private function render_form_field_select(){
		?>
        <table id="thwcfe_field_form_id_select" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			$this->render_form_elm_row_cb($this->field_props['disable_select2']);
			
			$this->render_form_fragment_h_spacing();
			// $this->render_form_fragment_options();
			?>
        </table>
        <?php   
	}
	
	private function render_form_field_multiselect(){
		$maxlen_props = $this->field_props['maxlength'];
		$maxlen_props['label'] = 'حداکثر انتخاب ها';
		$maxlen_props['hint_text'] = 'حداکثر تعداد گزینه های قابل انتخاب';

		?>
        <table id="thwcfe_field_form_id_multiselect" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($maxlen_props);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			$this->render_form_elm_row_cb($this->field_props['disable_select2']);

			$this->render_form_fragment_h_spacing();
			// $this->render_form_fragment_options();
			?> 
        </table>
        <?php   
	}
	
	private function render_form_field_radio(){
		?>
        <table id="thwcfe_field_form_id_radio" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);

			$this->render_form_fragment_h_spacing();
			// $this->render_form_fragment_options();
			?>
        </table>
        <?php   
	}
	
	private function render_form_field_checkbox(){
		$value_props = $this->field_props['value'];
		$value_props['label'] = THWCFE_i18n::t('Value');

		?>
        <table id="thwcfe_field_form_id_checkbox" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($value_props);

			$this->render_form_elm_row_cb($this->field_props['checked']);
			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>  
        </table>
        <?php   
	}
	
	private function render_form_field_checkboxgroup(){
		$value_props = $this->field_props['value'];
		$value_props['label'] = THWCFE_i18n::t('مقدار پیش فرض');

		?>
        <table id="thwcfe_field_form_id_checkboxgroup" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($value_props);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);

			$this->render_form_fragment_h_spacing();
			// $this->render_form_fragment_options();
			?>
        </table>
        <?php   
	}
	
	private function render_form_field_datepicker(){
		?>
        <table id="thwcfe_field_form_id_datepicker" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['placeholder']);

			$this->render_form_elm_row($this->field_props['date_format']);
			$this->render_form_elm_row($this->field_props['default_date']);
			$this->render_form_elm_row($this->field_props['min_date']);
			$this->render_form_elm_row($this->field_props['max_date']);
			$this->render_form_elm_row($this->field_props['year_range']);
			$this->render_form_elm_row($this->field_props['number_of_months']);
			$this->render_form_elm_row($this->field_props['disabled_days']);
			$this->render_form_elm_row($this->field_props['disabled_dates']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?> 
        </table>
        <?php   
	}
	
	private function render_form_field_timepicker(){
		?>
        <table id="thwcfe_field_form_id_timepicker" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['linked_date']);

			$this->render_form_elm_row($this->field_props['min_time']);
			$this->render_form_elm_row($this->field_props['max_time']);
			$this->render_form_elm_row($this->field_props['start_time']);
			$this->render_form_elm_row($this->field_props['time_step']);
			$this->render_form_elm_row($this->field_props['time_format']);
			$this->render_form_elm_row($this->field_props['disable_time_slot']);
			
			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
        </table>
        <?php   
	}

	private function render_form_field_url(){
		?>
        <table id="thwcfe_field_form_id_url" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['minlength']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);

			?>
       	</table>
        <?php
	}

	private function render_form_field_datetime_local(){
		?>
		<table id="thwcfe_field_form_id_datetime_local" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
      $this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['html_default_datetime']);
			$this->render_form_elm_row($this->field_props['min_html_datetime']);
			$this->render_form_elm_row($this->field_props['max_html_datetime']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
		</table>
		<?php
	}
	private function render_form_field_date(){
		?>
		<table id="thwcfe_field_form_id_date" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
      $this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['html_default_date']);
			$this->render_form_elm_row($this->field_props['min_html_date']);
			$this->render_form_elm_row($this->field_props['max_html_date']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
		</table>
		<?php
	}

	private function render_form_field_time(){
		?>
		<table id="thwcfe_field_form_id_time" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
      $this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['html_default_time']);
			$this->render_form_elm_row($this->field_props['min_html_time']);
			$this->render_form_elm_row($this->field_props['max_html_time']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
		</table>
		<?php

	}

	private function render_form_field_month(){
		?>
		<table id="thwcfe_field_form_id_month" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
      $this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['html_default_month']);
			$this->render_form_elm_row($this->field_props['min_html_month']);
			$this->render_form_elm_row($this->field_props['max_html_month']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
		</table>
		<?php
	}

	private function render_form_field_week(){
		?>
		<table id="thwcfe_field_form_id_week" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
      $this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['html_default_week']);
			$this->render_form_elm_row($this->field_props['min_html_week']);
			$this->render_form_elm_row($this->field_props['max_html_week']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
		</table>
		<?php
	}

	/*
	private function render_form_field_colorpicker(){
		$colorpicker_style = isset( $this->field_props['colorpicker_style']['value'] ) && $this->field_props['colorpicker_style']['value'] == 'style2' ? "table-row" : "none";
		?>
        <table id="thwcfe_field_form_id_colorpicker" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['subtitle']);
			$this->render_form_elm_row($this->field_props['value']);
			//$this->render_form_elm_row($this->field_props['tooltip']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
        </table>
        <?php   
	}
	*/
	
	private function render_form_field_file(){
		?>
        <table id="thwcfe_field_form_id_file" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['maxsize']);
			$this->render_form_elm_row($this->field_props['accept']);
			//$this->render_form_elm_row($this->field_props['minfile']);
			//$this->render_form_elm_row($this->field_props['maxfile']);

			//$this->render_form_elm_row_cb($this->field_props['multiple_file']);
			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>
        </table>
        <?php   
	}

	private function render_form_field_country(){
		?>
        <table id="thwcfe_field_form_id_country" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>    
        </table>
        <?php   
	}

	private function render_form_field_state(){
		?>
        <table id="thwcfe_field_form_id_state" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['country_field']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>    
        </table>
        <?php   
	}

	/*
	private function render_form_field_html(){
		$content_props = $this->field_props['value'];
		$content_props['type']     = 'textarea';
		$content_props['label']    = 'Content';
		$content_props['required'] = true;
		?>
        <table id="thwcfe_field_form_id_html" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row_ta($content_props);
			$this->render_form_elm_row($this->field_props['cssclass']);

			$this->render_form_elm_row_cb($this->field_props['enabled']);
			?>     
        </table>
        <?php   
	}
	*/
	
	private function render_form_field_heading(){
		$title_props = $this->field_props['title'];
		$title_props['label'] = $title_props['label'] ? 'Title' : $title_props['label'];
		$title_props['required'] = true;

		$title_class_props = $this->field_props['title_class'];
		$title_class_props['label'] = $title_class_props['label'] ? 'Title Class' : $title_class_props['label'];

		$show_in_order_props = $this->field_props['show_in_order'];
		$show_in_order_props['checked'] = 0;
		
		$show_in_thank_you_page_props = $this->field_props['show_in_thank_you_page'];
		$show_in_thank_you_page_props['checked'] = 0;

		?>
        <table id="thwcfe_field_form_id_heading" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($title_props);
			$this->render_form_elm_row($this->field_props['title_type']);
			$this->render_form_elm_row_cp($this->field_props['title_color']);
			$this->render_form_elm_row($title_class_props);
			$this->render_form_elm_row($this->field_props['subtitle']);
			$this->render_form_elm_row($this->field_props['subtitle_type']);
			$this->render_form_elm_row_cp($this->field_props['subtitle_color']);
			$this->render_form_elm_row($this->field_props['subtitle_class']);

			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['show_in_email']);
			$this->render_form_elm_row_cb($this->field_props['show_in_email_customer']);
			$this->render_form_elm_row_cb($show_in_order_props);
			$this->render_form_elm_row_cb($show_in_thank_you_page_props);
			$this->render_form_elm_row_cb($this->field_props['show_in_my_account_page']);
			?>
        </table>
        <?php   
	}
	
	private function render_form_field_label(){
		$title_props = $this->field_props['title'];
		$title_props['label'] = $title_props['label'] ? 'Title' : $title_props['label'];
		$title_props['required'] = true;

		$title_class_props = $this->field_props['title_class'];
		$title_class_props['label'] = $title_class_props['label'] ? 'Title Class' : $title_class_props['label'];

		$show_in_email_admin_props = $this->field_props['show_in_email'];
		$show_in_email_admin_props['checked'] = 0;

		$show_in_email_customer_props = $this->field_props['show_in_email_customer'];
		$show_in_email_customer_props['checked'] = 0;

		$show_in_order_props = $this->field_props['show_in_order'];
		$show_in_order_props['checked'] = 0;
		
		$show_in_thank_you_page_props = $this->field_props['show_in_thank_you_page'];
		$show_in_thank_you_page_props['checked'] = 0;
		?>
        <table id="thwcfe_field_form_id_label" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($title_props);
			$this->render_form_elm_row($this->field_props['title_type']);
			$this->render_form_elm_row_cp($this->field_props['title_color']);
			$this->render_form_elm_row($title_class_props);
			$this->render_form_elm_row($this->field_props['subtitle']);
			$this->render_form_elm_row($this->field_props['subtitle_type']);
			$this->render_form_elm_row_cp($this->field_props['subtitle_color']);
			$this->render_form_elm_row($this->field_props['subtitle_class']);

			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($show_in_email_admin_props);
			$this->render_form_elm_row_cb($show_in_email_customer_props);
			$this->render_form_elm_row_cb($show_in_order_props);
			$this->render_form_elm_row_cb($show_in_thank_you_page_props);
			$this->render_form_elm_row_cb($this->field_props['show_in_my_account_page']);
			?>     
        </table>
        <?php   
	}
	/*
	private function render_form_field_label(){
		$title_props = $this->field_props['title'];
		$title_props['type']     = 'textarea';
		$title_props['label']    = 'Content';
		$title_props['required'] = true;

		$title_type_props = $this->field_props['title_type'];
		$title_type_props['label'] = 'Tag Type';

		$title_color_props = $this->field_props['title_color'];
		$title_color_props['label'] = 'Content Color';

		$title_class_props = $this->field_props['title_class'];
		$title_class_props['label'] = 'Wrapper Class';
		?>
        <table id="thwcfe_field_form_id_label" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row_ta($title_props);
			$this->render_form_elm_row($title_type_props);
			$this->render_form_elm_row_cp($title_color_props);
			$this->render_form_elm_row($title_class_props);

			$this->render_form_elm_row_cb($this->field_props['enabled']);
			?>     
        </table>
        <?php   
	}
	*/
	
	private function render_form_field_default(){
		?>
        <table id="thwcfe_field_form_id_default" class="thwcfe_field_form_table" width="100%" style="display:none;">
            <?php
			$this->render_form_elm_row($this->field_props['title']);
			$this->render_form_elm_row($this->field_props['description']);
			$this->render_form_elm_row($this->field_props['value']);
			$this->render_form_elm_row($this->field_props['placeholder']);
			$this->render_form_elm_row($this->field_props['maxlength']);
			$this->render_form_elm_row($this->field_props['validate']);

			$this->render_form_elm_row_cb($this->field_props['required']);
			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['order_meta']);
			$this->render_form_elm_row_cb($this->field_props['user_meta']);
			?>    
        </table>
        <?php   
	}


	private function render_form_field_paragraph(){
		$title_props = $this->field_props['title'];
		$title_props['label'] = $title_props['label'] ? 'Content' : $title_props['label'];
		$title_props['required'] = true;

		$title_class_props = $this->field_props['title_class'];
		$title_class_props['label'] = $title_class_props['label'] ? 'Title Class' : $title_class_props['label'];

		$show_in_order_props = $this->field_props['show_in_order'];
		$show_in_order_props['checked'] = 0;
		
		$show_in_thank_you_page_props = $this->field_props['show_in_thank_you_page'];
		$show_in_thank_you_page_props['checked'] = 0;

		?>
        <table id="thwcfe_field_form_id_paragraph" class="thwcfe_field_form_table" width="100%" style="display:none;">
			<?php
			$this->render_form_elm_row($title_props);
			$this->render_form_elm_row_cp($this->field_props['title_color']);
			$this->render_form_elm_row($title_class_props);
			$this->render_form_elm_row($this->field_props['subtitle']);
			$this->render_form_elm_row($this->field_props['subtitle_type']);
			$this->render_form_elm_row_cp($this->field_props['subtitle_color']);
			$this->render_form_elm_row($this->field_props['subtitle_class']);

			$this->render_form_elm_row_cb($this->field_props['enabled']);

			$this->render_form_elm_row_cb($this->field_props['show_in_email']);
			$this->render_form_elm_row_cb($this->field_props['show_in_email_customer']);
			$this->render_form_elm_row_cb($show_in_order_props);
			$this->render_form_elm_row_cb($show_in_thank_you_page_props);
			$this->render_form_elm_row_cb($this->field_props['show_in_my_account_page']);
			?>
        </table>
        <?php

	}

	private function render_form_fragment_options(){
		//$this->render_form_elm_row($this->field_props['taxable']);
		//$this->render_form_elm_row($this->field_props['tax_class']);

		?>
		<tr>
			<td class="sub-title"><?php THWCFE_i18n::et('گزینه ها'); ?></td>
			<?php $this->render_form_fragment_tooltip(); ?>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" class="p-0">
				<table border="0" cellpadding="0" cellspacing="0" class="thwcfe-option-list thpladmin-options-table"><tbody>
					<tr>
						<td class="key"><input type="text" name="i_options_key[]" placeholder="مقدار گزینه"></td>
						<td class="value"><input type="text" name="i_options_text[]" placeholder="متن گزینه"></td>
						<td class="price"><input type="text" name="i_options_price[]" placeholder="قیمت"></td>
						<td class="price-type">    
							<select name="i_options_price_type[]">
								<option selected="selected" value="">ثابت</option>
								<option value="percentage">درصدی از کل محتویات سبد  خرید</option>
								<option value="percentage_subtotal">درصد کل فرعی</option>
								<option value="percentage_subtotal_ex_tax">درصد مایات فرعی</option>
							</select>
						</td>
						<td class="action-cell">
							<a href="javascript:void(0)" onclick="thwcfeAddNewOptionRow(this)" class="btn btn-tiny btn-primary" title="افزودن گزینه جدید">+</a><a href="javascript:void(0)" onclick="thwcfeRemoveOptionRow(this)" class="btn btn-tiny btn-danger" title="گزینه حذف">x</a><span class="btn btn-tiny sort ui-sortable-handle"></span>
						</td>
					</tr>
				</tbody></table>            	
			</td>
		</tr>
        <?php
	}


	/*
	public function is_reserved_field_name( $field_name ){
		if($field_name && in_array($field_name, array(
			'billing_first_name', 'billing_last_name', 'billing_company', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 
			'billing_country', 'billing_postcode', 'billing_phone', 'billing_email',
			'shipping_first_name', 'shipping_last_name', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 
			'shipping_country', 'shipping_postcode', 'customer_note', 'order_comments'
		))){
			return true;
		}
		return false;
	}
	
	public function is_default_field_name($field_name){
		if($field_name && in_array($field_name, array(
			'billing_first_name', 'billing_last_name', 'billing_company', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 
			'billing_country', 'billing_postcode', 'billing_phone', 'billing_email',
			'shipping_first_name', 'shipping_last_name', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 
			'shipping_country', 'shipping_postcode', 'customer_note', 'order_comments'
		))){
			return true;
		}
		return false;
	}
	*/
}

endif;