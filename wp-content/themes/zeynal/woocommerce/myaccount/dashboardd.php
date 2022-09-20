<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php 
	do_action( 'woocommerce_after_my_account' );

?>
<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>

<div class="ete">

<div class="boete">
<div class="iconuser">
<i class="mdi mdi-cart-outline">
</i>
</div>
<h2>محصولات خریداری شده

</h2>

<div class="boete1"><?php echo number_format( count( es_get_customer_bought_products() ) ); ?></div>
</div>


<div class="boete">
<div class="iconuser">
<i class="mdi mdi-card-text-outline">
</i>
</div>
<h2>مبلغ سفارشات شما

</h2>

<div class="boete1"><?php echo wc_price( es_get_customer_total_order() ); ?></div>

</div>

<div class="boete">
<div class="iconuser">
<i class="mdi mdi-comment-multiple-outline">
</i>
</div>
<h2>کل دیدگاه ها

</h2>

<div class="boete1"><?php echo es_comment_count( get_current_user_id() ); ?></div>

</div>

</div>	
	
<div class="elk">
<div class="elkone">
<h3 class="title-2">اطلاعیه های سایت

</h3>
<?php $query = new WP_Query(array('post_type' =>'elai',
	'posts_per_page'  => 10));
	if ($query){while($query->have_posts()) : $query->the_post(); ?>
	<a class="elktwo" href="<?php the_permalink(); ?>"><i class="mdi mdi-access-point"></i><h3><?php the_title(); ?></h3> <span><?php the_time('d M Y'); ?></span></a>

	<?php endwhile; } ?>
	</div></div>
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
