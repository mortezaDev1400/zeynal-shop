<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_prefix_profile_options';

//
// Create profile options
//
CSF::createProfileOptions( $prefix, array(
  'data_type' => 'serialize'
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
  'title'  => 'دمو تنظیمات کاربران',
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

  )
) );
