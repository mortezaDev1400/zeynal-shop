				<?php 
					$serial_infor_on_off = get_post_meta(get_the_ID(), 'serial_infor_on_off', true);
					if( 'off' != $serial_infor_on_off ) {
				?>
						<?php
							$serial_infor_enteshar = get_post_meta(get_the_ID(), 'serial_infor_enteshar', true);
							$serial_infor_xhaner = get_post_meta(get_the_ID(), 'serial_infor_xhaner', true);
							$serial_infor_imdb = get_post_meta(get_the_ID(), 'serial_infor_imdb', true);
							$serial_infor_lang = get_post_meta(get_the_ID(), 'serial_infor_lang', true);
							$serial_infor_year = get_post_meta(get_the_ID(), 'serial_infor_year', true);
							$serial_infor_resolation = get_post_meta(get_the_ID(), 'serial_infor_resolation', true);
							$serial_infor_resolationx = get_post_meta(get_the_ID(), 'serial_infor_resolationx', true);
							$serial_infor_quality = get_post_meta(get_the_ID(), 'serial_infor_quality', true);
							$serial_infor_clock = get_post_meta(get_the_ID(), 'serial_infor_clock', true);
							$serial_infor_format = get_post_meta(get_the_ID(), 'serial_infor_format', true);
							$serial_infor_size = get_post_meta(get_the_ID(), 'serial_infor_size', true);
							$serial_infor_contry = get_post_meta(get_the_ID(), 'serial_infor_contry', true);
							$serial_infor_stars = get_post_meta(get_the_ID(), 'serial_infor_stars', true);
							$serial_infor_kargardan = get_post_meta(get_the_ID(), 'serial_infor_kargardan', true);
						?>

								<ul class="information-ul winfor-serial">
									<?php if ($serial_infor_enteshar) {?><li><i class="fa fa-share-square-o"></i> منتشر کننده فایل: <?php echo $serial_infor_enteshar; ?></li><?php }?>
									<?php if ($serial_infor_xhaner) {?><li><i class="fa fa-film"></i> ژانر: <?php echo $serial_infor_xhaner; ?></li><?php }?>
									<?php if ($serial_infor_imdb) {?><li><i class="fa fa-imdb"></i> امتیاز IMDB: <?php echo $serial_infor_imdb; ?></li><?php }?>
									<?php if ($serial_infor_lang) {?><li><i class="fa fa-language"></i> زبان: <?php echo $serial_infor_lang; ?></li><?php }?>
									<?php if ($serial_infor_year) {?><li><i class="fa fa-calendar-o"></i> سال انتشار: <?php echo $serial_infor_year; ?></li><?php }?>
									<?php if ($serial_infor_resolation) {?><li class="ul-resolation"><i class="fa fa-window-restore"></i> رزولوشن تصویر: <?php if ($serial_infor_resolation[0]) { echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolai'>";echo $serial_infor_resolation[0];echo "</span>";} if ($serial_infor_resolation[1]) {  echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolai'>";echo $serial_infor_resolation[1];echo "</span>";} if ($serial_infor_resolation[2]) {  echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolai'>";echo $serial_infor_resolation[2];echo "</span>";} ?><?php if ($serial_infor_resolationx[0]) { echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolaix'>";echo $serial_infor_resolationx[0];echo "</span>";} if ($serial_infor_resolationx[1]) {  echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolaix'>";echo $serial_infor_resolationx[1];echo "</span>";} if ($serial_infor_resolationx[2]) {  echo "<span title='این کیفیت به پست اضافه شد' class='tooltip23 resolaix'>";echo $serial_infor_resolationx[2];echo "</span>";} ?></li><?php }?>
									<?php if ($serial_infor_quality) {?><li><i class="fa fa-cog"></i> کیفیت فیلم: <span class="span-star-i">
									<?php $i = 0;$end = $serial_infor_quality;while ($i < 5){if($i < $end){echo "<i class='fa fa-star'></i>";}else{ echo "<i class='fa fa-star-o'></i>";}$i++; }?></span></li><?php }?>									
									<?php if ($serial_infor_clock) {?><li><i class="fa fa-clock-o"></i> زمان: <?php echo $serial_infor_clock; ?></li><?php }?>
									<?php if ($serial_infor_format) {?><li><i class="fa fa-file-video-o"></i> فرمت: <?php echo $serial_infor_format; ?></li><?php }?>
								    <?php if ($serial_infor_size) {?><li><i class="fa fa-folder-o"></i> حجم: <?php echo $serial_infor_size; ?></li><?php }?>
									<?php if ($serial_infor_contry) {?><li><i class="fa fa-globe"></i> محصول: <?php echo $serial_infor_contry; ?></li><?php }?>
									<?php if ($serial_infor_stars) {?><li><i class="fa fa-star"></i> ستارگان: <?php echo $serial_infor_stars; ?></li><?php }?>
									<?php if ($serial_infor_kargardan) {?><li><i class="fa fa-address-card-o"></i> کارگردان: <?php echo $serial_infor_kargardan; ?></li><?php }?>
								</ul>
								
				<?php }  ?>		