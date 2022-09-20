<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_prefix_my_options';

//
// Create options
//
CSF::createOptions( $prefix, array(
  'menu_title' => 'دمو تنظیمات مدیریت',
  'menu_slug'  => 'csf-demo',
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
  'title'  => 'مرور اجمالی',
  'icon'   => 'fas fa-rocket',
  'fields' => array(

    //
    // A text field
    //
    array(
      'id'    => 'opt-text',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'    => 'opt-textarea',
      'type'  => 'textarea',
      'title' => 'توضیحات',
      'help'  => 'متن راهنما برای این فیلد',
    ),

    array(
      'id'    => 'opt-upload',
      'type'  => 'upload',
      'title' => 'بارگذاری',
    ),

    array(
      'id'    => 'opt-switcher',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
      'label' => 'متن برچسب سوئیچر',
    ),

    array(
      'id'      => 'opt-color',
      'type'    => 'color',
      'title'   => 'رنگ',
      'default' => '#3498db',
    ),

    array(
      'id'    => 'opt-checkbox',
      'type'  => 'checkbox',
      'title' => 'چک باکس',
      'label' => 'متن برچسب چک باکس',
    ),

    array(
      'id'      => 'opt-radio',
      'type'    => 'radio',
      'title'   => 'رادیو',
      'options' => array(
        'yes'   => 'بله، لطفاً',
        'no'    => 'نه، ممنون',
      ),
      'default' => 'yes',
    ),

    array(
      'id'          => 'opt-select',
      'type'        => 'select',
      'title'       => 'انتخابی',
      'placeholder' => 'انتخاب گزینه',
      'options'     => array(
        'opt-1'     => 'گزینه 1',
        'opt-2'     => 'گزینه 2',
        'opt-3'     => 'گزینه 3',
      ),
    ),

    array(
      'id'      => 'opt-image-select',
      'type'    => 'image_select',
      'title'   => 'انتخاب تصویر',
      'options' => array(
        'opt-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
        'opt-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
        'opt-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
        'opt-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
        'opt-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
      ),
      'default' => 'opt-1',
    ),

    array(
      'id'    => 'opt-background',
      'type'  => 'background',
      'title' => 'پس زمینه',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'success',
      'content' => 'یک <strong>فیلد اطلاع رسانی</strong> با زمینه <strong>success</strong> استایل.',
    ),

    array(
      'id'    => 'opt-icon',
      'type'  => 'icon',
      'title' => 'آیکن',
    ),

    array(
      'id'    => 'opt-alt-text',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'         => 'opt-alt-textarea',
      'type'       => 'textarea',
      'title'      => 'توضیحات',
      'subtitle'   => 'توضیحات کوتاه عنوان.',
      'shortcoder' => 'csf_demo_shortcodes',
    ),

  )
) );

//
// Basic Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'basic_fields',
  'title' => 'تنظیمات پایه',
  'icon'  => 'fas fa-plus-circle',
) );

//
// Field: text
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'متن',
  'icon'        => 'far fa-square',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=text" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-text-1',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'      => 'opt-text-2',
      'type'    => 'text',
      'title'   => 'متن با مقدار پیشفرض',
      'default' => 'این متن یک مقدار پیشفرض است',
    ),

    array(
      'id'       => 'opt-text-3',
      'type'     => 'text',
      'title'    => 'متن با توضیحات تکمیلی',
      'subtitle' => 'متن با زیر عنوان',
      'help'     => 'متن راهنما برای این فیلد',
      'before'   => '<p>متن توضیحی قبل فیلد</p>',
      'after'    => '<p>متن توضیحی بعد فیلد</p>',
    ),

    array(
      'id'          => 'opt-text-4',
      'type'        => 'text',
      'title'       => 'متن با نگهدارنده',
      'placeholder' => 'متنی را تایپ کنید...'
    ),

    array(
      'id'         => 'opt-text-5',
      'type'       => 'text',
      'title'      => 'فقط قابل خواندن',
      'attributes' => array(
        'readonly' => 'readonly'
      ),
      'default'    => 'فقط متن خواندنی، قابل تغییر نیست'
    ),

    array(
      'id'          => 'opt-text-6',
      'type'        => 'text',
      'title'       => 'متن با حداکثر طول رشته (5)',
      'attributes'  => array(
        'maxlength' => '5'
      ),
      'default'     => 'الف ب پ',
    ),

    array(
      'id'         => 'opt-text-7',
      'type'       => 'text',
      'title'      => 'متن با استایل سفارشی',
      'attributes' => array(
        'style'    => 'width: 100%; height: 40px; border-color: #93C054;'
      ),
    ),

    array(
      'id'    => 'opt-text-8',
      'type'  => 'text',
      'after' => '<p>در صورت عدم وجود فیلد عنوان، عرض كامل را نشان می دهد.</p>',
    ),

  )
) );

//
// Field: textarea
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'توضیحات',
  'icon'        => 'far fa-square',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=textarea" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-textarea-1',
      'type'  => 'textarea',
      'title' => 'توضیحات',
    ),

    array(
      'id'      => 'opt-textarea-2',
      'type'    => 'textarea',
      'title'   => 'توضیحات با مقدار پیشفرض',
      'default' => 'این متن یک مقدار پیشفرض است',
    ),

    array(
      'id'          => 'opt-textarea-3',
      'type'        => 'textarea',
      'title'       => 'توضیحات با نگهدارنده',
      'placeholder' => 'متنی را تایپ کنید...'
    ),

    array(
      'id'         => 'opt-textarea-4',
      'type'       => 'textarea',
      'title'      => 'توضیحات با کد کوتاه',
      'shortcoder' => 'csf_demo_shortcodes',
    ),

    array(
      'id'       => 'opt-textarea-5',
      'type'     => 'textarea',
      'title'    => 'عنوان با توضیحات تکمیلی',
      'subtitle' => 'توضیحات با زیر عنوان',
      'help'     => 'متن راهنمای برای این فیلد',
      'before'   => '<p>متن توضیحی قبل فیلد</p>',
      'after'    => '<p>متن توضیحی بعد فیلد</p>',
    ),

    array(
      'id'    => 'opt-textarea-6',
      'type'  => 'textarea',
      'after' => '<p>در صورت عدم وجود فیلد عنوان، عرض كامل را نشان می دهد.</p>',
    ),

  )
) );

//
// Field: select
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'انتخابی',
  'icon'        => 'fas fa-list',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=select" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'          => 'opt-select-1',
      'type'        => 'select',
      'title'       => 'انتخابی',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'گزینه 1',
        'opt-2'     => 'گزینه 2',
        'opt-3'     => 'گزینه 3',
      ),
    ),

    array(
      'id'          => 'opt-select-2',
      'type'        => 'select',
      'title'       => 'انتخابی با مقدار پیشفرض',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'گزینه 1',
        'opt-2'     => 'گزینه 2',
        'opt-3'     => 'گزینه 3',
      ),
      'default'     => 'opt-2'
    ),

    array(
      'id'          => 'opt-select-3',
      'type'        => 'select',
      'title'       => 'انتخابی با مقادیر گروهی',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'گروه 1'   => array(
          'opt-1'   => 'گزینه 1',
          'opt-2'   => 'گزینه 2',
          'opt-3'   => 'گزینه 3',
        ),
        'گروه 2'   => array(
          'opt-4'   => 'گزینه 4',
          'opt-5'   => 'گزینه 5',
          'opt-6'   => 'گزینه 6',
        ),
        'گروه 3'   => array(
          'opt-7'   => 'گزینه 7',
          'opt-8'   => 'گزینه 8',
          'opt-9'   => 'گزینه 9',
        ),
      ),
    ),

    array(
      'id'         => 'opt-select-4',
      'type'       => 'select',
      'title'      => 'حالت چند انتخابی',
      'multiple'   => true,
      'attributes' => array(
        'style'    => 'min-width: 200px;'
      ),
      'options'    => array(
        'opt-1'    => 'گزینه 1',
        'opt-2'    => 'گزینه 2',
        'opt-3'    => 'گزینه 3',
        'opt-4'    => 'گزینه 4',
        'opt-5'    => 'گزینه 5',
        'opt-6'    => 'گزینه 6',
      ),
      'default'    => array( 'opt-2', 'opt-3' ),
    ),

    array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => 'یک استایل <strong>انتخاب</strong> کنید.',
    ),

    array(
      'id'          => 'opt-select-5',
      'type'        => 'select',
      'title'       => 'تک انتخابی',
      'chosen'      => true,
      'placeholder' => 'یک مقدار انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'مقدار 1',
        'opt-2'     => 'مقدار 2',
        'opt-3'     => 'مقدار 3',
        'opt-4'     => 'مقدار 4',
        'opt-5'     => 'مقدار 5',
        'opt-6'     => 'مقدار 6',
      ),
    ),

    array(
      'id'          => 'opt-select-6',
      'type'        => 'select',
      'title'       => 'چند انتخابی',
      'chosen'      => true,
      'multiple'    => true,
      'placeholder' => 'مقادیری را انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'مقدار 1',
        'opt-2'     => 'مقدار 2',
        'opt-3'     => 'مقدار 3',
        'opt-4'     => 'مقدار 4',
        'opt-5'     => 'مقدار 5',
        'opt-6'     => 'مقدار 6',
      ),
    ),

    array(
      'id'          => 'opt-select-7',
      'type'        => 'select',
      'title'       => 'انتخاب آجاکس با جستجوی صفحات',
      'chosen'      => true,
      'multiple'    => true,
      'sortable'    => true,
      'placeholder' => 'مقداری را انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'مقدار 1',
        'opt-2'     => 'مقدار 2',
        'opt-3'     => 'مقدار 3',
        'opt-4'     => 'مقدار 4',
        'opt-5'     => 'مقدار 5',
        'opt-6'     => 'مقدار 6',
      ),
      'default'     => array( 'opt-1', 'opt-2', 'opt-3' )
    ),

    array(
      'id'          => 'opt-select-8',
      'type'        => 'select',
      'title'       => 'انتخاب آجاکس چندگانه با جستجوی صفحات',
      'chosen'      => true,
      'multiple'    => true,
      'sortable'    => true,
      'ajax'        => true,
      'options'     => 'pages',
      'placeholder' => 'انتخاب صفحه',
    ),

    array(
      'id'          => 'opt-select-9',
      'type'        => 'select',
      'title'       => 'انتخاب آجاکس چندگانه با جستجوی نوشته',
      'chosen'      => true,
      'multiple'    => true,
      'sortable'    => true,
      'ajax'        => true,
      'options'     => 'posts',
      'placeholder' => 'انتخاب نوشته',
    ),

    array(
      'id'          => 'opt-select-10',
      'type'        => 'select',
      'title'       => 'انتخاب آجاکس چندگانه با جستجوی دسته بندی',
      'chosen'      => true,
      'ajax'        => true,
      'options'     => 'category',
      'placeholder' => 'انتخاب دسته بندی',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => 'از  گزینه های <strong>تعریف شده wp query</strong> انتخاب کنید.',
    ),

    array(
      'id'          => 'opt-select-11',
      'type'        => 'select',
      'title'       => 'انتخاب صفحه',
      'placeholder' => 'یک صفحه را انتخاب کنید',
      'options'     => 'pages',
    ),

    array(
      'id'          => 'opt-select-12',
      'type'        => 'select',
      'title'       => 'انتخاب نوشته',
      'placeholder' => 'یک نوشته را انتخاب کنید',
      'options'     => 'posts',
    ),

    array(
      'id'          => 'opt-select-13',
      'type'        => 'select',
      'title'       => 'انتخاب دسته بندی',
      'placeholder' => 'یک دسته بندی را انتخاب کنید',
      'options'     => 'categories',
    ),

    array(
      'id'          => 'opt-select-14',
      'type'        => 'select',
      'title'       => 'انتخاب فهرست',
      'placeholder' => 'یک فهرست را انتخاب کنید',
      'options'     => 'menus',
    ),

    array(
      'id'          => 'opt-select-15',
      'type'        => 'select',
      'title'       => 'انتخاب نوارکناری',
      'placeholder' => 'یک نوارکناری را انتخاب کنید',
      'options'     => 'sidebars',
    ),

    array(
      'id'          => 'opt-select-16',
      'type'        => 'select',
      'title'       => 'انتخاب نقش کاربری',
      'placeholder' => 'یک نقش کاربری را انتخاب کنید',
      'options'     => 'roles',
    ),

    array(
      'id'          => 'opt-select-17',
      'type'        => 'select',
      'title'       => 'انتخاب کاربر',
      'placeholder' => 'یک کاربر را انتخاب کنید',
      'options'     => 'users',
    ),

    array(
      'id'          => 'opt-select-18',
      'type'        => 'select',
      'title'       => 'انتخاب پست تایپ',
      'placeholder' => 'یک پست تایپ را انتخاب کنید',
      'options'     => 'post_types',
    ),

    array(
      'id'          => 'opt-select-19',
      'type'        => 'select',
      'title'       => 'انتخاب پست تایپ',
      'placeholder' => 'یک مقدار را انتخاب کنید',
      'options'     => 'post_types',
    ),
    
	array(
      'id'          => 'opt-select-20',
      'type'        => 'select',
      'title'       => 'انتخاب CPT (پست تایپ سفارشی)',
      'placeholder' => 'انتخاب پست',
      'options'     => 'posts',
      'query_args'  => array(
        'post_type' => 'your_post_type_name',
      ),
    ),

    array(
      'id'          => 'opt-select-21',
      'type'        => 'select',
      'title'       => 'انتخاب CPT (دسته بندی پست تایپ سفارشی)',
      'placeholder' => 'یک دسته بندی را انتخاب کنید',
      'options'     => 'categories',
      'query_args'  => array(
        'taxonomy'  => 'your_taxonomy_name',
      ),
    ),

  )
) );

