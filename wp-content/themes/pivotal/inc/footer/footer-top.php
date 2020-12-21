
<?php
    global $pivotal_option; 
    $header_grid2 = "";
    $hide_foot_widgets='';
    $footer_type       = get_post_meta(get_queried_object_id(), 'footer_select', true);
    $footer_logo_size = !empty($pivotal_option['footer-logo-height']) ? 'style="height: '.$pivotal_option['footer-logo-height'].'"' : '';

    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
   $pivotal_shop_id    = get_option( 'woocommerce_shop_page_id' ); 
   $header_width_meta = get_post_meta($pivotal_shop_id, 'header_width_custom2', true);
   $hide_foot_widgets = get_post_meta($pivotal_shop_id, 'hide_foot_widgets', true);
   $footer_logo       = get_post_meta($pivotal_shop_id, 'footer_logo_img', true);

    } elseif (is_home() && !is_front_page() || is_home() && is_front_page()){
        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom2', true);
        $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
        $footer_logo       =  get_post_meta(get_queried_object_id(), 'footer_logo_img', true);
    } else {
       $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom2', true);
       $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
       $footer_logo       =  get_post_meta(get_queried_object_id(), 'footer_logo_img', true);
    }  
    
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = $pivotal_option['header_grid2'];
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
    if($hide_foot_widgets !== 'yes'){
?>


<?php

    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'footer1'  )
        && ! is_active_sidebar( 'footer2' )
        && ! is_active_sidebar( 'footer3'  )
        && ! is_active_sidebar( 'footer4' )
    ){
      
    } 
?>

<?php $footer_widgets =  array(0=>12, 1=>6, 2=>4, 3=>3);

$content_footer = get_post_meta(get_the_ID(), 'content_footer', true); 
$title_footer = get_post_meta(get_the_ID(), 'title_footer', true); 
$button_footer = get_post_meta(get_the_ID(), 'button_footer', true); 

if ( !empty( $footer_widgets ) && (is_active_sidebar( 'footer1'  ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ||  is_active_sidebar( 'footer4' ))):

    ?>
    <div class="footer-top">
        <div class="<?php echo esc_attr($header_width);?>">
            <?php if(!empty($content_footer)) : 
                echo '<div class="content_footer_top">
                <div class="content_footer_left">
                    <h3>'.wp_kses($title_footer, 'povital').'</h3>
                    '.wp_kses($content_footer, 'povital').'
                </div>';

                echo '<div class="content_footer_right">
                    '.wp_kses($button_footer, 'povital').'
                </div></div>';
            endif; ?>
            <div class="row"> 
            <?php 

            $total_widgets = (int)is_active_sidebar( 'footer1'  ) + (int)is_active_sidebar( 'footer2'  ) + (int)is_active_sidebar( 'footer3'  ) + (int)is_active_sidebar( 'footer4'  );
            $count = '';
            if( $total_widgets == 1){
                $count = 12;
            }
            if( $total_widgets == 2){
                $count = 6;
            }
            if( $total_widgets == 3){
                $count = 4;
            }
            if( $total_widgets == 4){
                $count = 3;
            }

            foreach ( $footer_widgets as $i => $column) :           
            ?>
                <?php if ( is_active_sidebar( 'footer'.( $i+1 ) ) ): ?>
                    <div class="<?php echo esc_attr( 'col-lg-' . $count ); ?>">
                        <?php 
                     
                        if( $i == 0) :            
                            if($footer_type == 'footerdark'){
                                if(!empty($pivotal_option['footer_dark_logo']['url'])) { ?>
                                <div class="footer-logo-wrap">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo dfdf">
                                    <img <?php echo wp_kses($footer_logo_size, 'povital');?> src="<?php  echo esc_url($pivotal_option['footer_dark_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                    </a>
                                </div>
                            <?php }} else {
                                if($footer_logo !=''){ ?>
                                    <div class="footer-logo-wrap">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                            <img <?php echo wp_kses($footer_logo_size, 'pivotal');?> src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                        </a>
                                    </div>  
                                
                                <?php } else { 
                                    if(!empty($pivotal_option['footer_logo']['url'])) { ?>
                                        <div class="footer-logo-wrap">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                                <img <?php echo wp_kses($footer_logo_size, 'pivotal');?> src="<?php  echo esc_url($pivotal_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                            </a>
                                        </div>
                                    <?php }
                                } 
                            }
                            endif; ?>
                        <?php dynamic_sidebar( 'footer'.( $i+1 ) ); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; 
}