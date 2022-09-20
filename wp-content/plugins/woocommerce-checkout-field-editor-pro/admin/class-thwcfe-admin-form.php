<?php
/**
 * The admin forms specific functionality of the plugin.
 *
 * @link       https://themehigh.com
 * @since      3.1.4
 *
 * @package    woocommerce-checkout-field-editor-pro
 * @subpackage woocommerce-checkout-field-editor-pro/admin
 */
if(!defined('WPINC')){ die; }

if(!class_exists('THWCFE_Admin_Form')):

abstract class THWCFE_Admin_Form {
	public $cell_props = array();
	public $cell_props_TA = array();
	public $cell_props_CP = array();
	public $cell_props_CB = array();

	public function __construct() {
		$this->init_constants();
	}

	private function init_constants(){
		$this->cell_props = array(
			'label_cell_props' => 'class="label"',
			'input_cell_props' => 'class="field"',
			'input_width' => '260px',
		);
		$this->cell_props_TA = array(
			'label_cell_props' => 'class="label"',
			'input_cell_props' => 'class="field"',
			'input_width' => '260px',
			'rows' => 10,
			'cols' => 29,
		);
		$this->cell_props_CP = array(
			'label_cell_props' => 'class="label"',
			'input_cell_props' => 'class="field"',
			'input_width' => '223px',
		);

		/*
		$this->cell_props_L = array(
			'label_cell_props' => 'width="13%"',
			'input_cell_props' => 'width="34%"',
			'input_width' => '250px',
		);

		$this->cell_props_R = array(
			'label_cell_props' => 'width="13%"',
			'input_cell_props' => 'width="34%"',
			'input_width' => '250px',
		);
		*/

		$this->cell_props_CB = array(
			'label_props' => 'style="margin-right: 40px;"',
		);
		$this->cell_props_CBS = array(
			'label_props' => 'style="margin-right: 15px;"',
		);
		$this->cell_props_CBL = array(
			'label_props' => 'style="margin-right: 52px;"',
		);

		/*
		$this->cell_props_CP = array(
			'label_cell_props' => 'width="13%"',
			'input_cell_props' => 'width="34%"',
			'input_width' => '218px',
		);
		*/

		//$this->section_props = $this->get_section_form_props();
		$this->field_props = $this->get_field_form_props();
		$this->field_props_display = $this->get_field_form_props_display();
	}

	public function get_html_text_tags(){
		return array('h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3', 'h4' => 'H4', 'h5' => 'H5', 'h6' => 'H6', 'p' => 'p', 'div' => 'div', 'span' => 'span', 'label' => 'label');
	}

	public function render_form_field_element($field, $args = array(), $render_cell = true){
		if($field && is_array($field)){
			/*$args = shortcode_atts( array(
				'label_cell_props' => 'class="label"',
				'input_cell_props' => 'class="field"',
				'label_cell_colspan' => '',
				'input_cell_colspan' => '',
			), $atts );*/

			$defaults = array(
			    'label_cell_props' => 'class="label"',
				'input_cell_props' => 'class="field"',
				'label_cell_colspan' => '',
				'input_cell_colspan' => '',
			);
			$args = wp_parse_args( $args, $defaults );

			$ftype     = isset($field['type']) ? $field['type'] : 'text';
			$flabel    = isset($field['label']) && !empty($field['label']) ? THWCFE_i18n::t($field['label']) : '';
			$sub_label = isset($field['sub_label']) && !empty($field['sub_label']) ? THWCFE_i18n::t($field['sub_label']) : '';
			$tooltip   = isset($field['hint_text']) && !empty($field['hint_text']) ? THWCFE_i18n::t($field['hint_text']) : '';

			$field_html = '';

			if($ftype == 'text'){
				$field_html = $this->render_form_field_element_inputtext($field, $args);

			}else if($ftype == 'textarea'){
				$field_html = $this->render_form_field_element_textarea($field, $args);

			}else if($ftype == 'select'){
				$field_html = $this->render_form_field_element_select($field, $args);

			}else if($ftype == 'multiselect'){
				$field_html = $this->render_form_field_element_multiselect($field, $args);

			}else if($ftype == 'colorpicker'){
				$field_html = $this->render_form_field_element_colorpicker($field, $args);

			}else if($ftype == 'checkbox'){
				$field_html = $this->render_form_field_element_checkbox($field, $args, $render_cell);
				$flabel 	= '&nbsp;';

			}else if($ftype == 'number'){
				$field_html = $this->render_form_field_element_number($field, $args);
			}

			if($render_cell){
				$required_html = isset($field['required']) && $field['required'] ? '<abbr class="required" title="required">*</abbr>' : '';

				$label_cell_props = !empty($args['label_cell_props']) ? $args['label_cell_props'] : '';
				$input_cell_props = !empty($args['input_cell_props']) ? $args['input_cell_props'] : '';

				?>
				<td <?php echo $label_cell_props ?> >
					<?php echo $flabel; echo $required_html;
					if($sub_label){
						?>
						<br/><span class="thpladmin-subtitle"><?php echo $sub_label; ?></span>
						<?php
					}
					?>
				</td>
				<?php $this->render_form_fragment_tooltip($tooltip); ?>
				<td <?php echo $input_cell_props ?> ><?php echo $field_html; ?></td>
				<?php
			}else{
				echo $field_html;
			}
		}
	}

