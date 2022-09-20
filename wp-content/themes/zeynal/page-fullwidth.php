<?php /* Template Name: فول پیج*/ ?>
<?php get_header();?>
<section>
	<div class="container">


		<div class="row mt-3">	

		<div class="col-xl-12 col-lg-12 col-md-12 ">
			<div class="space-right-delt " >
		
	<!--------------	post site code ----------------->			
				<?php if(have_posts()) : ?> <?php while(have_posts()) : the_post(); ?> 
				<div class="bg-all-box post-main bg-all-box-zy px-3 py-3 mb-3">
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
							<div class="title-post-main mb-2">
								<a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>" class="d-inline-block"><h1> <?php the_title(); ?> </h1></a> 
								
	
							</div>

			
							
										
						</div>
					</div>
					<div class="content-post-main content-full-page  mt-4">
						<?php the_content(__('')); ?>
					</div>												
					<span class="clearfix"></span>
				</div>	

<?php endwhile; ?>
<?php endif; ?>  				
				
	<!--------------    End	post site code ----------------->
				
				
			</div>
		</div>	
		<?php //include (TEMPLATEPATH . "/left-sidebar.php"); ?>
	</div>
	
	</div>
</section>
<?php get_footer(); ?>