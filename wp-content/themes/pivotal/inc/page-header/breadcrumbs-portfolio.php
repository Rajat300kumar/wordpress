<?php
    global $pivotal_option;   

    $post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true); 
    $post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true); 
    $content_title = get_post_meta(get_the_ID(), 'content_title', true); 
    $content_banner = get_post_meta(get_the_ID(), 'content_banner', true); 
?>

<div class="rs-breadcrumbs  porfolio-details">

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
                        <?php if($content_title !=''){
                           echo esc_html($content_title);
                        } else {
                           the_title();
                        }
                        ?>
                    </h1>
                    <?php } 
                    if(!empty($content_banner)): 
                        echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;
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
<?php }
elseif (!empty($pivotal_option['department_single_image']['url'])) {?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $pivotal_option['department_single_image']['url'] );?>')">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <?php 
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_title !=''){
                                echo esc_html($content_title);
                            } else {
                                the_title();
                            }
                        ?>
                    </h1>
                    <?php } 
                    if(!empty($content_banner)): 
                        echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;
                    if(!empty($pivotal_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide' ):        
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
                           <?php if($content_title !=''){
                               echo esc_html($content_title);
                               } else {
                                   the_title();
                               }
                           ?>
                        </h1>
                    <?php }
                    if(!empty($content_banner)): 
                        echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;
                    if(!empty($pivotal_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide' && function_exists('bcn_display') ):                        
                            bcn_display();                   
                        endif;
                    }
                      ?>
                        <div class="page-banner-image">
                         <?php the_post_thumbnail(); ?>
                        </div>                    
                ?>             
                </div>
              </div>
            </div>
          </div>
    </div>
<?php } ?>
</div>