//
// Field: checkbox
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'چک باکس',
  'icon'        => 'fas fa-check-square',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=checkbox" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-checkbox-1',
      'type'  => 'checkbox',
      'title' => 'چک باکس',
      'label' => 'توضحیات چک باکس',
    ),

    array(
      'id'      => 'opt-checkbox-2',
      'type'    => 'checkbox',
      'title'   => 'چک باکس با مقدار پیشفرض',
      'label'   => 'توضحیات چک باکس',
      'default' => true,
    ),

    array(
      'id'      => 'opt-checkbox-3',
      'type'    => 'checkbox',
      'title'   => 'چک باکس چند انتخابی',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'      => 'opt-checkbox-4',
      'type'    => 'checkbox',
      'title'   => 'چک باکس چند انتخابی خطی',
      'inline'  => true,
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'      => 'opt-checkbox-5',
      'type'    => 'checkbox',
      'title'   => 'چک باکس با مقادیر پیشفرض',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
      'default' => array( 'opt-1', 'opt-2' )
    ),

    array(
      'id'        => 'opt-checkbox-6',
      'type'      => 'checkbox',
      'title'     => 'چک باکس گروهی',
      'options'   => array(
        'گروه 1' => array(
          'opt-1' => 'گزینه 1',
          'opt-2' => 'گزینه 2',
          'opt-3' => 'گزینه 3',
        ),
        'گروه 2' => array(
          'opt-4' => 'گزینه 4',
          'opt-5' => 'گزینه 5',
          'opt-6' => 'گزینه 6',
        ),
      ),
    ),

    array(
      'id'       => 'opt-checkbox-7',
      'type'     => 'checkbox',
      'title'    => 'چک باکس چند حالته',
      'options'  => array(
        'opt-1'  => 'گزینه 1',
        'opt-2'  => 'گزینه 2',
        'opt-3'  => 'گزینه 3',
        'opt-4'  => 'گزینه 4',
        'opt-5'  => 'گزینه 5',
        'opt-6'  => 'گزینه 6',
        'opt-7'  => 'گزینه 7',
        'opt-8'  => 'گزینه 8',
        'opt-9'  => 'گزینه 9',
        'opt-10' => 'گزینه 10',
        'opt-11' => 'گزینه 11',
        'opt-12' => 'گزینه 12',
        'opt-13' => 'گزینه 13',
        'opt-14' => 'گزینه 14',
        'opt-15' => 'گزینه 15',
      ),
      'desc'     => 'پس از افزودن موارد زیادی پیمایش عمودی بصورت خودکار نشان داده می شود',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => 'انتخاب چک باکس با <strong>تعریف شده wp query</strong> همانند فیلد <strong>انتخابی</strong>. (دارای تمامی خواص فیلد انتخابی)',
    ),

    array(
      'id'      => 'opt-checkbox-8',
      'type'    => 'checkbox',
      'title'   => 'چک باکس با دسته بندی',
      'options' => 'categories',
    ),

  )
) );

//
// Field: radio
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'رادیو',
  'icon'        => 'fas fa-dot-circle',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=radio" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'      => 'opt-radio-1',
      'type'    => 'radio',
      'title'   => 'رادیو',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'      => 'opt-radio-2',
      'type'    => 'radio',
      'title'   => 'رادیو با مقدار پیشفرض',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
      'default' => 'opt-2',
    ),

    array(
      'id'      => 'opt-radio-3',
      'type'    => 'radio',
      'title'   => 'رادیو با مقادیر خطی',
      'inline'  => true,
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'        => 'opt-radio-4',
      'type'      => 'radio',
      'title'     => 'رادیو گروه بندی شده',
      'options'   => array(
        'گروه 1' => array(
          'opt-1' => 'گزینه 1',
          'opt-2' => 'گزینه 2',
          'opt-3' => 'گزینه 3',
        ),
        'گروه 2' => array(
          'opt-4' => 'گزینه 4',
          'opt-5' => 'گزینه 5',
          'opt-6' => 'گزینه 6',
        ),
      ),
    ),

    array(
      'id'       => 'opt-radio-5',
      'type'     => 'radio',
      'title'    => 'رادیو با مقادیر بسیار ',
      'options'  => array(
        'opt-1'  => 'گزینه 1',
        'opt-2'  => 'گزینه 2',
        'opt-3'  => 'گزینه 3',
        'opt-4'  => 'گزینه 4',
        'opt-5'  => 'گزینه 5',
        'opt-6'  => 'گزینه 6',
        'opt-7'  => 'گزینه 7',
        'opt-8'  => 'گزینه 8',
        'opt-9'  => 'گزینه 9',
        'opt-10' => 'گزینه 10',
        'opt-11' => 'گزینه 11',
        'opt-12' => 'گزینه 12',
        'opt-13' => 'گزینه 13',
        'opt-14' => 'گزینه 14',
        'opt-15' => 'گزینه 15',
      ),
      'desc'     => 'پس از افزودن موارد زیادی پیمایش عمودی بصورت خودکار نشان داده می شود'
    ),

    array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => 'انتخاب رادیو با <strong>تعریف شده wp query</strong> همانند فیلد <strong>انتخابی</strong>. (دارای تمامی خواص فیلد انتخابی)',
    ),

    array(
      'id'      => 'opt-radio-6',
      'type'    => 'radio',
      'title'   => 'رادیو با دسته بندی',
      'options' => 'categories',
    ),

  )
) );

//
// Repeater Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'repeater_fields',
  'title' => 'فیلد های تکرار شونده',
  'icon'  => 'far fa-clone',
) );

//
// Field: repeater
//
CSF::createSection( $prefix, array(
  'parent'      => 'repeater_fields',
  'title'       => 'تکرار شونده',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=repeater" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'     => 'opt-repeater-1',
      'type'   => 'repeater',
      'title'  => 'تکرار کننده',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن'
        ),
      ),
    ),

    array(
      'id'     => 'opt-repeater-2',
      'type'   => 'repeater',
      'title'  => 'تکرار با مقادیر پیشفرض',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
      ),
      'default' => array(
        array(
          'opt-text' => 'مقدار پیشفرض 1',
        ),
        array(
          'opt-text' => 'مقدار پیشفرض 2',
        ),
      ),
    ),

    array(
      'id'     => 'opt-repeater-3',
      'type'   => 'repeater',
      'title'  => 'تکرار چند فیلدی',
      'fields' => array(
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-color',
          'type'  => 'color',
          'title' => 'رنگ',
        ),
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
      ),
      'default' => array(
        array(
          'opt-switcher' => false,
          'opt-color'    => '#3498db',
          'opt-text'     => 'مقدار پیشفرض 1',
        ),
      ),
    ),

    array(
      'id'           => 'opt-repeater-4',
      'type'         => 'repeater',
      'title'        => 'تکرار با محدودیت (حداقل و حداکثر مقدار)',
      'subtitle'     => 'حداکثر / حداقل تعداد مواردی که کاربر می تواند اضافه کند. (در این مثال حداقل: 1 ، حداکثر: 3)',
      'button_title' => 'افزودن فیلد',
      'min'          => 1,
      'max'          => 3,
      'fields'       => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
      ),
      'default' => array(
        array(
          'opt-text' => 'مقدار پیشفرض 1',
        ),
        array(
          'opt-text' => 'مقدار پیشفرض 2',
        ),
      ),
    ),

    array(
      'id'       => 'opt-repeater-6',
      'type'     => 'repeater',
      'title'    => 'تکرار تو در تو',
      'subtitle' => 'تکرار تو در تو نامحدود را می توان اضافه کرد',
      'fields'   => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'     => 'opt-repeater-6-nested-1',
          'type'   => 'repeater',
          'title'  => 'تکرار کننده',
          'fields' => array(
            array(
              'id'    => 'opt-text',
              'type'  => 'text',
              'title' => 'متن'
            ),
          ),
        ),
      ),
      'default' => array(
        array(
          'opt-text' => 'مقدار پیشفرض 1',
          'opt-repeater-6-nested-1' => array(
            array(
              'opt-text' => 'مقدار پیشفرض 1',
            ),
            array(
              'opt-text' => 'مقدار پیشفرض 2',
            ),
          ),
        ),
      ),
    ),

  )
) );

