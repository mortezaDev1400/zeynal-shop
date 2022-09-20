<?php 
wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js');
get_header();?>
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
					<div class="bg-all-box bg-all-box-zy post-main  pt-3 ">
					<div class="row head-po-nv2" style="background-image:url(<?php get_option_tree('image_post_bg_upload', '', 'true' ); ?>)">
				
					<div class="col-12 class-padding-iopeq">
							<div class="title-post-main mb-3">
								<a href='<?php the_permalink(); ?>' title="<?php the_title_attribute(); ?>" class='d-inline-block' target='_blank' ><?php the_title( '<h1>', '</h1>' ); ?></a> 						
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
	$adstxt1_on_off = ot_get_option( 'ads468botomdl_on_off' ); 
	if( 'off' != $adstxt1_on_off ) {
	?>
						<div class="bg-all-box ads-between px-3 py-3 mb-3 text-center">						
               					<?php get_option_tree('ads468botomdl_textarea', '', 'true' ); ?>
						</div>	
<?php }  ?>
<?php endwhile; ?>
<?php endif; ?> 








<?php 
					$box_wlinkdl = get_post_meta(get_the_ID(), 'box_wlinkdl', true);
					$box_wlinkdl_on_off = get_post_meta(get_the_ID(), 'box_wlinkdl_on_off', true);
					
					$box_wrahnama = get_post_meta(get_the_ID(), 'box_wrahnama', true);
					$box_wrahnama_on_off = get_post_meta(get_the_ID(), 'box_wrahnama_on_off', true);
					$box_winfor_on_off = get_post_meta(get_the_ID(), 'box_winfor_on_off', true);


					
