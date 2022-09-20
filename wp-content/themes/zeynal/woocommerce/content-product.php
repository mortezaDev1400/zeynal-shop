<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="product-slider">
<div class="product-slider-1">

		 <!-- Trigger/Open The Modal -->

		
	
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
			<span><?php echo $product->get_price_html(); ?></span>
		</div>
	</div>

	

	
</div>

</div>
<div class="product-slider-2"></div>
</div>