//
// Field: group
//
CSF::createSection( $prefix, array(
  'parent'      => 'repeater_fields',
  'title'       => 'گروه',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=group" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'     => 'opt-group-1',
      'type'   => 'group',
      'title'  => 'گروه',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      )
    ),

    array(
      'id'     => 'opt-group-2',
      'type'   => 'group',
      'title'  => 'گروه با مقادیر پیشفرض',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(
        array(
          'opt-text'     => 'متن پیشفرض 1',
          'opt-switcher' => true,
          'opt-textarea' => 'توضیحات پیشفرض 1',
        ),
        array(
          'opt-text'     => 'متن پیشفرض 2',
          'opt-switcher' => false,
          'opt-textarea' => 'توضیحات پیشفرض 2',
        ),
      )
    ),

    array(
      'id'       => 'opt-group-3',
      'type'     => 'group',
      'title'    => 'گروه با موارد محدود (حداقل - حداکثر)',
      'subtitle' => 'حداکثر / حداقل تعداد مواردی که کاربر می تواند اضافه کند. (در این مثال حداقل: 1 ، حداکثر: 3)',
      'min'      => 1,
      'max'      => 3,
      'fields'   => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(
        array(
          'opt-text'     => 'متن پیشفرض 1',
          'opt-textarea' => 'توضیحات پیشفرض 1',
        ),
        array(
          'opt-text'     => 'متن پیشفرض 2',
          'opt-textarea' => 'توضیحات پیشفرض 2',
        ),
      )
    ),

    array(
      'id'       => 'opt-group-4',
      'type'     => 'group',
      'title'    => 'گروه با ویرایشگر',
      'subtitle' => 'همگام سازی ویرایشگر با آجاکس',
      'fields'   => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-editor',
          'type'  => 'wp_editor',
          'title' => 'ویرایشگر',
        ),
      ),
      'default' => array(
        array(
          'opt-text'   => 'ویرایشگر 1',
          'opt-editor' => 'محتوای پیشفرض ویرایشگر 1',
        ),
        array(
          'opt-text'   => 'ویرایشگر 2',
          'opt-editor' => 'محتوای پیشفرض ویرایشگر 2',
        ),
      )
    ),

    array(
      'id'       => 'opt-group-5',
      'type'     => 'group',
      'title'    => 'گروه تو در تو',
      'subtitle' => 'می توان نامحدود گروه های تو در تو اضافه کرد',
      'fields'   => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'     => 'opt-group-5-sublevel-1',
          'type'   => 'group',
          'title'  => 'گروه تو در تو',
          'fields' => array(
            array(
              'id'    => 'opt-text',
              'type'  => 'text',
              'title' => 'متن',
            ),
            array(
              'id'     => 'opt-group-5-sublevel-2',
              'type'   => 'group',
              'title'  => 'گروه تو در تو',
              'fields' => array(
                array(
                  'id'    => 'opt-text',
                  'type'  => 'text',
                  'title' => 'متن',
                ),
                array(
                  'id'    => 'opt-switcher',
                  'type'  => 'switcher',
                  'title' => 'سوئیچر',
                ),
                array(
                  'id'    => 'opt-textarea',
                  'type'  => 'textarea',
                  'title' => 'توضیحات',
                ),
              )
            ),
            array(
              'id'    => 'opt-switcher',
              'type'  => 'switcher',
              'title' => 'سوئیچر',
            ),
            array(
              'id'    => 'opt-textarea',
              'type'  => 'textarea',
              'title' => 'توضیحات',
            ),
          )
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(

        // top level defaults
        array(
          'opt-text' => 'سطح مادر 1',

          // sub level 1 defaults
          'opt-group-5-sublevel-1' => array(
            array(
              'opt-text' => 'سطح فرزند 1',

              // sub level 2 defaults
              'opt-group-5-sublevel-2' => array(
                array(
                  'opt-text' => 'سطح فرزند فرزند 1',
                ),
                array(
                  'opt-text' => 'سطح فرزند فرزند 2',
                )
              ),
            ),
            array(
              'opt-text' => 'سطح فرزند 2',
            )
          ),
        ),

        // top level defaults
        array(
          'opt-text' => 'سطح مادر 2',
        ),
      )
    ),

    array(
      'id'     => 'opt-group-6',
      'type'   => 'group',
      'title'  => 'گروه با تکرار فیلد',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'     => 'opt-group-6-repeater',
          'type'   => 'repeater',
          'title'  => 'تکرار کننده',
          'fields' => array(
            array(
              'id'    => 'opt-text',
              'type'  => 'text',
              'title' => 'متن'
            ),
          ),
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(
        array(
          'opt-text' => 'متن پیشفرض 1',
          'opt-group-6-repeater' => array(
            array(
              'opt-text' => 'متن پیشفرض 1',
            ),
              array(
              'opt-text' => 'متن پیشفرض 2',
            ),
          )
        ),
      )
    ),

    array(
      'id'     => 'opt-group-7',
      'type'   => 'group',
      'title'  => 'گروه با پیشوند ثابت عنوان',
      'subtitle'  => 'accordion_title_prefix => ":پیشوند ثابت"',
      'accordion_title_prefix' => 'عنوان پیشوند: ',
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(
        array(
          'opt-text'     => 'متن پیشفرض 1',
          'opt-switcher' => true,
          'opt-textarea' => 'محتوای پیشفرض 1',
        ),
        array(
          'opt-text'     => 'متن پیشفرض 2',
          'opt-switcher' => false,
          'opt-textarea' => 'محتوای پیشفرض 2',
        ),
      )
    ),

    array(
      'id'     => 'opt-group-8',
      'type'   => 'group',
      'title'  => 'گروه بندی با شماره',
      'subtitle'  => 'accordion_title_number => true',
      'accordion_title_number' => true,
      'fields' => array(
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-switcher',
          'type'  => 'switcher',
          'title' => 'سوئیچر',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
      'default' => array(
        array(
          'opt-text'     => 'متن پیشفرض 1',
          'opt-switcher' => true,
          'opt-textarea' => 'محتوای پیشفرض 1',
        ),
        array(
          'opt-text'     => 'متن پیشفرض 2',
          'opt-switcher' => false,
          'opt-textarea' => 'محتوای پیشفرض 2',
        ),
      )
    ),

  )
) );

//
// Combine Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'combine_fields',
  'title' => 'فیلدهای ترکیبی',
  'icon'  => 'fas fa-bars',
) );

//
// Field: accordion
//
CSF::createSection( $prefix, array(
  'parent'      => 'combine_fields',
  'title'       => 'آکاردئون',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=accordion" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'         => 'opt-accordion-1',
      'type'       => 'accordion',
      'title'      => 'آکاردئون',
      'accordions' => array(

        array(
          'title'  => 'آکاردئون 1',
          'fields' => array(
            array(
              'id'    => 'opt-text-1',
              'type'  => 'text',
              'title' => 'متن',
            ),
            array(
              'id'    => 'opt-switcher-1',
              'type'  => 'switcher',
              'title' => 'سوئیچر',
            ),
            array(
              'id'    => 'opt-textarea-1',
              'type'  => 'textarea',
              'title' => 'توضیحات',
            ),
          )
        ),

        array(
          'title'  => 'آکاردئون 2',
          'fields' => array(
            array(
              'id'    => 'opt-text-2',
              'type'  => 'text',
              'title' => 'متن',
            ),
            array(
              'id'    => 'opt-color-1',
              'type'  => 'color',
              'title' => 'رنگ',
            ),
          )
        ),

      )
    ),

    array(
      'id'         => 'opt-accordion-2',
      'type'       => 'accordion',
      'title'      => 'آکاردئون با مقدار پیشفرض',
      'accordions' => array(

        array(
          'title'  => 'فیلد 1',
          'fields' => array(
            array(
              'id'    => 'opt-text-1',
              'type'  => 'text',
              'title' => 'متن 1',
            ),
            array(
              'id'    => 'opt-text-2',
              'type'  => 'text',
              'title' => 'متن 2',
            ),
          )
        ),

        array(
          'title'  => 'فیلد 2',
          'fields' => array(
            array(
              'id'    => 'opt-color-1',
              'type'  => 'color',
              'title' => 'رنگ 1',
            ),
            array(
              'id'    => 'opt-color-2',
              'type'  => 'color',
              'title' => 'رنگ 2',
            ),
          )
        ),

        array(
          'title'  => 'فیلد 3',
          'fields' => array(
            array(
              'id'    => 'opt-textarea-1',
              'type'  => 'textarea',
              'title' => 'توضیحات 3',
            ),
            array(
              'id'    => 'opt-textarea-2',
              'type'  => 'textarea',
              'title' => 'توضیحات 4',
            ),
          )
        ),

      ),
      'default' => array(
        'opt-text-1'     => 'محتوای پیشفرض 1',
        'opt-text-2'     => 'محتوای پیشفرض 2',
        'opt-color-1'    => '#1e73be',
        'opt-color-2'    => '#ffbc00',
        'opt-textarea-1' => 'محتوای پیشفرض 1',
        'opt-textarea-2' => 'محتوای پیشفرض 2',
      )
    ),

    array(
      'id'         => 'accordion_3',
      'type'       => 'accordion',
      'title'      => 'آکاردئون با آیکن',
      'accordions' => array(

        array(
          'title'  => 'آیتم 1',
          'icon'   => 'fas fa-check',
          'fields' => array(
            array(
              'id'    => 'opt-text-1',
              'type'  => 'text',
              'title' => 'متن 1',
            ),
          )
        ),

        array(
          'title'  => 'آیتم 2',
          'icon'   => 'fas fa-star',
          'fields' => array(
            array(
              'id'    => 'opt-text-2',
              'type'  => 'text',
              'title' => 'متن 2',
            ),
          )
        ),

      )
    ),

  )
) );

