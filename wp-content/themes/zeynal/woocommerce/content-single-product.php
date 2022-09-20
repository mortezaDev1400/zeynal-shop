<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
<div class="prodayin bg-all-box bg-all-box-zy post-main">



	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

	<div class="product-title">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</div>	
	<!-- <div class="metas-product">
	<span class="date-product"><i class="fa fa-calendar-o" ></i> <?php //the_time('j F Y'); ?></span>
	<?php //echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in"><i class="fa fa-list-ul" ></i> ' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	</div>	 -->
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */

		do_action( 'woocommerce_single_product_summary' );
		?>
		<div class="clearfix"></div>

		<div class="suggested-best-price d-flex">
			<?php $link_suggested_price =  get_field('single_product_best_price_suggested', 'option'); ?>
			<div class="mr-2"><a href="<?= @$link_suggested_price; ?>"  title="پیشنهاد قیمت بهتر">قیمت بهتری سراغ دارید ؟</a></div>
			<div><a href="<?= @$link_suggested_price; ?>" title="پیشنهاد قیمت بهتر"><img src="<?php echo get_template_directory_uri(); ?>/images/suggested-best-price.svg" alt="قیمت بهتر"></a></div>
		
		</div>

	</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
