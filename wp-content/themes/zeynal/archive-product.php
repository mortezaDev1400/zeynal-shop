<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

get_header(); ?>

<section>
	<div class="container">

<div class="row">

	<div class="col-xl-3 col-lg-3 col-md-12" >

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ستون سمت چپ') ) : ?><?php endif; ?>
			
		<?php //echo do_shortcode('[yith_wcan_filters slug="draft-preset"]'); ?>
	</div>

	<div class="col-xl-9 col-lg-9 col-md-12">





	<div class="shop-j-2">

			<div class="size">
			<div class="shop-j-1">

				<div class="bhsizerad">
					<div class="bhtop archive-top-head">
						<?php
							do_action( 'woocommerce_before_shop_loop' );
						?>
						<div class="clearfix"></div>
					</div>
				</div>

			<div class="divik grid">
			<?php
			if ( woocommerce_product_loop() ) {

			;

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

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

</div>




</div>
</section>

 <Div class="clearfix"></div>
<?php get_footer();
