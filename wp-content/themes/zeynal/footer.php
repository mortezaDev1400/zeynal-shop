<footer class="bg-all-box Footer-bg-nv2 mt-4 pt-3 " style="background-image:url(<?php get_option_tree('image_footer_bg_upload', '', 'true' ); ?>)">


	<div class="container">
		<div class="clearfix"></div>
		
		<div class="row pt-4 b-footer">
			<div class="col-xl-4 col-lg-4 col-md-4">
				<div class="space-right-delt mr-3">
				<a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
						<img src="<?php get_option_tree('logo_footer_zeynal_upload', '', 'true' ); ?>" title="<?php bloginfo('name');?>"  alt="<?php bloginfo('name');?>" width="220">
					</a>
					<p class="text-justify mt-4">
					<?php get_option_tree('footer1_textabout_catid_text', '', 'true' ); ?>
					</p>
					<div class="list-b-footer social-b">
								<ul class="text-center">
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_rss_text', '', 'true' ); ?>"><i class="fa fa-rss" ></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_twitter_text', '', 'true' ); ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_insta_text', '', 'true' ); ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_aparatzey_text', '', 'true' ); ?>"><i style="background-image: url('<?php bloginfo('template_directory'); ?>/images/aparat_black.png');" class="aparat-icon"></i></a></li>
								<li><a class="nav-item nav-link" href="<?php get_option_tree('link_tlg1_text', '', 'true' ); ?>"><i class="fa fa-telegram"></i></a></li>
								</ul>
								<style>
									.aparat-icon{
										display: inline-block;
										width: 30px;
										height: 30px;
										position: relative;
										top: 6px;
									}
									.social-b ul li a:hover .aparat-icon{
										background-image: url('<?php bloginfo('template_directory'); ?>/images/aparat_blue.png') !important;
									}
								</style>
								
									<span class="clearfix"></span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4">
				<div class="space-right-delt mr-3 ml-3 box-zy-footer px-4 border-right-zy">
				<h3 class="text-center mb-3"><?php get_option_tree('footer2__title_zeyna_catid_text', '', 'true' ); ?></h3> 
				<p class="text-center"><?php get_option_tree('footer2_desc_zeyna_catid_text', '', 'true' ); ?></p>

				<div class="dl-btn-post-main">
				<a class="mb-3 bg-all-box-zy" href="<?php get_option_tree('footer2_btn1_link_catid_text', '', 'true' ); ?>" target="_blank">
								<div class="ic-btn-dl-zy"><i class="fa fa-download"></i></div>
								<div class="txt-btn-dl-zy"><span class="text-btn-dl"><?php get_option_tree('footer2_btn1_text_catid_text', '', 'true' ); ?></span></div>
				</a>

				<a class="bg-all-box-zy" href="<?php get_option_tree('footer2_btn2_link_catid_text', '', 'true' ); ?>" target="_blank">
								<div class="ic-btn-dl-zy"><i class="fa fa-download"></i></div>
								<div class="txt-btn-dl-zy"><span class="text-btn-dl"><?php get_option_tree('footer2_btn2_text_catid_text', '', 'true' ); ?></span></div>
				</a>
				</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 newsletter">
				<div class="space-right-delt mr-3 ml-3 border-right-zy px-4">
					<div class="list-footer-nv">
					<div  >
						<h3>منو سایت </h3> 
					</div>	
													<?php 
										wp_nav_menu(array(
											'theme_location' => 'expanded_footer', 
											'container' => false, 
											'menu_class' => 'navbar-nav', // <ul class="nav"> 
											'fallback_cb' => 'default_expanded_footer', 
										));
								?>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<section class="bor-sec-fo-vn">
	<div class="container">
		<div class=" mt-3 pb-1 ">
				
		<div class=" mx-auto" >
					<div class=" copyright">
						<div class="text-center">
							<span style="position: relative;top: -8px;"> 1400 - 1390 © تمامی محتوا ها و طراحی های قالب برای وبسایت زینال محفوظ است </span>
							<span style="position: relative;top: -8px;">پروان وب : <a href="https://parvanweb.ir" title="Parvanweb.ir" alt="Parvanweb.ir">طراحی قالب وردپرس</a> </span>
						</div>

					</div>
				</div>
		</div>
	</div>
</section>
</footer>
<div class="searchOverlay"></div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.bundle.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scroll/plugin.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

	<!----------------- Slider Code --------------------->

	<!-------------------End Slider Code ----------------->
	<?php wp_footer(); ?>
	<style>
	.ulp-layer, .ulp-content .ulp-layer input, .ulp-content .ulp-layer textarea, .ulp-content .ulp-layer h1, .ulp-content .ulp-layer h2, .ulp-content .ulp-layer h3, .ulp-content .ulp-layer h4, .ulp-content .ulp-layer h5{
		font-family: 'iransansweb' !important;
	}
#ulp-layer-114, #ulp-layer-114 *{
	    text-align: left;
		color: #585858;
		font-size: 34px;
}
	</style>


<script src="<?php bloginfo('template_directory'); ?>/js/flickity.min.js"></script>


<script>
        $(".carousel-main").flickity({
            imagesLoaded: true,
            freeScroll: false,
            freeScrollFriction: 1.5,
            prevNextButtons: true,
            pageDots: false,
            autoPlay: true,
            wrapAround: true,
        });

		$(".carousel-seggestion").flickity({
			// cellAlign: 'right',
			// groupCells: true,
			rightToLeft: true,
			cellAlign: 'right',
			imagesLoaded: true,
			prevNextButtons: true,
			pageDots: false,
        });

</script>


</body>
</html>