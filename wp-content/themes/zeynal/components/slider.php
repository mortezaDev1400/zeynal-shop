<?php if( get_field('slider_control','option') ) { ?>

<section>

<div class="carousel carousel-main">
	<?php
		if( have_rows('slider_items', 'option') ):
			while( have_rows('slider_items', 'option') ) : the_row();
			$image_slide = get_sub_field('slider_item_image','option');
			$link_slide = get_sub_field('slider_item_link','option');
	?>

		<div class="carousel-cell">
			<a href="<?= esc_url($link_slide['url']) ?>" title="<?= esc_attr($link_slide['title']) ?>">
				<img src="<?= esc_url($image_slide['url']) ?>" alt="<?= esc_attr($image_slide['alt']) ?>" >
			</a>
		</div>

	<?php 
			endwhile;
		endif;
	?>

</div>

</section>

<?php } ?>