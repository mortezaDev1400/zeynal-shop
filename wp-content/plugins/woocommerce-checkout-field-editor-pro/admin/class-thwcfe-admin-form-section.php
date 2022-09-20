<?php
/**
 * The admin section forms functionalities.
 *
 * @link       https://themehigh.com
 * @since      3.1.4
 *
 * @package    woocommerce-checkout-field-editor-pro
 * @subpackage woocommerce-checkout-field-editor-pro/admin
 */
if(!defined('WPINC')){	die; }

if(!class_exists('THWCFE_Admin_Form_Section')):

class THWCFE_Admin_Form_Section extends THWCFE_Admin_Form{
	private $section_props = array();

	public function __construct() {
		$this->section_props = $this->get_section_form_props();
	}

	public function get_available_positions(){
		$positions = array(
			//'before_checkout_form' => 'Before checkout form',
			//'after_checkout_form' => 'After checkout form',
			'before_customer_details' => 'قبل از جزئیات مشتری',
			'after_customer_details' => 'بعد از مشخصات مشتری',
			'before_checkout_billing_form' => 'قبل از فرم صورتحساب',
			'after_checkout_billing_form' => 'پس از فرم صورتحساب',
			'before_checkout_shipping_form' => 'قبل از ارسال فرم',
			'after_checkout_shipping_form' => 'بعد از ارسال فرم',
			'before_checkout_registration_form' => 'قبل از فرم ثبت نام',
			'after_checkout_registration_form' => 'بعد از فرم ثبت نام',
			'before_order_notes' => 'قبل از یادداشتهای سفارش',
			'after_order_notes' => 'بعد از یادداشت های سفارش',
			'before_terms_and_conditions' => 'قبل از شرایط و ضوابط',
			'after_terms_and_conditions' => 'بعد از شرایط و ضوابط',
			'before_submit' => 'دکمه قبل از ارسال',
			'after_submit' => 'دکمه پس از ارسال',
			/*
			'before_cart_contents' => 'Review Order - Before cart contents',
			'after_cart_contents' => 'Review Order - After cart contents',
			'before_order_total' => 'Review Order - Before order total',
			'after_order_total' => 'Review Order - After order total',
			'before_order_review' => 'Before order review wrapper',
			'after_order_review' => 'After order review wrapper',
			'order_review_0' => 'Before order review content',
			'order_review_99' => 'After order review content',*/
		);

		if(apply_filters('thwcfe_enable_review_order_section_positions', false)){
			$positions['before_cart_contents'] = 'Review Order - Before cart contents';
			$positions['after_cart_contents'] = 'Review Order - After cart contents';
			$positions['before_order_total'] = 'Review Order - Before order total';
			$positions['after_order_total'] = 'Review Order - After order total';
			$positions['before_order_review_heading'] = 'Before order review heading';
			$positions['before_order_review'] = 'Before order review wrapper';
			$positions['after_order_review'] = 'After order review wrapper';
			$positions['order_review_0'] = 'Before order review content';
			$positions['order_review_99'] = 'After order review content';
		}
		
		$custom_positions = apply_filters('thwcfe_custom_section_positions', array());
		if(is_array($custom_positions)){
			$positions = array_merge($positions, $custom_positions);
		}
		
		return $positions;
	}
	
