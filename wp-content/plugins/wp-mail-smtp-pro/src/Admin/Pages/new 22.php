<?php
/**
 * w3fa Plugin
 *
 * @package w3fa Plugin
 *
 * Plugin Name:  Carpet Plugin
 * Description:  افزونه دکور فرش
 * Plugin URI:  
 * Version:     2.1.0
 * Author:      
 * Author URI:  
 * Text Domain: 
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/** installer **/
function installer(){
    include('installer.php');
}
register_activation_hook(__file__, 'installer');
/**/

add_action( 'admin_menu', 'carpet_admin_menu' );

function carpet_admin_menu() {
	add_menu_page( 'Select Carpets', 'Select Carpets', 'manage_options', 'myplugin/carpet-admin-page.php', 'carpetplguin_admin_page', 'dashicons-tickets', 6  );
}
function carpetplguin_admin_page(){
  include_once('images.php');
};

/*style*/
add_action('wp_enqueue_scripts','register_my_scripts');

function register_my_scripts(){
wp_enqueue_style( 'carpetstyle', plugins_url( 'css/style.css' , __FILE__ ) );
wp_enqueue_style( 'owlc', plugins_url( 'css/owl.carousel.min.css' , __FILE__ ) );
wp_enqueue_style( 'owlt', plugins_url( 'css/owl.theme.default.css' , __FILE__ ) );
wp_enqueue_script( 'owljs', plugins_url( 'js/owl.carousel.min.js' , __FILE__ ), array('jquery') );

}
/*shortcode*/
add_shortcode( 'carpetdecoretwo', 'carpetdecoretwo_shortcode' );
function carpetdecoretwo_shortcode(){
global $wpdb;
$table_name = $wpdb->prefix . "carpetimages";
    $query = ("SELECT * FROM $table_name");
	$latestimgs = $wpdb->get_results( $query );
	    global $product;
	$product_id = $_GET['prid'];
        $_product = wc_get_product($product_id);
	$available_variations = $_product->get_available_variations();
	$product = wc_get_product($product_id);
$variations = $product->get_available_variations();
		$images_data = get_post_meta( $product_id,'woodmart_variation_gallery_data',true );
	$imgziro = end($images_data);

	?>


    <section class="decoration-test">
        <div class="content container">
			<ul class="ul-decoration">
				<li><a href="#six-decoration" title="دکور 1" class="active">دکور 1</a></li>
                <li><a href="#five-decoration" title="دکور 2"> دکور 2</a></li>
				 <li><a href="#four-decoration" title="دکور 3"> دکور 3</a></li>
				 <li><a href="#third-decoration" title="دکور 4"> دکور 4</a></li>
                <li><a href="#second-decoration" title="دکور 5"> دکور 5</a></li>            
				<li><a href="#first-decoration" title="دکور 6" > دکور 6</a></li>
				
            </ul>
            <div class="box-decoration">
			<div id="six-decoration" class="six-decoration decoration active">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/BG.jpg" alt="">
                    <img class="table6 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/sofa2.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro, 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>                    </div></div>
				
				<div id="five-decoration" class="five-decoration decoration">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/fiver.jpg" alt="">
                     <img class="table5 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/sofa05.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro, 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>                    </div></div>
				
               	<div id="four-decoration" class="four-decoration decoration">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/shfu.jpg" alt="">
                    <img class="table4 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/Sofa3.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro, 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>                    </div></div>
				
				 <div id="third-decoration" class="third-decoration decoration">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/ffr.png" alt="">
                    <img class="table1 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/ffrt.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro, 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>                    </div></div>
				
					
					 <div id="second-decoration" class="second-decoration decoration">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/rtwo.png" alt="">
                    <img class="table2 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/rtwob.png" alt="">
                    <img class="table1 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/rtwot.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro , 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>                    </div></div>
					
					
					<div id="first-decoration" class="first-decoration decoration">
                    <img class="img-center img" src="<?php echo plugin_dir_url( __file__ ) ?>img/sof.png" alt="">
                    <img class="table1 img" src="<?php echo plugin_dir_url( __file__ ) ?>img/Sofa.png" alt="">
                    <div class="carpet-wrapper" style="z-index:8 !important">
                        <?php if (empty($_GET['prid'])){ ?>
                        <img class="carpet setsrc" src="<?php echo $latestimgs[0]->imageurl ?>" alt="">
						<?php }else{  $image = wp_get_attachment_image_src( $imgziro, 'single-post-thumbnail' );?>
						<img class="carpet setsrc" src="<?php echo $image[0] ?>" alt="">
						<?php } ?>
                    </div></div>
					
	                <div class="carpets mt-5">
                    <div class="loop owl-carousel owl-theme">
					<?php
		if(!empty($_GET['prid'])){

    $product = new WC_product($product_id);
    $attachment_ids = $images_data;
		if(!empty($attachment_ids)){
    foreach( $attachment_ids as $attachment_id ) 
        { ?>
                      <div class="item">
                            <a href="javascript:;" onclick="ChangeCarpet(<?php echo "'#carpet".$attachment_id."'" ?>)">
                                <img class="carpet" id="carpet<?php echo $attachment_id ?>" src="<?php  echo wp_get_attachment_url( $attachment_id ); ?>" alt="">
                            </a>
                        </div>
        <?php }
		}
		}
	
	else{
		
	foreach ($latestimgs as $imgs ){ ?>
		
                        <div class="item">
                            <a href="javascript:;" onclick="ChangeCarpet(<?php echo "'#carpet".$imgs->ID."'" ?>)">
                                <img class="carpet" id="carpet<?php echo $imgs->ID ?>" src="<?php echo $imgs->imageurl ?>" alt="">
                            </a>
                        </div>
<?php }} ?>
							
                    
                </div> </div> <div style="text-align: center;">
				<?php if(!empty($_GET['prid'])){
				echo '<a class="btn btn-style-default btn-shape-semi-round btn-size-default btn-color-primary btn-icon-pos-right" href="'.get_permalink( $product_id ).'"><span class="wd-btn-text" data-elementor-setting-key="text"> خرید این فرش </a>';
	} ?>
				</div>
            </div>
        </div>

    </section>
<script>
    jQuery('.loop').owlCarousel({
        center: true,
		rtl:true,
        items:2,
        loop:true,
        nav:true,
        margin:10,
        responsive:{
            600:{
                items:6
            }
        }
    });
</script>
<script>
    function ChangeCarpet(element){
        var carpetsrc = jQuery(element).attr('src');
        jQuery(".setsrc").attr('src',carpetsrc);
    }
</script>
<script>
  jQuery('.ul-decoration li a').on('click', function(){
    jQuery('.ul-decoration').find('li a.active').removeClass( 'active' );
    jQuery(this).addClass( 'active' );
  });
</script>
<script>
  jQuery('.ul-decoration li a').on('click', function(){
	 var xh =jQuery(this).attr('href');
    jQuery('.box-decoration').find('.decoration.active').removeClass( 'active' );
    jQuery(xh).addClass( 'active' );
  });
</script>
<script>
jQuery(window).load(function() {
	jQuery(".loader").delay(2000).fadeOut("slow");
  jQuery("#overlayer").delay(2000).fadeOut("slow");
})
</script>
<?php
};

add_shortcode( 'testbtn', 'carpetdecoretest_shortcode' );

function carpetdecoretest_shortcode(){
	global $product;
	$product_id = $product->id;
	echo '<a class="btn btn-style-default btn-shape-semi-round btn-size-default btn-color-primary btn-icon-pos-right" href="https://farshmana.com/decorationtest/?prid='.$product_id.'"><span class="wd-btn-text" data-elementor-setting-key="text">
					تست دکوراسیون				</span>

									<span class="wd-btn-icon">
						<span class="wd-icon fab fa-codepen"></span>					</span></a>';
}