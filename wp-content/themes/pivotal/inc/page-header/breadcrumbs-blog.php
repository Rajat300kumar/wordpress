<?php
  global $pivotal_option;    

  $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true); 
  $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
  $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true);
  $content_title  = get_post_meta(get_queried_object_id(), 'content_title', true); 
  if($post_meta_data == ''){
  if(!empty($pivotal_option['blog_banner_main']['url'])):
    $post_meta_data = $pivotal_option['blog_banner_main']['url'];
  endif;
  } 
?>

<div class="rs-breadcrumbs  porfolio-details is-shop-hide">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <?php 
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_title !=''){
                           echo esc_html($content_title);
                            } else {                               
                                if(!empty($pivotal_option['blog_title'])) { ?>
                                    <?php echo esc_html($pivotal_option['blog_title']);?>
                                    <?php }
                                  else{
                                  esc_html_e('Blog','pivotal');
                                } 
                            }
                        ?>
                    </h1>
                    <?php } 
                    if(!empty($content_banner)) : 
                      echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;
                    if(!empty($pivotal_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    }
                    if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                    <div class="page-banner-image">
                      <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </div>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
<?php }
 else {   
  ?>
  <div class="rs-breadcrumbs-inner">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php 
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                      <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_title !=''){
                            echo esc_html($content_title);
                        } else {                                
                            if(!empty($pivotal_option['blog_title'])) { ?>
                                <?php echo esc_html($pivotal_option['blog_title']);
                            }else{
                                    esc_html_e('Blog','pivotal');
                            } 
                        }
                        ?>
                    </h1>
                    <?php } 
                    if(!empty($pivotal_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                        endif;
                    }

                    if(!empty($content_banner)) : 
                        echo '<p class="content_banner">'.wp_kses($content_banner, 'povital').'</p>';
                    endif;

                    if (!empty( $pivotal_option['page_banner_image']['url'] ) ) {?>
                    <div class="page-banner-image">
                    <img  src="<?php echo esc_url( $pivotal_option['page_banner_image']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                  </div>
                  <?php } ?>            
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>