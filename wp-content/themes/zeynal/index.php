<?php 
	get_header();
	get_template_part('/components/slider');
	get_template_part('/components/index_ads_top');
?>


<!-- آخرین محصولات منتشر  شده -->
<section>---------------------------------
	<div class="container">
		<div class="row mt-3">	
			<div class="col-xl-12 col-lg-12 col-md-12">

<ul class="products columns-4 product_section_last">
		
<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 8,
		// 'posts_per_page' => 4,
	);
	query_posts($args);
	if(have_posts()) : while(have_posts()) : the_post(); 
?>
<div class="product-slider">
	<div class="product-slider-1">
		
		<div class="on-123-xf">
			<a  href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(array(300, 300)); ?>
				<h2>
					<?php the_title(); ?>
				</h2>
			</a>

				
		</div>

			<div class="metatwo">
				<div class="metathree">
					<div class="metafour">
						<span> <?php echo $product->get_price_html(); ?>  </span>
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

</ul>
			</div>
		</div>
	</div>
</section>





<?php
	//تبلیغات وسط صفحه
	get_template_part('/components/index_ads_middle');

    // بخش اسلایدری محصولات پیشنهادی
	get_template_part('/components/suggestion_product');
?>


<!--  بخش محصولات پیشنهادی برای شما -->

<section class="popular-products-section">
	<div class="container">
		<h3 class="head-popular-section"> 
		<i class="fa fa-cart-plus" aria-hidden="true"></i>	
		محصولات پیشنهادی برای شما 
		</h3>
		<div class="row mt-3">	
			<div class="col-xl-12 col-lg-12 col-md-12">

<ul class="products columns-4 product_section_last">
		
<?php
	$args = array(
		'post_type' => 'product',
		// 'posts_per_page' => 8,
		'posts_per_page' => 8,
	);
	query_posts($args);
	if(have_posts()) : while(have_posts()) : the_post(); 
?>

<div class="product-slider">
	<div class="product-slider-1">
		
		<div class="on-123-xf">
			<a  href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(array(300, 300)); ?>
				<h2>
					<?php the_title(); ?>
				</h2>
			</a>

		</div>

			<div class="metatwo">
				<div class="metathree">
					<div class="metafour">
						<span> <?php echo $product->get_price_html(); ?>  </span>
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

</ul>



			</div>
		</div>
	</div>
</section>





<?php
	get_template_part('/components/index_ads_bottom');
	get_footer(); 
?>