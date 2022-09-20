<?php
get_header(); ?>

<section>
	<div class="container">


<div class="shop-j-2">

<div class="size">
<div class="shop-j-1">
<div class="bhsizerad">
 <div class="bhtop">

<?php
	do_action( 'woocommerce_before_shop_loop' );

?>

</div></div>
<div class="divik grid">
	
<?php
if ( woocommerce_product_loop() ) {

;

	woocommerce_product_loop_start();

	
	?>
<?php if(have_posts()) { ?>
<?php while(have_posts()) : the_post();
global $product;

wc_get_template_part( 'content', 'product' );

?>

	
	
		
	
	

	<?php endwhile;  ?>
	<?php } else {
		echo '<p style="font:13px/30px IRANSansWeb_Light;color:#f00;padding-right:20px;">متاسفانه پست یا نتیجه ای یافت نشد!</p>';
	}  ?>
	<?php

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
 ?></div></div></div></div>

</div>
</section>

 <Div class="clearfix"></div>
<?php get_footer();
