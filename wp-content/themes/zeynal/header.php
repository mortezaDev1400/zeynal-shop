<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php bloginfo('name');?></title>
    <!-- Bootstrap core CSS -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-grid.min.css"  rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-reboot.min.css"  rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/style-rtl.alpha6.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/css/flickity.css" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" /> 
	<link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/scroll/style.css" rel="stylesheet" >
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>



	<?php wp_head () ?>
	
	
	</head>	
<body <?php body_class(); ?>>
<header >
<div class="bg-orange-hd"></div>

<div class="bg-header-front top-zy-header" >
<div class="container">
<div class="row pb-1  top-zy-header">

		<div class="d-none d-sm-block d-md-none">	
		</div>
			<div class="col-lg-7 d-none d-lg-block">
					<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-inverse">				
						          <div class="navbar-header-btnsa">

        </div>	
					  <div class="navbar-inverse side-collapse in" id="navbarNavAltMarkup">
							<div class="menu_linkers_header-o" >
								<?php 
										wp_nav_menu(array(
											'theme_location' => 'expanded_header', 
											'container' => false, 
											'menu_class' => 'navbar-nav', // <ul class="nav"> 
											'fallback_cb' => 'default_expanded_footer', 
										));
								?>
							</div>
							
						  </div>		
					</nav>
			</div>
			<div class="col-lg-5 col-md-12 d-none d-lg-block">							
								<div class="list-b-footer social-b social-header-zey">
								<ul class="text-right">
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_rss_text', '', 'true' ); ?>"><i class="fa fa-rss" ></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_twitter_text', '', 'true' ); ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_insta_text', '', 'true' ); ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_aparatzey_text', '', 'true' ); ?>"><i style="background-image: url('<?php bloginfo('template_directory'); ?>/images/aparat_white.png');" class="aparat-icon-header"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_tlg1_text', '', 'true' ); ?>"><i class="fa fa-telegram"></i></a></li>
								</ul>				
					</div>					
			</div>
		</div>
	</div>	
</div>

<style>
	.aparat-icon-header{
		display: inline-block;
		width: 30px;
		height: 30px;
		position: relative;
		top: 6px;
	}
	
</style>						

	<div class="container">
		<div class="bg-header-front">
	

		<div class="row pt-5 pm-4">
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 logo ">
			
				<div style="position:relative;text-align:right">
					<a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
						<img src="<?php get_option_tree('logo_upload', '', 'true' ); ?>" title="<?php bloginfo('name');?>"  alt="<?php bloginfo('name');?>" width="220">
					</a>

				</div>
			</div>

			<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 " >
				<div class="banner-header-zey">
					<?php get_option_tree('adshraderzeynal_textarea', '', 'true' ); ?>
				</div>
			
				<div class="search-box-hd">
						<div class="search-form ">
							<?php custom_search_form(array(
									'echo'=>1,
									'archive_show'=>0,
									'cat_show'=>0,
									'tag_show'=>0,
									'author_show'=>0,
									'label_show'=>0,
							));?>
						</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 d-none d-lg-block" >
			<div class="d-flex  justify-content-end">		

			<div class=" basket_wrapper table-cell" >
			<div class="basket_in_wrapper " >
			<?php global $woocommerce;
			$checkout_url = $woocommerce->cart->get_checkout_url();
			$cart_url = $woocommerce->cart->get_cart_url(); ?>
				<div class="right basket_icon" >
				<a href="<?= $cart_url; ?>" title="مشاهده صفحه سبد خرید">
				<span>سبد خرید</span>
				</a>
				</div><!--.right-->
				<div class="basket" >
				<a href="<?= $cart_url; ?>" class="basket_count_wrapper">شامل<span class="basket_count animate"><?= sizeof( WC()->cart->get_cart()); ?></span>محصول</a>
				<br/><br/>
				<strong class="final_link">
				<a href="<?= $cart_url; ?>" title="مشاهده سبد خرید">مشاهده</a>/
				<a href="<?= $cart_url; ?>" title="تکمیل خرید و پرداخت">تکمیل خرید</a></strong>
				</div><!--.basket-->
				<div class="clear"></div>
				<div class="basket_o_wrapper" >
			<span class="arrow"></span>
			<div class="clear"></div>
				<div class="basket_wrapper2" >
					<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

					<form class="form2" autocomplete="off" action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
					<span class="j_title">جمع کل سبد خرید</span>
					
					<ul class="basket_products">
					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

							?>
						<li>
							<?php if ( $_product->is_visible() ) { ?>
							<a href="<?php echo get_permalink( $product_id ); ?>" target="_blank"> 
							<?php } ?>
							<?php //echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
							<span class="title"><?= $product_name; ?></span>
							
							<?php echo WC()->cart->get_item_data( $cart_item ); ?>
						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
													
							<?php if ( $_product->is_visible() ) { ?>
							</a>
							<?php } ?>				
							<span class="product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
							?>
							</span>
						</li>
						<?php
						}
					}
				?>
						
					</ul>
					<div class="clear"></div>
					<div class="sum" >
					<span>قیمت مجموع</span> <?php wc_cart_totals_subtotal_html(); ?>
					<div class="clear solid"></div>
					
					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</div><!--.sum-->
					</form>
					<?php else: ?>
						<span class="j_title">سبد خرید خالی است</span>

				 <?php endif; ?>
				</div><!--.basket_wrapper2-->
			</div><!--.basket_o_wrapper-->
			</div><!--.basket_wrapper -->
		</div><!--.table-cell-->
		
		<div class="panel_wrapper table-cell" >
			<div class="panel_in_wrapper" >
				<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('حساب کاربری','woocommerce'); ?>"><?php _e('حساب کاربری','woocommerce'); ?></a>
				 <?php } 
				 else { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('ورود / ثبت نام','woocommerce'); ?>"><?php _e('ورود / ثبت نام','woocommerce'); ?></a>
				 <?php } ?>
			</div><!--.panel_in_wrapper-->
		</div><!--.basket_wrapper-->
		<div class="clear"></div>






			</div>
				 </div>

		</div>	
	</div>	
	</div>	
	
	<div class="bg-bottom-hd d-none d-xl-block"></div>
	
	<div class="background-categotyrq" >
		<div class="container ">
			<div class="row position-relative" style="z-index:999;">
				<div class="">

				
