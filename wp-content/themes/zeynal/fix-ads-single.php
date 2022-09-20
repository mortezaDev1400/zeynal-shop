				<?php 
					$fixads1_on_off = ot_get_option( 'fixads1_on_off' ); 
					if( 'off' != $fixads1_on_off ) {
				?>
				<div class="bg-all-box ads-post-fix px-4 py-3 mb-3 text-center">
					<?php get_option_tree('adsfix_post_textarea', '', 'true' ); ?>
				</div>
				<?php }  ?>
					