?>
<?php			
				if( $box_wlinkdl_on_off != '' & $box_wlinkdl_on_off != 'off' ) {	
?>

<div class="bg-all-box tabs-sid-left bg-all-box-zy  mt-4 mb-2 pb-3 zeynal-box-download">


				
					<div class="">
					<ul class="nav row " id="myTab" role="tablist">


				  <li class="nav-item col-3 text-center tab-bax-titr-hd">
					<a class="nav-link active mx-2" id="dlzy-tab" data-toggle="tab" href="#dlzy" role="tab" aria-controls="dlzy" aria-selected="true">
						
						<h3>لینک دانلود
						</h3>
					</a>
				  </li>
				  <li class="nav-item col-3 text-center tab-bax-titr-hd">
					<a class="nav-link mx-2" id="infozy-tab" data-toggle="tab" href="#infozy" role="tab" aria-controls="infozy" aria-selected="false">
						
						<h3>مشخصات
						</h3>
					</a>
				  </li>
				  
				  	<li class="nav-item col-3 text-center tab-bax-titr-hd">
					<a class="nav-link mx-2" id="syszy-tab" data-toggle="tab" href="#syszy" role="tab" aria-controls="syszy" aria-selected="false">
						
						<h3>سیستم مورد نیاز
						</h3>
					</a>
				  </li>

				  <li class="nav-item col-3 text-center tab-bax-titr-hd">
					<a class="nav-link mx-2" id="guidzy-tab" data-toggle="tab" href="#guidzy" role="tab" aria-controls="guidzy" aria-selected="false">
						
						<h3>راهنمای نصب
						</h3>
					</a>
				  </li>


				</ul>
				<div class="tab-content mt-3 px-2" id="myTabContent">
				  <div class="tab-pane fade show active" id="dlzy" role="tabpanel" aria-labelledby="dlzy-tab">
			
			
						
				
				  <div class="" id="dlas" role="" aria-labelledby="dlas-tab">
				  	<div class="row">
						<span class="clearfix"></span>
					
						<div class="col-12 content-boxdl pb-2 pt-2 px-2">
							<?php  echo $box_wlinkdl; ?>
						</div>
						
						
					</div>				  
				  </div>
			

				  
				  </div>
				  <div class="tab-pane fade" id="infozy" role="tabpanel" aria-labelledby="infozy-tab">			
					
				  <div class="row content-boxdl content-boxinfor pt-2">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 Bopi-giaanv">
								
						<?php
							$box_winfor_pass = get_post_meta(get_the_ID(), 'box_winfor_pass', true);
							$box_winfor_size = get_post_meta(get_the_ID(), 'box_winfor_size', true);
							$box_winfor_creator = get_post_meta(get_the_ID(), 'box_winfor_creator', true);
							$box_winfor_source = get_post_meta(get_the_ID(), 'box_winfor_source', true);
							$box_winfor_dategame = get_post_meta(get_the_ID(), 'box_winfor_dategame', true);
							$box_winfor_gamesopt = get_post_meta(get_the_ID(), 'box_winfor_gamesopt', true);
							$box_winfor_age = get_post_meta(get_the_ID(), 'box_winfor_age', true);
							$box_winforsys_on_off = get_post_meta(get_the_ID(), 'box_winforsys_on_off', true);
							$box_winforsys = get_post_meta(get_the_ID(), 'box_winforsys', true);
						?>
								<ul class="information-ul px-3 pt-2">
									<?php if ($box_winfor_pass) {?><li><i class="fa fa-unlock"></i> پسورد: <?php echo $box_winfor_pass; ?></li><?php }?>
									<?php if ($box_winfor_size) {?><li><i class="fa fa-folder"></i> حجم فایل: <?php echo $box_winfor_size; ?></li><?php }?>
									<?php if ($box_winfor_creator) {?><li><i class="fa fa-building-o"></i> شرکت سازنده: <?php echo $box_winfor_creator; ?></li><?php }?>
									<?php if ($box_winfor_source) {?><li><i class="fa fa-globe"></i> منبع: <?php echo $box_winfor_source; ?></li><?php }?>
								    <?php if ($box_winfor_dategame) {?><li><i class="fa fa-calendar-o"></i> تاریخ انتشار: <?php echo $box_winfor_dategame; ?></li><?php }?>
									<?php if ($box_winfor_gamesopt) {?><li><i class="fa fa-gamepad"></i> امتیاز سایت: <?php echo $box_winfor_gamesopt; ?></li><?php }?>
									<?php if ($box_winfor_age) {?><li><i class="fa fa-users"></i> رده بندی سنی: <?php echo $box_winfor_age; ?></li><?php }?>
		
	


		
								
								</ul>
							</div>
					</div>															
				  </div>
				  	 <div class="tab-pane fade " id="syszy" role="tabpanel" aria-labelledby="syszy-tab">			
  
					   <?php
								if( 'off' != $box_winforsys_on_off ) {	
							?>	
								
								<div class="px-3 py-3 syszy" >
									<div class="viewport">
									<div class="content">							
									<?php echo $box_winforsys; ?>								
									</div>
									</div>
								</div>
							<?php }  ?>
								<span class="clearfix"></span>
														
				  </div>
				  <div class="tab-pane fade" id="guidzy" role="tabpanel" aria-labelledby="guidzy-tab">			
  
				  <?php
				if( 'off' != $box_wrahnama_on_off ) {	
				?>
									
						
				
				  <div class="" id="" role="" aria-labelledby="guaideas-tab">
					<div class="syszy px-3 py-3">
						
						
						<?php echo $box_wrahnama; ?>
								<?php $my_meta = get_post_meta($post->ID, '_my_meta',true);
		if(isset($my_meta['lrn']) && !empty($my_meta['lrn'])) : ?>		
		<?php echo $my_meta['lrn']; ?>
		<?php endif; ?>
						
					</div>
				  </div>

				<?php }  ?>
														
				  </div>
				</div>
				</div>
				
				
				</div>


						
				<div class="row link-btm-post  mt-3">
						<div class="col-4 pr-3"><a href="<?php get_option_tree('link_recuest_newvertion_text', '', 'true' ); ?>" title="گزارش نسخه جدید"><i class="fa fa-share" aria-hidden="true"></i> گزارش نسخه جدید</a></div>
						<div class="col-4 pr-3"><a href="<?php get_option_tree('link_recuest_foillink_text', '', 'true' ); ?>" title="گزارش خرابی لینک"><i class="fa fa-share" aria-hidden="true"></i> گزارش خرابی لینک</a></div>
						<div class="col-4 "><a  href="<?php get_option_tree('link_recuest_traningdla_text', '', 'true' ); ?>"  title="راهنمای نصب و دانلود"><i class="fa fa-info-circle" aria-hidden="true"></i> راهنمای نصب و دانلود</a></div>
					</div>
					<?php }  ?>

				<div class="bg-all-box bg-box-dl bg-all-box-zy zeynal-box-singlea post-main py-4 mb-3 mt-4">
					<div class="head-titr-boxs pt-3"><h3><i class="fa fa-tags"></i> برچسب ها </h3></div>
					<div class="content-tags">
						<?php the_tags('  ', '  ', ' '); ?>
					</div>					
				</div>								
			<div class="bg-all-box tabs-single bg-all-box-zy py-4 mb-3 zeynal-box-singlea" style="padding-top:20px !important;">	
				<div class="tab-content mt-3" id="myTabContent">
				  <div class="tab-pane tab-single-opa fade show active" id="offer" role="tabpanel" aria-labelledby="offer-tab">
					<div class="head-titr-boxs"><h3><i class="fa fa-file-text-o"></i> مطالب پیشنهادی </h3></div>
					<ul class="tab-content-se-ul pr-2 pl-3 ">
					
					<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>
						<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
						<div class="mr-2 d-inline">
						<span class="d-inline-block"><i class="fa fa-calendar-o" ></i><?php the_time('j F Y'); ?></span>
						
						</div>
						</li>
