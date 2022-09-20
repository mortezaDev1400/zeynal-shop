							<?php
								$badge_post_ic = get_post_meta(get_the_ID(), 'badge_post_ic', true);
							?>							
								<?php if ($badge_post_ic) {?>
								<div class="d-inline-block" >
									<div class="badge-post-main ">
										<?php if ($badge_post_ic[0]) {?><span class="badge badge_up badge-pill badge-success">آپدیت شده</span><?php } ?>
										<?php if ($badge_post_ic[1]) {?><span class="badge badge_vip badge-pill badge-warning">VIP+</span><?php } ?>
										<?php if ($badge_post_ic[2]) {?><span class="badge badge_new badge-pill badge-danger">جدید</span><?php } ?>
									</div>
								</div>
							<?php } ?>