//
// Field: tabbed
//
CSF::createSection( $prefix, array(
  'parent'      => 'combine_fields',
  'title'       => 'تب ها',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=tabbed" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-tabbed-1',
      'type'  => 'tabbed',
      'title' => 'تب بندی',
      'tabs'  => array(

        array(
          'title'  => 'تب 1',
          'fields' => array(
            array(
              'id'    => 'opt-text-1',
              'type'  => 'text',
              'title' => 'متن 1',
            ),
            array(
              'id'    => 'opt-textarea-1',
              'type'  => 'textarea',
              'title' => 'توضیحات 1',
            ),
          ),
        ),

        array(
          'title'  => 'تب 2',
          'fields' => array(
            array(
              'id'    => 'opt-text-2',
              'type'  => 'text',
              'title' => 'متن 2',
            ),
            array(
              'id'    => 'opt-textarea-2',
              'type'  => 'textarea',
              'title' => 'توضیحات 2',
            ),
          ),
        ),

      ),
    ),

    array(
      'id'    => 'opt-tabbed-2',
      'type'  => 'tabbed',
      'title' => 'تب بندی با آیکن',
      'tabs'  => array(
        array(
          'title'  => 'فیلد 1',
          'icon'   => 'fas fa-check',
          'fields' => array(
            array(
              'id'    => 'opt-text-1',
              'type'  => 'text',
              'title' => 'متن 1',
            ),
            array(
              'id'    => 'opt-text-2',
              'type'  => 'text',
              'title' => 'متن 2',
            ),
          ),
        ),
        array(
          'title'  => 'فیلد 2',
          'icon'   => 'fas fa-star',
          'fields' => array(
            array(
              'id'      => 'opt-color-1',
              'type'    => 'color',
              'title'   => 'رنگ 1',
            ),
            array(
              'id'      => 'opt-color-2',
              'type'    => 'color',
              'title'   => 'رنگ 2',
            ),
          ),
        ),
        array(
          'title'  => 'فیلد 3',
          'icon'   => 'fas fa-cog',
          'fields' => array(
            array(
              'id'    => 'opt-textarea-1',
              'type'  => 'textarea',
              'title' => 'توضیحات 1',
            ),
            array(
              'id'    => 'opt-textarea-2',
              'type'  => 'textarea',
              'title' => 'توضیحات 2',
            ),
          ),
        ),
      ),
      'default' => array(
        'opt-text-1'     => 'متن پیشفرض 1',
        'opt-text-2'     => 'متن پیشفرض 2',
        'opt-color-1'    => '#1e73be',
        'opt-color-2'    => '#ffbc00',
        'opt-textarea-1' => 'محتوای پیشفرض 1',
        'opt-textarea-2' => 'محتوای پیشفرض 2',
      )
    ),

  )
) );

//
// Field: fieldset
//
CSF::createSection( $prefix, array(
  'parent' => 'combine_fields',
  'title'  => 'مجموعه',
  'fields' => array(

    array(
      'id'     => 'opt-fieldset-1',
      'type'   => 'fieldset',
      'title'  => 'مجموعه',
      'fields' => array(
        array(
          'id'    => 'opt-color',
          'type'  => 'color',
          'title' => 'رنگ',
        ),
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'متن',
        ),
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'توضیحات',
        ),
      ),
    ),

    array(
      'id'     => 'opt-fieldset-2',
      'type'   => 'fieldset',
      'title'  => 'مجموعه با مقادیر پیشفرض',
      'fields' => array(
        array(
          'type'    => 'subheading',
          'content' => 'عنوان مجموعه',
        ),
        array(
          'id'      => 'opt-color',
          'type'    => 'color',
          'title'   => 'رنگ',
        ),
        array(
          'id'      => 'opt-text',
          'type'    => 'text',
          'title'   => 'متن',
        ),
        array(
          'id'      => 'opt-textarea',
          'type'    => 'textarea',
          'title'   => 'توضیحات',
        ),
      ),
      'default' => array(
        'opt-color'    => '#1e73be',
        'opt-text'     => 'متن پیشفرض',
        'opt-textarea' => 'محتوای پیشفرض',
      )
    ),

  )
) );

//
// Media and Upload Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'media_fields',
  'title' => 'رسانه و بارگذاری',
  'icon'  => 'fas fa-upload',
) );

//
// Field: media
//
CSF::createSection( $prefix, array(
  'parent'      => 'media_fields',
  'title'       => 'رسانه',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=media" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-media-1',
      'type'  => 'media',
      'title' => 'رسانه',
    ),

    array(
      'id'      => 'opt-media-2',
      'type'    => 'media',
      'title'   => 'رسانه بدون پیشنمایش',
      'preview' => false,
    ),

    array(
      'id'    => 'opt-media-3',
      'type'  => 'media',
      'title' => 'رسانه بدون url',
      'url'   => false,
    ),

    array(
      'id'      => 'opt-media-4',
      'type'    => 'media',
      'title'   => 'رسانه فقط از نوع تصویر',
      'library' => 'image',
    ),

    array(
      'id'      => 'opt-media-5',
      'type'    => 'media',
      'title'   => 'رسانه فقط از نوع ویدئو',
      'library' => 'video',
    ),

    array(
      'id'      => 'opt-media-6',
      'type'    => 'media',
      'title'   => 'رسانه فقط از نوع صدا',
      'library' => 'audio',
    ),

  )
) );

//
// Field: upload
//
CSF::createSection( $prefix, array(
  'parent'      => 'media_fields',
  'title'       => 'بارگذاری',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=upload" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-upload-1',
      'type'  => 'upload',
      'title' => 'بارگذاری',
    ),

    array(
      'id'          => 'opt-upload-2',
      'type'        => 'upload',
      'title'       => 'بارگذاری با نگهدارنده',
      'placeholder' => 'http://'
    ),

    array(
      'id'           => 'opt-upload-3',
      'type'         => 'upload',
      'title'        => 'بارگذاری فقط از نوع تصویر',
      'library'      => 'image',
      'button_title' => 'بارگذاری تصویر',
    ),

    array(
      'id'           => 'opt-upload-4',
      'type'         => 'upload',
      'title'        => 'بارگذاری فقط از نوع ویدئو',
      'library'      => 'video',
      'button_title' => 'بارگذاری ویدئو',
    ),

    array(
      'id'           => 'opt-upload-5',
      'type'         => 'upload',
      'title'        => 'بارگذاری فقط از نوع صدا',
      'library'      => 'audio',
      'button_title' => 'بارگذاری صدا',
    ),

  )
) );

//
// Field: gallery
//
CSF::createSection( $prefix, array(
  'parent'      => 'media_fields',
  'title'       => 'گالری',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=gallery" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-gallery-1',
      'type'  => 'gallery',
      'title' => 'گالری',
    ),

    array(
      'id'          => 'opt-gallery-2',
      'type'        => 'gallery',
      'title'       => 'گالری با نام دکمه های سفارشی',
      'add_title'   => 'افزودن تصاویر',
      'edit_title'  => 'ویرایش تصاویر',
      'clear_title' => 'حذف تصاویر',
    ),

  )
) );

//
// Editor Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'editor_fields',
  'title' => 'ویرایشگر ها',
  'icon'  => 'fas fa-code',
) );

//
// Field: code_editor
//
CSF::createSection( $prefix, array(
  'parent'      => 'editor_fields',
  'title'       => 'ویرایشگر کد',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=code-editor" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'       => 'opt-code-editor-1',
      'type'     => 'code_editor',
      'title'    => 'ویرایشگر کد',
      'subtitle' => '<strong>ویرایشگر پیشفرض</strong> دارای حالت پیشفرض: htmlmixed',
    ),

    array(
      'id'       => 'code_editor_2',
      'type'     => 'code_editor',
      'title'    => 'ویرایشگر کد',
      'subtitle' => '<strong>ویرایشگر HTML</strong> دارای حالت پیشفرض: shadowfox و htmlmixed',
      'settings' => array(
        'theme'  => 'shadowfox',
        'mode'   => 'htmlmixed',
      ),
      'default'  =>'<div class="wrapper">
  <h1>Hello world</h1>
  <p>Lorem <strong>ipsum</strong> dollar.</p>
</div>',
    ),

    array(
      'id'       => 'opt-code-editor-2',
      'type'     => 'code_editor',
      'title'    => 'ویرایشگر کد',
      'subtitle' => '<strong>ویرایشگر JS</strong> دارای حالت پیشفرض: dracula و javascript',
      'settings' => array(
        'theme'  => 'dracula',
        'mode'   => 'javascript',
      ),
      'default' =>';(function( $, window, document, undefined ) {
  "use strict";

  $(document).ready( function() {

    // do stuff

  });

})( jQuery, window, document );',
    ),

    array(
      'id'       => 'opt-code-editor-3',
      'type'     => 'code_editor',
      'desc'     => '<strong>ویرایشگر CSS</strong> در صورت عدم وجود فیلد عنوان و استفاده از: theme: mbo و mode: css ، عرض کامل را نشان می دهد',
      'settings' => array(
        'theme'  => 'mbo',
        'mode'   => 'css',
      ),
      'default' =>'.wrapper {
  font-family: "Open Sans";
  font-size: 13px;
  width: 250px;
  height: 100px;
  color: #fff;
  background-color: #555;
}',
    ),

  )
) );

