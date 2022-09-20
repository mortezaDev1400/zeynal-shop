<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<p><strong>سریع ترین حالت ممکن برای شروع</strong></p>
<p>فایل <code>functions.php</code> را باز کرده و کد زیر را درون آن جاگذاری کنید.</p>

<div class="csf-code-block">
<pre>
<span>// Control core classes for avoid errors</span>
if ( class_exists( 'CSF' ) ) {

  <span>//</span>
  <span>// Set a unique slug-like ID</span>
  $prefix = 'my_framework';

  <span>//</span>
  <span>// Create options</span>
  CSF::createOptions( $prefix, array(
    'menu_title' => 'My Framework',
    'menu_slug'  => 'my-framework',
  ) );

  <span>//</span>
  <span>// Create a section</span>
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 1',
    'fields' => array(

      <span>//</span>
      <span>// A text field</span>
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'Simple Text',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 2',
    'fields' => array(

      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'Simple Textarea',
      ),

    )
  ) );

}
</pre>
</div>

<p><strong>نحوه فراخوانی مقادیر!</strong></p>

<div class="csf-code-block">
<pre>
$options = get_option( 'my_framework' ); <span>// // unique id of the framework</span>

echo $options['opt-text']; <span>// id of field</span>
echo $options['opt-textarea']; <span>// id of field</span>
</pre>
</div>

<p><a href="http://codestarframework.com/documentation/" class="button" target="_blank" rel="nofollow"><i class="fas fa-book"></i> مستندات آنلاین</a></p>
