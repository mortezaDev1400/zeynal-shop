<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Create a widget 1
//
CSF::createWidget( 'csf_widget_example_1', array(
  'title'       => 'ابزارک 1 ساخته شده با Codestar',
  'classname'   => 'csf-widget-classname',
  'description' => 'ابزارک 1 ساخته شده با Codestar',
  'fields'      => array(

    array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'عنوان',
    ),

    array(
      'id'      => 'opt-text',
      'type'    => 'text',
      'title'   => 'متن',
      'default' => 'این متن یک مقدار پیشفرض است'
    ),

    array(
      'id'      => 'opt-color',
      'type'    => 'color',
      'title'   => 'رنگ',
    ),

    array(
      'id'      => 'opt-upload',
      'type'    => 'upload',
      'title'   => 'بارگذاری',
    ),

    array(
      'id'      => 'opt-textarea',
      'type'    => 'textarea',
      'title'   => 'توضیحات',
      'help'    => 'متن راهنما برای این فیلد',
    ),

  )
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'csf_widget_example_1' ) ) {
  function csf_widget_example_1( $args, $instance ) {

    echo $args['before_widget'];

    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }

    // var_dump( $args ); // Widget arguments
    // var_dump( $instance ); // Saved values from database
    echo $instance['title'];
    echo $instance['opt-text'];
    echo $instance['opt-color'];
    echo $instance['opt-upload'];
    echo $instance['opt-textarea'];

    echo $args['after_widget'];

  }
}

//
// Create a widget 2
//
CSF::createWidget( 'csf_widget_example_2', array(
  'title'       => 'ابزارک 2 ساخته شده با Codestar',
  'classname'   => 'csf-widget-classname',
  'description' => 'ابزارک 2 ساخته شده با Codestar',
  'fields'      => array(

    array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'عنوان',
    ),

    array(
      'id'      => 'opt-text',
      'type'    => 'text',
      'title'   => 'متن',
      'default' => 'این متن یک مقدار پیشفرض است'
    ),

    array(
      'id'      => 'opt-color',
      'type'    => 'color',
      'title'   => 'رنگ',
    ),

    array(
      'id'      => 'opt-switcher',
      'type'    => 'switcher',
      'title'   => 'سوئیچر',
      'label'   => 'متن برچسب سوئیچر',
    ),

    array(
      'id'      => 'opt-checkbox',
      'type'    => 'checkbox',
      'title'   => 'چک باکس',
      'label'   => 'متن برچسب چک باکس',
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
      'type'    => 'notice',
      'style'   => 'success',
      'content' => 'یک <strong>فیلد اطلاع رسانی</strong> زمینه <strong>success</strong> استایل.',
    ),

    array(
      'id'      => 'opt-textarea',
      'type'    => 'textarea',
      'title'   => 'توضیحات',
      'help'    => 'متن راهنما برای این فیلد',
    ),

  )
) );

//
// Front-end display of widget example 2
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'csf_widget_example_2' ) ) {
  function csf_widget_example_2( $args, $instance ) {

    echo $args['before_widget'];

    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }

    // var_dump( $args ); // Widget arguments
    // var_dump( $instance ); // Saved values from database
    echo $instance['title'];
    echo $instance['opt-text'];

    echo $args['after_widget'];

  }
}
