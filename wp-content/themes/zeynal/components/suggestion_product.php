<div class="seggestion main-seggestion">


        <div class="left-seggestion carousel-seggestion" >
                
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                    );

                    $seggest_loop = new WP_Query($args);
                    if($seggest_loop->have_posts()) : 
                    ?>


                    <div class="product-slider cell" style="padding:0;">
                        <!-- <img class="suggested-img" src="<?php bloginfo('template_directory'); ?>/images/seggestion.png" alt="محصولات پیشنهادی"> -->
                        <span class="suggested-img"></span>
                        <a  class="suggested-link" href="https://zeynal.ir/store/" title="محصولات"> مشاهده محصولات </a>
                    </div>


                        
                        
                    <?php    
                        while($seggest_loop->have_posts()) : $seggest_loop->the_post(); 
                    
                    $product = wc_get_product( get_the_ID() );
                ?>


                
                <div class="product-slider cell">
                    <div class="product-slider-1">
                        
                        <div class="on-123-xf">
                            <a  href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(array(300, 300)); ?>
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                            </a>
                
                        </div>
                
                            <div class="metatwo">
                                <div class="metathree">
                
                                    <div class="metafour">
                                        <span> <?php echo $product->get_price_html(); ?>  </span>
                                    </div>
                                </div>
                
                                <?php
                                    $box_winfor_btn1_text = get_post_meta(get_the_ID(), 'box_winfor_btn1_text', true);
                                    $box_winfor_btn1_link = get_post_meta(get_the_ID(), 'box_winfor_btn1_link', true);
                                ?>
                             
                            </div>
                
                    </div>
                    <div class="product-slider-2"></div>
                </div>
                
                <?php endwhile; endif; wp_reset_query(); ?>
                
                </div>





                <span class="clearfix"></span>
</div>