//
// Field: wp_editor
//
CSF::createSection( $prefix, array(
  'parent'      => 'editor_fields',
  'title'       => 'ویرایشگر وردپرس',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=wp-editor" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-wp-editor-1',
      'type'  => 'wp_editor',
      'title' => 'ویرایشگر وردپرس',
    ),

    array(
      'id'            => 'opt-wp-editor-2',
      'type'          => 'wp_editor',
      'title'         => 'ویرایشگر ویردپرس با ارتفاع سفارشی و بدون دکمه های رسانه',
      'subtitle'      => 'تنظیمات:<br />height => 100px,<br />media_buttons => false',
      'height'        => '100px',
      'media_buttons' => false,
    ),

    array(
      'id'            => 'opt-wp-editor-3',
      'type'          => 'wp_editor',
      'title'         => 'ویرایشگر ویردپرس با ارتفاع سفارشی و بدون دکمه متن',
      'subtitle'      => 'تنظیمات:<br />height => 100px,<br />media_buttons => false,<br />quicktags => false',
      'height'        => '100px',
      'media_buttons' => false,
      'quicktags'     => false,
    ),

    array(
      'id'            => 'opt-wp-editor-4',
      'type'          => 'wp_editor',
      'title'         => 'ویرایشگر ویردپرس با ارتفاع سفارشی و بدون دکمه ها',
      'subtitle'      => 'تنظیمات:<br />height => 100px,<br />media_buttons => false,<br />tinymce => false',
      'height'        => '100px',
      'media_buttons' => false,
      'tinymce'       => false,
    ),

  )
) );

//
// Color Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'color_fields',
  'title' => 'رنگ بندی',
  'icon'  => 'fas fa-tint',
) );

//
// Field: color
//
CSF::createSection( $prefix, array(
  'parent'      => 'color_fields',
  'title'       => 'رنگ',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=color" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-color-1',
      'type'  => 'color',
      'title' => 'رنگ',
    ),

    array(
      'id'      => 'opt-color-2',
      'type'    => 'color',
      'title'   => 'رنگ با مقدار پیشفرض (hex)',
      'default' => '#3498db',
    ),

    array(
      'id'      => 'opt-color-3',
      'type'    => 'color',
      'title'   => 'رنگ با مقدار پیشفرض (rgba)',
      'default' => 'rgba(255,255,0,0.25)',
    ),

    array(
      'id'      => 'opt-color-4',
      'type'    => 'color',
      'title'   => 'رنگ با مقدار پیشفرض (transparent)',
      'default' => 'transparent',
    ),

  )
) );

//
// Field: link_color
//
CSF::createSection( $prefix, array(
  'parent'      => 'color_fields',
  'title'       => 'رنگ لینک',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=link-color" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-link-color-1',
      'type'  => 'link_color',
      'title' => 'رنگ لینک',
    ),

    array(
      'id'      => 'opt-link-color-2',
      'type'    => 'link_color',
      'title'   => 'رنگ لینک با مقدار پیشفرض',
      'default' => array(
        'color' => '#1e73be',
        'hover' => '#259ded',
      ),
    ),

    array(
      'id'      => 'opt-link-color-3',
      'type'    => 'link_color',
      'title'   => 'رنگ لینک با تمامی ویژگی ها',
      'color'   => true,
      'hover'   => true,
      'visited' => true,
      'active'  => true,
      'focus'   => true,
    ),

  )
) );

//
// Field: color_group
//
CSF::createSection( $prefix, array(
  'parent'      => 'color_fields',
  'title'       => 'رنگ گروهی',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=color-group" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'        => 'opt-color-group-1',
      'type'      => 'color_group',
      'title'     => 'رنگ گروهی',
      'options'   => array(
        'color-1' => 'رنگ 1',
        'color-2' => 'رنگ 2',
      )
    ),

    array(
      'id'        => 'opt-color-group-2',
      'type'      => 'color_group',
      'title'     => 'رنگ گروهی',
      'options'   => array(
        'color-1' => 'رنگ 1',
        'color-2' => 'رنگ 2',
        'color-3' => 'رنگ 3',
      )
    ),

    array(
      'id'        => 'opt-color-group-3',
      'type'      => 'color_group',
      'title'     => 'رنگ گروهی با مقادیر پیشفرض',
      'subtitle'  => 'می توان گزینه های نامحدود رنگ را اضافه کرد.',
      'options'   => array(
        'color-1' => 'رنگ 1',
        'color-2' => 'رنگ 2',
        'color-3' => 'رنگ 3',
        'color-4' => 'رنگ 4',
        'color-5' => 'رنگ 5',
      ),
      'default'   => array(
        'color-1' => '#000100',
        'color-2' => '#002642',
        'color-3' => '#ffce4b',
        'color-4' => '#ff595e',
        'color-5' => '#0052cc',
      )
    ),

  )
) );

//
// Field: palette
//
CSF::createSection( $prefix, array(
  'parent'      => 'color_fields',
  'title'       => 'پالت رنگی',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=palette" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'       => 'opt-palette-1',
      'type'     => 'palette',
      'title'    => 'پالت',
      'subtitle' => 'پالت سه تایی',
      'options'  => array(
        'set-1'  => array( '#f36e27', '#f3d430', '#ed1683' ),
        'set-2'  => array( '#4153ab', '#6e86c7', '#211f27' ),
        'set-3'  => array( '#162526', '#508486', '#C8C6CE' ),
        'set-4'  => array( '#ccab5e', '#fff55f', '#197c5d' ),
      ),
      'default'  => 'set-1',
    ),

    array(
      'id'       => 'opt-palette-2',
      'type'     => 'palette',
      'title'    => 'پالت',
      'subtitle' => 'پالت چهار تایی',
      'options'  => array(
        'set-1'  => array( '#f04e36', '#f36e27', '#f3d430', '#ed1683' ),
        'set-2'  => array( '#f9ca06', '#b5b546', '#2f4d48', '#212b2f' ),
        'set-3'  => array( '#4153ab', '#6e86c7', '#211f27', '#d69762' ),
        'set-4'  => array( '#162526', '#508486', '#C8C6CE', '#B45F1A' ),
        'set-5'  => array( '#bbd5ff', '#ccab5e', '#fff55f', '#197c5d' ),
      ),
      'default'  => 'set-3',
    ),

    array(
      'id'       => 'opt-palette-3',
      'type'     => 'palette',
      'title'    => 'پالت',
      'subtitle' => 'پالت پنج تایی',
      'options'  => array(
        'set-1'  => array( '#bbd5ff', '#ccab5e', '#fff55f', '#197c5d', '#bce2c4' ),
        'set-2'  => array( '#6d3264', '#edf7f6', '#fde8e9', '#006675', '#e49ab0' ),
        'set-3'  => array( '#000100', '#002642', '#ffce4b', '#ff595e', '#0052cc' ),
      ),
      'default'  => 'set-1',
    ),

  )
) );

//
// Design Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'design_fields',
  'title' => 'فیلدهای طراحی',
  'icon'  => 'fas fa-adjust',
) );

//
// Field: background
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'پس زمینه',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=background" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-background-1',
      'type'  => 'background',
      'title' => 'پس زمینه',
    ),

    array(
      'id'      => 'opt-background-2',
      'type'    => 'background',
      'title'   => 'پس زمینه با مقدار پیش فرض',
      'default' => array(
        'background-color'      => '#e80000',
        'background-position'   => 'center center',
        'background-repeat'     => 'repeat-x',
        'background-attachment' => 'fixed',
        'background-size'       => 'cover',
      )
    ),

    array(
      'id'                    => 'opt-background-3',
      'type'                  => 'background',
      'title'                 => 'پس زمینه با تمامی ویژگی ها',
      'background_color'      => true,
      'background_image'      => true,
      'background-position'   => true,
      'background_repeat'     => true,
      'background_attachment' => true,
      'background_size'       => true,
      'background_origin'     => true,
      'background_clip'       => true,
      'background_blend_mode' => true,
      'background_gradient'   => true,
      'default'               => array(
        'background-color'              => '#009e44',
        'background-gradient-color'     => '#81d742',
        'background-gradient-direction' => '135deg',
        'background-position'           => 'center center',
        'background-repeat'             => 'repeat-x',
        'background-attachment'         => 'fixed',
        'background-size'               => 'cover',
        'background-origin'             => 'border-box',
        'background-clip'               => 'padding-box',
        'background-blend-mode'         => 'normal',
      )
    ),

  )
) );

//
// Field: typography
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'تایپوگرافی',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=typography" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-typography-1',
      'type'  => 'typography',
      'title' => 'تایپوگرافی',
    ),

    array(
      'id'               => 'opt-typography-2',
      'type'             => 'typography',
      'title'            => 'تایپوگرافی با مقادیر پیشفرض',
      'default'          => array(
        'font-family'    => 'Barlow',
        'font-weight'    => '600',
        'subset'         => 'latin-ext',
        'type'           => 'google',
        'text-align'     => 'center',
        'text-transform' => 'capitalize',
        'text-transform' => 'capitalize',
        'font-size'      => '18',
        'line-height'    => '20',
        'letter-spacing' => '-1',
        'color'          => '#009e44',
      ),
    ),

    array(
      'id'             => 'opt-typography-3',
      'type'           => 'typography',
      'title'          => 'تایپوگرافی با حداقل ویژگی',
      'text_align'     => false,
      'text_transform' => false,
      'font_size'      => false,
      'line_height'    => false,
      'letter_spacing' => false,
      'color'          => false,
      'default'        => array(
        'font-family'  => 'Lato',
        'font-weight'  => '900',
        'subset'       => 'latin',
        'type'         => 'google',
      ),
    ),


    array(
      'id'                 => 'opt-typography-4',
      'type'               => 'typography',
      'title'              => 'تایپوگرافی با تمامی ویژگی ها',
      'font_family'        => true,
      'font_weight'        => true,
      'font_style'         => true,
      'font_size'          => true,
      'line_height'        => true,
      'letter_spacing'     => true,
      'text_align'         => true,
      'text-transform'     => true,
      'color'              => true,
      'subset'             => true,
      'backup_font_family' => true,
      'font_variant'       => true,
      'word_spacing'       => true,
      'text_decoration'    => true,
      'default'            => array(
        'font-family'      => 'Old Standard TT',
        'type'             => 'google',
      ),
    ),

  )
) );

//
// Field: dimensions
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'اندازه ها',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=dimensions" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-dimensions-1',
      'type'  => 'dimensions',
      'title' => 'اندازه ها',
    ),

    array(
      'id'       => 'opt-dimensions-2',
      'type'     => 'dimensions',
      'title'    => 'اندازه با مقادیر پیشفرض',
      'default'  => array(
        'width'  => '100',
        'height' => '250',
        'unit'   => 'px',
      ),
    ),

    array(
      'id'          => 'opt-dimensions-3',
      'type'        => 'dimensions',
      'title'       => 'اندازه با متن و واحدهای سفارشی',
      'width_icon'  => 'عرض',
      'height_icon' => 'ارتفاع',
      'units'       => array( 'px', '%', 'em', 'rem', 'pt' ),
      'default'     => array(
        'width'     => '100',
        'height'    => '50',
        'unit'      => '%',
      ),
    ),

    array(
      'id'    => 'opt-dimensions-4',
      'type'  => 'dimensions',
      'title' => 'اندازه با واحد ثابت',
      'units' => array( 'px' ),
    ),

    array(
      'id'    => 'opt-dimensions-5',
      'type'  => 'dimensions',
      'title' => 'اندازه بدون واحد',
      'unit'  => false,
    ),

    array(
      'id'     => 'opt-dimensions-6',
      'type'   => 'dimensions',
      'title'  => 'اندازه عرض',
      'height' => false,
    ),

    array(
      'id'     => 'opt-dimensions-7',
      'type'   => 'dimensions',
      'title'  => 'اندازه عرض با واحد ثابت',
      'height' => false,
      'units'  => array( 'px' ),
    ),

  )
) );