<?php }
wp_reset_postdata(); ?>
					</ul>
					<span class="clearfix"></span>
				  </div>										  	
				</div>
				</div>
				
				<div class="bg-all-box bg-box-dl bg-all-box-zy zeynal-box-singlea post-main px-3 py-5 mb-3" style="padding-bottom:20px !important;">
					<div class="head-titr-boxs pt-3 d-flex justify-content-between align-items-center">
						<h3><i class="fa fa-comments-o"></i> لیست نظرات </h3>
						<h5 style="margin-top:15px;font-size:14px;padding: 5px;color: #949494;"><span><?php comments_number('0','1','%'); ?></span> نظر </h5>
					</div>
							
						<div id="comments" class="px-3">
						
						
						
<div id="comments-wrap" class="comment-warp">
<?php
comments_template();
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
    if ( post_password_required() ) { ?>
        <p class="nocomments">این مطلب با کلمه عبور محافظت شده است.</p>
    <?php
        return;
    }
?>
<!-- You can start editing here. -->
<?php // Begin Comments & Trackbacks ?>
<?php if ( have_comments() ) : ?>

<ol class="commentlist">
<?php
wp_list_comments( array(
'reply_text'        => 'پاسخ دادن',
'avatar_size'       => 80,
) ); ?>
</ol>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php // End Comments ?>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p><?php _e('نظرات برای این مطلب بسته شده است.'); ?></p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<div id="respond" style="margin-left:12px;">

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>برای ارسال دیدگاه باید وارد سایت شوید. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">ورود به سایت</a></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="mt-4" id="commentform">
<?php if ( $user_ID ) : ?>
<p class="mt-3">وارد شده با نام <?php echo $user_identity; ?> . <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','kubrick'); ?>">خروج از اکانت کاربری &raquo;</a>
<?php else : ?>
<div class="commentdata">
<input type="text" class="mr-4" name="author" placeholder="نام خود را وارد نمایید" id="author" value="<?php echo $comment_author; ?>"  tabindex="1" class="input-comment" >

<input type="text" name="email" id="email" placeholder="ایمیل خود را وارد نمایید" value="<?php echo $comment_author_email; ?>" tabindex="2" class="input-comment" >
</div>
<?php endif; ?>
<div class="textarea-box">
<textarea name="comment" placeholder="نظرت رو به ما بگو" id="text" tabindex="4" class="text-box"></textarea>
</div>
<div class="clear"></div>


<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
<?php comment_id_fields(); ?>



<div class="clear"></div>


	<div class="comments-rules"  style="width: 60%;float:right">
		
		<?php do_action('comment_form', $post->ID); ?>
	</div>
	<div class="box_send_bopaw_commenta " style="width: 38%;float:left;margin-top: 5px;">
		<input class="bluekey comment-button" name="submit" type="submit" id="submit" tabindex="5" value="ارسال دیدگاه">
		<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
		</div>
		<script>
		$('#cancel-comment-reply-link').text('صرف نظر از پاسخ گویی');
		</script>
	</div>

	

	</form>
<?php endif; ?>
</div>


<?php endif; ?>
</div>


							
							<span class="clearfix"></span>
						</div>
									
				</div>				
	<!--------------    End	post site code ----------------->						
			</div>
		</div>	
		<?php include (TEMPLATEPATH . "/left-sidebar.php"); ?>
	</div>
	
	</div>
</section>
<?php get_footer(); ?>