	public function get_section_form_props(){
		$positions = $this->get_available_positions();
		$html_text_tags = $this->get_html_text_tags();

		$suffix_types = array(
			'number' => 'شماره',
			'alphabet' => 'الفبا',
			'none' => 'هیچ یک',
		);

		$suffix_types_1 = array(
			'number' => 'شماره',
			'alphabet' => 'الفبا',
		);
		
		return array(
			'name' 		 => array('name'=>'name', 'label'=>'نام/شناسه', 'type'=>'text', 'required'=>1),
			'position' 	 => array('name'=>'position', 'label'=>'نمایش موقعیت', 'type'=>'select', 'options'=>$positions, 'required'=>1),
			//'box_type' 	 => array('name'=>'box_type', 'label'=>'Box Type', 'type'=>'select', 'options'=>$box_types),
			'cssclass' 	 => array('name'=>'cssclass', 'label'=>'CSS کلاس', 'type'=>'text'),
			'show_title' => array('name'=>'show_title', 'label'=>'عنوان بخش را در صفحه پرداخت نشان دهید.', 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1),
			'show_title_my_account' => array('name'=>'show_title_my_account', 'label'=>'عنوان بخش را در صفحه حساب من نشان دهید.', 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1),
			'order' 		 => array('name'=>'order', 'label'=>'سفارش نمایش', 'type'=>'text'),
			
			'title' 		   => array('name'=>'title', 'label'=>'Title', 'type'=>'text', 'required'=>1),
			//'title_position' => array('name'=>'title_position', 'label'=>'Title Position', 'type'=>'select', 'options'=>$title_positions),
			'title_type' 	   => array('name'=>'title_type', 'label'=>'نوع عنوان', 'type'=>'select', 'value'=>'h3', 'options'=>$html_text_tags),
			'title_color' 	   => array('name'=>'title_color', 'label'=>'عنوان رنگ', 'type'=>'colorpicker'),
			'title_class' 	   => array('name'=>'title_class', 'label'=>'عنوان کلاس', 'type'=>'text'),
			
			'subtitle' 			  => array('name'=>'subtitle', 'label'=>'عنوان فرعی', 'type'=>'text'),
			//'subtitle_position' => array('name'=>'subtitle_position', 'label'=>'Subtitle Position', 'type'=>'select', 'options'=>$title_positions),
			'subtitle_type' 	  => array('name'=>'subtitle_type', 'label'=>'زیرنویسنوان', 'type'=>'select', 'value'=>'h3', 'options'=>$html_text_tags),
			'subtitle_color' 	  => array('name'=>'subtitle_color', 'label'=>'رنگ زیرنویس', 'type'=>'colorpicker'),
			'subtitle_class' 	  => array('name'=>'subtitle_class', 'label'=>'کلاس زیرنویس', 'type'=>'متن'),

			'rpt_name_suffix' => array('type'=>'select', 'name'=>'rpt_name_suffix', 'label'=>'پسوند نام', 'options'=>$suffix_types_1),
			'rpt_label_suffix' => array('type'=>'select', 'name'=>'rpt_label_suffix', 'label'=>'پسوند برچسب', 'options'=>$suffix_types),
			'rpt_incl_parent' => array('type'=>'checkbox', 'name'=>'rpt_incl_parent', 'label'=>'نمایه سازی را از والدین شروع کنید', 'value'=>'yes', 'checked'=>0),
			
			'inherit_display_rule' => array('type'=>'checkbox', 'name'=>'inherit_display_rule', 'label'=>'وراثت قوانین و قوانین نمایش مبتنی بر کاربر', 'value'=>'yes', 'checked'=>1),
			'inherit_display_rule_ajax' => array('type'=>'checkbox', 'name'=>'inherit_display_rule_ajax', 'label'=>'فیلدقوانین نمایش مبتنی بر وراثت', 'value'=>'yes', 'checked'=>1),
			'auto_adjust_display_rule_ajax' => array('type'=>'checkbox', 'name'=>'auto_adjust_display_rule_ajax', 'label'=>'قوانین نمایش را بر اساس فیلدهای موجود در همان قسمت تنظیم کنید', 'value'=>'yes', 'checked'=>1),
		);
	}

	public function output_section_forms(){
		?>
        <div id="thwcfe_section_form_pp" class="thpladmin-modal-mask">
          <?php $this->output_popup_form_section(); ?>
        </div>
        <?php
	}

	/*****************************************/
	/********** POPUP FORM WIZARD ************/
	/*****************************************/