<div id="before-nav">
	<div class="menu-bottom">
		<span class="fa fa-bars navbar-c-toggle menu-show"></span>
	</div>

	<nav id="desktop-menu-zeynal">
		<div class="">

		<?php
				
		if( have_rows('menu_main_zeynal', 'option') ):
			echo '<ul class="nav">';
			while( have_rows('menu_main_zeynal', 'option') ) : the_row();
			$menu_item_link = get_sub_field('menu_item_link', 'option');
			$menu_item_icon = get_sub_field('menu_item_icon', 'option');
			$menu_type_zeynals = get_sub_field('control_menu_zeynal_type', 'option');
		?>

			<li <?php if($menu_type_zeynals) { echo 'class="big-nav"'; } ?> >

				<a href="<?= $menu_item_link['url']; ?>" title="<?= $menu_item_link['title']; ?>">
					<?php
					if ( $menu_item_icon ) {
						if ( strpos( $menu_item_icon, '.svg' ) !== false ) {
							$menu_item_icon = str_replace( site_url(), '', $menu_item_icon);
							include(ABSPATH . $menu_item_icon);
						}else{ ?>
							<img src="<?php echo $menu_item_icon ?>" alt="<?= $menu_item_link['title']; ?>">
						<?php }
					}
					?>
					<?= $menu_item_link['title']; ?>
				</a>
				
				<?php if( have_rows('menu_items_tab', 'option') ): $i = 0; ?>
					<ul>
						<?php while( have_rows('menu_items_tab', 'option') ) : the_row();
						      $menu_items_tab_item_text = get_sub_field('menu_items_tab_item_text', 'option');
						      $menu_items_tab_item_icon = get_sub_field('menu_items_tab_item_icon', 'option');
						?>
							<li  <?php if($i == 0){ echo 'class="show"'; }  $i++; ?> >
								<a href="<?= $menu_items_tab_item_text['url']; ?>" title="<?= $menu_items_tab_item_text['title']; ?>">
									<?php // Icon Tab //
									if ( $menu_items_tab_item_icon ) {
										if ( strpos( $menu_items_tab_item_icon, '.svg' ) !== false ) {
											$menu_items_tab_item_icon = str_replace( site_url(), '', $menu_items_tab_item_icon);
											include(ABSPATH . $menu_items_tab_item_icon);
										}else{ ?>
											<img src="<?php echo $menu_items_tab_item_icon ?>" alt="<?= $menu_items_tab_item_text['title']; ?>">
										<?php }
									}
										  // Text Tab //
									?>
									<?= $menu_items_tab_item_text['title']; ?>
								</a>

								<?php if( have_rows('menu_items_tab_item_lists', 'option') ): ?>
									<ul>
										<?php while( have_rows('menu_items_tab_item_lists', 'option') ) : the_row();
										      $menu_items_tab_item_parent_link = get_sub_field('menu_items_tab_item_parent_link', 'option');
										?>
											<li class="col3">
												<a href="<?= $menu_items_tab_item_parent_link['url']; ?>" title="<?= $menu_items_tab_item_parent_link['title']; ?>">
													<?= $menu_items_tab_item_parent_link['title']; ?>
												</a>

												<?php if( have_rows('menu_items_tab_item_subitems_link', 'option') ): ?>
													<ul>
														<?php while( have_rows('menu_items_tab_item_subitems_link', 'option') ) : the_row();
														      $menu_items_tab_item_subitems_item_link = get_sub_field('menu_items_tab_item_subitems_item_link', 'option');
														?>
															<li>
																<a href="<?= $menu_items_tab_item_subitems_item_link['url']; ?>" title="<?= $menu_items_tab_item_subitems_item_link['title']; ?>">
																	<?= $menu_items_tab_item_subitems_item_link['title']; ?>
																</a>
															</li>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>

											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>	

							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

			</li>

		<?php
			endwhile;
			echo '</ul>';
		endif;

		?>
			

		</div>
	</nav>