	private function prepare_form_field_props($field, $args = array()){
		$field_props = '';
		/*$args = shortcode_atts( array(
			'input_width' => '',
			'input_name_prefix' => 'i_',
			'input_name_suffix' => '',
		), $atts );*/
		$defaults = array(
		    'input_width' => '',
			'input_name_prefix' => 'i_',
			'input_name_suffix' => '',
		);
		$args = wp_parse_args( $args, $defaults );

		$ftype = isset($field['type']) ? $field['type'] : 'text';

		$input_class = '';
		if($ftype == 'text'){
			$input_class = 'thwcfe-inputtext';
		}else if($ftype == 'number'){
			$input_class = 'thwcfe-inputtext';
		}else if($ftype == 'select'){
			$input_class = 'thwcfe-select';
		}else if($ftype == 'multiselect' || $ftype == 'multiselect_grouped'){
			$input_class = 'thwcfe-select thwcfe-enhanced-multi-select';
		}else if($ftype == 'colorpicker'){
			$input_class = 'thwcfe-color thpladmin-colorpick';
		}

		if($ftype == 'multiselect' || $ftype == 'multiselect_grouped'){
			$args['input_name_suffix'] = $args['input_name_suffix'].'[]';
		}

		$fname  = $args['input_name_prefix'].$field['name'].$args['input_name_suffix'];
		$fvalue = isset($field['value']) ? esc_html($field['value']) : '';

		$input_width  = $args['input_width'] ? 'width:'.$args['input_width'].';' : '';
		$field_props  = 'name="'. $fname .'" style="'. $input_width .'"';
		$field_props .= !empty($input_class) ? ' class="'. $input_class .'"' : '';
		$field_props .= $ftype == 'textarea' ? '' : ' value="'. $fvalue .'"';
		$field_props .= $ftype == 'multiselect_grouped' ? ' data-value="'. $fvalue .'"' : '';
		$field_props .= ( isset($field['placeholder']) && !empty($field['placeholder']) ) ? ' placeholder="'.$field['placeholder'].'"' : '';
		$field_props .= ( isset($field['onchange']) && !empty($field['onchange']) ) ? ' onchange="'.$field['onchange'].'"' : '';

		if( $ftype == 'number' ){
			$min = isset( $field['min'] ) ? $field['min'] : '';
			$max = isset( $field['max'] ) ? $field['max'] : '';
			$field_props .= ' min="'.$min.'" max="'.$max.'"';
		}

		return $field_props;
	}

