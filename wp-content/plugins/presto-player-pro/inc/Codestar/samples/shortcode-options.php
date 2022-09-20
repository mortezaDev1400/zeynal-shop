<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = 'csf_demo_shortcodes';

//
// Create a shortcoder
//
CSF::createShortcoder( $prefix, array(
  // 'button_title'   => 'Add Shortcode',
  // 'select_title'   => 'Select a shortcode',
  // 'insert_title'   => 'Insert Shortcode',
  // 'show_in_editor' => true,
  // 'gutenberg'      => array(
  //   'title'        => 'CSF Shortcodes',
  //   'description'  => 'CSF Shortcode Block',
  //   'icon'         => 'screenoptions',
  //   'category'     => 'widgets',
  //   'keywords'     => array( 'shortcode', 'csf', 'insert' ),
  //   'placeholder'  => 'Write shortcode here...',
  // )
) );

//
// A shortcode [foo title=""]
//
CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 1',
  'view'      => 'normal',
  'shortcode' => 'foo',
  'fields'    => array(

    array(
      'id'    => 'opt_title',
      'type'  => 'text',
      'title' => 'عنوان',
    ),

    array(
      'id'    => 'opt_switcher',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
      'label' => 'متن برچسب سوئیچر',
    ),

  )
) );

//
// A shortcode [foo title=""]content[/foo]
//
CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 2',
  'view'      => 'normal',
  'shortcode' => 'foo',
  'fields'    => array(

    array(
      'id'    => 'opt_title',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'      => 'opt_checkbox',
      'type'    => 'checkbox',
      'title'   => 'گزینه ها',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      )
    ),

    array(
      'id'      => 'opt_select',
      'type'    => 'select',
      'title'   => 'انخابی',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'    => 'content',
      'type'  => 'textarea',
      'title' => 'توضیحات',
    ),

  )
) );

//
// A shortcode [content]content[/content][content]content[/content]
//
CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 3',
  'view'      => 'contents',
  'shortcode' => 'content',
  'fields'    => array(

    array(
      'id'    => 'opt_content_1',
      'type'  => 'textarea',
      'title' => 'توضیحات 1',
    ),

    array(
      'id'    => 'opt_content_2',
      'type'  => 'textarea',
      'title' => 'توضیحات 2',
    ),

  )
) );

//
// A shortcode [opt_content_1]content[/opt_content_1][opt_content_2]content[/opt_content_2]
//
CSF::createSection( $prefix, array(
  'title'  => 'کد کوتاه 4',
  'view'   => 'contents',
  'fields' => array(

    array(
      'id'    => 'opt_content_1',
      'type'  => 'textarea',
      'title' => 'توضیحات 1',
    ),

    array(
      'id'    => 'opt_content_2',
      'type'  => 'textarea',
      'title' => 'توضیحات 2',
    ),

  )
) );

CSF::createSection( $prefix, array(
  'title'           => 'کد کوتاه 5',
  'view'            => 'group',
  'shortcode'       => 'foo',
  'group_shortcode' => 'nested_foo',
  'group_fields'    => array(

    array(
      'id'     => 'opt_title',
      'type'   => 'text',
      'title'  => 'متن',
    ),

    array(
      'id'     => 'content',
      'type'   => 'textarea',
      'title'  => 'توضیحات',
    ),

  )
) );

CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 6',
  'view'      => 'group',
  'shortcode' => 'foo',
  'fields'    => array(

    array(
      'id'    => 'opt_switcher',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
      'label' => 'متن برچسب سوئیچر',
    ),

    array(
      'id'      => 'opt_select',
      'type'    => 'select',
      'title'   => 'انتخابی',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

  ),
  'group_shortcode' => 'nested_foo',
  'group_fields'    => array(

    array(
      'id'    => 'title',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'    => 'content',
      'type'  => 'textarea',
      'title' => 'توضیحات',
    ),

  )
) );

CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 7',
  'view'      => 'repeater',
  'shortcode' => 'foo',
  'fields'    => array(

    array(
      'id'    => 'opt_title',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'    => 'opt_switcher',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
      'label' => 'متن برچسب سوئیچر',
    ),

    array(
      'id'      => 'opt_select',
      'type'    => 'select',
      'title'   => 'انتخابی',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

  )
) );

CSF::createSection( $prefix, array(
  'title'     => 'کد کوتاه 8',
  'view'      => 'repeater',
  'shortcode' => 'foo',
  'fields'    => array(

    array(
      'id'    => 'opt_title',
      'type'  => 'text',
      'title' => 'متن',
    ),

    array(
      'id'    => 'opt_switcher',
      'type'  => 'switcher',
      'title' => 'سوئیچر',
      'label' => 'متن برچسب سوئیچر',
    ),

    array(
      'id'      => 'opt_select',
      'type'    => 'select',
      'title'   => 'انتخابی',
      'options' => array(
        'opt-1' => 'گزینه 1',
        'opt-2' => 'گزینه 2',
        'opt-3' => 'گزینه 3',
      ),
    ),

    array(
      'id'    => 'content',
      'type'  => 'textarea',
      'title' => 'توضیحات',
    ),

  )
) );
