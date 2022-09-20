<?php 
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */
get_header( 'shop' );


?>
<section>
	<div class="container">
		<div class="breadcrumbs mb-4 mt-4" >	
			<h3> <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?></h3>
		</div>

		<div class="row mt-3">	

		<div class="col-xl-8 col-lg-8 col-md-12">
			<div class="space-right-delt " >
		
	<!--------------	post site code ----------------->			
				<?php if(have_posts()) : ?> <?php while(have_posts()) : the_post(); ?> 
			
					<div class="product-day content-post-main">
						<div class="size">
							<?php wc_get_template_part( 'content', 'single-product' ); ?>
						</div>
					</div>
					<span class="clearfix"></span>

				<?php endwhile; ?>
				<?php endif; ?> 
		
	<!--------------    End	post site code ----------------->						
			</div>
		</div>	
		<?php //include (TEMPLATEPATH . "/left-sidebar.php"); ?>
		<div class="col-xl-4 col-lg-4 col-md-12 sidebar-zynal sid-woo-zeyn" >
			<div class="ml-4 space-right-delt">
				<div class="bg-all-box bg-all-box-zy py-3 px-4">

				<div class="seller-box d-flex">
					<div class="seller-name d-flex">
						<div class="seller-icon">
							<img src="<?php echo get_template_directory_uri(); ?>/images/shop.svg" alt="فروشنده">
						</div>

						<div class="seller-title">
							فروشنده: <?php the_author(); ?>
						</div>
					</div>

					<div class="seller-product-count">
						<div><?php the_author_posts(); ?> محصول </div>
						<div><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></div>
					</div>
				</div>

				<?php 
				// Product Information General
				if( get_field('product_information_general_control') ) { ?>
					<div class="product-general-information">
						<?php
							if( have_rows('product_information_general', 'option') ):
								while( have_rows('product_information_general', 'option') ) : the_row();
								$item_text = get_sub_field('product_information_general_text','option');
								$item_icon = get_sub_field('product_information_general_icon','option');
						?>

						<div class="prod-info-item d-flex">
							<div class="prod-info-item-icon">
								<img src="<?= esc_url(@$item_icon['url']) ?>" alt="<?= esc_attr(@$item_icon['alt']) ?>" >
							</div>
							<div class="prod-info-item-text">
								<?= @$item_text ?>
							</div>
						</div>


						<?php 
								endwhile;
							endif;
						?>
					</div>
				<?php } ?>

				<?php 
				// Product Invontry
				if( get_field('product_invontry_control') ) { ?>
					<?php
					$stock = get_post_meta( $post->ID, '_stock', true );
					if ( $stock > 0 ) {
					?>
						<div class="product-general-information mt-2" >
							<div class="prod-info-item d-flex">
								<div class="prod-info-item-icon">
									<img src="<?php echo get_template_directory_uri(); ?>/images/box.svg" alt="invontry">
								</div>
								<div class="prod-info-item-text">
									موجودی <?= $stock ?> عدد
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				
						<div class="single-zeynal-price" >
							<span><?php echo $product->get_price_html(); ?></span>
						</div>
					
						<div class="product-single-addcart">
							<?php 
								// Product Add To Cart Buttons
								// woocommerce_template_loop_add_to_cart();
								woocommerce_template_single_add_to_cart();
							?>
						</div>
					
						<?php
								$box_winfor_btn1_text = get_post_meta(get_the_ID(), 'box_winfor_btn1_text', true);
								$box_winfor_btn2_text = get_post_meta(get_the_ID(), 'box_winfor_btn2_text', true);
								$box_winfor_btn1_link = get_post_meta(get_the_ID(), 'box_winfor_btn1_link', true);
								$box_winfor_btn2_link = get_post_meta(get_the_ID(), 'box_winfor_btn2_link', true);
						?>
						
					</div>


						<div class="py-3 mt-2">
							<div class="head-titr-boxs  mb-4" >
								<h3><i class="fa fa-tag" ></i>  برچسب ها </h3> 
							</div>

							<?php echo wc_get_product_tag_list( $product->get_id(), '  ', '<span class="tagged_as">' , '</span>' ); ?>
						</div>		

			</div>
		</div>
	</div>
	<span class="clearfix"></span>

	<?php 
	get_template_part('/components/product_ads_middle');
	get_template_part('/components/product_ads_bottom');
	?>

	<div class="head-titr-boxs  mb-3 mt-4">
		<h3><i class="fa fa-shopping-basket"></i>  محصولات مرتبط </h3> 
	</div>



<div class="slde-product-relateds mb-5">
		
<?php
	$categories = get_the_category();
	$cats = array();
	foreach ( $categories as $category ) { 
			$cats[] = esc_attr( $category->term_id ); 
	}
	$args = new WP_Query(array(
		'post_type' =>'product',
		'cat'	=> $cats,
		'posts_per_page' => 4,
		'post__not_in' => array(get_the_ID()),
	));
	if($args->have_posts()) : while($args->have_posts()) : $args->the_post();
	?>
			
				<div class="product-slider">
					<div class="product-slider-1">
					
						<div class="on-123-xf">
							<a  href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(array(300, 300)); ?>
								<h3>
									<?php the_title(); ?>
								</h3>
							</a>
						</div>
						
						<div class="metatwo">
							<div class="metathree">
								<div class="metafour">
									<span><?php echo $product->get_price_html(); ?></span>
								</div>
							</div>

							<?php
								$box_winfor_btn1_text = get_post_meta(get_the_ID(), 'box_winfor_btn1_text', true);
								$box_winfor_btn1_link = get_post_meta(get_the_ID(), 'box_winfor_btn1_link', true);
							?>

							
						</div>

					</div>
					<div class="product-slider-2"></div>
				</div>


	<?php endwhile; endif; wp_reset_query(); ?>
	<span class="clearfix"></span>
</div>
	
		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

	</div>
</section>

<?php
 get_footer( 'shop' );

