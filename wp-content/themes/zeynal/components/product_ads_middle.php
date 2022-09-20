<?php if( get_field('product_ads_middle_left','option') && get_field('product_ads_middle_right','option') ) { ?>
    
    <div class="container">

        <div class="d-flex flex-wrap mb-5 mt-5" >
            <div class="index_ads_middle_box" style="width: calc((100% - 16px) / 2);margin-right: 0px;">
                <?php the_field('product_ads_middle_left','option'); ?>
            </div>

            <div class="index_ads_middle_box" style="width: calc((100% - 16px) / 2);margin-right: 16px;margin-top: 0px;">
                <?php the_field('product_ads_middle_right','option'); ?>
            </div>
        </div>

    </div>

<?php } ?>