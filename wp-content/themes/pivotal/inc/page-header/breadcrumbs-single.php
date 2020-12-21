<?php
    global $pivotal_option;   

    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true);
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
    $post_id        = get_the_id();
    $author_id      = get_post_field ('post_author', $post_id);
    $display_name   = get_the_author_meta( 'display_name' , $author_id );
 ?>

<div class="rs-breadcrumbs porfolio-details">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 

                    <?php
                        $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                    ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {
                                the_title();
                            }
                            ?>
                        </h1>
                    <?php } 
                        if(!empty($pivotal_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                            endif;
                        }
                    ?> 
                    <?php
                        if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                            <div class="page-banner-image">
                                <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </div>
                    <?php } 
                    ?>     
                </div>
            </div>
          </div>
        </div>
    </div>
<?php }

elseif (!empty($pivotal_option['blog_banner']['url'])) {?>
<div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $pivotal_option['blog_banner']['url'] );?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">   
                    <?php
                        $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);
                        if( $post_meta_title != 'hide' ){             
                    ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {
                                the_title();
                            }
                            ?>
                        </h1>
                    <?php } 
                        if(!empty($pivotal_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                            endif;
                        }
                    ?> 
                    
                       <?php  if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                      <div class="page-banner-image">
                        <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                      </div>
                    <?php } 
                    ?>  
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php }else{?>
    <div class="rs-breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                        
                        <?php
                        $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                        ?>
                            <h1 class="page-title">
                                <?php if($content_banner !=''){
                                    echo esc_html($content_banner);
                                } else {
                                    the_title();
                                }
                                ?>
                            </h1>
                        <?php } 
                            if(!empty($pivotal_option['off_breadcrumb'])){
                                $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                                if( $rs_breadcrumbs != 'hide' ):        
                                if(function_exists('bcn_display')){?>
                                    <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                <?php } 
                                endif;
                            }
                        ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>