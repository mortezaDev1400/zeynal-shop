<?php get_header();?>
<section>
	<div class="container">
		<?php include (TEMPLATEPATH . "/ads720.php"); ?>
		
		<div class="row mt-3">	
		<div class="col-xl-8 col-lg-8 col-md-12">
			<div class="space-right-delt " >
				<?php include (TEMPLATEPATH . "/fix-ads-main.php"); ?>
				<div class="breadcrumbs mb-3" >
				<i class="fa fa-home"></i>
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
			</div>	
				
	<!--------------	post site code ----------------->	
<?php if(have_posts()) : ?> <?php while(have_posts()) : the_post(); ?> 
				<div class="bg-all-box bg-all-box-zy post-main  pt-3 mb-3">
					<div class="row head-po-nv2" style="background-image:url(<?php get_option_tree('image_post_bg_upload', '', 'true' ); ?>)">
				
						<div class="col-12 class-padding-iopeq">
							<div class="title-post-main mb-3">
								<a href='<?php the_permalink(); ?>' title="<?php the_title_attribute(); ?>" class='d-inline-block' target='_blank' ><?php the_title( '<h2>', '</h2>' ); ?></a> 						
							<?php include (TEMPLATEPATH . "/metabox-badge.php"); ?>
							</div>
							
							<div class="infor-post-bot category float-left">
								<i class="fa fa-list-ul" ></i>
								<?php the_category('  / ') ?>
							</div>
							
							<div class="infor-post-bot dates float-right">								
								<?php the_time('j F Y'); ?>
								<i class="fa fa-calendar-o" ></i>
							</div>
							
							
						
						</div>
					</div>
					<div class="content-post-main pt-3 px-3">

						<?php the_post_thumbnail($size, $attr); ?>
						<?php include (TEMPLATEPATH . "/metabox-serial.php"); ?>			
						<?php the_content(__('')); ?>
					</div>
					<div class="dl-btn-post-main">
							<a href="<?php the_permalink(); ?>" target="_blank" >

								<Div class="ic-btn-dl-zy"><i class="fa fa-download"></i></div>
								<div class="txt-btn-dl-zy"><span class="text-btn-dl">ادامه مطلب و دانلود</span></div>
								

							</a>
						</div>
					<div class="row bottom-post-main mt-4">
					<div class="col-12">

					<div class="infor-post-bot infor-zy-botm-post viewss float-left">
							<i class="fa fa-eye"></i>
							<?php echo getPostViews(get_the_ID()); ?>   
					</div>	
		
						<div class="infor-zy-botm-post comment-post-main float-left">
							<i class="fa fa-comment-o"></i>  <?php comments_number('بدون نظر', ' ۱ نظر', '% نظر'); ?>
						</div>

						<div class="infor-zy-botm-post auther float-right  ">
							 نوشته شده توسط <?php the_author(); ?> <i class="fa fa-user-o" ></i>
						</div>
					</div>
					
					
					</div>
					<span class="clearfix"></span>
				</div>	
<?php 
	$adstxt1_on_off = ot_get_option( 'ads468between_on_off' ); 
	if( 'off' != $adstxt1_on_off ) {
	?>
					<?php if ($count == 1) : ?>
						<div class="bg-all-box ads-between px-3 py-3 mb-3 text-center">
							<?php
								$adsp1 = ot_get_option('ads468between_textarea');
               					echo $adsp1;
							?>
						</div>
					<?php endif; $count++; ?>	
<?php }  ?>
			
<?php endwhile; ?>
<?php endif; ?>  


				
	<!--------------    End	post site code ----------------->	
				<div class="px-3 pt-4 pb-1 mb-2 text-center bg-all-box-zy">
					<?php parvanweb_numeric_posts_nav(); ?>
					<span class="clearfix"></span>
				</div>			
			</div>
		</div>
		<?php include (TEMPLATEPATH . "/left-sidebar.php"); ?>
	</div>
	</div>
</section>

<?php get_footer(); ?>