<?php
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 
?>

<div class="rs-products-slider rs-products-grid <?php echo esc_attr($css_class);?>">
    <div class="row">

        <?php $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

        for ($i=0; $i < count($arr) ; $i++) {             
            $arr_cats[]= $arr[$i];            
        }  

        if(empty($cat)){
            $latest_product = new WP_Query( array(
            'post_type'      => 'product', //post of page of my post type
            'posts_per_page' => $product_per                                    
            ));   
        }   
        else{
            $latest_product = new WP_Query( array(
                    'post_type' => 'product',
                    'posts_per_page' =>$product_per,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug', //can be set to ID
                            'terms' => $arr_cats//if field is ID you can reference by cat/term number
                        ),
                    )
            ));   
        }  
               
        if ( $latest_product->have_posts() ) :
        while ( $latest_product->have_posts() ) :
            $latest_product->the_post();
            global $product;

            //checking column grid
            $per_item = $pre_row;
            $col = '';
            if($per_item == 'Col-1'){               
                $col='12';                  
            }
            if($per_item =='Col-4'){
                $col='3';               
            }
            if($per_item =='Col-2'){                
                $col='6';               
            }
            if($per_item =='Col-3'){                
                $col='4';               
            }

            $product = wc_get_product( get_the_ID() ); //set the global product object?>

            <div class="product-item col-md-6 col-lg-<?php echo $col;?>">
                <div class="product-item-inner">
                    <div class="product-img">
                        <a href="<?php the_permalink() ?>">
                            <?php if ( has_post_thumbnail( get_the_ID() ) ) {
                                echo get_the_post_thumbnail( get_the_ID(), 'shop_single' );
                            } else {
                                echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />';
                            } ?>
                        </a>
                        <div class="product-btn">
                            <?php woocommerce_template_loop_add_to_cart();?>
                        </div>
                    </div>
                    <h4 class="product-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                    <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                </div>
            </div>

        <?php endwhile; wp_reset_query(); endif; ?>
    </div>    
</div>
