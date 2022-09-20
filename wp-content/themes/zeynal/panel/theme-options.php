<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'تنظیمات قالب', 'theme-text-domain' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'option_types',
        'title'       => __( 'تنظیمات عمومی', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'ads_types',
        'title'       => __( 'مدیریت تبلیغات', 'theme-text-domain' )
      ),
	  	array(
        'id'          => 'categorya_types',
        'title'       => __( 'آخرین های دسته بندی', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'footerc_types',
        'title'       => __( 'دسته بندی های فوتر', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'social_types',
        'title'       => __( 'شبکه های اجتماعی', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'necessary_types',
        'title'       => __( 'مدیریت فروشگاه', 'theme-text-domain' )
      ),
	  
	  
    ),
    'settings'        => array( 
	  array(
        'id'          => 'logo_upload',
        'label'       => __( 'لوگو سایت', 'theme-text-domain' ),
        'desc'        => sprintf( __( 'لوگوی خود را آپلود نمایید', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'Send to OptionTree', 'theme-text-domain' ) ), 'FTP' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo_footer_zeynal_upload',
        'label'       => __( 'لوگو فوتر', 'theme-text-domain' ),
        'desc'        => sprintf( __( 'لوگوی خود را آپلود نمایید', 'theme-text-domain' ), apply_filters( 'ot_upload_text', __( 'Send to OptionTree', 'theme-text-domain' ) ), 'FTP' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	   array(
        'id'          => 'link_recuest_text',
        'label'       => __( 'لینک دکمه درخواست نرم افزار و بازی', 'theme-text-domain' ),
        'desc'        => __( 'این دکمه در صفحه نمایش های بزرگ در ساید بار راست و در صفحه نمایش های کوچک مانند گوشی در سایدبار سمت چپ قرار میگیرد.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	array(
        'id'          => 'link_recuest_newvertion_text',
        'label'       => __( 'لینک صفحه گزارش نسخه جدید', 'theme-text-domain' ),
        'desc'        => __( 'این دکمه در صفحه نمایش های بزرگ در ساید بار راست و در صفحه نمایش های کوچک مانند گوشی در سایدبار سمت چپ قرار میگیرد.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	array(
        'id'          => 'link_recuest_foillink_text',
        'label'       => __( 'لینک صفحه گزارش خرابی لینک', 'theme-text-domain' ),
        'desc'        => __( 'این دکمه در صفحه نمایش های بزرگ در ساید بار راست و در صفحه نمایش های کوچک مانند گوشی در سایدبار سمت چپ قرار میگیرد.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
	  	array(
        'id'          => 'link_recuest_traningdla_text',
        'label'       => __( 'لینک صفحه راهنمای نصب و دانلود', 'theme-text-domain' ),
        'desc'        => __( 'این دکمه در صفحه نمایش های بزرگ در ساید بار راست و در صفحه نمایش های کوچک مانند گوشی در سایدبار سمت چپ قرار میگیرد.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      	  
	  array(
      'id'          => 'lastposts1_catidro_text',
  'label'       => __( 'آخرین مطالب نوع اول ', 'theme-text-domain' ),
      'desc'        => __( 'این باکس در سایدبار قرار میگیرد', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'category-select',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),	
    array(
      'id'          => 'lastposts1_name_catidro_text',
      'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'text',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),

      array(
      'id'          => 'lastposts1_icon_catidro_text',
      'label'       => '',
      'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'text',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),
    array(
      'id'          => 'lastposts2_catidro_text',
  'label'       => __( 'آخرین مطالب نوع دوم ', 'theme-text-domain' ),
      'desc'        => __( 'این باکس در سایدبار قرار میگیرد', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'category-select',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),	
    array(
      'id'          => 'lastposts2_name_catidro_text',
      'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'text',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),

      array(
      'id'          => 'lastposts2_icon_catidro_text',
      'label'       => '',
      'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
      'std'         => '',
      'type'        => 'text',
      'section'     => 'option_types',
      'rows'        => '',
      'post_type'   => '',
      'taxonomy'    => '',
      'min_max_step'=> '',
      'class'       => '',
      'condition'   => '',
      'operator'    => 'and'
    ),
	  	  array(
        'id'          => 'icon1_catid_text',
		'label'       => __( 'دسته بندی اول', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon1_name_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon1_co_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
	  
	  
	  array(
        'id'          => 'icon2_catid_text',
		'label'       => __( 'دسته بندی دوم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon2_name_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon2_co_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon3_catid_text',
		'label'       => __( 'دسته بندی سوم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon3_name_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon3_co_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon4_catid_text',
		'label'       => __( 'دسته بندی چهارم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon4_name_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
 
	  	  array(
        'id'          => 'icon4_co_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon5_catid_text',
		'label'       => __( 'دسته بندی پنجم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon5_name_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon5_co_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	   array(
        'id'          => 'icon1_catidro_text',
		'label'       => __( 'دسته بندی اول', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon1_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon1_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
	  
	  
	  array(
        'id'          => 'icon2_catidro_text',
		'label'       => __( 'دسته بندی دوم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon2_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon2_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon3_catidro_text',
		'label'       => __( 'دسته بندی سوم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon3_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon3_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon4_catidro_text',
		'label'       => __( 'دسته بندی چهارم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon4_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
 
	  	  array(
        'id'          => 'icon4_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon5_catidro_text',
		'label'       => __( 'دسته بندی پنجم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon5_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon5_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'icon6_catidro_text',
		'label'       => __( 'دسته بندی ششم', 'theme-text-domain' ),
        'desc'        => __( 'دسته بندی که قصد دارید نمایش دهید انتخاب نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	array(
        'id'          => 'icon6_namero_text',
        'desc'        => __( 'نام فارسی دسته بندی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	  array(
        'id'          => 'icon6_ro_text',
        'label'       => '',
        'desc'        => __( 'شناسه فونت آیکون را وارد نمایید. مانند: fa-cog <br> برای پیدا کردن به سایت http://fontawesome.io مراجعه نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'categorya_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  	array(
        'id'          => 'link_rss_text',
        'label'       => __( 'لینک rss سایت', 'theme-text-domain' ),
        'desc'        => __( 'لینک مورد نظر خود را قرار دهید.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	  	array(
        'id'          => 'link_twitter_text',
        'label'       => __( 'آدرس twitter سایت', 'theme-text-domain' ),
        'desc'        => __( 'آدرس مورد نظر خود را وارد نمایید.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'link_insta_text',
        'label'       => __( 'آدرس instagram سایت', 'theme-text-domain' ),
        'desc'        => __( 'آدرس مورد نظر خود را وارد نمایید.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'link_aparatzey_text',
        'label'       => __( 'آدرس آپارات', 'theme-text-domain' ),
        'desc'        => __( 'آدرس مورد نظر خود را وارد نمایید.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'link_tlg1_text',
        'label'       => __( 'تلگرام', 'theme-text-domain' ),
        'desc'        => __( 'آدرس کانال تلگرام را وارد نمایید.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        
      ),	  	  
	  	array(
        'id'          => 'link_adsresv_text',
        'label'       => __( 'مدیریت تبلیغات قالب', 'theme-text-domain' ),
        'desc'        => __( 'لینک صفحه رزرو تبلیغات', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'ads_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
      array(
        'id'          => 'adshraderzeynal_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 728/90 <br> کد بنر خود را قرار دهید - این بنر در  هدر نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  array(
        'id'          => 'ads728_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 728/90 <br> کد بنر خود را قرار دهید - این بنر در زیر هدر نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  
	  	array(
        'id'          => 'ads340_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 340/90 <br> کد بنر خود را قرار دهید - این بنر در زیر هدر نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  	  	array(
        'id'          => 'ads468_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 468/60 (حداکثر 4 بنر) <br> کد بنر های خود را قرار دهید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  

	  
	  	array(
        'id'          => 'ads120l_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 120/240 <br> کد بنر خود را قرار دهید - این بنر در زیر سایدبار سمت چپ نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  	  	array(
        'id'          => 'ads250_textarea',
        'label'       => '',
        'desc'        => __( 'بنر اندازه 250/250 <br> کد بنر خود را قرار دهید - این بنر در پایین ساید بار سمت چپ نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	  	    array(
        'id'          => 'ads468between_on_off',
        'desc'        => sprintf( __( 'فعال سازی / غیرفعال سازی قسمت تبلیغات بین پستی', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'ads_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'ads468between_textarea',
        'label'       => '',
        'desc'        => __( 'بنر 468/60 (بعد از دو پست اولی سایت) <br> کد بنر خود را قرار دهید - این بنر بعد از دو پست اولی سایت نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'ads468botomdl_on_off',
        'desc'        => sprintf( __( 'فعال سازی / غیرفعال سازی قسمت تبلیغات زیر باکس دانلود', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'ads_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'id'          => 'ads468botomdl_textarea',
        'label'       => '',
        'desc'        => __( 'بنر 468/60 (بعد از دو پست اولی سایت) <br> کد بنر خود را قرار دهید - این بنر بعد از باکس دانلود در صفحه نوشته نمایش داده میشود.', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	    array(
        'id'          => 'fixads1_on_off',
        'label'       => __( 'تبلیغات ثابت', 'theme-text-domain' ),
        'desc'        => sprintf( __( 'فعال سازی / غیرفعال سازی قسمت تبلیغات ثابت', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'ads_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  	  array(
        'id'          => 'adsfix_home_textarea',
        'desc'        => __( 'کد تبلیغات ثابت خود در صفحه اصلی را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  	array(
        'id'          => 'adsfix_post_textarea',
        'label'       => __( '', 'theme-text-domain' ),
        'desc'        => __( 'کد تبلیغات ثابت خود در صفحه نوشته را وارد نمایید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads_types',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),

	  
	  array(
		'id'          => 'necessary_list_soft',
		'desc'        => 'موارد خود را اضافه نمایید',
		'type'        => 'list-item',
		'section'     => 'necessary_types',
		'settings'    => array(
			array(
				'id'        => 'necessary_image1',
				'desc'        => 'آیکون',
				'type'      => 'text'
			),
			array(
				'id'        => 'necessary_link1',
				'desc'        => 'متن',
				'type'      => 'text'
			),
	)          
		),
		
		array(
        'id'          => 'adstxt1_on_off',
		'label'       => 'تبلیغات متنی',
        'desc'        => sprintf( __( 'فعال سازی / غیرفعال سازی', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'ads_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		
	    array(
		'id'          => 'adstxt_list',
		'desc'        => 'تبلیغات متنی خود را یک به یک اضافه نمایید.',
		'type'        => 'list-item',
		'section'     => 'ads_types',
		'settings'    => array(
			array(
				'id'        => 'adstxt_titr',
				'desc'        => 'عنوان اصلی تبلیغ متنی',
				'type'      => 'text'
			),
			array(
				'id'        => 'adstxt_deck',
				'desc'        => 'توضیح چند کلمه ای تبلیغ',
				'type'      => 'text'
			),
			array(
				'id'        => 'adstxt_tien',
				'desc'        => 'نام انگلیسی یا آدرس تبلیغ',
				'type'      => 'text'
			),
			array(
				'id'        => 'adstxt_link',
				'desc'        => 'لینک تبلیغ',
				'type'      => 'text'
			)
	)          
		),
    
		array(
        'id'          => 'footer1_textabout_catid_text',
		'label'       => __( 'توضیحات درباره سایت', 'theme-text-domain' ),
        'desc'        => __( 'متن خود را وارد کنید', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
 
	  array(
        'id'          => 'footer2__title_zeyna_catid_text',
        'label'       => __( 'باکس وسط فوتر', 'theme-text-domain' ),
        'desc'        => __( 'عنوان بخش', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'footer2_desc_zeyna_catid_text',
		    'label'       => '',
        'desc'        => __( 'توضیحات بخش', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'footer2_btn1_text_catid_text',
		    'label'       => '',
        'desc'        => __( 'متن دکمه اول', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),        
      array(
        'id'          => 'footer2_btn1_link_catid_text',
		    'label'       => '',
        'desc'        => __( 'لینک دکمه اول', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'footer2_btn2_text_catid_text',
		    'label'       => '',
        'desc'        => __( 'متن دکمه دوم', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),        
      array(
        'id'          => 'footer2_btn2_link_catid_text',
		    'label'       => '',
        'desc'        => __( 'لینک دکمه دوم', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footerc_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
    )
  );
  
  /**
 * Filters the required title field's label.
 */
function filter_list_item_title_label( $label, $id ) {
  if ( $id == 'necessary_list_soft' ) {
    $label = __( 'عنوان نرم افزار', 'theme-domain' );
  }
  return $label;
}
add_filter( 'ot_list_item_title_label', 'filter_list_item_title_label', 10, 2 );
/**
 * Filters the required title field's description.
 */
function filter_list_item_title_desc( $label, $id ) {
  if ( $id == 'necessary_list_soft' ) {
    $label = __( 'این فیلد در جایی نمایش داده نخواهد شد و فقط برای شناسایی نرم افزار مورد نظر می باشد.', 'theme-domain' );
  }
  return $label;
}
add_filter( 'ot_list_item_title_desc', 'filter_list_item_title_desc', 10, 2 );




function filter_list_item_title_label1( $label, $id ) {
  if ( $id == 'adstxt_list' ) {
    $label = __( 'اطلاعات تبلیغ متنی', 'theme-domain' );
  }
  return $label;
}
add_filter( 'ot_list_item_title_label', 'filter_list_item_title_label1', 10, 2 );
 
 function filter_list_item_title_desc1( $label, $id ) {
  if ( $id == 'adstxt_list' ) {
    $label = __( 'تاریخ انقضا تبلیغ (این فیلد در جایی نمایش داده نخواهد شد)', 'theme-domain' );
  }
  return $label;
}
add_filter( 'ot_list_item_title_desc', 'filter_list_item_title_desc1', 10, 2 );





  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}
?>