//
// Field: spacing
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'فاصله ها',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=spacing" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-spacing-1',
      'type'  => 'spacing',
      'title' => 'فاصله ها',
    ),

    array(
      'id'       => 'opt-spacing-2',
      'type'     => 'spacing',
      'title'    => 'فاصله با مقادیر پیشفرض',
      'default'  => array(
        'top'    => '50',
        'right'  => '100',
        'bottom' => '50',
        'left'   => '100',
        'unit'   => 'px',
      ),
    ),

    array(
      'id'       => 'opt-spacing-2',
      'type'     => 'spacing',
      'title'    => 'فاصله با واحد ثابت',
      'units'    => array( 'px' ),
      'default'  => array(
        'top'    => '50',
        'right'  => '100',
        'bottom' => '50',
        'left'   => '100',
        'unit'   => 'px',
      ),
    ),

    array(
      'id'     => 'opt-spacing-3',
      'type'   => 'spacing',
      'title'  => 'فواصل چپ و راست',
      'top'    => false,
      'bottom' => false,
    ),

    array(
      'id'    => 'opt-spacing-4',
      'type'  => 'spacing',
      'title' => 'فواصل بالا و پایین',
      'left'  => false,
      'right' => false,
    ),

    array(
      'id'    => 'opt-spacing-5',
      'type'  => 'spacing',
      'title' => 'فواصل در همه جهات',
      'all'   => true,
    ),

  )
) );

//
// Field: border
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'حاشیه',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=border" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-border-1',
      'type'  => 'border',
      'title' => 'حاشیه',
    ),

    array(
      'id'       => 'opt-border-2',
      'type'     => 'border',
      'title'    => 'حاشیه با مقادیر پیشفرض',
      'default'  => array(
        'top'    => '4',
        'right'  => '8',
        'bottom' => '4',
        'left'   => '8',
        'style'  => 'dashed',
        'color'  => '#1e73be',
      )
    ),

    array(
      'id'     => 'opt-border-3',
      'type'   => 'border',
      'title'  => 'حاشیه چپ و راست',
      'top'    => false,
      'bottom' => false,
    ),

    array(
      'id'    => 'opt-border-4',
      'type'  => 'border',
      'title' => 'حاشیه بالا و پایین',
      'left'  => false,
      'right' => false,
    ),

    array(
      'id'    => 'opt-border-5',
      'type'  => 'border',
      'title' => 'حاشیه در همه جهات',
      'all'   => true,
    ),

  )
) );

//
// Field: spinner
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'محدوده',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=spinner" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'       => 'opt-spinner-1',
      'type'     => 'spinner',
      'title'    => 'محدوده',
      'subtitle' => 'حداکثر:100 | حداقل:0 | گام:1',
      'max'      => 100,
      'min'      => 0,
      'step'     => 1,
      'default'  => 25,
    ),

    array(
      'id'       => 'opt-spinner-2',
      'type'     => 'spinner',
      'title'    => 'محدوده',
      'subtitle' => 'حداکثر:200 | حداقل:100 | گام:10',
      'max'      => 200,
      'min'      => 100,
      'step'     => 10,
      'default'  => 100,
    ),

    array(
      'id'       => 'opt-spinner-3',
      'type'     => 'spinner',
      'title'    => 'محدوده',
      'subtitle' => 'حداکثر:1 | حداقل:0 | گام:0.1 | واحد:px',
      'max'      => 1,
      'min'      => 0,
      'step'     => 0.1,
      'unit'     => 'px',
      'default'  => 0.5,
    ),

  )
) );

//
// Field: number
//
CSF::createSection( $prefix, array(
  'parent'      => 'design_fields',
  'title'       => 'اعداد',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=number" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'      => 'opt-number-1',
      'type'    => 'number',
      'title'   => 'اعداد',
    ),
    array(
      'id'      => 'opt-number-2',
      'type'    => 'number',
      'title'   => 'اعداد با واحد',
      'unit'    => 'px',
    ),
    array(
      'id'      => 'opt-number-3',
      'type'    => 'number',
      'title'   => 'اعداد با مقدار پیشفرض',
      'unit'    => 'عرض',
      'default' => 100,
    ),

  )
) );

//
// Additional Fields
//
CSF::createSection( $prefix, array(
  'id'    => 'additional_fields',
  'title' => 'فیلدهای بیشتر',
  'icon'  => 'fas fa-asterisk',
) );

//
// Field: slider
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'اسلایدر',
  'icon'        => 'fas fa-sliders-h',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=slider" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-slider-1',
      'type'  => 'slider',
      'title' => 'اسلایدر',
    ),

    array(
      'id'      => 'opt-slider-2',
      'type'    => 'slider',
      'title'   => 'اسلایدر با مقدار پیشفرض',
      'default' => 50,
    ),

    array(
      'id'      => 'opt-slider-3',
      'type'    => 'slider',
      'title'   => 'اسلایدر با واحد',
      'unit'    => '%',
      'default' => 75,
    ),

    array(
      'id'       => 'opt-slider-4',
      'type'     => 'slider',
      'title'    => 'اسلایدر با محدودیت حداقل/حداکثر',
      'subtitle' => 'حداقل: 1 | حداکثر: 10 | گام: 0.1 | پیشفرض: 5.5',
      'unit'     => 'px',
      'min'      => 1,
      'max'      => 10,
      'step'     => 0.1,
      'default'  => 5.5,
    ),

  )
) );

//
// Field: sorter
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'مرتب سازی',
  'icon'        => 'fas fa-sort-numeric-down',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=sorter" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'         => 'opt-sorter-1',
      'type'       => 'sorter',
      'title'      => 'مرتب سازی',
      'default'    => array(
        'enabled'  => array(
          'opt-1'  => 'گزینه 1',
          'opt-2'  => 'گزینه 2',
          'opt-3'  => 'گزینه 3',
        ),
        'disabled' => array(
          'opt-4'  => 'گزینه 4',
          'opt-5'  => 'گزینه 5',
        ),
      ),
    ),

    array(
      'id'             => 'opt-sorter-2',
      'type'           => 'sorter',
      'title'          => 'مرتب سازی با عنوان شخصی',
      'enabled_title'  => 'میخوامش :)',
      'disabled_title' => 'نمیخوامش :(',
      'default'        => array(
        'enabled'      => array(
          'opt-1'      => 'گزینه 1',
          'opt-2'      => 'گزینه 2',
          'opt-3'      => 'گزینه 3',
        ),
        'disabled'     => array(
          'opt-4'      => 'گزینه 4',
          'opt-5'      => 'گزینه 5',
        ),
      ),
    ),

    array(
      'id'            => 'opt-sorter-3',
      'type'          => 'sorter',
      'title'         => 'مرتب سازی فقط با استفاده از بخش فعال شده و بدون عنوان',
      'enabled_title' => false,
      'disabled'      => false,
      'default'       => array(
        'enabled'     => array(
          'opt-1'     => 'گزینه 1',
          'opt-2'     => 'گزینه 2',
          'opt-3'     => 'گزینه 3',
        ),
      ),
    ),

  )
) );

//
// Field: sortable
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'ترتیب بندی',
  'icon'        => 'fas fa-arrows-alt',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=sortable" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'           => 'opt-sortable-1',
      'type'         => 'sortable',
      'title'        => 'ترتیب بندی',
      'fields'       => array(
        array(
          'id'       => 'opt-text-1',
          'type'     => 'text',
          'title'    => 'متن 1'
        ),
        array(
          'id'       => 'opt-text-2',
          'type'     => 'text',
          'title'    => 'متن 2'
        ),
        array(
          'id'       => 'opt-text-3',
          'type'     => 'text',
          'title'    => 'متن 3'
        ),
      ),
    ),

    array(
      'id'           => 'opt-sortable-2',
      'type'         => 'sortable',
      'title'        => 'ترتیب بندی با مقادیر پیشفرض',
      'fields'       => array(
        array(
          'id'       => 'opt-text-1',
          'type'     => 'text',
          'title'    => 'متن 1'
        ),
        array(
          'id'       => 'opt-text-2',
          'type'     => 'text',
          'title'    => 'متن 2'
        ),
        array(
          'id'       => 'opt-text-3',
          'type'     => 'text',
          'title'    => 'متن 3'
        ),
      ),
      'default'      => array(
        'opt-text-1' => 'متن پیشفرض 1',
        'opt-text-2' => 'متن پیشفرض 2',
        'opt-text-3' => 'متن پیشفرض 3',
      )
    ),

  )
) );

//
// Field: switcher
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'سوئیچر',
  'icon'        => 'fas fa-toggle-on',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=switcher" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-switcher-1',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
    ),

    array(
      'id'      => 'opt-switcher-2',
      'type'    => 'switcher',
      'title'   => 'سوئیچر با مقدار پیشفرض',
      'default' => true,
    ),

    array(
      'id'    => 'opt-switcher-3',
      'type'  => 'switcher',
      'title' => 'سوئیچر با برچسب',
      'label' => 'این یک برچسب برای این سوئیچر می باشد.',
    ),

    array(
      'id'       => 'opt-switcher-4',
      'type'     => 'switcher',
      'title'    => 'سوئیچر با بله/خیر',
      'text_on'  => 'بله',
      'text_off' => 'خیر',
    ),

    array(
      'id'         => 'opt-switcher-4',
      'type'       => 'switcher',
      'title'      => 'سوئیچر با اندازه و متن سفارشی روشن/خاموش',
      'text_on'    => 'روشن',
      'text_off'   => 'خاموش',
      'text_width' => '100',
    ),

  )
) );