</div>


				</div>

				<span class="clearfix" ></span>
			</div>
		</div>
	</div>
</header>

<!-- header -->
<div class="menu-hidden menu-show" id="menu-risponsive">

<div class="panel_in_wrapper2" >
				<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('حساب کاربری','woocommerce'); ?>"><?php _e('حساب کاربری','woocommerce'); ?></a>
				 <?php } 
				 else { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('ورود / ثبت نام','woocommerce'); ?>"><?php _e('ورود / ثبت نام','woocommerce'); ?></a>
				 <?php } ?>

 </div>
<div class="panel_res" >
			<?php global $woocommerce;
			$checkout_url = $woocommerce->cart->get_checkout_url();
			$cart_url = $woocommerce->cart->get_cart_url(); ?>
				<div class="right basket_icon" >
				<a href="<?= $cart_url; ?>" title="مشاهده صفحه سبد خرید">
				<span>سبد خرید</span>
				</a>
				</div><!--.right-->
				<div class="basket" >
				<a href="<?= $cart_url; ?>" class="basket_count_wrapper">شامل<span class="basket_count animate"><?= sizeof( WC()->cart->get_cart()); ?></span>محصول</a>
				<br/><br/>
				<strong class="final_link">
				<a href="<?= $cart_url; ?>" title="مشاهده سبد خرید">مشاهده</a>/
				<a href="<?= $cart_url; ?>" title="تکمیل خرید و پرداخت">تکمیل خرید</a></strong>
				</div><!--.basket-->
				<div class="clear"></div>
				<div class="basket_o_wrapper" >
			<span class="arrow"></span>
			<div class="clear"></div>
				<div class="basket_wrapper2" >
					<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

					<form class="form2" autocomplete="off" action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
					<div class="clear"></div>
					<div class="sum" >
					<span>قیمت مجموع</span> <?php wc_cart_totals_subtotal_html(); ?>
					<div class="clear solid"></div>
					
					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</div><!--.sum-->
					</form>
					<?php else: ?>
						<span class="j_title">سبد خرید خالی است</span>

				 <?php endif; ?>
				</div><!--.basket_wrapper2-->
			</div><!--.basket_o_wrapper-->
 </div> 



 <h4>منوی اصلی</h4>
 <?php wp_nav_menu(array('theme_location' => 'expanded_categroya')); ?>
<h4>دسترسی ها</h4>
<?php wp_nav_menu( array( 'theme_location' => 'expanded_header' )); ?>
 </div>
