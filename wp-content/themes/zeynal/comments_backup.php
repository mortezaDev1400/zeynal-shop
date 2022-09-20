<div id="comments-wrap" class="comment-warp">
<?php
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
<h5 style="margin-top:5px;font-size:13px;padding: 5px;"><span><i class="fa fa-commenting-o mr-1" ></i><?php comments_number('0','1','%'); ?></span> نظر ارسال شده </h5>
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
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>ورود شده با نام <?php echo $user_identity; ?> . <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','kubrick'); ?>">خروج از اکانت کاربری &raquo;</a>
<?php else : ?>
<div class="commentdata">
<label for="author">نام شما:</label>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>"  tabindex="1" class="input-comment" style="width:100%">
<div class="clear"></div>
<label for="email">ایمیل:</label>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="input-comment" style="width: 100%">
<div class="clear"></div>
<label for="url">وب سایت :</label>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>"  tabindex="3" class="input-comment" style="width: 100%">
</div>
<?php endif; ?>
<div class="textarea-box">
<label>دیدگاه شما:</label><div class="clear"></div>
<textarea name="comment" id="text" tabindex="4" class="text-box"></textarea>
</div>
<div class="clear"></div>


<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
<div class="clear"></div>
</form>

	<div class="comments-rules"  style="width: 60%;float:right">
		<h4><span>به نکات زیر توجه کنید</span></h4>
		<ul>
			<li>نظرات شما پس از بررسی و تایید نمایش داده می شود.</li>
			<li>لطفا نظرات خود را فقط در مورد مطلب بالا ارسال کنید.</li>

		</ul>
	</div>
	<div class="box_send_bopaw_commenta " style="width: 38%;float:left;margin-top: 15px;">
		<input class="bluekey comment-button" name="submit" type="submit" id="submit" tabindex="5" value="ارسال دیدگاه">
		<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
		</div>
		<script>
		$('#cancel-comment-reply-link').text('صرف نظر از پاسخ گویی');
		</script>
	</div>
	
<?php endif; ?>
</div>


<?php endif; ?>
</div>