//
// Field: icons
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'آیکن',
  'icon'        => 'fas fa-star',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=icon" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-icon-1',
      'type'  => 'icon',
      'title' => 'آیکن',
    ),

    array(
      'id'      => 'opt-icon-2',
      'type'    => 'icon',
      'title'   => 'آیکن با مقدار پیشفرض',
      'default' => 'fas fa-check',
    ),

  )
) );

//
// Field: map
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'نقشه',
  'icon'        => 'fas fa-map-marker',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=map" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'            => 'opt-map-1',
      'type'          => 'map',
      'title'         => 'نقشه',
    ),

    array(
      'id'            => 'opt-map-2',
      'type'          => 'map',
      'title'         => 'نقشه با مقادیر پیشفرض',
      'default'       => array(
        'address'     => 'تهران بالاتر از میدان ولیعصر شرکت داناپیوست',
        'latitude'    => '35.69423193615546',
        'longitude'   => '51.40393507346856',
        'zoom'        => '12',
      )
    ),

    array(
      'type'          => 'submessage',
      'style'         => 'info',
      'content'       => 'با استفاده از فیلد <strong>address_field</strong> آدرس را متمایز کنید.',
    ),

    array(
      'id'            => 'my-address-text',
      'type'          => 'text',
      'title'         => 'آدرس',
    ),

    array(
      'id'            => 'opt-map-3',
      'type'          => 'map',
      'title'         => 'نقشه',
      'desc'          => 'امکان استفاده از فیلد <strong>address_field</strong> برای ایجاد فیلد آدرس پیشرفته',
      'address_field' => 'my-address-text',
    ),

  )
) );

//
// Field: link
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'لینک',
  'icon'        => 'fas fa-link',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=link" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-link-1',
      'type'  => 'link',
      'title' => 'لینک',
    ),

    array(
      'id'       => 'opt-link-2',
      'type'     => 'link',
      'title'    => 'لینک با مقدار پیشفرض',
      'default'  => array(
        'url'    => 'http://codestarframework.com/',
        'text'   => 'فریمورک Codestar',
        'target' => '_blank'
      ),
    ),

  )
) );

//
// Field: date
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'تاریخ',
  'icon'        => 'fas fa-calendar',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=date" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'    => 'opt-date-1',
      'type'  => 'date',
      'title' => 'تاریخ',
    ),

    array(
      'id'       => 'opt-date-2',
      'type'     => 'date',
      'title'    => 'تاریخ با تنظیمات شخصی',
      'settings' => array(
        'dateFormat'      => 'mm/dd/yy',
        'changeMonth'     => true,
        'changeYear'      => true,
        'showWeek'        => true,
        'showButtonPanel' => true,
        'weekHeader'      => 'Week',
        'monthNamesShort' => array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ),
        'dayNamesMin'     => array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
      )
    ),

    array(
      'id'      => 'opt-date-3',
      'type'    => 'date',
      'title'   => 'تاریخ حداقل و حداکثر',
      'from_to' => true,
    ),

    array(
      'id'        => 'opt-date-4',
      'type'      => 'date',
      'title'     => 'تاریخ شروع و پایان',
      'from_to'   => true,
      'text_from' => 'شروع',
      'text_to'   => 'پایان',
    ),

  )
) );

//
// Field: image_select
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'تصویر انتخابی',
  'icon'        => 'fas fa-th',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=image-select" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'      => 'opt-image-select-1',
      'type'    => 'image_select',
      'title'   => 'تصویر انتخابی',
      'options' => array(
        'opt-1' => 'http://codestarframework.com/assets/images/placeholder/150x125-2ecc71.gif',
        'opt-2' => 'http://codestarframework.com/assets/images/placeholder/150x125-e74c3c.gif',
        'opt-3' => 'http://codestarframework.com/assets/images/placeholder/150x125-ffbc00.gif',
        'opt-4' => 'http://codestarframework.com/assets/images/placeholder/150x125-3498db.gif',
      ),
    ),

    array(
      'id'      => 'opt-image-select-2',
      'type'    => 'image_select',
      'title'   => 'تصویر انتخابی با مقدار پیشفرض',
      'options' => array(
        'opt-1' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-2' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-3' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-4' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-5' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-6' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-7' => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
      ),
      'default' => 'opt-4'
    ),

    array(
      'id'       => 'opt-image-select-3',
      'type'     => 'image_select',
      'title'    => 'تصاویر انتخابی',
      'multiple' => true,
      'options'  => array(
        'opt-1'  => 'http://codestarframework.com/assets/images/placeholder/80x80-e74c3c.gif',
        'opt-2'  => 'http://codestarframework.com/assets/images/placeholder/80x80-ffbc00.gif',
        'opt-3'  => 'http://codestarframework.com/assets/images/placeholder/80x80-3498db.gif',
        'opt-4'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2ecc71.gif',
      ),
    ),

    array(
      'id'       => 'opt-image-select-4',
      'type'     => 'image_select',
      'title'    => 'تصاویر انتخابی با مقادیر پیشفرض',
      'multiple' => true,
      'options'  => array(
        'opt-1'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-2'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-3'  => 'http://codestarframework.com/assets/images/placeholder/80x80-e74c3c.gif',
        'opt-4'  => 'http://codestarframework.com/assets/images/placeholder/80x80-ffbc00.gif',
        'opt-5'  => 'http://codestarframework.com/assets/images/placeholder/80x80-3498db.gif',
        'opt-6'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2ecc71.gif',
        'opt-7'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
        'opt-8'  => 'http://codestarframework.com/assets/images/placeholder/80x80-2c3e50.gif',
      ),
      'default'  => array( 'opt-3', 'opt-4', 'opt-5', 'opt-6' )
    ),

    array(
      'id'      => 'opt-image-select-5',
      'type'    => 'image_select',
      'title'   => 'تصویر انتخابی تک خطی',
      'inline'  => true,
      'options' => array(
        'opt-1' => 'http://codestarframework.com/assets/images/placeholder/80x80-e74c3c.gif',
        'opt-2' => 'http://codestarframework.com/assets/images/placeholder/80x80-ffbc00.gif',
        'opt-3' => 'http://codestarframework.com/assets/images/placeholder/80x80-3498db.gif',
        'opt-4' => 'http://codestarframework.com/assets/images/placeholder/80x80-2ecc71.gif',
      ),
      'default' => 'opt-1'
    ),

  )
) );

//
// Field: button_set
//
CSF::createSection( $prefix, array(
  'parent'      => 'additional_fields',
  'title'       => 'دکمه های گروهی',
  'icon'        => 'fas fa-ellipsis-h',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=button-set" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'         => 'opt-button-set-1',
      'type'       => 'button_set',
      'title'      => 'دکمه های گروهی',
      'options'    => array(
        'enabled'  => 'فعال',
        'disabled' => 'غیرفعال',
      ),
    ),

    array(
      'id'         => 'opt-button-set-2',
      'type'       => 'button_set',
      'title'      => 'دکمه های گروهی با مقدار پیشفرض',
      'options'    => array(
        'enabled'  => 'فعال',
        ''         => 'پیشفرض',
        'disabled' => 'غیرفعال',
      ),
    ),

    array(
      'id'           => 'opt-button-set-3',
      'type'         => 'button_set',
      'title'        => 'دکمه های گروهی',
      'options'      => array(
        'activate'   => 'فعال سازی',
        'deactivate' => 'غیرفعال سازی',
      ),
      'default'      => 'activate',
    ),

    array(
      'id'      => 'opt-button-set-4',
      'type'    => 'button_set',
      'title'   => 'دکمه های گروهی',
      'options' => array(
        'on'    => 'روشن',
        'off'   => 'خاموش',
      ),
      'default' => 'on',
    ),

    array(
      'id'       => 'opt-button-set-5',
      'type'     => 'button_set',
      'title'    => 'دکمه های گروهی چند انتخابی',
      'multiple' => true,
      'options'  => array(
        'opt-1'  => 'گزینه 1',
        'opt-2'  => 'گزینه 2',
        'opt-3'  => 'گزینه 3',
        'opt-4'  => 'گزینه 4',
        'opt-5'  => 'گزینه 5',
      ),
    ),

    array(
      'id'       => 'opt-button-set-6',
      'type'     => 'button_set',
      'title'    => 'دکمه های گروهی با مقادیر پیشفرض',
      'multiple' => true,
      'options'  => array(
        'opt-1'  => 'گزینه 1',
        'opt-2'  => 'گزینه 2',
        'opt-3'  => 'Option 3',
        'opt-4'  => 'گزینه 4',
        'opt-5'  => 'گزینه 5',
      ),
      'default'  => array( 'opt-2', 'opt-4' )
    ),

    array(
      'id'      => 'opt-button-set-7',
      'type'    => 'button_set',
      'title'   => 'دکمه های گروهی از دسته بندی ها',
      'options' => 'categories',
    ),

    array(
      'id'      => 'opt-button-set-8',
      'type'    => 'button_set',
      'title'   => 'دکمه های گروهی از برچسب ها',
      'options' => 'tags',
    ),

  )
) );

