<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'demo_meta_box',
    'title'       => __( 'ویژگی های پست', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'post','product' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(

    //   array(
    //     'label'       => __( '» تب لینک های دانلود', 'theme-text-domain' ),
    //     'id'          => 'box_wlinkdl_tab',
    //     'type'        => 'tab'
    //   ),
	  // array(
    //     'id'          => 'box_wlinkdl_on_off',
    //     'label'       => __( 'لینک های دانلود', 'theme-text-domain' ),
    //     'desc'        => sprintf( __( 'فعال سازی/غیرفعال سازی تب', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
    //     'std'         => 'off',
    //     'type'        => 'on-off',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and'
    //   ),
    //   array(
    //     'label'       => '',
    //     'id'          => 'box_wlinkdl',
    //     'type'        => 'textarea',
    //     'desc'        => __( 'لینک های دانلود و سایر مشخصات آن ها را وارد نمایید. ( بدون نیاز به قرار دادن لیست)', 'theme-text-domain' )
    //   ),

      // array(
      //   'label'       => __( '» تب راهنمای نصب', 'theme-text-domain' ),
      //   'id'          => 'box_wrahnama_tab',
      //   'type'        => 'tab'
      // ),
	  // array(
    //     'id'          => 'box_wrahnama_on_off',
    //     'label'       => __( 'راهنمای نصب', 'theme-text-domain' ),
    //     'desc'        => sprintf( __( 'فعال سازی/غیرفعال سازی تب', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
    //     'std'         => 'off',
    //     'type'        => 'on-off',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and'
    //   ),
    //   array(
    //     'label'       => '',
    //     'id'          => 'box_wrahnama',
    //     'type'        => 'textarea',
    //     'desc'        => __( 'توضیحات و راهنمایی ها را وارد نمایید.', 'theme-text-domain' )
    //   ),
      array(
        'label'       => __( 'ویژگی های اضافی محصول', 'theme-text-domain' ),
        'id'          => 'box_winfor_tab',
        'type'        => 'tab'
      ),
	  // array(
    //     'id'          => 'box_winfor_on_off',
    //     'label'       => __( 'توضیحات و مشخصات', 'theme-text-domain' ),
    //     'desc'        => sprintf( __( 'فعال سازی/غیرفعال سازی تب', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
    //     'std'         => 'off',
    //     'type'        => 'on-off',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and'
    //   ),

      array(
        'label'       => 'دکمه اول ( زیر افزودن سبد خرید) (این دکمه در صفحه لیست محصولات نیز نشان داده میشود)',
        'id'          => 'box_winfor_btn1_text',
        'type'        => 'text',
        'desc'        => __( 'متن دکمه', 'theme-text-domain' )
      ),
      array(
        'label'       => '',
        'id'          => 'box_winfor_btn1_link',
        'type'        => 'text',
        'desc'        => __( 'لینک دکمه', 'theme-text-domain' )
      ),
      array(
        'label'       => 'دکمه دوم ( زیر افزودن سبد خرید)',
        'id'          => 'box_winfor_btn2_text',
        'type'        => 'text',
        'desc'        => __( 'متن دکمه', 'theme-text-domain' )
      ),
      array(
        'label'       => '',
        'id'          => 'box_winfor_btn2_link',
        'type'        => 'text',
        'desc'        => __( 'لینک دکمه', 'theme-text-domain' )
      ),
      
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_size',
      //   'type'        => 'text',
      //   'desc'        => __( 'حجم فایل', 'theme-text-domain' )
      // ),
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_creator',
      //   'type'        => 'text',
      //   'desc'        => __( 'شرکت سازنده', 'theme-text-domain' )
      // ),
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_source',
      //   'type'        => 'text',
      //   'desc'        => __( 'منبع', 'theme-text-domain' )
      // ),
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_dategame',
      //   'type'        => 'text',
      //   'desc'        => __( 'تاریخ انتشار رسمی بازی', 'theme-text-domain' )
      // ),
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_gamesopt',
      //   'type'        => 'text',
      //   'desc'        => __( 'امتیاز سایت GameSopt', 'theme-text-domain' )
      // ),
	  	// array(
      //   'label'       => '',
      //   'id'          => 'box_winfor_age',
      //   'type'        => 'text',
      //   'desc'        => __( 'رده بندی سنی', 'theme-text-domain' )
      // ),	  
	  // array(
    //     'id'          => 'box_winforsys_on_off',
    //     'label'       => __( 'سیستم مورد نیاز', 'theme-text-domain' ),
    //     'desc'        => sprintf( __( 'فعال سازی/غیرفعال سازی', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
    //     'std'         => 'off',
    //     'type'        => 'on-off',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and'
    //   ),
      // array(
      //   'label'       => '',
      //   'id'          => 'box_winforsys',
      //   'type'        => 'textarea',
      //   'desc'        => __( 'اطلاعات سیستم مورد نیاز را وارد نمایید(بدون نیاز به لیست)', 'theme-text-domain' )
      // ),
	  // array(
    //     'label'       => __( '» مشخصات فیلم', 'theme-text-domain' ),
    //     'id'          => 'demo_more_options',
    //     'type'        => 'tab'
    //   ),
	  //  array(
    //     'id'          => 'serial_infor_on_off',
    //     'label'       => __( 'قسمت فیلم یا سریال', 'theme-text-domain' ),
    //     'desc'        => sprintf( __( 'فعال سازی/غیرفعال سازی', 'theme-text-domain' ), '<code>on</code>', '<code>off</code>' ),
    //     'std'         => 'off',
    //     'type'        => 'on-off',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and'
    //   ),
	  // array(
    //     'label'       => 'مشخصات فیلم یا سریال',
    //     'id'          => 'serial_infor_enteshar',
    //     'type'        => 'text',
    //     'desc'        => __( 'منتشر کننده فایل', 'theme-text-domain' )
    //   ),
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_xhaner',
    //     'type'        => 'text',
    //     'desc'        => __( 'ژانر', 'theme-text-domain' )
    //   ),
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_imdb',
    //     'type'        => 'text',
    //     'desc'        => __( 'امتیاز IMDB', 'theme-text-domain' )
    //   ),
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_lang',
    //     'type'        => 'text',
    //     'desc'        => __( 'زبان فیلم', 'theme-text-domain' )
    //   ),	
		// array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_year',
    //     'type'        => 'text',
    //     'desc'        => __( 'سال انتشار', 'theme-text-domain' )
    //   ),	
    //   array(
    //     'id'          => 'serial_infor_resolation',
    //     'label'       => '',
    //     'desc'        => __( 'رزولوشن های موجود را تیک بزنید.', 'theme-text-domain' ),
    //     'std'         => '',
    //     'type'        => 'checkbox',
    //     'rows'        => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and',
    //     'choices'     => array( 
    //       array(
    //         'value'       => '480P',
    //         'label'       => __( '480P', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => '720P',
    //         'label'       => __( '720P', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => '1080P',
    //         'label'       => __( '1080P', 'theme-text-domain' ),
    //         'src'         => ''
    //       )
    //     )
    //   ),
    //   array(
    //     'id'          => 'serial_infor_resolationx',
    //     'label'       => '',
    //     'desc'        => ' ',
    //     'std'         => '',
    //     'type'        => 'checkbox',
    //     'rows'        => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and',
    //     'choices'     => array( 
    //       array(
    //         'value'       => '480P x265',
    //         'label'       => __( '480P x265', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => '720P x265',
    //         'label'       => __( '720P x265', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => '1080P x265',
    //         'label'       => __( '1080P x265', 'theme-text-domain' ),
    //         'src'         => ''
    //       )
    //     )
    //   ),	  
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_quality',
    //     'type'        => 'text',
    //     'desc'        => __( 'کیفیت فیلم(امتیاز عددی از 1 تا 5)', 'theme-text-domain' )
    //   ),	
	  //  array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_clock',
    //     'type'        => 'text',
    //     'desc'        => __( 'زمان فیلم', 'theme-text-domain' )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_format',
    //     'type'        => 'text',
    //     'desc'        => __( 'فرمت', 'theme-text-domain' )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_size',
    //     'type'        => 'text',
    //     'desc'        => __( 'حجم', 'theme-text-domain' )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_contry',
    //     'type'        => 'text',
    //     'desc'        => __( 'کشور محصول', 'theme-text-domain' )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_stars',
    //     'type'        => 'text',
    //     'desc'        => __( 'ستارگان', 'theme-text-domain' )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'serial_infor_kargardan',
    //     'type'        => 'text',
    //     'desc'        => __( 'کارگردان', 'theme-text-domain' )
    //   ),		  
      // array(
      //   'label'       => __( '» نوع مطلب', 'theme-text-domain' ),
      //   'id'          => 'type_wpost_tab',
      //   'type'        => 'tab'
      // ),
	  //  array(
    //     'id'          => 'wtype_post_radio',
    //     'label'       => __( 'تعیین نوع پست', 'theme-text-domain' ),
    //     'desc'        => __( 'نوع مورد نظر خود را انتخاب نمایید و یا در غیر این صورت برای قرار دادن عکس کوچک نوع را روی سفارشی و سپس تصویر را آپلود نمایید.', 'theme-text-domain' ),
    //     'std'         => '',
    //     'type'        => 'radio',
    //     'section'     => 'option_types',
    //     'rows'        => '',
    //     'post_type'   => '',
    //     'taxonomy'    => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and',
    //     'choices'     => array( 
		//  array(
    //         'value'       => 'default_wtype',
    //         'label'       => __( 'پیشفرض', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'special_image_wtype',
    //         'label'       => __( 'سفارشی(قرار دادن عکس)', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'android_wtype',
    //         'label'       => __( 'پست اندروید', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'ios_wtype',
    //         'label'       => __( 'پست ios', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'windows_wtype',
    //         'label'       => __( 'پست ویندوز', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'linux_wtype',
    //         'label'       => __( 'پست لینوکس', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'macintash_wtype',
    //         'label'       => __( 'پست مکینتاش', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'music_wtype',
    //         'label'       => __( 'پست موزیک', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'film_wtype',
    //         'label'       => __( 'پست فیلم', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'pcomputer_wtype',
    //         'label'       => __( 'پست PC', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'mobile_wtype',
    //         'label'       => __( 'پست موبایل', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'news_wtype',
    //         'label'       => __( 'پست خبری', 'theme-text-domain' ),
    //         'src'         => ''
    //       )
    //     )
    //   ),	
	  // array(
    //     'label'       => '',
    //     'id'          => 'special_image_address_wtype',
    //     'type'        => 'upload',
    //     'desc'        => __( 'تصویر خود را آپلود نمایید', 'theme-text-domain' )
    //   ),
    //   array(
    //     'label'       => __( '» برچسب مطلب', 'theme-text-domain' ),
    //     'id'          => 'badge_post_tab',
    //     'type'        => 'tab'
    //   ),
	  // array(
    //     'id'          => 'badge_post_ic',
    //     'label'       => 'برچسب های مطلب',
    //     'desc'        => __( 'برچسب ها را جهت نمایش انتخاب نمایید.', 'theme-text-domain' ),
    //     'std'         => '',
    //     'type'        => 'checkbox',
    //     'rows'        => '',
    //     'min_max_step'=> '',
    //     'class'       => '',
    //     'condition'   => '',
    //     'operator'    => 'and',
    //     'choices'     => array( 
    //       array(
    //         'value'       => 'update',
    //         'label'       => __( 'برچسب آپدیت شده', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'vip',
    //         'label'       => __( 'برچسب VIP', 'theme-text-domain' ),
    //         'src'         => ''
    //       ),
    //       array(
    //         'value'       => 'new',
    //         'label'       => __( 'برچسب جدید', 'theme-text-domain' ),
    //         'src'         => ''
    //       )
    //     )
    //   )

    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

}