	private function output_popup_form_section(){
		?>
		<div class="thpladmin-modal">
			<div class="modal-container">
				<span class="modal-close" onclick="thwcfeCloseModal(this)">×</span>
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-wizard wizard">
							<aside>
								<side-title class="wizard-title">Save Section</side-title>
								<ul class="pp_nav_links">
									<li class="text-primary active first" data-index="0">
										<i class="dashicons dashicons-admin-generic text-primary"></i>اطلاعات پایه
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary" data-index="1">
										<i class="dashicons dashicons-art text-primary"></i>نمایش سبک ها
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary" data-index="2">
										<i class="dashicons dashicons-filter text-primary"></i>نمایش قوانین
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
									<li class="text-primary last" data-index="3">
										<i class="dashicons dashicons-controls-repeat text-primary"></i>قوانین را تکرار کنید
										<i class="i i-chevron-right dashicons dashicons-arrow-right-alt2"></i>
									</li>
								</ul>
							</aside>
							<main class="form-container main-full">
								<form method="post" id="thwcfe_section_form" action="">
									<input type="hidden" name="s_action" value="" />
									<input type="hidden" name="s_name" value="" />
									<input type="hidden" name="s_name_copy" value="" />
									<input type="hidden" name="i_position_old" value="" />
									<input type="hidden" name="i_rules" value="" />
									<input type="hidden" name="i_rules_ajax" value="" />
									<input type="hidden" name="i_repeat_rules" value="" />

									<div class="data-panel data_panel_0">
										<?php $this->render_form_tab_general_info(); ?>
									</div>
									<div class="data-panel data_panel_1">
										<?php $this->render_form_tab_display_details(); ?>
									</div>
									<div class="data-panel data_panel_2">
										<?php $this->render_form_tab_display_rules(); ?>
									</div>
									<div class="data-panel data_panel_3">
										<?php $this->render_form_tab_repeat_rules(); ?>
									</div>
								</form>
							</main>
							<footer>
								<span class="Loader"></span>
								<div class="btn-toolbar">
									<button class="save-btn pull-right btn btn-primary" onclick="thwcfeSaveSection(this)">
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
		$this->render_form_tab_main_title('جزئیات پایه');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<div class="err_msgs"></div>
			<table class="thwcfe_pp_table">
				<?php
				$this->render_form_elm_row($this->section_props['name']);
				$this->render_form_elm_row($this->section_props['title']);
				$this->render_form_elm_row($this->section_props['subtitle']);
				$this->render_form_elm_row($this->section_props['position']);
				$this->render_form_elm_row($this->section_props['order']);
				//$this->render_form_elm_row($this->section_props['title_cell_with']);
				//$this->render_form_elm_row($this->section_props['field_cell_with']);

				$this->render_form_elm_row_cb($this->section_props['show_title']);
				$this->render_form_elm_row_cb($this->section_props['show_title_my_account']);			
				?>
			</table>
		</div>
		<?php
	}

	/*----- TAB - Display Details -----*/
	private function render_form_tab_display_details(){
		$this->render_form_tab_main_title('نمایش تنظیمات');

		?>
		<div style="display: inherit;" class="data-panel-content">
			<table class="thwcfe_pp_table">
				<?php
				$this->render_form_elm_row($this->section_props['cssclass']);
				$this->render_form_elm_row($this->section_props['title_class']);
				$this->render_form_elm_row($this->section_props['subtitle_class']);

				$this->render_form_elm_row($this->section_props['title_type']);
				$this->render_form_elm_row($this->section_props['title_color']);
				$this->render_form_elm_row($this->section_props['subtitle_type']);
				$this->render_form_elm_row($this->section_props['subtitle_color']);
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
				$this->render_form_fragment_rules('section'); 
				$this->render_form_fragment_rules_ajax('section');
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
				$this->render_form_fragment_repeat_rules($this->section_props, 'section');
				?>
			</table>
		</div>
		<?php
	}
	
}

endif;