	private function render_form_field_element_inputtext($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);
			$field_html = '<input type="text" '. $field_props .' />';
		}
		return $field_html;
	}

	private function render_form_field_element_textarea($field, $args = array()){
		$field_html = '';
		if($field && is_array($field)){
			$args = wp_parse_args( $args, array(
			    'rows' => '5',
				'cols' => '29',
			));

			$fvalue = isset($field['value']) ? $field['value'] : '';
			$field_props = $this->prepare_form_field_props($field, $args);
			$field_html = '<textarea '. $field_props .' rows="'.$args['rows'].'" cols="'.$args['cols'].'" >'.$fvalue.'</textarea>';
		}
		return $field_html;
	}

	private function render_form_field_element_select($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$fvalue = isset($field['value']) ? $field['value'] : '';
			$field_props = $this->prepare_form_field_props($field, $atts);

			$field_html = '<select '. $field_props .' >';
			foreach($field['options'] as $value => $label){
				$selected = $value === $fvalue ? 'selected' : '';
				$field_html .= '<option value="'. trim($value) .'" '.$selected.'>'. THWCFE_i18n::t($label) .'</option>';
			}
			$field_html .= '</select>';
		}
		return $field_html;
	}

	private function render_form_field_element_multiselect($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);

			$field_html = '<select multiple="multiple" '. $field_props .'>';
			foreach($field['options'] as $value => $label){
				//$selected = $value === $fvalue ? 'selected' : '';
				$field_html .= '<option value="'. trim($value) .'" >'. THWCFE_i18n::t($label) .'</option>';
			}
			$field_html .= '</select>';
		}
		return $field_html;
	}

	private function render_form_field_element_multiselect_grouped($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);

			$field_html = '<select multiple="multiple" '. $field_props .'>';
			foreach($field['options'] as $group_label => $fields){
				$field_html .= '<optgroup label="'. $group_label .'">';

				foreach($fields as $value => $label){
					$value = trim($value);
					if(isset($field['glue']) && !empty($field['glue'])){
						$value = $value.$field['glue'].trim($label);
					}

					$field_html .= '<option value="'. $value .'">'. THWCFE_i18n::t($label) .'</option>';
				}

				$field_html .= '</optgroup>';
			}
			$field_html .= '</select>';
		}
		return $field_html;
	}

	private function render_form_field_element_radio($field, $atts = array()){
		$field_html = '';
		/*if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);

			$field_html = '<select '. $field_props .' >';
			foreach($field['options'] as $value => $label){
				$selected = $value === $fvalue ? 'selected' : '';
				$field_html .= '<option value="'. trim($value) .'" '.$selected.'>'. THWCFE_i18n::__t($label) .'</option>';
			}
			$field_html .= '</select>';
		}*/
		return $field_html;
	}

	private function render_form_field_element_checkbox($field, $atts = array(), $render_cell = true){
		$field_html = '';
		if($field && is_array($field)){
			$args = shortcode_atts( array(
				'label_props' => '',
				'cell_props'  => '',
				'input_props' => '',
				'id_prefix'   => 'a_f',
				'render_input_cell' => false,
			), $atts );

			$fid 	= $args['id_prefix']. $field['name'];
			$flabel = isset($field['label']) && !empty($field['label']) ? THWCFE_i18n::t($field['label']) : '';

			$field_props  = $this->prepare_form_field_props($field, $atts);
			$field_props .= isset($field['checked']) && $field['checked'] === 1 ? ' checked' : '';
			$field_props .= $args['input_props'];

			$field_html  = '<input type="checkbox" id="'. $fid .'" '. $field_props .' />';
			$field_html .= '<label for="'. $fid .'" '. $args['label_props'] .' > '. $flabel .'</label>';
		}
		if(!$render_cell && $args['render_input_cell']){
			return '<td '. $args['cell_props'] .' >'. $field_html .'</td>';
		}else{
			return $field_html;
		}
	}

	private function render_form_field_element_colorpicker($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);

			$field_html  = '<span class="thpladmin-colorpickpreview '.$field['name'].'_preview" style=""></span>';
            $field_html .= '<input type="text" '. $field_props .' >';
		}
		return $field_html;
	}

	private function render_form_field_element_number($field, $atts = array() ){
		$field_html = '';
		if($field && is_array($field)){
			$field_props = $this->prepare_form_field_props($field, $atts);
			$field_html = '<input type="number" '. $field_props .' />';
		}
		return $field_html;
	}

	public function render_form_fragment_tooltip($tooltip = false){
		if($tooltip){
			?>
			<td class="tip" style="width: 26px; padding:0px;">
				<a href="javascript:void(0)" title="<?php echo $tooltip; ?>" class="thwcfe_tooltip"><img src="<?php echo THWCFE_ASSETS_URL_ADMIN; ?>/css/help.png" title=""/></a>
			</td>
			<?php
		}else{
			?>
			<td style="width: 26px; padding:0px;"></td>
			<?php
		}
	}

	public function render_form_fragment_h_spacing($padding = 5){
		$style = $padding ? 'padding-top:'.$padding.'px;' : '';
		?>
        <tr><td colspan="3" style="<?php echo $style ?>"></td></tr>
        <?php
	}

	public function render_form_fragment_h_separator($atts = array()){
		$args = shortcode_atts( array(
			'colspan' 	   => 6,
			'padding-top'  => '5px',
			'border-style' => 'dashed',
    		'border-width' => '1px',
			'border-color' => '#e6e6e6',
			'content'	   => '',
		), $atts );

		$style  = $args['padding-top'] ? 'padding-top:'.$args['padding-top'].';' : '';
		$style .= $args['border-style'] ? ' border-bottom:'.$args['border-width'].' '.$args['border-style'].' '.$args['border-color'].';' : '';

		?>
        <tr><td colspan="<?php echo $args['colspan']; ?>" style="<?php echo $style; ?>"><?php echo $args['content']; ?></td></tr>
        <?php
	}

	/*private function output_h_separator($show_line = true){
		$style = $show_line ? 'margin: 5px 0; border-bottom: 1px dashed #ccc' : '';
		echo '<tr><td colspan="6" style="'.$style.'">&nbsp;</td></tr>';
	}*/


	public function render_form_field_blank($colspan = 3){
		?>
        <td colspan="<?php echo $colspan; ?>">&nbsp;</td>
        <?php
	}

	public function render_form_section_separator($props, $atts=array()){
		?>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" style="height:10px;"></td></tr>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" class="thpladmin-form-section-title" ><?php echo $props['title']; ?></td></tr>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" style="height:0px;"></td></tr>
		<?php
	}

	public function render_form_fragment_rules($type="field"){
		?>
        <tr>
        	<td class="">
                <select name="i_rules_action" class="rule-action">
                    <option value="show">نشان دادن</option>
                    <option value="hide">پنهان شدن</option>
                </select>
                <?php echo $type; ?> اگر تمام شرایط زیر برآورده شود
            </td>
        </tr>
        <tr>
            <td class="">
            	<table class="thwcfe_conditional_rules"><tbody>
                    <tr class="thwcfe_rule_set_row">
                        <td class="p-0">
                            <table class="thwcfe_rule_set"><tbody>
                                <tr class="thwcfe_rule_row">
                                    <td class="p-0">
                                        <table class="thwcfe_rule"><tbody>
                                            <tr class="thwcfe_condition_set_row">
                                                <td class="p-0">
                                                    <table class="thwcfe_condition_set" style=""><tbody>
                                                        <tr class="thwcfe_condition">
                                                            <td class="operator">
                                                                <select name="i_rule_operator" onchange="thwcfeRuleOperatorChangeListner(this)">
                                                                    <option value="">یک گزینه را انتخاب کنید ...</option>
                                                                    <option value="cart_contains">سبد حاوی</option>
                                                                    <option value="cart_not_contains">سبد شامل نمی شود</option>
                                                                    <option value="cart_only_contains">سبد فقط حاوی</option>

							            <option value="cart_subtotal_eq">جمع فرعی سبد خرید برابر است با</option>
                                                                    <option value="cart_subtotal_gt">جمع فرعی سبد خرید بیشتر از</option>
                                                                    <option value="cart_subtotal_lt">جمع فرعی سبد خرید کمتر از</option>
                                                                    <option value="cart_total_eq">مجموع سبد خرید برابر است با</option>
                                                                    <option value="cart_total_gt">کل سبد خرید بیشتر از</option>
                                                                    <option value="cart_total_lt">مجموع سبد خرید کمتر از</option>

                                                                    <option value="shipping_weight_eq">وزن حمل و نقل برابر است با</option>
                                                                    <option value="shipping_weight_gt">وزن حمل و نقل بیشتر از</option>
                                                                    <option value="shipping_weight_lt">وزن حمل و نقل کمتر از </option>

																	<option value="user_role_eq">نقش کاربر برابر است با</option>
                                                                    <option value="user_role_ne">نقش کاربر برابر نیست با</option>

                                                                    <?php /*?><option value="count_eq">Product count equals to</option>
                                                                    <option value="count_gt">Product count greater than</option>
                                                                    <option value="count_lt">Product count less than</option><?php */?>
                                                                </select>
                                                            </td>
                                                            <td class="operand-type">
                                                                <select name="i_rule_operand_type" onchange="thwcfeRuleOperandTypeChangeListner(this)">
                                                                    <option value=""> انتخاب یک گزینه ...</option>
                                                                    <option value="product">محصول </option>
                                                                    <?php /*
                                                                    // Removed product variation option from 3.1.7.0 version
																	<option value="product_variation">Product Variation</option>
																	*/ ?>
                                                                    <option value="category">دسته بندی </option>
                                                                    <option value="tag">برچسب زدن </option>
                                                                    <option value="shipping_class">کلاس حمل و نقل</option>
                                                                    <option value="product_type">نوع محصول</option>
                                                                </select>
                                                            </td>
                                                            <td class="operand thpladmin_rule_operand">
                                                            	<input type="text" name="i_rule_operand">
                                                            </td>
                                                            <td class="actions">
                                                                <a href="javascript:void(0)" class="thpl_logic_link" onclick="thwcfeAddNewConditionRow(this, 1)" title="">و</a>
                                                                <a href="javascript:void(0)" class="thpl_logic_link" onclick="thwcfeAddNewConditionRow(this, 2)" title="">یا</a>
                                                                <a href="javascript:void(0)" class="thpl_delete_icon dashicons dashicons-no" onclick="thwcfeRemoveRuleRow(this)" title="Remove"></a>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
        		</tbody></table>
        	</td>
        </tr>
        <?php
	}

	public function render_form_fragment_rules_ajax($type="field"){
		?>
        <tr><td class="h-separator"><span>&nbsp;</span></td></tr>
        <tr>
        	<td>
                <select name="i_rules_action_ajax" class="rule-action">
                    <option value="show">نشان دادن</option>
                    <option value="hide">پنهان شدن</option>
                </select>
                <?php echo $type; ?> اگر تمام شرایط زیر برآورده شود.
            </td>
        </tr>
        <tr>
            <td>
            	<table class="thwcfe_conditional_rules_ajax ajax-rules"><tbody>
                    <tr class="thwcfe_rule_set_row">
                        <td class="p-0">
                            <table class="thwcfe_rule_set"><tbody>
                                <tr class="thwcfe_rule_row">
                                    <td class="p-0">
                                        <table class="thwcfe_rule" style=""><tbody>
                                            <tr class="thwcfe_condition_set_row">
                                                <td class="p-0">
                                                    <table class="thwcfe_condition_set" style=""><tbody>
                                                        <tr class="thwcfe_condition">
                                                        	<td class="thpladmin_rule_operand operand">
                                                            	<input type="hidden" name="i_rule_operand_type" value="field" />
                                                            	<?php $this->render_form_fragment_fields_select(); ?>
                                                            </td>
                                                            <td class="operator">
                                                                <select name="i_rule_operator" onchange="thwcfeRuleOperatorChangeListnerAjax(this)">
                                                                    <option value="">انتخاب اپراتور ...</option>
                                                                    <option value="empty">خالی است</option>
                                                                    <option value="not_empty">خالی نیست</option>
                                                                    <option value="value_eq">مقدار برابر است با </option>
                                                                    <option value="value_ne">مقدار برابر نیست با</option>
                                                                    <option value="value_in">امقدار در</option>
                                                                    <option value="value_cn">دارای</option>
                                                                    <option value="value_nc">شامل نمی شود</option>
                                                                    <option value="value_gt">مقدار بیش از</option>
                                                                    <option value="value_le">مقدار کمتر از</option>
                                                                    <option value="value_sw">مقدار شروع میشود با</option>
                                                                    <option value="value_nsw">مقدار شروع نمی شود با</option>
																	<option value="date_eq">تاریخ برابر با</option>
                                                                    <option value="date_ne">تاریخ برابر نیست با</option>
                                                                    <option value="date_gt">تاریخ پس از</option>
                                                                    <option value="date_lt">تاریخ قبل</option>
																	<option value="day_eq">روز برابر است با</option>
                                                                    <option value="day_ne">روز برابر نیست با</option>
                                                                    <option value="checked">بررسی می شود</option>
                                                                    <option value="not_checked">بررسی نمی شود</option>
                                                                    <option value="regex">بیان مطابقت</option>
                                                                </select>
                                                            </td>
                                                            <td class="value">
                                                            	<input type="text" name="i_rule_value" />
                                                            </td>
                                                            <td class="actions">
                                                              <a href="javascript:void(0)" class="thpl_logic_link" onclick="thwcfeAddNewConditionRowAjax(this, 1)" title="">و</a>
                                                              <a href="javascript:void(0)" class="thpl_logic_link" onclick="thwcfeAddNewConditionRowAjax(this, 2)" title="">یا</a>
                                                              <a href="javascript:void(0)" class="thpl_delete_icon dashicons dashicons-no" onclick="thwcfeRemoveRuleRowAjax(this)" title="Remove"></a>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
        		</tbody></table>
        	</td>
        </tr>
        <?php
	}

	public function render_form_fragment_repeat_rules($props, $type="field"){
		?>
        <tr class="thwcfe_repeat_rule">
        	<td class="label">تکرار <?php echo $type; ?> برای</td>
        	<?php $this->render_form_fragment_tooltip(''); ?>
        	<td class="field">
        		<table border="0" width="100%"><tbody>
					<tr>
						<td class="p-0" width="40%">
				            <select name="i_repeat_operator" style="width:200px;" onchange="thwcfeRepeatOperatorChangeListner(this)">
				            	<option value="">یک گزینه را انتخاب کنید ...</option>
				                <option value="qty_product">مقدار محصول</option>
				                <option value="qty_cart">تعداد سبد خرید</option>
				            </select>
				        </td>
				        <td class="p-0 thpladmin_repeat_operand"><input type="text" name="i_repeat_operand" style="width:200px;"/></td>
					</tr>
				</tbody></table>
        	</td>
        </tr>
        <?php
        $this->render_form_elm_row($props['rpt_name_suffix']);
        $this->render_form_elm_row($props['rpt_label_suffix']);
        $this->render_form_elm_row($props['rpt_incl_parent']);

        if($type === "section"){
	        $this->render_form_elm_row($props['inherit_display_rule']);
	        $this->render_form_elm_row($props['inherit_display_rule_ajax']);
	        $this->render_form_elm_row($props['auto_adjust_display_rule_ajax']);
	    }
	}

	private function render_form_fragment_fields_select(){
		$sections = THWCFE_Utils::get_custom_sections();
		$show_name = apply_filters('thwcfe_show_filed_name_for_field_list_in_conditions_tab', true);

		$other_fields = array('ship-to-different-address-checkbox' => 'Ship to a different address');
		if(THWCFE_Utils::get_settings('enable_conditions_payment_shipping')){
			$other_fields['shipping_method[0]'] = 'Shipping Method';
			$other_fields['payment_method'] = 'Payment Method';
		}
		$other_fields = apply_filters('thwcfe_extra_fields_for_diaplay_rules', $other_fields); //Deprecated
		$other_fields = apply_filters('thwcfe_extra_fields_for_display_rules', $other_fields);

		?>
        <select multiple="multiple" name="i_rule_operand" data-placeholder="Click to select field(s)" class="thwcfe-enhanced-multi-select" value="" style="width: 98%;">
			<?php
			if($sections && is_array($sections)){
				foreach($sections as $sname => $section){
					if($section && THWCFE_Utils_Section::is_valid_section($section)){
						$fields = THWCFE_Utils_Section::get_fields($section);
						if($fields && is_array($fields)){
							echo '<optgroup label="'. $section->get_property('title') .'">';
							foreach($fields as $name => $field){
								if($field && THWCFE_Utils_Field::is_valid_field($field) && THWCFE_Utils_Field::is_enabled($field)){
									$label = $field->get_property('title');
									$label = empty($label) ? $name : $label;
									if($show_name){
										$label .= ' ('. $name .')';
									}
									echo '<option value="'. $name .'" >'. $label .'</option>';
								}
							}
							echo '</optgroup>';
						}
					}
				}
				echo '<optgroup label="Other Fields">';
				foreach($other_fields as $name => $label){
					if($name && $label){
						echo '<option value="'. $name .'" >'. THWCFE_i18n::t($label) .'</option>';
					}
				}
				echo '</optgroup>';
			}
            ?>
        </select>
        <?php
	}

	public function render_field_form_fragment_fields_wrapper(){
		?>
        <div id="thwcfe_checkout_fields_select" style="display:none;">
			<?php $this->render_form_fragment_fields_select(); ?>
        </div>
        <?php
	}

	/*private function render_field_form_fragment_product_list(){
		//$products = apply_filters( "thpladmin_load_products", array() );
		$products = WCFE_Checkout_Fields_Utils::load_products();
		if(!empty($products)){
			array_unshift( $products , array( "id" => "-1", "title" => "All Products" ));
			?>
	        <div id="thwcfe_product_select" style="display:none;">
	        <select multiple="multiple" name="i_rule_operand" data-placeholder="برای انتخاب محصولات کلیک کنید" class="thwcfe-enhanced-multi-select thwcfe-operand" value="" style="width: 98%;">
				<?php
	                foreach($products as $product){
	                    echo '<option value="'. $product["id"] .'" >'. $product["title"] .'</option>';
	                }
	            ?>
	        </select>
	        </div>
	        <?php
	    }else{
	    	?>
	        <div id="thwcfe_product_select" style="display:none;">
	        <input type="text" name="i_rule_operand" class="thwcfe-operand" value="">
	        </div>
	        <?php
	    }
	}*/

	public function render_field_form_fragment_product_list(){
		?>
        <div id="thwcfe_product_select" style="display:none;">
        <select multiple="multiple" name="i_rule_operand" data-placeholder="برای انتخاب محصولات کلیک کنید" class="thwcfe-enhanced-multi-select1 thwcfe-operand thwcfe-product-select" value="" style="width: 98%;">
        </select>
        </div>
        <?php
	}

	public function render_field_form_fragment_product_type_list(){
		?>
        <div id="thwcfe_product_type_select" style="display:none;">
        <select multiple="multiple" name="i_rule_operand" data-placeholder="برای انتخاب محصولات کلیک کنید Types" class="thwcfe-enhanced-multi-select1 thwcfe-operand thwcfe-product-type-select" value="" style="width: 98%;">
        </select>
        </div>
        <?php
	}

	public function render_field_form_fragment_category_list(){
		$categories = THWCFE_Admin_Utils::load_products_cat();

		if(!empty($categories)){
			// Removed (3.1.7) "ALL categories" because category taxonomy already have an "Uncategorized" term & it can handle "All categories" functionality
			//array_unshift( $categories , array( "id" => "-1", "title" => "All Categories" ));
			?>
	        <div id="thwcfe_product_cat_select" style="display:none;">
	        <select multiple="multiple" name="i_rule_operand" data-placeholder="Click to select categories" class="thwcfe-enhanced-multi-select thwcfe-operand thwcfe-category-select" value="" style="width: 98%;">
				<?php
	                foreach($categories as $category){
	                    echo '<option value="'. $category["id"] .'" >'. $category["title"] .'</option>';
	                }
	            ?>
	        </select>
	        </div>
	        <?php
	    }else{
	    	?>
	        <div id="thwcfe_product_cat_select" style="display:none;">
	        <input type="text" name="i_rule_operand" class="thwcfe-operand" value="">
	        </div>
	        <?php
	    }
	}

	public function render_field_form_fragment_tag_list(){
		$tags = THWCFE_Admin_Utils::load_product_tags();

		if(!empty($tags)){
			array_unshift( $tags , array( "id" => "-1", "title" => "All Tags" ));
			?>
	        <div id="thwcfe_product_tag_select" style="display:none;">
	        <select multiple="multiple" name="i_rule_operand" data-placeholder="Click to select tags" class="thwcfe-enhanced-multi-select" value="" style="width: 98%;">
				<?php
	                foreach($tags as $tag){
	                    echo '<option value="'. $tag["id"] .'" >'. $tag["title"] .'</option>';
	                }
	            ?>
	        </select>
	        </div>
	        <?php
	    }else{
	    	?>
	        <div id="thwcfe_product_tag_select" style="display:none;">
	        <input type="text" name="i_rule_operand" class="thwcfe-operand" value="">
	        </div>
	        <?php
	    }
	}

	public function render_field_form_fragment_user_role_list(){
		$user_roles = THWCFE_Admin_Utils::load_user_roles();
		//$user_roles = apply_filters( "thpladmin_load_user_roles", array() );
		//array_unshift( $user_roles , array( "id" => "-1", "title" => "All User Roles" ));
		?>
        <div id="thwcfe_user_role_select" style="display:none;">
        <select multiple="multiple" name="i_rule_operand" data-placeholder="Click to select user roles" class="thwcfe-enhanced-multi-select" value="" style="width: 98%;">
			<?php
                foreach($user_roles as $role){
                    echo '<option value="'. $role["id"] .'" >'. $role["title"] .'</option>';
                }
            ?>
        </select>
        </div>
        <?php
	}

	/*----- Tab Title -----*/
	public function render_form_tab_main_title($title){
		?>
		<main-title classname="main-title">
			<button class="device-mobile btn--back Button">
				<i class="button-icon button-icon-before i-arrow-back"></i>
			</button>
			<span class="device-mobile main-title-icon text-primary"><i class="i-check drishy"></i><?php echo $title; ?></span>
			<span class="device-desktop"><?php echo $title; ?></span>
		</main-title>
		<?php
	}

	/*----- Form Element Row -----*/
	public function render_form_elm_row($field, $args=array()){
		$row_class = $this->prepare_settings_row_class( $field );
		?>
		<tr class="<?php echo esc_attr( $row_class ); ?>">
			<?php $this->render_form_field_element($field, $this->cell_props); ?>
		</tr>
		<?php
	}

	public function render_form_elm_row_ta($field, $args=array()){
		$row_class = $this->prepare_settings_row_class( $field );
		?>
		<tr class="<?php echo esc_attr( $row_class ); ?>">
			<?php $this->render_form_field_element($field, $this->cell_props_TA); ?>
		</tr>
		<?php
	}

	public function render_form_elm_row_cb($field, $args=array()){
		$row_class = $this->prepare_settings_row_class( $field );
		?>
		<tr class="<?php echo esc_attr( $row_class ); ?>">
			<td colspan="2"></td>
			<td class="field">
	    		<?php $this->render_form_field_element($field, $this->cell_props_CB, false); ?>
	    	</td>
	    </tr>
		<?php
	}

	public function render_form_elm_row_cp($field, $args=array()){
		?>
		<tr>
	    	<?php $this->render_form_field_element($field, $this->cell_props_CP); ?>
	    </tr>
		<?php
	}

	public function prepare_settings_row_class( $field ){
		$name = isset($field['name']) ? $field['name'] : '';
		return 'form_field_'.$name;
		//return isset( $field['name'] ) ? 'thwepo-field-'.$field['name'] : '';
	}
}

endif;