//
// Dependencies
//
CSF::createSection( $prefix, array(
  'title'       => 'وابستگی ها',
  'icon'        => 'fas fa-code-branch',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/faq?id=how-to-use-dependency" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => 'وابستگی های پایه',
    ),

    //
    // Dependency example 1
    array(
      'id'         => 'opt-depend-switcher',
      'type'       => 'switcher',
      'title'      => 'وابستگی در حالت (فعال)',
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (فعال).',
      'dependency' => array( 'opt-depend-switcher', '==', 'true' ),
    ),

    //
    // Dependency example 2
    array(
      'id'         => 'opt-depend-text',
      'type'       => 'text',
      'title'      => 'وابستگی در حالت تایپ',
    ),

    array(
      'type'        => 'notice',
      'style'       => 'success',
      'content'     => 'نمایش این عنصر فقط در حالت (تایپ)',
      'dependency'  => array( 'opt-depend-text', '!=', '' ),
    ),

    //
    // Dependency example 3
    array(
      'id'          => 'opt-depend-select',
      'type'        => 'select',
      'title'       => 'وابستگی در حالت انتخاب (آبی) یا (سیاه)',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'blue'      => 'آبی',
        'yellow'    => 'زرد',
        'green'     => 'سبز',
        'black'     => 'سیاه',
        'white'     => 'سفید',
      ),
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (آبی) یا (سیاه)',
      'dependency' => array( 'opt-depend-select', 'any', 'blue,black' ),
    ),

    //
    // Dependency example 4
    array(
      'id'      => 'opt-depend-radio',
      'type'    => 'radio',
      'title'   => 'وابستگی در حالت (بله)',
      'inline'  => true,
      'options' => array(
        'no'    => 'نه',
        'yes'   => 'بله',
        'any'   => 'نظری ندارم!',
      ),
      'default' => 'no'
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (بله)',
      'dependency' => array( 'opt-depend-radio', '==', 'yes' ),
    ),

    //
    // Dependency example 5
    array(
      'id'       => 'opt-depend-checkbox',
      'type'     => 'checkbox',
      'title'    => 'وابستگی در حالت انتخاب (سبز) یا (سیاه)',
      'inline'   => true,
      'options'  => array(
        'blue'   => 'آبی',
        'yellow' => 'زرد',
        'green'  => 'سبز',
        'black'  => 'سیاه',
        'white'  => 'سفید',
      ),
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (سبز) یا (سیاه)',
      'dependency' => array( 'opt-depend-checkbox', 'any', 'green,black' ),
    ),

    //
    // Dependency example 6
    array(
      'id'       => 'opt-depend-image-select',
      'type'     => 'image_select',
      'title'    => 'وابستگی در حالت انتخاب (آبی)',
      'options'  => array(
        'green'  => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
        'red'    => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
        'yellow' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
        'blue'   => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
        'gray'   => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
      ),
      'default'  => 'green',
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (آبی)',
      'dependency' => array( 'opt-depend-image-select', '==', 'blue' ),
    ),

    //
    // Dependency example 6
    array(
      'id'       => 'opt-depend-image-select-any',
      'type'     => 'image_select',
      'title'    => 'وابستگی در حالت انتخاب (آبی) یا (قرمز)',
      'options'  => array(
        'green'  => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
        'red'    => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
        'yellow' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
        'blue'   => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
        'gray'   => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
      ),
      'default'  => 'green',
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (آبی) یا (قرمز)',
      'dependency' => array( 'opt-depend-image-select-any', 'any', 'red,blue' ),
    ),

    array(
      'type'    => 'subheading',
      'content' => 'وابستگی های نمایشی',
    ),

    //
    // Dependency example 7
    array(
      'id'          => 'opt-depend-visible-switcher',
      'type'        => 'switcher',
      'title'       => 'سوئیچ به حالت (فعال)',
      'label'       => 'در زیر فیلدها به جای مخفی شدن، در حال مشاهده هستند. برای استفاده از آنها به (فعال) تغییر دهید.',
    ),

    array(
      'id'          => 'opt-depend-visible-text',
      'type'        => 'text',
      'title'       => 'عنوان وابسته',
      'dependency'  => array( 'opt-depend-visible-switcher', '==', 'true', '', 'visible' ),
    ),

    array(
      'id'          => 'opt-depend-visible-select',
      'type'        => 'select',
      'title'       => 'انتخابی وابسته',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'opt-1'     => 'گزینه 1',
        'opt-2'     => 'گزینه 2',
        'opt-3'     => 'گزینه 3',
      ),
      'dependency'  => array( 'opt-depend-visible-switcher', '==', 'true', '', 'visible' ),
    ),

    //
    // Dependency example 8
    array(
      'type'    => 'subheading',
      'content' => 'وابستگی های تو در تو',
    ),

    array(
      'id'    => 'opt-depend-switcher-1',
      'type'  => 'switcher',
      'title' => 'وابستگی اول در حالت (فعال) --->',
    ),

    array(
      'id'          => 'opt-depend-select-1',
      'type'        => 'select',
      'title'       => '---> و وابستگی دوم در حالت انتخابی (آبی)',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'blue'      => 'آبی',
        'yellow'    => 'زرد',
        'green'     => 'سبز',
        'black'     => 'سیاه',
        'white'     => 'سفید',
      ),
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت (فعال) و (آبی)',
      'dependency' => array( 'opt-depend-switcher-1|opt-depend-select-1', '==|==', 'true|blue' ),
    ),

    //
    // Dependency example 9
    array(
      'type'    => 'subheading',
      'content' => 'وابستگی تو در تو مرحله ای',
    ),

    array(
      'id'          => 'opt-nested-select-1',
      'type'        => 'select',
      'title'       => 'وابستگی اول در حالت انتخابی (سیاه) یا (سفید) --->',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'blue'      => 'آبی',
        'yellow'    => 'زرد',
        'green'     => 'سبز',
        'black'     => 'سیاه',
        'white'     => 'سفید',
      ),
    ),

    array(
      'id'          => 'opt-nested-select-2',
      'type'        => 'select',
      'title'       => '---> وابستگی دوم در حالت انتخابی (بزرگ) --->',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'small'     => 'کوچک',
        'middle'    => 'متوسط',
        'large'     => 'بزرگ',
        'xlage'     => 'خیلی بزرگ',
        'xxlage'    => 'بسیار بزرگ',
      ),
      'dependency'  => array( 'opt-nested-select-1', 'any', 'black,white' ),
    ),

    array(
      'id'          => 'opt-nested-select-3',
      'type'        => 'select',
      'title'       => '---> وابستگی سوم در حالت انتخابی (سلام)',
      'placeholder' => 'یک گزینه انتخاب کنید',
      'options'     => array(
        'hello'     => 'سللام',
        'world'     => 'دنیا',
      ),
      'dependency'  => array( 'opt-nested-select-1|opt-nested-select-2', 'any|==', 'black,white|large' ),
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'نمایش این عنصر فقط در حالت های بالا',
      'dependency' => array( 'opt-nested-select-1|opt-nested-select-2|opt-nested-select-3', 'any|==|==', 'black,white|large|hello' ),
    ),

  )
) );

//
// Validate
//
CSF::createSection( $prefix, array(
  'title'       => 'اعتبارسنجی',
  'icon'        => 'fas fa-check-circle',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/faq?id=how-to-use-validate" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'       => 'opt-validate-1',
      'type'     => 'text',
      'title'    => 'اعتبارسنجی ایمیل',
      'subtitle' => 'این فیلد فقط آدرس ایمیل معتبر را می پذیرد',
      'default'  => 'info@danapeyvast.net',
      'validate' => 'csf_validate_email',
    ),

    array(
      'id'       => 'opt-validate-2',
      'type'     => 'text',
      'title'    => 'اعتبارسنجی اعداد',
      'subtitle' => 'این فیلد فقط اعداد معتبر را می پذیرد',
      'default'  => '123456',
      'validate' => 'csf_validate_numeric',
    ),

    array(
      'id'       => 'opt-validate-3',
      'type'     => 'text',
      'title'    => 'اعتبارسنجی ضروری',
      'subtitle' => 'این فیلد الزامی است، نمی تواند خالی باشد',
      'default'  => 'محتوای پیشفرض',
      'validate' => 'csf_validate_required',
    ),

    array(
      'id'       => 'opt-validate-4',
      'type'     => 'text',
      'title'    => 'اعتبارسنجی URL',
      'subtitle' => 'این فیلد فقط url معتبر را می پذیرد',
      'default'  => 'http://danapeyvast.net',
      'validate' => 'csf_validate_url',
    ),

  )
) );

//
// Sanitize
//
CSF::createSection( $prefix, array(
  'title'       => 'جایگزینی',
  'icon'        => 'fas fa-redo',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/faq?id=how-to-use-sanitize" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'id'       => 'opt-sanitize-1',
      'type'     => 'text',
      'title'    => 'جایگزینی حروف (a) تا (b)',
      'subtitle' => 'جایگزینی حروف از (a) به حرف (b). مثال: کلمه apple به bpple',
      'sanitize' => 'csf_sanitize_replace_a_to_b'
    ),

    array(
      'id'       => 'opt-sanitize-2',
      'type'     => 'text',
      'title'    => 'جایگزینی عنوان',
      'subtitle' => 'تبدیل حروف (فاصله) به (-) و (بزرگ) به حروف (کوچک). مثال:  Hello World to hello-world',
      'sanitize' => 'csf_sanitize_title'
    ),

  )
) );

//
// Field: backup
//
CSF::createSection( $prefix, array(
  'title'       => 'پشتیبان گیری',
  'icon'        => 'fas fa-shield-alt',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=backup" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'type' => 'backup',
    ),

  )
) );

//
// Others
//
CSF::createSection( $prefix, array(
  'title'       => 'سایر موارد',
  'icon'        => 'fas fa-bolt',
  'description' => 'برای جزئیات بیشتر درخصوص این فیلد به اسناد مراجعه کنید: <a href="http://codestarframework.com/documentation/#/fields?id=others" target="_blank">(توضیحات فیلد)</a>',
  'fields'      => array(

    array(
      'type'    => 'heading',
      'content' => 'این یک عنوان نمایشی است',
    ),

    array(
      'type'    => 'subheading',
      'content' => 'این یک زیر عنوان نمایشی است',
    ),

    array(
      'type'    => 'content',
      'content' => 'این یک محتوای نمایشی است',
    ),

    array(
      'type'    => 'submessage',
      'style'   => 'success',
      'content' => 'این یک فیلد <strong>زیر عنوان</strong> با استایل <strong>success</strong> می باشد',
    ),

    array(
      'type'    => 'content',
      'content' => 'این یک فیلد محتوا می باشد',
    ),

    array(
      'type'    => 'submessage',
      'style'   => 'info',
      'content' => 'این یک فیلد <strong>زیر عنوان</strong> با استایل <strong>Info</strong> می باشد',
    ),

    array(
      'type'    => 'submessage',
      'style'   => 'warning',
      'content' => 'این یک فیلد <strong>زیر عنوان</strong> با استایل <strong>warning</strong> می باشد',
    ),

    array(
      'type'    => 'submessage',
      'style'   => 'danger',
      'content' => 'این یک فیلد <strong>زیر عنوان</strong> با استایل <strong>danger</strong> می باشد',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'success',
      'content' => 'این یک فیلد <strong>اطلاع رسانی</strong> با استایل <strong>success</strong> می باشد',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'info',
      'content' => 'این یک فیلد <strong>اطلاع رسانی</strong> با استایل <strong>info</strong> می باشد',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'warning',
      'content' => 'این یک فیلد <strong>اطلاع رسانی</strong> با استایل <strong>warning</strong> می باشد',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'danger',
      'content' => 'این یک فیلد <strong>اطلاع رسانی</strong> با استایل <strong>danger</strong> می باشد',
    ),

    array(
      'type'    => 'content',
      'content' => 'این یک فیلد<strong> محتوایی </strong>است می توانید برخی از مطالب را در اینجا بنویسید',
    ),

  )
) );
